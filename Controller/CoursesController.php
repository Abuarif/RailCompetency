<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('TrainingProvidersController', 'RailCompetency.Controller');
App::uses('ModulesController', 'RailCompetency.Controller');
App::uses('ServicesController', 'RailCompetency.Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
ini_set('memory_limit', '-1');
// // ini_set('memory_limit', '256M');
set_time_limit(0);

class CoursesController extends RailCompetencyAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Search.Prg');

	public function beforeFilter() {
		
		parent::beforeFilter();
		$this->Security->csrfCheck = false; 
	
		$this->Security->unlockedActions[] = 'index';
                
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {

		$this->Course->recursive = 0;
		// $this->Prg->commonProcess();
		if (!empty($this->request->data['Course']['queryString']))
		$this->Paginator->settings['conditions'] = array('OR' =>
				array(
					'Course.code like "%'.$this->request->data['Course']['queryString'].'%"',
					'Course.name like "%'.$this->request->data['Course']['queryString'].'%"',
					),
				);
		// $this->Course->parseCriteria($this->Prg->parsedParams());
		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		$this->set('courses', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Course->recursive = 0;
		// $this->set('courses', $this->Paginator->paginate());
	}

	public function test() {

	}

	public function import() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Course']['files']['tmp_name'])) {
				$file = $this->request->data['Course']['files']['tmp_name']; 
				$handle = fopen($file,"r"); 
	     	
	     		$provider = new TrainingProvidersController;
	     		$module = new ModulesController;
	     		$service = new ServicesController;

	     		$myProvider = $provider->TrainingProvider->find('list');
	     		$myModule = $module->Module->find('list');
	     		$myService = $service->Service->find('list');

	     		$this->log('File: '. $file);
			    //loop through the csv file and insert into database 
			    do { 
			    	if (!empty($myCSV)) {
			            $this->log('In loop');

			            // find matched trainingprovider 
			    		foreach ($myProvider as $key => $value) {
			    			$this->log('Data: '.trim(strtoupper($myCSV[1])));
			    			$this->log('Value: '. $value);

			            	if ( trim(strtoupper($myCSV[1])) == strtoupper($value)) {
			            		$data['Course']['training_provider_id'] 	= $key;
			            	}
			            }

			            // find matched module 
			            foreach ($myModule as $key => $value) {
			            	$this->log('Data: '.trim(strtoupper($myCSV[2])));
			    			$this->log('Value: '. $value);

			            	if ( trim(strtoupper($myCSV[2])) == strtoupper($value)) {
			            	// if ( trim(strtoupper($myCSV[2])) == $value) {
			            		$data['Course']['module_id'] 	= $key;
			            	}
			            }

			            // find matched service 
			            foreach ($myService as $key => $value) {
			            	$this->log('Data: '.trim(strtoupper($myCSV[3])));
			    			$this->log('Value: '. $value);

			            	if ( trim(strtoupper($myCSV[3])) == strtoupper($value)) {
			            	// if ( trim(strtoupper($myCSV[3])) == $value) {
			            		$data['Course']['service_id'] 	= $key;
			            	}
			            }

			            $data['Course']['code'] 		= $myCSV[4];
			            $data['Course']['name'] 		= $myCSV[5];
			            $data['Course']['pax'] 			= $myCSV[6];
			            $data['Course']['cost_pax'] 	= $myCSV[7];
			            $data['Course']['total_cost'] 	= $myCSV[8];
			            $data['Course']['details'] 		= $myCSV[9];
			            $data['Course']['duration'] 	= $myCSV[10];
			            $data['Course']['isRefresher'] 	= $myCSV[11];
			            $data['Course']['external'] 	= $myCSV[12];
			            $data['Course']['active'] 		= 1;

			            if ($myCSV[0] != 0) {
			            	$this->Course->create();
			            	if ($this->Course->save($data)) {
			            		$status = true;
			            	}
			            }
			    	}
			    } while ($myCSV = fgetcsv($handle,1000,",","'")); 
			}
			return $this->redirect(array('action' => 'index'));
		}
	}

	public function import_new_code()
	{
		$this->Course->recursive = 0;
		if ($this->request->is('post')) {
			$report = '';
			if (!empty($this->request->data['Course']['files']['tmp_name'])) {
				$file = $this->request->data['Course']['files']['tmp_name'];
				$handle = fopen($file, "r");

				$this->log('File: ' . $file);
			    //loop through the csv file and insert into database 
				do {
					if (!empty($myCSV)) {
						$this->log('In loop');
						$current_code = trim($myCSV[1]);
						$new_code = trim($myCSV[2]);
						$new_name = trim($myCSV[3]);
						// get current course code
						$myCourse = $this->Course->findByCode($current_code);
						if ($myCSV[0] != 0 && !empty($myCourse)) {
						// prep to swap new course code with current course code
							$data['Course']['id'] = $myCourse['Course']['id'];
							$data['Course']['code'] = $new_code;
							$data['Course']['old_code'] = $current_code;
							$data['Course']['name'] = $new_name;
							$data['Course']['old_name'] = $myCourse['Course']['name'];

							if ($this->Course->save($data)) {
								$status = true;
							}
						} else {
							if (!empty($current_code)) {
								$report .= $current_code;
								$report .= ',';
							}
						}
					}
				} while ($myCSV = fgetcsv($handle, 1000, ",", "'"));
			}
			return $this->redirect(array('action' => 'upload_report', 'log' => $report));
		}
	}
	
	public function manage($training_provider_id = null) {

		$this->set(compact('training_provider_id'));
	}

	public function feed_courses() {
		$vars = $this->params['url'];

		if (isset($vars['training_provider_id'])) {
			$options = array('conditions' => 
				array(
					'Course.training_provider_id' => $vars['training_provider_id'],
					'Course.active' => true
				)
			);
		} else {
			$options['conditions'] = array('Course.active' => true);
		}

		$this->Course->recursive = 0;
		$courses = $this->Course->find('all', $options);
		$this->set(compact('courses'));
	}

	public function ends_with($haystack, $needle){
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
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

	public function object($id = null) {
		
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		return $this->Course->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

	public function preview($id = null) {
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Course']['start_date'])) {
				$this->request->data['Course']['start_date'] = $this->split_date($this->request->data['Course']['start_date']);
				$this->request->data['Course']['end_date'] = $this->split_date($this->request->data['Course']['end_date']);
			}
			

			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$trainingProviders = $this->Course->TrainingProvider->find('list');
		$modules = $this->Course->Module->find('list');
		$services = $this->Course->Service->find('list');
		$this->set(compact('trainingProviders', 'modules', 'services'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
		}
		$trainingProviders = $this->Course->TrainingProvider->find('list');
		$modules = $this->Course->Module->find('list');
		$services = $this->Course->Service->find('list');
		$this->set(compact('trainingProviders', 'modules', 'services'));
	}

	public function attachment($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been uploaded.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The attachment could not be uploaded. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
		}
		$trainingProviders = $this->Course->TrainingProvider->find('list');
		$modules = $this->Course->Module->find('list');
		$services = $this->Course->Service->find('list');
		$this->set(compact('trainingProviders', 'modules', 'services'));
	}

	public function attachment_mini($event_id = null, $id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been uploaded.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'event_claims', 'action' => 'manage', $event_id,'tab:HRDF'));
			} else {
				$this->Session->setFlash(__('The attachment could not be uploaded. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
		}
		// $trainingProviders = $this->Course->TrainingProvider->find('list');
		// $modules = $this->Course->Module->find('list');
		// $services = $this->Course->Service->find('list');
		// $this->set(compact('trainingProviders', 'modules', 'services'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Course->delete()) {
			$this->Session->setFlash(__('The course has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The course could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->Paginator->settings['conditions'] = $this->Course->parseCriteria($this->Prg->parsedParams());
		$this->set('courses', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Course->recursive = 0;
		// $this->set('courses', $this->Paginator->paginate());
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
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

	public function admin_object($id = null) {
		
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		return $this->Course->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
		$this->set('course', $this->Course->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Course']['start_date'])) {
				$this->request->data['Course']['start_date'] = $this->admin_split_date($this->request->data['Course']['start_date']);
				$this->request->data['Course']['end_date'] = $this->admin_split_date($this->request->data['Course']['end_date']);
			}
			

			$this->Course->create();
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$trainingProviders = $this->Course->TrainingProvider->find('list');
		$modules = $this->Course->Module->find('list');
		$services = $this->Course->Service->find('list');
		$this->set(compact('trainingProviders', 'modules', 'services'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Course->exists($id)) {
			throw new NotFoundException(__('Invalid course'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Course']['start_date'])) {
				$this->request->data['Course']['start_date'] = $this->admin_split_date($this->request->data['Course']['start_date']);
				$this->request->data['Course']['end_date'] = $this->admin_split_date($this->request->data['Course']['end_date']);
			}
			
			if ($this->Course->save($this->request->data)) {
				$this->Session->setFlash(__('The course has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The course could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Course.' . $this->Course->primaryKey => $id));
			$this->request->data = $this->Course->find('first', $options);
		}
		$trainingProviders = $this->Course->TrainingProvider->find('list');
		$modules = $this->Course->Module->find('list');
		$services = $this->Course->Service->find('list');
		$this->set(compact('trainingProviders', 'modules', 'services'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Course->id = $id;
		if (!$this->Course->exists()) {
			throw new NotFoundException(__('Invalid course'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Course->delete()) {
			$this->Session->setFlash(__('The course has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The course could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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

  	public function download($filename){

	    $file = APP."webroot/attachments/".$filename;
	    $this->response->file($file);
    return $this->response;
}

}
