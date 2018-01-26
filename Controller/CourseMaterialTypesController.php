<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * CourseMaterialTypes Controller
 *
 * @property CourseMaterialType $CourseMaterialType
 * @property PaginatorComponent $Paginator
 */
class CourseMaterialTypesController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->CourseMaterialType->parseCriteria($this->Prg->parsedParams());
		$this->set('courseMaterialTypes', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->CourseMaterialType->recursive = 0;
		// $this->set('courseMaterialTypes', $this->Paginator->paginate());
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
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
		$this->set('courseMaterialType', $this->CourseMaterialType->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
		return $this->CourseMaterialType->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
		$this->set('courseMaterialType', $this->CourseMaterialType->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
		$this->set('courseMaterialType', $this->CourseMaterialType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['CourseMaterialType']['start_date'])) {
				$this->request->data['CourseMaterialType']['start_date'] = $this->split_date($this->request->data['CourseMaterialType']['start_date']);
				$this->request->data['CourseMaterialType']['end_date'] = $this->split_date($this->request->data['CourseMaterialType']['end_date']);
			}
			

			$this->CourseMaterialType->create();
			if ($this->CourseMaterialType->save($this->request->data)) {
				$this->Session->setFlash(__('The course material type has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course material type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['CourseMaterialType']['start_date'])) {
				$this->request->data['CourseMaterialType']['start_date'] = $this->split_date($this->request->data['CourseMaterialType']['start_date']);
				$this->request->data['CourseMaterialType']['end_date'] = $this->split_date($this->request->data['CourseMaterialType']['end_date']);
			}
			
			if ($this->CourseMaterialType->save($this->request->data)) {
				$this->Session->setFlash(__('The course material type has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course material type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
			$this->request->data = $this->CourseMaterialType->find('first', $options);
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
		$this->CourseMaterialType->id = $id;
		if (!$this->CourseMaterialType->exists()) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CourseMaterialType->delete()) {
			$this->Session->setFlash(__('The course material type has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The course material type could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->CourseMaterialType->parseCriteria($this->Prg->parsedParams());
		$this->set('courseMaterialTypes', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->CourseMaterialType->recursive = 0;
		// $this->set('courseMaterialTypes', $this->Paginator->paginate());
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
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
		$this->set('courseMaterialType', $this->CourseMaterialType->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
		return $this->CourseMaterialType->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
		$this->set('courseMaterialType', $this->CourseMaterialType->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
		$this->set('courseMaterialType', $this->CourseMaterialType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['CourseMaterialType']['start_date'])) {
				$this->request->data['CourseMaterialType']['start_date'] = $this->admin_split_date($this->request->data['CourseMaterialType']['start_date']);
				$this->request->data['CourseMaterialType']['end_date'] = $this->admin_split_date($this->request->data['CourseMaterialType']['end_date']);
			}
			

			$this->CourseMaterialType->create();
			if ($this->CourseMaterialType->save($this->request->data)) {
				$this->Session->setFlash(__('The course material type has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course material type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CourseMaterialType->exists($id)) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['CourseMaterialType']['start_date'])) {
				$this->request->data['CourseMaterialType']['start_date'] = $this->admin_split_date($this->request->data['CourseMaterialType']['start_date']);
				$this->request->data['CourseMaterialType']['end_date'] = $this->admin_split_date($this->request->data['CourseMaterialType']['end_date']);
			}
			
			if ($this->CourseMaterialType->save($this->request->data)) {
				$this->Session->setFlash(__('The course material type has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course material type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CourseMaterialType.' . $this->CourseMaterialType->primaryKey => $id));
			$this->request->data = $this->CourseMaterialType->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CourseMaterialType->id = $id;
		if (!$this->CourseMaterialType->exists()) {
			throw new NotFoundException(__('Invalid course material type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CourseMaterialType->delete()) {
			$this->Session->setFlash(__('The course material type has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The course material type could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
