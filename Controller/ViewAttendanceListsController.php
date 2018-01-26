<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('ServicesController', 'RailCompetency.Controller');
/**
 * ViewAttendanceLists Controller
 *
 * @property ViewAttendanceList $ViewAttendanceList
 * @property PaginatorComponent $Paginator
 */
class ViewAttendanceListsController extends RailCompetencyAppController {

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
	public function index() {

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->ViewAttendanceList->parseCriteria($this->Prg->parsedParams());
		$this->set('viewAttendanceLists', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->ViewAttendanceList->recursive = 0;
		// $this->set('viewAttendanceLists', $this->Paginator->paginate());
	}

	public function download () {

		if ($this->request->is('post')) {

			$this->log('Post export request');

			if (isset($this->request->data['ViewAttendanceList']['start_date'])) {
				$start_date = $this->split_date($this->request->data['ViewAttendanceList']['start_date']);
				$end_date = $this->split_date($this->request->data['ViewAttendanceList']['end_date']);
				$service_id = $this->request->data['ViewAttendanceList']['service_id'];

				$start_date = $start_date['year'].'-'.$start_date['month'].'-'.$start_date['day'];
				$end_date = $end_date['year'].'-'.$end_date['month'].'-'.$end_date['day'];
			}
			$this->redirect(array('action' => 'export',$service_id, $start_date, $end_date));
		}

		$myService = new ServicesController;
		$services = $myService->Service->find('list');
		$all = array(0=> 'All');
		$services = array_merge($all, $services);

		$this->set(compact('services'));
	}

	public function export($service_id = null,  $start_date = null, $end_date = null) {


		$this->log('Service: '.$service_id);
		$this->log('start_date: '.$start_date);
		$this->log('end_date: '.$end_date);

		if ($service_id != 0) {
			$options['conditions'] = array(
			'STR_TO_DATE(ViewAttendanceList.start_date, "%d/%m/%Y") <= ' => $end_date, 
			'STR_TO_DATE(ViewAttendanceList.end_date, "%d/%m/%Y") >= ' => $start_date,
			'service_id' => $service_id,
			);
		} else {
			$options['conditions'] = array(
			'STR_TO_DATE(ViewAttendanceList.start_date, "%d/%m/%Y") <= ' => $end_date, 
			'STR_TO_DATE(ViewAttendanceList.end_date, "%d/%m/%Y") >= ' => $start_date,
			);
		}

		$options['order'] = array('STR_TO_DATE(ViewAttendanceList.start_date, "%d/%m/%Y") ASC');

		$output = $this->ViewAttendanceList->find('all', $options);

	    $this->set('attendanceLists', $output);

	    
	    $this->layout = null;
	    $this->autoLayout = false;

	}

	public function test($service_id = null,  $start_date = null, $end_date = null) {

		$options['conditions'] = array(
			'STR_TO_DATE(ViewAttendanceList.start_date, "%d/%m/%Y") <= ' => $end_date, 
			'STR_TO_DATE(ViewAttendanceList.end_date, "%d/%m/%Y") >= ' => $start_date,
			// 'service_id' => $service_id,
			);

		$options['order'] = array('STR_TO_DATE(ViewAttendanceList.start_date, "%d/%m/%Y") ASC');

		$output = $this->ViewAttendanceList->find('all', $options);

	    $this->set('attendanceLists', $output);
	   

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
		if (!$this->ViewAttendanceList->exists($id)) {
			throw new NotFoundException(__('Invalid view attendance list'));
		}
		$options = array('conditions' => array('ViewAttendanceList.' . $this->ViewAttendanceList->primaryKey => $id));
		$this->set('viewAttendanceList', $this->ViewAttendanceList->find('first', $options));
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('ViewAttendanceList.' . $this->ViewAttendanceList->primaryKey => $id));
		return $this->ViewAttendanceList->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->ViewAttendanceList->exists($id)) {
			throw new NotFoundException(__('Invalid view attendance list'));
		}
		$options = array('conditions' => array('ViewAttendanceList.' . $this->ViewAttendanceList->primaryKey => $id));
		$this->set('viewAttendanceList', $this->ViewAttendanceList->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->ViewAttendanceList->exists($id)) {
			throw new NotFoundException(__('Invalid view attendance list'));
		}
		$options = array('conditions' => array('ViewAttendanceList.' . $this->ViewAttendanceList->primaryKey => $id));
		$this->set('viewAttendanceList', $this->ViewAttendanceList->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['ViewAttendanceList']['start_date'])) {
				$this->request->data['ViewAttendanceList']['start_date'] = $this->split_date($this->request->data['ViewAttendanceList']['start_date']);
				$this->request->data['ViewAttendanceList']['end_date'] = $this->split_date($this->request->data['ViewAttendanceList']['end_date']);
			}
			

			$this->ViewAttendanceList->create();
			if ($this->ViewAttendanceList->save($this->request->data)) {
				$this->Session->setFlash(__('The view attendance list has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view attendance list could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
	public function edit($id = null) {
		if (!$this->ViewAttendanceList->exists($id)) {
			throw new NotFoundException(__('Invalid view attendance list'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['ViewAttendanceList']['start_date'])) {
				$this->request->data['ViewAttendanceList']['start_date'] = $this->split_date($this->request->data['ViewAttendanceList']['start_date']);
				$this->request->data['ViewAttendanceList']['end_date'] = $this->split_date($this->request->data['ViewAttendanceList']['end_date']);
			}
			
			if ($this->ViewAttendanceList->save($this->request->data)) {
				$this->Session->setFlash(__('The view attendance list has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view attendance list could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ViewAttendanceList.' . $this->ViewAttendanceList->primaryKey => $id));
			$this->request->data = $this->ViewAttendanceList->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ViewAttendanceList->id = $id;
		if (!$this->ViewAttendanceList->exists()) {
			throw new NotFoundException(__('Invalid view attendance list'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ViewAttendanceList->delete()) {
			$this->Session->setFlash(__('The view attendance list has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The view attendance list could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
