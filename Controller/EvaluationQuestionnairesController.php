<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * EvaluationQuestionnaires Controller
 *
 * @property EvaluationQuestionnaire $EvaluationQuestionnaire
 * @property PaginatorComponent $Paginator
 */
class EvaluationQuestionnairesController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->EvaluationQuestionnaire->parseCriteria($this->Prg->parsedParams());
		$this->set('evaluationQuestionnaires', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EvaluationQuestionnaire->recursive = 0;
		// $this->set('evaluationQuestionnaires', $this->Paginator->paginate());
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
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
		$this->set('evaluationQuestionnaire', $this->EvaluationQuestionnaire->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
		return $this->EvaluationQuestionnaire->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
		$this->set('evaluationQuestionnaire', $this->EvaluationQuestionnaire->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
		$this->set('evaluationQuestionnaire', $this->EvaluationQuestionnaire->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EvaluationQuestionnaire']['start_date'])) {
				$this->request->data['EvaluationQuestionnaire']['start_date'] = $this->split_date($this->request->data['EvaluationQuestionnaire']['start_date']);
				$this->request->data['EvaluationQuestionnaire']['end_date'] = $this->split_date($this->request->data['EvaluationQuestionnaire']['end_date']);
			}
			

			$this->EvaluationQuestionnaire->create();
			if ($this->EvaluationQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation questionnaire has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation questionnaire could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EvaluationQuestionnaire']['start_date'])) {
				$this->request->data['EvaluationQuestionnaire']['start_date'] = $this->split_date($this->request->data['EvaluationQuestionnaire']['start_date']);
				$this->request->data['EvaluationQuestionnaire']['end_date'] = $this->split_date($this->request->data['EvaluationQuestionnaire']['end_date']);
			}
			
			if ($this->EvaluationQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation questionnaire has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation questionnaire could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
			$this->request->data = $this->EvaluationQuestionnaire->find('first', $options);
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
		$this->EvaluationQuestionnaire->id = $id;
		if (!$this->EvaluationQuestionnaire->exists()) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EvaluationQuestionnaire->delete()) {
			$this->Session->setFlash(__('The evaluation questionnaire has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The evaluation questionnaire could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->EvaluationQuestionnaire->parseCriteria($this->Prg->parsedParams());
		$this->set('evaluationQuestionnaires', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EvaluationQuestionnaire->recursive = 0;
		// $this->set('evaluationQuestionnaires', $this->Paginator->paginate());
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
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
		$this->set('evaluationQuestionnaire', $this->EvaluationQuestionnaire->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
		return $this->EvaluationQuestionnaire->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
		$this->set('evaluationQuestionnaire', $this->EvaluationQuestionnaire->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
		$this->set('evaluationQuestionnaire', $this->EvaluationQuestionnaire->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EvaluationQuestionnaire']['start_date'])) {
				$this->request->data['EvaluationQuestionnaire']['start_date'] = $this->admin_split_date($this->request->data['EvaluationQuestionnaire']['start_date']);
				$this->request->data['EvaluationQuestionnaire']['end_date'] = $this->admin_split_date($this->request->data['EvaluationQuestionnaire']['end_date']);
			}
			

			$this->EvaluationQuestionnaire->create();
			if ($this->EvaluationQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation questionnaire has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation questionnaire could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->EvaluationQuestionnaire->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EvaluationQuestionnaire']['start_date'])) {
				$this->request->data['EvaluationQuestionnaire']['start_date'] = $this->admin_split_date($this->request->data['EvaluationQuestionnaire']['start_date']);
				$this->request->data['EvaluationQuestionnaire']['end_date'] = $this->admin_split_date($this->request->data['EvaluationQuestionnaire']['end_date']);
			}
			
			if ($this->EvaluationQuestionnaire->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation questionnaire has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation questionnaire could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EvaluationQuestionnaire.' . $this->EvaluationQuestionnaire->primaryKey => $id));
			$this->request->data = $this->EvaluationQuestionnaire->find('first', $options);
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
		$this->EvaluationQuestionnaire->id = $id;
		if (!$this->EvaluationQuestionnaire->exists()) {
			throw new NotFoundException(__('Invalid evaluation questionnaire'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EvaluationQuestionnaire->delete()) {
			$this->Session->setFlash(__('The evaluation questionnaire has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The evaluation questionnaire could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
