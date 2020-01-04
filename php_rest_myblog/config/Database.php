<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 1/31/2019
 * Time: 11:26 AM
 *
 *
 */

//namespace REST;

class Database {

    private $host = "localhost";
    private $db_name = "fate_restful";
    private $username = "root";
    private $password = "";
    private $conn;
    private $dsn;
    private  $conn_error;

    public function connect(){
        $this->conn = null;

        try {
            $this->dsn = "mysql:host=".$this->host.";dbname=".$this->db_name;
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error){
           $this->conn_error = $error->getMessage();
        }

        return ['connection' => $this->conn, 'error' => $this->conn_error];
    }


}