<!DOCTYPE html>
<html>
<head>
	<title>Preview</title>
	<link rel="stylesheet" href="templateStyle.css"/>
</head>

<body>
	<h1>Aperçu de la lettre</h1>
	<section id="lettre">
		<section id="prioAndCachet">
			<div id="cachet">
				<?php 
					if ($_POST["confidential"]=="Oui") {
						echo '<img class="logo" src="confidential.png" alt="Tampon confidentiel">';
					}
				?>	
			</div>
			<div id="priority">
				<?php
					if ($_POST["priority"]=="Oui") {
					 	echo '<img class="logo" src="timbreRouge.jpg" alt="timbre rouge">';
					 }
					else {
						echo '<img class="logo" src="timbreVert.jpg" alt="timbre vert">';
					}
				?>
			</div>
		</section>
		<div id="exped">
			<p><?php echo $_POST["lastnameExp"].' '.$_POST["firstnameExp"] ?></p>
			<p><?php echo $_POST["adressExp"]?></p>
			<p><?php echo $_POST["mailExp"]?></p>
		</div>
		<div id="dest">
			<p><?php echo $_POST["lastnameDest"].' '.$_POST["firstnameDest"] ?></p>
			<p><?php echo $_POST["adressDest"]?></p>
			<p><?php echo $_POST["mailDest"]?></p>
		</div>
        <p><?php
            echo $_POST["text"];
            ?></p>
	</section>
</body>
</html>