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
		
		$stmt = $db->prepare("SELECT pseudonyme FROM administrateur WHERE pseudonyme = ? AND motDePasse = ?;");
		$stmt->bindParam(1, $username);
		$stmt->bindParam(2, $password);
		
		$username = $_POST["username"];
		$password = hash('sha256', $_POST["password"], false); // false = out is hexa
		$stmt->execute();
		
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		$db = null;
		
		if(isset($result["pseudonyme"]) && $result["pseudonyme"] == $username){
			$_SESSION["username"] = $username;
			header('Location: ../index.php');
		} else {
			unset($_SESSION["username"]);
			header('Location: ../index.php?error');
		}
	}
?>