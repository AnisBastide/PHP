<!DOCTYPE html>
<html>
<head>
	<title>LaPoste</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<?php include ("header.php"); ?>

	<h2>La Poste</h2>

	<?php
		require "../autoform.php";
		require "../request.php";

		$form = new autoform();
		$req = new request('root','root','php', 'mysql','localhost');
		$form->getInputList("Expéditeur", "expeditor", $req->getColumns("contact", "lastname"));
		$form->getInputList("Destinataire", "dest", $req->getColumns("contact", "lastname"));



	?>

	<a href="template.php">Preview</a>






	<?php include ("footer.php"); ?>

</body>
</html>
