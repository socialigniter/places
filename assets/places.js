/* Google Maps API Functions */
function renderMapTile(element, address)
{
	$(element).gmap3(
	{
		action : 'getLatLng',
		address: address,
		callback : function(result)
		{			
			if (result)
			{
				$(this).gmap3(
				{
					action: 'addMarker',
					latLng: result[0].geometry.location,
					map: {
						center: true,
						zoom: 21,
						mapTypeId: google.maps.MapTypeId.TERRAIN
					}
				});

				$('#geo_lat').val(result[0].geometry.location.lat());
				$('#geo_long').val(result[0].geometry.location.lng());
			}
			else 
			{
				alert('Address not findable in Google');
			}
		}
	});
}


$(document).ready(function()
{

	// Finish Entering Data
	$('#place_postal, #place_region, #place_locality').live('blur', function()
	{
		if ($("#place_postal").val().length > 0 && $("#place_locality").val().length > 0 && $("#place_region").val().length > 0 && $("#place_address").val().length > 0) 
		{
			var address = $('#place_address').val() + " " + $('#place_locality').val() + ", " + $('#place_region').val() + " " + $('#place_postal').val();
			renderMapTile('#place_map_map', address);
		}
	});

	// Click Map It
	$('.place_map_it').live('click', function(e)
	{
		e.preventDefault();
		var address = $('#place_address').val() + " " + $('#place_locality').val() + ", " + $('#place_region').val() + " " + $('#place_postal').val();	
		renderMapTile('#place_map_map', address);
	});

});