<?php

class hexadecimal
{
    private $translate = [10 => "A", 11 => "B", 12 => "C", 13 => "D", 14 => "E", 15 => "F"];
    private $result = "";

    public function translateToHexa($number)
    {
        while ($number > 0) {
            $hexa = $number % 16;
            $number = (int)($number / 16);
            if ($hexa < 10) {
                $this->result = $hexa . $this->result;
            } else {
                $this->result = $this->translate[$hexa] . $this->result;
            }
        }
        echo "result: " . $this->result;
    }
}

?>