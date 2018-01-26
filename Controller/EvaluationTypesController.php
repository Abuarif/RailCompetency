<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * EvaluationTypes Controller
 *
 * @property EvaluationType $EvaluationType
 * @property PaginatorComponent $Paginator
 */
class EvaluationTypesController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->EvaluationType->parseCriteria($this->Prg->parsedParams());
		$this->set('evaluationTypes', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EvaluationType->recursive = 0;
		// $this->set('evaluationTypes', $this->Paginator->paginate());
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
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
		$this->set('evaluationType', $this->EvaluationType->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
		return $this->EvaluationType->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
		$this->set('evaluationType', $this->EvaluationType->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
		$this->set('evaluationType', $this->EvaluationType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EvaluationType']['start_date'])) {
				$this->request->data['EvaluationType']['start_date'] = $this->split_date($this->request->data['EvaluationType']['start_date']);
				$this->request->data['EvaluationType']['end_date'] = $this->split_date($this->request->data['EvaluationType']['end_date']);
			}
			

			$this->EvaluationType->create();
			if ($this->EvaluationType->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation type has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EvaluationType']['start_date'])) {
				$this->request->data['EvaluationType']['start_date'] = $this->split_date($this->request->data['EvaluationType']['start_date']);
				$this->request->data['EvaluationType']['end_date'] = $this->split_date($this->request->data['EvaluationType']['end_date']);
			}
			
			if ($this->EvaluationType->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation type has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
			$this->request->data = $this->EvaluationType->find('first', $options);
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
		$this->EvaluationType->id = $id;
		if (!$this->EvaluationType->exists()) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EvaluationType->delete()) {
			$this->Session->setFlash(__('The evaluation type has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The evaluation type could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->EvaluationType->parseCriteria($this->Prg->parsedParams());
		$this->set('evaluationTypes', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EvaluationType->recursive = 0;
		// $this->set('evaluationTypes', $this->Paginator->paginate());
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
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
		$this->set('evaluationType', $this->EvaluationType->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
		return $this->EvaluationType->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
		$this->set('evaluationType', $this->EvaluationType->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
		$this->set('evaluationType', $this->EvaluationType->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EvaluationType']['start_date'])) {
				$this->request->data['EvaluationType']['start_date'] = $this->admin_split_date($this->request->data['EvaluationType']['start_date']);
				$this->request->data['EvaluationType']['end_date'] = $this->admin_split_date($this->request->data['EvaluationType']['end_date']);
			}
			

			$this->EvaluationType->create();
			if ($this->EvaluationType->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation type has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->EvaluationType->exists($id)) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EvaluationType']['start_date'])) {
				$this->request->data['EvaluationType']['start_date'] = $this->admin_split_date($this->request->data['EvaluationType']['start_date']);
				$this->request->data['EvaluationType']['end_date'] = $this->admin_split_date($this->request->data['EvaluationType']['end_date']);
			}
			
			if ($this->EvaluationType->save($this->request->data)) {
				$this->Session->setFlash(__('The evaluation type has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The evaluation type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EvaluationType.' . $this->EvaluationType->primaryKey => $id));
			$this->request->data = $this->EvaluationType->find('first', $options);
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
		$this->EvaluationType->id = $id;
		if (!$this->EvaluationType->exists()) {
			throw new NotFoundException(__('Invalid evaluation type'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EvaluationType->delete()) {
			$this->Session->setFlash(__('The evaluation type has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The evaluation type could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
