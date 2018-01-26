<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * StaffAssignments Controller
 *
 * @property StaffAssignment $StaffAssignment
 * @property PaginatorComponent $Paginator
 */
class StaffAssignmentsController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->StaffAssignment->parseCriteria($this->Prg->parsedParams());
		$this->set('staffAssignments', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffAssignment->recursive = 0;
		// $this->set('staffAssignments', $this->Paginator->paginate());
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
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
		$this->set('staffAssignment', $this->StaffAssignment->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
		return $this->StaffAssignment->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
		$this->set('staffAssignment', $this->StaffAssignment->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
		$this->set('staffAssignment', $this->StaffAssignment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffAssignment']['start_date'])) {
				$this->request->data['StaffAssignment']['start_date'] = $this->split_date($this->request->data['StaffAssignment']['start_date']);
				$this->request->data['StaffAssignment']['end_date'] = $this->split_date($this->request->data['StaffAssignment']['end_date']);
			}
			

			$this->StaffAssignment->create();
			if ($this->StaffAssignment->save($this->request->data)) {
				$this->Session->setFlash(__('The staff assignment has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff assignment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->StaffAssignment->Staff->find('list');
		$services = $this->StaffAssignment->Service->find('list');
		$this->set(compact('staffs', 'services'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffAssignment']['start_date'])) {
				$this->request->data['StaffAssignment']['start_date'] = $this->split_date($this->request->data['StaffAssignment']['start_date']);
				$this->request->data['StaffAssignment']['end_date'] = $this->split_date($this->request->data['StaffAssignment']['end_date']);
			}
			
			if ($this->StaffAssignment->save($this->request->data)) {
				$this->Session->setFlash(__('The staff assignment has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff assignment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
			$this->request->data = $this->StaffAssignment->find('first', $options);
		}
		$staffs = $this->StaffAssignment->Staff->find('list');
		$services = $this->StaffAssignment->Service->find('list');
		$this->set(compact('staffs', 'services'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StaffAssignment->id = $id;
		if (!$this->StaffAssignment->exists()) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffAssignment->delete()) {
			$this->Session->setFlash(__('The staff assignment has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff assignment could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->StaffAssignment->parseCriteria($this->Prg->parsedParams());
		$this->set('staffAssignments', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffAssignment->recursive = 0;
		// $this->set('staffAssignments', $this->Paginator->paginate());
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
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
		$this->set('staffAssignment', $this->StaffAssignment->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
		return $this->StaffAssignment->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
		$this->set('staffAssignment', $this->StaffAssignment->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
		$this->set('staffAssignment', $this->StaffAssignment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffAssignment']['start_date'])) {
				$this->request->data['StaffAssignment']['start_date'] = $this->admin_split_date($this->request->data['StaffAssignment']['start_date']);
				$this->request->data['StaffAssignment']['end_date'] = $this->admin_split_date($this->request->data['StaffAssignment']['end_date']);
			}
			

			$this->StaffAssignment->create();
			if ($this->StaffAssignment->save($this->request->data)) {
				$this->Session->setFlash(__('The staff assignment has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff assignment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->StaffAssignment->Staff->find('list');
		$services = $this->StaffAssignment->Service->find('list');
		$this->set(compact('staffs', 'services'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StaffAssignment->exists($id)) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffAssignment']['start_date'])) {
				$this->request->data['StaffAssignment']['start_date'] = $this->admin_split_date($this->request->data['StaffAssignment']['start_date']);
				$this->request->data['StaffAssignment']['end_date'] = $this->admin_split_date($this->request->data['StaffAssignment']['end_date']);
			}
			
			if ($this->StaffAssignment->save($this->request->data)) {
				$this->Session->setFlash(__('The staff assignment has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff assignment could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffAssignment.' . $this->StaffAssignment->primaryKey => $id));
			$this->request->data = $this->StaffAssignment->find('first', $options);
		}
		$staffs = $this->StaffAssignment->Staff->find('list');
		$services = $this->StaffAssignment->Service->find('list');
		$this->set(compact('staffs', 'services'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->StaffAssignment->id = $id;
		if (!$this->StaffAssignment->exists()) {
			throw new NotFoundException(__('Invalid staff assignment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffAssignment->delete()) {
			$this->Session->setFlash(__('The staff assignment has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff assignment could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
