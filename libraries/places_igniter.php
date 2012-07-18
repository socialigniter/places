<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Places Igniter Library
*
* @package		Social Igniter
* @subpackage	Places Igniter Library
* @author		Brennan Novak
* @link			http://social-igniter.com/apps/places
*
* Contains methods for Places App
*/

class Places_igniter
{
	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	
		$this->ci->load->model('places/places_model');
	}


	/* Places */
	function get_place($parameter, $value)
	{
		return $this->ci->places_model->get_place($parameter, $value);
	}

	function get_places_view($parameter, $value, $status=FALSE, $limit=10)
	{
		return $this->ci->places_model->get_places_view($parameter, $value, $status, $limit);
	}
	
	function add_place($place_data)
	{
		if ($place = $this->ci->places_model->add_place($place_data))
		{			
			return $place;
		}
		else
		{
			return FALSE;
		}
	}

	function update_place($place_data)
	{
		return $this->ci->places_model->update_place($place_data);
	}
	
	function distance($long_1,$lat_1,$long_2,$lat_2)
  {
    $earth_radius = 3963.1676; // in miles
     
    $sin_lat   = sin(deg2rad($lat_2  - $lat_1)  / 2.0);
    $sin2_lat  = $sin_lat * $sin_lat;
     
    $sin_long  = sin(deg2rad($long_2 - $long_2) / 2.0);
    $sin2_long = $sin_long * $sin_long;
     
    $cos_lat_1 = cos($lat_1);
    $cos_lat_2 = cos($lat_2);
     
    $sqrt      = sqrt($sin2_lat + ($cos_lat_1 * $cos_lat_2 * $sin2_long));
     
    $distance  = 2.0 * $earth_radius * asin($sqrt);
     
    return $distance;
  }


}