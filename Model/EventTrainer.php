<?php
App::uses('RailCompetencyAppModel', 'RailCompetency.Model');
/**
 * EventTrainer Model
 *
 * @property Event $Event
 * @property Course $Course
 * @property Staff $Staff
 */
class EventTrainer extends RailCompetencyAppModel {

	public $actsAs = array('Search.Searchable','AuditLog.Auditable' );
	public $filterArgs = array(
		'queryString' => array(
			'type' => 'like',
			'field' => array(
				'name',
				'event_id',
				'course_id',
				'active',
				'created',
				'updated',
			),
		),
	);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'event_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'course_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'staff_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Event' => array(
			'className' => 'Event',
			'foreignKey' => 'event_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Trainer' => array(
			'className' => 'Trainer',
			'foreignKey' => 'trainer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
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
