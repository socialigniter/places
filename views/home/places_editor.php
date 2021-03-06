<form name="content_editor_form" id="content_editor_form" action="<?= $form_url ?>" method="post" enctype="multipart/form-data">

	<div id="content_wide_content">
		<h3>Title</h3>
		<input type="text" name="title" id="title" class="input_full" placeholder="Joes Oyster Shack" value="<?= $title ?>">
		<span id="title_error"></span>
		<p id="title_slug" class="slug_url"></p>
		
		<div id="place_address_container">
			<h3>Address</h3>
			<p>
				<input type="text" name="address" id="place_address" class="input_bigger" placeholder="15229 Some St." value="<?= $address ?>">
				<span id="place_address_error"></span>
			</p>
			<p>
				<input type="text" name="district" id="place_district" class="input_bigger" placeholder="Waterfront" value="<?= $district ?>">
			</p>
			<p>
				<input type="text" name="locality" id="place_locality" class="input_small" placeholder="Someville" value="<?= $locality ?>">	
				<input type="text" name="region" id="place_region" class="input_mini" placeholder="CA" value="<?= $region ?>">
				<input type="text" name="postal" id="place_postal" class="input_small" placeholder="90000" value="<?= $postal ?>">
				<span id="place_locality_error"></span>			
				<span id="place_region_error"></span>			
				<span id="place_postal_error"></span>
			</p>
			<p><?= country_dropdown('country', config_item('countries'), $country) ?></p>
			<p><a href="#" id="place_map_it" class="place_map_it">Map It</a></p>
		</div>
		<div id="place_map">
			<h3>Map</h3>
			<div id="place_map_map" rel="place_map_map" class="map"></div>
		</div>		
		<div class="clear"></div>
	
		<p><a href="#" id="add_details">Add More Details</a></p>
		<div id="place_details" style="display:none">

			<h3>Description</h3>
			<p><textarea name="content" id="place_content" rows="4" cols="100" placeholder="Joe is a good man but he makes even better oysters..."><?= $content ?></textarea></p>
	
		    <h3>Category</h3>
		    <p><?= form_dropdown('category_id', $categories, $category_id, 'id="category_id"') ?></p>
		    
		    <h3>Tags</h3>
		    <p><input name="tags" type="text" id="tags" size="75" placeholder="Blogging, Internet, Web Design" /></p>
	
			<h3>Access</h3>
			<p><?= form_dropdown('access', config_item('access'), $access) ?></p>
		
			<h3>Comments</h3>
			<p><?= form_dropdown('comments_allow', config_item('comments_allow'), $comments_allow) ?></p>
		
		</div>

		<input type="hidden" name="details" id="details" value="<?= $details ?>">		
		<input type="hidden" name="geo_lat" id="geo_lat" value="<?= $geo_lat ?>">
		<input type="hidden" name="geo_long" id="geo_long" value="<?= $geo_long ?>">

	</div>

	<div id="content_wide_toolbar">
		<?= $content_publisher ?>
	</div>

</form>
<div class="clear"></div>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="<?= base_url() ?>js/gmap3.min.js"></script>
<script type="text/javascript" src="<?= $modules_assets ?>places.js"></script>
<script type="text/javascript">
// Elements for Placeholder
var validation_rules = [{
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
}];

$(document).ready(function()
{
	// Slugify Title
	$('#title').slugify({url:base_url + 'places/', slug:'#title_slug', name:'title_url', slugValue:'<?= $title_url ?>'});

	// Tags
	autocomplete("[name=tags]", 'api/tags/all');

	// Existing Address
	if (($('#geo_lat').val() != '0.00') && ($('#geo_long').val() != '0.00'))
	{
		var address = $('#place_address').val() + " " + $('#place_locality').val() + ", " + $('#place_region').val() + " " + $('#place_postal').val();
		renderMapTile('#place_map_map', address);
	}
	else
	{
		renderMapTile('#place_map_map', 'Portland, OR');
	}

	// Add Details
	$('#add_details').live('click', function(e)
	{
		e.preventDefault();
		$(this).hide();
		$('#place_details').show('slow');
	});

	// Add Category
	$('#category_id').categoryManager(
	{
		action		: 'create',				
		module		: 'places',
		type		: 'category',
		title		: 'Add Place Category'
	});

	// Specify API URL
	$.data(document.body, 'api_url', $('#content_editor_form').attr('action'));

});
</script>