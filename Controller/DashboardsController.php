<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
App::uses('EventsController', 'RailCompetency.Controller');
App::uses('EventAttendancesController', 'RailCompetency.Controller');
App::uses('StaffsController', 'RailCompetency.Controller');
App::uses('StaffTrainingProfilesController', 'RailCompetency.Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
class DashboardsController extends RailCompetencyAppController {

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
		$this->layout = 'dashboard';

		// Route to landing page if not logged in
	    if (empty($this->Session->read('Auth.User'))) {
	      $this->redirect($this->webroot.'../../rail');
	    }


		// total event published vs total event completed with tcn
		$myEvent = new EventsController;

		$totalEventOptions['conditions'] = array(
	    	'YEAR(Event.created) = YEAR(NOW())',
			'Event.id is not NULL',
			);
		$myTotalEvent = $myEvent->Event->find('count', $totalEventOptions);
		
		$publishedOptions['conditions'] = array(
	    	'YEAR(Event.created) = YEAR(NOW())',
			'Event.active = true',
			'Event.id is not NULL',
			);
		$myPublishedEvent = $myEvent->Event->find('count', $publishedOptions);
		
		$memoOptions['conditions'] = array(
			'Event.active = true', 
			'Event.is_memo = true',
	    	'YEAR(Event.created) = YEAR(NOW())',
			);
		$myMemoEvent = $myEvent->Event->find('count', $memoOptions);
		
		$tcnOptions['joins'] = array(
				array('table' => 'event_attendances',
				    'alias' => 'EventAttendance',
				    'type' => 'LEFT',
				    'conditions' => array(
				        'EventAttendance.event_id = Event.id',
				    ),
				)
			);
		$tcnOptions['conditions'] = array(
			'Event.active = true', 
	    	'YEAR(Event.created) = YEAR(NOW())',
			'EventAttendance.is_completed' => true,
			);
		$tcnOptions['group'] = array('Event.id');
		$myTCNEvent = $myEvent->Event->find('count', $tcnOptions);
		
		$this->set(compact('myTotalEvent', 'myMemoEvent', 'myTCNEvent', 'myPublishedEvent'));

	    // get number of attendancees
	    $eventAttendance = new EventAttendancesController;

	    $attendanceOptions['joins'] = array(
				array('table' => 'events',
				    'alias' => 'Event',
				    'type' => 'LEFT',
				    'conditions' => array(
				        'EventAttendance.event_id = Event.id',
				    ),
				)
			);
	    $attendanceOptions['conditions'] = array(
	    	'YEAR(Event.created) = YEAR(NOW())',
			'Event.active' => true,
			'Event.id is not NULL',
			'EventAttendance.event_id is not NULL',
	    	'EventAttendance.active' => true, 
	    	);

	    $attendanceOptions['group'] = array('EventAttendance.id');
	    $planned_participants = $eventAttendance->EventAttendance->find('count', $attendanceOptions);

	    $attendanceOptions['group'] = array('EventAttendance.event_id');
	    $event_planned = $eventAttendance->EventAttendance->find('count', $attendanceOptions);

	    $attendanceOptions['conditions'] = array(
	    	'YEAR(Event.created) = YEAR(NOW())',
			'Event.active' => true,
			'Event.is_memo' => true,
			'Event.id is not NULL',
	    	'EventAttendance.active' => true, 
	    	// 'EventAttendance.is_completed' => true, 
	    	);
	    $attendanceOptions['group'] = array('EventAttendance.id');
	    $completed_participants = $eventAttendance->EventAttendance->find('count', $attendanceOptions);
	    
	    $attendanceOptions['group'] = array('EventAttendance.event_id');
	    $completed_events = $eventAttendance->EventAttendance->find('count', $attendanceOptions);
	    
	    $absentees_participants = $planned_participants - $completed_participants;
		$absentees_events = $completed_events;

		$myStaffProfile = new StaffTrainingProfilesController;

		$staffOptions['joins'] = array(
				array('table' => 'events',
				    'alias' => 'Event',
				    'type' => 'LEFT',
				    'conditions' => array(
				        'StaffTrainingProfile.event_id = Event.id',
				    ),
				),
				array('table' => 'event_attendances',
				    'alias' => 'EventAttendance',
				    'type' => 'LEFT',
				    'conditions' => array(
				        'EventAttendance.event_id = StaffTrainingProfile.event_id',
				    ),
				)
			);
		$staffOptions['conditions'] = array(
			'StaffTrainingProfile.active' => true, 
			'StaffTrainingProfile.event_id is NOT NULL', 
			'YEAR(StaffTrainingProfile.start_date) = YEAR(NOW())',
			'Event.active' => true,
			'Event.is_memo' => true,
	    	'EventAttendance.active' => true, 
	    	'EventAttendance.is_completed' => true, 
			);
		$staffOptions['group'] = array('StaffTrainingProfile.id');
		// $staffOptions['fields'] = array('DISTINCT StaffTrainingProfile.id');

		$student_evaluation = $myStaffProfile->StaffTrainingProfile->find('count', $staffOptions);

		$staffOptions['group'] = array('Event.id');
		$student_events = $myStaffProfile->StaffTrainingProfile->find('count', $staffOptions);

		$this->set(compact('planned_participants', 'event_planned', 'completed_participants', 'completed_events', 'student_evaluation', 'student_events', 'absentees_participants', 'absentees_events'));
		

		
		$options['conditions'] = array(
			'Event.id is not NULL', 
			'MONTH(Event.start_date) = MONTH(NOW())', 
			// 'WEEK(Event.start_date) = WEEK(NOW())', 
			'YEAR(Event.start_date) = YEAR(NOW())'
			);
		$latestEvents = $myEvent->Event->find('count', $options);

		$options['conditions'] = array(
			'Event.active' => true, 
			'MONTH(Event.start_date) = MONTH(NOW())', 
			// 'WEEK(Event.start_date) = WEEK(NOW())', 
			'YEAR(Event.start_date) = YEAR(NOW())'
			);
		$latestPublishedEvents = $myEvent->Event->find('count', $options);
		
		$options['conditions'] = array(
			'Event.active' => true, 
			'Event.is_memo' => true, 
			'MONTH(Event.start_date) = MONTH(NOW())', 
			'YEAR(Event.start_date) = YEAR(NOW())'
			);
		$monthlyPublishedEvents = $myEvent->Event->find('count', $options);
		
		$options['conditions'] = array(
			'Event.active' => true, 
			'Event.is_memo' =>true, 
			// 'Event.is_tcn' => false, 
			// 'DATE_ADD(Event.end_date, INTERVAL 1 DAY) < DATE(NOW())', 
			// 'MONTH(Event.start_date) = MONTH(NOW())', 
			'WEEK(Event.start_date) = WEEK(NOW())', 
			'YEAR(Event.start_date) = YEAR(NOW())',
			'Event.end_date <=  NOW()'
			);
		$dueTCNEvents = $myEvent->Event->find('count', $options);
		
		$this->set(compact('latestEvents', 'latestPublishedEvents', 'dueTCNEvents', 'monthlyPublishedEvents'));

		// $end = 'Event.start_date <=  STR_TO_DATE("'.$this->request->data['Event']['end_date'].'", "%d-%m-%Y")';


	}

	public function get_stat_training_days($year = null, $department = null) {
		$this->autoRender = false;
		$this->RequestHandler->respondAs('json');

	    $profile = new StaffTrainingProfilesController;

	    $options['fields'] = array('YEAR(start_date) as year', 'count(id) as total_staffs', 'sum(duration) as man_days');
	    $options['group'] = array('YEAR(start_date)');
	    $options['order'] = array('YEAR(start_date)');

	    $data = $profile->StaffTrainingProfile->find('all', $options);

		echo json_encode($data);
	}

	public function admin_index() {
		$this->layout ='railadmin';
	}

}
