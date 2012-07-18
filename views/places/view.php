<h2><?= $title ?></h2>

<p><?= $description ?></p>

<h3>Address</h3>
<p>
	<?= $address ?><br>
	<?= $locality ?>, <?= $region ?> <?= $postal ?><br>
	<?= $country ?>
</p>

<p>
  <div id="map" style="width:800px; height:300px;"></div>
</p>
 <script src="http://www.mapquestapi.com/sdk/js/v7.0.s/mqa.toolkit.js?key=Fmjtd%7Cluua20utlu%2C2a%3Do5-967au0"></script> 

  <script type="text/javascript"> 

    /*An example of using the MQA.EventUtil to hook into the window load event and execute defined function 
    passed in as the last parameter. You could alternatively create a plain function here and have it 
    executed whenever you like (e.g. <body onload="yourfunction">).*/ 

    MQA.EventUtil.observe(window, 'load', function() {
	
      /*Create an object for options*/ 
      var options={
        elt:document.getElementById('map'),       /*ID of element on the page where you want the map added*/ 
        zoom:30,                                  /*initial zoom level of the map*/ 
        latLng:{lat:<?= $geo_lat ?>, lng: <?= $geo_long ?>},  /*center of map in latitude/longitude */ 
        mtype:'map',                              /*map type (map)*/ 
        bestFitMargin:0,                          /*margin offset from the map viewport when applying a bestfit on shapes*/ 
        zoomOnDoubleClick:true                    /*zoom in when double-clicking on map*/ 
      };

      /*Construct an instance of MQA.TileMap with the options object*/ 
      window.map = new MQA.TileMap(options);
    });

  </script> 
  
