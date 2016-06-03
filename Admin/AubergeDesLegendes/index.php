<?php session_start(); ?>
<!doctype html>
<html>
	<head>
		<title>Auberge des L&eacute;gendes</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="icon" type="image/png" href="icon.png" />
		<script src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<?php
	/**
	 * TODO : secure
	 */
	
	include("function/getdata.php");
	
	if(isset($_SESSION["username"]) && $_SESSION["username"] != "") {
		?>
			<div class="container">
				<h1>Bonjour <?php print($_SESSION["username"]); ?></h1>
				<div class="row">
					<div class="col-md-4">
						<h2>Races</h2>
					</div>
					<div class="col-md-4">
						<h2>Classes</h2>
					</div>
					<div class="col-md-4">
						<h2>Comp&eacute;tences</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h3>Créer une race</h3>
						<div class="sub">
							<form name="create-breed" method="post" action="function/createbreed.php">
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
								<button type="submit" class="btn btn-default">Cr&eacute;er</button>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<h3>Créer une classe</h3>
						<div class="sub">
							<form name="create-class" method="post" action="function/createclass.php">
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
									<label for="txtClassShield">Shield</label>
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
								<button type="submit" class="btn btn-default">Cr&eacute;er</button>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<h3>Créer une comp&eacute;tence</h3>
						<div class="sub">
							<form name="create-skill" method="post" action="function/createskill.php">
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
									<label for="txtSkillCost">Coût</label>
									<input type="text" class="form-control" id="txtSkillCost" name="skillcost" placeholder="Coût" required />
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
								<button type="submit" class="btn btn-default">Cr&eacute;er</button>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<h3>Supprimer une race</h3>
						<div class="sub">
							<form name="delete-breed" method="post" action="function/deletebreed.php">
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
								<button type="submit" class="btn btn-default">Supprimer</button>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<h3>Supprimer une classe</h3>
						<div class="sub">
							<form name="delete-class" method="post" action="function/deleteclass.php">
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
								<button type="submit" class="btn btn-default">Supprimer</button>
							</form>
						</div>
					</div>
					<div class="col-md-4">
						<h3>Supprimer une comp&eacute;tence</h3>
						<div class="sub">
							<form name="delete-skill" method="post" action="function/deleteskill.php">
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
								<button type="submit" class="btn btn-default">Supprimer</button>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<h2>Utilsateurs</h2>
					</div>
					<div class="col-md-6">
						<h2>Personnages</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<h3>Bannir un utilisateur</h3>
						<div class="sub">
							<form name="ban-character" method="post" action="function/banuser.php">
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
								<button type="submit" class="btn btn-default">Bannir</button>
							</form>
						</div>
					</div>
					<div class="col-md-3">
						<h3>Gracier un utilisateur</h3>
						<div class="sub">
							<form name="pardon-character" method="post" action="function/pardonuser.php">
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
								<button type="submit" class="btn btn-default">Gracier</button>
							</form>
						</div>
					</div>
					<div class="col-md-3">
						<h3>Créer un personnage</h3>
						<div class="sub">
							<form name="pardon-character" method="post" action="function/createcharacter.php">
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
								<button type="submit" class="btn btn-default">Cr&eacute;er</button>
							</form>
						</div>
					</div>
					<div class="col-md-3">
						<h3>Supprimer un personnage</h3>
						<div class="sub">
							<form name="pardon-character" method="post" action="function/deletecharacter.php">
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
								<button type="submit" class="btn btn-default">Supprimer</button>
							</form>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<a href="function/disconnection.php">D&eacute;connexion</a>
					</div>
				</div>
			</div>
		<?php
	} else {
		?>
		<div class="connection-form">
			<h3>Connexion</h3>
			<form name="connection" method="post" action="function/connection.php">
				<div class="form-group">
					<label for="txtEmail">Nom d'utilisateur</label>
					<input type="text" class="form-control" id="txtUsername" name="username" placeholder="Nom d'utilisateur">
				</div>
				<div class="form-group">
					<label for="txtPasword">Mot de passe</label>
					<input type="password" class="form-control" id="txtPassword" name="password" placeholder="Mot de passe">
				</div>
				<button type="submit" class="btn btn-default">Envoyer</button>
			</form>
		</div>
		<?php
	}
?>