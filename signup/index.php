<?php
	include "../config/signup.php";
	session_start();
	if (isset($_POST["submit"])) {
		if ($_POST["email"] != $_POST["confirm"]) {
			echo "<div style=\"border: 5px red; background: red;\">";
			echo "Emails do not match</div><br/>";
		}
		else {
			signup($_POST["email"], $_POST["pass"]);
        }
	}
?>
<html>
<head>
	<meta charset="UTF-8">
	<link type="text/css" rel="stylesheet" href="../css/main.css" />
	<title>Sign Up</title>
</head>
<body>
	<a href="../">Home</a>
	<div id="title">Create an account</div>
	<br/>
	<form class="form" method="POST">
		Email<br/>
		<input type="text" name="email" required><br/>
		Re-enter email<br/>
		<input type="text" name="confirm" required><br/>
		Password<br/>
		<input type="password" name="pass" required><br/>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>