<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('CoursesController', 'RailCompetency.Controller');
App::uses('EventsController', 'RailCompetency.Controller');
/**
 * EventMemos Controller
 *
 * @property EventMemo $EventMemo
 * @property PaginatorComponent $Paginator
 */
class EventMemosController extends RailCompetencyAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Search.Prg', 'RequestHandler');

/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->EventMemo->parseCriteria($this->Prg->parsedParams());
		$this->set('eventMemos', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventMemo->recursive = 0;
		// $this->set('eventMemos', $this->Paginator->paginate());
	}

	public function ends_with($haystack, $needle)
	{
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }

	    return (substr($haystack, -$length) === $needle);
	}

	public function get_reference_number($status = null) {
		$this->log('EventMemo.get_reference_number: '.$status);
		$count = 1;
		if (empty($status)) $status = 0;
		$options['conditions'] = array('EventMemo.active' => true, 'EventMemo.external' => $status);
		$memos = $this->EventMemo->find('list', $options);

		if (!empty($memos))
			$count = count($memos);

		return $count;
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {

		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}

		$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
		$this->set('eventMemo', $this->EventMemo->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
		return $this->EventMemo->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
		$this->set('eventMemo', $this->EventMemo->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
		$this->set('eventMemo', $this->EventMemo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $external = null, $event_id = null) {
			$this->log('EventMemo.event_id: '.$event_id);
		if ($this->request->is('post')) {
			$this->log('EventMemo.add: '.$this->request->data['EventMemo']['external']);
			if ($this->request->data['EventMemo']['external'] == 0)
				$this->request->data['EventMemo']['ref_number'] = $this->get_reference_number($this->request->data['EventMemo']['external']) + 1;	

			// pr($this->request->data);
			// die();

			$this->EventMemo->create();
			if ($this->EventMemo->save($this->request->data)) {
				if ($this->request->data['EventMemo']['external'] == 1) {
					$ref_number = $this->get_reference_number($this->request->data['EventMemo']['external']);
					$this->EventMemo->saveField("ref_number",$ref_number);
				}
				// marked as memo
				$myEvent = new EventsController;
				$myEvent->is_memo($event_id);

				$this->Session->setFlash(__('The event memo has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The event memo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventMemo->Event->find('list', array('conditions' => array('Event.id' => $id)));
		// get type of the course; external or internal 
		$myCourse = new CoursesController;
		$options['conditions'] = array('Course.id' => $id);
		$course = $myCourse->Course->find('first', $options);
		// pr($course);
		$external = 0;
		if (!empty($course['Course']['external']) || $course['Course']['external'] == 1) {
			$external = $course['Course']['external'];
		}
		$this->set(compact('events', 'id', 'external', 'event_id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->EventMemo->save($this->request->data)) {
				$this->Session->setFlash(__('The event memo has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event memo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
			$this->request->data = $this->EventMemo->find('first', $options);
		}
		$events = $this->EventMemo->Event->find('list');
		$this->set(compact('events'));
	}

	public function modify($event_id = null, $id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->EventMemo->save($this->request->data)) {
				$this->Session->setFlash(__('The event memo has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'events','action' => 'manage', $event_id));
			} else {
				$this->Session->setFlash(__('The event memo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
			$this->request->data = $this->EventMemo->find('first', $options);
			// pr($this->request->data);
		}
		$events = $this->EventMemo->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EventMemo->id = $id;
		if (!$this->EventMemo->exists()) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventMemo->delete()) {
			$this->Session->setFlash(__('The event memo has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event memo could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->EventMemo->parseCriteria($this->Prg->parsedParams());
		$this->set('eventMemos', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventMemo->recursive = 0;
		// $this->set('eventMemos', $this->Paginator->paginate());
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
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
		$this->set('eventMemo', $this->EventMemo->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
		return $this->EventMemo->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
		$this->set('eventMemo', $this->EventMemo->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
		$this->set('eventMemo', $this->EventMemo->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventMemo']['start_date'])) {
				$this->request->data['EventMemo']['start_date'] = $this->admin_split_date($this->request->data['EventMemo']['start_date']);
				$this->request->data['EventMemo']['end_date'] = $this->admin_split_date($this->request->data['EventMemo']['end_date']);
			}
			

			$this->EventMemo->create();
			if ($this->EventMemo->save($this->request->data)) {
				$this->Session->setFlash(__('The event memo has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event memo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventMemo->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EventMemo->exists($id)) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventMemo']['start_date'])) {
				$this->request->data['EventMemo']['start_date'] = $this->admin_split_date($this->request->data['EventMemo']['start_date']);
				$this->request->data['EventMemo']['end_date'] = $this->admin_split_date($this->request->data['EventMemo']['end_date']);
			}
			
			if ($this->EventMemo->save($this->request->data)) {
				$this->Session->setFlash(__('The event memo has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event memo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventMemo.' . $this->EventMemo->primaryKey => $id));
			$this->request->data = $this->EventMemo->find('first', $options);
		}
		$events = $this->EventMemo->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->EventMemo->id = $id;
		if (!$this->EventMemo->exists()) {
			throw new NotFoundException(__('Invalid event memo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventMemo->delete()) {
			$this->Session->setFlash(__('The event memo has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event memo could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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

  	public function confirmed_memo($id = null) {
		$this->autoRender = false;

		$data = array('id' => $id, 'active' => true);
		if ($this->EventMemo->save($data)) {
			$this->Session->setFlash(__('The memo has been saved.'), 'default', array('class' => 'alert alert-success'));
			// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
			return $this->redirect( $this->referer() );
		} else {
			$this->Session->setFlash(__('The memo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function reverted_memo($id = null) {
		$this->autoRender = false;

		$data = array('id' => $id, 'active' => false);
		if ($this->EventMemo->save($data)) {
			$this->Session->setFlash(__('The memo has been saved.'), 'default', array('class' => 'alert alert-success'));
			// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
			return $this->redirect( $this->referer() );
		} else {
			$this->Session->setFlash(__('The memo could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

}
