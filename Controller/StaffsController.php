<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('PositionsController', 'RailCompetency.Controller');

// ini_set('max_execution_time', 600);
// ini_set('memory_limit', '-1');
// set_time_limit(0);

/**
 * Staffs Controller
 *
 * @property Staff $Staff
 * @property PaginatorComponent $Paginator
 */
class StaffsController extends RailCompetencyAppController
{

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Search.Prg');
	public $helpers = array('Csv');

	/**
	 * index method
	 *
	 * @return void
	 */
	public function index()
	{

		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');

		$this->Paginator->settings['conditions'] = $this->Staff->parseCriteria($this->Prg->parsedParams());
		$this->set('staffs', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Staff->recursive = 0;
		if (!empty($this->request->data['Staff']['queryString'])) {
			$this->set('queryString', $this->request->data['Staff']['queryString']);
		} else {
			$this->set('queryString', '');
		}

	}

	public function import()
	{
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Staff']['files']['tmp_name'])) {
				$file = $this->request->data['Staff']['files']['tmp_name'];
				$handle = fopen($file, "r");

				$position = new PositionsController;
				$myPositions = $position->Position->find('list');

			    //loop through the csv file and insert into database 
				do {
					if (!empty($myCSV)) {
			            // echo $myCSV[1].addslashes($myCSV[2]).addslashes($myCSV[3]);
			            // parent::save($data);
						$data['Staff']['staff_no'] = $myCSV[0];
						$data['Staff']['name'] = $myCSV[1];
						$data['Staff']['NRIC'] = $myCSV[2];

			            // find matched position 
						foreach ($myPositions as $key => $value) {
							$this->log('Key: ' . $key);
							$this->log('Position 1: ' . strtoupper($myCSV[3]));
							$this->log('Position 2: ' . $value);

							if (trim(strtoupper($myCSV[3])) == $value) {
								$data['Staff']['position_id'] = $key;

							}
						}
						$data['Staff']['parent_code'] = $myCSV[4];
						$data['Staff']['org_code'] = $myCSV[5];

						if ($myCSV[0] != 0) {
							$this->Staff->create();
							if ($this->Staff->save($data)) {
								$status = true;
							}
						}
					}
				} while ($myCSV = fgetcsv($handle, 1000, ",", "'"));
			}
			return $this->redirect(array('action' => 'index'));
		}
	}



	public function index2()
	{

		$this->Staff->recursive = 0;
		// $this->Prg->commonProcess();
		// $this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		
		// $this->Paginator->settings['conditions'] = $this->Staff->parseCriteria($this->Prg->parsedParams());
		// $this->set('staffs', $this->Paginator->paginate());

		// // deprecated - suhaimi
		// // $this->Staff->recursive = 0;
		// if (!empty($this->request->data['Staff']['queryString'])) {
		// 	$this->set('queryString', $this->request->data['Staff']['queryString']);
		// } else {
		// 	$this->set('queryString', '');
		// }

		$this->set('staffs', $this->Staff->find('all'));
	}

	public function export($code = null)
	{

		$this->Staff->recursive = 0;

		$options['fields'] = array('Staff.id', 'Staff.staff_no', 'Staff.name as staff_name', 'Position.name as position', 'Staff.parent_code', 'Staff.org_code', 'Staff.nric');
		if (!empty($code)) {
			$options['conditions'] = array('Staff.parent_code like "%' . $code . '%"');
		} else {
			$options['conditions'] = array();
		}
		$staffs = $this->Staff->find('all', $options);
		// var_dump($staffs);
		// die();
		$this->set('staffs', $staffs);
		$this->layout = null;
		$this->autoLayout = false;
	    // Configure::write('debug','0');
	}

	public function my_list()
	{

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->Staff->parseCriteria($this->Prg->parsedParams());
		$this->set('staffs', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Staff->recursive = 0;
		// $this->set('staffs', $this->Paginator->paginate());
	}

	public function ends_with($haystack, $needle)
	{
		$length = strlen($needle);
		if ($length == 0) {
			return true;
		}

		return (substr($haystack, -$length) === $needle);
	}

	public function feed_event_staffs()
	{
		//$this->layout = "ajax";
		// $vars = $this->params['url'];
		$options = array(
			'fields' => array('Staff.id', 'Staff.staff_name'), // using virtual field on staff_name (staff_no + name)
			'order' => 'Staff.staff_no ASC'
		);
		$staffs = $this->Staff->find('list', $options);
		foreach ($staffs as $key => $value) {
			// $this->log($course_name);
			$data[] = array(
				'id' => $key,
				'value' => $value
			);
		}
		$this->set("staffs", $data);
	}

	public function typeahead_search2()
	{
		$this->autoRender = false;
		$this->RequestHandler->respondAs('json');

	    // get the search term from URL
		$term = $this->request->query['q'];
		$users = $this->Staff->find('list', array(
			'conditions' => array('or' => array(
				'Staff.staff_no LIKE' => '%' . $term . '%',
				'Staff.name LIKE' => '%' . $term . '%'
			)),
			'fields' => array('Staff.id', 'Staff.name'), // using virtual field on staff_name (staff_no + name)
			'order' => array('Staff.staff_no ASC')
		));

	    // Format the result for select2
		$result = array();
		foreach ($users as $key => $user) {
			$result['id'] = $key;
			$result['value'] = $user;
		}
		$users = $result;

		echo json_encode($users);
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		// $options['joins'] = array(
		// 				array('table' => 'staff_training_profiles',
		// 				    'alias' => 'StaffTrainingProfile',
		// 				    'type' => 'left',
		// 				    'conditions' => array(
		// 				        'StaffTrainingProfile.staff_id = Staff.id',
		// 				    )
		// 				)
		// 			);
		// $options['order'] = array('StaffTrainingProfile.start_date ASC');
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));

	}

	public function printout($id = null)
	{
		$this->layout = 'public';
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
	}

	public function external_printout($id = null)
	{
		$this->layout = 'public';
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
	}

	public function test($id = null)
	{
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
	}

	public function object($id = null)
	{
		$this->autoRender = false;
		// $this->log('staff.object');

		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		return $this->Staff->find('first', $options);
	}

	public function count_staff($department = null, $unit = null)
	{
		$this->autoRender = false;
		// $this->log('staff.object');

		$options = array('conditions' => array('Staff.department' => $department, 'Staff.unit' => $unit));
		return $this->Staff->find('count', $options);
	}

	public function count_line_staff($department = null)
	{
		$this->autoRender = false;
		// $this->log('staff.object');

		$options = array('conditions' => array('Staff.department' => $department));
		return $this->Staff->find('count', $options);
	}

	public function display($id = null)
	{
		$this->autoRender = false;

		$this->log('staff.display');

		$options = array(
			'fields' => array('Staff.parent_code', 'Staff.org_code', 'Staff.staff_no', 'Staff.name'),
			'conditions' => array('Staff.' . $this->Staff->primaryKey => $id)
		);
		return $this->Staff->find('first', $options);
	}

	public function info($id = null)
	{
		$this->autoRender = false;

		$options = array(
			'conditions' => array('Staff.' . $this->Staff->primaryKey => $id)
		);
		return $this->Staff->find('list', $options);
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add()
	{
		if ($this->request->is('post')) {
			// if (isset($this->request->data['Staff']['start_date'])) {
			// 	$this->request->data['Staff']['start_date'] = $this->split_date($this->request->data['Staff']['start_date']);
			// 	$this->request->data['Staff']['end_date'] = $this->split_date($this->request->data['Staff']['end_date']);
			// }


			$this->Staff->create();
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The staff has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$organizations = $this->Staff->Organization->find('list');
		// $options = array(
		// 		// 'fields' => array('Staff.id', 'Staff.name', 'Staff.staff_no'),
		// 		'order' => 'Staff.name ASC'
		// 		);
		$parents = $this->get_staffs();
		// $parents = Set::combine($parents, '{n}.Staff.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name'));
		// $parents = $this->Staff->find('list');
		
		// $parentStaffs = $this->Staff->find('list');
		// $users = $this->Staff->User->find('list');
		$positions = $this->Staff->Position->find('list');
		// $this->set(compact('organizations', 'positions'));
		$this->set(compact('organizations', 'positions'));
		// $this->set(compact('organizations', 'parents', 'positions'));
	}

	public function get_staffs()
	{
		
		// $myStaff = new StaffsController;
		$this->Staff->recursive = 0;
		$options = array(
			'fields' => array('Staff.id', 'Staff.name', 'Staff.staff_no'),
			'order' => 'Staff.staff_no ASC'
		);
		$staffs = $this->Staff->find('all', $options);
		$staffs = Set::combine($staffs, '{n}.Staff.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name'));
		
		// print_r($staffs);
		return $staffs;
	}

	public function typeahead_search($queryString = null)
	{
		
		// $myStaff = new StaffsController;
		$this->autoRender = false;
		$this->RequestHandler->respondAs('json');
		$this->Staff->recursive = 0;
		$options = array(
			'fields' => array('Staff.id', 'Staff.name', 'Staff.staff_no'),
			'conditions' => array(
				'or' =>
					array('User.staff_no like "%' . $queryString . '%"'),
				array('User.name like "%' . $queryString . '%"'),
			),
			'order' => 'Staff.staff_no ASC'
		);
		$staffs = $this->Staff->find('all', $options);
		$staffs = Set::combine($staffs, '{n}.Staff.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name'));
		
		// print_r($staffs);
		// return $staffs;
		// $this->set("staffs", $staffs);
		echo json_encode($staffs);

	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */

	public function upload_profile($id = null)
	{
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The staff has been updated.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'staffs', 'action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);
		}
	}

	public function upload_profile_mini($event_id = null, $id = null)
	{
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The staff has been updated.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'event_claims', 'action' => 'manage', $event_id, 'tab:HRDF'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);
		}
	}

	public function edit($id = null)
	{
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is(array('post', 'put'))) {
			// if (isset($this->request->data['Staff']['start_date'])) {
			// 	$this->request->data['Staff']['start_date'] = $this->split_date($this->request->data['Staff']['start_date']);
			// 	$this->request->data['Staff']['end_date'] = $this->split_date($this->request->data['Staff']['end_date']);
			// }

			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The staff has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);
		}
		$organizations = $this->Staff->Organization->find('list');

		// $myStaff = new EventsController;
		// $myStaff->Staff->recursive = 0;
		// $options = array(
		// 		'fields' => array('Staff.id', 'Staff.name', 'Staff.staff_no'),
		// 		'order' => 'Staff.name ASC'
		// 		);
		// $parents = $this->Staff->find('', $options);
		// $parents = Set::combine($parents, '{n}.Staff.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name'));
		$parents = $this->get_staffs();
		// $options = array(
		// 		'fields' => array('Venue.id', 'Venue.name', 'Venue.location'),
		// 		'order' => 'Venue.name ASC'
		// 		);
		// $venues = $this->Event->Venue->find('all', $options);
		// $venues = Set::combine($venues, '{n}.Venue.id', array('%s -  %s', '{n}.Venue.name', '{n}.Venue.location'));
		

		// $parents = $this->Staff->find('list');
		// $users = $this->Staff->User->find('list');
		$positions = $this->Staff->Position->find('list');
		$this->set(compact('organizations', 'parents', 'positions'));
		// $this->set(compact('organizations', 'parents', 'users', 'positions'));
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
		$this->Staff->id = $id;
		if (!$this->Staff->exists()) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Staff->delete()) {
			$this->Session->setFlash(__('The staff has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function remove_staff($event_id = null, $staff_id = null)
	{
		$this->Staff->id = $staff_id;

		if ($this->Staff->delete()) {
			$this->Session->setFlash(__('The staff has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('controller' => 'event_attendances', 'action' => 'nominate', $event_id, 'tab:Nominations'));
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
		$this->Paginator->settings['conditions'] = $this->Staff->parseCriteria($this->Prg->parsedParams());
		$this->set('staffs', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Staff->recursive = 0;
		// $this->set('staffs', $this->Paginator->paginate());
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
	}

	public function admin_object($id = null)
	{
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		return $this->Staff->find('first', $options);
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add()
	{
		if ($this->request->is('post')) {
			if (isset($this->request->data['Staff']['start_date'])) {
				$this->request->data['Staff']['start_date'] = $this->admin_split_date($this->request->data['Staff']['start_date']);
				$this->request->data['Staff']['end_date'] = $this->admin_split_date($this->request->data['Staff']['end_date']);
			}


			$this->Staff->create();
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The staff has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$organizations = $this->Staff->Organization->find('list');
		$parentStaffs = $this->Staff->ParentStaff->find('list');
		$users = $this->Staff->User->find('list');
		$positions = $this->Staff->Position->find('list');
		$this->set(compact('organizations', 'parentStaffs', 'users', 'positions'));
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
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Staff']['start_date'])) {
				$this->request->data['Staff']['start_date'] = $this->admin_split_date($this->request->data['Staff']['start_date']);
				$this->request->data['Staff']['end_date'] = $this->admin_split_date($this->request->data['Staff']['end_date']);
			}

			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The staff has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);
		}
		$organizations = $this->Staff->Organization->find('list');
		$parentStaffs = $this->Staff->ParentStaff->find('list');
		$users = $this->Staff->User->find('list');
		$positions = $this->Staff->Position->find('list');
		$this->set(compact('organizations', 'parentStaffs', 'users', 'positions'));
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
		$this->Staff->id = $id;
		if (!$this->Staff->exists()) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Staff->delete()) {
			$this->Session->setFlash(__('The staff has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The staff could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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

	function edit_race($id = null, $event_id = null, $tab = null)
	{
		$this->log('edit_race');
		if ($this->request->is(array('post', 'put'))) {

			$this->Staff->create();
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash(__('The staff has been updated.'), 'default', array('class' => 'alert alert-success'));
				$this->log('updated');

				return $this->redirect(array('controller' => 'event_claims', 'action' => 'manage', $event_id, 'tab:'.$tab));

			} else {
				$this->log('failed');
				$this->Session->setFlash(__('The staff could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);

			$races = array('Malay' => 'Malay', 'Bumi' => 'Bumi', 'Chinese' => 'Chinese', 'Dayak' => 'Dayak', 'Indian' => 'Indian');
			$this->set(compact('races'));
		}
	}
}
