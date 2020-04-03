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
		require "../DB.php";

	?>

	<h2>La Poste</h2>

    <form method="post">
    <h4>US16</h4>
		<?php
        ini_set('display_errors', 1);
        $form = new autoform();
        $dbh = new request('root', 'root', 'php', 'mysql', 'localhost');
        $tab = $dbh->getColumns("firstname", "contact");
        $form->getInputList("expName", "expName", $tab);
        $form->getInputList("destName", "destName", $tab);
        $form->getInputSubmit("submit");

        echo '</form>';
        echo '<form method"post" action="templateDynamique.php" target="_BLANK">';
        if(!empty($_POST)){
            $list = $dbh->getWhere("contact", "firstname=" . "'" . $_POST["expName"] . "'");
        }
        if(!empty($list)){
            $lastName = $list["lastname"];
            $firstName = $list["firstname"];
            $userDate = $list["date"];
            $gender = $list["gender"];
            $mail = $list["mail"];
            $address = $list["address"];
            $form->getInputTextValue("lastName", "lastnameExp", $lastName);
            $form->getInputTextValue("firstName", "firstnameExp", $firstName);
            $form->getInputTextValue("date", "dateExp", $userDate);
            $form->getInputTextValue("gender", "genderExp", $gender);
            $form->getInputTextValue("mail", "mailExp", $mail);
            $form->getInputTextValue("address", "addressExp", $address);
        }
        if(!empty($_POST)){
            $list = $dbh->getWhere("contact", "firstname=" . "'" . $_POST["destName"] . "'");
        }
        if(!empty($list)){
            $lastName = $list["lastname"];
            $firstName = $list["firstname"];
            $userDate = $list["date"];
            $gender = $list["gender"];
            $mail = $list["mail"];
            $address = $list["address"];

            $form->getInputTextValue("lastName", "lastnameDest", $lastName);
            $form->getInputTextValue("firstName", "firstnameDest", $firstName);
            $form->getInputTextValue("date", "dateDest", $userDate);
            $form->getInputTextValue("gender", "genderDest", $gender);
            $form->getInputTextValue("mail", "mailDest", $mail);
            $form->getInputTextValue("address", "addressDest", $address);
            $form->getInputRadio("Envoi prioritaire", "priority", ["Oui", "Non"]);
            $form->getInputRadio("Envoi confidentiel", "confidential", ["Oui", "Non"]);
            $form->getInputTextArea("text","text");

            $form->getInputSubmit("valider");
            var_dump($_POST);

        }
		?>
    </form>
        <h4>US15</h4>
		<h4>Expéditeur : </h4>
    <form method="POST" action="template.php" target="_BLANK">
		<?php
		$form->getInputText('Nom', 'lastnameExp');
		$form->getInputText('Prénom', 'firstnameExp');
		$form->getInputText('Adresse', 'adressExp');
		$form->getInputText('Adresse mail', 'mailExp');
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
