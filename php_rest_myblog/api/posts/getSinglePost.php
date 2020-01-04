<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 1/31/2019
 * Time: 3:04 PM
 */
header('Access-Control-Allow_Origin: *');
header('Content-Type: application/json');

require_once "../../db.php";
require_once "../../models/Post.php";

//instantiate model

$post = new Post($db);

//get id
$post->post_id = isset($_GET['id'])? $_GET['id']: die();

$result = $post->getSingle();

if($result){

    echo json_encode(['error' => false, 'post' => $result]);
}
else{
    echo json_encode(['error' => true, 'post' => []]);
}