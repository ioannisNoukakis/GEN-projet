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
		
		$stmt = $db->prepare("DELETE FROM personnage WHERE ID_PERSONNAGE = ?;");
		$stmt->bindParam(1, $charactertodelete);
		
		$charactertodelete = $_POST["charactertodelete"];
		$stmt->execute();
		
		$db = null;
		
		header('Location: ../index.php');
	}
?>