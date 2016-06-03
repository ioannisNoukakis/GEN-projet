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
		
		$stmt = $db->prepare("DELETE FROM competence WHERE NOM_COMPETENCE = ?;");
		$stmt->bindParam(1, $skilltodelete);
		
		$skilltodelete = $_POST["skilltodelete"];
		$stmt->execute();
		
		$db = null;
		
		header('Location: ../index.php');
	}
?>