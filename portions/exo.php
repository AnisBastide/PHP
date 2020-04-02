<!DOCTYPE html>
<html>
<head>
	<title>Exos</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<?php 
        include ("header.php");
        ini_set('display_errors', 1);
        require "../autoform.php";
        require "../date(US4).php";
        require "../binary(US9).php";
        require "../romanNumber(US6).php";
        require "../factorial(US7).php";
        require "../smallestNumber(US5).php";
        require "../primeNumber(US3).php";
    ?>

    <div id="exos">
        <h1>
            Exos
        </h1>
        <p>
        <form method="POST" action="#">
            <?php
                $form = new autoform;

                $form->getInputText("Nombre à calculer", "number");
                if (!empty($_POST['number'])) {
                    $fac = new factorial;
                    $fac->factor($_POST["number"]);
                }

                $form->getInputText("Nombre à transformer en binaire", "binary");
                if (!empty($_POST['binary'])) {
                    $bin = new binary() ;
                    $bin->binaryConverter($_POST["binary"]);
                }

                $form->getInputSubmit("Valider");
                
            ?>
        </form>
        </p>
        <form method="post">
            <?php

//            if (!empty($_POST)) {
//                var_dump($_POST);
//                //$length, $life, $damage, $name, $gender, $nbrArms, $sizeArms
//                $toto = new tyrex("", $_POST["life"], "", $_POST["name"], $_POST["gender"], "", "");
//            }
            $form->getInputText("firstNumber", "firstNumber");
            $form->getInputText("secondNumber", "secondNumber");
            $form->getInputText("thirdNumber", "thirdNumber");
            $form->getInputSubmit("valider");
            $smallestNumber = new smallestNumber();
            if (!empty($_POST)) {
                $smallestNumber->getSmallestNumber($_POST["firstNumber"], $_POST["secondNumber"], $_POST["thirdNumber"]);
            }
            ?>
            <?php
            $form->getInputText("primeNumber", "primeNumber");
            $form->getInputSubmit("submit");
            ini_set('display_errors', 1);
            $primeNumber = new primeNumber();
            if ($_POST != null) {
                $primeNumber->generatePrimeNumbers($_POST["primeNumber"]);
            }
            ?>
        </form>
    </div>

    <form method="POST" action="#">
        <?php
        $form = new autoform();
        $date = new date();
        $form->getInputText("Seconde", "second");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST)){
            $date->countSecond($_POST["second"]);
        }
        ?>
    </form>
    <form method="POST" action="#">
        <?php
        ini_set('display_errors', 1);
        $number = new RomanNumber();
        $form->getInputText("Nombre","roman");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST)){
            $number->translateRomanNumber($_POST["roman"]);
        }
        ?>
    </form>
	





	<?php include ("footer.php"); ?>

</body>
</html>
