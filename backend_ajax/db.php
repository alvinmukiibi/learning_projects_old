<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 2/2/2019
 * Time: 4:22 PM
 */

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'Database.php';

use AJAX\Database;

$database = new Database();
$connection = $database->connect();
if($connection['error']){
    $logger->error($connection['error']);
}
$db = $connection['connection'];