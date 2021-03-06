<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//Import Classes
include_once'../../config/Database.php';
include_once'../../models/Post.php';

//Instantiate DB and connect
$database = new Database();
$db = $database->connect();

//Instantiate blog post object
$post = new Post($db);

//Get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

//Delete the Post
if($post->delete()){
    echo json_encode(array(
        'message'=> "Post Deleted"
    ));
} else {
    echo json_encode(array("message"=> 'Post Not Deleted'));
}