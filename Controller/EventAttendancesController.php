<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('ServicesController', 'RailCompetency.Controller');
App::uses('EventsController', 'RailCompetency.Controller');
App::uses('CoursesController', 'RailCompetency.Controller');
App::uses('VenuesController', 'RailCompetency.Controller');
App::uses('MailingListsController', 'RailCompetency.Controller');
App::uses('MailingListDetailsController', 'RailCompetency.Controller');
/**
 * EventAttendances Controller
 *
 * @property EventAttendance $EventAttendance
 * @property PaginatorComponent $Paginator
 */
class EventAttendancesController extends RailCompetencyAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	public $helpers = array('Csv'); 

/**
 * index method
 *
 * @return void
 */
	public function index() {

		// $this->Prg->commonProcess();
		$this->Paginator->settings['joins'] = array(
				array('table' => 'courses',
					'alias' => 'Course',
					'type' => 'LEFT',
					'conditions' => array(
					    'Course.id = Event.course_id',
					)
				)
			);
		$this->Paginator->settings['contain'] = array(
                'Staff',
                'Event',
                );
		$conditions2 = array();
		$start = '';
		$end = '';
		if (!empty($this->request->data['Event']['start_date']) && !empty($this->request->data['Event']['end_date']) ) {
				$start = 'Event.start_date >=  STR_TO_DATE("'.$this->request->data['Event']['start_date'].'", "%d-%m-%Y")';
				$end = 'Event.start_date <=  STR_TO_DATE("'.$this->request->data['Event']['end_date'].'", "%d-%m-%Y")';
			}

		$conditions = array('and' =>array('Staff.id is not null', 'Event.id is not null', $start_date, $end_date));
		// $conditions2 = $this->EventAttendance->parseCriteria($this->Prg->parsedParams());

		if (!empty($this->request->data['EventAttendance']['queryString'])) {
			$conditions2 = array('or' => array(
				'Event.details like "%' . $this->request->data['EventAttendance']['queryString'] . '%"', 
				'Event.start_date like "%' . $this->request->data['EventAttendance']['start_date'] . '%"', 
				'Event.end_date like "%' . $this->request->data['EventAttendance']['end_date'] . '%"', 
				'Course.name like "%' . $this->request->data['EventAttendance']['queryString'] . '%"', 
				'Course.name like "' . $this->request->data['EventAttendance']['queryString'] . '%"', 
				'Staff.name like "%' . $this->request->data['EventAttendance']['queryString'] . '%"', 
				'Staff.name like "' . $this->request->data['EventAttendance']['queryString'] . '%"', 
				)
			);
		}
		$this->Paginator->settings['conditions'] = array_merge($conditions, $conditions2);

		$eventAttendances = $this->Paginator->paginate();

		// print_r($eventAttendances);
		$myService = new ServicesController;
		$services = $myService->Service->find('list');
		$this->set(compact('eventAttendances', 'services'));

		// deprecated - suhaimi
		// $this->EventAttendance->recursive = 0;
		// $this->set('eventAttendances', $this->Paginator->paginate());
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
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
		$this->set('eventAttendance', $this->EventAttendance->find('first', $options));
	}

	public function object($id = null) {
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
		return $this->EventAttendance->find('first', $options);
	}

	public function get_event_attendance($event_id = null) {
		$options = array('conditions' => array('EventAttendance.event_id' => $event_id, 'EventAttendance.active' => true));
		return $this->EventAttendance->find('count', $options);
	}

	public function get_attendances($event_id = null) {
		$options = array('conditions' => array('EventAttendance.event_id' => $event_id, 'EventAttendance.active' => true));
		return $this->EventAttendance->find('all', $options);
	}

