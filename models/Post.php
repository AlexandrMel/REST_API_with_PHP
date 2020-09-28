<?php 

class Post {
    //DB properties
    private $conn;
    private $table = 'posts';

//Post Properties
public $id;
public $category_id;
public $category_name;
public $title;
public $body;
public $author;
public $created_at;

//Contructor with DB
public function __construct($db){
    $this->conn = $db;
}

//Get Posts
public function read(){
    $query = 'SELECT 
    c.name as category_name,
    p.id,
    p.category_id,
    p.title,
    p.body,
    p.author,
    p.created_at
    FROM
    ' . $this->table . ' p
    LEFT JOIN 
    categories c ON p.category_id = c.id
    ORDER BY
    p.created_at DESC';
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
}
}