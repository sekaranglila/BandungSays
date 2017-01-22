<!DOCTYPE html>

<html>
	<head>
		<title>Result</title>
		<style>
			@font-face {
			    font-family: 'BebasNeueRegular';
			    src: url('fonts/BebasNeue-webfont.eot');
			    src: url('fonts/BebasNeue-webfont.eot?#iefix') format('embedded-opentype'),
			         url('fonts/BebasNeue-webfont.woff') format('woff'),
			         url('fonts/BebasNeue-webfont.ttf') format('truetype'),
			         url('fonts/BebasNeue-webfont.svg#BebasNeueRegular') format('svg');
			    font-weight: normal;
			    font-style: normal;
			}
			.container {
				background: #fff url(../images/bg.jpg) repeat top left;
				margin : auto;
			}
			.header {
				text-align: center;
			}
			.header h1 {
			    color: #1d3c41;
			    font-family: 'BebasNeueRegular', 'Arial Narrow', Arial, sans-serif;
				font-size: 80px;
				line-height: 10px;
				position: relative;
				font-weight: 400;
				color: rgba(26,89,120,0.9);
				text-shadow: 1px 1px 1px rgba(0,0,0,0.1);
			    padding: 0px 0px 5px 0px;
			}
			.header h1 span{
				color: #ff0066;
				text-shadow: 0px 1px 1px rgba(255,255,255,0.8);
			}
			.header p {
			    color: #8080ff;
			    font-size: 22px;
			    font-style: normal;
			    font-family: "Trebuchet MS","Myriad Pro",Arial,sans-serif;
			}
			.tab{
				width: 600px;
    			height: 30px;
    			margin: auto;
				background: rgb(247, 247, 247);
				border: 1px solid rgba(147, 184, 189,0.8);
				box-shadow: 0pt 2px 5px rgba(105, 108, 109,  0.7),	0px 0px 8px 5px rgba(208, 223, 226, 0.4) inset;
				border-radius: 5px;
			    padding-top: 10px;
			    padding-right: 10px;
			    padding-bottom: 10px;
			    padding-left: 10px;
			    text-align: left;
			    font-family: "Trebuchet MS","Myriad Pro",Arial,sans-serif;
			}
		</style>
	</head>
	<body class = "container">
		<div class= "header">
			<h1> Bandung<span>Says!</span></h1>
			<p> We hear what you're looking for </p>
		</div>

		<br>

		<?php
			function convertToTime($detik){
				$time = "second";
				if( $detik >= 60 ){
					$detik = $detik / 60;
					$time = "minute";
					if ($detik >= 60){
						$detik = $detik / 60;
						$time = "hour";
						if($detik >= 24){
							$detik = $detik / 24;
							$time = "day";
						}
					}
				}
				
				$detik = floor($detik);
				
				if( $detik > 1 )
					$time .= "s";
				
				return "$detik $time ago";
			}


			require "twitteroauth-0.6.3/autoload.php";
			
			use Abraham\TwitterOAuth\TwitterOAuth;

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				 // collect value of input field
				$keyword = $_POST['keyword'];
				$k1 = $_POST['k1'];  
				$k2 = $_POST['k2']; 
				$k3 = $_POST['k3'];
				$k4 = $_POST['k4'];
				$k5 = $_POST['k5'];
				if (isset($_POST["strmatch"])) {
					$strmatch = $_POST["strmatch"];
				}
				if (empty($keyword) || empty($k1) || empty($k2) || empty($k3) || empty($k4) || empty($k5) || empty($strmatch)) {
					echo '<span style="color: red; font-weight : bold;">All fields must be filled!<br><br></span>';
				} else {
					//Parsing ke array
					$arrKeyword 	= explode(',', $keyword);
					$arrDinas1 		= explode(',', $k1);
					$arrDinas2 		= explode(',', $k2);
					$arrDinas3 		= explode(',', $k3);
					$arrDinas4 		= explode(',', $k4);
					$arrDinas5 		= explode(',', $k5);
			
					define('CONSUMER_KEY', 'kFvXUC5yb4yUfLrfsNCIBeQ8O');
					define('CONSUMER_SECRET', 'JnByOix11fWRycHvLyGmUchXedGOvj36G6HEWwfaLbSMTBdUCf');
					define('ACCESS_TOKEN', '147892105-aaY76sOxWZ2qImLti5VHcC95c7oF0OxtSxVuDcvn');
					define('ACCESS_TOKEN_SECRET', 'knvAs2QdGEDJGDxaz5Q4CMLzp57iUHIo7tPzx3JEeYHNS');

					$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
					$results = array();
					
					foreach( $arrKeyword as $key=>$kw ){
						$query = array("q" => $kw);
						$r = $connection->get('search/tweets', $query);
						$results = array_merge($results,$r->statuses);
					}
					
					//Buat nyoba nampilin, ga tau mau ditaro di mana
					foreach ($results as $key=>$result) {
						$prof_pic = $result->user->profile_image_url;
						$screen_name = "@".$result->user->screen_name;
						$name = $result->user->name;
						$text = $result->text;
						$date = strtotime($result->created_at);
						$now  = time();
						$L = convertToTime($now - $date);
						
						echo "
						<table class = \"tab\">
						<tr>
							<td rowspan=3><img src=\"$prof_pic\" /></td>
							<td>  $name <b> $screen_name</b></td>
						</tr>
						<tr>
							<td>  $text</td>
						<tr>
							<td>  $L</td>
						</table> <br>
						";
					}
				}
			}
		?>
	</body>
</html>