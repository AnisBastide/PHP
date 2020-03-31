<?php
class primeNumber{
    public function generatePrimeNumbers($number){
        $list=array();
        for($i=0;$i<=$number;$i++){
            $divide=false;
            $j=1;
            while($divide=false){
                if($i%$j==0 && $j!=$i){
                    $divide==true;
                }
                if($j==$i){
                    array_push($list,$j);
                }
         }
         echo '<div';
         foreach($list as $number){
             echo $number . ",";
         }
         echo '/>';
        }

    }
}
?>