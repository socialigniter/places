<?php
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();

		$this->load->config('places');
		$this->load->library('places_igniter');

		$this->data['page_title'] = 'Places';
	}
	
	/* Places */
	function places_editor()
	{
		$this->load->config('locations');
					
		$this->data['page_title'] = 'Places';

		if (($this->uri->segment(3) == 'manage') && ($this->uri->segment(4)))
		{
			// Need is valid & access and such
			$place = $this->places_igniter->get_place('content_id', $this->uri->segment(4));
			if (!$place) redirect(base_url().'home/error');

			// Non Form Fields
			$this->data['sub_title']		= $place->title;
			$this->data['form_url']			= base_url().'api/places/modify/id/'.$this->uri->segment(4);
			
			if ($place->geo_lat) $geo_lat = $place->geo_lat;
			else $geo_lat = '0.00';

			if ($place->geo_long) $geo_long = $place->geo_long;
			else $geo_long = '0.00';			
			
			// Form Fields
			$this->data['title'] 			= $place->title;
			$this->data['title_url'] 		= $place->title_url;
			$this->data['content']			= $place->content;
			$this->data['category_id']		= $place->category_id;
			$this->data['details'] 			= $place->details;
			$this->data['access']			= $place->access;
			$this->data['comments_allow']	= $place->comments_allow;
			$this->data['geo_lat']			= $geo_lat;
			$this->data['geo_long']			= $geo_long;
			$this->data['status']			= display_content_status($place->status, $place->approval);

			// Place
			$this->data['address']			= $place->address;
			$this->data['district']			= $place->district;
			$this->data['locality']			= $place->locality;
			$this->data['region']			= $place->region;
			$this->data['country']			= $place->country;
			$this->data['postal']			= $place->postal;
			$this->data['address_string'] 	= $place->address.', '.$place->locality.', '.$place->region;
		}
		else
		{
			// Non Form Fields
			$this->data['sub_title']		= 'Create';
			$this->data['form_url']			= base_url().'api/places/create';

			// Form Fields
			$this->data['title'] 			= '';
			$this->data['title_url']		= '';
			$this->data['content']			= '';
			$this->data['category_id']		= '';
			$this->data['details'] 			= '';
			$this->data['access']			= 'E';
			$this->data['comments_allow']	= '';
			$this->data['geo_lat']			= '0.00';
			$this->data['geo_long']			= '0.00';
			$this->data['status']			= display_content_status('U');

			// Place
			$this->data['address']			= '';
			$this->data['district']			= '';
			$this->data['locality']			= '';
			$this->data['region']			= '';
			$this->data['country']			= 'US';
			$this->data['postal']			= '';			
			$this->data['address_string'] 	= '';
		}

		$this->data['form_module']			= 'places';
		$this->data['form_type']			= 'place';
		$this->data['form_name']			= 'places_editor';
		$this->data['categories'] 			= $this->social_tools->make_categories_dropdown(array('categories.module' => 'places'), $this->session->userdata('user_id'), $this->session->userdata('user_level_id'), '+ Add Place Category');	
	 	$this->data['content_publisher'] 	= $this->social_igniter->make_content_publisher($this->data, 'form');

 		$this->render('dashboard_wide');
	}	

}