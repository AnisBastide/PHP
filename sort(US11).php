<?php

class sort
{
    /**
     * @param $array list of name to sort
     * the method sort a list of name by the second letter
     * and display it.
     */
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
        $count=0;
        $result="";
        foreach ($array as $v1) {
            $result=$result . "$v1";
            if($count<count($array)-1){
                $result=$result . ",";
            }
            $count++;
        }
        echo $result;
    }
}

?>