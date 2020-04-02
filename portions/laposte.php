<!DOCTYPE html>
<html>
<head>
	<title>LaPoste</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<?php 
		include ("header.php");
		require "../autoform.php";
		require "../request.php";

	?>

	<h2>La Poste</h2>

	<form method="POST" action="template.php" target="_BLANK">
		<?php

		$form = new autoform();
		$req = new request('root','root','php', 'mysql','localhost');

		?>
		<h4>Expéditeur : </h4>
		<?php
		$form->getInputText('Nom', 'lastnameExp');
		$form->getInputText('Prénom', 'firstnameExp');
		$form->getInputText('Adresse', 'adressExp');
		$form->getInputText('Adresse mail', 'mailExp');
		// $form->getInputList("Expéditeur", "expeditor", $req->getColumns("contact", "lastname"));
		// $form->getInputList("Destinataire", "dest", $req->getColumns("contact", "lastname"));
		?>
		<h4>Destinataire : </h4>
		<?php
		$form->getInputText('Nom', 'lastnameDest');
		$form->getInputText('Prénom', 'firstnameDest');
		$form->getInputText('Adresse', 'adressDest');
		$form->getInputText('Adresse mail', 'mailDest');

		$form->getInputRadio("Envoi prioritaire", "priority", ["Oui", "Non"]);
		$form->getInputRadio("Envoi confidentiel", "confidential", ["Oui", "Non"]);
		$form->getInputTextArea("text","text");
		$form->getInputSubmit("Valider");
		?>
	</form>
	<?php include ("footer.php"); ?>

</body>
</html>
