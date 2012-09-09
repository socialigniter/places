<form name="create_place" method="post" id="create_place" enctype="multipart/form-data">
	
	<div id="place_address">
		<h3>Title</h3>
		<p>
			<input type="text" name="title" id="title" class="input_bigger" placeholder="234 NW 10th Ave" value="<?= $title ?>">
			<span id="title_error"></span>
		</p>
		<h3>Address</h3>
		<p>
			<input type="text" name="address" id="address" class="input_bigger" placeholder="Apt #112" value="<?= $address ?>">
			<span id="address_error"></span>
		</p>
		<p><input type="text" name="district" id="district" class="input_bigger" placeholder="The Pearl" value="<?= $district ?>"></p>
		<p>
			<input type="text" name="locality" id="locality" class="input_small" placeholder="Portland" value="<?= $locality ?>">		
			<input type="text" name="region" id="region" class="input_mini" placeholder="OR" value="<?= $region ?>">
			<input type="text" name="postal" id="postal" class="input_small" placeholder="97209" value="<?= $postal ?>">
			<span id="locality_error"></span>
			<span id="region_error"></span>
			<span id="postal_error"></span>
		</p>
		<div id="place_country"><?php // country_dropdown('country', config_item('countries'), $country) ?></div>
		<a href="#" id="place_map_it">Map It</a>
		<div class="clear"></div>
	</div>

	<div id="place_map">
		<h3>Map</h3>
		<div id="place_map_map" class="map"></div>
	</div>

	<div class="clear"></div>

	<input type="hidden" name="geo_lat" id="geo_lat" value="<?= $geo_lat ?>" />
	<input type="hidden" name="geo_long" id="geo_long" value="<?= $geo_long ?>" />	

</form>