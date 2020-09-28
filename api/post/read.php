<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//Import Classes
include_once'../../config/Database.php';
include_once'../../models/Post.php';

//Instantiate DB and connect
$database = new Database();
$db = $database->connect();

//Instantiate blog post object

$post = new Post($db);

//Blog post query
$result = $post->read();

//Get row count
$num = $result->rowCount();

//Check if there are any posts in DB

if($num > 0){
    //Set Post Array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'id' => $id,
            'title'=>$title,
            'body'=> html_entity_decode($body),
            'author'=> $author,
            'category_id'=> $category_id,
            'category_name'=> $category_name
        );
        //Push the post item into posts_arr->data
        array_push($posts_arr['data'], $post_item);
    }
//turn php array to JSON

echo json_encode($posts_arr);

}else {
echo json_encode(array('message' => 'No Posts Found'));
}