/**
 * sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function sneak($id = null) {
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
		$this->set('eventAttendance', $this->EventAttendance->find('first', $options));
	}

/**
 * calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function calendar($id = null) {
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
		$this->set('eventAttendance', $this->EventAttendance->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventAttendance']['start_date'])) {
				$this->request->data['EventAttendance']['start_date'] = $this->split_date($this->request->data['EventAttendance']['start_date']);
				$this->request->data['EventAttendance']['end_date'] = $this->split_date($this->request->data['EventAttendance']['end_date']);
			}
			

			$this->EventAttendance->create();
			if ($this->EventAttendance->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		
		$events = $this->EventAttendance->Event->find('list');
		$staffs = $this->EventAttendance->Staff->find('list');
		$this->set(compact('events', 'staffs'));
	}

	public function enroll($event_id) {
		if ($this->request->is('post')) {
			
			$this->log(pr($this->request->data));

			$this->EventAttendance->create();
			if ($this->EventAttendance->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance has been saved.'), 'default', array('class' => 'alert alert-success'));

				// return $this->redirect(array('action' => 'index'));
				return $this->redirect( $this->referer() );

			} else {
				$this->Session->setFlash(__('The event attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$myEvent = new EventsController;
		$options = array(
			'joins' => array(
							array('table' => 'courses',
							    'alias' => 'Course',
							    'type' => 'LEFT',
							    'conditions' => array(
							        'Course.id = Event.course_id',
							    )
							  )
							),
			'conditions' => array('Event.id' => $event_id),
			'fields' => array('Event.id', 'Course.code', 'Course.name'),
			'order' => 'Course.code ASC'
			);
		$events = $myEvent->Event->find('all', $options);
		$events = Set::combine($events, '{n}.Event.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
		// $eventTypes = $this->Event->EventType->find('list');
		// $events = $this->EventAttendance->Event->find('first', array('conditions' => array('Event.id' => $event_id)));
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Staff']['queryString']))

			// $options = array(
			// 	'fields' => array('id', 'code'),
			// 	'conditions' => array('active' => true, 'code like "%'.trim($this->request->data['Event']['queryString']).'%"'),
			// 	'order' => 'code ASC'
			// 	);
			$options = array(
				'fields' => array('Staff.id', 'Staff.staff_no', 'Staff.name'),
				'conditions' => array('active' => true, 'Staff.staff_no like "%'.trim($this->request->data['Event']['queryString']).'%"'),
				'order' => 'Staff.staff_no ASC'
				);
		} else {
			$options = array(
				'fields' => array('Staff.id', 'Staff.staff_no', 'Staff.name'),
				'order' => 'Staff.staff_no ASC'
				);
		}
		$staffs = $this->EventAttendance->Staff->find('all', $options);
		$staffs = Set::combine($staffs, '{n}.Staff.id', array('%s -  %s', '{n}.Staff.staff_no', '{n}.Staff.name'));
		
		// // $staffs = $this->EventAttendance->Staff->find('list');
		$this->set(compact('events', 'staffs', 'event_id'));
		// $this->set(compact('events', 'event_id'));
	}

	public function email_training_notice($event_id = null) {

		if ($this->request->is('post')) {
			$myEvent = new EventsController;
			$myCourse = new CoursesController;
			$myVenue = new VenuesController;

			// event
			$options = array(
				'conditions' => array(
					'Event.id' => $this->request->data['EventAttendance']['event_id'],
					)
				);
			$event = $myEvent->Event->find('first', $options);

			// venue
			$options = array(
				'conditions' => array(
					'Venue.id' => $event['Event']['venue_id'],
					)
				);
			$venue = $myVenue->Venue->find('first', $options);

			// course
			$options = array(
				'conditions' => array(
					'Course.id' => $event['Event']['course_id'],
					)
				);
			$course = $myCourse->Course->find('first', $options);

			// attendees
			$options['conditions'] = array('EventAttendance.event_id' => $this->request->data['EventAttendance']['event_id']);
			$attendees = $this->EventAttendance->find('all', $options);

			$email_title = 'Nomination for '.$course['Course']['code'].' '.$course['Course']['name'];
			$content_title = $course['Course']['code'].' - '.$course['Course']['name'];
	        $template = 'training_notice';
	        $content = array(
	        	'title' => $content_title,
	        	'venue' => $venue['Venue']['name'].', '.$venue['Venue']['location'],
	        	'start_date' => CakeTime::format($event['Event']['start_date'], '%d %B'),
	        	'start_time' => CakeTime::format($event['Event']['start_date'], '%H:%M %p'),
	        	'end_date' => CakeTime::format($event['Event']['end_date'], '%d %B %Y'),
	        	'end_time' => CakeTime::format($event['Event']['end_date'], '%H:%M %p'),
	        	'notes' => $this->request->data['EventAttendance']['notes'],
	        	'attendees' => $attendees,
	        	);
	        $myMailingLIst = new MailingListDetailsController;
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
	        		'conditions' => array('MailingList.id' => $this->request->data['EventAttendance']['mailinglist_id']),// tcn mailing list
	        	);
	        $emails = $myMailingLIst->MailingListDetail->find('all', $options);

	        // break the staff for email
	        foreach ($emails as $key => $value) {
	        	$to_emails[] = $value['Staff']['email'];
	        }

	        if ($this->sendMailWithAttachment($template, $to_emails, $email_title, '', $content)) {
	        	// update event is_nominated
	        	$data = array('id' => $event_id, 'is_nominated' => true);
				// This will update Recipe with id 10
				$myEvent->Event->save($data);

				$this->Session->setFlash(__('The notice has been emailed to the mailing list'), 'default', array('class' => 'alert alert-success'));
	        	$this->redirect(array('plugin' => 'rail_competency', 'controller' => 'event_attendances', 'action' => 'nominate', $this->request->data['EventAttendance']['event_id']));

	        } else {
				$this->Session->setFlash(__('The notice has not been emailed.'), 'default', array('class' => 'alert alert-danger'));
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

	public function clone_event_participants($new_event_id = null, $original_event_id = null) {

		$status = false;
		// find the original event Participants
		$options['conditions'] = array('EventAttendance.event_id' => $original_event_id);
		$original_attendances = $this->EventAttendance->find('all', $options);

		if (!empty($original_attendances)) {
			// save to the new event
			foreach($original_attendances as $original_attendance) {
				// replace original_event_id with new_event_id
				$original_attendance['EventAttendance']['event_id'] = $new_event_id;
				unset($original_attendance['EventAttendance']['id']);
				unset($original_attendance['EventAttendance']['is_completed']);
				unset($original_attendance['EventAttendance']['has_submitted']);
				unset($original_attendance['EventAttendance']['created']);
				unset($original_attendance['EventAttendance']['modified']);
				unset($original_attendance['EventAttendance']['notes']);

				$this->EventAttendance->create();
				if ($this->EventAttendance->save($original_attendance)) {
					$status = true;
				}
			}
		}
		return $status;
	}
	
	public function count_attendance($event_id) {
		return $this->EventAttendance->find('count', array('conditions' => array('EventAttendance.event_id' => $event_id)));
	}
	
	public function nominate($event_id) {
		$save = false;
		$staffs = array();
		if ($this->request->is('post')) {
			if (!empty($this->request->data['EventAttendance'])) {
				foreach($this->request->data['EventAttendance'] as $elementKey => $element) {
				    foreach($element as $valueKey => $value) {
				        if($valueKey == 'is_enrolled' && $value == 0){
				            //delete this particular object from the $array
				            unset($this->request->data['EventAttendance'][$elementKey]);
				        } else if($valueKey == 'is_enrolled' && $value == 1){
					        $save = true;
				        } 
				    }
				}

				if ($save) {
					$this->EventAttendance->create();
					if ($this->EventAttendance->saveAll($this->request->data['EventAttendance'])) {
						$this->Session->setFlash(__('The event nomination has been saved.'), 'default', array('class' => 'alert alert-success'));
						return $this->redirect(array('controller' => 'event_attendances', 'action' => 'nominate', $event_id,'tab:Participants'));
					} else {
						$this->Session->setFlash(__('The event nomination could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
					}
				} else {
					$this->Session->setFlash(__('You have not select any participant. Please find and select the right participant again. Thank you.'), 'default', array('class' => 'alert alert-warning'));
				}
			}
		}
		$myEvent = new EventsController;
		$options = array(
			'joins' => array(
							array('table' => 'courses',
							    'alias' => 'Course',
							    'type' => 'LEFT',
							    'conditions' => array(
							        'Course.id = Event.course_id',
							    )
							  ),
							array('table' => 'venues',
							    'alias' => 'Venue',
							    'type' => 'LEFT',
							    'conditions' => array(
							        'Venue.id = Event.venue_id',
							    )
							  )
							),
			'conditions' => array('Event.id' => $event_id),
			'fields' => array('Event.id', 'Course.code', 'Course.name', 'Course.details', 'Course.pax', 'Venue.name', 'Venue.location', 'Event.start_date', 'Event.end_date', 'Event.details', 'Event.active', 'Event.is_nominated', 'Course.service_id'),
			'order' => 'Course.code ASC'
			);
		$eventInfo = $myEvent->Event->find('all', $options);
		$events = Set::combine($eventInfo, '{n}.Event.id', array('%s -  %s', '{n}.Course.code', '{n}.Course.name'));
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Staff'])) {
			$options = array(
				'fields' => array('Distinct(Staff.staff_no)', 'Staff.id', 'Staff.name', 'Staff.parent_code', 'Staff.org_code'),
				'conditions' => array(
						'active' => true, 
						'OR' => array(
							'Staff.parent_code like "%'.trim($this->request->data['Staff']['queryString']).'%"',
							'Staff.org_code like "%'.trim($this->request->data['Staff']['queryString']).'%"',
							'Staff.staff_no like "%'.trim($this->request->data['Staff']['queryString']).'%"',
							'Staff.name like "%'.trim($this->request->data['Staff']['queryString']).'%"'
						)
					),
				'order' => array('Staff.parent_code', 'Staff.org_code', 'Staff.staff_no')
				);
				$staffs = $this->EventAttendance->Staff->find('all', $options);
				$this->set(compact('staffs'));
			}
		}
		$this->Paginator->settings['conditions'] = array('Event.id' => $event_id);
		$this->set('attendees', $this->paginate());
		$this->set(compact('events', 'staffs', 'event_id', 'eventInfo'));
	}

	
	public function manage($event_id = null) {
		$this->EventAttendance->recursive = 0;

		$participants = $this->EventAttendance->find('all');
		$this->set(compact('participants'));
	}
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $event_id = null) {
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventAttendance']['start_date'])) {
				$this->request->data['EventAttendance']['start_date'] = $this->split_date($this->request->data['EventAttendance']['start_date']);
				$this->request->data['EventAttendance']['end_date'] = $this->split_date($this->request->data['EventAttendance']['end_date']);
			}
			
			if ($this->EventAttendance->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller' => 'events', 'action' => 'attendance', $this->request->data['EventAttendance']['event_id'], 'tab:Participants'));
			} else {
				$this->Session->setFlash(__('The event attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
			$this->request->data = $this->EventAttendance->find('first', $options);
		}
		$events = $this->EventAttendance->Event->find('list');
		$staffs = $this->EventAttendance->Staff->find('list');
		$this->set(compact('events', 'staffs', 'event_id'));
	}

	public function course_update($event_id = null) {

		if ($this->request->is('post')) {
			$this->log($this->request->data['EventAttendance']);
			$this->EventAttendance->create();
			if ($this->EventAttendance->saveAll($this->request->data['EventAttendance'])) {
				$this->Session->setFlash(__('The attendance has been updated.'), 'default', array('class' => 'alert alert-success'));
				// return $this->redirect(array('controller' => 'events', 'action' => 'index'));
				$this->log('saved');
			} else {
				$this->log('failed');
				$this->Session->setFlash(__('The attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
			return $this->redirect( array('controller' => 'events', 'action' => 'attendance',$event_id,'tab:Participants'));
		} 
			$event = new EventsController;

			$options['conditions'] = array('Event.id' => $event_id);
			$myEvent = $event->Event->find('first', $options);

			$options['conditions'] = array('EventAttendance.event_id' => $myEvent['Event']['id']);
			$myAttendances = $this->EventAttendance->find('all', $options);

			$this->set(compact('myEvent', 'myAttendances'));
	}

	public function complete_course($attendance_id = null, $event_id = null) {
		
		// $this->log('EventAttendance.complete_course');
		// $this->log('EventAttendance.complete_course: '.$attendance_id);
		// $this->log('EventAttendance.complete_course: '.$event_id);
		
		$data = array('id' => $attendance_id, 'is_completed' => true);
		if ($this->EventAttendance->save($data)) {
			// $myEvent = new EventsController;
			// $myEvent->is_tcn($event_id);

			$this->Session->setFlash(__('The event attendance has been saved.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('controller' => 'events', 'action' => 'attendance', $event_id, 'tab:Participants'));
		} else {
			$this->Session->setFlash(__('The event attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function incomplete_course($attendance_id = null, $event_id = null) {
		
		$myEvent = new EventsController;
		$data = array('id' => $attendance_id, 'is_completed' => false);
		if ($this->EventAttendance->save($data)) {
			$myEvent->is_tcn($event_id);

			// $this->Session->setFlash(__('The event attendance has been saved.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('controller' => 'events', 'action' => 'attendance', $event_id, 'tab:Participants'));
		} else {
			$this->Session->setFlash(__('The event attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	public function has_submitted($attendance_id = null, $event_id = null) {
		
		
		$data = array('id' => $attendance_id, 'has_submitted' => true);
		if ($this->EventAttendance->save($data)) {
			$this->Session->setFlash(__('The event attendance has been saved.'), 'default', array('class' => 'alert alert-success'));
			return $this->redirect(array('controller' => 'events', 'action' => 'attendance', $event_id, 'tab:Participants'));
		} else {
			$this->Session->setFlash(__('The event attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
		$this->EventAttendance->id = $id;
		// if (!$this->EventAttendance->exists()) {
		// 	throw new NotFoundException(__('Invalid event attendance'));
		// }
		// $this->request->allowMethod('post', 'delete');
		if ($this->EventAttendance->delete()) {
			$this->Session->setFlash(__('The event attendance has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event attendance could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect($this->referer());
	}

	public function doAction($id = null) {
		// if (!$this->EventAttendance->exists()) {
		// 	throw new NotFoundException(__('Invalid event attendance'));
		// }
		// $this->request->allowMethod('post', 'delete');
		if ($this->request->is('post')) {
			// echo pr($this->request->data['EventAttendance']);
			// filter for delete status only
			$doAction = $this->request->data['EventAttendance']['bulk'];
			unset($this->request->data['EventAttendance']['bulk']);

			if ($doAction == '1') { // delete
				foreach($this->request->data['EventAttendance'] as $elementKey => $element) {
				    foreach($element as $valueKey => $value) {
				        if($valueKey == 'myOption' && $value == 1){
				            $this->EventAttendance->delete($element['id']);
				        } 
				    }
				}
			} else if ($doAction == '2') { // confirm participation
				foreach($this->request->data['EventAttendance'] as $elementKey => $element) {
				    foreach($element as $valueKey => $value) {
				        if($valueKey == 'myOption' && $value == 1){
				        	$this->EventAttendance->saveField ('id', $element['id']);
				        	$this->EventAttendance->saveField ('active', true);
				        } 
				    }
				} 
			} else if ($doAction == '3') { // unconfirm participation
				foreach($this->request->data['EventAttendance'] as $elementKey => $element) {
				    foreach($element as $valueKey => $value) {
				        if($valueKey == 'myOption' && $value == 1){
				        	$this->EventAttendance->saveField ('id', $element['id']);
				        	$this->EventAttendance->saveField ('active', false);
				        } 
				    }
				} 
			}

			// echo pr($this->request->data['EventAttendance']);


			// if ($this->EventAttendance->deleteAll($this->request->data['EventAttendance'])) {
			// 	$this->Session->setFlash(__('The event attendance has been deleted.'), 'default', array('class' => 'alert alert-success'));
			// } else {
			// 	$this->Session->setFlash(__('The event attendance could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			// }
			return $this->redirect(array('controller' => 'event_attendances', 'action' => 'nominate', $this->request->data['Event']['id'],'tab:Participants'));
		}
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
		$this->Paginator->settings['conditions'] = $this->EventAttendance->parseCriteria($this->Prg->parsedParams());
		$this->set('eventAttendances', $this->Paginator->paginate());

		// deprecated - suhaimi
		// $this->EventAttendance->recursive = 0;
		// $this->set('eventAttendances', $this->Paginator->paginate());
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
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
		$this->set('eventAttendance', $this->EventAttendance->find('first', $options));
	}

	public function admin_object($id = null) {
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
		return $this->EventAttendance->find('first', $options);
	}

/**
 * admin_sneak method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_sneak($id = null) {
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
		$this->set('eventAttendance', $this->EventAttendance->find('first', $options));
	}

/**
 * admin_calendar method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_calendar($id = null) {
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
		$this->set('eventAttendance', $this->EventAttendance->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			if (isset($this->request->data['EventAttendance']['start_date'])) {
				$this->request->data['EventAttendance']['start_date'] = $this->admin_split_date($this->request->data['EventAttendance']['start_date']);
				$this->request->data['EventAttendance']['end_date'] = $this->admin_split_date($this->request->data['EventAttendance']['end_date']);
			}
			

			$this->EventAttendance->create();
			if ($this->EventAttendance->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance has been saved.'), 'default', array('class' => 'alert alert-success'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$events = $this->EventAttendance->Event->find('list');
		$staffs = $this->EventAttendance->Staff->find('list');
		$this->set(compact('events', 'staffs'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->EventAttendance->exists($id)) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if (isset($this->request->data['EventAttendance']['start_date'])) {
				$this->request->data['EventAttendance']['start_date'] = $this->admin_split_date($this->request->data['EventAttendance']['start_date']);
				$this->request->data['EventAttendance']['end_date'] = $this->admin_split_date($this->request->data['EventAttendance']['end_date']);
			}
			
			if ($this->EventAttendance->save($this->request->data)) {
				$this->Session->setFlash(__('The event attendance has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event attendance could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('EventAttendance.' . $this->EventAttendance->primaryKey => $id));
			$this->request->data = $this->EventAttendance->find('first', $options);
		}
		$events = $this->EventAttendance->Event->find('list');
		$staffs = $this->EventAttendance->Staff->find('list');
		$this->set(compact('events', 'staffs'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->EventAttendance->id = $id;
		if (!$this->EventAttendance->exists()) {
			throw new NotFoundException(__('Invalid event attendance'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->EventAttendance->delete()) {
			$this->Session->setFlash(__('The event attendance has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The event attendance could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
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
