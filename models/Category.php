<?php 

class Category {
    //DB properties
    private $conn;
    private $table = 'categories';

//Category Properties
public $id;
public $name;
public $created_at;

//Contructor with DB
public function __construct($db){
    $this->conn = $db;
}

//Get Categories
public function read(){
    //Creat query
    $query = 'SELECT 
    id,
    name,
    created_at
    FROM
    ' . $this->table . '
    ORDER BY
    created_at DESC';

    //Prepare our statement
    $stmt = $this->conn->prepare($query);
    //Execute the query
    $stmt->execute();
    return $stmt;
}

//Get Single Category
public function read_single(){
    $query = 'SELECT 
    id,
    name,
    created_at
    FROM
    ' . $this->table . '
    WHERE
    id = ?
    LIMIT 0,1';
    //Prepare our statement
    $stmt = $this->conn->prepare($query);
    //Bind ID
    $stmt->bindParam(1, $this->id);
    //Execute the query
    $stmt->execute();
    //Get the 1 table row with result and assign to the coresponding Class properties
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //Set Properties
    $this->id = $row['id'];
    $this->name = $row['name'];
    $this->created_at = $row['created_at'];
}

//Creat Category

public function create(){
    //Create query

$query = 'INSERT INTO ' .
$this->table . '
SET
  name = :name';

    //Prepare our statement
    $stmt = $this->conn->prepare($query);
    //Clean data
    $this->name = htmlspecialchars(strip_tags($this->name));


    //Bind Data
    $stmt->bindParam(':name', $this->name);

//Execute query
if($stmt->execute()){
    return true;
}
//Print error if something goes wrong
printf("Error: %s.\n", $stmt->error);
return false;

}

//Update Category
public function update(){
    //Create query

$query = 'UPDATE ' .
$this->table . '
SET
  name = :name
  WHERE id = :id';
    //Prepare our statement
    $stmt = $this->conn->prepare($query);
    //Clean data
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->id = htmlspecialchars(strip_tags($this->id));

    //Bind Data
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':id', $this->id);
//Execute query
if($stmt->execute()){
    return true;
}
//Print error if something goes wrong
printf("Error: %s.\n", $stmt->error);
return false;

}

//Delete Category
public function delete(){
    $query = 'DELETE FROM
    ' . $this->table . ' WHERE id= :id';
 
    //Prepare our statement
    $stmt = $this->conn->prepare($query);
    //CleanData
    $this->id = htmlspecialchars(strip_tags($this->id));
    //Bind ID
    $stmt->bindParam(':id', $this->id);
    //Execute the query
//Execute query
if($stmt->execute()){
    return true;
}
//Print error if something goes wrong
printf("Error: %s.\n", $stmt->error);
return false;
}
}