<?php

class binary
{
    /**
     * Permet de convertir un nombre donné par l'utilisateur en binaire
     * @param $nb correspond au nombre donné par l'utilisateur
     */
    public function binaryConverter($nb)
    {

        $base = $nb;

        $tab = array();
        while ($nb > 0) {
            $reste = $nb % 2;
            array_push($tab, $reste);
            $nb = (int)($nb / 2);
        }
        $result = implode("", array_reverse($tab));
        echo "<p>le conversion en binaire de " . $base . " est : " . $result . "</p>";
    }
}

?>