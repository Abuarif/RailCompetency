<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * EvaluationDetails Controller
 *
 * @property EvaluationDetail $EvaluationDetail
 * @property PaginatorComponent $Paginator
 */
class EvaluationDetailsController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->EvaluationDetail->parseCriteria($this->Prg->parsedParams());
		$this->set('evaluationDetails', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EvaluationDetail->recursive = 0;
		// $this->set('evaluationDetails', $this->Paginator->paginate());
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
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
		$this->set('evaluationDetail', $this->EvaluationDetail->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
		return $this->EvaluationDetail->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
		$this->set('evaluationDetail', $this->EvaluationDetail->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
		$this->set('evaluationDetail', $this->EvaluationDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EvaluationDetail']['start_date'])) {
				$this->request->data['EvaluationDetail']['start_date'] = $this->split_date($this->request->data['EvaluationDetail']['start_date']);
				$this->request->data['EvaluationDetail']['end_date'] = $this->split_date($this->request->data['EvaluationDetail']['end_date']);
			}
			

			$this->EvaluationDetail->create();
			if ($this->EvaluationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation detail has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->EvaluationDetail->Staff->find('list');
		$evaluationQuestionnaires = $this->EvaluationDetail->EvaluationQuestionnaire->find('list');
		$this->set(compact('staffs', 'evaluationQuestionnaires'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EvaluationDetail']['start_date'])) {
				$this->request->data['EvaluationDetail']['start_date'] = $this->split_date($this->request->data['EvaluationDetail']['start_date']);
				$this->request->data['EvaluationDetail']['end_date'] = $this->split_date($this->request->data['EvaluationDetail']['end_date']);
			}
			
			if ($this->EvaluationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation detail has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
			$this->request->data = $this->EvaluationDetail->find('first', $options);
		}
		$staffs = $this->EvaluationDetail->Staff->find('list');
		$evaluationQuestionnaires = $this->EvaluationDetail->EvaluationQuestionnaire->find('list');
		$this->set(compact('staffs', 'evaluationQuestionnaires'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EvaluationDetail->id = $id;
		if (!$this->EvaluationDetail->exists()) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EvaluationDetail->delete()) {
			$this->Session->setFlash(__('The evaluation detail has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The evaluation detail could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->EvaluationDetail->parseCriteria($this->Prg->parsedParams());
		$this->set('evaluationDetails', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EvaluationDetail->recursive = 0;
		// $this->set('evaluationDetails', $this->Paginator->paginate());
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
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
		$this->set('evaluationDetail', $this->EvaluationDetail->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
		return $this->EvaluationDetail->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
		$this->set('evaluationDetail', $this->EvaluationDetail->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
		$this->set('evaluationDetail', $this->EvaluationDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EvaluationDetail']['start_date'])) {
				$this->request->data['EvaluationDetail']['start_date'] = $this->admin_split_date($this->request->data['EvaluationDetail']['start_date']);
				$this->request->data['EvaluationDetail']['end_date'] = $this->admin_split_date($this->request->data['EvaluationDetail']['end_date']);
			}
			

			$this->EvaluationDetail->create();
			if ($this->EvaluationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation detail has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->EvaluationDetail->Staff->find('list');
		$evaluationQuestionnaires = $this->EvaluationDetail->EvaluationQuestionnaire->find('list');
		$this->set(compact('staffs', 'evaluationQuestionnaires'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EvaluationDetail->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EvaluationDetail']['start_date'])) {
				$this->request->data['EvaluationDetail']['start_date'] = $this->admin_split_date($this->request->data['EvaluationDetail']['start_date']);
				$this->request->data['EvaluationDetail']['end_date'] = $this->admin_split_date($this->request->data['EvaluationDetail']['end_date']);
			}
			
			if ($this->EvaluationDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation detail has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EvaluationDetail.' . $this->EvaluationDetail->primaryKey => $id));
			$this->request->data = $this->EvaluationDetail->find('first', $options);
		}
		$staffs = $this->EvaluationDetail->Staff->find('list');
		$evaluationQuestionnaires = $this->EvaluationDetail->EvaluationQuestionnaire->find('list');
		$this->set(compact('staffs', 'evaluationQuestionnaires'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->EvaluationDetail->id = $id;
		if (!$this->EvaluationDetail->exists()) {
			throw new NotFoundException(__('Invalid evaluation detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EvaluationDetail->delete()) {
			$this->Session->setFlash(__('The evaluation detail has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The evaluation detail could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
