<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * StaffsTrainings Controller
 *
 * @property StaffsTraining $StaffsTraining
 * @property PaginatorComponent $Paginator
 */
class StaffsTrainingsController extends RailCompetencyAppController {

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
		$this->StaffsTraining->recursive = 0;
		$this->set('staffsTrainings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->StaffsTraining->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staffs training')));
		}
		$options = array('conditions' => array('StaffsTraining.' . $this->StaffsTraining->primaryKey => $id));
		$this->set('staffsTraining', $this->StaffsTraining->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->StaffsTraining->create();
			if ($this->StaffsTraining->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'staffs training')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->StaffsTraining->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'staffs training')), 'default', array('class' => 'error'));
			}
		}
		$staffs = $this->StaffsTraining->Staff->find('list');
		$events = $this->StaffsTraining->Event->find('list');
		$courses = $this->StaffsTraining->Course->find('list');
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
		if (!$this->StaffsTraining->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staffs training')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StaffsTraining->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'staffs training')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'staffs training')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('StaffsTraining.' . $this->StaffsTraining->primaryKey => $id));
			$this->request->data = $this->StaffsTraining->find('first', $options);
		}
		$staffs = $this->StaffsTraining->Staff->find('list');
		$events = $this->StaffsTraining->Event->find('list');
		$courses = $this->StaffsTraining->Course->find('list');
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
		$this->StaffsTraining->id = $id;
		if (!$this->StaffsTraining->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staffs training')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StaffsTraining->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('railcompetency', 'Staffs training')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('railcompetency', 'Staffs training')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->StaffsTraining->recursive = 0;
		$this->set('staffsTrainings', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->StaffsTraining->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staffs training')));
		}
		$options = array('conditions' => array('StaffsTraining.' . $this->StaffsTraining->primaryKey => $id));
		$this->set('staffsTraining', $this->StaffsTraining->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->StaffsTraining->create();
			if ($this->StaffsTraining->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'staffs training')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->StaffsTraining->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'staffs training')), 'default', array('class' => 'error'));
			}
		}
		$staffs = $this->StaffsTraining->Staff->find('list');
		$events = $this->StaffsTraining->Event->find('list');
		$courses = $this->StaffsTraining->Course->find('list');
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
		if (!$this->StaffsTraining->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staffs training')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->StaffsTraining->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('railcompetency', 'staffs training')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('railcompetency', 'staffs training')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('StaffsTraining.' . $this->StaffsTraining->primaryKey => $id));
			$this->request->data = $this->StaffsTraining->find('first', $options);
		}
		$staffs = $this->StaffsTraining->Staff->find('list');
		$events = $this->StaffsTraining->Event->find('list');
		$courses = $this->StaffsTraining->Course->find('list');
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
		$this->StaffsTraining->id = $id;
		if (!$this->StaffsTraining->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('railcompetency', 'staffs training')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->StaffsTraining->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('railcompetency', 'Staffs training')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('railcompetency', 'Staffs training')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
