<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * CourseRequisites Controller
 *
 * @property CourseRequisite $CourseRequisite
 * @property PaginatorComponent $Paginator
 */
class CourseRequisitesController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->CourseRequisite->parseCriteria($this->Prg->parsedParams());
		$this->set('courseRequisites', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->CourseRequisite->recursive = 0;
		// $this->set('courseRequisites', $this->Paginator->paginate());
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
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
		$this->set('courseRequisite', $this->CourseRequisite->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
		return $this->CourseRequisite->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
		$this->set('courseRequisite', $this->CourseRequisite->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
		$this->set('courseRequisite', $this->CourseRequisite->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['CourseRequisite']['start_date'])) {
				$this->request->data['CourseRequisite']['start_date'] = $this->split_date($this->request->data['CourseRequisite']['start_date']);
				$this->request->data['CourseRequisite']['end_date'] = $this->split_date($this->request->data['CourseRequisite']['end_date']);
			}
			

			$this->CourseRequisite->create();
			if ($this->CourseRequisite->save($this->request->data)) {
				$this->Session->setFlash(__('The course requisite has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course requisite could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$courses = $this->CourseRequisite->Course->find('list');
		$prerequisites = $this->CourseRequisite->Prerequisite->find('list');
		$this->set(compact('courses', 'prerequisites'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['CourseRequisite']['start_date'])) {
				$this->request->data['CourseRequisite']['start_date'] = $this->split_date($this->request->data['CourseRequisite']['start_date']);
				$this->request->data['CourseRequisite']['end_date'] = $this->split_date($this->request->data['CourseRequisite']['end_date']);
			}
			
			if ($this->CourseRequisite->save($this->request->data)) {
				$this->Session->setFlash(__('The course requisite has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course requisite could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
			$this->request->data = $this->CourseRequisite->find('first', $options);
		}
		$courses = $this->CourseRequisite->Course->find('list');
		$prerequisites = $this->CourseRequisite->Prerequisite->find('list');
		$this->set(compact('courses', 'prerequisites'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CourseRequisite->id = $id;
		if (!$this->CourseRequisite->exists()) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CourseRequisite->delete()) {
			$this->Session->setFlash(__('The course requisite has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The course requisite could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->CourseRequisite->parseCriteria($this->Prg->parsedParams());
		$this->set('courseRequisites', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->CourseRequisite->recursive = 0;
		// $this->set('courseRequisites', $this->Paginator->paginate());
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
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
		$this->set('courseRequisite', $this->CourseRequisite->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
		return $this->CourseRequisite->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
		$this->set('courseRequisite', $this->CourseRequisite->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
		$this->set('courseRequisite', $this->CourseRequisite->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['CourseRequisite']['start_date'])) {
				$this->request->data['CourseRequisite']['start_date'] = $this->admin_split_date($this->request->data['CourseRequisite']['start_date']);
				$this->request->data['CourseRequisite']['end_date'] = $this->admin_split_date($this->request->data['CourseRequisite']['end_date']);
			}
			

			$this->CourseRequisite->create();
			if ($this->CourseRequisite->save($this->request->data)) {
				$this->Session->setFlash(__('The course requisite has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course requisite could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$courses = $this->CourseRequisite->Course->find('list');
		$prerequisites = $this->CourseRequisite->Prerequisite->find('list');
		$this->set(compact('courses', 'prerequisites'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CourseRequisite->exists($id)) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['CourseRequisite']['start_date'])) {
				$this->request->data['CourseRequisite']['start_date'] = $this->admin_split_date($this->request->data['CourseRequisite']['start_date']);
				$this->request->data['CourseRequisite']['end_date'] = $this->admin_split_date($this->request->data['CourseRequisite']['end_date']);
			}
			
			if ($this->CourseRequisite->save($this->request->data)) {
				$this->Session->setFlash(__('The course requisite has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course requisite could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('CourseRequisite.' . $this->CourseRequisite->primaryKey => $id));
			$this->request->data = $this->CourseRequisite->find('first', $options);
		}
		$courses = $this->CourseRequisite->Course->find('list');
		$prerequisites = $this->CourseRequisite->Prerequisite->find('list');
		$this->set(compact('courses', 'prerequisites'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CourseRequisite->id = $id;
		if (!$this->CourseRequisite->exists()) {
			throw new NotFoundException(__('Invalid course requisite'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CourseRequisite->delete()) {
			$this->Session->setFlash(__('The course requisite has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The course requisite could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
