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
		
		$stmt = $db->prepare("DELETE FROM statistiquesprincipales WHERE NOM_RACE = ?;");
		$stmt->bindParam(1, $breedtodelete);
		
		$breedtodelete = $_POST["breedtodelete"];
		$stmt->execute();
		
		$db = null;
		
		header('Location: ../index.php');  
	}
?>