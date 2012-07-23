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
