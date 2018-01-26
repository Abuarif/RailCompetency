<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * Enrollments Controller
 *
 * @property Enrollment $Enrollment
 * @property PaginatorComponent $Paginator
 */
class EnrollmentsController extends RailCompetencyAppController {

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
		$this->Enrollment->recursive = 0;
		$this->set('enrollments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'enrollment')));
		}
		$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
		$this->set('enrollment', $this->Enrollment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enrollment->create();
			if ($this->Enrollment->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'enrollment')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Enrollment->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'enrollment')), 'default', array('class' => 'error'));
			}
		}
		$staffs = $this->Enrollment->Staff->find('list');
		$events = $this->Enrollment->Event->find('list');
		$this->set(compact('staffs', 'events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'enrollment')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Enrollment->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'enrollment')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'enrollment')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
			$this->request->data = $this->Enrollment->find('first', $options);
		}
		$staffs = $this->Enrollment->Staff->find('list');
		$events = $this->Enrollment->Event->find('list');
		$this->set(compact('staffs', 'events'));
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
		$this->Enrollment->id = $id;
		if (!$this->Enrollment->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'enrollment')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Enrollment->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('railcompetency', 'Enrollment')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('railcompetency', 'Enrollment')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Enrollment->recursive = 0;
		$this->set('enrollments', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'enrollment')));
		}
		$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
		$this->set('enrollment', $this->Enrollment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Enrollment->create();
			if ($this->Enrollment->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'enrollment')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Enrollment->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'enrollment')), 'default', array('class' => 'error'));
			}
		}
		$staffs = $this->Enrollment->Staff->find('list');
		$events = $this->Enrollment->Event->find('list');
		$this->set(compact('staffs', 'events'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Enrollment->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'enrollment')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Enrollment->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'enrollment')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'enrollment')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Enrollment.' . $this->Enrollment->primaryKey => $id));
			$this->request->data = $this->Enrollment->find('first', $options);
		}
		$staffs = $this->Enrollment->Staff->find('list');
		$events = $this->Enrollment->Event->find('list');
		$this->set(compact('staffs', 'events'));
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
		$this->Enrollment->id = $id;
		if (!$this->Enrollment->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'enrollment')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Enrollment->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('railcompetency', 'Enrollment')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('railcompetency', 'Enrollment')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
