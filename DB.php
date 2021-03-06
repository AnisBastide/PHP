<?php

class request
{


    private $_user;
    private $_pwd;
    private $_dbName;
    private $_dbType;
    private $_dbAdress;
    private $_bdd;

    /**
     * Méthode constructeur permettant de créer une connexion
     * avec notre base de données
     * @param $user =>    permet d'indiquer l'utilisateur PhpMyAdmin
     * @param $pwd =>    permet d'indiquer le mot de passe de l'utilisateur PHPMyAdmin
     * @param $dbname =>    permet d'indiquer le nom de la base de données à laquelle je veux me connecter
     * @param $dbtype =>    permet d'indiquer le type de base de donnée sur lequel je vais établir une connexion (Oracle, mySQL...)
     * @param $dbadress =>  permet de fournir l'adresse sur laquelle est installé notre base (localhost ou l'adresse IP de notre serveur/ ou nom de domaine)
     */
    public function __construct($user, $pwd, $dbname, $dbtype, $dbadress)
    {
        $this->_user = $user;
        $this->_pwd = $pwd;
        $this->_dbName = $dbname;
        $this->_dbType = $dbtype;
        $this->_dbAdress = $dbadress;

        $this->connectDB();
    }

    /**
     * Méthode qui permet d'établir
     * une connexion avec la base de données
     * via l'objet PDO en utilisant les variables de classes
     */
    private function connectDB()
    {
        try {
            if ($this->_bdd === null) {
                $dsn = $this->_dbType . ':dbname=' . $this->_dbName . ';host=' . $this->_dbAdress;

                $this->_bdd = new PDO($dsn, $this->_user, $this->_pwd);
            }

        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            die();
        }
    }


    /**
     * Permet de réaliser une requête Select
     * et d'afficher chaque enregistrement à l'utilisateur
     */
    public function Insert($table, $list)
    {
        $count = 0;
        $value = '';
        foreach ($list as $element) {
            $value = $value . $element;
            if ($count < count($list) - 1) {
                $value = $value . ",";
            }
            $count++;
        }
        $sql = "INSERT INTO " . $table . " VALUES ( " . $value . " )";
        $tab = $this->_bdd->query($sql);
    }

    /**
     * return all the element that match the condition on the database into a list
     * @param $table the table in the database
     * @param $condition the condition to match
     * @return array the list that contain the element that match
     */
    public function getWhere($table, $condition)
    {
        $list = array();
        $req = " SELECT * FROM " . $table . " WHERE " . $condition;
        $tab = $this->_bdd->query($req);
        $tab = $tab->fetch(PDO::FETCH_ASSOC);
        $list["id"]=$tab['id'];
        $list["lastname"] = $tab['lastname'];
        $list["firstname"] = $tab['firstname'];
        $list["date"] = $tab['date'];
        $list["gender"] = $tab['gender'];
        $list["mail"] = $tab['mail'];
        $list["address"] = $tab['address'];
        return $list;
    }

    /**
     * return all the element of a column into a list
     * @param $columns the column to get
     * @param $table the table where is the column you want
     * @return array all element in the column into a list
     */
    public function getColumns($columns, $table)
    {
        $list = array();
        $req = " SELECT " . $columns . " FROM " . $table;
        $tab = $this->_bdd->query($req);
        foreach ($tab as $row) {
            array_push($list, $row[$columns]);
        }
        return $list;
    }

    /**
     * Permet d'effectuer une une requête SELECT all
     * @param $table nom de la table où effectuer la requête
     * @param $where
     * @param $pos colonne de la table à vérifier
     * @return array retourne une liste contenant les résultats
     */
    public function getAllRows($table, $where, $pos){
        $val = array();
        if ($where != NULL){
            $sql = "SELECT * FROM ".$table." WHERE ".$pos."=".$where.";";
        }else{
            $sql = "SELECT * FROM ".$table.";";
        }
        $this->_bdd->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $tab = $this->_bdd->query($sql);
        foreach ($tab as $rslt) {
            $val[] = $rslt;
        }
        return $val;
    }


    /**
     * Permet d'effectuer une une requête SELECT spécifique
     * @param $table nom de la table où effectuer la requête
     * @param $list liste contenant le nom des colonnes
     * @param $where
     * @param $pos colonne de la table à vérifier
     * @return array retourne une liste contenant les résultats
     */
    public function getRows($table, $list, $where, $pos){
        $val = array();
        $count = 0;
        $value = '';
        foreach ($list as $element) {
            $value = $value . $element;
            if ($count < count($list) - 1) {
                $value = $value . ",";
            }
            $count++;
        }
        if ($where != NULL){
            $sql = "SELECT ".$value." FROM ".$table." WHERE ".$pos."=".$where.";";
        }else{
            $sql = "SELECT ".$value." FROM ".$table.";";
        }
        $this->_bdd->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $tab = $this->_bdd->query($sql);
        foreach ($tab as $rslt) {
            $val[] = $rslt;
        }
        return $val;
    }

    /**
     * Permet de réaliser une requête INSERT
     * @param $table nom de la table sur laquelle effectuée le INSERT
     * @param $list éléments à ajouter
     */
    public function getInsert($table, $list)
    {
        $count = 0;
        $value = '';
        foreach ($list as $element) {
            $value = $value . $element;
            if ($count < count($list) - 1) {
                $value = $value . ",";
            }
            $count++;
        }
        $sql = "INSERT INTO " . $table . " VALUES (default," . $value . " )";
        if ($this->_bdd->query($sql) === true) {
            $this->_bdd->query($sql);
        }
    }

    /**
     * update a value in a chosen column in a chosen table
     * @param $table the table where you want to modify a value
     * @param $column he column to modify
     * @param $valeur the new value
     * @param $condition the condition to get the right user
     */
    public function update($table, $column, $valeur, $condition)
    {
        $req = "UPDATE " . $table . " SET " . $column . "='" . $valeur . "' WHERE " . $condition ."";
        $this->_bdd->exec($req);
    }
}


?>