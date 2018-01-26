<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * StaffTrainings Controller
 *
 * @property StaffTraining $StaffTraining
 * @property PaginatorComponent $Paginator
 */
class StaffTrainingsController extends RailCompetencyAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->StaffTraining->recursive = 0;
		$this->set('staffTrainings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StaffTraining->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staff training')));
		}
		$options = array('conditions' => array('StaffTraining.' . $this->StaffTraining->primaryKey => $id));
		$this->set('staffTraining', $this->StaffTraining->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StaffTraining->create();
			if ($this->StaffTraining->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'staff training')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->StaffTraining->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'staff training')), 'default', array('class' => 'error'));
			}
		}
		$staffs = $this->StaffTraining->Staff->find('list');
		$events = $this->StaffTraining->Event->find('list');
		$courses = $this->StaffTraining->Course->find('list');
		$this->set(compact('staffs', 'events', 'courses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->StaffTraining->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staff training')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StaffTraining->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'staff training')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'staff training')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('StaffTraining.' . $this->StaffTraining->primaryKey => $id));
			$this->request->data = $this->StaffTraining->find('first', $options);
		}
		$staffs = $this->StaffTraining->Staff->find('list');
		$events = $this->StaffTraining->Event->find('list');
		$courses = $this->StaffTraining->Course->find('list');
		$this->set(compact('staffs', 'events', 'courses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->StaffTraining->id = $id;
		if (!$this->StaffTraining->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staff training')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StaffTraining->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('railcompetency', 'Staff training')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('railcompetency', 'Staff training')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->StaffTraining->recursive = 0;
		$this->set('staffTrainings', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StaffTraining->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staff training')));
		}
		$options = array('conditions' => array('StaffTraining.' . $this->StaffTraining->primaryKey => $id));
		$this->set('staffTraining', $this->StaffTraining->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StaffTraining->create();
			if ($this->StaffTraining->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'staff training')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->StaffTraining->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'staff training')), 'default', array('class' => 'error'));
			}
		}
		$staffs = $this->StaffTraining->Staff->find('list');
		$events = $this->StaffTraining->Event->find('list');
		$courses = $this->StaffTraining->Course->find('list');
		$this->set(compact('staffs', 'events', 'courses'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->StaffTraining->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staff training')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StaffTraining->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'staff training')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'staff training')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('StaffTraining.' . $this->StaffTraining->primaryKey => $id));
			$this->request->data = $this->StaffTraining->find('first', $options);
		}
		$staffs = $this->StaffTraining->Staff->find('list');
		$events = $this->StaffTraining->Event->find('list');
		$courses = $this->StaffTraining->Course->find('list');
		$this->set(compact('staffs', 'events', 'courses'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->StaffTraining->id = $id;
		if (!$this->StaffTraining->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staff training')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StaffTraining->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('railcompetency', 'Staff training')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('railcompetency', 'Staff training')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
