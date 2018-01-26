<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * CourseMaterials Controller
 *
 * @property CourseMaterial $CourseMaterial
 * @property PaginatorComponent $Paginator
 */
class CourseMaterialsController extends RailCompetencyAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		'Paginator', 
		// 'Search.Prg'
		);

/**
 * index method
 *
 * @return void
 */
	public function index() {

		// $this->Prg->commonProcess();
		// $this->Paginator->settings['conditions'] = $this->CourseMaterial->parseCriteria($this->Prg->parsedParams());
		if ($this->request->is('post')) {
			$this->Paginator->settings['conditions'] = array('OR' =>
				array(
					'CourseMaterialType.name like "%'.$this->request->data['CourseMaterial']['queryString'].'%"',
					),
				);
		} else {
			$this->Paginator->settings['conditions'] = array('OR' =>
				array(
					'CourseMaterialType.name like "%'.$this->request->query['queryString'].'%"',
					),
				);
		}
		// $this->Course->parseCriteria($this->Prg->parsedParams());
		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		$this->Paginator->settings['contain'] = array(
                'CourseMaterialType',
                'CourseMaterialPermission',
                'User',
                'Course',
                );
		$this->set('courseMaterials', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->CourseMaterial->recursive = 0;
		// $this->set('courseMaterials', $this->Paginator->paginate());
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
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
		$this->set('courseMaterial', $this->CourseMaterial->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
		return $this->CourseMaterial->find('first', $options);
	}

	public function get_list($course_id = null) {
		
		$options = array('conditions' => array('Course.id' => $course_id));
		return $this->CourseMaterial->find('all', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
		$this->set('courseMaterial', $this->CourseMaterial->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
		$this->set('courseMaterial', $this->CourseMaterial->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			
			$this->CourseMaterial->create();
			if ($this->CourseMaterial->save($this->request->data)) {
				$this->Session->setFlash(__('The course material has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('controller' => 'courses', 'action' => 'view', $this->request->data['CourseMaterial']['course_id'],'tab:CourseMaterials'));

			} else {
				$this->Session->setFlash(__('The course material could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->CourseMaterial->User->find('list');
		$courses = $this->CourseMaterial->Course->find('list');
		$courseMaterialTypes = $this->CourseMaterial->CourseMaterialType->find('list');
		$courseMaterialPermissions = $this->CourseMaterial->CourseMaterialPermission->find('list');
		$this->set(compact('users', 'courses', 'courseMaterialTypes', 'courseMaterialPermissions', 'id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['CourseMaterial']['start_date'])) {
				$this->request->data['CourseMaterial']['start_date'] = $this->split_date($this->request->data['CourseMaterial']['start_date']);
				$this->request->data['CourseMaterial']['end_date'] = $this->split_date($this->request->data['CourseMaterial']['end_date']);
			}
			
			if ($this->CourseMaterial->save($this->request->data)) {
				$this->Session->setFlash(__('The course material has been saved.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('action' => 'index'));
				return $this->redirect(array('controller' => 'courses', 'action' => 'view', $this->request->data['CourseMaterial']['course_id'],'tab:CourseMaterials'));
			} else {
				$this->Session->setFlash(__('The course material could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
			$this->request->data = $this->CourseMaterial->find('first', $options);
		}
		$users = $this->CourseMaterial->User->find('list');
		$courses = $this->CourseMaterial->Course->find('list');
		$courseMaterialTypes = $this->CourseMaterial->CourseMaterialType->find('list');
		$courseMaterialPermissions = $this->CourseMaterial->CourseMaterialPermission->find('list');
		$this->set(compact('users', 'courses', 'courseMaterialTypes', 'courseMaterialPermissions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($course_id = null, $id = null) {
		$this->CourseMaterial->id = $id;
		if (!$this->CourseMaterial->exists()) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CourseMaterial->delete()) {
			$this->Session->setFlash(__('The course material has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The course material could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		//return $this->redirect( $this->referer().'/tab:CourseMaterials' );

		return $this->redirect(array('controller' => 'courses', 'action' => 'view', $course_id,'tab:CourseMaterials'));
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
		$this->Paginator->settings['conditions'] = $this->CourseMaterial->parseCriteria($this->Prg->parsedParams());
		$this->set('courseMaterials', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->CourseMaterial->recursive = 0;
		// $this->set('courseMaterials', $this->Paginator->paginate());
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
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
		$this->set('courseMaterial', $this->CourseMaterial->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
		return $this->CourseMaterial->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
		$this->set('courseMaterial', $this->CourseMaterial->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
		$this->set('courseMaterial', $this->CourseMaterial->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['CourseMaterial']['start_date'])) {
				$this->request->data['CourseMaterial']['start_date'] = $this->admin_split_date($this->request->data['CourseMaterial']['start_date']);
				$this->request->data['CourseMaterial']['end_date'] = $this->admin_split_date($this->request->data['CourseMaterial']['end_date']);
			}
			

			$this->CourseMaterial->create();
			if ($this->CourseMaterial->save($this->request->data)) {
				$this->Session->setFlash(__('The course material has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course material could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->CourseMaterial->User->find('list');
		$courses = $this->CourseMaterial->Course->find('list');
		$courseMaterialTypes = $this->CourseMaterial->CourseMaterialType->find('list');
		$courseMaterialPermissions = $this->CourseMaterial->CourseMaterialPermission->find('list');
		$this->set(compact('users', 'courses', 'courseMaterialTypes', 'courseMaterialPermissions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CourseMaterial->exists($id)) {
			throw new NotFoundException(__('Invalid course material'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['CourseMaterial']['start_date'])) {
				$this->request->data['CourseMaterial']['start_date'] = $this->admin_split_date($this->request->data['CourseMaterial']['start_date']);
				$this->request->data['CourseMaterial']['end_date'] = $this->admin_split_date($this->request->data['CourseMaterial']['end_date']);
			}
			
			if ($this->CourseMaterial->save($this->request->data)) {
				$this->Session->setFlash(__('The course material has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course material could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CourseMaterial.' . $this->CourseMaterial->primaryKey => $id));
			$this->request->data = $this->CourseMaterial->find('first', $options);
		}
		$users = $this->CourseMaterial->User->find('list');
		$courses = $this->CourseMaterial->Course->find('list');
		$courseMaterialTypes = $this->CourseMaterial->CourseMaterialType->find('list');
		$courseMaterialPermissions = $this->CourseMaterial->CourseMaterialPermission->find('list');
		$this->set(compact('users', 'courses', 'courseMaterialTypes', 'courseMaterialPermissions'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CourseMaterial->id = $id;
		if (!$this->CourseMaterial->exists()) {
			throw new NotFoundException(__('Invalid course material'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CourseMaterial->delete()) {
			$this->Session->setFlash(__('The course material has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The course material could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
