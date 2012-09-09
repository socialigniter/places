<form name="create_place" method="post" id="create_place" enctype="multipart/form-data">
	
	<div id="dialog_place_address_container">
		<h3>Title</h3>
		<p>
<<<<<<< HEAD
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
=======
			<input type="text" name="title" id="title" class="input_bigger" placeholder="Joes Oyster Shack" value="<?= $title ?>">
			<span id="title_error"></span>
		</p>	
		<h3>Address</h3>
		<p>
			<input type="text" name="address" id="place_address" class="input_bigger" placeholder="15229 Some St." value="<?= $address ?>">
			<span id="place_address_error"></span>
		</p>
		<p><input type="text" name="district" id="place_district" class="input_bigger" placeholder="Waterfront" value="<?= $district ?>"></p>
		<p>
			<input type="text" name="locality" id="place_locality" class="input_small" placeholder="Someville" value="<?= $locality ?>">
			<input type="text" name="region" id="place_region" class="input_mini" placeholder="CA" value="<?= $region ?>">
			<input type="text" name="postal" id="place_postal" class="input_small" placeholder="90000" value="<?= $postal ?>">
			<span id="place_locality_error"></span>			
			<span id="place_region_error"></span>			
			<span id="place_postal_error"></span>
>>>>>>> 7cac1a1f4e05341c83feb620814b803f0f010125
		</p>
		<a href="#" id="dialog_place_map_it" class="place_map_it">Map It</a>
		<div class="clear"></div>
	</div>

	<div id="dialog_place_map">
		<h3>Map</h3>
		<div id="place_map_map" class="map"></div>
	</div>

	<div class="clear"></div>

	<input type="hidden" name="geo_lat" id="geo_lat" value="<?= $geo_lat ?>" />
	<input type="hidden" name="geo_long" id="geo_long" value="<?= $geo_long ?>" />	

</form>