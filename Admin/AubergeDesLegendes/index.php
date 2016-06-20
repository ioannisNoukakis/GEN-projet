<?php session_start(); ?>
<!doctype html>
<html>
	<head>
		<title>Auberge des L&eacute;gendes</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="icon" type="image/png" href="icon.png" />
		<script src="jquery-2.2.4.min.js"></script>
		<script src="bootstrap/js/bootstrap.js"></script>
		<meta charset="ISO-8859-1">
	</head>
	<body>
	<?php
	try {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
	
		if(!isset($_SESSION["username"])) {	
			$connectionError = "none";
			
			if(isset($_POST['adl-connection'])) {
				if(isset($_POST["username"]) && $_POST["username"] != "" && isset($_POST["password"]) && $_POST["password"] != "")
				{
					$stmt = $db->prepare("SELECT pseudonyme, motDePasse, sel FROM administrateur WHERE pseudonyme = ?;");
					$stmt->bindParam(1, $username);
					
					$username = htmlentities($_POST["username"], NULL, "ISO-8859-1");
					$stmt->execute();
					
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					
					// Create hash to compare
					$wholePass = hash('sha256', $result["sel"]."".$_POST["password"], false);
					
					// Compare "cooked" mdp and username with database ones
					if(isset($result["motDePasse"]) && $result["pseudonyme"] == $username && $result["motDePasse"] == $wholePass){
						$_SESSION["username"] = $username;
						header("Location: admin.php");
					} else {
						unset($_SESSION["username"]);
						$connectionError = "Mauvais couple utilisateur/mot de passe";
					}
				} else {
					$connectionError = "Erreur lors de connexion";
				}
			}
		} else {
			header("Location: admin.php");
		}
	?>
	<div class="container">
		<div class="row">
			<div class="welcome">
				<h1>L'Auberge des L&eacute;gendes</h1>
			</div>
			<div class="side">
				<a href="stats.php">Statistiques</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Connexion</h2>
			</div>
		</div>
		<div class="row">
			<div class="connection-form">
				<?php if($connectionError != "none"){ ?>
				<div class="alert alert-warning alert-dismissible" id="wrongPass">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php print($connectionError); ?>
				</div>
				<?php } ?>
				<h3>Connexion</h3>
				<form name="adl-connection" method="post" action="index.php">
					<div class="form-group">
						<label for="txtEmail">Nom d'utilisateur</label>
						<input type="text" class="form-control" maxlength="30" id="txtUsername" name="username" placeholder="Nom d'utilisateur">
					</div>
					<div class="form-group">
						<label for="txtPasword">Mot de passe</label>
						<input type="password" class="form-control" id="txtPassword" name="password" placeholder="Mot de passe">
					</div>
					<button type="submit" name="adl-connection" class="btn btn-default">Envoyer</button>
				</form>
			</div>
		</div>
	</div>
	<?php
	} catch (Exception $ex) {
		print("Erreur de connexion &agrave; la base de donn&eacute;es !");
	}
	?>
	</body>
</html>