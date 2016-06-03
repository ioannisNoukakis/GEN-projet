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
		
		$stmt = $db->prepare("UPDATE utilisateur SET banni = 0 WHERE ID_UTILISATEUR = ?;");
		$stmt->bindParam(1, $usertopardon);
		
		$usertopardon = $_POST["usertopardon"];
		$stmt->execute();
		
		$db = null;
		
		header('Location: ../index.php');
	}
?>