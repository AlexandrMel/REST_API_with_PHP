<?php
  // Insert Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');
//Import Classes
  include_once '../../config/Database.php';
  include_once '../../models/Category.php';
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate Category object
  $category = new Category($db);

  // Get raw data from request
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $category->id = $data->id;

  $category->name = $data->name;

  // Update category
  if($category->update()) {
    echo json_encode(
        //Success message
      array('message' => 'Category Updated')
    );
  } else {
    echo json_encode(
        //Fail message
      array('message' => 'Category not updated')
    );
  }