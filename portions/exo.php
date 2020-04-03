<!DOCTYPE html>
<html>
<head>
    <title>Exos</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
include("header.php");
ini_set('display_errors', 1);
require "../autoform.php";
require "../date(US4).php";
require "../binary(US9).php";
require "../romanNumber(US6).php";
require "../factorial(US7).php";
require "../smallestNumber(US5).php";
require "../primeNumber(US3).php";
require "../sort(US11).php";
require "../DB.php";
require "../displayContact(US13).php";
require "../hexadecimal(US8).php";
?>
<div id="exos">
    <h1>
        Exos
    </h1>
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
        ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
        anim id est laborum.
    </p>
    <h3>US 3</h3>
    <form method="POST">
        <?php
        $form = new autoform();
        $form->getInputText("Trouver les nombres premiers avant", "primeNumber");
        $form->getInputSubmit("submit");
        ini_set('display_errors', 1);
        $primeNumber = new primeNumber();
        if (!empty($_POST["primeNumber"])) {
            $primeNumber->generatePrimeNumbers($_POST["primeNumber"]);
        }
        ?>
    </form>
    <h3>US 4</h3>
    <form method="POST" action="#">
        <?php
        $date = new date();
        $form->getInputText("Seconde", "second");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST["second"])) {
            $date->countSecond($_POST["second"]);
        }
        ?>
    </form>
    <h3>US 5</h3>
    <p>Trouver le plus petit nombre</p>
    <form method="post">
        <?php

        //            if (!empty($_POST)) {
        //                var_dump($_POST);
        //                //$length, $life, $damage, $name, $gender, $nbrArms, $sizeArms
        //                $toto = new tyrex("", $_POST["life"], "", $_POST["name"], $_POST["gender"], "", "");
        //            }
        $form->getInputText("Nombre 1", "firstNumber");
        $form->getInputText("Nombre 2", "secondNumber");
        $form->getInputText("Nombre 3", "thirdNumber");
        $form->getInputSubmit("valider");
        $smallestNumber = new smallestNumber();
        if (!empty($_POST["firstNumber"])) {
            if (!empty($_POST["secondNumber"])) {
                if (!empty($_POST["firstNumber"])) {
                    $smallestNumber->getSmallestNumber($_POST["firstNumber"], $_POST["secondNumber"], $_POST["thirdNumber"]);
                }
            }
        }
        ?>
    </form>
    <h3>US 6</h3>
    <form method="POST" action="#">
        <?php
        ini_set('display_errors', 1);
        $number = new RomanNumber();
        $form->getInputText("Nombre à transformer en chiffre romain", "roman");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST["roman"])) {
            $number->translateRomanNumber($_POST["roman"]);
        }
        ?>
    </form>
    <h3>US 7</h3>
    <form method="POST" action="#">
        <?php
        $form = new autoform;

        $form->getInputText("Factorielle à calculer", "number");
        $form->getInputSubmit("Valider");

        if (!empty($_POST["number"])) {
            $fac = new factorial;
            $fac->factor($_POST["number"]);
        }
        ?>
    </form>
    <h3>US 8</h3>
    <form method="POST">
        <?php
        $hexa = new hexadecimal();
        $form->getInputText("Nombre à convertir en Hexadécimale","hexaNumber");
        $form->getInputSubmit("valider");
        if (!empty($_POST["hexaNumber"])){
            $hexa->translateToHexa($_POST["hexaNumber"]);
        }
        ?>
    </form>
    <h3>US 9</h3>
    <form method="post">
        <?php
        $form2 = new autoform;

        $form2->getInputText("Nombre à transformer en binaire", "binary");
        $form2->getInputSubmit("Valider");

        if (!empty($_POST["binary"])) {
            $bin = new binary();
            $bin->binaryConverter($_POST["binary"]);
        }


        ?>
    </form>
    <h3>US 10</h3>
    <form method="POST">
        <?php
        /**
         * Vérifie le format de l'email et de la date
         */
        /*US10*/
        ini_set("display_errors", 1);
        $form->getInputText("Email", "email");
        $form->getInputText("Date de naissance", "birth");
        $form->getInputSubmit("Valid");
        ?>
        <?php
        ini_set('display_errors', 1);
        if (!empty($_POST["email"])) {
            if (preg_match("/[aA0-zZ9]{3}\@[aA0-zZ9]{1,}\.[aA-zZ]/", $_POST["email"])) {
                echo "Email valide";
            } else {
                echo "Email invalide";
            }
        }
        if (!empty($_POST["birth"])) {
            if (preg_match("/\d\d\/\d\d\/\d\d/", $_POST["birth"])) {
                echo "Date valide";
            } else {
                echo "Date invalide";
            }
        }
        ?>
    </form>
    <h3>US 11</h3>
    <form method="post">
        <?php
        ini_set('display_errors', 1);
        $form->getInputText("Noms à trier", "nameToSort");
        $form->getInputSubmit("submit");
        $sort = new sort();
        if (!empty($_POST["nameToSort"])) {
            $arrayName = explode(",", $_POST["nameToSort"]);
            $sort->sortName($arrayName);
        }
        ?>
    </form>
</div>
</div>


<?php include("footer.php"); ?>

</body>
</html>