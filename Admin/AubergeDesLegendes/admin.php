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
	include("getdata.inc.php");
	
	try {
		$db = new PDO("mysql:host=localhost;dbname=AubergeLegendesBdd", "root", "");
	
		if(isset($_SESSION["username"]) && $_SESSION["username"] != "") {
			// Error vars
			$createBreedError     = "none";
			$createClassError     = "none";
			$createSkillError     = "none";
			$deleteBreedError     = "none";
			$deleteClassError     = "none";
			$deleteSkillError     = "none";
			$banUserError         = "none";
			$pardonUserError      = "none";
			$createCharacterError = "none";
			$deleteCharacterError = "none";
			?>
				<div class="container">
					<div class="row">
						<div class="welcome">
							<h1>Bonjour <?php print($_SESSION["username"]); ?></h1>
							<?php
								if(isset($_POST['adl-create-breed'])) {
									if(($_POST["breedname"] != "") 				&& strlen($_POST["breedname"]) <= 30 	
										&& isset($_POST["breedstrength"]) 		&& strlen($_POST["breedstrength"]) <= 2 		&& is_numeric($_POST["breedstrength"]) 
										&& isset($_POST["breedintelligence"]) 	&& strlen($_POST["breedintelligence"]) <= 2 	&& is_numeric($_POST["breedintelligence"]) 
										&& isset($_POST["breedagility"]) 		&& strlen($_POST["breedagility"]) <= 2			&& is_numeric($_POST["breedagility"]) 
										&& isset($_POST["breedconstitution"]) 	&& strlen($_POST["breedconstitution"]) <= 2 	&& is_numeric($_POST["breedconstitution"]) 
										&& isset($_POST["breedvigour"]) 		&& strlen($_POST["breedvigour"]) <= 2 			&& is_numeric($_POST["breedvigour"])) 
									{
										$stmt = $db->prepare("INSERT INTO statistiquesprincipales VALUES (?, ?, ?, ?, ?, ?);");
										$stmt->bindParam(1, $breedname);
										$stmt->bindParam(2, $breedstrength);
										$stmt->bindParam(3, $breedintelligence);
										$stmt->bindParam(4, $breedagility);
										$stmt->bindParam(5, $breedconstitution);
										$stmt->bindParam(6, $breedvigour);
										
										$breedname = htmlentities($_POST["breedname"], NULL, "ISO-8859-1");
										$breedstrength = $_POST["breedstrength"];
										$breedintelligence = $_POST["breedintelligence"];
										$breedagility = $_POST["breedagility"];
										$breedconstitution = $_POST["breedconstitution"];
										$breedvigour = $_POST["breedvigour"];
										$stmt->execute();
									} else {
										$createBreedError = "Les donn&eacute;es ins&eacute;r&eacute;es sont invalides";
									}
								} else if(isset($_POST['adl-create-class'])) {
									if(($_POST["classname"] != "") 				&& strlen($_POST["classname"]) <= 30
										&& isset($_POST["classmelee"]) 			&& strlen($_POST["classmelee"]) <= 2 		&& is_numeric($_POST["classmelee"]) 
										&& isset($_POST["classprojectile"]) 	&& strlen($_POST["classprojectile"]) <= 2 	&& is_numeric($_POST["classprojectile"])
										&& isset($_POST["classshield"]) 		&& strlen($_POST["classshield"]) <= 2 		&& is_numeric($_POST["classshield"]) 
										&& isset($_POST["classfire"]) 			&& strlen($_POST["classfire"]) <= 2 		&& is_numeric($_POST["classfire"]) 
										&& isset($_POST["classice"]) 			&& strlen($_POST["classice"]) <= 2 			&& is_numeric($_POST["classice"]) 
										&& isset($_POST["classdivine"]) 		&& strlen($_POST["classdivine"]) <= 2 		&& is_numeric($_POST["classdivine"])
										&& isset($_POST["classdodge"]) 			&& strlen($_POST["classdodge"]) <= 2 		&& is_numeric($_POST["classdodge"]) 
										&& isset($_POST["classtouch"]) 			&& strlen($_POST["classtouch"]) <= 2 		&& is_numeric($_POST["classtouch"]) 
										&& isset($_POST["classspeed"]) 			&& strlen($_POST["classspeed"]) <= 2 		&& is_numeric($_POST["classspeed"]) 
										&& isset($_POST["classresphysical"]) 	&& strlen($_POST["classresphysical"]) <= 2 	&& is_numeric($_POST["classresphysical"]) 
										&& isset($_POST["classreselement"]) 	&& strlen($_POST["classreselement"]) <= 2 	&& is_numeric($_POST["classreselement"]) 
										&& isset($_POST["classresdivine"]) 		&& strlen($_POST["classresdivine"]) <= 2 	&& is_numeric($_POST["classresdivine"])) 
									{
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
										
										$classname = htmlentities($_POST["classname"], NULL, "ISO-8859-1");
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
									} else {
										$createClassError = "Les donn&eacute;es ins&eacute;r&eacute;es sont invalides";
									}
								} else if(isset($_POST['adl-create-skill'])) {
									if(($_POST["skillname"] != "") 				&& strlen($_POST["skillname"]) <= 30
										&& isset($_POST["skillcost"]) 			&& strlen($_POST["skillcost"]) <= 2 		&& is_numeric($_POST["skillcost"]) 
										&& isset($_POST["skillcooldown"]) 		&& strlen($_POST["skillcooldown"]) <= 2 	&& is_numeric($_POST["skillcooldown"]) 
										&& isset($_POST["skilldamage"]) 		&& strlen($_POST["skilldamage"]) <= 2 		&& is_numeric($_POST["skilldamage"]) 
										&& isset($_POST["skilldamagetype"]) 	&& strlen($_POST["skilldamagetype"]) <= 2 	&& is_numeric($_POST["skilldamagetype"])) 
									{
										$stmt = $db->prepare("INSERT INTO competence VALUES (?, ?, ?, ?, ?, ?);");
										$stmt->bindParam(1, $skillname);
										$stmt->bindParam(2, $skillismain);
										$stmt->bindParam(3, $skillcost);
										$stmt->bindParam(4, $skillcooldown);
										$stmt->bindParam(5, $skilldamage);
										$stmt->bindParam(6, $skilldamagetype);
										
										$skillname = htmlentities($_POST["skillname"], NULL, "ISO-8859-1");
										$skillismain = (isset($_POST["skillismain"]) ? 1 : 0);
										$skillcost = $_POST["skillcost"];
										$skillcooldown = $_POST["skillcooldown"];
										$skilldamage = $_POST["skilldamage"];
										$skilldamagetype = $_POST["skilldamagetype"];
										$stmt->execute();
									} else {
										$createSkillError = "Les donn&eacute;es ins&eacute;r&eacute;es sont invalides";
									}
								} else if(isset($_POST['adl-delete-breed'])) {
									if(isset($_POST["breedtodelete"]) && $_POST["breedtodelete"] != "")
									{
										$stmt = $db->prepare("DELETE FROM statistiquesprincipales WHERE NOM_RACE = ?;");
										$stmt->bindParam(1, $breedtodelete);
										
										$breedtodelete = $_POST["breedtodelete"];
										$stmt->execute();
									} else {
										$deleteBreedError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-delete-class'])) {
									if(isset($_POST["classtodelete"]) && $_POST["classtodelete"] != "")
									{
										$stmt = $db->prepare("DELETE FROM statistiquessecondaires WHERE NOM_CLASSE = ?;");
										$stmt->bindParam(1, $classtodelete);
										
										$classtodelete = $_POST["classtodelete"];
										$stmt->execute();
									} else {
										$deleteClassError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-delete-skill'])) {
									if(isset($_POST["skilltodelete"]) && $_POST["skilltodelete"] != "")
									{
										$stmt = $db->prepare("DELETE FROM competence WHERE NOM_COMPETENCE = ?;");
										$stmt->bindParam(1, $skilltodelete);
										
										$skilltodelete = $_POST["skilltodelete"];
										$stmt->execute();
									} else {
										$deleteSkillError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-ban-character'])) {
									if(isset($_POST["usertoban"]) && $_POST["usertoban"] != "")
									{
										$stmt = $db->prepare("UPDATE utilisateur SET banni = 1 WHERE ID_UTILISATEUR = ?;");
										$stmt->bindParam(1, $usertoban);
										
										$usertoban = $_POST["usertoban"];
										$stmt->execute();
									} else {
										$banUserError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-pardon-character'])) {
									if(isset($_POST["usertopardon"]) && $_POST["usertopardon"] != "")
									{
										$stmt = $db->prepare("UPDATE utilisateur SET banni = 0 WHERE ID_UTILISATEUR = ?;");
										$stmt->bindParam(1, $usertopardon);
										
										$usertopardon = $_POST["usertopardon"];
										$stmt->execute();
									} else {
										$pardonUserError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-create-character'])) {
									if($_POST["charactername"] != "" 			&& strlen($_POST["skillname"]) <= 30
										&& isset($_POST["characterrace"]) 		&& $_POST["characterrace"] != "" 
										&& isset($_POST["characterclass"]) 		&& $_POST["characterclass"] != ""
										&& isset($_POST["characterskill1"]) 	&& $_POST["characterskill1"] != ""
										&& isset($_POST["characterskill2"]) 	&& $_POST["characterskill2"] != ""
										&& isset($_POST["characterskill3"]) 	&& $_POST["characterskill3"] != ""
										&& isset($_POST["characterskill4"]) 	&& $_POST["characterskill4"] != "")
									{
										$stmt = $db->prepare("INSERT INTO personnage (nom, NOM_RACE, NOM_CLASSE, NOM_COMPETENCE1, NOM_COMPETENCE2, NOM_COMPETENCE3, NOM_COMPETENCE4) VALUES (?, ?, ?, ?, ?, ?, ?);");
										$stmt->bindParam(1, $charactername);
										$stmt->bindParam(2, $characterrace);
										$stmt->bindParam(3, $characterclass);
										$stmt->bindParam(4, $characterskill1);
										$stmt->bindParam(5, $characterskill2);
										$stmt->bindParam(6, $characterskill3);
										$stmt->bindParam(7, $characterskill4);
										
										$charactername = htmlentities($_POST["charactername"], NULL, "ISO-8859-1");
										$characterrace = $_POST["characterrace"];
										$characterclass = $_POST["characterclass"];
										$characterskill1 = $_POST["characterskill1"];
										$characterskill2 = $_POST["characterskill2"];
										$characterskill3 = $_POST["characterskill3"];
										$characterskill4 = $_POST["characterskill4"];
										
										$stmt->execute();
									} else {
										$createCharacterError = "Les donn&eacute;es ins&eacute;r&eacute;es sont invalides";
									}
								} else if(isset($_POST['adl-delete-character'])) {
									if(isset($_POST["charactertodelete"]) && $_POST["charactertodelete"] == ""){
										$stmt = $db->prepare("DELETE FROM personnage WHERE ID_PERSONNAGE = ?;");
										$stmt->bindParam(1, $charactertodelete);
										
										$charactertodelete = $_POST["charactertodelete"];
										$stmt->execute();
									} else {
										$deleteCharacterError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-disconnection'])) {
									unset($_SESSION["username"]);
									header("Location: index.php");
								}
								
								$db = null;
							?>
						</div>
						<div class="side">
							<form name="adl-disconnection" method="post" action="admin.php">
								<button type="submit" name="adl-disconnection" class="btn btn-danger">D&eacute;connexion</button>
							</form>
						</div>
						<div class="side">
							<a href="stats.php"><button type="submit" name="adl-stats" class="btn btn-success">Statistiques</button></a>
						</div>
					</div>
					<div class="row subtitle">
						<div class="col-md-12">
							<h2>Races, classes &amp; comp&eacute;tences</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<h3>Cr&eacute;er une race</h3>
							<?php
								if($createBreedError != "none"){
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($createBreedError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub add">
								<form name="adl-create-breed" method="post" action="admin.php">
									<div class="form-group">
										<label for="txtBreedName">Nom de la race (max. 30 caract&egrave;res)</label>
										<input type="text" class="form-control" maxlength="30" id="txtBreedName" name="breedname" placeholder="Nom" required />
									</div>
									<div class="form-group">
										<label for="txtBreedStrength">Force</label>
										<input type="text" class="form-control" maxlength="2" id="txtBreedStrength" name="breedstrength" placeholder="Force" required />
									</div>
									<div class="form-group">
										<label for="txtBreedIntelligence">Intelligence</label>
										<input type="text" class="form-control" maxlength="2" id="txtBreedIntelligence" name="breedintelligence" placeholder="Intelligence" required />
									</div>
									<div class="form-group">
										<label for="txtBreedAgility">Agilit&eacute;</label>
										<input type="text" class="form-control" maxlength="2" id="txtBreedAgility" name="breedagility" placeholder="Agilit&eacute;" required />
									</div>
									<div class="form-group">
										<label for="txtBreedConstitution">Constitution</label>
										<input type="text" class="form-control" maxlength="2" id="txtBreedConstitution" name="breedconstitution" placeholder="Constitution" required />
									</div>
									<div class="form-group">
										<label for="txtBreedVigour">Vigueur</label>
										<input type="text" class="form-control" maxlength="2" id="txtBreedVigour" name="breedvigour" placeholder="Vigueur" required />
									</div>
									<button type="submit" name="adl-create-breed" class="btn btn-default">Cr&eacute;er</button>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<h3>Cr&eacute;er une classe</h3>
							<?php
								if($createClassError != "none") {
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($createClassError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub add">
								<form name="adl-create-class" method="post" action="admin.php">
									<div class="form-group">
										<label for="txtClassName">Nom de la classe (max. 30 caract&egrave;res)</label>
										<input type="text" class="form-control" maxlength="30" id="txtClassName" name="classname" placeholder="Nom" required />
									</div>
									<div class="form-group">
										<label for="txtClassMelee">M&eacute;l&eacute;e</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassMelee" name="classmelee" placeholder="M&eacute;l&eacute;e" required />
									</div>
									<div class="form-group">
										<label for="txtClassProjectile">Projectile</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassProjectile" name="classprojectile" placeholder="Projectile" required />
									</div>
									<div class="form-group">
										<label for="txtClassShield">Bouclier</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassShield" name="classshield" placeholder="Bouclier" required />
									</div>
									<div class="form-group">
										<label for="txtClassFire">Feu</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassFire" name="classfire" placeholder="Feu" required />
									</div>
									<div class="form-group">
										<label for="txtClassIce">Glace</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassIce" name="classice" placeholder="Glace" required />
									</div>
									<div class="form-group">
										<label for="txtClassDivine">Divin</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassDivine" name="classdivine" placeholder="Divine" required />
									</div>
									<div class="form-group">
										<label for="txtClassDodge">Esquive</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassDodge" name="classdodge" placeholder="Esquive" required />
									</div>
									<div class="form-group">
										<label for="txtClassTouch">Touche</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassTouch" name="classtouch" placeholder="Touche" required />
									</div>
									<div class="form-group">
										<label for="txtClassSpeed">Vitesse</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassSpeed" name="classspeed" placeholder="Vitesse" required />
									</div>
									<div class="form-group">
										<label for="txtClassResPhysical">R&eacute;sistance physique</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassResPhysical" name="classresphysical" placeholder="R&eacute;sistance physique" required />
									</div>
									<div class="form-group">
										<label for="txtClassResElement">R&eacute;sistance &eacute;l&eacute;mentaire</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassResElement" name="classreselement" placeholder="R&eacute;sistance &eacute;l&eacute;mentaire" required />
									</div>
									<div class="form-group">
										<label for="txtClassResDivine">R&eacute;sistance divine</label>
										<input type="text" class="form-control" maxlength="2" id="txtClassResDivine" name="classresdivine" placeholder="R&eacute;sistance divine" required />
									</div>
									<button type="submit" name="adl-create-class" class="btn btn-default">Cr&eacute;er</button>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<h3>Cr&eacute;er une comp&eacute;tence</h3>
							<?php
								if($createSkillError != "none") {
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($createSkillError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub add">
								<form name="adl-create-skill" method="post" action="admin.php">
									<div class="form-group">
										<label for="txtSkillName">Nom de la comp&eacute;tence (max. 30 caract&egrave;res)</label>
										<input type="text" class="form-control" maxlength="30" id="txtSkillName" name="skillname" placeholder="Nom" required />
									</div>
									<div class="form-group">
										<label>
											<input type="checkbox" name="skillismain" value="principale">
											Comp&eacute;tence principale ?
										</label>
									</div>
									<div class="form-group">
										<label for="txtSkillCost">Co&ucirc;t</label>
										<input type="text" class="form-control" maxlength="2" id="txtSkillCost" name="skillcost" placeholder="Co&ucirc;t" required />
									</div>
									<div class="form-group">
										<label for="txtSkillCooldown">Facteur de puissance</label>
										<input type="text" class="form-control" maxlength="2" id="txtSkillCooldown" name="skillcooldown" placeholder="Cooldown" required />
									</div>
									<div class="form-group">
										<label for="txtSkillDamage">D&eacute;g&acirc;ts</label>
										<input type="text" class="form-control" maxlength="2" id="txtSkillDamage" name="skilldamage" placeholder="D&eacute;g&acirc;ts" required />
									</div>
									<div class="form-group">
										<label for="txtSkillDamageType">Type de d&eacute;g&acirc;ts</label>
										<div class="radio">
										<label>
											<input type="radio" name="skilldamagetype" value="Melee" required checked />
											M&eacute;l&eacute;e
										</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="skilldamagetype" value="Projectile" required />
												Projectile
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="skilldamagetype" value="Bouclier" required />
												Bouclier
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="skilldamagetype" value="Feu" required />
												Feu
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="skilldamagetype" value="Glace" required />
												Glace
											</label>
										</div>
										<div class="radio">
											<label>
												<input type="radio" name="skilldamagetype" value="Divin" required />
												Divin
											</label>
										</div>
									</div>
									<button type="submit" name="adl-create-skill" class="btn btn-default">Cr&eacute;er</button>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<h3>Supprimer une race</h3>
							<?php
								if($deleteBreedError != "none"){
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($deleteBreedError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub small">
								<form name="adl-delete-breed" method="post" action="admin.php">
									<div class="form-group">
										<select name="breedtodelete" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$breeds = getBreedList();

												foreach($breeds as $key => $breed){
													echo "<option value=\"" . $breed . "\">" . $breed . "</option>";
												}
											?>
										</select>
									</div>
									<button type="submit" name="adl-delete-breed" class="btn btn-default">Supprimer</button>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<h3>Supprimer une classe</h3>
							<?php
								if($deleteClassError != "none"){
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($deleteClassError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub small">
								<form name="adl-delete-class" method="post" action="admin.php">
									<div class="form-group">
										<select name="classtodelete" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$classes = getClassList();
												
												foreach($classes as $key => $class){
													echo "<option value=\"" . $class . "\">" . $class . "</option>";
												}
											?>
										</select>
									</div>
									<button type="submit" name="adl-delete-class" class="btn btn-default">Supprimer</button>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<h3>Supprimer une comp&eacute;tence</h3>
							<?php
								if($deleteSkillError != "none"){
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($deleteSkillError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub small">
								<form name="adl-delete-skill" method="post" action="admin.php">
									<div class="form-group">	
										<select name="skilltodelete" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$skills = getSkillList();
												
												foreach($skills as $key => $skill){
													echo "<option value=\"" . $skill . "\">" . $skill . "</option>";
												}
											?>
										</select>
									</div>
									<button type="submit" name="adl-delete-skill" class="btn btn-default">Supprimer</button>
								</form>
							</div>
						</div>
					</div>
					<div class="row subtitle">
						<div class="col-md-12">
							<h2>Utilisateurs &amp; personnages</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<h3>Bannir un utilisateur</h3>
							<?php
								if($banUserError != "none"){
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($banUserError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub small">
								<form name="adl-ban-character" method="post" action="admin.php">
									<div class="form-group">
										<select name="usertoban" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$users = getUsers();
												
												foreach($users as $key => $user){
													echo "<option value=\"" . $key . "\">" . $user . "</option>";
												}
											?>
										</select>
									</div>
									<button type="submit" name="adl-ban-character" class="btn btn-default">Bannir</button>
								</form>
							</div>
							<h3>Gracier un utilisateur</h3>
							<?php
								if($pardonUserError != "none"){
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($pardonUserError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub small">
								<form name="adl-pardon-character" method="post" action="admin.php">
									<div class="form-group">
										<select name="usertopardon" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$banned = getBannedUsers();
												
												foreach($banned as $key => $ban){
													echo "<option value=\"" . $key . "\">" . $ban . "</option>";
												}
											?>
										</select>
									</div>
									<button type="submit" name="adl-pardon-character" class="btn btn-default">Gracier</button>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<h3>Cr&eacute;er un perso</h3>
							<?php
								if($createCharacterError != "none"){
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($createCharacterError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub perso">
								<form name="adl-create-character" method="post" action="admin.php">
									<div class="form-group">
										<label for="txtCharacterName">Nom du personnage (max. 30 caract&egrave;res)</label>
										<input type="text" class="form-control" maxlength="30" id="txtCharacterName" name="charactername" placeholder="Nom" required />
									</div>
									<div class="form-group">
										<label>Race</label>
										<select name="characterrace" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$breeds = getBreedList();

												foreach($breeds as $key => $breed){
													echo "<option value=\"" . $breed . "\">" . $breed . "</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Classe</label>
										<select name="characterclass" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$classes = getClassList();
												
												foreach($classes as $key => $class){
													echo "<option value=\"" . $class . "\">" . $class . "</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">	
										<label>Comp&eacute;tence 1</label>
										<select name="characterskill1" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$skills = getSkillList();
												
												foreach($skills as $key => $skill){
													echo "<option value=\"" . $skill . "\">" . $skill . "</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">	
										<label>Comp&eacute;tence 2</label>
										<select name="characterskill2" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$skills = getSkillList();
												
												foreach($skills as $key => $skill){
													echo "<option value=\"" . $skill . "\">" . $skill . "</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">	
										<label>Comp&eacute;tence 3</label>
										<select name="characterskill3" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$skills = getSkillList();
												
												foreach($skills as $key => $skill){
													echo "<option value=\"" . $skill . "\">" . $skill . "</option>";
												}
											?>
										</select>
									</div>
									<div class="form-group">	
										<label>Comp&eacute;tence 4</label>
										<select name="characterskill4" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$skills = getSkillList();
												
												foreach($skills as $key => $skill){
													echo "<option value=\"" . $skill . "\">" . $skill . "</option>";
												}
											?>
										</select>
									</div>
									<button type="submit" name="adl-create-character" class="btn btn-default">Cr&eacute;er</button>
								</form>
							</div>
						</div>
						<div class="col-md-4">
							<h3>Supprimer un perso</h3>
							<?php
								if($deleteCharacterError != "none") {
								?>
									<div class="alert alert-warning alert-dismissible" id="wrongPass">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<?php print($deleteCharacterError); ?>
									</div>
								<?php
								} 
							?>
							<div class="sub small">
								<form name="adl-delete-character" method="post" action="admin.php">
									<div class="form-group">	
										<select name="charactertodelete" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$banned = getCharacters();
												
												foreach($banned as $key => $ban){
													echo "<option value=\"" . $key . "\">" . $ban . "</option>";
												}
											?>
										</select>
									</div>
									<button type="submit" name="adl-delete-character" class="btn btn-default">Supprimer</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php
		} else {
			header("Location: index.php");
		}
		
		$db = null;
	} catch(Exception $ex){
		print("Erreur de connexion &agrave; la base de donn&eacute;es !");
	}
	?>
	</body>
</html>