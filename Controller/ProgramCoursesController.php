<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * ProgramCourses Controller
 *
 * @property ProgramCourse $ProgramCourse
 * @property PaginatorComponent $Paginator
 */
class ProgramCoursesController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->ProgramCourse->parseCriteria($this->Prg->parsedParams());
		$this->set('programCourses', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->ProgramCourse->recursive = 0;
		// $this->set('programCourses', $this->Paginator->paginate());
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
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
		$this->set('programCourse', $this->ProgramCourse->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
		return $this->ProgramCourse->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
		$this->set('programCourse', $this->ProgramCourse->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
		$this->set('programCourse', $this->ProgramCourse->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['ProgramCourse']['start_date'])) {
				$this->request->data['ProgramCourse']['start_date'] = $this->split_date($this->request->data['ProgramCourse']['start_date']);
				$this->request->data['ProgramCourse']['end_date'] = $this->split_date($this->request->data['ProgramCourse']['end_date']);
			}
			

			$this->ProgramCourse->create();
			if ($this->ProgramCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The program course has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program course could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$programs = $this->ProgramCourse->Program->find('list');
		$courses = $this->ProgramCourse->Course->find('list');
		$this->set(compact('programs', 'courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['ProgramCourse']['start_date'])) {
				$this->request->data['ProgramCourse']['start_date'] = $this->split_date($this->request->data['ProgramCourse']['start_date']);
				$this->request->data['ProgramCourse']['end_date'] = $this->split_date($this->request->data['ProgramCourse']['end_date']);
			}
			
			if ($this->ProgramCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The program course has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program course could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
			$this->request->data = $this->ProgramCourse->find('first', $options);
		}
		$programs = $this->ProgramCourse->Program->find('list');
		$courses = $this->ProgramCourse->Course->find('list');
		$this->set(compact('programs', 'courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ProgramCourse->id = $id;
		if (!$this->ProgramCourse->exists()) {
			throw new NotFoundException(__('Invalid program course'));
		}
		// $this->request->allowMethod('post', 'delete');
		if ($this->ProgramCourse->delete()) {
			$this->Session->setFlash(__('The program course has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The program course could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect($this->referer());
		// return $this->redirect(array('controller' => 'programs', 'action' => 'view'));
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
		$this->Paginator->settings['conditions'] = $this->ProgramCourse->parseCriteria($this->Prg->parsedParams());
		$this->set('programCourses', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->ProgramCourse->recursive = 0;
		// $this->set('programCourses', $this->Paginator->paginate());
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
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
		$this->set('programCourse', $this->ProgramCourse->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
		return $this->ProgramCourse->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
		$this->set('programCourse', $this->ProgramCourse->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
		$this->set('programCourse', $this->ProgramCourse->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['ProgramCourse']['start_date'])) {
				$this->request->data['ProgramCourse']['start_date'] = $this->admin_split_date($this->request->data['ProgramCourse']['start_date']);
				$this->request->data['ProgramCourse']['end_date'] = $this->admin_split_date($this->request->data['ProgramCourse']['end_date']);
			}
			

			$this->ProgramCourse->create();
			if ($this->ProgramCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The program course has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program course could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$programs = $this->ProgramCourse->Program->find('list');
		$courses = $this->ProgramCourse->Course->find('list');
		$this->set(compact('programs', 'courses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProgramCourse->exists($id)) {
			throw new NotFoundException(__('Invalid program course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['ProgramCourse']['start_date'])) {
				$this->request->data['ProgramCourse']['start_date'] = $this->admin_split_date($this->request->data['ProgramCourse']['start_date']);
				$this->request->data['ProgramCourse']['end_date'] = $this->admin_split_date($this->request->data['ProgramCourse']['end_date']);
			}
			
			if ($this->ProgramCourse->save($this->request->data)) {
				$this->Session->setFlash(__('The program course has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The program course could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('ProgramCourse.' . $this->ProgramCourse->primaryKey => $id));
			$this->request->data = $this->ProgramCourse->find('first', $options);
		}
		$programs = $this->ProgramCourse->Program->find('list');
		$courses = $this->ProgramCourse->Course->find('list');
		$this->set(compact('programs', 'courses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ProgramCourse->id = $id;
		if (!$this->ProgramCourse->exists()) {
			throw new NotFoundException(__('Invalid program course'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->ProgramCourse->delete()) {
			$this->Session->setFlash(__('The program course has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The program course could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
