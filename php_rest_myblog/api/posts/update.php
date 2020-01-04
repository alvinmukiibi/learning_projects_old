<?php
/**
 * Created by PhpStorm.
 * User: ALVIN
 * Date: 1/31/2019
 * Time: 3:32 PM
 */
header('Access-Control-Allow_Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Acess-Control-Allow-Headers: Acess-Control-Allow-Headers, Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');




//import db and models
require_once "../../db.php";
require_once "../../models/Post.php";

$post = new Post($db);



$data = json_decode(file_get_contents("php://input"));

$post->id = $data->id;

$post->category_id = $data->category_id;
$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;


$result = $post->update();

if($result){
    echo json_encode(['error' => false, "message" => "Post Updated"]);
}
else{
    echo json_encode(['error' => true, "message" => "Post Not Updated"]);
}
