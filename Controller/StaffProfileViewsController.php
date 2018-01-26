<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('StaffsController', 'RailCompetency.Controller');
App::uses('CoursesController', 'RailCompetency.Controller');
App::uses('EventsController', 'RailCompetency.Controller');
App::uses('TrainersController', 'RailCompetency.Controller');
App::uses('EventTrainersController', 'RailCompetency.Controller');
App::uses('EventAttendancesController', 'RailCompetency.Controller');
/**
 * StaffProfileViews Controller
 *
 * @property StaffProfileView $StaffProfileView
 * @property PaginatorComponent $Paginator
 */
class StaffProfileViewsController extends RailCompetencyAppController {

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
	public function index2() {

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->StaffProfileView->parseCriteria($this->Prg->parsedParams());
		$this->set('staffProfileViews', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffProfileView->recursive = 0;
		// $this->set('staffProfileViews', $this->Paginator->paginate());
	}

	public function index() {

		if ($this->request->is('post')) {
			// print_r($this->request->data['StaffProfileView']);
			$this->Paginator->settings['conditions'] = array();

			if (!empty($this->request->data['StaffProfileView']['parentCode'])) {
				$option= array('StaffProfileView.parent_code' => $this->request->data['StaffProfileView']['parentCode']);
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffProfileView']['orgCode'])) {
				$option= array('StaffProfileView.org_code' => $this->request->data['StaffProfileView']['orgCode']);
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffProfileView']['staffNo'])) {
				$option= array('StaffProfileView.staff_no like "%'.$this->request->data['StaffProfileView']['staffNo'].'%"');
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffProfileView']['courseCode'])) {
				$option= array('StaffProfileView.code like "%'.$this->request->data['StaffProfileView']['courseCode'].'%"');
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffProfileView']['queryString'])) {
				$option= array('OR' => array(
					'StaffProfileView.name like "%'.$this->request->data['StaffProfileView']['queryString'].'%"',
					'StaffProfileView.course_name like "%'.$this->request->data['StaffProfileView']['queryString'].'%"'
					));
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}

			if (!empty($this->request->data['StaffProfileView']['start']) && !empty($this->request->data['StaffProfileView']['end'])) {
				$start_date = $this->split_date($this->request->data['StaffProfileView']['start']);
				$end_date = $this->split_date($this->request->data['StaffProfileView']['end']);

				$start_date = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
				$end_date = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];

				$option= array('StaffProfileView.start_date <= ' => $end_date, 'StaffProfileView.end_date >= ' => $start_date);
				$this->Paginator->settings['conditions'] = array_merge($this->Paginator->settings['conditions'], $option);
			}
			// print_r($this->Paginator->settings['conditions']);
		}


		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		$this->set('staffProfileViews', $this->Paginator->paginate());

	}

	public function download () {

		if ($this->request->is('post')) {

			$this->log('Post export request');

			if (isset($this->request->data['StaffProfileView']['start_date'])) {
				$start_date = $this->split_date($this->request->data['StaffProfileView']['start_date']);
				$end_date = $this->split_date($this->request->data['StaffProfileView']['end_date']);

				$start_date = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
				$end_date = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
			}
			$this->redirect(array('action' => 'export',$start_date, $end_date));
		}
	}
	
	public function export($start_date = null, $end_date = null) {

		$this->log('start_date: '.$start_date);
		$this->log('end_date: '.$end_date);

		$options['fields'] = array('staff_no', 'name', 'position', 'parent_code', 'org_code', 'code', 'course_name', 'start_date', 'end_date', 'duration', 'readiness', 'interest', 'cooperation', 'participation', 'ability', 'attitude', 'remarks', 'status', 'theory', 'practical', 'doc', 'comment', 'pte');
		$options['conditions'] = array('StaffProfileView.start_date <= ' => $end_date, 'StaffProfileView.end_date >= ' => $start_date);

		$output = $this->StaffProfileView->find('all', $options);

	    $this->set('staffProfileViews', $output);
	    $this->layout = null;
	    $this->autoLayout = false;

	}

	// http://localhost/lms/rail_competency/staff_profile_views/export/2016-04-01/2016-05-01
	
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
		if (!$this->StaffProfileView->exists($id)) {
			throw new NotFoundException(__('Invalid staff profile view'));
		}
		$options = array('conditions' => array('StaffProfileView.' . $this->StaffProfileView->primaryKey => $id));
		$this->set('staffProfileView', $this->StaffProfileView->find('first', $options));
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('StaffProfileView.' . $this->StaffProfileView->primaryKey => $id));
		return $this->StaffProfileView->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->StaffProfileView->exists($id)) {
			throw new NotFoundException(__('Invalid staff profile view'));
		}
		$options = array('conditions' => array('StaffProfileView.' . $this->StaffProfileView->primaryKey => $id));
		$this->set('staffProfileView', $this->StaffProfileView->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->StaffProfileView->exists($id)) {
			throw new NotFoundException(__('Invalid staff profile view'));
		}
		$options = array('conditions' => array('StaffProfileView.' . $this->StaffProfileView->primaryKey => $id));
		$this->set('staffProfileView', $this->StaffProfileView->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffProfileView']['start_date'])) {
				$this->request->data['StaffProfileView']['start_date'] = $this->split_date($this->request->data['StaffProfileView']['start_date']);
				$this->request->data['StaffProfileView']['end_date'] = $this->split_date($this->request->data['StaffProfileView']['end_date']);
			}
			

			$this->StaffProfileView->create();
			if ($this->StaffProfileView->save($this->request->data)) {
				$this->Session->setFlash(__('The staff profile view has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff profile view could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->StaffProfileView->Event->find('list');
		$staffs = $this->StaffProfileView->Staff->find('list');
		$courses = $this->StaffProfileView->Course->find('list');
		$this->set(compact('events', 'staffs', 'courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StaffProfileView->exists($id)) {
			throw new NotFoundException(__('Invalid staff profile view'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffProfileView']['start_date'])) {
				$this->request->data['StaffProfileView']['start_date'] = $this->split_date($this->request->data['StaffProfileView']['start_date']);
				$this->request->data['StaffProfileView']['end_date'] = $this->split_date($this->request->data['StaffProfileView']['end_date']);
			}
			
			if ($this->StaffProfileView->save($this->request->data)) {
				$this->Session->setFlash(__('The staff profile view has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff profile view could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffProfileView.' . $this->StaffProfileView->primaryKey => $id));
			$this->request->data = $this->StaffProfileView->find('first', $options);
		}
		$events = $this->StaffProfileView->Event->find('list');
		$staffs = $this->StaffProfileView->Staff->find('list');
		$courses = $this->StaffProfileView->Course->find('list');
		$this->set(compact('events', 'staffs', 'courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StaffProfileView->id = $id;
		if (!$this->StaffProfileView->exists()) {
			throw new NotFoundException(__('Invalid staff profile view'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffProfileView->delete()) {
			$this->Session->setFlash(__('The staff profile view has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff profile view could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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



    function end_with($haystack, $needle)
  	{
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }

      	return (substr($haystack, -$length) === $needle);
  	}

}
