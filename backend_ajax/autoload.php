<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 2/2/2019
 * Time: 4:44 PM
 */

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'paths.php';

function myAutoload($class){
    $parts = explode('\\', $class);
    $to_be_loaded = end($parts);
    include(CLASS_PATH.DIRECTORY_SEPARATOR.$to_be_loaded.'.php');
}
spl_autoload_register('myAutoload');
