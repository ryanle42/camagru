<?php
	include "config/auth.php";
	session_start();
	if (isset($_POST["submit"])) {
		if (auth($_POST["name"], $_POST["pass"])) {
			echo $_POST["name"] . " succesfully logged in <br/>";
			$_SESSION["loggued_on_user"] = $_POST["name"];
		}
		else {
			echo "<div style=\"border: 5px red; background: red;\"> Invalid email or password</div>";
		}
	}
?>

<html>

<head>
	<meta charset="UTF-8">
	<link type="text/css" rel="stylesheet" href="css/main.css" />
	<title>Camagru: Main page</title>
</head>

<body>
	Need to sanitize input
	<div id="title"><a href="./">Camagru</a></div>
	<br/>
	<form class="form" method="POST">
		Email:<br/>
		<input type="text" name="name" required><br/><br/>
		Password:<br/>
		<input type="password" name="pass" required><br/><br/>
		<input type="submit" name="submit" value="Submit">
	</form>	<div id="home-buttons">
		<a href="signup"><button>Sign Up</button></a>
	</div>
</body>

</html>