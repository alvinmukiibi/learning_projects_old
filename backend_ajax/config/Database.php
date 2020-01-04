<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 2/2/2019
 * Time: 4:14 PM
 */

namespace  AJAX;

class Database{

    private $dsn = "mysql:host=localhost;dbname:fate_ajax";
    private $username = "root";
    private $password = "";
    private $conn;

    public function connect(){
        $this->connection = null;
        $connection_error = null;

        try{
            $this->connection = new \PDO($this->dsn, $this->username, $this->password);
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        } catch(\PDOException $e){
            $connection_error = $e->getMessage();
        }
        return ['connection' => $this->connection, 'error' => $connection_error];

    }



}