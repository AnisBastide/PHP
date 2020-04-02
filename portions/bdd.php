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
    echo "</form>";
    echo "<form method=\"POST\">";
    $form->getInputTextValue("lastName", "lastName", $lastName);
    $form->getInputTextValue("firstName", "firstName", $firstName);
    $form->getInputTextValue("date", "date", $userDate);
    $form->getInputTextValue("gender", "gender", $gender);
    $form->getInputTextValue("mail", "mail", $mail);
    $form->getInputTextValue("address", "address", $address);
    $form->getInputSubmit("modify");
    if(!empty($_POST)){
        $dbh->update("contact","lastname",$_POST["lastName"],"id=" .$list['id']);
        $dbh->update("contact","firstname",$_POST["firstName"],"id=" .$list['id']);
        $dbh->update("contact","date",$_POST["date"],"id=" .$list['id']);
        $dbh->update("contact","gender",$_POST["gender"],"id=" .$list['id']);
        $dbh->update("contact","mail",$_POST["mail"],"id=" .$list['id']);
        $dbh->update("contact","address",$_POST["address"],"id=" .$list['id']);
    }
    ?>
</form>
<?php include("footer.php"); ?>

</body>
</html>
