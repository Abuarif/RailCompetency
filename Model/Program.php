<?php
App::uses('RailCompetencyAppModel', 'RailCompetency.Model');
/**
 * Program Model
 *
 * @property ProgramCourse $ProgramCourse
 */
class Program extends RailCompetencyAppModel {

	public $actsAs = array('Search.Searchable','AuditLog.Auditable' );
	public $filterArgs = array(
		'queryString' => array(
			'type' => 'like',
			'field' => array(
				'name',
				'created',
				'updated',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'ProgramCourse' => array(
			'className' => 'ProgramCourse',
			'foreignKey' => 'program_id',
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
