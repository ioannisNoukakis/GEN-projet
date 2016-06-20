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
		<meta charset="UTF-8">
	</head>
	<body>
	<?php
	include("function/getdata.php");
	
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
									if(($_POST["breedname"] != "") 
										&& is_numeric($_POST["breedstrength"]) 
										&& is_numeric($_POST["breedintelligence"]) 
										&& is_numeric($_POST["breedagility"]) 
										&& is_numeric($_POST["breedconstitution"]) 
										&& is_numeric($_POST["breedvigour"])) 
									{
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
									} else {
										$createBreedError = "Les donn&eacute;es ins&eacute;r&eacute;es sont invalides";
									}
								} else if(isset($_POST['adl-create-class'])) {
									if(($_POST["classname"] != "") 
										&& is_numeric($_POST["classmelee"]) 
										&& is_numeric($_POST["classprojectile"])
										&& is_numeric($_POST["classshield"]) 
										&& is_numeric($_POST["classfire"]) 
										&& is_numeric($_POST["classice"]) 
										&& is_numeric($_POST["classdivine"]) 
										&& is_numeric($_POST["classdodge"]) 
										&& is_numeric($_POST["classtouch"]) 
										&& is_numeric($_POST["classspeed"]) 
										&& is_numeric($_POST["classresphysical"]) 
										&& is_numeric($_POST["classreselement"]) 
										&& is_numeric($_POST["classresdivine"])) 
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
									} else {
										$createClassError = "Les donn&eacute;es ins&eacute;r&eacute;es sont invalides";
									}
								} else if(isset($_POST['adl-create-skill'])) {
									if(($_POST["skillname"] != "") 
										&& is_numeric($_POST["skillcost"]) 
										&& is_numeric($_POST["skillcooldown"]) 
										&& is_numeric($_POST["skilldamage"]) 
										&& is_numeric($_POST["skilldamagetype"])) 
									{
										$stmt = $db->prepare("INSERT INTO competence VALUES (?, ?, ?, ?, ?, ?);");
										$stmt->bindParam(1, $skillname);
										$stmt->bindParam(2, $skillismain);
										$stmt->bindParam(3, $skillcost);
										$stmt->bindParam(4, $skillcooldown);
										$stmt->bindParam(5, $skilldamage);
										$stmt->bindParam(6, $skilldamagetype);
										
										$skillname = $_POST["skillname"];
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
									if(isset($_POST["breedtodelete"]) 
										&& $_POST["breedtodelete"] != "")
									{
										$stmt = $db->prepare("DELETE FROM statistiquesprincipales WHERE NOM_RACE = ?;");
										$stmt->bindParam(1, $breedtodelete);
										
										$breedtodelete = $_POST["breedtodelete"];
										$stmt->execute();
									} else {
										$deleteBreedError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-delete-class'])) {
									if(isset($_POST["classtodelete"]) 
										&& $_POST["classtodelete"] != "")
									{
										$stmt = $db->prepare("DELETE FROM statistiquessecondaires WHERE NOM_CLASSE = ?;");
										$stmt->bindParam(1, $classtodelete);
										
										$classtodelete = $_POST["classtodelete"];
										$stmt->execute();
									} else {
										$deleteClassError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-delete-skill'])) {
									if(isset($_POST["skilltodelete"]) 
										&& $_POST["skilltodelete"] != "")
									{
										$stmt = $db->prepare("DELETE FROM competence WHERE NOM_COMPETENCE = ?;");
										$stmt->bindParam(1, $skilltodelete);
										
										$skilltodelete = $_POST["skilltodelete"];
										$stmt->execute();
									} else {
										$deleteSkillError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-ban-character'])) {
									if(isset($_POST["usertoban"]) 
										&& $_POST["usertoban"] != "")
									{
										$stmt = $db->prepare("UPDATE utilisateur SET banni = 1 WHERE ID_UTILISATEUR = ?;");
										$stmt->bindParam(1, $usertoban);
										
										$usertoban = $_POST["usertoban"];
										$stmt->execute();
									} else {
										$banUserError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-pardon-character'])) {
									if(isset($_POST["usertopardon"]) 
										&& $_POST["usertopardon"] != "")
									{
										$stmt = $db->prepare("UPDATE utilisateur SET banni = 0 WHERE ID_UTILISATEUR = ?;");
										$stmt->bindParam(1, $usertopardon);
										
										$usertopardon = $_POST["usertopardon"];
										$stmt->execute();
									} else {
										$pardonUserError = "Veuillez choisir un &eacute;l&eacute;ment &agrave; supprimer";
									}
								} else if(isset($_POST['adl-create-character'])) {
									if($_POST["charactername"] != "" 
										&& isset($_POST["characterrace"]) && $_POST["characterrace"] != "" 
										&& isset($_POST["characterclass"]) && $_POST["characterclass"] != ""
										&& isset($_POST["characterskill1"]) && $_POST["characterskill1"] != ""
										&& isset($_POST["characterskill2"]) && $_POST["characterskill2"] != ""
										&& isset($_POST["characterskill3"]) && $_POST["characterskill3"] != ""
										&& isset($_POST["characterskill4"]) && $_POST["characterskill4"] != "")
									{
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
										header("Refresh:0");
								}
								
								$db = null;
							?>
						</div>
						<div class="side">
							<form name="adl-disconnection" method="post" action="index.php">
								<button type="submit" name="adl-disconnection" class="btn btn-default">D&eacute;connexion</button>
							</form>
						</div>
						<div class="side">
							<a href="stats.php">Statistiques</a>
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
								<form name="adl-create-breed" method="post" action="index.php">
									<div class="form-group">
										<label for="txtBreedName">Nom de la race</label>
										<input type="text" class="form-control" id="txtBreedName" name="breedname" placeholder="Nom" required />
									</div>
									<div class="form-group">
										<label for="txtBreedStrength">Force</label>
										<input type="text" class="form-control" id="txtBreedStrength" name="breedstrength" placeholder="Force" required />
									</div>
									<div class="form-group">
										<label for="txtBreedIntelligence">Intelligence</label>
										<input type="text" class="form-control" id="txtBreedIntelligence" name="breedintelligence" placeholder="Intelligence" required />
									</div>
									<div class="form-group">
										<label for="txtBreedAgility">Agilit&eacute;</label>
										<input type="text" class="form-control" id="txtBreedAgility" name="breedagility" placeholder="Agilit&eacute;" required />
									</div>
									<div class="form-group">
										<label for="txtBreedConstitution">Constitution</label>
										<input type="text" class="form-control" id="txtBreedConstitution" name="breedconstitution" placeholder="Constitution" required />
									</div>
									<div class="form-group">
										<label for="txtBreedVigour">Vigueur</label>
										<input type="text" class="form-control" id="txtBreedVigour" name="breedvigour" placeholder="Vigueur" required />
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
								<form name="adl-create-class" method="post" action="index.php">
									<div class="form-group">
										<label for="txtClassName">Nom de la classe</label>
										<input type="text" class="form-control" id="txtClassName" name="classname" placeholder="Nom" required />
									</div>
									<div class="form-group">
										<label for="txtClassMelee">M&eacute;l&eacute;e</label>
										<input type="text" class="form-control" id="txtClassMelee" name="classmelee" placeholder="M&eacute;l&eacute;e" required />
									</div>
									<div class="form-group">
										<label for="txtClassProjectile">Projectile</label>
										<input type="text" class="form-control" id="txtClassProjectile" name="classprojectile" placeholder="Projectile" required />
									</div>
									<div class="form-group">
										<label for="txtClassShield">Bouclier</label>
										<input type="text" class="form-control" id="txtClassShield" name="classshield" placeholder="Bouclier" required />
									</div>
									<div class="form-group">
										<label for="txtClassFire">Feu</label>
										<input type="text" class="form-control" id="txtClassFire" name="classfire" placeholder="Feu" required />
									</div>
									<div class="form-group">
										<label for="txtClassIce">Glace</label>
										<input type="text" class="form-control" id="txtClassIce" name="classice" placeholder="Glace" required />
									</div>
									<div class="form-group">
										<label for="txtClassDivine">Divin</label>
										<input type="text" class="form-control" id="txtClassDivine" name="classdivine" placeholder="Divine" required />
									</div>
									<div class="form-group">
										<label for="txtClassDodge">Esquive</label>
										<input type="text" class="form-control" id="txtClassDodge" name="classdodge" placeholder="Esquive" required />
									</div>
									<div class="form-group">
										<label for="txtClassTouch">Touche</label>
										<input type="text" class="form-control" id="txtClassTouch" name="classtouch" placeholder="Touche" required />
									</div>
									<div class="form-group">
										<label for="txtClassSpeed">Vitesse</label>
										<input type="text" class="form-control" id="txtClassSpeed" name="classspeed" placeholder="Vitesse" required />
									</div>
									<div class="form-group">
										<label for="txtClassResPhysical">R&eacute;sistance physique</label>
										<input type="text" class="form-control" id="txtClassResPhysical" name="classresphysical" placeholder="R&eacute;sistance physique" required />
									</div>
									<div class="form-group">
										<label for="txtClassResElement">R&eacute;sistance &eacute;l&eacute;mentaire</label>
										<input type="text" class="form-control" id="txtClassResElement" name="classreselement" placeholder="R&eacute;sistance &eacute;l&eacute;mentaire" required />
									</div>
									<div class="form-group">
										<label for="txtClassResDivine">R&eacute;sistance divine</label>
										<input type="text" class="form-control" id="txtClassResDivine" name="classresdivine" placeholder="R&eacute;sistance divine" required />
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
								<form name="adl-create-skill" method="post" action="index.php">
									<div class="form-group">
										<label for="txtSkillName">Nom de la comp&eacute;tence</label>
										<input type="text" class="form-control" id="txtSkillName" name="skillname" placeholder="Nom" required />
									</div>
									<div class="form-group">
										<label>
											<input type="checkbox" name="skillismain" value="principale">
											Comp&eacute;tence principale ?
										</label>
									</div>
									<div class="form-group">
										<label for="txtSkillCost">Co&ucirc;t</label>
										<input type="text" class="form-control" id="txtSkillCost" name="skillcost" placeholder="Co&ucirc;t" required />
									</div>
									<div class="form-group">
										<label for="txtSkillCooldown">Cooldown</label>
										<input type="text" class="form-control" id="txtSkillCooldown" name="skillcooldown" placeholder="Cooldown" required />
									</div>
									<div class="form-group">
										<label for="txtSkillDamage">D&eacute;g&acirc;ts</label>
										<input type="text" class="form-control" id="txtSkillDamage" name="skilldamage" placeholder="D&eacute;g&acirc;ts" required />
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
								<form name="adl-delete-breed" method="post" action="index.php">
									<div class="form-group">
										<select name="breedtodelete" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$breeds = getBreedList();

												foreach($breeds as $key => $breed){
													$breed = htmlentities($breed, NULL, "ISO-8859-1");
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
								<form name="adl-delete-class" method="post" action="index.php">
									<div class="form-group">
										<select name="classtodelete" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$classes = getClassList();
												
												foreach($classes as $key => $class){
													$class = htmlentities($class, NULL, "ISO-8859-1");
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
								<form name="adl-delete-skill" method="post" action="index.php">
									<div class="form-group">	
										<select name="skilltodelete" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$skills = getSkillList();
												
												foreach($skills as $key => $skill){
													$skill = htmlentities($skill, NULL, "ISO-8859-1");
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
								<form name="adl-ban-character" method="post" action="index.php">
									<div class="form-group">
										<select name="usertoban" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$users = getUsers();
												
												foreach($users as $key => $user){
													$user = htmlentities($user, NULL, "ISO-8859-1");
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
								<form name="adl-pardon-character" method="post" action="index.php">
									<div class="form-group">
										<select name="usertopardon" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$banned = getBannedUsers();
												
												foreach($banned as $key => $ban){
													$ban = htmlentities($ban, NULL, "ISO-8859-1");
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
								<form name="adl-create-character" method="post" action="index.php">
									<div class="form-group">
										<label for="txtCharacterName">Nom du personnage</label>
										<input type="text" class="form-control" id="txtCharacterName" name="charactername" placeholder="Nom" required />
									</div>
									<div class="form-group">
										<label>Race</label>
										<select name="characterrace" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$breeds = getBreedList();

												foreach($breeds as $key => $breed){
													$breed = htmlentities($breed, NULL, "ISO-8859-1");
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
													$class = htmlentities($class, NULL, "ISO-8859-1");
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
													$skill = htmlentities($skill, NULL, "ISO-8859-1");
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
													$skill = htmlentities($skill, NULL, "ISO-8859-1");
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
													$skill = htmlentities($skill, NULL, "ISO-8859-1");
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
													$skill = htmlentities($skill, NULL, "ISO-8859-1");
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
								<form name="adl-delete-character" method="post" action="index.php">
									<div class="form-group">	
										<select name="charactertodelete" class="form-control" required>
											<option value="" disabled selected hidden>Choisissez...</option>
											<?php 
												$banned = getCharacters();
												
												foreach($banned as $key => $ban){
													$ban = htmlentities($ban, NULL, "ISO-8859-1");
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
			$connectionError = "none";
			
			// CHECK, NO FULLY GOOD... (DISCONNECTION EITHER)
			if(isset($_POST['adl-connection'])) {
				if(isset($_POST["username"]) && $_POST["username"] != "" && isset($_POST["password"]) && $_POST["password"] != "")
				{
					$stmt = $db->prepare("SELECT pseudonyme FROM administrateur WHERE pseudonyme = ? AND motDePasse = ?;");
					$stmt->bindParam(1, $username);
					$stmt->bindParam(2, $password);
					
					$username = $_POST["username"];
					$password = hash('sha256', $_POST["password"], false); // false = out is hexa
					$stmt->execute();
					
					$result = $stmt->fetch(PDO::FETCH_ASSOC);
					
					if(isset($result["pseudonyme"]) && $result["pseudonyme"] == $username){
						$_SESSION["username"] = $username;
						header("Refresh:0");
					} else {
						unset($_SESSION["username"]);
						$connectionError = "Mauvais couple utilisateur/mot de passe";
					}
				} else {
					$connectionError = "Erreur lors de connexion";
				}
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
								<input type="text" class="form-control" id="txtUsername" name="username" placeholder="Nom d'utilisateur">
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
		}
		
		$db = null;
	} catch(Exception $ex){
		print("Erreur de connexion &agrave; la base de donn&eacute;es !");
	}
	?>
	</body>
</html>