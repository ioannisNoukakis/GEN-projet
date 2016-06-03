<?php
	session_start();
	include("database.php");
	
	if(!isset($_SESSION["username"])) {
		?>
			<h2>Erreur</h2>
			<p>Vous n'&ecirc;tes pas connect&eacute;</p>
		<?php
	} else {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
		
		$stmt = $db->prepare("INSERT INTO competence VALUES (?, ?, ?, ?, ?, ?);");
		$stmt->bindParam(1, $skillname);
		$stmt->bindParam(2, $skillismain);
		$stmt->bindParam(3, $skillcost);
		$stmt->bindParam(4, $skillcooldown);
		$stmt->bindParam(5, $skilldamage);
		$stmt->bindParam(6, $skilldamagetype);
		
		$skillname = $_POST["skillname"];
		$skillismain = (isset($_POST["skillismain"]) ? 1 : 0);
		$skillcost = $_POST["skillcost"];
		$skillcooldown = $_POST["skillcooldown"];
		$skilldamage = $_POST["skilldamage"];
		$skilldamagetype = $_POST["skilldamagetype"];
		$stmt->execute();
		
		$db = null;
		
		header('Location: ../index.php');  
	}
?>