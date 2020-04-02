<!DOCTYPE html>
<html>
<head>
	<title>BDD</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<?php include ("header.php"); ?>
    <?php
    include "../DB.php";
    include "../autoform.php";
    $form=new autoform();
    ?>

    <form method="POST">
    <?php
    $dbh = new request('root','root','php', 'mysql','localhost');
    $tab=$dbh->getColumns("firstname","contact");
    var_dump($tab);
    $form->getInputList("name","name",$tab);

    ?>
    </form>

	<?php include ("footer.php"); ?>

</body>
</html>
