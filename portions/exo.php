<!DOCTYPE html>
<html>
<head>
	<title>Exos</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<?php include ("header.php"); ?>

    <form method="POST" action="#">
        <?php
        ini_set('display_errors', 1);
        require "../autoform.php";
        require "../US4.php";
        $form = new autoform();
        $date = new US4();
        $form->getInputText("Seconde", "second");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST)){
            $date->countSecond($_POST["second"]);
        }
        ?>
    </form>








	<?php include ("footer.php"); ?>
</body>
</html>
