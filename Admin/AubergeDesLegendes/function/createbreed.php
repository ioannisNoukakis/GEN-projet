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
		
		$stmt = $db->prepare("INSERT INTO statistiquesprincipales VALUES (?, ?, ?, ?, ?, ?);");
		$stmt->bindParam(1, $breedname);
		$stmt->bindParam(2, $breedstrength);
		$stmt->bindParam(3, $breedintelligence);
		$stmt->bindParam(4, $breedagility);
		$stmt->bindParam(5, $breedconstitution);
		$stmt->bindParam(6, $breedvigour);
		
		$breedname = $_POST["breedname"];
		$breedstrength = $_POST["breedstrength"];
		$breedintelligence = $_POST["breedintelligence"];
		$breedagility = $_POST["breedagility"];
		$breedconstitution = $_POST["breedconstitution"];
		$breedvigour = $_POST["breedvigour"];
		$stmt->execute();
		
		$db = null;
		
		header('Location: ../index.php');  
	}
?>