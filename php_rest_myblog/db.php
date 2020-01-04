<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 1/31/2019
 * Time: 12:06 PM
 */

require_once "config/Database.php";

//use REST\Database;

//instantiate the database and create a connection to be passed to all model objects

$database = new Database();
$connection = $database->connect(); //returns an array containing 2 keys, connection and error
if($connection['error']){
    //use a third party library to record logs
    echo $connection['error'];
    die();
}

//else if there is no connection error

$db = $connection['connection'];