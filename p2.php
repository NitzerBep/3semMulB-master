<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Guf Isboden</title>
<link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>

<?php require('menu.php'); ?>

	<h1>Page 2</h1>
	Indhold 2 indhold 2 indhold 2
	
	<hr>
	Dette kan alle se...




<?php
	if(empty($_SESSION['uid'])) {
		echo 'Not logged in!!!!';
	}
	else {
		echo 'Welcome to the content Dr. '.$_SESSION['username'].'<br>';
		echo 'Here be stuff for logged in users only....'.'<br>';
		
		echo "<img src='img/wofler1.jpg' alt='wofler foto' />.'<br>'";
		echo 'Kun 10 kr for dig, fordi du er logget ind :-p';
		
		
	}
?>
<br/>
           <form>
<input type="button" value="Logout" onclick="window.location.href='logout.php'" />
</form>
             <br/>



	<?php require('footer.php'); ?>

</body>
</html>