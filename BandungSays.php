<!DOCTYPE html>
<html>
	<head>
		<title> Bandung Says! </title>
		<link rel="stylesheet" type="text/css" href="theme.css" />
	</head>

	<body class= "container">
		<div class= "header">
			<h1> Bandung<span>Says!</span></h1>
			<p> We hear what you're looking for </p>
		</div>

		<br>

		<div class = "content">
			<br><h2> What are you looking for? </h2> <br>
			<form method = "post" action="Result.php" id=form_input>
				<div style = "color : #ff704d; font-weight : bold;">
					Keyword : <input type = "text" name = "keyword" size = "20" class = "in">
					<br> <br>
				</div>

				<div>
					Keyword Dinas PDAM : <input type = "text" name = "k1" size = "28" class = "in">
					<br> <br>
				</div>

				<div>
					Keyword Dinas PJU : <input type = "text" name = "k2" size = "30" class = "in">
					<br> <br>
				</div>

				<div>
					Keyword Dinas Sosial : <input type = "text" name = "k3" size = "28" class = "in">
					<br> <br> 
				</div>

				<div>
					Keyword Dinas Kebersihan : <input type = "text" name = "k4" size = "23" class = "in">
					<br> <br> 
				</div>

				<div>
					Keyword Dinas BMP : <input type = "text" name = "k5" size = "30" class = "in">
					<br> <br> <br>
				</div>

				<div>
					<p style = "color : #ff704d; font-weight : bold;"> Choose your string matching type : <br> </p>
					<input type="radio" name="strmatch" checked  value="bm"> Boyer-Moore <br>
   					<input type="radio" name="strmatch"  value="kmp"> Knuth-Morris-Pratt <br><br><br>
					<input type = "submit" value = "FIND!" class = "sub"> <br><br><br>
				</div>
			</form>
		</div>
		<script src="jquery-1.12.3.js"></script>
		<script src="formChecker.js"></script>

		<br><br><br><br>

		<div class = "aboutus">
			<a href="Information.html"> About Us </a>
		</div>
		<br><br>
	</body>
</html>