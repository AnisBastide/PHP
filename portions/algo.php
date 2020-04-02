<!DOCTYPE html>
<html>
<head>
	<title>Algo</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<?php include ("header.php"); ?>
    <div>
        <h3>US 12</h3>
    </div>
    <form method="POST" action="#">
        <?php
        require "../autoform.php";
        require "../DB.php";
        require "../displayContact(US13).php";
        $form = new autoform();
        /**
         * Enregistre dans la base de données les informations des input.
         */
        /*US12*/
        ini_set('display_errors', 1);
        $connect = new request("root", "root", "php", "mysql", "localhost");
        $form->getInputText("Nom", "lastname");
        $form->getInputText("Prenom", "firstname");
        $form->getInputDate("Date de naissance", "date");
        $form->getInputRadio("Sexe", "gender", array("H", "F"));
        $form->getInputText("Mail", "mail");
        $form->getInputText("Adresse", "address");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST)) {
            if (preg_match("/[aA0-zZ9]{3}\@[aA0-zZ9]{1,}\.[aA-zZ]/", $_POST["mail"])) {
                $connect->getInsert("contact", array("'" . $_POST["lastname"] . "'", "'" . $_POST["firstname"] . "'", "'" . $_POST["date"] . "'", "'" . $_POST["gender"] . "'", "'" . $_POST["mail"] . "'", "'" . $_POST["address"] . "'"));
            } else {
                echo "Invalid email";
            }
        }
        ?>
    </form>
    <div>
        <h3>US 13</h3>
    </div>
    <form method="POST">
        <?php
        ini_set('display_errors', 1);
        $display = new displayContact();
        $rslt = $connect->getRows("contact", array("lastname", "firstname", "date", "gender", "mail", "address"), "", "");
        $display->display($rslt);
        ?>
    </form>

	<?php include ("footer.php"); ?>

</body>
</html>
