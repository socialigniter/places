/* Google Maps API Functions */
var geocoder;
var map;
var markersArray = [];

// Loads Map Title
function getMap(lat_long, element)
{		
	geocoder = new google.maps.Geocoder();
	var myOptions =
	{
  		zoom				: 14,
  		center				: lat_long,
		panControl			: false,
		zoomControl			: true,
		mapTypeControl		: false,
		scaleControl		: true,
		streetViewControl	: false,
		overviewMapControl	: false,	  		
  		mapTypeId: google.maps.MapTypeId.ROADMAP
	}

	map = new google.maps.Map(document.getElementById(element), myOptions);
	
	addMarker(lat_long);	
}


function getMapGeocode(address, lat_field, long_field)
{	
	geocoder.geocode({'address' : address}, function(results, status)
	{
		console.log(results);
	
		if (status == google.maps.GeocoderStatus.OK)
		{
			// Center Tile
	    	map.setCenter(results[0].geometry.location);
		
			// Clear & Make Markers
	    	clearOverlays();
	    	deleteOverlays();	
	    	addMarker(results[0].geometry.location);

	    	// Set Geo
	    	$(lat_field).val(results[0].geometry.location.lat());
	    	$(long_field).val(results[0].geometry.location.lng());
		}
		else
		{
			alert("Could not get Google map");
		}
	});
}


function addMarker(location)
{
	marker = new google.maps.Marker(
  	{
  		position: location,
    	map: map
  });
  
  markersArray.push(marker);
}


function clearOverlays()
{
	if (markersArray)
	{
		for (i in markersArray)
		{
			markersArray[i].setMap(null);
		}
	}
}		

function deleteOverlays()
{
	if (markersArray)
	{
		for (i in markersArray)
		{
			markersArray[i].setMap(null);
		}
	
		markersArray.length = 0;
	}
}