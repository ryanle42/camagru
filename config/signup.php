<?php
	include "database.php";
	function signup($email, $pass) {
		$dbh = db_connect();
		try {
			$stmt = $dbh->prepare("SELECT * 
						FROM accounts 
						WHERE email=:email");
			$stmt->execute(array("email" => $email)) 
						or die(print_r($stmt->errorInfo(), true));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($row) {
				echo "<div style=\"border: 5px red; background: red;\">";
				echo "That email is already taken</div><br/>";
			}
			else {
				$stmt = $dbh->prepare("INSERT INTO accounts (email, pass) 
					VALUES (:email, :pass)");
				$stmt->execute(array(
					"email" => $email,	
					"pass" => hash("sha256", $pass)	
					)) or die(print_r($stmt->errorInfo(), true));
				echo "successfully added " . $email . "<br/>";
				}
			}	
			catch(PDOException $pe) {
				echo ('SignUp Error: ' . $pe);
			}
	}
?>