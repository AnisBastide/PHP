<!DOCTYPE html>
<html>
<head>
	<title>Exos</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<?php 
	include ("header.php");
	require "../dinosaure.php";
	require "../autoform.php";
	require "../request.php";
	require "../calcul.php";

	?>


	<div id="exos">
		<h1>
			Exos
		</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
		<form method="POST" action="#">
			<?php
				$form = new autoform;

				$form->getInputText("Nombre à calculer", "number");
				if (!empty($_POST)) {
					$fac = new calcul;
					$fac->facto($_POST["number"]);
				}

				$form->getInputSubmit("Valider");
				
			?>
			<?php
				$form2 = new autoform;

				$form2->getInputText("Nombre à transformer en binaire", "binary");
				if (!empty($_POST)) {
					$bin = new calcul;
					$bin->binary($_POST["binary"]);
				}

				$form2->getInputSubmit("Valider");
				
			?>
		</form>
		</p>
	</div>





	<?php include ("footer.php"); ?>

</body>
</html>
