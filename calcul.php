<?php

class calcul {

	public function facto($nb){
		$tot = 1;
		if ($nb>=0) {
			for ($i=1; $i<=$nb; $i++) {
    		$tot = $tot * $i;
    		}
			echo "<p>Factorielle de ".$nb." vaut ".$tot."</p>";
		} 
		else {
			echo "<p>Opération impossible avec ".$nb."</p>";
		}
	}

	public function binary($nb){
		$tab = array();
		while ($nb > 0) {
			$reste = $nb%2;
			array_push($tab, $reste); 
			$nb = (int)($nb/2);
		}
		$result = implode("", array_reverse($tab));
		echo "<p>le résulat en binaire est : ".$result."</p>";
	}
}




?>