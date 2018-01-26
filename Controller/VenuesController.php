<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * Venues Controller
 *
 * @property Venue $Venue
 * @property PaginatorComponent $Paginator
 */
class VenuesController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->Venue->parseCriteria($this->Prg->parsedParams());
		$this->Paginator->settings['order'] = array('Venue.location', 'Venue.name' );
		$this->set('venues', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Venue->recursive = 0;
		// $this->set('venues', $this->Paginator->paginate());
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
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
		$this->set('venue', $this->Venue->find('first', $options));
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
		return $this->Venue->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
		$this->set('venue', $this->Venue->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
		$this->set('venue', $this->Venue->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Venue']['start_date'])) {
				$this->request->data['Venue']['start_date'] = $this->split_date($this->request->data['Venue']['start_date']);
				$this->request->data['Venue']['end_date'] = $this->split_date($this->request->data['Venue']['end_date']);
			}
			

			$this->Venue->create();
			if ($this->Venue->save($this->request->data)) {
				$this->Session->setFlash(__('The venue has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The venue could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Venue']['start_date'])) {
				$this->request->data['Venue']['start_date'] = $this->split_date($this->request->data['Venue']['start_date']);
				$this->request->data['Venue']['end_date'] = $this->split_date($this->request->data['Venue']['end_date']);
			}
			
			if ($this->Venue->save($this->request->data)) {
				$this->Session->setFlash(__('The venue has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The venue could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
			$this->request->data = $this->Venue->find('first', $options);
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
		$this->Venue->id = $id;
		if (!$this->Venue->exists()) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Venue->delete()) {
			$this->Session->setFlash(__('The venue has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The venue could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->Venue->parseCriteria($this->Prg->parsedParams());
		$this->set('venues', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Venue->recursive = 0;
		// $this->set('venues', $this->Paginator->paginate());
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
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
		$this->set('venue', $this->Venue->find('first', $options));
	}

	public function admin_object($id = null) {
		
		$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
		return $this->Venue->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
		$this->set('venue', $this->Venue->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
		$this->set('venue', $this->Venue->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Venue']['start_date'])) {
				$this->request->data['Venue']['start_date'] = $this->admin_split_date($this->request->data['Venue']['start_date']);
				$this->request->data['Venue']['end_date'] = $this->admin_split_date($this->request->data['Venue']['end_date']);
			}
			

			$this->Venue->create();
			if ($this->Venue->save($this->request->data)) {
				$this->Session->setFlash(__('The venue has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The venue could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		if (!$this->Venue->exists($id)) {
			throw new NotFoundException(__('Invalid venue'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Venue']['start_date'])) {
				$this->request->data['Venue']['start_date'] = $this->admin_split_date($this->request->data['Venue']['start_date']);
				$this->request->data['Venue']['end_date'] = $this->admin_split_date($this->request->data['Venue']['end_date']);
			}
			
			if ($this->Venue->save($this->request->data)) {
				$this->Session->setFlash(__('The venue has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The venue could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Venue.' . $this->Venue->primaryKey => $id));
			$this->request->data = $this->Venue->find('first', $options);
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
		$this->Venue->id = $id;
		if (!$this->Venue->exists()) {
			throw new NotFoundException(__('Invalid venue'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Venue->delete()) {
			$this->Session->setFlash(__('The venue has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The venue could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
