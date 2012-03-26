<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:		Social Igniter : Places : Routes
* Author: 	Brennan Novak
* 		  	contact@social-igniter.com
*
* Project:	http://social-igniter.com/
* Source: 	http://github.com/socialigniter/places
*
* Standard installed routes for Places. 
*/

/* Places */
$route['places/api/view/(:any)/(:any)']					= 'api/view/$1/$2';
$route['places/api/destroy/(:any)/(:any)']				= 'api/destroy/$1/$2';
$route['places/api/modify/(:any)/(:any)']				= 'api/modify/$1/$2';
$route['places/api/nearby/(:any)/(:any)']				= 'api/nearby/$1/$2';
$route['places/api/all']								= 'api/all';
$route['places/api/create']								= 'api/create';

$route['places/home/manage/(:num)']						= 'home/places_editor';
$route['places/home/create']							= 'home/places_editor';
