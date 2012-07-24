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
	$('[name=postal], [name=region], [name=locality]').live('blur', function()
	{
		if ($("[name=postal]").val().length > 0 && $("[name=locality]").val().length > 0 && $("[name=region]").val().length > 0 && $("[name=address]").val().length > 0) 
		{
			var address = $('[name=address]').val() + " " + $('[name=locality]').val() + ", " + $('[name=region]').val() + " " + $('[name=postal]').val();
			renderMapTile('#place_map_map', address);
		}
	});

	// Click Map It
	$('#place_map_it').live('click', function(e)
	{
		e.preventDefault();
		var address = $('[name=address]').val() + " " + $('[name=locality]').val() + ", " + $('[name=region]').val() + " " + $('[name=postal]').val();	
		renderMapTile('#place_map_map', address);
	});

});