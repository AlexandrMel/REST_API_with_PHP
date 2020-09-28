<?php
  // Insert Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

  //Import Classes
  include_once '../../config/Database.php';
  include_once '../../models/Category.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate Category object
  $category = new Category($db);

//Get ID
$data->id = isset($_GET['id']) ? $_GET['id'] : die();

  // Set ID to UPDATE
  $category->id = $data->id;

  // Delete Category
  if($category->delete()) {
    echo json_encode(
        //Success response message
      array('message' => 'Category deleted')
    );
  } else {
    echo json_encode(
        //Fail response message
      array('message' => 'Category not deleted')
    );
  }