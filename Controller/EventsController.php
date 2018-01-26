<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('MailingListDetailsController', 'RailCompetency.Controller');
App::uses('CoursesController', 'RailCompetency.Controller');
App::uses('ServicesController', 'RailCompetency.Controller');
App::uses('EventClaimsController', 'RailCompetency.Controller');
App::uses('EventTrainersController', 'RailCompetency.Controller');
App::uses('EventAttendancesController', 'RailCompetency.Controller');
App::uses('EventAttachmentsController', 'RailCompetency.Controller');
App::uses('TrainersController', 'RailCompetency.Controller');
App::uses('StaffsController', 'RailCompetency.Controller');
App::uses('VenuesController', 'RailCompetency.Controller');
App::uses('CakeTime', 'Utility');
App::uses('CakePdf', 'CakePdf.Pdf');
App::uses('MailingListsController', 'RailCompetency.Controller');
App::uses('MailingListDetailsController', 'RailCompetency.Controller');
App::uses('HolidaysController', 'RailCompetency.Controller');
/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 */

// ini_set('max_execution_time', 600);
ini_set('memory_limit', '-1');
// // ini_set('memory_limit', '256M');
set_time_limit(0);

class EventsController extends RailCompetencyAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
	public $helpers = array('Js' => array('Jquery'), 'Paginator');

	public function beforeFilter() {
		
		parent::beforeFilter();
		$this->Security->csrfCheck = false; 
	
		$this->Security->unlockedActions[] = 'calendar';
		$this->Security->unlockedActions[] = 'memo';
		$this->Security->unlockedActions[] = 'attendance_printout';
                
	}

