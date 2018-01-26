<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('MailingListsController', 'RailCompetency.Controller');
App::uses('StaffsController', 'RailCompetency.Controller');

/**
 * MailingListDetails Controller
 *
 * @property MailingListDetail $MailingListDetail
 * @property PaginatorComponent $Paginator
 */
class MailingListDetailsController extends RailCompetencyAppController {

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
		$this->Paginator->settings['conditions'] = $this->MailingListDetail->parseCriteria($this->Prg->parsedParams());
		$this->set('mailingListDetails', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->MailingListDetail->recursive = 0;
		// $this->set('mailingListDetails', $this->Paginator->paginate());
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
		if (!$this->MailingListDetail->exists($id)) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
		$this->set('mailingListDetail', $this->MailingListDetail->find('first', $options));
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
		return $this->MailingListDetail->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->MailingListDetail->exists($id)) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
		$this->set('mailingListDetail', $this->MailingListDetail->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->MailingListDetail->exists($id)) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
		$this->set('mailingListDetail', $this->MailingListDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->MailingListDetail->create();
			if ($this->MailingListDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The mailing list detail has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing list detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$mailingLists = $this->MailingListDetail->MailingList->find('list');
		$staffs = $this->MailingListDetail->Staff->find('list');
		$this->set(compact('mailingLists', 'staffs'));
	}



	public function add_email($mailing_list_id = null) {
		if ($this->request->is('post')) {
			
			if (!empty($this->request->data['MailingListDetail']['email'])) {
				$this->MailingListDetail->create();
				if ($this->MailingListDetail->save($this->request->data)) {
					$this->Session->setFlash(__('The mailing list nomination has been saved.'), 'default', array('class' => 'alert alert-success'));
					return $this->redirect(array('controller' => 'mailing_list_details', 'action' => 'manage', $this->request->data['MailingListDetail']['mailing_list_id'],'tab:Participants'));
				} else {
					$this->Session->setFlash(__('The mailing list nomination could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
				}
			} else {
				$this->Session->setFlash(__('You have not specify any email address. Please try again. Thank you.'), 'default', array('class' => 'alert alert-warning'));
			}
		}
		$mailingLists = $this->MailingListDetail->MailingList->find('list');
		$staffs = $this->MailingListDetail->Staff->find('list');
		$this->set(compact('mailing_list_id'));
		$this->set(compact('mailingLists', 'staffs'));
	}



	public function manage($mailing_list_id = null) {
		$this->log("MailingListsController::manage:". $mailing_list_id);
		// pr($this->request->data);
		$save = false;
		if ($this->request->is('post')) {

			// pr($this->request->data);

			if (!empty($this->request->data['MailingListDetail'])) {
				// pr($this->request->data);

				foreach($this->request->data['MailingListDetail'] as $elementKey => $element) {
				    foreach($element as $valueKey => $value) {
				        if($valueKey == 'is_selected' && $value == 0){
				            //delete this particular object from the $array
				            unset($this->request->data['MailingListDetail'][$elementKey]);
				        } else if($valueKey == 'is_selected' && $value == 1){
					        $save = true;
				        } 
				    }
				}
				// pr($this->request->data);

				if ($save) {
					$this->MailingListDetail->create();
					if ($this->MailingListDetail->saveAll($this->request->data['MailingListDetail'])) {
						$this->Session->setFlash(__('The mailing list nomination has been saved.'), 'default', array('class' => 'alert alert-success'));
						return $this->redirect(array('controller' => 'mailing_list_details', 'action' => 'manage', $this->request->data['MailingListDetail'][0]['mailing_list_id'],'tab:Participants'));
					} else {
						$this->Session->setFlash(__('The mailing list nomination could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
					}
				} else {
					$this->Session->setFlash(__('You have not select any name. Please find and select the name again. Thank you.'), 'default', array('class' => 'alert alert-warning'));
				}
			} else if (!empty($this->request->data['Staff'])) {
				// $this->log("Request Staff: ". $this->request->data['Staff']['q']);
				$myStaff = new StaffsController;
				$options = array(
					'fields' => array('Distinct(Staff.staff_no)', 'Staff.id', 'Staff.name', 'Staff.email', 'Staff.parent_code', 'Staff.org_code'),
					'conditions' => array(
							'active' => true, 
							'OR' => array(
								'Staff.parent_code like "%'.trim($this->request->data['Staff']['queryString']).'%"',
								'Staff.org_code like "%'.trim($this->request->data['Staff']['queryString']).'%"',
								'Staff.staff_no like "%'.trim($this->request->data['Staff']['queryString']).'%"',
								'Staff.name like "%'.trim($this->request->data['Staff']['queryString']).'%"'
							)
						),
					'ORDER' => 'Staff.staff_no ASC'
				);
				$staffs = $myStaff->Staff->find('all', $options);
				$this->set(compact('staffs'));
				// return $this->redirect(array('controller' => 'mailing_list_details', 'action' => 'manage', $mailing_list_id,'tab:Nominations'));
			}
		} //else {
		$myList = new MailingListsController;
		$options = array('conditions' => array('MailingList.' . $myList->MailingList->primaryKey => $mailing_list_id));
		$this->request->data = $myList->MailingList->find('first', $options);
		// }
		$this->Paginator->settings['conditions'] = array('MailingListDetail.mailing_list_id' => $mailing_list_id);
		$this->set('attendees', $this->paginate());
		$this->set(compact('mailing_list_id'));
	}

	public function doAction($id = null) {

		if ($this->request->is('post')) {
			// echo pr($this->request->data['MailingListDetail']);
			// filter for delete status only
			$doAction = $this->request->data['MailingListDetail']['bulk'];
			unset($this->request->data['MailingListDetail']['bulk']);

			if ($doAction == '1') { // delete
				foreach($this->request->data['MailingListDetail'] as $elementKey => $element) {
				    foreach($element as $valueKey => $value) {
				        if($valueKey == 'myOption' && $value == 1){
				            $this->MailingListDetail->delete($element['id']);
				        } 
				    }
				}
			// } else if ($doAction == '2') { // confirm participation
			// 	foreach($this->request->data['MailingListDetail'] as $elementKey => $element) {
			// 	    foreach($element as $valueKey => $value) {
			// 	        if($valueKey == 'myOption' && $value == 1){
			// 	        	$this->MailingListDetail->saveField ('id', $element['id']);
			// 	        	$this->MailingListDetail->saveField ('active', true);
			// 	        } 
			// 	    }
			// 	} 
			// } else if ($doAction == '3') { // unconfirm participation
			// 	foreach($this->request->data['MailingListDetail'] as $elementKey => $element) {
			// 	    foreach($element as $valueKey => $value) {
			// 	        if($valueKey == 'myOption' && $value == 1){
			// 	        	$this->MailingListDetail->saveField ('id', $element['id']);
			// 	        	$this->MailingListDetail->saveField ('active', false);
			// 	        } 
			// 	    }
			// 	} 
			}

			return $this->redirect(array('controller' => 'mailing_list_details', 'action' => 'manage', $this->request->data['MailingList']['id'],'tab:Participants'));
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
		if (!$this->MailingListDetail->exists($id)) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['MailingListDetail']['start_date'])) {
				$this->request->data['MailingListDetail']['start_date'] = $this->split_date($this->request->data['MailingListDetail']['start_date']);
				$this->request->data['MailingListDetail']['end_date'] = $this->split_date($this->request->data['MailingListDetail']['end_date']);
			}
			
			if ($this->MailingListDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The mailing list detail has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing list detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
			$this->request->data = $this->MailingListDetail->find('first', $options);
		}
		$mailingLists = $this->MailingListDetail->MailingList->find('list');
		$staffs = $this->MailingListDetail->Staff->find('list');
		$this->set(compact('mailingLists', 'staffs'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MailingListDetail->id = $id;
		if (!$this->MailingListDetail->exists()) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MailingListDetail->delete()) {
			$this->Session->setFlash(__('The mailing list detail has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The mailing list detail could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->MailingListDetail->parseCriteria($this->Prg->parsedParams());
		$this->set('mailingListDetails', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->MailingListDetail->recursive = 0;
		// $this->set('mailingListDetails', $this->Paginator->paginate());
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
		if (!$this->MailingListDetail->exists($id)) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
		$this->set('mailingListDetail', $this->MailingListDetail->find('first', $options));
	}

	public function admin_object($id = null) {
		
		$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
		return $this->MailingListDetail->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->MailingListDetail->exists($id)) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
		$this->set('mailingListDetail', $this->MailingListDetail->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->MailingListDetail->exists($id)) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
		$this->set('mailingListDetail', $this->MailingListDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['MailingListDetail']['start_date'])) {
				$this->request->data['MailingListDetail']['start_date'] = $this->admin_split_date($this->request->data['MailingListDetail']['start_date']);
				$this->request->data['MailingListDetail']['end_date'] = $this->admin_split_date($this->request->data['MailingListDetail']['end_date']);
			}
			

			$this->MailingListDetail->create();
			if ($this->MailingListDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The mailing list detail has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing list detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$mailingLists = $this->MailingListDetail->MailingList->find('list');
		$staffs = $this->MailingListDetail->Staff->find('list');
		$this->set(compact('mailingLists', 'staffs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MailingListDetail->exists($id)) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['MailingListDetail']['start_date'])) {
				$this->request->data['MailingListDetail']['start_date'] = $this->admin_split_date($this->request->data['MailingListDetail']['start_date']);
				$this->request->data['MailingListDetail']['end_date'] = $this->admin_split_date($this->request->data['MailingListDetail']['end_date']);
			}
			
			if ($this->MailingListDetail->save($this->request->data)) {
				$this->Session->setFlash(__('The mailing list detail has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing list detail could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('MailingListDetail.' . $this->MailingListDetail->primaryKey => $id));
			$this->request->data = $this->MailingListDetail->find('first', $options);
		}
		$mailingLists = $this->MailingListDetail->MailingList->find('list');
		$staffs = $this->MailingListDetail->Staff->find('list');
		$this->set(compact('mailingLists', 'staffs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->MailingListDetail->id = $id;
		if (!$this->MailingListDetail->exists()) {
			throw new NotFoundException(__('Invalid mailing list detail'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MailingListDetail->delete()) {
			$this->Session->setFlash(__('The mailing list detail has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The mailing list detail could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
