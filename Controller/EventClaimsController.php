<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('EventAttendancesController', 'RailCompetency.Controller');
App::uses('EventTrainersController', 'RailCompetency.Controller');
App::uses('CoursesController', 'RailCompetency.Controller');
App::uses('StaffsController', 'RailCompetency.Controller');
App::uses('StaffQualificationsController', 'RailCompetency.Controller');
App::uses('PositionsController', 'RailCompetency.Controller');
/**
 * EventClaims Controller
 *
 * @property EventClaim $EventClaim
 * @property PaginatorComponent $Paginator
 */
class EventClaimsController extends RailCompetencyAppController
{

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Search.Prg');
	public $helpers = array('Csv');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->EventClaim->parseCriteria($this->Prg->parsedParams());
		$this->set('eventClaims', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventClaim->recursive = 0;
		// $this->set('eventClaims', $this->Paginator->paginate());
	}

	public function manage($event_id = null)
	{

		if ($this->request->is('post')) {
			if ($this->EventClaim->save($this->request->data)) {
				$this->Session->setFlash(__('The event claim has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event claim could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}

		$options['conditions'] = array('Event.id' => $event_id);
		$event = $this->EventClaim->Event->find('first', $options);

		$options = array('conditions' => array('EventClaim.event_id' => $event['Event']['id']));
		$claim = $this->EventClaim->find('first', $options);

		// find attendees who have completed the course only.
		$attendance = new EventAttendancesController;
		$options['conditions'] = array('EventAttendance.event_id' => $event_id, 'EventAttendance.is_completed' => 'true');
		$myAttendances = $attendance->EventAttendance->find('all', $options);

		$trainer = new EventTrainersController;
		$myTrainers = $trainer->get_trainers($event_id);

		$course = new CoursesController;
		$myCourse = $course->object($event['Event']['course_id']);

		$this->set(compact('event', 'claim', 'myAttendances', 'myTrainers', 'myCourse'));
	}
	public function ends_with($haystack, $needle)
	{
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}

		return (substr($haystack, -$length) === $needle);
	}
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null)
	{
		if (!$this->EventClaim->exists($id)) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
		$this->set('eventClaim', $this->EventClaim->find('first', $options));
	}

	public function object($id = null)
	{

		$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
		return $this->EventClaim->find('first', $options);
	}

	/**
	 * sneak method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function sneak($id = null)
	{
		if (!$this->EventClaim->exists($id)) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
		$this->set('eventClaim', $this->EventClaim->find('first', $options));
	}

	/**
	 * calendar method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function calendar($id = null)
	{
		if (!$this->EventClaim->exists($id)) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
		$this->set('eventClaim', $this->EventClaim->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventClaim']['start_date'])) {
				$this->request->data['EventClaim']['start_date'] = $this->split_date($this->request->data['EventClaim']['start_date']);
				$this->request->data['EventClaim']['end_date'] = $this->split_date($this->request->data['EventClaim']['end_date']);
			}


			$this->EventClaim->create();
			if ($this->EventClaim->save($this->request->data)) {
				$this->Session->setFlash(__('The event claim has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event claim could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventClaim->Event->find('list');
		$this->set(compact('events'));
	}

	public function create($event_id = null)
	{
	    // $this->autoLayout = false;
		if ($this->request->is('post')) {

			$data['EventClaim']['event_id'] = $event_id;
			$data['EventClaim']['claimed_by'] = CakeSession::read('Auth.User.id');
			$data['EventClaim']['amount'] = $this->request->data['EventClaim']['amount'];
			$data['EventClaim']['status'] = 1;

			$this->EventClaim->create();
			if ($this->EventClaim->save($data)) {
				$this->Session->setFlash(__('The event claim has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'manage', $event_id));
			} else {
				$this->Session->setFlash(__('The event claim could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null)
	{
		if (!$this->EventClaim->exists($id)) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		if ($this->request->is(array('post', 'put'))) {
			// if (isset($this->request->data['EventClaim']['start_date'])) {
			// 	$this->request->data['EventClaim']['start_date'] = $this->split_date($this->request->data['EventClaim']['start_date']);
			// 	$this->request->data['EventClaim']['end_date'] = $this->split_date($this->request->data['EventClaim']['end_date']);
			// }

			if ($this->EventClaim->save($this->request->data)) {
				$this->Session->setFlash(__('The event claim has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'manage', $this->request->data['EventClaim']['event_id']));
			} else {
				$this->Session->setFlash(__('The event claim could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
			$this->request->data = $this->EventClaim->find('first', $options);
		}
		$events = $this->EventClaim->Event->find('list');
		$this->set(compact('events'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		$this->EventClaim->id = $id;
		if (!$this->EventClaim->exists()) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventClaim->delete()) {
			$this->Session->setFlash(__('The event claim has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event claim could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	/**
	 * split_date method
	 *
	 * @return array 
	 */
	public function split_date($input)
	{
		$arr = explode("-", $input);
	   
		//Display the Start Date array format
		return array(
			"day" => $arr[0],
			"month" => $arr[1],
			"year" => $arr[2]
		);
	}








	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index()
	{

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->EventClaim->parseCriteria($this->Prg->parsedParams());
		$this->set('eventClaims', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventClaim->recursive = 0;
		// $this->set('eventClaims', $this->Paginator->paginate());
	}

	public function admin_ends_with($haystack, $needle)
	{
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}

		return (substr($haystack, -$length) === $needle);
	}
	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null)
	{
		if (!$this->EventClaim->exists($id)) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
		$this->set('eventClaim', $this->EventClaim->find('first', $options));
	}

	public function admin_object($id = null)
	{

		$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
		return $this->EventClaim->find('first', $options);
	}

	/**
	 * admin_sneak method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_sneak($id = null)
	{
		if (!$this->EventClaim->exists($id)) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
		$this->set('eventClaim', $this->EventClaim->find('first', $options));
	}

	/**
	 * admin_calendar method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_calendar($id = null)
	{
		if (!$this->EventClaim->exists($id)) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
		$this->set('eventClaim', $this->EventClaim->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add()
	{
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventClaim']['start_date'])) {
				$this->request->data['EventClaim']['start_date'] = $this->admin_split_date($this->request->data['EventClaim']['start_date']);
				$this->request->data['EventClaim']['end_date'] = $this->admin_split_date($this->request->data['EventClaim']['end_date']);
			}


			$this->EventClaim->create();
			if ($this->EventClaim->save($this->request->data)) {
				$this->Session->setFlash(__('The event claim has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event claim could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventClaim->Event->find('list');
		$this->set(compact('events'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null)
	{
		if (!$this->EventClaim->exists($id)) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventClaim']['start_date'])) {
				$this->request->data['EventClaim']['start_date'] = $this->admin_split_date($this->request->data['EventClaim']['start_date']);
				$this->request->data['EventClaim']['end_date'] = $this->admin_split_date($this->request->data['EventClaim']['end_date']);
			}

			if ($this->EventClaim->save($this->request->data)) {
				$this->Session->setFlash(__('The event claim has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event claim could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventClaim.' . $this->EventClaim->primaryKey => $id));
			$this->request->data = $this->EventClaim->find('first', $options);
		}
		$events = $this->EventClaim->Event->find('list');
		$this->set(compact('events'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null)
	{
		$this->EventClaim->id = $id;
		if (!$this->EventClaim->exists()) {
			throw new NotFoundException(__('Invalid event claim'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventClaim->delete()) {
			$this->Session->setFlash(__('The event claim has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event claim could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	/**
	 * admin_split_date method
	 *
	 * @return array 
	 */
	public function admin_split_date($input)
	{
		$arr = explode("-", $input);
	   
		//Display the Start Date array format
		return array(
			"day" => $arr[0],
			"month" => $arr[1],
			"year" => $arr[2]
		);
	}



	function end_with($haystack, $needle)
	{
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}

		return (substr($haystack, -$length) === $needle);
	}

