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
		
		$stmt = $db->prepare("INSERT INTO statistiquessecondaires VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$stmt->bindParam(1, $classname);
		$stmt->bindParam(2, $classmelee);
		$stmt->bindParam(3, $classprojectile);
		$stmt->bindParam(4, $classshield);
		$stmt->bindParam(5, $classfire);
		$stmt->bindParam(6, $classice);
		$stmt->bindParam(7, $classdivine);
		$stmt->bindParam(8, $classdodge);
		$stmt->bindParam(9, $classtouch);
		$stmt->bindParam(10, $classspeed);
		$stmt->bindParam(11, $classresphysical);
		$stmt->bindParam(12, $classreselement);
		$stmt->bindParam(13, $classresdivine);
		
		$classname = $_POST["classname"];
		$classmelee = $_POST["classmelee"];
		$classprojectile = $_POST["classprojectile"];
		$classshield = $_POST["classshield"];
		$classfire = $_POST["classfire"];
		$classice = $_POST["classice"];
		$classdivine = $_POST["classdivine"];
		$classdodge = $_POST["classdodge"];
		$classtouch = $_POST["classtouch"];
		$classspeed = $_POST["classspeed"];
		$classresphysical = $_POST["classresphysical"];
		$classreselement = $_POST["classreselement"];
		$classresdivine = $_POST["classresdivine"];
		$stmt->execute();
		
		$db = null;
		
		header('Location: ../index.php');  
	}
?>