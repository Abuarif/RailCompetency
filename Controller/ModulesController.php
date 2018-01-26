<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * Modules Controller
 *
 * @property Module $Module
 * @property PaginatorComponent $Paginator
 */
class ModulesController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->Module->parseCriteria($this->Prg->parsedParams());
		$this->set('modules', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Module->recursive = 0;
		// $this->set('modules', $this->Paginator->paginate());
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
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
		$this->set('module', $this->Module->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
		return $this->Module->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
		$this->set('module', $this->Module->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
		$this->set('module', $this->Module->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Module']['start_date'])) {
				$this->request->data['Module']['start_date'] = $this->split_date($this->request->data['Module']['start_date']);
				$this->request->data['Module']['end_date'] = $this->split_date($this->request->data['Module']['end_date']);
			}
			

			$this->Module->create();
			if ($this->Module->save($this->request->data)) {
				$this->Session->setFlash(__('The module has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$parentModules = $this->Module->ParentModule->find('list');
		$this->set(compact('parentModules'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Module']['start_date'])) {
				$this->request->data['Module']['start_date'] = $this->split_date($this->request->data['Module']['start_date']);
				$this->request->data['Module']['end_date'] = $this->split_date($this->request->data['Module']['end_date']);
			}
			
			if ($this->Module->save($this->request->data)) {
				$this->Session->setFlash(__('The module has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
			$this->request->data = $this->Module->find('first', $options);
		}
		$parentModules = $this->Module->ParentModule->find('list');
		$this->set(compact('parentModules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Module->id = $id;
		if (!$this->Module->exists()) {
			throw new NotFoundException(__('Invalid module'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Module->delete()) {
			$this->Session->setFlash(__('The module has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The module could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->Module->parseCriteria($this->Prg->parsedParams());
		$this->set('modules', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Module->recursive = 0;
		// $this->set('modules', $this->Paginator->paginate());
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
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
		$this->set('module', $this->Module->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
		return $this->Module->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
		$this->set('module', $this->Module->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
		$this->set('module', $this->Module->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Module']['start_date'])) {
				$this->request->data['Module']['start_date'] = $this->admin_split_date($this->request->data['Module']['start_date']);
				$this->request->data['Module']['end_date'] = $this->admin_split_date($this->request->data['Module']['end_date']);
			}
			

			$this->Module->create();
			if ($this->Module->save($this->request->data)) {
				$this->Session->setFlash(__('The module has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$parentModules = $this->Module->ParentModule->find('list');
		$this->set(compact('parentModules'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Module->exists($id)) {
			throw new NotFoundException(__('Invalid module'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Module']['start_date'])) {
				$this->request->data['Module']['start_date'] = $this->admin_split_date($this->request->data['Module']['start_date']);
				$this->request->data['Module']['end_date'] = $this->admin_split_date($this->request->data['Module']['end_date']);
			}
			
			if ($this->Module->save($this->request->data)) {
				$this->Session->setFlash(__('The module has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Module.' . $this->Module->primaryKey => $id));
			$this->request->data = $this->Module->find('first', $options);
		}
		$parentModules = $this->Module->ParentModule->find('list');
		$this->set(compact('parentModules'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Module->id = $id;
		if (!$this->Module->exists()) {
			throw new NotFoundException(__('Invalid module'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Module->delete()) {
			$this->Session->setFlash(__('The module has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The module could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
