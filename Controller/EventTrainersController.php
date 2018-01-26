<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('TrainersController', 'RailCompetency.Controller');
/**
 * EventTrainers Controller
 *
 * @property EventTrainer $EventTrainer
 * @property PaginatorComponent $Paginator
 */
class EventTrainersController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->EventTrainer->parseCriteria($this->Prg->parsedParams());
		$this->set('eventTrainers', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventTrainer->recursive = 0;
		// $this->set('eventTrainers', $this->Paginator->paginate());
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
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
		$this->set('eventTrainer', $this->EventTrainer->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
		return $this->EventTrainer->find('first', $options);
	}

	public function get_trainers($event_id = null) {
		$options = array('conditions' => array('EventTrainer.event_id' => $event_id));
		return $this->EventTrainer->find('all', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
		$this->set('eventTrainer', $this->EventTrainer->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
		$this->set('eventTrainer', $this->EventTrainer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventTrainer']['start_date'])) {
				$this->request->data['EventTrainer']['start_date'] = $this->split_date($this->request->data['EventTrainer']['start_date']);
				$this->request->data['EventTrainer']['end_date'] = $this->split_date($this->request->data['EventTrainer']['end_date']);
			}
			

			$this->EventTrainer->create();
			if ($this->EventTrainer->save($this->request->data)) {
				$this->Session->setFlash(__('The event trainer has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventTrainer->Event->find('list');
		$courses = $this->EventTrainer->Course->find('list');
		$trainers = $this->EventTrainer->Trainer->find('list');
		$this->set(compact('events', 'courses', 'trainers'));
	}

	public function assign($event_id = null, $course_id = null) {
		if ($this->request->is('post')) {

			// print_r($this->request->data);

			$this->EventTrainer->create();
			if ($this->EventTrainer->save($this->request->data)) {
				$this->Session->setFlash(__('The event trainer has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('controller' => 'events', 'action' => 'manage', $event_id,'tab:Trainers'));
				// return $this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The event trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$options = array(
			'conditions' => array(
				'Event.id' => $event_id
				)
			);
		$events = $this->EventTrainer->Event->find('list', $options);
		$options = array(
			'conditions' => array(
				'Course.id' => $course_id
				)
			);
		$courses = $this->EventTrainer->Course->find('list', $options);

		// $options = array(
		// 	'conditions' => array('Trainer.course_id' => $course_id)
		// 	);
		$myTrainer = new TrainersController;
		// $trainers = $myTrainer->Trainer->find('list'
		// 	, $options
		// 	);
		// print_r($trainers);

		$options = array(
			'joins' => array(
							array('table' => 'staffs',
							    'alias' => 'Staff',
							    // 'type' => 'left',
							    'conditions' => array(
							        'Staff.id = Trainer.staff_id',
							    ),
								'fields' => array('DISTINCT Staff.id')
							  )
							),
			'conditions' => array('Trainer.course_id' => $course_id),
			'fields' => array('Trainer.id', 'Staff.staff_no', 'Staff.name', 'Trainer.is_preferred'),
			'order' => 'Staff.name ASC'
			);
		$trainers = $myTrainer->Trainer->find('all', $options);
		$trainers = Set::combine($trainers, '{n}.Trainer.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name' , '{n}.Trainer.is_preferred'));


		foreach ($events as $key => $value) {
			$event_id = $value;
		};

		$this->set(compact('event_id', 'courses', 'trainers'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventTrainer']['start_date'])) {
				$this->request->data['EventTrainer']['start_date'] = $this->split_date($this->request->data['EventTrainer']['start_date']);
				$this->request->data['EventTrainer']['end_date'] = $this->split_date($this->request->data['EventTrainer']['end_date']);
			}
			
			if ($this->EventTrainer->save($this->request->data)) {
				$this->Session->setFlash(__('The event trainer has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
			$this->request->data = $this->EventTrainer->find('first', $options);
		}
		$events = $this->EventTrainer->Event->find('list');
		$courses = $this->EventTrainer->Course->find('list');
		$staffs = $this->EventTrainer->Staff->find('list');
		$this->set(compact('events', 'courses', 'staffs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $event_id = null) {
		$this->EventTrainer->id = $id;
		if (!$this->EventTrainer->exists()) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		// $this->request->allowMethod('post', 'delete');
		if ($this->EventTrainer->delete()) {
			$this->Session->setFlash(__('The event trainer has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event trainer could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller' => 'events', 'action' => 'manage', $event_id,'tab:Trainers'));
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
		$this->Paginator->settings['conditions'] = $this->EventTrainer->parseCriteria($this->Prg->parsedParams());
		$this->set('eventTrainers', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventTrainer->recursive = 0;
		// $this->set('eventTrainers', $this->Paginator->paginate());
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
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
		$this->set('eventTrainer', $this->EventTrainer->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
		return $this->EventTrainer->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
		$this->set('eventTrainer', $this->EventTrainer->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
		$this->set('eventTrainer', $this->EventTrainer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventTrainer']['start_date'])) {
				$this->request->data['EventTrainer']['start_date'] = $this->admin_split_date($this->request->data['EventTrainer']['start_date']);
				$this->request->data['EventTrainer']['end_date'] = $this->admin_split_date($this->request->data['EventTrainer']['end_date']);
			}
			

			$this->EventTrainer->create();
			if ($this->EventTrainer->save($this->request->data)) {
				$this->Session->setFlash(__('The event trainer has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventTrainer->Event->find('list');
		$courses = $this->EventTrainer->Course->find('list');
		$staffs = $this->EventTrainer->Staff->find('list');
		$this->set(compact('events', 'courses', 'staffs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EventTrainer->exists($id)) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventTrainer']['start_date'])) {
				$this->request->data['EventTrainer']['start_date'] = $this->admin_split_date($this->request->data['EventTrainer']['start_date']);
				$this->request->data['EventTrainer']['end_date'] = $this->admin_split_date($this->request->data['EventTrainer']['end_date']);
			}
			
			if ($this->EventTrainer->save($this->request->data)) {
				$this->Session->setFlash(__('The event trainer has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventTrainer.' . $this->EventTrainer->primaryKey => $id));
			$this->request->data = $this->EventTrainer->find('first', $options);
		}
		$events = $this->EventTrainer->Event->find('list');
		$courses = $this->EventTrainer->Course->find('list');
		$staffs = $this->EventTrainer->Staff->find('list');
		$this->set(compact('events', 'courses', 'staffs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->EventTrainer->id = $id;
		if (!$this->EventTrainer->exists()) {
			throw new NotFoundException(__('Invalid event trainer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventTrainer->delete()) {
			$this->Session->setFlash(__('The event trainer has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event trainer could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
