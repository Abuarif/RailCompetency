<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * EventAttachments Controller
 *
 * @property EventAttachment $EventAttachment
 * @property PaginatorComponent $Paginator
 */
class EventAttachmentsController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->EventAttachment->parseCriteria($this->Prg->parsedParams());
		$this->set('eventAttachments', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventAttachment->recursive = 0;
		// $this->set('eventAttachments', $this->Paginator->paginate());
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
		if (!$this->EventAttachment->exists($id)) {
			throw new NotFoundException(__('Invalid event attachment'));
		}
		$options = array('conditions' => array('EventAttachment.' . $this->EventAttachment->primaryKey => $id));
		$this->set('eventAttachment', $this->EventAttachment->find('first', $options));
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('EventAttachment.' . $this->EventAttachment->primaryKey => $id));
		return $this->EventAttachment->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->EventAttachment->exists($id)) {
			throw new NotFoundException(__('Invalid event attachment'));
		}
		$options = array('conditions' => array('EventAttachment.' . $this->EventAttachment->primaryKey => $id));
		$this->set('eventAttachment', $this->EventAttachment->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->EventAttachment->exists($id)) {
			throw new NotFoundException(__('Invalid event attachment'));
		}
		$options = array('conditions' => array('EventAttachment.' . $this->EventAttachment->primaryKey => $id));
		$this->set('eventAttachment', $this->EventAttachment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventAttachment']['start_date'])) {
				$this->request->data['EventAttachment']['start_date'] = $this->split_date($this->request->data['EventAttachment']['start_date']);
				$this->request->data['EventAttachment']['end_date'] = $this->split_date($this->request->data['EventAttachment']['end_date']);
			}
			

			$this->EventAttachment->create();
			if ($this->EventAttachment->save($this->request->data)) {
				$this->Session->setFlash(__('The event attachment has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attachment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventAttachment->Event->find('list');
		$this->set(compact('events'));
	}

	public function upload($event_id = null) {
		if ($this->request->is('post')) {

			$this->request->data['EventAttachment']['event_id'] = $event_id;

			if (isset($this->request->data['EventAttachment']['start_date'])) {
				$this->request->data['EventAttachment']['start_date'] = $this->split_date($this->request->data['EventAttachment']['start_date']);
				$this->request->data['EventAttachment']['end_date'] = $this->split_date($this->request->data['EventAttachment']['end_date']);
			}
			

			$this->EventAttachment->create();
			if ($this->EventAttachment->save($this->request->data)) {
				$this->Session->setFlash(__('The event attachment has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect($this->referer()	);
			} else {
				$this->Session->setFlash(__('The event attachment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventAttachment->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventAttachment->exists($id)) {
			throw new NotFoundException(__('Invalid event attachment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventAttachment']['start_date'])) {
				$this->request->data['EventAttachment']['start_date'] = $this->split_date($this->request->data['EventAttachment']['start_date']);
				$this->request->data['EventAttachment']['end_date'] = $this->split_date($this->request->data['EventAttachment']['end_date']);
			}
			
			if ($this->EventAttachment->save($this->request->data)) {
				$this->Session->setFlash(__('The event attachment has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attachment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventAttachment.' . $this->EventAttachment->primaryKey => $id));
			$this->request->data = $this->EventAttachment->find('first', $options);
		}
		$events = $this->EventAttachment->Event->find('list');
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
		$this->EventAttachment->id = $id;
		if (!$this->EventAttachment->exists()) {
			throw new NotFoundException(__('Invalid event attachment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventAttachment->delete()) {
			$this->Session->setFlash(__('The event attachment has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event attachment could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect($this->referer());
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
