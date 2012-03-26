<?php
class Places extends Site_Controller
{
    function __construct()
    {
        parent::__construct();       

		$this->load->config('places');
		$this->load->library('places_igniter');
	}

	function index()
	{
		// This should show recent places in a list but for now will just
		redirect();
	}

	function view() 
	{
		if ($this->uri->segment(3))
		{
			// Need is valid & access and such
			$place = $this->places_igniter->get_place('content_id', $this->uri->segment(3));
			if (!$place) redirect(base_url().'home/error');

			// Non Form Fields
			$this->data['sub_title']		= $place->title;
			$this->data['form_url']			= base_url().'api/places/modify/id/'.$this->uri->segment(3);
			
			if ($place->geo_lat) $geo_lat = $place->geo_lat;
			else $geo_lat = '0.00';

			if ($place->geo_long) $geo_long = $place->geo_long;
			else $geo_long = '0.00';			
			
			// Form Fields
			$this->data['title'] 			= $place->title;
			$this->data['title_url'] 		= $place->title_url;
			$this->data['description']		= $place->content;
			$this->data['category_id']		= $place->category_id;
			$this->data['details'] 			= $place->details;
			$this->data['access']			= $place->access;
			$this->data['comments_allow']	= $place->comments_allow;
			$this->data['geo_lat']			= $geo_lat;
			$this->data['geo_long']			= $geo_long;
			
			// Place
			$this->data['address']			= $place->address;
			$this->data['district']			= $place->district;
			$this->data['locality']			= $place->locality;
			$this->data['region']			= $place->region;
			$this->data['country']			= $place->country;
			$this->data['postal']			= $place->postal;
			
			$this->data['page_title'] 		= $place->title.' | '.$place->address;
		}
		else
		{
			redirect();
		}		
	
		// Basic Content Redirect	
		$this->render('wide');
	}
	
}
