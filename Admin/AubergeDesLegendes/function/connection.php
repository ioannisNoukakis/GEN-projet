<?php
	session_start();
	include("database.php");
	
	if(isset($_SESSION["username"]) && $_SESSION["username"] != "") {
		?>
			<h2>Erreur</h2>
			<p>Vous &ecirc;tes d&eacute;j&agrave; connect&eacute;</p>
		<?php
	} else {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
		
		$stmt = $db->prepare("SELECT pseudonyme FROM utilisateur WHERE pseudonyme = ? AND motDePasse = ?;");
		$stmt->bindParam(1, $username);
		$stmt->bindParam(2, $password);
		
		$username = $_POST["username"];
		$password = $_POST["password"]; // TO SHA1
		$stmt->execute();
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$db = null;
		
		if(count($result) == 1){
			$_SESSION["username"] = $username;
		} else {
			unset($_SESSION["username"]);
		}
		
		header('Location: ../index.php');  
	}
?>