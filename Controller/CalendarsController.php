<?php
App::uses('RailCompetencyAppController', 'RailCompetency.Controller');
/**
 * Courses Controller
 *
 * @property Course $Course
 * @property PaginatorComponent $Paginator
 */
class CalendarsController extends RailCompetencyAppController {

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
		
	}

	public function admin_index() {
		$this->layout ='railadmin';
	}

}
