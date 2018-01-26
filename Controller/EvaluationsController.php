<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * Evaluations Controller
 *
 * @property Evaluation $Evaluation
 * @property PaginatorComponent $Paginator
 */
class EvaluationsController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->Evaluation->parseCriteria($this->Prg->parsedParams());
		$this->set('evaluations', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Evaluation->recursive = 0;
		// $this->set('evaluations', $this->Paginator->paginate());
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
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
		$this->set('evaluation', $this->Evaluation->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
		return $this->Evaluation->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
		$this->set('evaluation', $this->Evaluation->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
		$this->set('evaluation', $this->Evaluation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Evaluation']['start_date'])) {
				$this->request->data['Evaluation']['start_date'] = $this->split_date($this->request->data['Evaluation']['start_date']);
				$this->request->data['Evaluation']['end_date'] = $this->split_date($this->request->data['Evaluation']['end_date']);
			}
			

			$this->Evaluation->create();
			if ($this->Evaluation->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$evaluationTypes = $this->Evaluation->EvaluationType->find('list');
		$staffs = $this->Evaluation->Staff->find('list');
		$courses = $this->Evaluation->Course->find('list');
		$events = $this->Evaluation->Event->find('list');
		$grades = $this->Evaluation->Grade->find('list');
		$this->set(compact('evaluationTypes', 'staffs', 'courses', 'events', 'grades'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Evaluation']['start_date'])) {
				$this->request->data['Evaluation']['start_date'] = $this->split_date($this->request->data['Evaluation']['start_date']);
				$this->request->data['Evaluation']['end_date'] = $this->split_date($this->request->data['Evaluation']['end_date']);
			}
			
			if ($this->Evaluation->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
			$this->request->data = $this->Evaluation->find('first', $options);
		}
		$evaluationTypes = $this->Evaluation->EvaluationType->find('list');
		$staffs = $this->Evaluation->Staff->find('list');
		$courses = $this->Evaluation->Course->find('list');
		$events = $this->Evaluation->Event->find('list');
		$grades = $this->Evaluation->Grade->find('list');
		$this->set(compact('evaluationTypes', 'staffs', 'courses', 'events', 'grades'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Evaluation->id = $id;
		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Evaluation->delete()) {
			$this->Session->setFlash(__('The evaluation has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The evaluation could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->Evaluation->parseCriteria($this->Prg->parsedParams());
		$this->set('evaluations', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Evaluation->recursive = 0;
		// $this->set('evaluations', $this->Paginator->paginate());
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
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
		$this->set('evaluation', $this->Evaluation->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
		return $this->Evaluation->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
		$this->set('evaluation', $this->Evaluation->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
		$this->set('evaluation', $this->Evaluation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Evaluation']['start_date'])) {
				$this->request->data['Evaluation']['start_date'] = $this->admin_split_date($this->request->data['Evaluation']['start_date']);
				$this->request->data['Evaluation']['end_date'] = $this->admin_split_date($this->request->data['Evaluation']['end_date']);
			}
			

			$this->Evaluation->create();
			if ($this->Evaluation->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$evaluationTypes = $this->Evaluation->EvaluationType->find('list');
		$staffs = $this->Evaluation->Staff->find('list');
		$courses = $this->Evaluation->Course->find('list');
		$events = $this->Evaluation->Event->find('list');
		$grades = $this->Evaluation->Grade->find('list');
		$this->set(compact('evaluationTypes', 'staffs', 'courses', 'events', 'grades'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Evaluation->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Evaluation']['start_date'])) {
				$this->request->data['Evaluation']['start_date'] = $this->admin_split_date($this->request->data['Evaluation']['start_date']);
				$this->request->data['Evaluation']['end_date'] = $this->admin_split_date($this->request->data['Evaluation']['end_date']);
			}
			
			if ($this->Evaluation->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Evaluation.' . $this->Evaluation->primaryKey => $id));
			$this->request->data = $this->Evaluation->find('first', $options);
		}
		$evaluationTypes = $this->Evaluation->EvaluationType->find('list');
		$staffs = $this->Evaluation->Staff->find('list');
		$courses = $this->Evaluation->Course->find('list');
		$events = $this->Evaluation->Event->find('list');
		$grades = $this->Evaluation->Grade->find('list');
		$this->set(compact('evaluationTypes', 'staffs', 'courses', 'events', 'grades'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Evaluation->id = $id;
		if (!$this->Evaluation->exists()) {
			throw new NotFoundException(__('Invalid evaluation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Evaluation->delete()) {
			$this->Session->setFlash(__('The evaluation has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The evaluation could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
