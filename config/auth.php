<?php
	include "database.php";
	function auth($email, $pass) {
		$dbh = db_connect();
		$stmt = $dbh->prepare("SELECT * FROM accounts WHERE email='$email'");
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($row['pass'] == hash("sha256", $pass)) {
				return true;
			}
		return false;
	}
?>