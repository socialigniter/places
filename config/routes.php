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

$route['places/home/manage/(:num)']						= 'home/places_editor';
$route['places/home/create']							= 'home/places_editor';
$route['places/view/(:num)']							= 'places/view';
