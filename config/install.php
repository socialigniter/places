<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Places : Install
* Author: 		Brennan Novak
* 		  		contact@social-igniter.com
*          
* Created: 		Brennan Novak
*
* Project:		http://social-igniter.com/
* Source: 		http://github.com/socialigniter/places
*
* Description: 	Install values for Places App for Social Igniter 
*/

/* Settings */
$config['places_settings']['enabled']				= 'TRUE';
$config['places_settings']['categories'] 			= 'TRUE';
$config['places_settings']['widgets']				= 'TRUE';
$config['places_settings']['create_permission']		= '3';
$config['places_settings']['publish_permission']	= '2';
$config['places_settings']['manage_permission']		= '1';
$config['places_settings']['ratings_allow']			= 'no';
$config['places_settings']['comments_per_page']		= '5';
$config['places_settings']['comments_allow']		= 'no';
$config['places_settings']['tags_display']			= 'no';


// Places Database Table
$config['database_places_places_table'] = array(
	'place_id' => array(
		'type' 					=> 'INT',
		'constraint' 			=> 16,
		'unsigned' 				=> TRUE,
		'auto_increment'		=> TRUE
	),
	'content_id' => array(
		'type' 					=> 'INT',
		'constraint' 			=> '11',
		'null'					=> TRUE
	),
	'address' => array(
		'type'					=> 'VARCHAR',
		'constraint'			=> 128,
		'null'					=> TRUE
	),
	'district' => array(
		'type'					=> 'VARCHAR',
		'constraint'			=> 128,
		'null'					=> TRUE
	),
	'locality' => array(
		'type'					=> 'VARCHAR',
		'constraint'			=> 128,
		'null'					=> TRUE
	),
	'region' => array(
		'type'					=> 'VARCHAR',
		'constraint'			=> 128,
		'null'					=> TRUE
	),
	'country' => array(
		'type'					=> 'VARCHAR',
		'constraint'			=> 128,
		'null'					=> TRUE
	),
	'postal' => array(
		'type'					=> 'VARCHAR',
		'constraint'			=> 32,
		'null'					=> TRUE
	)										
);