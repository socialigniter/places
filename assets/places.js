/* Google Maps API Functions */
function renderMapTile(element, address)
{
	console.log('heeeere: ' + element)

	$(element).gmap3(
	{
		action : 'getLatLng',
		address: address,
		callback : function(result)
		{			
			if (result)
			{
				console.log(result);
			
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

// Add Place
(function($)
{
	$.fn.placeManager = function(options)
	{
		var settings = {
			action		: '',
			module		: '',
			type		: '',
			title		: '',
			parent 		: false,
			category_id	: ''
		};

		options = $.extend({}, settings, options);

		$(this).change(function()
		{	
			if ($(this).val() == 'add_content')
			{
				$.get(base_url + 'places/dialogs/add_place', function(html)
				{
					// Generate Dialog
					$('<div />').html(html).dialog(
					{
						width	: 700,
						title	: 'Add Place',
						close	: function() {$(this).remove()},
						create	: function()
						{
							$create_place_dialog = $(this);

							renderMapTile('#place_map_map', 'Portland, OR');
						},
						buttons:
						{
							"Create" : function()
							{								
								// Strip Empty
								$.validator(
								{
									elements : [{
										'selector' 	: '#title', 
										'rule'		: 'require',
										'field'		: 'Your place needs a Title',
										'action'	: 'label'
									},{
										'selector' 	: '#place_address', 
										'rule'		: 'require',
										'field'		: 'Your Place needs an Address',
										'action'	: 'label'				
									},{
										'selector' 	: '#place_locality', 
										'rule'		: 'require',
										'field'		: 'Your Place needs an City',
										'action'	: 'label'
									},{
										'selector' 	: '#place_region', 
										'rule'		: 'require',
										'field'		: 'Your Place needs an State',
										'action'	: 'label'
									},{
										'selector' 	: '#place_postal', 
										'rule'		: 'require',
										'field'		: 'Your Place needs an Postal Code',
										'action'	: 'label'
									}],
									message	 : '',
									success	 : function()
									{						
										var place_data	= $('#create_place').serializeArray();
										place_data.push({'name':'module','value':'places'},{'name':'type','value':'place'},{'name':'source','value':'website'});
													
										$.oauthAjax(
										{
											oauth 		: user_data,
											url			: base_url + 'api/places/create',
											type		: 'POST',
											dataType	: 'json',
											data		: place_data,
											success		: function(result)
											{									
												if (result.status == 'success')
												{											
													// Makes Places Trigger Proper
													$('#location_id').append('<option value="' + result.data.content_id + '">' + result.data.title + '</option>');												
													$('#location_id').val(result.data.content_id);
				
													$create_place_dialog.dialog('close');
													$create_place_dialog.remove();
												}
												else
												{
													alert(result.message);
												}
											}
										});
									}
								});
							},
							"Cancel" : function()
							{
								$create_place_dialog.dialog('close');
								$create_place_dialog.remove();							
							}
						}
					});
				});
			}
		});
	};
}) (jQuery);
