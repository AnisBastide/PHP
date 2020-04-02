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
//    var_dump($list);
    $lastName = $list["lastname"];
    $firstName = $list["firstname"];
    $userDate = $list["date"];
    $gender = $list["gender"];
    $mail = $list["mail"];
    $address = $list["address"];
    $form->getInputTextValue("lastName", "lastname", $lastName);
    $form->getInputTextValue("firstName", "firstName", $firstName);
    $form->getInputTextValue("date", "date", $userDate);
    $form->getInputTextValue("gender", "gender", $gender);
    $form->getInputTextValue("mail", "mail", $mail);
    $form->getInputTextValue("adress", "adress", $address);
    ?>
</form>
<?php include("footer.php"); ?>

</body>
</html>
