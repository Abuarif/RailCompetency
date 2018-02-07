<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * StaffQualifications Controller
 *
 * @property StaffQualification $StaffQualification
 * @property PaginatorComponent $Paginator
 */
class StaffQualificationsController extends RailCompetencyAppController
{

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
	public function index()
	{

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->StaffQualification->parseCriteria($this->Prg->parsedParams());
		$this->set('staffQualifications', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffQualification->recursive = 0;
		// $this->set('staffQualifications', $this->Paginator->paginate());
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
	public function view($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
		$this->set('staffQualification', $this->StaffQualification->find('first', $options));
	}

	public function object($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
		return $this->StaffQualification->find('first', $options);
	}

	public function myself($staff_id = null)
	{

		$options = array(
			'conditions' => array('StaffQualification.staff_id' => $staff_id),
			'order' => array('StaffQualification.id DESC')
		);
		return $this->StaffQualification->find('first', $options);
	}

	/**
	 * sneak method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function sneak($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
		$this->set('staffQualification', $this->StaffQualification->find('first', $options));
	}

	/**
	 * calendar method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function calendar($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
		$this->set('staffQualification', $this->StaffQualification->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffQualification']['start_date'])) {
				$this->request->data['StaffQualification']['start_date'] = $this->split_date($this->request->data['StaffQualification']['start_date']);
				$this->request->data['StaffQualification']['end_date'] = $this->split_date($this->request->data['StaffQualification']['end_date']);
			}


			$this->StaffQualification->create();
			if ($this->StaffQualification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff qualification has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff qualification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->StaffQualification->Staff->find('list');
		$this->set(compact('staffs'));
	}

	public function create_qualification($staff_id = null, $event_id = null, $tab = null)
	{
		if ($this->request->is('post')) {

			$this->StaffQualification->create();
			if ($this->StaffQualification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff qualification has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('controller' => 'event_claims', 'action' => 'manage', $event_id, 'tab:' . $tab));
			} else {
				$this->Session->setFlash(__('The staff qualification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$qualification = array('SPM' => 'SPM', 'DIPLOMA' => 'DIPLOMA', 'DEGREE' => 'DEGREE');
		$this->set(compact('staff_id', 'qualification'));
	}

	public function add_qualification($staff_id = null)
	{
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffQualification']['completed_on'])) {
				$this->request->data['StaffQualification']['completed_on'] = $this->split_date($this->request->data['StaffQualification']['completed_on']);
				// $this->request->data['StaffQualification']['end_date'] = $this->split_date($this->request->data['StaffQualification']['end_date']);
			}


			$this->StaffQualification->create();
			if ($this->StaffQualification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff qualification has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('controller' => 'staffs', 'action' => 'view', $staff_id, 'tab:StaffQualifications'));
				// return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff qualification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$options = array(
			'fields' => array('Staff.id', 'Staff.name', 'Staff.staff_no'),
			'conditions' => array('Staff.id' => $staff_id),
			'order' => 'Staff.staff_no ASC'
		);
		$staffs = $this->StaffQualification->Staff->find('all', $options);
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
	public function edit($id = null, $staff_id = null)
	{
	// public function edit($id = null) {
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffQualification']['completed_on'])) {
				$this->request->data['StaffQualification']['completed_on'] = $this->split_date($this->request->data['StaffQualification']['completed_on']);
				// $this->request->data['StaffQualification']['end_date'] = $this->split_date($this->request->data['StaffQualification']['end_date']);
			}

			if ($this->StaffQualification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff qualification has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'staffs', 'action' => 'view', $staff_id, 'tab:StaffQualifications'));
				// return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff qualification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
			$this->request->data = $this->StaffQualification->find('first', $options);
		}
		$staffs = $this->StaffQualification->Staff->find('list');
		$this->set(compact('staffs'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null)
	{
		$this->StaffQualification->id = $id;
		if (!$this->StaffQualification->exists()) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffQualification->delete()) {
			$this->Session->setFlash(__('The staff qualification has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff qualification could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	/**
	 * split_date method
	 *
	 * @return array 
	 */
	public function split_date($input)
	{
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
	public function admin_index()
	{

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->StaffQualification->parseCriteria($this->Prg->parsedParams());
		$this->set('staffQualifications', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->StaffQualification->recursive = 0;
		// $this->set('staffQualifications', $this->Paginator->paginate());
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
	public function admin_view($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
		$this->set('staffQualification', $this->StaffQualification->find('first', $options));
	}

	public function admin_object($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
		return $this->StaffQualification->find('first', $options);
	}

	/**
	 * admin_sneak method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_sneak($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
		$this->set('staffQualification', $this->StaffQualification->find('first', $options));
	}

	/**
	 * admin_calendar method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_calendar($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
		$this->set('staffQualification', $this->StaffQualification->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add()
	{
		if ($this->request->is('post')) {
			if (isset($this->request->data['StaffQualification']['start_date'])) {
				$this->request->data['StaffQualification']['start_date'] = $this->admin_split_date($this->request->data['StaffQualification']['start_date']);
				$this->request->data['StaffQualification']['end_date'] = $this->admin_split_date($this->request->data['StaffQualification']['end_date']);
			}


			$this->StaffQualification->create();
			if ($this->StaffQualification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff qualification has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff qualification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$staffs = $this->StaffQualification->Staff->find('list');
		$this->set(compact('staffs'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null)
	{
		if (!$this->StaffQualification->exists($id)) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['StaffQualification']['start_date'])) {
				$this->request->data['StaffQualification']['start_date'] = $this->admin_split_date($this->request->data['StaffQualification']['start_date']);
				$this->request->data['StaffQualification']['end_date'] = $this->admin_split_date($this->request->data['StaffQualification']['end_date']);
			}

			if ($this->StaffQualification->save($this->request->data)) {
				$this->Session->setFlash(__('The staff qualification has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff qualification could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('StaffQualification.' . $this->StaffQualification->primaryKey => $id));
			$this->request->data = $this->StaffQualification->find('first', $options);
		}
		$staffs = $this->StaffQualification->Staff->find('list');
		$this->set(compact('staffs'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null)
	{
		$this->StaffQualification->id = $id;
		if (!$this->StaffQualification->exists()) {
			throw new NotFoundException(__('Invalid staff qualification'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->StaffQualification->delete()) {
			$this->Session->setFlash(__('The staff qualification has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff qualification could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	/**
	 * admin_split_date method
	 *
	 * @return array 
	 */
	public function admin_split_date($input)
	{
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