/**
 * index method
 *
 * @return void
 */
	public function index2() {

		$events = $this->Event->find('all');
		$this->set(compact('events'));
	}
	
	public function index($status = null) {

		// echo pr($this->request->data);

		$memo = array();
		$active_event = array();
		$default_event = array(
						'Event.is_tcn' => false,
					);
		// echo 'test';

		// $this->log("Event - index!");\
		if (!empty($status)) {
			if ($status == 1) {
				$service = array(
					'Course.service_id = "'.$this->request->data['Event']['service_id'].'"',
					// 'Event.is_tcn = false ',
					'Event.is_memo = true ',
				);
			} else if ($status == 2) {
				$service = array(
					'Course.service_id = "'.$this->request->data['Event']['service_id'].'"',
					'Event.is_tcn = true ',
					// 'Event.is_memo = true ',
				);
			}
		}
		$this->Paginator->settings['conditions'] = $default_event;
		if (!empty($this->request->data['Event'])) {
			$start = '';
			$end = '';
			// set month selection for view
			if (!empty($this->request->data['Event']['service_id'])) {
					
				$service = array(
					'Course.service_id = "'.$this->request->data['Event']['service_id'].'"',
					'Event.is_tcn = false ',
					// 'Event.is_memo = false ',
					);
				
			}

			if (!empty($this->request->data['Event']['start_date']) && !empty($this->request->data['Event']['end_date']) ) {
				$start = 'Event.start_date >=  STR_TO_DATE("'.$this->request->data['Event']['start_date'].'", "%d-%m-%Y")';
				$end = 'Event.start_date <=  STR_TO_DATE("'.$this->request->data['Event']['end_date'].'", "%d-%m-%Y")';
			}

			$this->Paginator->settings['contain'] = array(
                'EventMemo',
                'Venue',
                'Course',
                'EventAttendance',
                'EventTrainer'
                );

			if (!empty($this->request->data['Event']['queryString'])  ) {
				$search = array('OR' =>
				array(
					'Course.code like "%'.$this->request->data['Event']['queryString'].'%"',
					'Course.name like "%'.$this->request->data['Event']['queryString'].'%"',
					),
					$start,
					$end,
				);
			}

			if (
				isset($this->request->data['Event']['queryString'])) {
				$active_event = array(
						'Event.active' => true,
						$start,
						$service,
						$end,
					);

				if (
					$this->request->data['Event']['active']==1 && 
					isset($this->request->data['Event']['queryString'])) {
						$this->Paginator->settings['conditions'] = array_merge(
							$search, 
							$active_event
						);
						$this->Paginator->settings['conditions'] = array_merge(
							$search, 
							$default_event
						);
				} else if (
					$this->request->data['Event']['active']==1 && 
					isset($this->request->data['Event']['queryString'])) {
						$this->Paginator->settings['conditions'] = array_merge(
							$search, 
							$active_event
						);
				} else if (!empty($this->request->data['Event']['service_id']) ) {
					$this->Paginator->settings['conditions'] = $service;
				} else if ($this->request->data['Event']['active']==1 ) {
					$this->Paginator->settings['conditions'] = $active_event;
				} else {
					$this->Paginator->settings['conditions'] = $search;
				}
			} else if (!empty($this->request->data['Event']['service_id']) ) {
				$this->Paginator->settings['conditions'] = $service;
			}
		}

		$this->Paginator->settings['order'] = array('Event.start_date');
		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		
		$this->set('events', $this->Paginator->paginate());

		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$courses = array();
		$service_id = '';

		if ($this->request->is('post')) {
			$service_id = $this->request->data['Event']['service_id'];
		}
		$services = $myService->Service->find('list');
		$this->set('courses', $courses); 
		$this->set(compact('services', 'service_id'));
	}

	public function get_events() {
		// $this->Event->recursive = 0;

		$options = array(
			'conditions' => array(
				'Event.active' => true,
				),
			);
		$events = $this->Event->find('all', $options);

		$attendance = 0;
		$attendees = 0;
		foreach($events as $event) {
			$attendance += count($event['EventAttendance']); 
			$attendees += count($event['EventAttendanceDetail']); 
		}
		// pr($events);
		$events = count($events);
		$this->set(compact('events', 'attendance', 'attendees'));
		
	}

	public function archieve() {

		// echo pr($this->request->data);

		$memo = array();
		$active_event = array();
		$default_event = array(
						'Event.is_tcn' => true,
					);

		// $this->log("Event - archieve!");
		$this->Paginator->settings['conditions'] = $default_event;

		if (!empty($this->request->data['Event'])) {
			$start = '';
			$end = '';
			// set month selection for view
			if ($this->request->data['Event']['start_date'] != null && $this->request->data['Event']['end_date'] != null) {
				$start = 'Event.start_date >=  STR_TO_DATE("'.$this->request->data['Event']['start_date'].'", "%d-%m-%Y")';
				$end = 'Event.start_date <=  STR_TO_DATE("'.$this->request->data['Event']['end_date'].'", "%d-%m-%Y")';
			}

			$this->Paginator->settings['contain'] = array(
                'EventMemo',
                'Venue',
                'Course',
                'EventAttendance',
                'EventTrainer'
                );

			$search = array('OR' =>
				array(
					'Course.code like "%'.$this->request->data['Event']['queryString'].'%"',
					'Course.name like "%'.$this->request->data['Event']['queryString'].'%"',
					),
					$start,
					$end,
				);

			if (
				isset($this->request->data['Event']['queryString'])) {
				$active_event = array(
						'Event.active' => true,
						'Event.is_tcn' => true,
						$start,
						$end,
					);

				if (
					$this->request->data['Event']['active']==1 && 
					isset($this->request->data['Event']['queryString'])) {
						$this->Paginator->settings['conditions'] = array_merge(
							$search, 
							$active_event
						);
				} else if (
					$this->request->data['Event']['active']==1 && 
					isset($this->request->data['Event']['queryString'])) {
						$this->Paginator->settings['conditions'] = array_merge(
							$search, 
							$active_event
						);
				} else if ($this->request->data['Event']['active']==1 ) {
					$this->Paginator->settings['conditions'] = $active_event;
				} else {
					$this->Paginator->settings['conditions'] = $search;
				}
			}
		}

		$this->Paginator->settings['order'] = array('Event.start_date');
		$this->Paginator->settings['limit'] = Configure::read('RCMS.read_limit');
		
		$this->set('events', $this->Paginator->paginate());

	}

	public function event_by_month() {

		$calendar = array();

		for ($iterate = 0; $iterate < 12; $iterate++ ) {
			$options = array('conditions' => array('MONTH(Event.start_date)' => $iterate + 1));
			$calendar[$iterate] = $this->Event->find('all', $options);
		}

		$this->set(compact('calendar'));
	}


	public function trainer_event_list() {

		// echo pr($this->request->data);

		$memo = array();
		$active_event = array();
		
		if (!empty($this->request->data['Event'])) {
			$start = '';
			$end = '';
			// set month selection for view
			if ($this->request->data['Event']['start_date'] != null && $this->request->data['Event']['end_date'] != null) {
				$start = 'Event.start_date >=  STR_TO_DATE("'.$this->request->data['Event']['start_date'].'", "%d-%m-%Y")';
				$end = 'Event.start_date <=  STR_TO_DATE("'.$this->request->data['Event']['end_date'].'", "%d-%m-%Y")';
			}

			$this->Paginator->settings['contain'] = array(
                'EventMemo',
                'Venue',
                'Course',
                'EventAttendance',
                'EventTrainer'
                );

			$search = array('OR' =>
								array(
									'Course.code like "%'.$this->request->data['Event']['queryString'].'%"',
									'Course.name like "%'.$this->request->data['Event']['queryString'].'%"',
									),
								$start,
								$end,
								// need to filter for trainer id x staff id x user id in session relationship
							);

			if (
				isset($this->request->data['Event']['queryString'])) {

				$active_event = array(
						'Event.active' => true,
						$start,
						$end,
					);


				if (
					$this->request->data['Event']['active']==1 && 
					isset($this->request->data['Event']['queryString'])) {
						$this->Paginator->settings['conditions'] = array_merge(
							$search, 
							$active_event
						);
				} else if (
					$this->request->data['Event']['active']==1 && 
					isset($this->request->data['Event']['queryString'])) {
						$this->Paginator->settings['conditions'] = array_merge(
							$search, 
							$active_event
						);
				} else if ($this->request->data['Event']['active']==1 ) {
					$this->Paginator->settings['conditions'] = $active_event;
				} else {
					$this->Paginator->settings['conditions'] = $search;
				}
			}
		}

		$this->Paginator->settings['order'] = array('Event.start_date');
		
		$this->set('events', $this->Paginator->paginate());

	}

	public function footer_html() {
		$this->layout = 'footer';

	}

	public function report() {
		// $this->layout = 'footer';

	}

	public function enrollment() {

		$this->Prg->commonProcess();
		$this->Paginator->settings = array(
			// 'joins' => array(
			// 				array('table' => 'event_attendances',
			// 				    'alias' => 'EventAttendance',
			// 				    'type' => 'right',
			// 				    'conditions' => array(
			// 				        'EventAttendance.event_id = Event.id',
			// 				    ),
			// 					'fields' => array('DISTINCT Event.id')
			// 				  )
			// 				),
			'conditions' => array('AND' => 
				$this->Event->parseCriteria($this->Prg->parsedParams()), 
				array('Event.active' => true),
				),
			'order' => array('Event.start_date')
			);
		$this->set('events', $this->Paginator->paginate());

	}

	public function ends_with($haystack, $needle)
	{
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }

	    return (substr($haystack, -$length) === $needle);
	}

	public function attendance($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		// $options['order'] = array('Event.staff_id asc');
		$myEvent = $this->Event->find('first', $options);
		$this->set('event', $myEvent);

		$start_date = CakeTime::format($myEvent['Event']['start_date'],'%Y-%m-%d');
		$end_date = CakeTime::format($myEvent['Event']['end_date'],'%Y-%m-%d');
		$holiday = $this->count_holiday($start_date, $end_date);

		$this->log('holiday: '.$holiday);

		$max = $this->getWorkingDays($start_date, $end_date);
		$this->log('max: '.$max);
		$this->set('max', ($max - $holiday));
		// $this->set('max', ($max));

		$this->set('holidays', $this->get_holidays());
	}

	public function feed_attendance() {
		$vars = $this->params['url'];

    	if (isset($vars['event_id'])) {
			$options = array('conditions' => 
				array(
					'Event.id' => $vars['event_id'],
				)
			);
		} 

		$myEvent = $this->Event->find('first', $options);
		$this->set('event', $myEvent);

	}

	public function attendance_printout($id = null) {
		// $this->layout = 'public';
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
		$this->set('holidays', $this->get_holidays());

	}

	public function attendance_2($id = null) {
		// $this->layout = 'public';
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function hrdf_printout($id = null) {
		$this->layout = 'public';
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		
		$options['conditions'] = array('Event.' . $this->Event->primaryKey => $id, );
		$event = $this->Event->find('first', $options);
		$this->set(compact('event'));

		$attendance = new EventAttendancesController;
		$options['conditions'] = array(
							        'EventAttendance.event_id' => $event['Event']['id'] ,
							        'EventAttendance.is_completed' => 1,
							    );
		$attendees = $attendance->EventAttendance->find('all', $options);
		$this->set(compact('attendees'));


	}

	public function hrdf_print_nomination($id = null) {
		$this->layout = 'public';
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		
		$options['conditions'] = array('Event.' . $this->Event->primaryKey => $id, );
		$event = $this->Event->find('first', $options);
		$this->set(compact('event'));

		$attendance = new EventAttendancesController;
		$options['conditions'] = array(
							        'EventAttendance.event_id' => $event['Event']['id'] ,
							        'EventAttendance.is_enrolled' => 1,
							    );
		$attendees = $attendance->EventAttendance->find('all', $options);
		$this->set(compact('attendees'));


	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function hrdf_covernotes($id = null) {
		$this->layout = 'public';

		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);

		$eventClaim = new EventClaimsController;
		$options['conditions'] = array('EventClaim.event_id' => $event['Event']['id']);
		$claim = $eventClaim->EventClaim->find('first', $options);
		$this->set(compact('claim', 'event'));
	}

	public function memo($id = null) {
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.active' => true));
		$attendees = $this->Event->EventAttendance->find('all', $options);
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.active' => false));
		$absentees = $this->Event->EventAttendance->find('all', $options);
		
		$this->set(compact('event', 'attendees', 'absentees'));
	}

	public function external_memo($id = null) {
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.active' => true));
		$attendees = $this->Event->EventAttendance->find('all', $options);
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.active' => false));
		$absentees = $this->Event->EventAttendance->find('all', $options);
		
		$this->set(compact('event', 'attendees', 'absentees'));
	}

	public function tcn($id = null) {

		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);

		$available_date = CakeTime::format('Y-m-d', $event['Event']['end_date']);
		$available_date = date('d-m-Y', strtotime($available_date." + 1 days"));
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.is_completed' => true));
		$attendees = $this->Event->EventAttendance->find('all', $options);
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.is_completed' => false));
		$absentees = $this->Event->EventAttendance->find('all', $options);
		
		$this->set(compact('event', 'attendees', 'absentees', 'available_date'));
	}

	public function training_result($id = null) {
		// $this->Event->recursive = 0;

		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);

		$available_date = CakeTime::format('Y-m-d', $event['Event']['end_date']);
		$available_date = date('d-m-Y', strtotime($available_date." + 1 days"));
		
		$options['joins'] = array(
						array('table' => 'staff_training_profiles',
						    'alias' => 'StaffTrainingProfile',
						    'type' => 'left',
						    'conditions' => array(
						        'StaffTrainingProfile.staff_id = EventAttendance.staff_id',
						        'StaffTrainingProfile.event_id = EventAttendance.event_id',
						    )
						)
					);
		$options['fields'] = array('DISTINCT EventAttendance.staff_id', 'EventAttendance.event_id', 'StaffTrainingProfile.status');
		$options['conditions'] = array('EventAttendance.event_id' => $id, 'EventAttendance.is_completed' => true, 'StaffTrainingProfile.status' => 'PASSED');

		$passed = $this->Event->EventAttendance->find('all', $options);
		
		$options['joins'] = array(
						array('table' => 'staff_training_profiles',
						    'alias' => 'StaffTrainingProfile',
						    'type' => 'left',
						    'conditions' => array(
						        'StaffTrainingProfile.event_id = EventAttendance.event_id',
						        'StaffTrainingProfile.staff_id = EventAttendance.staff_id',
						    )
						)
					);
		$options['fields'] = array('DISTINCT EventAttendance.staff_id', 'EventAttendance.event_id', 'StaffTrainingProfile.status');
		$options['conditions'] = array('EventAttendance.event_id' => $id, 'EventAttendance.is_completed' => true, 'StaffTrainingProfile.status' => 'FAILED');

		$failed = $this->Event->EventAttendance->find('all', $options);


    	
		$this->set(compact('event', 'passed', 'failed', 'available_date'));
	}

	public function html_memo($id = null) {
		$this->layout = 'public';

		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);
		$this->set('event', $event);
	}

	public function email_memo($event_id = null) {
		// $this->autoRender = false;

		if ($this->request->is('post')) {

			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $this->request->data['Event']['event_id']));
			$event = $this->Event->find('first', $options);
			$myService = new ServicesController;
			$service = $myService->Service->find('first', array('conditions' => array('Service.id' => $event['Course']['service_id'])));
			$myDate = CakeTime::format($event['Event']['start_date'], '%d-%m-%Y');
			$filename = 'memo_'.$event['Course']['code'].'.pdf';
			$config = array(
				'binary' 		=> 	'/usr/bin/wkhtmltopdf', // set the correct path here
				'engine' 		=> 	'CakePdf.WkHtmlToPdf',
				'margin' 		=> 	array(
					'bottom' 			=> 	10,
					'left' 				=> 	25,
					'right' 			=> 	25,
					'top' 				=> 	10,
				),
				'options' 		=> array(
			        'print-media-type' 	=> true,
			        'outline'          	=> true,
			        'dpi'              	=> 200,
			        // 'header-spacing'	=> '1',
					// 'footer-spacing' 	=> '1',
					'margin-bottom' 	=> '3cm',
			        'footer-html'     	=> 'https://rcms.prasarana.com.my/lms/rail_competency/events/footer_html',
			        'footer-center'     => 'Page [page] of [toPage]',
					// 'footer-html' => 'http://www.google.com'
			    ),

				'encoding'		=>	'UTF-8',
				'pageSize'		=>	'A4',
				'orientation'   => 	'portrait',
				// 'download' 		=> 	true
			);
			$config = Configure::read('CakePdf');
			$CakePdf = new CakePdf($config);
	        $CakePdf->viewVars(array('event' => $event, 'service' => $service));

	        // switch between internal and external
	        if ($event['Course']['external'] == 1 ) {
	        	$CakePdf->template('external_memo', 'default');
	        } else {
	        	$CakePdf->template('memo', 'default');
	        }
	        $CakePdf->write(APP . DS.'webroot'. DS. 'generated' . DS . $filename);
	        // setting to server side generation (cli)
	        $output = Configure::read('RCMS.path_to_memos').$filename;
	        $title = 'Memo for '.$event['Course']['code'].' '.$event['Course']['name'];
	        $template = 'memo';
	        $content = array(
	        	'title' => $title,
	        	// 'pdf_file' => 'http://sandbox.prasarana.com.my/lms-ldap/memos/'.$filename,
	        	'start_date' => CakeTime::format($event['Event']['start_date'], '%d-%m-%Y'),
	        	'end_date' => CakeTime::format($event['Event']['end_date'], '%d-%m-%Y'),
	        	);
	        $myMailingLIst = new MailingListDetailsController;
	        // $myMailingLIst->MailingListDetail->recursive = 0;
	        $options = array(
	        		'joins' => array(
						array('table' => 'staffs',
						    'alias' => 'Staff',
						    'type' => 'right',
						    'conditions' => array(
						        'MailingListDetail.staff_id = Staff.id',
						    ),
							'fields' => array('DISTINCT Staff.staff_no')
						  ),
						array('table' => 'mailing_lists',
						    'alias' => 'MailingList',
						    'type' => 'right',
						    'conditions' => array(
						        'MailingListDetail.mailing_list_id = MailingList.id',
						    ),
							// 'fields' => array('DISTINCT Staff.staff_no')
						  )
						),
					'fields' => array('Staff.email'),
	        		'conditions' => array('MailingList.id' => $this->request->data['Event']['mailinglist_id']),// tcn mailing list
	        		// 'conditions' => array('MailingList.slug' => Configure::read('RCMS.memo_mailing_list_slug')),// tcn mailing list
	        	);
	        $emails = $myMailingLIst->MailingListDetail->find('all', $options);
	        // pr($emails);

	        // break the staff for email
	        foreach ($emails as $key => $value) {
	        	if (!empty($value['Staff']['email']))
	        		$to_emails[] = $value['Staff']['email'];
	        }

	        $options = array(
	        		'joins' => array(
						array('table' => 'mailing_lists',
						    'alias' => 'MailingList',
						    'type' => 'right',
						    'conditions' => array(
						        'MailingListDetail.mailing_list_id = MailingList.id',
						    ),
						  )
						),
					'fields' => array('MailingListDetail.email'),
	        		'conditions' => array(
	        			'MailingList.id' => $this->request->data['Event']['mailinglist_id'],
	        			'MailingListDetail.staff_id is NULL'),// tcn mailing list
	        		// 'conditions' => array('MailingList.slug' => Configure::read('RCMS.memo_mailing_list_slug')),// tcn mailing list
	        	);
	        $emails = $myMailingLIst->MailingListDetail->find('all', $options);
	        // pr($emails);

	        // break the staff for email
	        foreach ($emails as $key => $value) {
	        	if (!empty($value['MailingListDetail']['email']))
	        		$to_emails[] = $value['MailingListDetail']['email'];
	        }
	        // pr($to_emails);
	        // die();

	        if ($this->sendMailWithAttachment($template, $to_emails, $title, $output, $content)) {
	        // if ($this->sendMailWithAttachment($template, $this->Session->read('Auth.User.email'), $title, $output, $content)) {
				$this->Session->setFlash(__('The memo has been emailed to the mailing list (MEMO)'), 'default', array('class' => 'alert alert-success'));
				// $this->Session->setFlash(__('The memo has been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-success'));
	        	$this->redirect(array('plugin' => 'rail_competency', 'controller' => 'events', 'action' => 'manage', $this->request->data['Event']['event_id']));

	        } else {
				$this->Session->setFlash(__('The memo has not been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-danger'));
	        }
	    }

	    // list mailing list
		$mailingList = new MailingListsController;
		$options = array(
				'fields' => array('MailingList.id', 'MailingList.slug', 'MailingList.name'),
				'order' => 'MailingList.name ASC'
			);
		$mailingLists = $mailingList->MailingList->find('all', $options);
		$mailingLists = Set::combine($mailingLists, '{n}.MailingList.id', array('%s -  %s', '{n}.MailingList.slug', '{n}.MailingList.name'));
		$this->set(compact('mailingLists', 'event_id'));
	}

	public function email_my_memo($event_id = null) {
		$this->autoRender = false;

		// if ($this->request->is('post')) {

			$options = array('conditions' => array('Event.id' => $event_id));
			$event = $this->Event->find('first', $options);
			$myService = new ServicesController;
			$service = $myService->Service->find('first', array('conditions' => array('Service.id' => $event['Course']['service_id'])));
			$myDate = CakeTime::format($event['Event']['start_date'], '%d-%m-%Y');
			$filename = 'memo_'.$event['Course']['code'].'.pdf';
			$config = array(
				'binary' 		=> 	'/usr/local/bin/wkhtmltopdf', // set the correct path here
				'engine' 		=> 	'CakePdf.WkHtmlToPdf',
				'margin' 		=> 	array(
					'bottom' 			=> 	10,
					'left' 				=> 	25,
					'right' 			=> 	25,
					'top' 				=> 	10,
				),
				'options' 		=> array(
			        'print-media-type' 	=> true,
			        'outline'          	=> true,
			        'dpi'              	=> 200,
			        // 'header-spacing'	=> '1',
					// 'footer-spacing' 	=> '1',
					'margin-bottom' 	=> '3cm',
			        'footer-html'     	=> 'https://rcms.prasarana.com.my/lms/rail_competency/events/footer_html',
			        'footer-center'     => 'Page [page] of [toPage]',
					// 'footer-html' => 'http://www.google.com'
			    ),

				'encoding'		=>	'UTF-8',
				'pageSize'		=>	'A4',
				'orientation'   => 	'portrait',
				// 'download' 		=> 	true
			);
			$config = Configure::read('CakePdf');
			$CakePdf = new CakePdf($config);
	        $CakePdf->viewVars(array('event' => $event, 'service' => $service));

	        // switch between internal and external
	        if ($event['Course']['external'] == 1 ) {
	        	$CakePdf->template('external_memo', 'default');
	        } else {
	        	$CakePdf->template('memo', 'default');
	        }
	        $CakePdf->write(APP . DS.'webroot'. DS. 'generated' . DS . $filename);
	        // setting to server side generation (cli)
	        $output = Configure::read('RCMS.path_to_memos').$filename;
	        $title = 'Memo for '.$event['Course']['code'].' '.$event['Course']['name'];
	        $template = 'memo';
	        $content = array(
	        	'title' => $title,
	        	// 'pdf_file' => 'http://sandbox.prasarana.com.my/lms-ldap/memos/'.$filename,
	        	'start_date' => CakeTime::format($event['Event']['start_date'], '%d-%m-%Y'),
	        	'end_date' => CakeTime::format($event['Event']['end_date'], '%d-%m-%Y'),
	        	);
	    //     $myMailingLIst = new MailingListDetailsController;
	    //     // $myMailingLIst->MailingListDetail->recursive = 0;
	    //     $options = array(
	    //     		'joins' => array(
					// 	array('table' => 'staffs',
					// 	    'alias' => 'Staff',
					// 	    'type' => 'right',
					// 	    'conditions' => array(
					// 	        'MailingListDetail.staff_id = Staff.id',
					// 	    ),
					// 		'fields' => array('DISTINCT Staff.staff_no')
					// 	  ),
					// 	array('table' => 'mailing_lists',
					// 	    'alias' => 'MailingList',
					// 	    'type' => 'right',
					// 	    'conditions' => array(
					// 	        'MailingListDetail.mailing_list_id = MailingList.id',
					// 	    ),
					// 		// 'fields' => array('DISTINCT Staff.staff_no')
					// 	  )
					// 	),
					// 'fields' => array('Staff.email'),
	    //     		'conditions' => array('MailingList.id' => $this->request->data['Event']['mailinglist_id']),// tcn mailing list
	    //     		// 'conditions' => array('MailingList.slug' => Configure::read('RCMS.memo_mailing_list_slug')),// tcn mailing list
	    //     	);
	    //     $emails = $myMailingLIst->MailingListDetail->find('all', $options);
	    //     // pr($emails);

	    //     // break the staff for email
	    //     foreach ($emails as $key => $value) {
	    //     	if (!empty($value['Staff']['email']))
	    //     		$to_emails[] = $value['Staff']['email'];
	    //     }

	    //     $options = array(
	    //     		'joins' => array(
					// 	array('table' => 'mailing_lists',
					// 	    'alias' => 'MailingList',
					// 	    'type' => 'right',
					// 	    'conditions' => array(
					// 	        'MailingListDetail.mailing_list_id = MailingList.id',
					// 	    ),
					// 	  )
					// 	),
					// 'fields' => array('MailingListDetail.email'),
	    //     		'conditions' => array(
	    //     			'MailingList.id' => $this->request->data['Event']['mailinglist_id'],
	    //     			'MailingListDetail.staff_id is NULL'),// tcn mailing list
	    //     		// 'conditions' => array('MailingList.slug' => Configure::read('RCMS.memo_mailing_list_slug')),// tcn mailing list
	    //     	);
	    //     $emails = $myMailingLIst->MailingListDetail->find('all', $options);
	    //     // pr($emails);

	    //     // break the staff for email
	    //     foreach ($emails as $key => $value) {
	    //     	if (!empty($value['MailingListDetail']['email']))
	    //     		$to_emails[] = $value['MailingListDetail']['email'];
	    //     }
	        // pr($to_emails);
	        // die();

	        // if ($this->sendMailWithAttachment($template, $to_emails, $title, $output, $content)) {
	        if ($this->sendMailWithAttachment($template, $this->Session->read('Auth.User.email'), $title, $output, $content)) {
				// $this->Session->setFlash(__('The memo has been emailed to the mailing list (MEMO)'), 'default', array('class' => 'alert alert-success'));
				$this->Session->setFlash(__('The memo has been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-success'));
	        	$this->redirect(array('plugin' => 'rail_competency', 'controller' => 'events', 'action' => 'manage', $event_id));

	        } else {
				$this->Session->setFlash(__('The memo has not been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-danger'));
	        }
	 //    }

	 //    // list mailing list
		// $mailingList = new MailingListsController;
		// $options = array(
		// 		'fields' => array('MailingList.id', 'MailingList.slug', 'MailingList.name'),
		// 		'order' => 'MailingList.name ASC'
		// 	);
		// $mailingLists = $mailingList->MailingList->find('all', $options);
		// $mailingLists = Set::combine($mailingLists, '{n}.MailingList.id', array('%s -  %s', '{n}.MailingList.slug', '{n}.MailingList.name'));
		// $this->set(compact('mailingLists', 'event_id'));
	}

	public function email_my_training_result($event_id = null) {

		$this->autoRender = false;

		// if ($this->request->is('post')) {
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $event_id));
		$event = $this->Event->find('first', $options);

		$available_date = CakeTime::format('Y-m-d', $event['Event']['end_date']);
		$available_date = date('d-m-Y', strtotime($available_date." + 1 days"));
		
		$options['joins'] = array(
						array('table' => 'staff_training_profiles',
						    'alias' => 'StaffTrainingProfile',
						    'type' => 'left',
						    'conditions' => array(
						        'StaffTrainingProfile.staff_id = EventAttendance.staff_id',
						        'StaffTrainingProfile.event_id = EventAttendance.event_id',
						    )
						)
					);
		$options['fields'] = array('DISTINCT EventAttendance.staff_id', 'EventAttendance.event_id', 'StaffTrainingProfile.status');
		$options['conditions'] = array('EventAttendance.event_id' => $event_id, 'EventAttendance.is_completed' => true, 'StaffTrainingProfile.status' => 'PASSED');

		$passed = $this->Event->EventAttendance->find('all', $options);
		
		$options['joins'] = array(
						array('table' => 'staff_training_profiles',
						    'alias' => 'StaffTrainingProfile',
						    'type' => 'left',
						    'conditions' => array(
						        'StaffTrainingProfile.event_id = EventAttendance.event_id',
						        'StaffTrainingProfile.staff_id = EventAttendance.staff_id',
						    )
						)
					);
		$options['fields'] = array('DISTINCT EventAttendance.staff_id', 'EventAttendance.event_id', 'StaffTrainingProfile.status');
		$options['conditions'] = array('EventAttendance.event_id' => $event_id, 'EventAttendance.is_completed' => true, 'StaffTrainingProfile.status' => 'FAILED');

		$failed = $this->Event->EventAttendance->find('all', $options);

		$myDate = CakeTime::format($event['Event']['start_date'], '%d-%m-%Y');
		$filename = 'training_result_'.$event['Course']['code'].'.pdf';
		$config = Configure::read('CakePdf');
		$CakePdf = new CakePdf($config);
        $CakePdf->viewVars(array('event' => $event, 'available_date' => $available_date, 'failed' => $failed, 'passed' => $passed));

        	$CakePdf->template('training_result', 'default');
        $CakePdf->write(APP . DS.'webroot'. DS. 'generated' . DS . $filename);
        // setting to server side generation (cli)
        $output = Configure::read('RCMS.path_to_memos').$filename;
        $title = 'Training Result for '.$event['Course']['code'].' '.$event['Course']['name'];
        $template = 'training_result';
        $content = array(
        	'title' => $title,
        	// 'pdf_file' => 'http://sandbox.prasarana.com.my/lms-ldap/memos/'.$filename,
        	'start_date' => CakeTime::format($event['Event']['start_date'], '%d-%m-%Y'),
        	'end_date' => CakeTime::format($event['Event']['end_date'], '%d-%m-%Y'),
        	);

        if ($this->sendMailWithAttachment($template, $this->Session->read('Auth.User.email'), $title, $output, $content)) {
			$this->Session->setFlash(__('The training result has been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-success'));
        	$this->redirect(array('plugin' => 'rail_competency', 'controller' => 'events', 'action' => 'manage', $event_id));

        } else {
			$this->Session->setFlash(__('The training result has not been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-danger'));
        }
	}

	public function email_tcn($id = null) {
		// $this->autoRender = false;
		if ($this->request->is('post')) {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$event = $this->Event->find('first', $options);

			$available_date = CakeTime::format('Y-m-d', $event['Event']['end_date']);
			$available_date = date('d-m-Y', strtotime($available_date." + 1 days"));
			
			$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.is_completed' => true));
			$attendees = $this->Event->EventAttendance->find('all', $options);
			
			$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.is_completed' => false));
			$absentees = $this->Event->EventAttendance->find('all', $options);

			// $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			// $event = $this->Event->find('first', $options);
			$myDate = CakeTime::format($event['Event']['start_date'], '%d-%m-%Y');
			$filename = 'tcn_'.$event['Course']['code'].'.pdf';
			$config = array(
				'binary' 		=> 	'/usr/local/bin/wkhtmltopdf', // set the correct path here
				'engine' 		=> 	'CakePdf.WkHtmlToPdf',
				'margin' 		=> 	array(
					'bottom' 			=> 	10,
					'left' 				=> 	25,
					'right' 			=> 	25,
					'top' 				=> 	10,
				),
				'options' 		=> array(
			        'print-media-type' 	=> true,
			        'outline'          	=> true,
			        'dpi'              	=> 200,
			        'footer-center'     => 'Page [page] of [toPage]',
			        'header-spacing'	=> '1',
					'footer-spacing' 	=> '1',
			    ),

				'encoding'		=>	'UTF-8',
				'pageSize'		=>	'A4'
				// 'download' 		=> 	true
			);
			$CakePdf = new CakePdf($config);
	        $CakePdf->viewVars(array('event' => $event, 'attendees' => $attendees, 'absentees' => $absentees));
	        $CakePdf->template('tcn', 'default');
	        $CakePdf->write(APP . DS.'webroot'. DS. 'generated' . DS . $filename);
	        // setting to server side generation (cli)
	        $output = Configure::read('RCMS.path_to_memos').$filename;
	        $title = 'TCN for '.$event['Course']['code'].' '.$event['Course']['name'];
	        $template = 'tcn';
	        $content = array(
	        	'title' => $title,
	        	// 'pdf_file' => 'http://sandbox.prasarana.com.my/lms-ldap/memos/'.$filename,
	        	'start_date' => CakeTime::format($event['Event']['start_date'], '%d-%m-%Y'),
	        	'end_date' => CakeTime::format($event['Event']['end_date'], '%d-%m-%Y'),
	        	);

	        $myMailingLIst = new MailingListDetailsController;
	        // $myMailingLIst->MailingListDetail->recursive = 0;
	        $options = array(
	        		'joins' => array(
						array('table' => 'staffs',
						    'alias' => 'Staff',
						    'type' => 'right',
						    'conditions' => array(
						        'MailingListDetail.staff_id = Staff.id',
						    ),
							'fields' => array('DISTINCT Staff.staff_no')
						  ),
						array('table' => 'mailing_lists',
						    'alias' => 'MailingList',
						    'type' => 'right',
						    'conditions' => array(
						        'MailingListDetail.mailing_list_id = MailingList.id',
						    ),
							// 'fields' => array('DISTINCT Staff.staff_no')
						  )
						),
					'fields' => array('Staff.email'),
	        		'conditions' => array('MailingList.id' => $this->request->data['Event']['mailinglist_id']),// tcn mailing list
	        		// 'conditions' => array('MailingList.slug' => Configure::read('RCMS.memo_mailing_list_slug')),// tcn mailing list
	        	);
	        $emails = $myMailingLIst->MailingListDetail->find('all', $options);
	        // pr($emails);

	        // break the staff for email
	        foreach ($emails as $key => $value) {
	        	if (!empty($value['Staff']['email']))
	        		$to_emails[] = $value['Staff']['email'];
	        }

	        $options = array(
	        		'joins' => array(
						array('table' => 'mailing_lists',
						    'alias' => 'MailingList',
						    'type' => 'right',
						    'conditions' => array(
						        'MailingListDetail.mailing_list_id = MailingList.id',
						    ),
						  )
						),
					'fields' => array('MailingListDetail.email'),
	        		'conditions' => array(
	        			'MailingList.id' => $this->request->data['Event']['mailinglist_id'],
	        			'MailingListDetail.staff_id is NULL'),// tcn mailing list
	        		// 'conditions' => array('MailingList.slug' => Configure::read('RCMS.memo_mailing_list_slug')),// tcn mailing list
	        	);
	        $emails = $myMailingLIst->MailingListDetail->find('all', $options);
	        // pr($emails);

	        // break the staff for email
	        foreach ($emails as $key => $value) {
	        	if (!empty($value['MailingListDetail']['email']))
	        		$to_emails[] = $value['MailingListDetail']['email'];
	        }
	        // pr($to_emails);
	        // die();

	        if ($this->sendMailWithAttachment($template, $to_emails, $title, $output, $content)) {
	        // if ($this->sendMailWithAttachment($template, $this->Session->read('Auth.User.email'), $title, $output, $content)) {
				$this->Session->setFlash(__('The memo has been emailed to the mailing list (TCN)'), 'default', array('class' => 'alert alert-success'));
	        	$this->redirect(array('plugin' => 'rail_competency', 'controller' => 'events', 'action' => 'attendance', $id));

	        } else {
				$this->Session->setFlash(__('The memo has not been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-danger'));
	        }
	    }

        // list mailing list
		$mailingList = new MailingListsController;
		$options = array(
				'fields' => array('MailingList.id', 'MailingList.slug', 'MailingList.name'),
				'order' => 'MailingList.name ASC'
			);
		$mailingLists = $mailingList->MailingList->find('all', $options);
		$mailingLists = Set::combine($mailingLists, '{n}.MailingList.id', array('%s -  %s', '{n}.MailingList.slug', '{n}.MailingList.name'));
		$this->set(compact('mailingLists', 'event_id'));
	}

	public function email_my_tcn($id = null) {
		$this->autoRender = false;
		// $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		// $event = $this->Event->find('first', $options);
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);

		$available_date = CakeTime::format('Y-m-d', $event['Event']['end_date']);
		$available_date = date('d-m-Y', strtotime($available_date." + 1 days"));
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.is_completed' => true));
		$attendees = $this->Event->EventAttendance->find('all', $options);
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.is_completed' => false));
		$absentees = $this->Event->EventAttendance->find('all', $options);
		
		$myDate = CakeTime::format($event['Event']['start_date'], '%d-%m-%Y');
		$filename = 'tcn_'.$event['Course']['code'].'.pdf';
		$config = array(
			'binary' 		=> 	'/usr/local/bin/wkhtmltopdf', // set the correct path here
			'engine' 		=> 	'CakePdf.WkHtmlToPdf',
			'margin' 		=> 	array(
				'bottom' 			=> 	10,
				'left' 				=> 	25,
				'right' 			=> 	25,
				'top' 				=> 	10,
			),
			'options' 		=> array(
		        'print-media-type' 	=> true,
		        'outline'          	=> true,
		        'dpi'              	=> 200,
		        'footer-center'     => 'Page [page] of [toPage]',
		        'header-spacing'	=> '1',
				'footer-spacing' 	=> '1',
		    ),

			'encoding'		=>	'UTF-8',
			'pageSize'		=>	'A4'
			// 'download' 		=> 	true
		);
		$CakePdf = new CakePdf($config);
	    $CakePdf->viewVars(array('event' => $event, 'attendees' => $attendees, 'available_date' => $available_date, 'absentees' => $absentees));
        // $CakePdf->viewVars(array('event' => $event));
        $CakePdf->template('tcn', 'default');
        $CakePdf->write(APP . DS.'webroot'. DS. 'generated' . DS . $filename);
        // setting to server side generation (cli)
        $output = Configure::read('RCMS.path_to_memos').$filename;
        $title = 'TCN for '.$event['Course']['code'].' '.$event['Course']['name'];
        $template = 'tcn';
        $content = array(
        	'title' => $title,

        	// 'pdf_file' => 'http://sandbox.prasarana.com.my/lms-ldap/memos/'.$filename,
        	'start_date' => CakeTime::format($event['Event']['start_date'], '%d-%m-%Y'),
        	'end_date' => CakeTime::format($event['Event']['end_date'], '%d-%m-%Y'),
        	);

        // if ($this->sendMailWithAttachment($template, $to_emails, $title, $output, $content)) {
        if ($this->sendMailWithAttachment($template, $this->Session->read('Auth.User.email'), $title, $output, $content)) {
			$this->Session->setFlash(__('The TCN has been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-success'));
			// $this->Session->setFlash(__('The memo has been emailed to the mailing list (TCN)'), 'default', array('class' => 'alert alert-success'));
        	$this->redirect(array('plugin' => 'rail_competency', 'controller' => 'events', 'action' => 'attendance', $id));

        } else {
			$this->Session->setFlash(__('The TCN has not been emailed to '. $this->Session->read('Auth.User.email')), 'default', array('class' => 'alert alert-danger'));
        }
	}

	public function view($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function manage($id = null) {

		$this->Event->recursive = 0;
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);
		$this->set('event', $event);

		$options['conditions'] = array('EventTrainer.event_id' => $event['Event']['id']);
		$event_trainers = $this->Event->EventTrainer->find('all', $options);
		$this->set(compact('event_trainers'));

		$options['conditions'] = array('EventAttendance.event_id' => $event['Event']['id']);
		$event_attendances = $this->Event->EventAttendance->find('all', $options);
		$this->set(compact('event_attendances'));

		$options['conditions'] = array('EventMemo.event_id' => $event['Event']['id']);
		$event_memos = $this->Event->EventMemo->find('all', $options);
		$this->set(compact('event_memos'));

		$options['conditions'] = array('EventAttachment.event_id' => $event['Event']['id']);
		$event_attachments = $this->Event->EventAttachment->find('all', $options);
		$this->set(compact('event_attachments'));

		// find all classes in the service
		$options = array('conditions' => array('Course.service_id' => $event['Course']['service_id']));
		$options = array('fields' => array('Course.id, Course.name, Venue.name, Venue.location, DATE_FORMAT(Event.start_date, "%d-%m-%Y")'));
		$options = array('order' => array('Event.start_date DESC'));
		$event_list = $this->Event->find('all', $options);
		$event_list = Set::combine($event_list, '{n}.Course.id', array('%s -  %s, %s (%s)', '{n}.Course.name', '{n}.Venue.name', '{n}.Venue.location',  '{n}.Event.start_date' ));
		$this->set('event_list', $event_list);

	}

	public function manage2($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function participant_attendance($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function object($id = null) {
		$this->autoRender = false;
		
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		return $this->Event->find('first', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function preview($id = null) {
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}


/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($service_id = null) {
		
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$courses = array();
		// $service_id = '';

		if ($this->request->is('post')) {
			$service_id = $this->request->data['Event']['service_id'];
			if (!empty($this->request->data['Event']['queryString'])) {

				$this->Session->write('course_code', $this->request->data['Event']['queryString']);

				$options = array(
					'fields' => array('id', 'code'),
					'conditions' => array(
						'active' => true, 
						'code like "%'.trim($this->request->data['Event']['queryString']).'%"'
						),
					'order' => 'code ASC'
					);
				 
				$courses = $myCourse->Course->find('list', $options);
			}
		}
		$services = $myService->Service->find('list');
		$this->set('courses', $courses); 
		$this->set(compact('services', 'service_id'));
	}

	public function calendar_all($id = null) {
		
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$courses = array();
		$service_id = '';

		if ($this->request->is('post')) {

			$service_id = $this->request->data['Event']['service_id'];
			if (!empty($this->request->data['Event']['queryString'])) {

				$this->Session->write('course_code', $this->request->data['Event']['queryString']);

				$options = array(
					'fields' => array('id', 'code'),
					'conditions' => array(
						'active' => true, 
						'code like "%'.trim($this->request->data['Event']['queryString']).'%"'
						),
					'order' => 'code ASC'
					);
				 
				$courses = $myCourse->Course->find('list', $options);
			}
		}
		$services = $myService->Service->find('list');
		$this->set('courses', $courses); 
		$this->set(compact('services', 'service_id'));
	}

	public function calendar_room($id = null) {
		
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$courses = array();
		$service_id = '';

		if ($this->request->is('post')) {
			if (!empty($this->request->data['Event']['queryString'])) {

				$this->Session->write('course_code', $this->request->data['Event']['queryString']);

				$options = array(
					'fields' => array('id', 'code'),
					'conditions' => array(
						'active' => true, 
						'code like "%'.trim($this->request->data['Event']['queryString']).'%"'
						),
					'order' => 'code ASC'
					);
				 
				$courses = $myCourse->Course->find('list', $options);
			} else {
				$service_id = $this->request->data['Event']['service_id'];
			}
		}
		$services = $myService->Service->find('list');
		$this->set('courses', $courses); 
		$this->set(compact('services', 'service_id'));
	}

	public function calendar_archieve($id = null) {
		
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$courses = array();
		$service_id = '';

		if ($this->request->is('post')) {
			if (!empty($this->request->data['Event']['queryString'])) {

				$this->Session->write('course_code', $this->request->data['Event']['queryString']);

				$options = array(
					'fields' => array('id', 'code'),
					'conditions' => array(
						'active' => true, 
						'code like "%'.trim($this->request->data['Event']['queryString']).'%"'
						),
					'order' => 'code ASC'
					);
				 
				$courses = $myCourse->Course->find('list', $options);
			} else {
				$service_id = $this->request->data['Event']['service_id'];
			}
		}
		$services = $myService->Service->find('list');
		$this->set('courses', $courses); 
		$this->set(compact('services', 'service_id'));
	}

	public function hrdf_claims($id = null) {
		
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$courses = array();
		$service_id = '';

		if ($this->request->is('post')) {
			if (!empty($this->request->data['Event']['queryString'])) {

				$this->Session->write('course_code', $this->request->data['Event']['queryString']);

				$options = array(
					'fields' => array('id', 'code'),
					'conditions' => array(
						'active' => true, 
						'code like "%'.trim($this->request->data['Event']['queryString']).'%"'
						),
					'order' => 'code ASC'
					);
				 
				$courses = $myCourse->Course->find('list', $options);
			} else {
				$service_id = $this->request->data['Event']['service_id'];
			}
		}
		$services = $myService->Service->find('list');
		$this->set('courses', $courses); 
		$this->set(compact('services', 'service_id'));
	}

	public function calendar_print($service_id = null) {
		
		$this->layout = 'print';

		$myService = new ServicesController;

		$options = array(
			// 'fields' => array('Service.name'),
			'conditions' => array(
				'Service.id' => $service_id
				),
			);
		$services = $myService->Service->find('list', $options);
		$this->set(compact('services', 'service_id'));

	}

	public function training_rooms($venue_id = null) {

		// $this->layout = 'print';
		
		if ($this->request->is('post')) {
			$venue_id = $this->request->data['Event']['venue_id'];
		}

		$this->set(compact('venue_id'));
		
		$myVenue = new VenuesController;
		$options['fields'] = array('Venue.id', 'Venue.location', 'Venue.name');
		$options['order'] = array('Venue.location', 'Venue.name asc');
		$venues = $myVenue->Venue->find('all', $options);
		$venues = Set::combine($venues, '{n}.Venue.id', array('%s -  %s', '{n}.Venue.name', '{n}.Venue.location'));


		$this->set(compact('venues'));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	// public function upcoming($course_code = null) {
		
	// 	// $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
	// 	// $this->set('event', $this->Event->find('first', $options));
	// 	$this->set(compact('course_code'));
	// }

	public function upcoming() {
		
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$courses = array();
		$service_id = '';

		if ($this->request->is('post')) {
			$service_id = $this->request->data['Event']['service_id'];
		}
		$services = $myService->Service->find('list');
		$this->set('courses', $courses); 
		$this->set(compact('services', 'service_id'));
	}
/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function public_calendar($course_code = null) {
		
		$this->layout = "public";
		// $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		// $this->set('event', $this->Event->find('first', $options));
		$this->set(compact('course_code'));
	}

	public function publish ($event_id = null) {

		// $data = array('id' => $id, 'active' => true);
		if ($this->request->is('post')) {
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been published.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
				return $this->redirect( $this->referer() );
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$this->set(compact('event_id'));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		// $this->log("Event - Add!");
		if ($this->request->is('post')) {
			if (isset($this->request->data['Event']['start_date'])) {
				$this->request->data['Event']['start_date'] = $this->split_date($this->request->data['Event']['start_date']);
				$this->request->data['Event']['end_date'] = $this->split_date($this->request->data['Event']['end_date']);
				$this->request->data['Event']['last_enrollment'] = $this->split_date($this->request->data['Event']['last_enrollment']);
			}
			

			$this->Event->create();
			// $this->log("Event - ".pr($this->request->data));
			if ($this->Event->save($this->request->data)) {
				// $this->log("Event - ".pr($this->request->data));
				// $this->log($this->Event->getDataSource()->getLog(false, false));
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));

				// return $this->redirect(array('action' => 'index'));
				return $this->redirect( $this->referer() );

			} else {
				// $this->log("Event - ".pr($this->request->data['Event']['start_date']));
				// $this->log($this->Event->getDataSource()->getLog(false, false));
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$courses = $this->Event->Course->find('list');
		$venues = $this->Event->Venue->find('list');
		$this->set(compact('courses', 'venues'));
		$log = $this->Event->getDataSource()->getLog(false, false);
				//debug($log);
	}

	public function register($id = null) {
		// $this->log("Event - Add!");
		if ($this->request->is('post')) {
			if (isset($this->request->data['Event']['start_date'])) {
				$this->request->data['Event']['start_date'] = $this->split_date2($this->request->data['Event']['start_date']);
				$this->request->data['Event']['end_date'] = $this->split_date2($this->request->data['Event']['end_date']);
				$this->request->data['Event']['last_enrollment'] = $this->split_date2($this->request->data['Event']['last_enrollment']);
			}
			

			$this->Event->create();
			// $this->log("Event - ".pr($this->request->data));
			if ($this->Event->save($this->request->data)) {
				// $this->log("Event - ".pr($this->request->data));
				// $this->log($this->Event->getDataSource()->getLog(false, false));
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));

				// return $this->redirect(array('action' => 'index'));
				return $this->redirect( $this->referer() );

			} else {
				// $this->log("Event - ".pr($this->request->data['Event']['start_date']));
				// $this->log($this->Event->getDataSource()->getLog(false, false));
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		if (!empty($id)) {
			$options = array(
			'conditions' => array('Course.id' => $id),
			);
		}
		$options = array(
			'fields' => array('Course.id', 'Course.code', 'Course.name'),
			'order' => 'Course.code ASC'
			);
		$courses = $this->Event->Course->find('all', $options);
		$courses = Set::combine($courses, '{n}.Course.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));

		
		// $venues = $this->Event->Venues->find('list');
		$options = array(
				'fields' => array('Venue.id', 'Venue.name', 'Venue.location'),
				'order' => 'Venue.name ASC'
				);
		$venues = $this->Event->Venue->find('all', $options);
		$venues = Set::combine($venues, '{n}.Venue.id', array('%s -  %s', '{n}.Venue.name', '{n}.Venue.location'));
		$this->set(compact('courses', 'venues', 'id'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		// $this->log("Event - edit!");
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Event']['start_date'])) {
				$this->request->data['Event']['start_date'] = $this->split_date2($this->request->data['Event']['start_date']);
				$this->request->data['Event']['end_date'] = $this->split_date2($this->request->data['Event']['end_date']);
				$this->request->data['Event']['last_enrollment'] = $this->split_date2($this->request->data['Event']['last_enrollment']);
			}
			
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('action' => 'index'));
				return $this->redirect( $this->referer() );

			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);

			$options = array(
				'fields' => array('Course.id', 'Course.code', 'Course.name'),
				'order' => 'Course.code ASC'
				);
			$courses = $this->Event->Course->find('first', $options);
			$courses = Set::combine($courses, '{n}.Course.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
			
			$options = array(
				'fields' => array('Venue.id', 'Venue.name', 'Venue.location'),
				'order' => 'Venue.name ASC'
				);
			$venues = $this->Event->Venue->find('first', $options);
			$venues = Set::combine($venues, '{n}.Venue.id', array('%s -  %s', '{n}.Venue.name', '{n}.Venue.location'));
			// $venues = $this->Event->Venue->find('list');
		
		}
		$options = array(
			'fields' => array('Course.id', 'Course.code', 'Course.name'),
			'order' => 'Course.code ASC'
			);
		$courses = $this->Event->Course->find('all', $options);
		$courses = Set::combine($courses, '{n}.Course.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
		
		$options = array(
				'fields' => array('Venue.id', 'Venue.name', 'Venue.location'),
				'order' => 'Venue.name ASC'
				);
		$venues = $this->Event->Venue->find('all', $options);
		$venues = Set::combine($venues, '{n}.Venue.id', array('%s -  %s', '{n}.Venue.name', '{n}.Venue.location'));
		// $venues = $this->Event->Venue->find('list');
		$event = $this->Event->findById($id);
		$this->set(compact('courses', 'venues', 'id', 'event'));
	}

	public function move($id = null, $start = null, $end = null) {
		// $this->log("Event - edit!");
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Event']['start_date'])) {
				$this->request->data['Event']['start_date'] = $this->split_date2($this->request->data['Event']['start_date']);
				$this->request->data['Event']['end_date'] = $this->split_date2($this->request->data['Event']['end_date']);
				$this->request->data['Event']['last_enrollment'] = $this->split_date2($this->request->data['Event']['last_enrollment']);
			}
			
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('action' => 'index'));
				return $this->redirect( $this->referer() );

			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);

			$options = array(
				'fields' => array('Course.id', 'Course.code', 'Course.name'),
				'order' => 'Course.code ASC'
				);
			$courses = $this->Event->Course->find('first', $options);
			$courses = Set::combine($courses, '{n}.Course.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
			$options = array(
				'fields' => array('Venue.id', 'Venue.name', 'Venue.location'),
				'order' => 'Venue.name ASC'
				);
			$venues = $this->Event->Venue->find('first', $options);
			$venues = Set::combine($venues, '{n}.Venue.id', array('%s -  %s', '{n}.Venue.name', '{n}.Venue.location'));
			// $venues = $this->Event->Venue->find('list');
		
		}
		$options = array(
			'fields' => array('Course.id', 'Course.code', 'Course.name'),
			'order' => 'Course.code ASC'
			);
		$courses = $this->Event->Course->find('all', $options);
		$courses = Set::combine($courses, '{n}.Course.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
		
		$options = array(
				'fields' => array('Venue.id', 'Venue.name', 'Venue.location'),
				'order' => 'Venue.name ASC'
				);
		$venues = $this->Event->Venue->find('all', $options);
		$venues = Set::combine($venues, '{n}.Venue.id', array('%s -  %s', '{n}.Venue.name', '{n}.Venue.location'));
		$event = $this->Event->findById($id);
		$this->set(compact('courses', 'venues', 'id', 'event', 'start', 'end'));
	}

	public function confirmed_event($id = null) {
		$this->autoRender = false;

		$data = array('id' => $id, 'active' => true);
		if ($this->Event->save($data)) {
			$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
			// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
			return $this->redirect( $this->referer() );
		} else {
			$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function revert_scheduled_event($id = null) {
		$this->autoRender = false;

		$data = array('id' => $id, 'active' => false);
		if ($this->Event->save($data)) {
			$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
			// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
			return $this->redirect( $this->referer() );
		} else {
			$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function copy($id = null) {
		//$this->autoRender = false;

		// $this->log("Event - Copy!");
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Event']['start_date'])) {
				$this->request->data['Event']['start_date'] = $this->split_date2($this->request->data['Event']['start_date']);
				$this->request->data['Event']['end_date'] = $this->split_date2($this->request->data['Event']['end_date']);
				$this->request->data['Event']['last_enrollment'] = $this->split_date2($this->request->data['Event']['last_enrollment']);
			}
			unset($this->request->data['id']);

			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('action' => 'index'));
				return $this->redirect( $this->referer() );

			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		$options = array(
			'fields' => array('Course.id', 'Course.code', 'Course.name'),
			'order' => 'Course.code ASC'
			);
		$courses = $this->Event->Course->find('all', $options);
		$courses = Set::combine($courses, '{n}.Course.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
		
		$options = array(
				'fields' => array('Venue.id', 'Venue.name', 'Venue.location'),
				'order' => 'Venue.name ASC'
				);
		$venues = $this->Event->Venue->find('all', $options);
		$venues = Set::combine($venues, '{n}.Venue.id', array('%s -  %s', '{n}.Venue.name', '{n}.Venue.location'));
		$event = $this->Event->findById($id);
		$this->set(compact('courses', 'venues', 'event'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		// $this->request->allowMethod('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('The event has been deleted.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect($this->referer());
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
	
	public function split_date2($input) {
		// check if date = dd-mm-yyyy (10 chars)
		if (strlen($input) > 10) {
			$arr = explode("-", $input);
		    $time = explode(" ", $arr[2]);
		   	$hr = explode(":", $time[1]);
		   
		    // pr($arr);
		    // pr($time);
		    // pr($hr);

			// check for year 
			if (strlen($arr[0]) == 4) {
				$this->log('4 digit');
				$result = array(
					 "year" => $arr[0], 
					 "month" => $arr[1], 
					 // "year" => $arr[2]
					 "day" => $time[0]
					 , "hour" => $hr[0] 
					 , "min" => $hr[1]
					 , "sec" => 00
				);	
			} else {
				$this->log('! 4 digit');
				$result = array(
					 "day" => $arr[0], 
					 "month" => $arr[1], 
					 // "year" => $arr[2]
					 "year" => $time[0]
					 , "hour" => $hr[0] 
					 , "min" => $hr[1]
					 , "sec" => 00
				);	
			}
		} else {
			$arr = explode("-", $input);
	   
			//Display the Start Date array format
			$result = array(
				 "day" => $arr[0], 
				 "month" => $arr[1], 
				 "year" => $arr[2]
			);
		}
		

		return $result;
		
	}






/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {

		$this->Prg->commonProcess();
		$this->Paginator->settings['conditions'] = $this->Event->parseCriteria($this->Prg->parsedParams());
		$this->set('events', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->Event->recursive = 0;
		// $this->set('events', $this->Paginator->paginate());
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
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		return $this->Event->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$this->set('event', $this->Event->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['Event']['start_date'])) {
				$this->request->data['Event']['start_date'] = $this->admin_split_date($this->request->data['Event']['start_date']);
				$this->request->data['Event']['end_date'] = $this->admin_split_date($this->request->data['Event']['end_date']);
			}
			

			$this->Event->create();
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$courses = $this->Event->Course->find('list');
		$venues = $this->Event->Venue->find('list');
		$this->set(compact('courses', 'venues'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Event->exists($id)) {
			throw new NotFoundException(__('Invalid event'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['Event']['start_date'])) {
				$this->request->data['Event']['start_date'] = $this->admin_split_date($this->request->data['Event']['start_date']);
				$this->request->data['Event']['end_date'] = $this->admin_split_date($this->request->data['Event']['end_date']);
			}
			
			if ($this->Event->save($this->request->data)) {
				$this->Session->setFlash(__('The event has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
			$this->request->data = $this->Event->find('first', $options);
		}
		$courses = $this->Event->Course->find('list');
		$venues = $this->Event->Venue->find('list');
		$this->set(compact('courses', 'venues'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Event->id = $id;
		if (!$this->Event->exists()) {
			throw new NotFoundException(__('Invalid event'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Event->delete()) {
			$this->Session->setFlash(__('The event has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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



    function end_with($haystack, $needle){
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }

      	return (substr($haystack, -$length) === $needle);
  	}

  	    // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	
	function feed_public_calendar($course_code=null) {
		$vars = $this->params['url'];
		if (isset($course_code)) {
			$options = array('conditions' => 
				array(
					'Course.code' => $course_code,
				)
			);
		} else {
			$options = array('conditions' => 
				array(
					'Event.active' => true,
				)
			);
		}
		$events = $this->Event->find('all', $options);

		// pr($events);
		$myCourse = new CoursesController;
		$myService = new ServicesController;

		if (!empty($events)) {
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start_date'];
				} else {
					$allday = false;
					$end = $event['Event']['end_date'];
				}
				
				// $course_name = $myCourse->object($event['Event']['course_id']);
				// if (isset($course_name['Course'])) {
				// 	$title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
				// 	$service = $myService->object($course_name['Course']['service_id']);
				// 	if ($course_name['Course']['external'] == 1) {
				// 		$className = 'bg-external';
				// 	} else {
				// 		$className = $service['Service']['color'];
				// 	}
				// }
				$course_name = $myCourse->object($event['Event']['course_id']);
				if (isset($course_name['Course'])) {
					$title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
					// debug
					// $this->log($title);
					$service = $myService->object($course_name['Course']['service_id']);
					// $this->log($course_name['Course']['external']);
					if ($course_name['Course']['external'] == 1) {
						$className = 'bg-external';
					} else {
						$className = $service['Service']['color'];
					}
				}

				$data[] = array(
						'id' => $event['Event']['id'],
						'title'=> $title,
						'start'=>$event['Event']['start_date'],
						'end' => $end,
						'allDay' => $allday,
						'sneaklink' => Router::url('/') . 'rail_competency/courses/preview/'.$event['Event']['course_id'],
						'enrolllink' => Router::url('/') . 'rail_competency/event_attendances/nominate/'.$event['Event']['id'],
						'details' => $event['Event']['details'],
						'className' => $className 
				);
			}
		} else {
			$data[] = array(
				'id' => 0,
				'title'=> 'Sample Data',
				'start'=>'31-01-2016',
				'end' => '31-01-2016',
				'allDay' => true,
				'sneaklink' => '#',
				'enrolllink' => '#',
				'details' => 'Sample Data',
				'className' => 'bg-default'
			);
		}
		$holidays = $this->get_holidays();

		if (!empty($holidays)) {
			foreach ($holidays as $holiday) {
				$data[] = array(
				'id' => 0,
				'title'=> $holiday['Holiday']['name'],
				'start'=> $holiday['Holiday']['start_date'],
				'end' => $holiday['Holiday']['start_date'],
				'allDay' => true,
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => $holiday['Holiday']['name'],
				'className' => 'bg-danger'
			);
			}
		}
		//$this->set("json", json_encode($data));
		$this->set("events", $data);
	}

    function feed_hrdf2($course_code=null) {
		$vars = $this->params['url'];
		if (isset($course_code)) {
			$options = array('conditions' => 
				array(
					'Event.active' => true,
					'Event.is_tcn' => true,
					'Course.code' => $course_code,
				)
			);
		} else {
			$options = array('conditions' => 
				array(
					'Event.is_tcn' => true,
					'Event.active' => true,
				)
			);
		}
		$events = $this->Event->find('all', $options);

		// pr($events);
		$myCourse = new CoursesController;
		$myService = new ServicesController;

		if (!empty($events)) {
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start_date'];
				} else {
					$allday = false;
					$end = $event['Event']['end_date'];
				}
				
				// $course_name = $myCourse->object($event['Event']['course_id']);
				// if (isset($course_name['Course'])) {
				// 	$title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
				// 	$service = $myService->object($course_name['Course']['service_id']);
				// 	if ($course_name['Course']['external'] == 1) {
				// 		$className = 'bg-external';
				// 	} else {
				// 		$className = $service['Service']['color'];
				// 	}
				// }
				$course_name = $myCourse->object($event['Event']['course_id']);
				if (isset($course_name['Course'])) {
					$title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
					// debug
					// $this->log($title);
					$service = $myService->object($course_name['Course']['service_id']);
					// $this->log($course_name['Course']['external']);
					if ($course_name['Course']['external'] == 1) {
						$className = 'bg-external';
					} else {
						$className = $service['Service']['color'];
					}
				}

				$data[] = array(
						'id' => $event['Event']['id'],
						'title'=> $title,
						'start'=>$event['Event']['start_date'],
						'end' => $end,
						'allDay' => $allday,
						'sneaklink' => Router::url('/') . 'rail_competency/courses/preview/'.$event['Event']['course_id'],
						'enrolllink' => Router::url('/') . 'rail_competency/event_claims/manage/'.$event['Event']['id'],
						'details' => $event['Event']['details'],
						'className' => $className 
				);
			}
		} else {
			$data[] = array(
				'id' => 0,
				'title'=> 'Sample Data',
				'start'=>'31-01-2016',
				'end' => '31-01-2016',
				'allDay' => true,
				'sneaklink' => '#',
				'enrolllink' => '#',
				'details' => 'Sample Data',
				'className' => 'bg-default'
			);
		}
		$holidays = $this->get_holidays();

		if (!empty($holidays)) {
			foreach ($holidays as $holiday) {
				$data[] = array(
				'id' => 0,
				'title'=> $holiday['Holiday']['name'],
				'start'=> $holiday['Holiday']['start_date'],
				'end' => $holiday['Holiday']['start_date'],
				'allDay' => true,
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => $holiday['Holiday']['name'],
				'className' => 'bg-danger'
			);
			}
		}
		//$this->set("json", json_encode($data));
		$this->set("events", $data);
	}

    function feed_course_analysis() {
		//$this->layout = "ajax";
		$vars = $this->params['url'];
			$options = array(
				'conditions' => array(
					'Course.code like "%'.$vars['code'].'%"',
				),
				'order' => array('Course.code ASC'),
				'group' => array('Event.course_id ASC')
			);
		$events = $this->Event->find('all', $options);

		// pr($events);
		$myCourse = new CoursesController;
		// $myService = new ServicesController;
		$planned = 0;
		$conducted = 0;
		$attendees = 0;
		$course_name = 'Sample 1';
		$course_code = 'Test101';

		if (!empty($events)) {
			foreach($events as $event) {
				if (isset($event['Course'])) {
					$course_code = $event['Course']['code'];
					$course_name = $event['Course']['name'];
					if ($event['Event']['active'] == 1) {
						$conducted++;
						$planned++;
						if(!empty($event['EventAttendance']))
							foreach ($event['EventAttendance'] as $attendance) {
								if ($attendance['active'] == 1){
									$attendees++;
								}
							}
					} else {
						$planned++;
					}
				}
				$data[] = array(
						'course_code'	=> $course_code,
						'course_name'	=> $course_name,
						'planned'		=> $planned,
						'conducted' 	=> $conducted,
						'attendees' 	=> $attendees
				);
				$planned = 0;
				$conducted = 0;
				$attendees = 0;
			}
		} else {
			$data[] = array(
				'course_code'	=> $course_code,
				'course_code'	=> $course_name,
				'planned'		=> $planned,
				'conducted' 	=> $conducted,
				'attendees' 	=> $attendees
			);
		}
		//$this->set("json", json_encode($data));
		$this->set("events", $data);
	}

	function feed_event($course_code=null) {
		//$this->layout = "ajax";
		$myRole = CakeSession::read('Auth.User.role_id');

		// $this->log('my role :'.$myRole);
		
		$vars = $this->params['url'];

		if (isset($vars['service_id']) && $myRole == 8) {
			$options = array('conditions' => 
				array(
					'Course.service_id' => $vars['service_id'],
					'Event.active' => true,
					'Event.start_date >= CONCAT(LEFT(NOW() - INTERVAL 1 MONTH,7),"-01")',
					'Event.start_date <= NOW() + INTERVAL 2 MONTH'
					// 'Event.is_memo' => true,
				)
			);
		} else if ($myRole == 8) {
			$options = array('conditions' => 
				array(
					// 'Event.is_memo' => true,
					'Event.active' => true,
					'Event.start_date >= CONCAT(LEFT(NOW() - INTERVAL 1 MONTH,7),"-01")',
					'Event.start_date <= NOW() + INTERVAL 2 MONTH'
				)
			);
		} else if (isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.service_id' => $vars['service_id'],
					'Event.active' => true,
					'Event.is_tcn' => false,
					'Event.is_memo' => false,
					'Event.start_date >= CONCAT(LEFT(NOW() - INTERVAL 1 MONTH,7),"-01")',
					'Event.start_date <= NOW() + INTERVAL 2 MONTH'
				)
			);
		} else {
			$options = array('conditions' => 
				array(
					'Event.active' => true,
					'Event.is_tcn' => false,
					'Event.is_memo' => false,
					'Event.start_date >= CONCAT(LEFT(NOW() - INTERVAL 1 MONTH,7),"-01")',
					'Event.start_date <= NOW() + INTERVAL 2 MONTH'
				)
			);
		}
		$events = $this->Event->find('all', $options);

		// pr($events);
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$myVenue = new VenuesController;
		$myEventTrainer = new EventTrainersController;
		$myTrainer = new TrainersController;
		$myAttendance = new EventAttendancesController;
		$myStaff = new StaffsController;

		$attendees = 0;
		$pax = 0;

		if (!empty($events)) {
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start_date'];
				} else {
					$allday = false;
					$end = $event['Event']['end_date'];
				}
				
				$lead_trainer = '';
				$asst_trainer = '';

				$course_name = $myCourse->object($event['Event']['course_id']);
				$venue = $myVenue->object($event['Event']['venue_id']);
				$leads = $myEventTrainer->get_trainers($event['Event']['id']);
				if (!empty($leads)) {
					foreach ($leads as $event_trainer) {
						$trainer = $myTrainer->object($event_trainer['EventTrainer']['trainer_id']);
						if (!empty($trainer))
							$staff = $myStaff->object($trainer['Trainer']['staff_id']);
						if (!empty($staff))
							$lead_trainer .= $staff['Staff']['name'].($event_trainer['EventTrainer']['is_assist']==1?:' <blink><i class="fa fa-star text-danger"></i></blink>').'<br>';
						// $this->log($lead_trainer);
					}
				}
				
				if (isset($course_name['Course'])) {
					$title = $event['Event']['id'].' ['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
					// debug
					$pax = $course_name['Course']['pax'];
					// $this->log($title);
					if (!empty($venue['Venue'])) {
						$myLocation = $venue['Venue']['name'].', '.$venue['Venue']['location'];
					} else {
						$myLocation = 'TBD';
					}
					$service = $myService->object($course_name['Course']['service_id']);
					// $this->log($course_name['Course']['external']);
					if ($course_name['Course']['external'] == 1) {
						$className = 'bg-external';
					} else {
						$className = $service['Service']['color'];
					}
				}

				$attendances = $myAttendance->get_event_attendance($event['Event']['id']);
				
				$data[] = array(
					'id' => $event['Event']['id'],
					'title'=> $title,
					'start'=>$event['Event']['start_date'],
					'end' => $end,
					'allDay' => $allday,
					'venue' => $myLocation,
					'lead_trainer' => $lead_trainer,
					'asst_trainer' => $lead_trainer,
					'attendees' => $attendances,
					'pax' => $pax,
					'sneaklink' => Router::url('/') . 'rail_competency/courses/preview/'.$event['Event']['course_id'],
					'enrolllink' => Router::url('/') . 'rail_competency/event_attendances/nominate/'.$event['Event']['id'],
					'attendancelink' => Router::url('/') . 'rail_competency/events/attendance/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $className
				);
			}
		} else {
			$data[] = array(
				'id' => 0,
				'title'=> 'Sample Data',
				'start'=>'31-01-2016',
				'end' => '31-01-2016',
				'allDay' => true,
				'attendees' => '0',
				'pax' => '0',
				'sneaklink' => '#',
				'enrolllink' => '#',
				'attendancelink' => '#',
				'details' => 'Sample Data',
				'className' => 'bg-default'
			);
		}

		$holidays = $this->get_holidays();

		if (!empty($holidays)) {
			foreach ($holidays as $holiday) {
				$data[] = array(
				'id' => 0,
				'title'=> $holiday['Holiday']['name'],
				'start'=> $holiday['Holiday']['start_date'],
				'end' => $holiday['Holiday']['start_date'],
				'allDay' => true,
				'attendees' => '0',
				'pax' => '0',
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => $holiday['Holiday']['name'],
				'className' => 'bg-red'
			);
			}
		}

		$this->set("events", $data);
	}

	function feed_venue() {
		//$this->layout = "ajax";
		$vars = $this->params['url'];

		// pr($vars['venue_id']);

		if (isset($vars['venue_id'])) {
			$options = array('conditions' => 
				array(
					'Venue.id' => $vars['venue_id'],
				)
			);
			$events = $this->Event->find('all', $options);
		} else {
			$events = $this->Event->find('all');
		}
		

		// pr($events);
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$myVenue = new VenuesController;

		if (!empty($events)) {
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start_date'];
				} else {
					$allday = false;
					$end = $event['Event']['end_date'];
				}
				
				$course_name = $myCourse->object($event['Event']['course_id']);
				$venue = $myVenue->object($event['Event']['venue_id']);
				// pr($venue);

				if (isset($course_name['Course']) && isset($venue['Venue'])) {
					$title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
					if (!empty($venue['Venue'])) {
						$myLocation = $venue['Venue']['name'].', '.$venue['Venue']['location'];
					} else {
						$myLocation = "TBD";
					}
					// $myLocation = $venue['Venue']['name'].', '.$venue['Venue']['location'];
					$service = $myService->object($course_name['Course']['service_id']);
					// debug
					// $this->log($course_name['Course']['external']);
					if ($course_name['Course']['external'] == 1) {
						$className = 'bg-external';
					} else {
						$className = $service['Service']['color'];
					}
					// $this->log($myLocation);
				}

				$data[] = array(
					'id' => $event['Event']['id'],
					'title'=> $title,
					'venue' => $myLocation,
					'start'=>$event['Event']['start_date'],
					'end' => $end,
					'allDay' => $allday,
					'sneaklink' => Router::url('/') . 'rail_competency/courses/preview/'.$event['Event']['course_id'],
					'editlink' => Router::url('/') . 'rail_competency/events/manage/'.$event['Event']['id'],
					'enrolllink' => Router::url('/') . 'rail_competency/event_attendances/nominate/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $className
				);
			}
		} else {
			$data[] = array(
				'id' => 0,
				'title'=> 'Sample Data',
				'start'=>'31-01-2016',
				'end' => '31-01-2016',
				'allDay' => true,
				'sneaklink' => '#',
				'enrolllink' => '#',
				'details' => 'Sample Data',
				'className' => 'bg-default'
			);
		}
		//$this->set("json", json_encode($data));
		$holidays = $this->get_holidays();

		if (!empty($holidays)) {
			foreach ($holidays as $holiday) {
				$data[] = array(
				'id' => 0,
				'title'=> $holiday['Holiday']['name'],
				'start'=> $holiday['Holiday']['start_date'],
				'end' => $holiday['Holiday']['start_date'],
				'allDay' => true,
				'attendees' => '0',
				'pax' => '0',
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => $holiday['Holiday']['name'],
				'className' => 'bg-red'
			);
			}
		}
		$this->set("events", $data);
	}

    function feed_hrdf($course_code=null) {
		//$this->layout = "ajax";
		// $this->autoRender = false;
		$vars = $this->params['url'];

    	if (isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.service_id' => $vars['service_id'],
					// 'Event.is_tcn' => true,
				)
			);
		} else if (isset($course_code)) {
			$options = array('conditions' => 
				array(
					'Course.code like "%'.$course_code.'%"',
					// 'Event.is_tcn' => true,
				)
			);

		} else if (isset($course_code) && isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.code like "%'.$course_code.'%"',
					'Course.service_id' => $vars['service_id'],
					// 'Event.is_tcn' => true,
				)
			);

		} else {
			$options = array('conditions' => 
				array(
					// 'Event.is_tcn' => true,
				)
			);
		}

		$this->Event->recursive = 0;
		$events = $this->Event->find('all', $options);

    	if (!empty($this->Session->check('course_code'))){
    		$course_code = $this->Session->read('course_code');
    		$this->Session->delete('course_code');
    	}

		// define the json 
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$myVenue = new VenuesController;
		$myEventTrainer = new EventTrainersController;
		$myTrainer = new TrainersController;
		$myAttendance = new EventAttendancesController;
		$myStaff = new StaffsController;

		$attendees = 0;
		$pax = 0;

		if (!empty($events)) {
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start_date'];
				} else {
					$allday = false;
					$end = $event['Event']['end_date'];
				}
				
				$lead_trainer = '';
				$asst_trainer = '';

				$course_name = $myCourse->object($event['Event']['course_id']);
				$venue = $myVenue->object($event['Event']['venue_id']);
				$leads = $myEventTrainer->get_trainers($event['Event']['id']);
				if (!empty($leads)) {
					foreach ($leads as $event_trainer) {
						$trainer = $myTrainer->object($event_trainer['EventTrainer']['trainer_id']);
						if (!empty($trainer))
							$staff = $myStaff->object($trainer['Trainer']['staff_id']);
						if (!empty($staff))
							$lead_trainer .= $staff['Staff']['name'].($event_trainer['EventTrainer']['is_assist']==1?:' <blink><i class="fa fa-star text-danger"></i></blink>').'<br>';
						// $this->log($lead_trainer);
					}
				}
				if (isset($course_name['Course'])) {
					$title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
					if (!empty($venue['Venue'])) {
						$myLocation = $venue['Venue']['name'].', '.$venue['Venue']['location'];
					} else {
						$myLocation = "TBD";
					}
					$service = $myService->object($course_name['Course']['service_id']);
					$pax = $course_name['Course']['pax'];

					$this->log($course_name['Course']['external']);
					if ($course_name['Course']['external'] == 1) {
						$className = 'bg-external';
					} else {
						$className = $service['Service']['color'];
					}
				}
				$attendances = $myAttendance->get_event_attendance($event['Event']['id']);
				$data[] = array(
					'id' => $event['Event']['id'],
					'title'=> $title,
					'venue' => $myLocation,
					'lead_trainer' => $lead_trainer,
					'asst_trainer' => $lead_trainer,
					'pax' => $pax,
					'attendees' => $attendances,
					'start'=>$event['Event']['start_date'],
					'end' => $end,
					'allDay' => $allday,
					'sneaklink' => Router::url('/') . 'rail_competency/courses/preview/'.$event['Event']['course_id'],
					'enrolllink' => Router::url('/') . 'rail_competency/event_claims/manage/'.$event['Event']['id'],
					// 'editlink' => Router::url('/') . 'rail_competency/events/manage/'.$event['Event']['id'],
					// 'deletelink' => Router::url('/') . 'rail_competency/events/delete/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $className
				);
			}
		} else {
			$data[] = array(
				'id' => 0,
				'title'=> 'Test Data',
				'start'=>'01-01-2016',
				'end' => '01-01-2016',
				'attendees' => '0',
				'pax' => '0',
				'allDay' => false,
				'sneaklink' => '#',
				'enrolllink' => '#',
				// 'deletelink' => '#',
				'details' => 'This is a test data.',
				'className' => 'bg-warning'
			);
		}

		$holidays = $this->get_holidays();

		if (!empty($holidays)) {
			foreach ($holidays as $holiday) {
				$data[] = array(
				'id' => 0,
				'title'=> $holiday['Holiday']['name'],
				'start'=> $holiday['Holiday']['start_date'],
				'end' => $holiday['Holiday']['start_date'],
				'allDay' => true,
				'attendees' => '0',
				'pax' => '0',
				'sneaklink' => '#',
				'enrolllink' => '#',
				// 'deletelink' => '#',
				'details' => $holiday['Holiday']['name'],
				'className' => 'bg-red'
			);
			}
		}
		
		//$this->set("json", json_encode($data));
		$this->set("events", $data);
	}

	function feed_setup($course_code=null) {
		//$this->layout = "ajax";
		// $this->autoRender = false;
		$vars = $this->params['url'];

    	if (isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.service_id' => $vars['service_id'],
					// 'Event.is_tcn' => false,
					'Event.start_date >= CONCAT(LEFT(NOW() - INTERVAL 1 MONTH,7),"-01")',
					'Event.start_date <= NOW() + INTERVAL 2 MONTH'
				)
			);
		} else if (isset($course_code)) {
			$options = array('conditions' => 
				array(
					'Course.code like "%'.$course_code.'%"',
					// 'Event.is_tcn' => false,
					'Event.start_date >= CONCAT(LEFT(NOW() - INTERVAL 1 MONTH,7),"-01")',
					'Event.start_date <= NOW() + INTERVAL 2 MONTH'
				)
			);

		} else if (isset($course_code) && isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.code like "%'.$course_code.'%"',
					'Course.service_id' => $vars['service_id'],
					// 'Event.is_tcn' => false,
					'Event.start_date >= CONCAT(LEFT(NOW() - INTERVAL 1 MONTH,7),"-01")',
					'Event.start_date <= NOW() + INTERVAL 2 MONTH'
				)
			);

		} else {
			$options = array('conditions' => 
				array(
					// 'Event.is_tcn' => false,
					'Event.start_date >= CONCAT(LEFT(NOW() - INTERVAL 10 MONTH,7),"-01")',
					'Event.start_date <= NOW() + INTERVAL 2 MONTH'
				)
			);
		}

		$this->Event->recursive = 0;
		$events = $this->Event->find('all', $options);

    	if (!empty($this->Session->check('course_code'))){
    		$course_code = $this->Session->read('course_code');
    		$this->Session->delete('course_code');
    	}

		// define the json 
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$myVenue = new VenuesController;
		$myEventTrainer = new EventTrainersController;
		$myTrainer = new TrainersController;
		$myAttendance = new EventAttendancesController;
		$myStaff = new StaffsController;

		$attendees = 0;
		$pax = 0;

		if (!empty($events)) {
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start_date'];
				} else {
					$allday = false;
					$end = $event['Event']['end_date'];
				}
				
				$lead_trainer = '';
				$asst_trainer = '';

				$course_name = $myCourse->object($event['Event']['course_id']);
				$venue = $myVenue->object($event['Event']['venue_id']);
				$leads = $myEventTrainer->get_trainers($event['Event']['id']);
				if (!empty($leads)) {
					foreach ($leads as $event_trainer) {
						$trainer = $myTrainer->object($event_trainer['EventTrainer']['trainer_id']);
						if (!empty($trainer))
							$staff = $myStaff->object($trainer['Trainer']['staff_id']);
						if (!empty($staff))
							$lead_trainer .= $staff['Staff']['name'].($event_trainer['EventTrainer']['is_assist']==1?:' <blink><i class="fa fa-star text-danger"></i></blink>').'<br>';
						$this->log($lead_trainer);
					}
				}
				if (isset($course_name['Course'])) {
					$title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
					if (!empty($venue['Venue'])) {
						$myLocation = $venue['Venue']['name'].', '.$venue['Venue']['location'];
					} else {
						$myLocation = "TBD";
					}
					$service = $myService->object($course_name['Course']['service_id']);
					$pax = $course_name['Course']['pax'];

					// $this->log($course_name['Course']['external']);
					if ($course_name['Course']['external'] == 1) {
						$className = 'bg-external';
					} else {
						$className = $service['Service']['color'];
					}
				}
				$attendances = $myAttendance->get_event_attendance($event['Event']['id']);
				$data[] = array(
					'id' => $event['Event']['id'],
					'title'=> $title,
					'venue' => $myLocation,
					'lead_trainer' => $lead_trainer,
					'asst_trainer' => $lead_trainer,
					'pax' => $pax,
					'attendees' => $attendances,
					'start'=>$event['Event']['start_date'],
					'end' => $end,
					'allDay' => $allday,
					'sneaklink' => Router::url('/') . 'rail_competency/courses/preview/'.$event['Event']['course_id'],
					'enrolllink' => Router::url('/') . 'rail_competency/event_attendances/nominate/'.$event['Event']['id'],
					'editlink' => Router::url('/') . 'rail_competency/events/manage/'.$event['Event']['id'],
					// 'deletelink' => Router::url('/') . 'rail_competency/events/delete/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $className
				);
			}
		} else {
			$data[] = array(
				'id' => 0,
				'title'=> 'Test Data',
				'start'=>'01-01-2016',
				'end' => '01-01-2016',
				'attendees' => '0',
				'pax' => '0',
				'allDay' => false,
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => 'This is a test data.',
				'className' => 'bg-warning'
			);
		}

		$holidays = $this->get_holidays();

		if (!empty($holidays)) {
			foreach ($holidays as $holiday) {
				$data[] = array(
				'id' => 0,
				'title'=> $holiday['Holiday']['name'],
				'start'=> $holiday['Holiday']['start_date'],
				'end' => $holiday['Holiday']['start_date'],
				'allDay' => true,
				'attendees' => '0',
				'pax' => '0',
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => $holiday['Holiday']['name'],
				'className' => 'bg-red'
			);
			}
		}
		
		//$this->set("json", json_encode($data));
		$this->set("events", $data);
	}

	function feed_archieve($course_code=null) {
		//$this->layout = "ajax";
		// $this->autoRender = false;
		$vars = $this->params['url'];

    	if (isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.service_id' => $vars['service_id'],
					'Event.is_tcn' => true,
				)
			);
		} else if (isset($course_code)) {
			$options = array('conditions' => 
				array(
					'Course.code like "%'.$course_code.'%"',
					'Event.is_tcn' => true,
				)
			);

		} else if (isset($course_code) && isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.code like "%'.$course_code.'%"',
					'Course.service_id' => $vars['service_id'],
					'Event.is_tcn' => true,
				)
			);

		} else {
			$options = array('conditions' => 
				array(
					'Event.is_tcn' => true,
				)
			);
		}

		$this->Event->recursive = 0;
		$events = $this->Event->find('all', $options);

    	if (!empty($this->Session->check('course_code'))){
    		$course_code = $this->Session->read('course_code');
    		$this->Session->delete('course_code');
    	}

		// define the json 
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$myVenue = new VenuesController;
		$myEventTrainer = new EventTrainersController;
		$myTrainer = new TrainersController;
		$myAttendance = new EventAttendancesController;
		$myStaff = new StaffsController;

		$attendees = 0;
		$pax = 0;

		if (!empty($events)) {
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start_date'];
				} else {
					$allday = false;
					$end = $event['Event']['end_date'];
				}
				
				$lead_trainer = '';
				$asst_trainer = '';

				$course_name = $myCourse->object($event['Event']['course_id']);
				$venue = $myVenue->object($event['Event']['venue_id']);
				$leads = $myEventTrainer->get_trainers($event['Event']['id']);
				if (!empty($leads)) {
					foreach ($leads as $event_trainer) {
						$trainer = $myTrainer->object($event_trainer['EventTrainer']['trainer_id']);
						if (!empty($trainer))
							$staff = $myStaff->object($trainer['Trainer']['staff_id']);
						if (!empty($staff))
							$lead_trainer .= $staff['Staff']['name'].($event_trainer['EventTrainer']['is_assist']==1?:' <blink><i class="fa fa-star text-danger"></i></blink>').'<br>';
						$this->log($lead_trainer);
					}
				}
				if (isset($course_name['Course'])) {
					$title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
					if (!empty($venue['Venue'])) {
						$myLocation = $venue['Venue']['name'].', '.$venue['Venue']['location'];
					} else {
						$myLocation = "TBD";
					}
					$service = $myService->object($course_name['Course']['service_id']);
					$pax = $course_name['Course']['pax'];

					// $this->log($course_name['Course']['external']);
					if ($course_name['Course']['external'] == 1) {
						$className = 'bg-external';
					} else {
						$className = $service['Service']['color'];
					}
				}
				$attendances = $myAttendance->get_event_attendance($event['Event']['id']);
				$data[] = array(
					'id' => $event['Event']['id'],
					'title'=> $title,
					'venue' => $myLocation,
					'lead_trainer' => $lead_trainer,
					'asst_trainer' => $lead_trainer,
					'pax' => $pax,
					'attendees' => $attendances,
					'start'=>$event['Event']['start_date'],
					'end' => $end,
					'allDay' => $allday,
					'sneaklink' => Router::url('/') . 'rail_competency/courses/preview/'.$event['Event']['course_id'],
					'enrolllink' => Router::url('/') . 'rail_competency/events/attendance/'.$event['Event']['id'],
					'editlink' => Router::url('/') . 'rail_competency/events/manage/'.$event['Event']['id'],
					// 'deletelink' => Router::url('/') . 'rail_competency/events/delete/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $className
				);
			}
		} else {
			$data[] = array(
				'id' => 0,
				'title'=> 'Test Data',
				'start'=>'01-01-2016',
				'end' => '01-01-2016',
				'attendees' => '0',
				'pax' => '0',
				'allDay' => false,
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => 'This is a test data.',
				'className' => 'bg-warning'
			);
		}

		$holidays = $this->get_holidays();

		if (!empty($holidays)) {
			foreach ($holidays as $holiday) {
				$data[] = array(
				'id' => 0,
				'title'=> $holiday['Holiday']['name'],
				'start'=> $holiday['Holiday']['start_date'],
				'end' => $holiday['Holiday']['start_date'],
				'allDay' => true,
				'attendees' => '0',
				'pax' => '0',
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => $holiday['Holiday']['name'],
				'className' => 'bg-red'
			);
			}
		}
		
		//$this->set("json", json_encode($data));
		$this->set("events", $data);
	}

	function feed_event_room($course_code=null) {
		//$this->layout = "ajax";
		// $this->autoRender = false;
		$vars = $this->params['url'];

    	if (isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.service_id' => $vars['service_id'],
					'Event.is_tcn' => false,
				)
			);
		} else if (isset($course_code)) {
			$options = array('conditions' => 
				array(
					'Course.code like "%'.$course_code.'%"',
					'Event.is_tcn' => false,
				)
			);

		} else if (isset($course_code) && isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					'Course.code like "%'.$course_code.'%"',
					'Course.service_id' => $vars['service_id'],
					'Event.is_tcn' => false,
				)
			);

		} else {
			$options = array('conditions' => 
				array(
					'Event.is_tcn' => false,
				)
			);
		}

		$this->Event->recursive = 0;
		$events = $this->Event->find('all', $options);

    	if (!empty($this->Session->check('course_code'))){
    		$course_code = $this->Session->read('course_code');
    		$this->Session->delete('course_code');
    	}

		// define the json 
		$myCourse = new CoursesController;
		$myService = new ServicesController;
		$myVenue = new VenuesController;
		$myEventTrainer = new EventTrainersController;
		$myTrainer = new TrainersController;
		$myAttendance = new EventAttendancesController;
		$myStaff = new StaffsController;

		$attendees = 0;
		$pax = 0;

		if (!empty($events)) {
			foreach($events as $event) {
				if($event['Event']['all_day'] == 1) {
					$allday = true;
					$end = $event['Event']['start_date'];
				} else {
					$allday = false;
					$end = $event['Event']['end_date'];
				}
				
				$lead_trainer = '';
				$asst_trainer = '';

				$course_name = $myCourse->object($event['Event']['course_id']);
				$venue = $myVenue->object($event['Event']['venue_id']);
				$leads = $myEventTrainer->get_trainers($event['Event']['id']);
				if (!empty($leads)) {
					foreach ($leads as $event_trainer) {
						$trainer = $myTrainer->object($event_trainer['EventTrainer']['trainer_id']);
						if (!empty($trainer))
							$staff = $myStaff->object($trainer['Trainer']['staff_id']);
						if (!empty($staff))
							$lead_trainer .= $staff['Staff']['name'].($event_trainer['EventTrainer']['is_assist']==1?:' <blink><i class="fa fa-star text-danger"></i></blink>').'<br>';
						// $this->log($lead_trainer);
					}
				}
				if (isset($course_name['Course'])) {
					$title = '['.$course_name['Course']['code'].']';
					// $title = '['.$course_name['Course']['code'].'] - '.$course_name['Course']['name'].' '.$event['Event']['details'];
					if (!empty($venue['Venue'])) {
						$myLocation = $venue['Venue']['name'].', '.$venue['Venue']['location'];
					} else {
						$myLocation = "TBD";
					}
					$service = $myService->object($course_name['Course']['service_id']);
					$pax = $course_name['Course']['pax'];

					// $this->log($course_name['Course']['external']);
					if ($course_name['Course']['external'] == 1) {
						$className = 'bg-external';
					} else {
						$className = $service['Service']['color'];
					}
				}
				$attendances = $myAttendance->get_event_attendance($event['Event']['id']);
				$data[] = array(
					'id' => $event['Event']['id'],
					'title'=> $myLocation.': '.$title,
					'venue' => '', //$myLocation,
					'lead_trainer' => $lead_trainer,
					'asst_trainer' => $lead_trainer,
					'pax' => $pax,
					'attendees' => $attendances,
					'start'=>$event['Event']['start_date'],
					'end' => $end,
					'allDay' => $allday,
					'sneaklink' => Router::url('/') . 'rail_competency/courses/preview/'.$event['Event']['course_id'],
					'enrolllink' => Router::url('/') . 'rail_competency/event_attendances/nominate/'.$event['Event']['id'],
					'editlink' => Router::url('/') . 'rail_competency/events/manage/'.$event['Event']['id'],
					// 'deletelink' => Router::url('/') . 'rail_competency/events/delete/'.$event['Event']['id'],
					'details' => $event['Event']['details'],
					'className' => $className
				);
			}
		} else {
			$data[] = array(
				'id' => 0,
				'title'=> 'Test Data',
				'start'=>'01-01-2016',
				'end' => '01-01-2016',
				'attendees' => '0',
				'pax' => '0',
				'allDay' => false,
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => 'This is a test data.',
				'className' => 'bg-warning'
			);
		}

		$holidays = $this->get_holidays();

		if (!empty($holidays)) {
			foreach ($holidays as $holiday) {
				$data[] = array(
				'id' => 0,
				'title'=> $holiday['Holiday']['name'],
				'start'=> $holiday['Holiday']['start_date'],
				'end' => $holiday['Holiday']['start_date'],
				'allDay' => true,
				'attendees' => '0',
				'pax' => '0',
				'sneaklink' => '#',
				'editlink' => '#',
				'deletelink' => '#',
				'details' => $holiday['Holiday']['name'],
				'className' => 'bg-red'
			);
			}
		}
		
		//$this->set("json", json_encode($data));
		$this->set("events", $data);
	}

	public function is_memo($id = null) {
		// $this->log('Event.is_memo');
		$data = array('id' => $id, 'is_memo' => true);
		$this->Event->save($data);
	}

    public function is_tcn($id = null) {
		$data = array('id' => $id, 'is_tcn' => true);
		$this->Event->save($data);
	}

	public function get_holidays() {
		$holiday = new HolidaysController;

		return $holiday->Holiday->find('all');
	}

        // The update action is called from "webroot/js/ready.js" to update date/time when an event is dragged or resized
	
	public function update_claim($event_id = null, $status = null) {
		// $this->log('Event Management - update claim status');
		$this->autoRender = false;

		$this->Event->id = $event_id;
		$this->Event->saveField('is_claimed', $status);

		$this->redirect($this->referer());
	}

	public function check_claim_status ($event_id = null) {

		$options['conditions'] = array('Event.id' => $event_id);
		return $this->Event->find('first', $options);
	}

	function update() {
		// $this->log('Event Management - update event');
		$this->autoRender = false;

		$vars = $this->params['url'];
		// $this->Event->id = $vars['id'];

		// find course id from course code
		$myCourse = new CoursesController;
		$course = $myCourse->Course->findByCode($vars['code']);
		$duration = $course['Course']['duration'];

		// add duration to start date
		// change $vars['end'] to date format then add duration to get actual end date
		$start_date = $this->split_date2($vars['start']);
		$end_date = $this->get_end_date($vars['start'], $vars['end'], $duration);

		$this->Event->saveField('course_id', $course['Course']['id']);
		$this->Event->saveField('start_date', $start_date);
		$this->Event->saveField('end_date', $end_date);
		// $this->Event->saveField('all_day', $vars['allday']);
	}

	function create_event($start_date = null, $end_date = null) {
		$holiday = new HolidaysController;
		// find holiday and weekends within start and end date

	}

	function alter_event() {
		$this->autoRender = false;
		$this->log('alter_event');
		$vars = $this->params['url'];

        // find course id from course code
		$myCourse = new CoursesController;
		$course = $myCourse->Course->findByCode($vars['code']);
		$duration = $course['Course']['duration'];

		// add duration to start date
		// change $vars['end'] to date format then add duration to get actual end date
		$start_date = $this->split_date2($vars['start']);
		$end_date = $this->get_end_date_weekend_holiday($vars['start'], $vars['end'], $duration);
		// $end_date = $this->get_end_date($vars['start'], $vars['end'], $duration);

		// $arrayToSave['Event']['course_id'] = $course['Course']['id'];
		// $arrayToSave['Event']['start_date'] = $start_date;
		// $arrayToSave['Event']['end_date'] = $end_date;

        $this->Event->saveField('course_id', $course['Course']['id']);
		$this->Event->saveField('start_date', $start_date);
		$this->Event->saveField('end_date', $end_date);

	}

	// return end_date[]
	function get_end_date($start_date, $end_date, $duration) {
		$this->log('start -- get_end_date' );
		// define tentative end_date (including weekends - saturday & sunday)
		$start_date = date("Y-m-d H:i:s",strtotime($start_date));
		$end_date = date("Y-m-d H:i:s",strtotime($end_date));
		$end_date = $this->split_date2($end_date);

		if ($duration > 1){
			$duration--;
			// add weekdays to start date
			$mod = strtotime($start_date."+".$duration."weekdays");
			$mod = date("Y-m-d H:i:s", $mod);

			$tmp_date = $this->split_date2($mod);
			
			$end_date['year'] = $tmp_date['year'];
			$end_date['month'] = $tmp_date['month'];
			$end_date['day'] = $tmp_date['day'];

			return $end_date;

		} else {
			$tmp_date = $this->split_date2($start_date);

			$end_date['year'] = $tmp_date['year'];
			$end_date['month'] = $tmp_date['month'];
			$end_date['day'] = $tmp_date['day'];

			return $end_date;
		}
	}

	function get_end_date_weekend_holiday($start_date, $end_date, $duration) {

		$this->log('start -- get_end_date_weekend_holiday' );
		$this->log('start_date:'.$start_date );
		$this->log('end_date:'.$end_date );
		$this->log('duration:'.$duration );
		
		// part 1 - get end date from normal calendar and weekends (use the end date to find number of holiday within the time frame.)
		$end_date = date("Y-m-d H:i:s",strtotime($end_date));
		$tmp_date = $this->get_end_date($start_date, $end_date, $duration);
		$end_date_str = $tmp_date['year'].'-'.$tmp_date['month'].'-'.$tmp_date['day'];
		// find holiday
		$this->log('start_date:'.$start_date );
		$this->log('end_date:'.$end_date_str );
		$holiday = $this->count_holiday($start_date, $end_date_str);
		$this->log('holiday:'.$holiday );

		$total_duration = 0;
		// total duration is accumulative of duration and holidays
		$total_duration = $duration + $holiday - 1;
		$this->log('total_duration:'.$total_duration );


		if ($total_duration > 1) {
			// add weekday and holidays to start_date
			$start_date = date("Y-m-d H:i:s",strtotime($start_date));
			$mod = strtotime($start_date."+".$total_duration."weekdays");
			$mod = date("Y-m-d H:i:s", $mod);
			$this->log('mod:'.$mod);
			$tmp_date = $this->split_date2($mod);
			$end_date = $this->split_date2($end_date);

			$end_date['year'] = $tmp_date['year'];
			$end_date['month'] = $tmp_date['month'];
			$end_date['day'] = $tmp_date['day'];

			return $end_date;
			
		} else {
			$end_date = $this->split_date2($start_date);

			$this->log('start_date:'.$start_date );
			$this->log('end_date:'.$tmp_date['year'].'-'.$tmp_date['month'].'-'.$tmp_date['day']);
			$this->log('end -- get_end_date' );
			
			return $end_date;
		}

		$this->log('end -- get_end_date_weekend_holiday' );
	}

	function count_holiday($start_date = null, $end_date = null) {

		$this->log('-- count_holiday --');
		// $this->autoRender = false;

		$holiday = new HolidaysController;
		$myHoliday = $holiday->find_holiday($start_date, $end_date);

		// pr($myHoliday);

		return count($myHoliday);
	}

	public function print_date($start_date, $duration) {
		// define tentative end_date (including weekends - saturday & sunday)
		$this->log('-- print_date --');
		if ($duration > 1){
			$duration--;
			// add weekdays to start date
			$start_date = date("Y-m-d",strtotime($start_date));
			$mod = strtotime($start_date."+".$duration."weekdays");
			$mod = date("Y-m-d H:i:s", $mod);

			$tmp_date = $this->split_date2($mod);
			
			// new date 
			$end_date['year'] = $tmp_date['year'];
			$end_date['month'] = $tmp_date['month'];
			$end_date['day'] = $tmp_date['day'];

		} else {
			$start_date = $this->split_date2($start_date);
			$end_date['year'] = $start_date['day'];
			$end_date['month'] = $start_date['month'];
			$end_date['day'] = $start_date['year'];
		}

		return $end_date['day'].'-'.$end_date['month'].'-'.$end_date['year'];
	}

	public function getWorkingDays($startDate, $endDate)
	{
	    $begin = strtotime($startDate);
	    $end   = strtotime($endDate);
	    if ($begin > $end) {
	        echo "startdate is in the future! <br />";

	        return 0;
	    } else {
	        $no_days  = 0;
	        $weekends = 0;
	        while ($begin <= $end) {
	            $no_days++; // no of days in the given interval
	            $what_day = date("N", $begin);
	            if ($what_day > 5) { // 6 and 7 are weekend days
	                $weekends++;
	            };
	            $begin += 86400; // +1 day
	        };
	        $working_days = $no_days - $weekends;

	        return $working_days;
	    }
	}

	public function analysis () {

		// from the given dates, get list of the individual date
		if ($this->request->is('post')) {
			$start_date = strtotime(CakeTime::format('Y-m-d', $this->request->data['Event']['start_date']));
			$end_date = strtotime(CakeTime::format('Y-m-d', $this->request->data['Event']['end_date']));
			$baseDate = CakeTime::format('Y-m-d', $this->request->data['Event']['start_date']);

			if ($end_date > $start_date) {
				$dateCount = ($end_date - $start_date)/(60*60*24);
				// echo "start_date: ". $baseDate;
				// iterate using the dates
				$days = array();
				for ($day = 0; $day <= $dateCount; $day++) {
					$asToDate = date('Y-m-d', strtotime($baDate." + ".$day." days"));
					// echo '<br/>'.$asToDate;
					// get weekdays only 
					$event = array();
					if (date('N', strtotime($asToDate)) < 6) {
						$event = $this->_get_totalparticipants($asToDate);
					}
					$daily_reports[$asToDate] = $event;
				}
			}
		}

		$this->set(compact('daily_reports'));
	}

	function _get_totalparticipants ($date = null) {
		// Get all active event attendance by day
		// $this->Event->recursive = 0;
		$options = array(
			'joins' => array(
							array('table' => 'event_attendances',
							    'alias' => 'EventAttendance',
							    'type' => 'left',
							    'conditions' => array(
							        'EventAttendance.event_id = Event.id',
							    ),
							  ),
							// array('table' => 'venues',
							//     'alias' => 'Venue',
							//     'type' => 'left',
							//     'conditions' => array(
							//         'Venue.id = Event.venue_id',
							//     ),
							//   )
							),
			'conditions' => array(
				'Event.active' => 1, 
				'date_format(Event.start_date, "%Y-%m-%d") <= ' => $date,
				'date_format(Event.end_date, "%Y-%m-%d") >= ' => $date,
				'EventAttendance.active' => true,
				),
			'group' => array('Venue.location', 'Event.id'),
			);
		$events = $this->Event->find('all', $options);
			
		return $events;
	}

	public function create_report() {

	}

	public function view_report() {

	}

	public function closure($id = null) {

		// perform event, course, trainer evaluation

		// produce training completion notice

	}

	public function performance() {
		// from the given dates, get list of the individual date
		if ($this->request->is('post')) {
			$start_date = strtotime(CakeTime::format('Y-m-d', $this->request->data['Event']['start_date']));
			$end_date = strtotime(CakeTime::format('Y-m-d', $this->request->data['Event']['end_date']));
			$baseDate = CakeTime::format('Y-m-d', $this->request->data['Event']['start_date']);

			if ($end_date > $start_date) {
				$dateCount = ($end_date - $start_date)/(60*60*24);
				// echo "start_date: ". $baseDate;
				// iterate using the dates
				$days = array();
				for ($day = 0; $day <= $dateCount; $day++) {
					$asToDate = date('Y-m-d', strtotime($baseDate." + ".$day." days"));
					// echo '<br/>'.$asToDate;
					$event = $this->_get_totalparticipants($asToDate);
					$daily_reports[$asToDate] = $event;
				}
			}
		}

		$this->set(compact('performance'));
	}


	public function copy_participants($new_event_id = null, $service_id = null, $original_event_id = null) {

		if ($this->request->is('post')) {
			$myAttendance = new EventAttendancesController;

			if ($myAttendance->clone_event_participants($new_event_id, $original_event_id))
			{
				$this->Session->setFlash(__('The participants has been copied'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller' => 'event_attendances', 'action' => 'nominate', $new_event_id));
			}  else {
				$this->Session->setFlash(__('The process has failed.'), 'default', array('class' => 'alert alert-warning'));
			}

		} else {
			$this->Event->recursive = 0;
			$options['conditions'] = array('Course.service_id' => $service_id);
			$options['order'] = array('Event.id DESC');

			$events = $this->Event->find('all', $options);
			$this->set('events', $events);
			$this->set('event_id', $new_event_id);
			$this->set('service_id', $service_id);
		}
	}

	public function get_participants($new_event_id = null, $service_id = null, $original_event_id = null) {
		if (isset($new_event_id) && isset($original_event_id)) {
			$myAttendance = new EventAttendancesController;

			if ($myAttendance->clone_event_participants($new_event_id, $original_event_id))
			{
				$this->Session->setFlash(__('The participants has been copied'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller' => 'event_attendances', 'action' => 'nominate', $new_event_id));
			}  else {
				$this->Session->setFlash(__('The process has failed.'), 'default', array('class' => 'alert alert-warning'));
			}

		}
		$this->set('event', $this->Event->find('first', array('Event.id' => $new_event_id)));
		$this->set('event_id', $new_event_id);
		$this->set(compact('service_id'));
	}

	public function feed_participants($service_id = null) {
		// $this->layout = 'public';
		$vars = $this->params['url'];

    	// if (isset($service_id)) {
    	if (isset($vars['service_id'])) {
			$options = array('conditions' => 
				array(
					// 'Course.service_id' => $service_id,
					// 'Course.service_id' => $vars['service_id'],
					'Event.is_tcn' => false,
					// 'EventAttendance.id is NOT NULL',
				)
			);
		} else {
			$options = array('conditions' => 
				array(
					// 'EventAttendance.id is NOT NULL',
					'Event.is_tcn' => false,
				)
			);
		}

		// $this->Event->recursive = 0;

		// $options['fields'] = array('Event.id', 'Course.name', 'Event.details', 'Event.start_date', 'Event.end_date');
		$options['order'] = array('Event.id DESC');

		$events = $this->Event->find('all', $options);

		$results = array();
		// $attendance = new EventAttendancesController;
		// $attendance->EventAttendance->recursive = 0;
		foreach ($events as $event) {
			// $myRecords = $attendance->EventAttendance->find('all', array('EventAttendance.event_id' => $event['Event']['id']));

			if(!empty($event['EventAttendance'])) {
			// 	echo count($myRecords);
			// }
				$result['Event']['id'] = $event['Event']['id'];
				// $result['Event']['details'] = $event['Course']['name'].' '.$event['Event']['details'];
				$result['Event']['details'] = '['.$event['Course']['code'].'] '.$event['Course']['name'].' '.$event['Event']['details'].' ('.count($event['EventAttendance']).')';
				$result['Event']['start_date'] = CakeTime::format('d-M-Y', $event['Event']['start_date']);
				$result['Event']['end_date'] = CakeTime::format('d-M-Y', $event['Event']['end_date']);
				array_push($results, $result);
			}
		}

		// $this->set('events', $events);
		$this->set('events', $results);
	}

	public function hrdf_documentation($event_id = null) {

		$options['conditions'] = array('Event.id' => $event_id);
		$events = $this->Event->find('first', $options);
		$this->set('event', $events);
		$this->set('event_id', $event_id);
	}

	public function find_attendances($status = null) {
		$this->Event->recursive = 1;

		$myOpt['joins'] = array(
				array('table' => 'event_attendances',
				    'alias' => 'EventAttendance',
				    'type' => 'LEFT',
				    'conditions' => array(
				        'EventAttendance.event_id = Event.id',
				    ),
				)
			);
		$myOpt['conditions'] = array(
			'EventAttendance.is_completed' => $status, 
			'YEAR(EventAttendance.created) = YEAR(NOW())', 
			'Event.active' => true,
			'Event.is_tcn' => true,
			);

	    return $this->Event->find('count', $myOpt);
	}

	public function find_attendance_events($status = null) {
		$this->Event->recursive = 1;

		$myOpt['joins'] = array(
				array('table' => 'event_attendances',
				    'alias' => 'EventAttendance',
				    'type' => 'LEFT',
				    'conditions' => array(
				        'EventAttendance.event_id = Event.id',
				    ),
				)
			);
		$myOpt['conditions'] = array(
			'EventAttendance.is_completed' => $status, 
			'YEAR(EventAttendance.created) = YEAR(NOW())', 
			'Event.active' => true,
			'Event.is_tcn' => true,
			);

		$myOpt['group'] = array('EventAttendance.event_id');
		
	    return $this->Event->find('count', $myOpt);
	}

	public function test() {
		
	}

	public function pte($id = null) {

		$options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
		$event = $this->Event->find('first', $options);
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.active' => true));
		$attendees = $this->Event->EventAttendance->find('all', $options);
		
		$options = array('conditions' => array('EventAttendance.event_id' => $id, 'EventAttendance.active' => false));
		$absentees = $this->Event->EventAttendance->find('all', $options);
		
		$this->set(compact('event', 'attendees', 'absentees'));
	}

	public function env_test() {

		$this->layout = 'public';
		
	}

	public function update_tcn($event_id = null) {
		$this->autoRender = false;

		$this->Event->id = $event_id;
		$this->Event->save('is_tcn', true);
	
	}
}
