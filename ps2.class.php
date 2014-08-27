<?php
 /*
 * Project:		EQdkp-Plus
 * License:		Creative Commons - Attribution-Noncommercial-Share Alike 3.0 Unported
 * Link:		http://creativecommons.org/licenses/by-nc-sa/3.0/
 * -----------------------------------------------------------------------
 * Date:		$Date: 2014-08-27 11:21:43 +0200 (Wed, 27 Aug 2014) $
 * -----------------------------------------------------------------------
 * @author		$Author: godmod $
 * @copyright	2006-2014 EQdkp-Plus Developer Team
 * @link		http://eqdkp-plus.com
 * @package		eqdkp-plus
 * @version		$Rev: 14552 $
 *
 * $Id: wow.class.php 14552 2014-08-27 09:21:43Z godmod $
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

if(!class_exists('ps2')) {
	class ps2 extends game_generic {
		protected static $apiLevel	= 20;
		public $version				= '0.1';
		protected $this_game		= 'ps2';
		protected $types			= array('classes', 'races', 'filters');
		protected $classes			= array();
		protected $races			= array();
		protected $factions			= array();
		protected $filters			= array();
		public $langs				= array('english', 'german');

		protected $class_dependencies = array(
			array(
				'name'		=> 'race',
				'type'		=> 'races',
				'admin'		=> false,
				'decorate'	=> true,
				'parent'	=> false
			),
			array(
				'name'		=> 'class',
				'type'		=> 'classes',
				'admin'		=> false,
				'decorate'	=> true,
				'primary'	=> true,
				'colorize'	=> true,
				'roster'	=> true,
				'recruitment' => true,
				'parent'	=> false
		));
		
		protected $class_colors = array(
			1	=> '#1A3C8A',
			2	=> '#EB0900',
			3	=> '#FDCB00',
			4	=> '#474AF8',
			5	=> '#C62A19',
			6	=> '#5D9900',
		);

		protected $glang		= array();
		protected $lang_file	= array();
		protected $path			= '';
		public $lang			= false;

		protected function load_filters($langs){
			if(!$this->classes) {
				$this->load_type('classes', $langs);
			}
			foreach($langs as $lang) {
				$names = $this->classes[$this->lang];
				$this->filters[$lang][] = array('name' => '-----------', 'value' => false);
				foreach($names as $id => $name) {
					$this->filters[$lang][] = array('name' => $name, 'value' => 'class:'.$id);
				}
			}
		}

		public function install($install=false){}
	}
}
?>