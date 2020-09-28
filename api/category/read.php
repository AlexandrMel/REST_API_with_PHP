<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

//Import Classes
include_once'../../config/Database.php';
include_once'../../models/Category.php';

//Instantiate DB and connect
$database = new Database();
$db = $database->connect();

//Instantiate blog post object

$category = new Category($db);

//Category query
$result = $category->read();

//Get row count
$num = $result->rowCount();

//Check if there are any posts in DB

if($num > 0){
    //Set Post Array
    $categories_arr = array();
    $categories_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $category_item = array(
            'id' => $id,
            'name'=>$name,
            'created_at'=> $created_at
        );
        //Push the post item into posts_arr->data
        array_push($categories_arr['data'], $category_item);
    }
//turn php array to JSON

echo json_encode($categories_arr);

}else {
echo json_encode(array('message' => 'No Posts Found'));
}