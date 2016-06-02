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
		
		$stmt = $db->prepare("INSERT INTO personnage (nom, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4) VALUES (?, ?, ?, ?, ?, ?, ?);");
		$stmt->bindParam(1, $charactername);
		$stmt->bindParam(2, $characterrace);
		$stmt->bindParam(3, $characterclass);
		$stmt->bindParam(4, $characterskill1);
		$stmt->bindParam(5, $characterskill2);
		$stmt->bindParam(6, $characterskill3);
		$stmt->bindParam(7, $characterskill4);
		
		$charactername = $_POST["charactername"];
		$characterrace = $_POST["characterrace"];
		$characterclass = $_POST["characterclass"];
		$characterskill1 = $_POST["characterskill1"];
		$characterskill2 = $_POST["characterskill2"];
		$characterskill3 = $_POST["characterskill3"];
		$characterskill4 = $_POST["characterskill4"];
		
		$stmt->execute();
		
		$db = null;
		
		header('Location: ../index.php');  
	}
?>