<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * Holidays Controller
 *
 * @property Holiday $Holiday
 * @property PaginatorComponent $Paginator
 */
class HolidaysController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->Holiday->parseCriteria($this->Prg->parsedParams());
		$this->set('holidays', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Holiday->recursive = 0;
		// $this->set('holidays', $this->Paginator->paginate());
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
		if (!$this->Holiday->exists($id)) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
		$this->set('holiday', $this->Holiday->find('first', $options));
	}

	public function find_holiday($start_date = null, $end_date = null) {

		$this->layout = false;
		$this->log('-- Holiday --');
		$start_date = date("Y-m-d",strtotime($start_date));
		$end_date 	= date("Y-m-d",strtotime($end_date));

		$start 	= 'Holiday.start_date >=  STR_TO_DATE("'.$start_date.'", "%Y-%m-%d")';
		$end 	= 'Holiday.start_date <=  STR_TO_DATE("'.$end_date.'", "%Y-%m-%d")';
		
		$options['conditions'] = array($start, $end);

		return $this->Holiday->find('all', $options);
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
		return $this->Holiday->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->Holiday->exists($id)) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
		$this->set('holiday', $this->Holiday->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->Holiday->exists($id)) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
		$this->set('holiday', $this->Holiday->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Holiday']['start_date'])) {
				$this->request->data['Holiday']['start_date'] = $this->split_date($this->request->data['Holiday']['start_date']);
				// $this->request->data['Holiday']['end_date'] = $this->split_date($this->request->data['Holiday']['end_date']);
			}
			

			$this->Holiday->create();
			if ($this->Holiday->save($this->request->data)) {
				$this->Session->setFlash(__('The holiday has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holiday could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Holiday->exists($id)) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Holiday']['start_date'])) {
				$this->request->data['Holiday']['start_date'] = $this->split_date($this->request->data['Holiday']['start_date']);
			}
			
			if ($this->Holiday->save($this->request->data)) {
				$this->Session->setFlash(__('The holiday has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holiday could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
			$this->request->data = $this->Holiday->find('first', $options);
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
		$this->Holiday->id = $id;
		if (!$this->Holiday->exists()) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Holiday->delete()) {
			$this->Session->setFlash(__('The holiday has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The holiday could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->Holiday->parseCriteria($this->Prg->parsedParams());
		$this->set('holidays', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Holiday->recursive = 0;
		// $this->set('holidays', $this->Paginator->paginate());
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
		if (!$this->Holiday->exists($id)) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
		$this->set('holiday', $this->Holiday->find('first', $options));
	}

	public function admin_object($id = null) {
		
		$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
		return $this->Holiday->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->Holiday->exists($id)) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
		$this->set('holiday', $this->Holiday->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->Holiday->exists($id)) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
		$this->set('holiday', $this->Holiday->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Holiday']['start_date'])) {
				$this->request->data['Holiday']['start_date'] = $this->admin_split_date($this->request->data['Holiday']['start_date']);
				$this->request->data['Holiday']['end_date'] = $this->admin_split_date($this->request->data['Holiday']['end_date']);
			}
			

			$this->Holiday->create();
			if ($this->Holiday->save($this->request->data)) {
				$this->Session->setFlash(__('The holiday has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holiday could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Holiday->exists($id)) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Holiday']['start_date'])) {
				$this->request->data['Holiday']['start_date'] = $this->admin_split_date($this->request->data['Holiday']['start_date']);
				$this->request->data['Holiday']['end_date'] = $this->admin_split_date($this->request->data['Holiday']['end_date']);
			}
			
			if ($this->Holiday->save($this->request->data)) {
				$this->Session->setFlash(__('The holiday has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holiday could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Holiday.' . $this->Holiday->primaryKey => $id));
			$this->request->data = $this->Holiday->find('first', $options);
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
		$this->Holiday->id = $id;
		if (!$this->Holiday->exists()) {
			throw new NotFoundException(__('Invalid holiday'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Holiday->delete()) {
			$this->Session->setFlash(__('The holiday has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The holiday could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
