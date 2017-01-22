<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
	    width : 100vw;
        height: 100vh;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
	<?php
		include('locationFinder.php');
	?>
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsr-VEEMAoqX3J3gAtGbBOdyEdiFkcoPY&callback=initMap" 
	async defer></script>
  </body>
</html>