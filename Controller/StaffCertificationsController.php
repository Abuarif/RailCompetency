<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * StaffCertifications Controller
 *
 * @property StaffCertification $StaffCertification
 * @property PaginatorComponent $Paginator
 */
class StaffCertificationsController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->StaffCertification->parseCriteria($this->Prg->parsedParams());
		$this->set('staffCertifications', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffCertification->recursive = 0;
		// $this->set('staffCertifications', $this->Paginator->paginate());
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
		if (!$this->StaffCertification->exists($id)) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
		$this->set('staffCertification', $this->StaffCertification->find('first', $options));
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
		return $this->StaffCertification->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->StaffCertification->exists($id)) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
		$this->set('staffCertification', $this->StaffCertification->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->StaffCertification->exists($id)) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
		$this->set('staffCertification', $this->StaffCertification->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffCertification']['start_date'])) {
				$this->request->data['StaffCertification']['start_date'] = $this->split_date($this->request->data['StaffCertification']['start_date']);
				$this->request->data['StaffCertification']['end_date'] = $this->split_date($this->request->data['StaffCertification']['end_date']);
			}
			

			$this->StaffCertification->create();
			if ($this->StaffCertification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff certification has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff certification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->StaffCertification->Staff->find('list');
		$this->set(compact('staffs'));
	}

	public function add_certificate($staff_id = null) {
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffCertification']['start_date'])) {
				$this->request->data['StaffCertification']['start_date'] = $this->split_date($this->request->data['StaffCertification']['start_date']);
				$this->request->data['StaffCertification']['end_date'] = $this->split_date($this->request->data['StaffCertification']['end_date']);
			}
			

			$this->StaffCertification->create();
			if ($this->StaffCertification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff certification has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('controller' => 'staffs', 'action' => 'view', $staff_id, 'tab:StaffCertifications'));
				// return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff certification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$options = array(
				'fields' => array('Staff.id', 'Staff.name', 'Staff.staff_no'),
				'conditions' => array('Staff.id' => $staff_id),
				'order' => 'Staff.staff_no ASC'
				);
		$staffs = $this->StaffCertification->Staff->find('all', $options);
		$staffs = Set::combine($staffs, '{n}.Staff.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name'));
		
		$this->set(compact('staffs'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $staff_id = null) {
		if (!$this->StaffCertification->exists($id)) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffCertification']['start_date'])) {
				$this->request->data['StaffCertification']['start_date'] = $this->split_date($this->request->data['StaffCertification']['start_date']);
				$this->request->data['StaffCertification']['end_date'] = $this->split_date($this->request->data['StaffCertification']['end_date']);
			}
			
			if ($this->StaffCertification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff certification has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'staffs', 'action' => 'view', $staff_id, 'tab:StaffCertifications'));
				// return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff certification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
			$this->request->data = $this->StaffCertification->find('first', $options);
		}
		$staffs = $this->StaffCertification->Staff->find('list');
		$this->set(compact('staffs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StaffCertification->id = $id;
		if (!$this->StaffCertification->exists()) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffCertification->delete()) {
			$this->Session->setFlash(__('The staff certification has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff certification could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->StaffCertification->parseCriteria($this->Prg->parsedParams());
		$this->set('staffCertifications', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffCertification->recursive = 0;
		// $this->set('staffCertifications', $this->Paginator->paginate());
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
		if (!$this->StaffCertification->exists($id)) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
		$this->set('staffCertification', $this->StaffCertification->find('first', $options));
	}

	public function admin_object($id = null) {
		
		$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
		return $this->StaffCertification->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->StaffCertification->exists($id)) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
		$this->set('staffCertification', $this->StaffCertification->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->StaffCertification->exists($id)) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
		$this->set('staffCertification', $this->StaffCertification->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffCertification']['start_date'])) {
				$this->request->data['StaffCertification']['start_date'] = $this->admin_split_date($this->request->data['StaffCertification']['start_date']);
				$this->request->data['StaffCertification']['end_date'] = $this->admin_split_date($this->request->data['StaffCertification']['end_date']);
			}
			

			$this->StaffCertification->create();
			if ($this->StaffCertification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff certification has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff certification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->StaffCertification->Staff->find('list');
		$this->set(compact('staffs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StaffCertification->exists($id)) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffCertification']['start_date'])) {
				$this->request->data['StaffCertification']['start_date'] = $this->admin_split_date($this->request->data['StaffCertification']['start_date']);
				$this->request->data['StaffCertification']['end_date'] = $this->admin_split_date($this->request->data['StaffCertification']['end_date']);
			}
			
			if ($this->StaffCertification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff certification has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff certification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffCertification.' . $this->StaffCertification->primaryKey => $id));
			$this->request->data = $this->StaffCertification->find('first', $options);
		}
		$staffs = $this->StaffCertification->Staff->find('list');
		$this->set(compact('staffs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->StaffCertification->id = $id;
		if (!$this->StaffCertification->exists()) {
			throw new NotFoundException(__('Invalid staff certification'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffCertification->delete()) {
			$this->Session->setFlash(__('The staff certification has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff certification could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
