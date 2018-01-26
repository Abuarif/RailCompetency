<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('EventAttendancesController', 'RailCompetency.Controller');
App::uses('EventsController', 'RailCompetency.Controller');
App::uses('StaffsController', 'RailCompetency.Controller');
/**
 * EventAttendanceDetails Controller
 *
 * @property EventAttendanceDetail $EventAttendanceDetail
 * @property PaginatorComponent $Paginator
 */
class EventAttendanceDetailsController extends RailCompetencyAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Search.Prg');

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->EventAttendanceDetail->parseCriteria($this->Prg->parsedParams());
		$this->set('eventAttendanceDetails', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventAttendanceDetail->recursive = 0;
		// $this->set('eventAttendanceDetails', $this->Paginator->paginate());
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
		if (!$this->EventAttendanceDetail->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
		$this->set('eventAttendanceDetail', $this->EventAttendanceDetail->find('first', $options));
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
		return $this->EventAttendanceDetail->find('first', $options);
	}

	public function detail($event_id = null, $staff_id = null, $day = null) {
		
		$options = array('conditions' => array('EventAttendanceDetail.event_id' => $event_id, 'EventAttendanceDetail.staff_id' => $staff_id, 'EventAttendanceDetail.day' => $day ));
		return $this->EventAttendanceDetail->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->EventAttendanceDetail->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
		$this->set('eventAttendanceDetail', $this->EventAttendanceDetail->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->EventAttendanceDetail->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
		$this->set('eventAttendanceDetail', $this->EventAttendanceDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventAttendanceDetail']['start_date'])) {
				$this->request->data['EventAttendanceDetail']['start_date'] = $this->split_date($this->request->data['EventAttendanceDetail']['start_date']);
				$this->request->data['EventAttendanceDetail']['end_date'] = $this->split_date($this->request->data['EventAttendanceDetail']['end_date']);
			}
			

			$this->EventAttendanceDetail->create();
			if ($this->EventAttendanceDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance detail has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attendance detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventAttendanceDetail->Event->find('list');
		$eventAttendances = $this->EventAttendanceDetail->EventAttendance->find('list');
		$staffs = $this->EventAttendanceDetail->Staff->find('list');
		$this->set(compact('events', 'eventAttendances', 'staffs'));
	}

	public function daily($event_id = null, $event_attendance_id = null, $staff_id = null, $day = null, $option = null, $event_attendance_detail_id = null) {
		$this->autoRender = false;

		if ($this->request->is('post')) {

			if ($option == 0) {
				// $this->log('cancel');
				$data['EventAttendanceDetail'] = array('id' => $event_attendance_detail_id, 'event_id' => $event_id, 'event_attendance_id' => $event_attendance_id, 'staff_id' => $staff_id, 'day' => $day, 'active' => 0);
			} else if ($option == 1) {
				// $this->log('confirm');
				$data['EventAttendanceDetail'] = array('id' => $event_attendance_detail_id, 'event_id' => $event_id, 'event_attendance_id' => $event_attendance_id, 'staff_id' => $staff_id, 'day' => $day, 'active' => 1);
			} else if ($option == 2) {
				// $this->log('confirm');
				$data['EventAttendanceDetail'] = array('event_id' => $event_id, 'event_attendance_id' => $event_attendance_id, 'staff_id' => $staff_id, 'day' => $day, 'active' => 1);
			}

			// $this->log($data);

			$this->EventAttendanceDetail->create();
			if ($this->EventAttendanceDetail->save($data)) {
				$this->Session->setFlash(__('The attendance has been updated.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
				$this->log('saved');
				return $this->redirect( array('controller' => 'events', 'action' => 'attendance',$event_id,'tab:Participants'));
			} else {
				$this->log('failed');
				$this->Session->setFlash(__('The attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	public function daily2($event_id = null, $event_attendance_id = null, $staff_id = null, $day = null, $option = null, $event_attendance_detail_id = null) {
		$this->autoRender = false;

		if($this->RequestHandler->isAjax()){
		    Configure::write('debug', 0);
		}

		if ($this->request->is('post')) {

			if ($option == 0) {
				$this->log('cancel');
				$data['EventAttendanceDetail'] = array('id' => $event_attendance_detail_id, 'event_id' => $event_id, 'event_attendance_id' => $event_attendance_id, 'staff_id' => $staff_id, 'day' => $day, 'active' => 0);
			} else if ($option == 1) {
				$this->log('confirm');
				$data['EventAttendanceDetail'] = array('id' => $event_attendance_detail_id, 'event_id' => $event_id, 'event_attendance_id' => $event_attendance_id, 'staff_id' => $staff_id, 'day' => $day, 'active' => 1);
			} else if ($option == 2) {
				$this->log('confirm');
				$data['EventAttendanceDetail'] = array('event_id' => $event_id, 'event_attendance_id' => $event_attendance_id, 'staff_id' => $staff_id, 'day' => $day, 'active' => 1);
			}

			$this->log($data);

			$this->EventAttendanceDetail->create();
			if ($this->EventAttendanceDetail->save($data)) {
				$this->Session->setFlash(__('The attendance has been updated.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
				$this->log('saved');
				return $this->redirect( array('controller' => 'events', 'action' => 'attendance',$event_id,'tab:Participants'));
			} else {
				$this->log('failed');
				$this->Session->setFlash(__('The attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	public function daily_update($event_id = null, $day = null) {

		if ($this->request->is('post')) {
			$this->log($this->request->data['EventAttendanceDetail']);
			$this->EventAttendanceDetail->create();
			if ($this->EventAttendanceDetail->saveAll($this->request->data['EventAttendanceDetail'])) {
				$this->Session->setFlash(__('The attendance has been updated.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
				$this->log('saved');
			} else {
				$this->log('failed');
				$this->Session->setFlash(__('The attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
			return $this->redirect( array('controller' => 'events', 'action' => 'attendance',$event_id,'tab:Participants'));
		} 
			$event = new EventsController;
			$attendance = new EventAttendancesController;

			$options['conditions'] = array('Event.id' => $event_id);
			$myEvent = $event->Event->find('first', $options);

			$options['conditions'] = array('EventAttendance.event_id' => $myEvent['Event']['id']);
			$myAttendances = $attendance->EventAttendance->find('all', $options);

			$this->set(compact('day', 'myEvent', 'myAttendances'));

	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventAttendanceDetail->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventAttendanceDetail']['start_date'])) {
				$this->request->data['EventAttendanceDetail']['start_date'] = $this->split_date($this->request->data['EventAttendanceDetail']['start_date']);
				$this->request->data['EventAttendanceDetail']['end_date'] = $this->split_date($this->request->data['EventAttendanceDetail']['end_date']);
			}
			
			if ($this->EventAttendanceDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance detail has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attendance detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
			$this->request->data = $this->EventAttendanceDetail->find('first', $options);
		}
		$events = $this->EventAttendanceDetail->Event->find('list');
		$eventAttendances = $this->EventAttendanceDetail->EventAttendance->find('list');
		$staffs = $this->EventAttendanceDetail->Staff->find('list');
		$this->set(compact('events', 'eventAttendances', 'staffs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EventAttendanceDetail->id = $id;
		if (!$this->EventAttendanceDetail->exists()) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventAttendanceDetail->delete()) {
			$this->Session->setFlash(__('The event attendance detail has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event attendance detail could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->EventAttendanceDetail->parseCriteria($this->Prg->parsedParams());
		$this->set('eventAttendanceDetails', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventAttendanceDetail->recursive = 0;
		// $this->set('eventAttendanceDetails', $this->Paginator->paginate());
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
		if (!$this->EventAttendanceDetail->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
		$this->set('eventAttendanceDetail', $this->EventAttendanceDetail->find('first', $options));
	}

	public function admin_object($id = null) {
		
		$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
		return $this->EventAttendanceDetail->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->EventAttendanceDetail->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
		$this->set('eventAttendanceDetail', $this->EventAttendanceDetail->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->EventAttendanceDetail->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
		$this->set('eventAttendanceDetail', $this->EventAttendanceDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventAttendanceDetail']['start_date'])) {
				$this->request->data['EventAttendanceDetail']['start_date'] = $this->admin_split_date($this->request->data['EventAttendanceDetail']['start_date']);
				$this->request->data['EventAttendanceDetail']['end_date'] = $this->admin_split_date($this->request->data['EventAttendanceDetail']['end_date']);
			}
			

			$this->EventAttendanceDetail->create();
			if ($this->EventAttendanceDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance detail has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attendance detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventAttendanceDetail->Event->find('list');
		$eventAttendances = $this->EventAttendanceDetail->EventAttendance->find('list');
		$staffs = $this->EventAttendanceDetail->Staff->find('list');
		$this->set(compact('events', 'eventAttendances', 'staffs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EventAttendanceDetail->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventAttendanceDetail']['start_date'])) {
				$this->request->data['EventAttendanceDetail']['start_date'] = $this->admin_split_date($this->request->data['EventAttendanceDetail']['start_date']);
				$this->request->data['EventAttendanceDetail']['end_date'] = $this->admin_split_date($this->request->data['EventAttendanceDetail']['end_date']);
			}
			
			if ($this->EventAttendanceDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance detail has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attendance detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventAttendanceDetail.' . $this->EventAttendanceDetail->primaryKey => $id));
			$this->request->data = $this->EventAttendanceDetail->find('first', $options);
		}
		$events = $this->EventAttendanceDetail->Event->find('list');
		$eventAttendances = $this->EventAttendanceDetail->EventAttendance->find('list');
		$staffs = $this->EventAttendanceDetail->Staff->find('list');
		$this->set(compact('events', 'eventAttendances', 'staffs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->EventAttendanceDetail->id = $id;
		if (!$this->EventAttendanceDetail->exists()) {
			throw new NotFoundException(__('Invalid event attendance detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventAttendanceDetail->delete()) {
			$this->Session->setFlash(__('The event attendance detail has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event attendance detail could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
