<?php

class sort
{
    public function sortName($array)
    {
        $n = count($array);
        for ($i = 0; $i < $n; $i++) {
            for ($k = $i + 1; $k < $n; $k++) {
                    if ($array[$i][1] > $array[$k][1]) {
                        $copy = $array[$i];
                        $array[$i] = $array[$k];
                        $array[$k] = $copy;
                    }
                    }
                }
        foreach ($array as $v1) {
            echo "$v1 ,";
        }
    }
}

?>