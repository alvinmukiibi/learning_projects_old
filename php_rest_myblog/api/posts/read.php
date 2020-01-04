<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 1/31/2019
 * Time: 11:58 AM
 */

//procedure of writing an api file
/*
 *  1 - set the headers
 *  2 - include the database connection file, model, utilities, paths and other autoload configs
 *  3 - state the namespaces you gonna use
 *  4 - instantiate a request
 *  5 - verify that the request type(GET, POST) is the one according to the headers access control allowed methods
 *
 *  6 - instantiate the model and pass it the db connection as arg and invoke the method and store the results in the variable
 *  7 - encode the data in json and echo it
 *
 *  Note, these steps are not exhaustive and some of them can be eliminated however steps 2, 6 and 7 are mandatory
 *
 */

//headers
header('Access-Control-Allow_Origin: *');
header('Content-Type: application/json');

//import db and models
require_once "../../db.php";
require_once "../../models/Post.php";

//state namespaces
//use REST\Post;

//instantiate the model

$post = new Post($db);
$results = $post->read();

if($results){
    //encode the data to json
    echo json_encode(['error' => false, 'posts' => $results]);
}
else{
    echo json_encode(['error' => true, 'posts' => []]);
}
