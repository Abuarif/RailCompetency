<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('StaffsController', 'RailCompetency.Controller');
App::uses('CoursesController', 'RailCompetency.Controller');
App::uses('EventsController', 'RailCompetency.Controller');
App::uses('TrainersController', 'RailCompetency.Controller');
App::uses('EventTrainersController', 'RailCompetency.Controller');
App::uses('EventAttendancesController', 'RailCompetency.Controller');
/**
 * StaffTrainingProfiles Controller
 *
 * @property StaffTrainingProfile $StaffTrainingProfile
 * @property PaginatorComponent $Paginator
 */
class StaffTrainingProfilesController extends RailCompetencyAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	// public $components = array('Paginator', 'Search.Prg');
	public $helpers = array('Csv'); 

/**
 * index method
 *
 * @return void
 */
	public function index2() {

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->StaffTrainingProfile->parseCriteria($this->Prg->parsedParams());
		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		$this->set('staffTrainingProfiles', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffTrainingProfile->recursive = 0;
		// $this->set('staffTrainingProfiles', $this->Paginator->paginate());
	}

	public function index() {

		if ($this->request->is('post')) {
			// print_r($this->request->data['StaffTrainingProfile']);
			$this->Paginator->settings['conditions'] = array();

			if (!empty($this->request->data['StaffTrainingProfile']['parentCode'])) {
				$option= array('StaffTrainingProfile.parent_code' => $this->request->data['StaffTrainingProfile']['parentCode']);
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffTrainingProfile']['orgCode'])) {
				$option= array('StaffTrainingProfile.org_code' => $this->request->data['StaffTrainingProfile']['orgCode']);
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffTrainingProfile']['staffNo'])) {
				$option= array('StaffTrainingProfile.staff_no like "%'.$this->request->data['StaffTrainingProfile']['staffNo'].'%"');
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffTrainingProfile']['courseCode'])) {
				$option= array('StaffTrainingProfile.code like "%'.$this->request->data['StaffTrainingProfile']['courseCode'].'%"');
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffTrainingProfile']['queryString'])) {
				$option= array('OR' => array(
					'StaffTrainingProfile.name like "%'.$this->request->data['StaffTrainingProfile']['queryString'].'%"',
					'StaffTrainingProfile.course_name like "%'.$this->request->data['StaffTrainingProfile']['queryString'].'%"'
					));
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffTrainingProfile']['start']) && !empty($this->request->data['StaffTrainingProfile']['end'])) {
				$start_date = $this->split_date($this->request->data['StaffTrainingProfile']['start']);
				$end_date = $this->split_date($this->request->data['StaffTrainingProfile']['end']);

				$start_date = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
				$end_date = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];

				$option= array('StaffTrainingProfile.start_date <= ' => $end_date, 'StaffTrainingProfile.end_date >= ' => $start_date);
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}
			// print_r($this->Paginator->settings['conditions']);
		}


		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		$this->set('staffTrainingProfiles', $this->Paginator->paginate());

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
	public function view($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
		$this->set('staffTrainingProfile', $this->StaffTrainingProfile->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
		return $this->StaffTrainingProfile->find('first', $options);
	}

	public function get_result($staff_id = null, $event_id = null) {
		$options = array('conditions' => array('StaffTrainingProfile.staff_id' => $staff_id, 'StaffTrainingProfile.event_id' => $event_id));
		return $this->StaffTrainingProfile->find('first', $options);
	}

	public function download () {

		if ($this->request->is('post')) {

			$this->log('Post export request');

			if (isset($this->request->data['StaffTrainingProfile']['start_date'])) {
				$start_date = $this->split_date($this->request->data['StaffTrainingProfile']['start_date']);
				$end_date = $this->split_date($this->request->data['StaffTrainingProfile']['end_date']);

				$start_date = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
				$end_date = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
			}
			$this->redirect(array('action' => 'export',$start_date, $end_date));
		}
	}
	
	public function export($start_date = null, $end_date = null) {

		$options['fields'] = array('staff_no', 'name', 'parent_code', 'org_code', 'code', 'course_name', 'start_date', 'end_date', 'duration', 'readiness', 'interest', 'cooperation', 'participation', 'ability', 'attitude', 'remarks', 'status', 'theory', 'practical', 'doc', 'comment', 'pte');
		$options['conditions'] = array('StaffTrainingProfile.start_date <= ' => $end_date, 'StaffTrainingProfile.end_date >= ' => $start_date);

		$output = $this->StaffTrainingProfile->find('all', $options);

	    $this->set('staffTrainingProfiles', $output);
	    $this->layout = null;
	    $this->autoLayout = false;

	}

	public function list_year($staff_id = null) {
		
		// $options['fields'] = array('StaffTrainingProfile.id', 'StaffTrainingProfile.start_date');
		$options['fields'] = array('StaffTrainingProfile.id', 'YEAR(StaffTrainingProfile.start_date) as year');
		$options['conditions'] = array('StaffTrainingProfile.staff_id' => $staff_id);
		$options['group'] = array('YEAR(StaffTrainingProfile.start_date)');

		return $this->StaffTrainingProfile->find('all', $options);
	}

	public function profiles($staff_id = null, $year = null) {
		
		$options['conditions'] = array(
			'StaffTrainingProfile.staff_id' => $staff_id,
			'YEAR(StaffTrainingProfile.start_date)' => $year,
			);

		return $this->StaffTrainingProfile->find('all', $options);
	}

	public function check_record($staff_id = null) {
		$result = false;
		
		$options = array('conditions' => array('StaffTrainingProfile.staff_id' => $staff_id));

		if (!empty($this->StaffTrainingProfile->find('first', $options)) ){
			$result = true;
		}
		return $result;		
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
		$this->set('staffTrainingProfile', $this->StaffTrainingProfile->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
		$this->set('staffTrainingProfile', $this->StaffTrainingProfile->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffTrainingProfile']['start_date'])) {
				$this->request->data['StaffTrainingProfile']['start_date'] = $this->split_date($this->request->data['StaffTrainingProfile']['start_date']);
				$this->request->data['StaffTrainingProfile']['end_date'] = $this->split_date($this->request->data['StaffTrainingProfile']['end_date']);
			}
			

			$this->StaffTrainingProfile->create();
			if ($this->StaffTrainingProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The staff training profile has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff training profile could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->StaffTrainingProfile->Staff->find('list');
		$courses = $this->StaffTrainingProfile->Course->find('list');
		$this->set(compact('staffs', 'courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffTrainingProfile']['start_date'])) {
				$this->request->data['StaffTrainingProfile']['start_date'] = $this->split_date($this->request->data['StaffTrainingProfile']['start_date']);
				$this->request->data['StaffTrainingProfile']['end_date'] = $this->split_date($this->request->data['StaffTrainingProfile']['end_date']);
			}
			
			if ($this->StaffTrainingProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The staff training profile has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff training profile could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
			$this->request->data = $this->StaffTrainingProfile->find('first', $options);
		}
		$staffs = $this->StaffTrainingProfile->Staff->find('list');
		$courses = $this->StaffTrainingProfile->Course->find('list');
		$this->set(compact('staffs', 'courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function add_record($staff_id = null, $course_id = null, $event_id = null, $attendance_id = null) {
		
		if ($this->request->is(array('post', 'put'))) {
			// pr($this->request->data);
			$this->log('StaffTrainingProfile.add_record');

			if ($this->StaffTrainingProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The staff evaluation has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'event_attendances', 'action' => 'has_submitted', $attendance_id, $event_id));
			} else {
				$this->Session->setFlash(__('The staff evaluation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} 

		$myStaff = new StaffsController;
		$myCourse = new CoursesController;
		$myEvent = new EventsController;

		$records = $myStaff->Staff->find('all', array('conditions' => array('Staff.id' => $staff_id)));
		$staffs = $myStaff->Staff->find('list', array('conditions' => array('Staff.id' => $staff_id)));
		$staff = $records[0];
		$records = $myCourse->Course->find('all', array('conditions' => array('Course.id' => $course_id)));
		$courses = $myCourse->Course->find('list', array('conditions' => array('Course.id' => $course_id)));
		$course = $records[0];
		$events = $myEvent->Event->find('all', array('conditions' => array('Event.id' => $event_id)));
		$this->set(compact('staffs', 'staff', 'courses', 'course', 'events', 'event_id'));
	}

	public function delete_record_external($staff_id = null, $course_id = null, $event_id = null, $attendance_id = null) {		

		$data= array(
				'StaffTrainingProfile.staff_id' => $staff_id, 
				'StaffTrainingProfile.event_id' => $event_id, 
				'StaffTrainingProfile.course_id' => $course_id, 
			);
		if ($this->StaffTrainingProfile->deleteAll($data, false)) {
			$this->Session->setFlash(__('The staff training profile has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff training profile could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller' => 'event_attendances', 'action' => 'incomplete_course', $attendance_id, $event_id));
		// $myAttendace = new EventAttendancesController;
		// $myAttendace->incomplete_course($attendance_id, $event_id);
	}


	
	public function add_record_external($staff_id = null, $course_id = null, $event_id = null, $attendance_id = null) {
		
		if ($this->request->is(array('post', 'put'))) {
			// pr($this->request->data);
			$this->log('StaffTrainingProfile.add_record');

			if ($this->StaffTrainingProfile->save($this->request->data)) {
				// $myAttendace = new EventAttendancesController;
				// $myAttendace->complete_course($attendance_id, $event_id);
				$this->Session->setFlash(__('The staff evaluation has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'event_attendances', 'action' => 'complete_course', $attendance_id, $event_id));
			} else {
				$this->Session->setFlash(__('The staff evaluation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} 

		$myStaff = new StaffsController;
		$myCourse = new CoursesController;
		$myEvent = new EventsController;

		$staff = $myStaff->Staff->find('first', array('conditions' => array('Staff.id' => $staff_id)));
		$staffs = $myStaff->Staff->find('list', array('conditions' => array('Staff.id' => $staff_id)));
		// $staff = $records[0];
		$course = $myCourse->Course->find('first', array('conditions' => array('Course.id' => $course_id)));
		$courses = $myCourse->Course->find('list', array('conditions' => array('Course.id' => $course_id)));
		// $course = $records[0];
		$events = $myEvent->Event->find('all', array('conditions' => array('Event.id' => $event_id)));
		$this->set(compact('staffs', 'staff', 'courses', 'course', 'events', 'event_id'));
	}

	
	public function edit_record($staff_id = null, $course_id = null, $event_id = null, $attendance_id = null) {
		
		if ($this->request->is(array('post', 'put'))) {
			// pr($this->request->data);
			$this->log('StaffTrainingProfile.add_record');

			if ($this->StaffTrainingProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The staff evaluation has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'event_attendances', 'action' => 'complete_course', $attendance_id, $event_id));
			} else {
				$this->Session->setFlash(__('The staff evaluation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} 

		$myRecord = $this->StaffTrainingProfile->find('first', array('conditions' => array('StaffTrainingProfile.event_id' => $event_id, 'StaffTrainingProfile.staff_id' => $staff_id)));
		$myStaff = new StaffsController;
		$myCourse = new CoursesController;
		// $myEvent = new EventsController;

		$staffs = $myStaff->Staff->find('list', array('conditions' => array('Staff.id' => $staff_id)));
		$staff = $myRecord['Staff'];
		$records = $myCourse->Course->find('all', array('conditions' => array('Course.id' => $course_id)));
		$courses = $myCourse->Course->find('list', array('conditions' => array('Course.id' => $course_id)));
		$course = $myRecord['Course'];
		// $events = $myEvent->Event->find('all', array('conditions' => array('Event.id' => $event_id)));
		$this->set(compact('staffs', 'staff', 'courses', 'course', 'event_id', 'myRecord'));
		// $this->set(compact('staffs', 'staff', 'courses', 'course', 'events', 'event_id', 'myRecord'));
	}

	public function print_record($staff_training_profile_id = null) {
		
		$this->layout = 'print';

		$myRecord = $this->StaffTrainingProfile->find('first', array('conditions' => array('StaffTrainingProfile.id' => $staff_training_profile_id)));
		$myStaff = new StaffsController;
		$myCourse = new CoursesController;
		$myEventTrainer = new EventTrainersController;
		$myTrainer = new TrainersController;

		// $staffs = $myStaff->Staff->find('list', array('conditions' => array('Staff.id' => $staff_id)));
		$staff = $myStaff->object($myRecord['StaffTrainingProfile']['staff_id']);
		// $staff = $myRecord['Staff'];
		// $courses = $myCourse->Course->find('list', array('conditions' => array('Course.id' => $course_id)));
		$course = $myCourse->object($myRecord['StaffTrainingProfile']['course_id']);
		// $course = $myRecord['Course'];

		$options['conditions'] = array('EventTrainer.event_id' => $myRecord['StaffTrainingProfile']['event_id']);
		$options['fields'] = array('id', 'trainer_id');
		$trainers = $myEventTrainer->EventTrainer->find('all', $options);

		$assignedTrainers = array();
		foreach ($trainers as $objTrainer) {
			$assignedTrainer = $myTrainer->object($objTrainer['EventTrainer']['trainer_id']);
			$myObj = $myStaff->object($assignedTrainer['Trainer']['staff_id']);
			// print_r($myObj);
			$assignedTrainers[] = $myObj;
		}

		// print_r($assignedTrainers);
		$this->set(compact('staff', 'course', 'event_id', 'myRecord', 'assignedTrainers'));
	}

	public function get_record($event_id = null) {

		return $this->StaffTrainingProfile->find(
			'first', 
			array('conditions' => 
				array(
						'StaffTrainingProfile.event_id' => $event_id
					)
				)
			);

		// $this->set(compact('results'));
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StaffTrainingProfile->id = $id;
		if (!$this->StaffTrainingProfile->exists()) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffTrainingProfile->delete()) {
			$this->Session->setFlash(__('The staff training profile has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff training profile could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * split_date method
 *
 * @return array 
 */
	public function split_date($input) {
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
	public function admin_index() {

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->StaffTrainingProfile->parseCriteria($this->Prg->parsedParams());
		$this->set('staffTrainingProfiles', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffTrainingProfile->recursive = 0;
		// $this->set('staffTrainingProfiles', $this->Paginator->paginate());
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
	public function admin_view($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
		$this->set('staffTrainingProfile', $this->StaffTrainingProfile->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
		return $this->StaffTrainingProfile->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
		$this->set('staffTrainingProfile', $this->StaffTrainingProfile->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
		$this->set('staffTrainingProfile', $this->StaffTrainingProfile->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffTrainingProfile']['start_date'])) {
				$this->request->data['StaffTrainingProfile']['start_date'] = $this->admin_split_date($this->request->data['StaffTrainingProfile']['start_date']);
				$this->request->data['StaffTrainingProfile']['end_date'] = $this->admin_split_date($this->request->data['StaffTrainingProfile']['end_date']);
			}
			

			$this->StaffTrainingProfile->create();
			if ($this->StaffTrainingProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The staff training profile has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff training profile could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->StaffTrainingProfile->Staff->find('list');
		$courses = $this->StaffTrainingProfile->Course->find('list');
		$this->set(compact('staffs', 'courses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StaffTrainingProfile->exists($id)) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffTrainingProfile']['start_date'])) {
				$this->request->data['StaffTrainingProfile']['start_date'] = $this->admin_split_date($this->request->data['StaffTrainingProfile']['start_date']);
				$this->request->data['StaffTrainingProfile']['end_date'] = $this->admin_split_date($this->request->data['StaffTrainingProfile']['end_date']);
			}
			
			if ($this->StaffTrainingProfile->save($this->request->data)) {
				$this->Session->setFlash(__('The staff training profile has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff training profile could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffTrainingProfile.' . $this->StaffTrainingProfile->primaryKey => $id));
			$this->request->data = $this->StaffTrainingProfile->find('first', $options);
		}
		$staffs = $this->StaffTrainingProfile->Staff->find('list');
		$courses = $this->StaffTrainingProfile->Course->find('list');
		$this->set(compact('staffs', 'courses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->StaffTrainingProfile->id = $id;
		if (!$this->StaffTrainingProfile->exists()) {
			throw new NotFoundException(__('Invalid staff training profile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffTrainingProfile->delete()) {
			$this->Session->setFlash(__('The staff training profile has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff training profile could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


/**
 * admin_split_date method
 *
 * @return array 
 */
	public function admin_split_date($input) {
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

}
