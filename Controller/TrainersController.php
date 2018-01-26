<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('ExpertiseLevelsController', 'RailCompetency.Controller');
/**
 * Trainers Controller
 *
 * @property Trainer $Trainer
 * @property PaginatorComponent $Paginator
 */
class TrainersController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->Trainer->parseCriteria($this->Prg->parsedParams());
		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		$this->set('trainers', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Trainer->recursive = 0;
		// $this->set('trainers', $this->Paginator->paginate());
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
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
		$this->set('trainer', $this->Trainer->find('first', $options));
	}

	public function object($id = null) {
		// if (!$this->Trainer->exists($id)) {
		// 	throw new NotFoundException(__('Invalid trainer'));
		// }
		$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
		return $this->Trainer->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
		$this->set('trainer', $this->Trainer->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
		$this->set('trainer', $this->Trainer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->Trainer->create();
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$options = array(
				'fields' => array('Staff.id', 'Staff.name', 'Staff.staff_no'),
				'order' => 'Staff.staff_no ASC'
				);
		$staffs = $this->Trainer->Staff->find('all', $options);
		$staffs = Set::combine($staffs, '{n}.Staff.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name'));
		
		// $staffs = $this->Trainer->Staff->find('list');
		$options = array(
				'fields' => array('Course.id', 'Course.name', 'Course.code'),
				'order' => 'Course.code ASC'
				);
		$courses = $this->Trainer->Course->find('all', $options);
		$courses = Set::combine($courses, '{n}.Course.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
		
		// $courses = $this->Trainer->Course->find('list');
		$this->set(compact('staffs', 'courses'));
	}


	public function add_trainer($staff_id = null) {
		if ($this->request->is('post')) {
			
			$this->Trainer->create();
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('controller' => 'staffs', 'action' => 'view', $staff_id, 'tab:Trainers'));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$options = array(
				'fields' => array('Staff.id', 'Staff.name', 'Staff.staff_no'),
				'conditions' => array('Staff.id' => $staff_id),
				'order' => 'Staff.staff_no ASC'
				);
		$staffs = $this->Trainer->Staff->find('all', $options);
		$staffs = Set::combine($staffs, '{n}.Staff.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name'));
		
		// $staffs = $this->Trainer->Staff->find('list');
		$options = array(
				'fields' => array('Course.id', 'Course.name', 'Course.code'),
				'order' => 'Course.code ASC'
				);
		$courses = $this->Trainer->Course->find('all', $options);
		$courses = Set::combine($courses, '{n}.Course.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
		
		$expert = new ExpertiseLevelsController;
		$expertise_levels = $expert->ExpertiseLevel->find('list');
		// $courses = $this->Trainer->Course->find('list');
		$this->set(compact('staffs', 'courses', 'expertise_levels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
			$this->request->data = $this->Trainer->find('first', $options);
		}
		$staffs = $this->Trainer->Staff->find('list');
		$courses = $this->Trainer->Course->find('list');
		$this->set(compact('staffs', 'courses'));
	}

	public function edit_staff($profile_id = null, $course_id = null, $staff_id = null) {
		
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'staffs', 'action' => 'view', $staff_id));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Trainer.staff_id' => $staff_id));
			$this->request->data = $this->Trainer->find('first', $options);
		}
		$options = array('conditions' => array('Staff.id' => $staff_id));
		$staffs = $this->Trainer->Staff->find('list', $options);
		$options = array('conditions' => array('Course.id' => $course_id));
		$courses = $this->Trainer->Course->find('list', $options);
		$expertise_levels = $this->Trainer->ExpertiseLevel->find('list');
		$this->set(compact('staffs', 'courses', 'expertise_levels', 'profile_id'));
	}

	public function edit_course($profile_id = null, $course_id = null, $staff_id = null) {
		
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'courses', 'action' => 'view', $course_id));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Trainer.staff_id' => $staff_id));
			$this->request->data = $this->Trainer->find('first', $options);
		}
		$options = array('conditions' => array('Staff.id' => $staff_id));
		$staffs = $this->Trainer->Staff->find('list', $options);
		$options = array('conditions' => array('Course.id' => $course_id));
		$courses = $this->Trainer->Course->find('list', $options);
		$expertise_levels = $this->Trainer->ExpertiseLevel->find('list');
		$this->set(compact('staffs', 'courses', 'expertise_levels', 'profile_id'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		// $this->request->allowMethod('post', 'delete');
		if ($this->Trainer->delete($id)) {
			$this->Session->setFlash(__('The trainer has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The trainer could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller' => 'trainers', 'action' => 'index'));
	}

	public function remove($id = null, $staff_id = null) {
		$this->log('trainer remove: '.$id);
		
		// $this->request->allowMethod('post', 'delete');
		if ($this->Trainer->delete($id)) {
			$this->Session->setFlash(__('The trainer has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The trainer could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller' => 'staffs', 'action' => 'view', $staff_id, 'tab:Trainers'));
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
		$this->Paginator->settings['conditions'] = $this->Trainer->parseCriteria($this->Prg->parsedParams());
		$this->set('trainers', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Trainer->recursive = 0;
		// $this->set('trainers', $this->Paginator->paginate());
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
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
		$this->set('trainer', $this->Trainer->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
		return $this->Trainer->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
		$this->set('trainer', $this->Trainer->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
		$this->set('trainer', $this->Trainer->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Trainer']['start_date'])) {
				$this->request->data['Trainer']['start_date'] = $this->admin_split_date($this->request->data['Trainer']['start_date']);
				$this->request->data['Trainer']['end_date'] = $this->admin_split_date($this->request->data['Trainer']['end_date']);
			}
			

			$this->Trainer->create();
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->Trainer->Staff->find('list');
		$courses = $this->Trainer->Course->find('list');
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
		if (!$this->Trainer->exists($id)) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Trainer']['start_date'])) {
				$this->request->data['Trainer']['start_date'] = $this->admin_split_date($this->request->data['Trainer']['start_date']);
				$this->request->data['Trainer']['end_date'] = $this->admin_split_date($this->request->data['Trainer']['end_date']);
			}
			
			if ($this->Trainer->save($this->request->data)) {
				$this->Session->setFlash(__('The trainer has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trainer could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Trainer.' . $this->Trainer->primaryKey => $id));
			$this->request->data = $this->Trainer->find('first', $options);
		}
		$staffs = $this->Trainer->Staff->find('list');
		$courses = $this->Trainer->Course->find('list');
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
		$this->Trainer->id = $id;
		if (!$this->Trainer->exists()) {
			throw new NotFoundException(__('Invalid trainer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Trainer->delete()) {
			$this->Session->setFlash(__('The trainer has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The trainer could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
