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
		<script src="Chart.js"></script>
	</head>
	
	<body>
		<?php
			$ratioNames = array();
			$ratioNum = array();
			
			$numPerso = array();
			$numSelect = array();
			
			$maxTours = array();
		
			$hpNoms = array();
			$hpNum = array();
		
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=aubergelegendesbdd;charset=utf8', 'root', '');
				
				$reponse1 = $bdd->query('SELECT nom, nombredeMatchGagne/nombredeMatchPerdu as ratio FROM personnage ORDER BY ratio DESC;');
				$reponse2 = $bdd->query('SELECT nom, nombreDeSelection FROM personnage ORDER BY nombreDeSelection DESC;');
				$reponse3 = $bdd->query('SELECT nombreDeTour FROM combat ORDER BY nombreDeTour DESC LIMIT 6;');
				$reponse4 = $bdd->query('SELECT nom, nbVictimes FROM hommepoireautue INNER JOIN personnage ON hommepoireautue.ID = personnage.ID_PERSONNAGE ORDER BY nbVictimes DESC;');

				// On affiche chaque entrée une à une
				while ($donnees = $reponse1->fetch()){
					array_push($ratioNames, $donnees['nom']);
					array_push($ratioNum, $donnees['ratio']);
				}
				
				while ($donnees = $reponse2->fetch()) {
					array_push($numPerso, $donnees['nom']);
					array_push($numSelect, $donnees['nombreDeSelection']);
				}
				
				while ($donnees = $reponse3->fetch()) {
					array_push($maxTours, $donnees['nombreDeTour']);
				}
				
				print_r($maxTours);
				
				while ($donnees = $reponse4->fetch()) {
					array_push($hpNoms, $donnees['nom']);
					array_push($hpNum, $donnees['nbVictimes']);
				}
			}
			catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
			
			// Check how to show values
			$show = (isset($_GET['pie']) ? 'pie' : 'bar');
		?>
	
		<div class="container">
			<div class="row">
				<div class="welcome">
					<h1>Statistiques</h1>
				</div>
				<div class="side">
					<label>Affichage : <a href="stats.php">Barres</a>&nbsp;/&nbsp;<a href="stats.php?pie">Camembert</a></label>
				</div>
				<div class="side">
					<a href="index.php">&larr; Retour</a>
				</div>
			</div>
			<div class="row subtitle">
				<div class="col-md-12">
					<h2>Quelques statistiques</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3>Ratio de victoire de chaque personnage</h3>
					<div class="sub chart">
						<canvas id="stat-winrate"></canvas>
						<script>
						var ctx = document.getElementById("stat-winrate");
						var myChart = new Chart(ctx, {
							type: '<?php echo $show ?>',
							data: {
								labels: <?php print_r(json_encode($ratioNames)); ?>,
								datasets: [{
									label: 'Best',
									data: <?php print_r(json_encode($ratioNum)); ?>,
									backgroundColor: [
										'rgba(255, 99, 132, 0.6)',
										'rgba(54, 162, 235, 0.6)',
										'rgba(255, 206, 86, 0.6)',
										'rgba(75, 192, 192, 0.6)',
										'rgba(153, 102, 255, 0.6)',
										'rgba(25, 159, 146, 0.6)',
										'rgba(57, 16, 135, 0.6)',
										'rgba(13, 129, 123, 0.6)'
									]
								}]
							},
							options: {
								maintainAspectRatio: false,
								scales: {
									yAxes: [{
										ticks: {
											min: 0,
											beginAtZero: true
										}
									}]
								}
							}
						});
						</script>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Personnage le plus utilis&eacute;</h3>
					<div class="sub chart">
						<canvas id="stat-prefered"></canvas>
						<script>
						var ctx = document.getElementById("stat-prefered");
						var myChart = new Chart(ctx, {
							type: '<?php echo $show ?>',
							data: {
								labels: <?php print_r(json_encode($numPerso)); ?>,
								datasets: [{
									label: 'Prefered',
									data: <?php print_r(json_encode($numSelect)); ?>,
									backgroundColor: [
										'rgba(255, 99, 132, 0.6)',
										'rgba(54, 162, 235, 0.6)',
										'rgba(255, 206, 86, 0.6)',
										'rgba(75, 192, 192, 0.6)',
										'rgba(153, 102, 255, 0.6)',
										'rgba(255, 159, 64, 0.6)'
									]
								}]
							},
							options: {
								maintainAspectRatio: false,
								scales: {
									yAxes: [{
										ticks: {
											min: 0,
											beginAtZero: true
										}
									}]
								}
							}
						});
						</script>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<h3>Combats les plus longs</h3>
					<div class="sub chart">
						<canvas id="stats-attack"></canvas>
						<script>
						var ctx = document.getElementById("stats-attack");
						var myChart = new Chart(ctx, {
							type: '<?php echo $show ?>',
							data: {
								labels: <?php print_r(json_encode($maxTours)); ?>,
								datasets: [{
									label: 'Longest',
									data: <?php print_r(json_encode($maxTours)); ?>,
									backgroundColor: [
										'rgba(255, 99, 132, 0.6)',
										'rgba(54, 162, 235, 0.6)',
										'rgba(255, 206, 86, 0.6)',
										'rgba(75, 192, 192, 0.6)',
										'rgba(153, 102, 255, 0.6)',
										'rgba(255, 159, 64, 0.6)'
									]
								}]
							},
							options: {
								maintainAspectRatio: false,
								scales: {
									yAxes: [{
										ticks: {
											min: 0,
											beginAtZero: true
										}
									}]
								}
							}
						});
						</script>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Nombre d'hommes-poireau tu&eacute;s</h3>
					<div class="sub chart">
						<canvas id="stats-leek"></canvas>
						<script>
						var ctx = document.getElementById("stats-leek");
						var myChart = new Chart(ctx, {
							type: '<?php echo $show ?>',
							data: {
								labels: <?php print_r(json_encode($hpNoms)); ?>,
								datasets: [{
									label: 'Most',
									data: <?php print_r(json_encode($hpNum)); ?>,
									backgroundColor: [
										'rgba(255, 99, 132, 0.6)',
										'rgba(54, 162, 235, 0.6)',
										'rgba(255, 206, 86, 0.6)',
										'rgba(75, 192, 192, 0.6)',
										'rgba(153, 102, 255, 0.6)',
										'rgba(255, 159, 64, 0.6)'
									]
								}]
							},
							options: {
								maintainAspectRatio: false,
								scales: {
									yAxes: [{
										ticks: {
											min: 0,
											beginAtZero: true
										}
									}]
								}
							}
						});
						</script>
					</div>
				</div>
			</div>
	</body>
</html>