	public function export($event_id = null, $course_code = null)
	{
		$data = array();
		$options['conditions'] = array('Event.id' => $event_id);
		$event = $this->EventClaim->Event->find('first', $options);

		// find attendees who have completed the course only.
		$attendance = new EventAttendancesController;
		$options['conditions'] = array('EventAttendance.event_id' => $event_id, 'EventAttendance.is_completed' => 'true');
		$myAttendances = $attendance->EventAttendance->find('all', $options);

		$header['HRDF']['NRIC'] = 'IC No.';
		$header['HRDF']['name'] = 'Name';
		$header['HRDF']['gender'] = 'Gender';
		$header['HRDF']['race'] = 'Race';
		$header['HRDF']['qualification'] = 'Academic Qualification';
		$header['HRDF']['position'] = 'Trainee Designation';
		$header['HRDF']['branch'] = 'HQ/Branch';
		$header['HRDF']['distance'] = 'Distance to Training';
		$header['HRDF']['other'] = 'Specify (if Other Race)';
		$data[] = $header;

		foreach ($myAttendances as $eventAttendance) {
			$staff = new StaffsController;
			$qualification = new StaffQualificationsController;
			$position = new PositionsController;

			$participant = $staff->object($eventAttendance['EventAttendance']['staff_id']);
			
			if (!empty($participant)) {
				$trainee['HRDF']['NRIC'] = $participant['Staff']['NRIC'];
				$trainee['HRDF']['name'] = $participant['Staff']['name'];
				if ($participant['Staff']['NRIC']%2 == 0) {
					$trainee['HRDF']['gender'] = 'Female';
				} else {
					$trainee['HRDF']['gender'] = 'Male';					
				}
				$trainee['HRDF']['race'] = $participant['Staff']['race'];

				$myQualification = $qualification->myself($eventAttendance['EventAttendance']['staff_id']);
				if (!empty($myQualification)) {
					$traineedata['HRDF']['qualification'] = $myQualification['StaffQualification']['certificate_name'];
				} else {
					$trainee['HRDF']['qualification'] = 'Diploma';
				}

				$myPosition = $position->object($participant['Staff']['position_id']);
				if (!empty($myPosition)) {
					$trainee['HRDF']['position'] = $myPosition['Position']['name'];
				} else {
					$trainee['HRDF']['position'] = 'Technician';
				}
				$trainee['HRDF']['branch'] = 'RAPID RAIL SDN. BHD.';
				$trainee['HRDF']['distance'] = 'Less 70 km';
				$trainee['HRDF']['other'] = ' ';
				$data[] = $trainee;
			}
		}
		$this->set(compact('data', 'course_code'));
		$this->layout = null;
		$this->autoLayout = false;

	}
}
