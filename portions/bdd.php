<!DOCTYPE html>
<html>
<head>
    <title>BDD</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php include("header.php"); ?>
<?php
include "../DB.php";
include "../autoform.php";
$form = new autoform();
?>


<form method="POST">
    <?php
    ini_set('display_errors', 1);
    $dbh = new request('root', 'root', 'php', 'mysql', 'localhost');
    $tab = $dbh->getColumns("firstname", "contact");
    $form->getInputList("name", "name", $tab);
    $form->getInputSubmit("submit");
    $list = $dbh->getWhere("contact", "firstname=" . "'" . $_POST["name"] . "'");
    $lastName = $list["lastname"];
    $firstName = $list["firstname"];
    $userDate = $list["date"];
    $gender = $list["gender"];
    $mail = $list["mail"];
    $address = $list["address"];
    $form->getInputTextValue("lastName", "lastName", $lastName);
    $form->getInputTextValue("firstName", "firstName", $firstName);
    $form->getInputTextValue("date", "date", $userDate);
    $form->getInputTextValue("gender", "gender", $gender);
    $form->getInputTextValue("mail", "mail", $mail);
    $form->getInputTextValue("address", "address", $address);
    $form->getInputSubmit("modify");
    if(!empty($_POST)){
        $dbh->update("contact","lastname",$_POST["lastName"],"firstname='" .$firstName ."'");
        $dbh->update("contact","firstname",$_POST["firstName"],"lastname='" .$lastName ."'");
        $dbh->update("contact","date",$_POST["date"],"firstname='" .$firstName ."'");
        $dbh->update("contact","gender",$_POST["gender"],"firstname='" .$firstName ."'");
        $dbh->update("contact","mail",$_POST["mail"],"firstname='" .$firstName ."'");
        $dbh->update("contact","address",$_POST["address"],"firstname='" .$firstName ."'");
    }
    ?>
</form>
<?php include("footer.php"); ?>

</body>
</html>
