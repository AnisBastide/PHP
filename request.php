<?php

class request {
	private $_user;
	private $_pwd;
	private $_dbName;
	private $_dbType;
	private $_dbAdress;
	private $_bdd; 
/**
 *Méthode constructeur permettant de créer une connexion avec notre bdd 
 *@user -> permet d'indiquer l'utilisateur phpmyadmin
 *@pwd -> permet d'indiquer le mot de passe de l'utilisateur phpmyadmin
 *@dbName -> permet d'indiquer le nom de la bdd à laquelle je veux me connecter
 *@dbType -> permet d'indiquer le type de bdd sur laquelle je vais établir ma connexion (Oracle, mySql, etc)
 *@dbAdress -> permet de fournir l'adresse sur laquelle est installée notre base (localhost ou l'adresse IP de notre serveur / ou de notre domaine)
 */
	public function __construct($user, $pwd, $dbName, $dbType, $dbAdress){
		$this->_user = $user;
		$this->_pwd = $pwd;
		$this->_dbName = $dbName;
		$this->_dbType = $dbType;
		$this->_dbAdress = $dbAdress;

		$this->connectDb();
	}
/**
 * Méthode permettant d'établir une connexion à la bdd via l'objet PDO
 * en utilisant les variables de classe
 */
	public function connectDb(){
		try {
			if ($this->_bdd === null) {
			$dsn = $this->_dbType.':dbname='.$this->_dbName.';host='.$this->_dbAdress;
			$this->_bdd = new PDO($dsn, $this->_user, $this->_pwd);
			echo "Works";
			}
		} catch (PDOException $e){
			echo "Connexion échouée : ".$e->getMessage();
			die();
		}
	}
/**
 * Méthode permettant d'établir une connexion à la bdd via l'objet PDO
 * en utilisant les variables de classe
 */
	public function getAllRows($table, $columns){
		$req = "SELECT ".$columns." FROM ".$table;
		foreach ($this->_bdd->query($req) as $row) {
			print_r($row['name'].' '.$row['specie'].' '.$row['life']);
			echo "</br>";
		}
	}

	// public function insert($table, $nomDino, $typeDino, $lifeDino){
	// 	$req = "INSERT INTO ".$table." ('id', 'name', 'specie', 'life') VALUES (NULL,".$nomDino.", ".$typeDino.", ".$lifeDino.")";
	// 	$this->_bdd->query($req);
	// }
	public function getInsert($table,$list){
        $count=0;
        $value = '';
        foreach($list as $element){
	        $value = $value.$element;
	        if($count<count($list)-1){
	        	$value = $value.",";
	        }
	        $count++;
        }
        $sql = "INSERT INTO ".$table." VALUES ( ".$value." )";
        $this->_bdd->query($sql);
    }

}


?>