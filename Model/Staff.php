<?php
App::uses('RailCompetencyAppModel', 'RailCompetency.Model');
/**
 * Staff Model
 *
 * @property Organization $Organization
 * @property Staff $ParentStaff
 * @property User $User
 * @property Position $Position
 * @property AvailabilityForm $AvailabilityForm
 * @property EvaluationDetail $EvaluationDetail
 * @property Evaluation $Evaluation
 * @property EventAttendance $EventAttendance
 * @property EventTrainer $EventTrainer
 * @property StaffAssignment $StaffAssignment
 * @property StaffQualification $StaffQualification
 * @property StaffTrainingProfile $StaffTrainingProfile
 * @property Staff $ChildStaff
 * @property TrainerMigrate $TrainerMigrate
 * @property Trainer $Trainer
 */
class Staff extends RailCompetencyAppModel {

/**
 * Behaviors
 *
 * @var array
 */
	public $uploadsDir = 'attachments'; 
	public $fieldName = 'files'; 
	public $displayField = 'name'; 
	
	public $actsAs = array(
	
		'Tree',
	 
	'Search.Searchable','AuditLog.Auditable' );

	public $filterArgs = array(
		'queryString' => array(
			'type' => 'like',
			'field' => array(
				'Organization.name',
				'Staff.name',
				'Staff.staff_no',
				'Staff.org_code',
				'Staff.parent_code',
			),
		),
	);

	// public $virtualFields = array(
	//     'staff_name' => 'CONCAT(Staff.staff_no, " - ", Staff.name)'
	// );
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		// 'parent_id' => array(
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'position_id' => array(
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'isTrainer' => array(
		// 	'boolean' => array(
		// 		'rule' => array('boolean'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'active' => array(
		// 	'boolean' => array(
		// 		'rule' => array('boolean'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'lft' => array(
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
		// 'rght' => array(
		// 	'numeric' => array(
		// 		'rule' => array('numeric'),
		// 		//'message' => 'Your custom message here',
		// 		//'allowEmpty' => false,
		// 		//'required' => false,
		// 		//'last' => false, // Stop validation after this rule
		// 		//'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	),
		// ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Organization' => array(
			'className' => 'Organization',
			'foreignKey' => 'organization_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ParentStaff' => array(
			'className' => 'Staff',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Position' => array(
			'className' => 'Position',
			'foreignKey' => 'position_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		// 'AvailabilityForm' => array(
		// 	'className' => 'AvailabilityForm',
		// 	'foreignKey' => 'staff_id',
		// 	'dependent' => false,
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => '',
		// 	'limit' => '',
		// 	'offset' => '',
		// 	'exclusive' => '',
		// 	'finderQuery' => '',
		// 	'counterQuery' => ''
		// ),
		'EvaluationDetail' => array(
			'className' => 'EvaluationDetail',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Evaluation' => array(
			'className' => 'Evaluation',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EventAttendance' => array(
			'className' => 'EventAttendance',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EventAttendanceDetail' => array(
			'className' => 'EventAttendanceDetail',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'StaffAssignment' => array(
			'className' => 'StaffAssignment',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'StaffQualification' => array(
			'className' => 'StaffQualification',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'StaffCertification' => array(
			'className' => 'StaffCertification',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'StaffTrainingProfile' => array(
			'className' => 'StaffTrainingProfile',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => 'StaffTrainingProfile.start_date ASC',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'StaffExternalTraining' => array(
			'className' => 'StaffExternalTraining',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ChildStaff' => array(
			'className' => 'Staff',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'TrainerMigrate' => array(
			'className' => 'TrainerMigrate',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Trainer' => array(
			'className' => 'Trainer',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'MailingListDetail' => array(
			'className' => 'MailingListDetail',
			'foreignKey' => 'staff_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	protected function _saveUploadedFile($data) {
		$file = $data[$this->alias]['files'];
		unset($data[$this->alias]['files']);

		// check if file with same path exists
		$destination = WWW_ROOT . $this->uploadsDir . DS . $file['name'];
		if (file_exists($destination)) {
			$newFileName = String::uuid() . '-' . $file['name'];
			$destination = WWW_ROOT . $this->uploadsDir . DS . $newFileName;
		} else {
			$newFileName = $file['name'];
		}

		// remove the extension for title
		if (explode('.', $file['name']) > 0) {
			$fileTitleE = explode('.', $file['name']);
			array_pop($fileTitleE);
			$fileTitle = implode('.', $fileTitleE);
		} else {
			$fileTitle = $file['name'];
		}

		$data[$this->alias][$this->fieldName] = $newFileName;
		//$data[$this->alias]['slug'] = $newFileName;
		//$data[$this->alias]['mime_type'] = $file['type'];
		//$data[$this->alias]['type'] = $this->type;
		//$data[$this->alias]['path'] = '/' . $this->uploadsDir . '/' . $newFileName;
		// move the file
		$moved = move_uploaded_file($file['tmp_name'], $destination);
		if ($moved) {
			return $data;
		}

		return false;
	}




	/**
	 * Saves model data
	 *
	 * @see Model::save()
	 */
	public function save($data = null, $validate = true, $fieldList = array()) {
		if (!empty($data[$this->alias]['files']['tmp_name'])) {
			$data = $this->_saveUploadedFile($data);
		}
		if (!$data) {
			return $this->invalidate('file', __d('croogo', 'Error during file upload'));
		}

		return parent::save($data, $validate, $fieldList);
	}

}
