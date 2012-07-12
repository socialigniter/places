<?php
class Dialogs extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->load->config('places');
        $this->load->library('places_igniter');
	}

	function add_place()
	{		
		$this->data['title']	= '';
		$this->data['address']	= '';
		$this->data['district'] = '';
		$this->data['locality'] = '';
		$this->data['region']	= '';
		$this->data['postal']	= '';
		$this->data['country'] 	= 'US';
		$this->data['geo_lat']	= '';
		$this->data['geo_long']	= '';

		$this->load->view('dialogs/add_place', $this->data);		
	}



}