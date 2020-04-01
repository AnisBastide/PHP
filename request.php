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
     * Method construction to create a connection to the request.
     * @param $user indicates PhpMyAdmin's user
     * @param $pwd indicates PhpMyAdmin's password
     * @param $dbName indicates the DataBase's name
     * @param $dbType indicates the DataBase's type
     * @param $dbAdress indicates the DataBase's adress
     */
    public function __construct($user, $pwd, $dbName, $dbType, $dbAdress)
    {
        $this->_user = $user;
        $this->_pwd = $pwd;
        $this->_dbName = $dbName;
        $this->_dbType = $dbType;
        $this->_dbAdress = $dbAdress;

        $this->connectDB();
    }

    private function connectDB(){
        try{
            if ($this->_bdd===null){
                $dsn = $this->_dbType.':dbname='.$this->_dbName.';host='.$this->_dbAdress.'';
                $db = new PDO($dsn, $this->_user, $this->_pwd);
            }
        }catch (PDOException $e){
            echo "connexion échoué :".$e->getMessage();
            die();
        }
    }

    public function getAllRows($table, $columns){
        $req = "SELECT ".$columns." FROM ".$table;
        $tab = $this->_bdd->request($req);
        foreach ($tab as $row){
            print_r($row['name']);
            echo "<br>";
        }
    }
}
?>