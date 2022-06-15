<?php
include_once('configuration.php');
class System {
    
    var $dsn= 'mysql:host=localhost;port=3306;dbname=crud_php';
    var $username = USERNAME;
    var $password = PASSWORD;

    function connect() {
        $dbh = new PDO($this->dsn,$this->username,$this->password);
        return $dbh;
    }

}

?>