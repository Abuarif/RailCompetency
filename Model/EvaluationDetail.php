<?php
App::uses('RailCompetencyAppModel', 'RailCompetency.Model');
/**
 * EvaluationDetail Model
 *
 * @property Staff $Staff
 * @property EvaluationQuestionnaire $EvaluationQuestionnaire
 */
class EvaluationDetail extends RailCompetencyAppModel {

	public $actsAs = array('Search.Searchable', 'AuditLog.Auditable' );

	public $filterArgs = array(
		'queryString' => array(
			'type' => 'like',
			'field' => array(
				'name',
				'staff_id',
				'evaluation_questionnaire_id',
				'score',
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
		'evaluation_questionnaire_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'score' => array(
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
		'Staff' => array(
			'className' => 'Staff',
			'foreignKey' => 'staff_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EvaluationQuestionnaire' => array(
			'className' => 'EvaluationQuestionnaire',
			'foreignKey' => 'evaluation_questionnaire_id',
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
