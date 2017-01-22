<!DOCTYPE html>
<html>
	<head>
		<title> Bandung Says! </title>
		<style>
			.container {
				padding: 20px 0;
				font-family: Arial;
			}
			.header {
				border: 1px;
			    color: black;
			    text-align: center;
			    font-size: 250%;
			    font-style: normal;
			}
			.tagline {
			    color: black;
			    text-align: center;
			    font-size: 130%;
			    font-style: normal;
			}
			.content {
				text-align: center;
			}

		</style>
	</head>

	<body>
		<div class = "container">
			<h1 class = "header"> BandungSays! </h1>
			<p class = "tagline"> "We hear what you're looking for!" </p>
			<br> <br>
		</div>

		<div class = "content">
			<form method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<div>
					Keyword : <input type = "text" name = "keyword" size = "20">
					<br> <br>
				</div>

				<div>
					Keyword Dinas PDAM: <input type = "text" name = "k1" size = "20">
					<br> <br>
				</div>

				<div>
					Keyword Dinas PJU: <input type = "text" name = "k2" size = "20">
					<br> <br>
				</div>

				<div>
					Keyword Dinas Sosial: <input type = "text" name = "k3" size = "20">
					<br> <br> <br>
				</div>

				<div>
					Choose your string matching type : <br>
					<input type="radio" name="strmatch" <?php if (isset($strmatch) && $strmatch=="bm") echo "checked";?>  value="bm"> Boyer-Moore <br>
   					<input type="radio" name="strmatch" <?php if (isset($strmatch) && $strmatch=="kmp") echo "checked";?>  value="kmp"> Knuth-Morris-Pratt <br><br>
					<input type = "submit" value = "Find!"> <br><br><br>
				</div>
			</form>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				     // collect value of input field
				    $keyword = $_POST['keyword'];
				    $k1 = $_POST['k1'];  
				    $k2 = $_POST['k2']; 
				    $k3 = $_POST['k3'];
				    if (isset($_POST["strmatch"])) {
				    	$strmatch = $_POST["strmatch"];
				    }
				    if (empty($keyword) || empty($k1) || empty($k2) || empty($k3) || empty($strmatch)) {
				        echo "All fields must be filled! <br> <br>";
				    } else {
				    	//Parsing ke array
				    	$arrKeyword = explode(',', $keyword);
				    	$arrDinas1 = explode(',', $k1);
				    	$arrDinas2 = explode(',', $k2);
				    	$arrDinas3 = explode(',', $k3);
				    	//Print isi Array
				    	foreach($arrKeyword as $my_Array){
						    echo $my_Array.'<br>';  
						}
						foreach($arrDinas1 as $my_Array1){
						    echo $my_Array1.'<br>';  
						}
						foreach($arrDinas2 as $my_Array2){
						    echo $my_Array2.'<br>';  
						}
						foreach($arrDinas3 as $my_Array3){
						    echo $my_Array3.'<br>';  
						}
						echo 'str<br>';
						echo $strmatch.'<br>';
				    }
				}
			?>
		</div>
        <div class = "content">
            <?php
                require "twitteroauth/autoload.php";

                use Abraham\TwitterOAuth\TwitterOAuth;

                define('CONSUMER_KEY', 'kFvXUC5yb4yUfLrfsNCIBeQ8O');
                define('CONSUMER_SECRET', 'JnByOix11fWRycHvLyGmUchXedGOvj36G6HEWwfaLbSMTBdUCf');
                define('ACCESS_TOKEN', '147892105-aaY76sOxWZ2qImLti5VHcC95c7oF0OxtSxVuDcvn');
                define('ACCESS_TOKEN_SECRET', 'knvAs2QdGEDJGDxaz5Q4CMLzp57iUHIo7tPzx3JEeYHNS');

                $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
                $query = array(
                 "q" => "#pemkotbdg"
                );
                
                $results = $connection->get('search/tweets', $query);
                
                //Buat nyoba nampilin, ga tau mau ditaro di mana
                foreach ($results->statuses as $result) {
                    echo $result->user->screen_name . ": " . $result->text . "<br>";
                }
            ?>
        </div>
		<div class = "content">
			<br>
			<?php
			 echo '<a href="Information.html">About Us</a>';
			?>
			<br> <br>
		</div>
	</body>
</html>