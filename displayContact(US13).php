<?php

class displayContact
{
    /**
     * Affiche un tableau contenant le contenu de la liste entrée en argument
     * Et affiche une couleur une ligne sur deux
     * @param $array liste contenant le résultat d'une requête SELECT
     */
    public function display($array)
    {
        $n = 0;
        echo "<table>";
        foreach ($array as $tab){
            if ($n%2==0){
                echo '<tr style="background-color: white">';
            }else if ($n%2!=0){
                echo '<tr style="background-color: lightblue">';
            }
            foreach ($tab as $value){
                echo "<th>".$value."</th>";
            }
            echo "</tr>";
            $n++;
        }
        echo "</table>";
    }

}
?>