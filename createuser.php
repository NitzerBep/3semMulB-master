<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Guf Isboden</title>
<link href="style.css" rel="stylesheet" type="text/css">

</head>

<body>
<?php
if (filter_input(INPUT_POST, 'submit')){
	
	$un = filter_input(INPUT_POST, 'un')
		or die('Missing/illegal un parameter');
	$pw = filter_input(INPUT_POST, 'pw')
		or die('Missing/illegal pw parameter');
	
	$pw = password_hash($pw, PASSWORD_DEFAULT);
	
	echo 'Creating user '.$un.' with password: '.$pw;
	
	require_once('dbcon.php');
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?, ?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $un, $pw);
	$stmt->execute();
	
	if ($stmt->affected_rows > 0){
		echo ' User '.$un.' added :-)';
	}
	else {
		echo 'Could not add the user... Please try with another username.';
	}

}
?>

<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Create user</legend>
    	<input name="un" type="text"     placeholder="Brugernavn" required /><br>
    	<input name="pw" type="password" placeholder="Password"   required /><br>
    	<input name="submit" type="submit" value="Opret bruger" />
	</fieldset>
</form>

<br/>
           <form>
<input type="button" value="Gå til login" onclick="window.location.href='login.php'" />
</form>
             <br/>
</p>
</body>
</html>