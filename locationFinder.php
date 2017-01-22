<?php

function get_location_uri($location_name){
	$baseUri = "https://maps.googleapis.com/maps/api/place/textsearch/json";
	$params = Array (
		"key" => "AIzaSyCsr-VEEMAoqX3J3gAtGbBOdyEdiFkcoPY",
		"query" => $location_name." Bandung"
	);
	
	$uri = $baseUri;
	$first = true;
	foreach($params as $param => $value){
		if( $first )
			$uri .= "?";
		else
			$uri .= "&";

		$first = false;
		$uri .= rawurlencode($param) . "=" . rawurlencode($value);
	}
	
	return $uri;
}

function get_location_data($query){
	$uri = get_location_uri($query);
//	$uri = "http://localhost/SuaraBandung/sample.json";
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, $uri); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$output = curl_exec($ch); 
	curl_close($ch);      
	
	return $output;
}

function print_map_loader($lat, $lng, $place_id ){
	echo "
		var map;
		function initMap() {
			map = new google.maps.Map(document.getElementById('map'), {
				center: {lat: $lat, lng: $lng},
				zoom: 15,
				place_id : \"$place_id\"
			});
		}	
	";
}

function print_map_loader_from_json($json){
	$lat = $json["results"][0]["geometry"]["location"]["lat"];
	$lng = $json["results"][0]["geometry"]["location"]["lng"];
	$place_id = $json["results"][0]["place_id"];
	
	print_map_loader($lat,$lng,$place_id);
}


$jsondata = get_location_data(rawurldecode($_GET['location']));
$json = json_decode($jsondata,true);

if( $json["status"] != "OK")
	echo "location not found";
else
	print_map_loader_from_json($json);

?>