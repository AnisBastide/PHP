<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="portions/style.css"/>
		<title>PHP</title>
	</head>
	<body>
			<?php include ("portions/header.php"); ?>

			<section>
				<article>
					<div id="exos">
						<h1>
							Exos
						</h1>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
					<div id="algo">
						<h1>
							Algo
						</h1>
						<p>
							<?php 
								require "dinosaure.php";
								require "autoform.php";
								/*$dino = new tyrex("555", "40", 4, "Méga Tyrex","m", "1", 4);
								$trex = new tyrex("333", "30", 3, "Mini Tyrex","m", "2", 2);

								echo "<p>Combat entre 2 tyrex</p>";
								while (true) {
									if ($dino->getLife()>0) {
										$dino->makeSeism("true", $trex);
									}
									else {
										echo "<p>".$dino->getName()." est mort</p>";
										break;
									}
									if ($trex->getLife()>0) {
										$trex->makeSeism("true", $dino);
									}
									else {
										echo "<p>".$trex->getName()." est mort</p>";
										break;
									}
									
								}
								$ptero = new pterodactyle (222, 35, 3,"Moyen ptéro", "f", "3m", 2);
								echo "<p>Combat entre 1 tyrex et 1 Ptero</p>";
								// Manque la condition pour savoir si le duel est possible : si dino aérien et l'autre terrestre, pas de combat ou alors une nouvelle attaque, propre à TOUS les dinos (exemple : vharge classique indéxée sur les damages)
								// j'essaierai de la faire demain matin 
								while (true) {
									if ($dino->getLife()>0) {
										$dino->makeSeism("true", $ptero);
									}
									else {
										echo "<p>".$dino->getName()." est mort</p>";
										break;
									}
									if ($ptero->getLife()>0) {
										$ptero->makeTornado("true", $dino);
									}
									else {
										echo "<p>".$ptero->getName()." est mort</p>";
										break;
									}
								}*/
							?>
							<form method="POST" action="#">
								<?php
									$form = new autoform;

									$form->getInputText("Nom", "name");

									$form->getInputRadio("Sexe","gender", ["M","F"]);

									$form->getInputList("Points de vie","life", ["20","30","50","100"]);

									$form->getInputPassword("Mot de passe", "password");

									$form->getInputDate("Date", "date");

									$form->getInputTextArea("Ecrivez du texte par ici", "textarea");

									$form->getInputSubmit("Valider");
								?>
								
							</form>
							
							<?php

								if (!empty($_POST)) {
									var_dump($_POST);
									//$length, $life, $damage, $name, $gender, $nbrArms, $sizeArms
									$toto = new tyrex("",$_POST["life"],"",$_POST["name"],$_POST["gender"],"","");
								}
								
							?>
						</p>
					</div>
					<div id="bdd">
						<h1>
							Base de données
						</h1>
						<p>
							Ma base de données
						</p>
					</div>
					<div id="laposte">
						<h1>
							La poste
						</h1>
						<p>
							Vive les facteurs
						</p>
					</div>

					
				</article>
			</section>
			<?php include ("portions/footer.php"); ?>
	</body>		
</html>