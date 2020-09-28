# REST_API_with_PHP
 API with CRUD operations made with plain PHP without any frameworks,
 the database manipulations and some exception hadling ar done with the PDO Class 
 I used Class Oriented Programing for API Controllers

## Install
    Run it on a XAMPP platform, or any platform that simulates the Apache and MySql environment
## Run the app
 http://localhost/REST_API_with_PHP/api/

# REST API
The REST API example described below.
## Get list of Posts
### Request
`GET /REST_API_with_PHP/api/post/read.php`
   Header 'Accept: application/json'
### Response
    HTTP/1.1 200 OK
    Array of all Posts
## Create a new Post
### Request
`POST /REST_API_with_PHP/api/post/create.php`
    Header 'Accept: application/json'
### Response
    HTTP/1.1 201 Created
    Message: "Post Created"
## Get a specific Post
### Request
`GET /REST_API_with_PHP/api/post/read_single?id=1` 
change the id in the query string to get the specific Post
    Header 'Accept: application/json'
### Response
    HTTP/1.1 200 OK
    Exemple of response: 
    {
    "id": "1",
    "title": "Technology Post One",
    "body": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut interdum est nec lorem mattis interdum. Cras augue est, interdum eu consectetur et, faucibus vel turpis. Etiam pulvinar, enim quis elementum iaculis, tortor sapien eleifend eros, vitae rutrum augue quam sed leo. Vivamus fringilla, diam sit amet vestibulum vulputate, urna risus hendrerit arcu, vitae fringilla odio justo vulputate neque. Nulla a massa sed est vehicula rhoncus sit amet quis libero. Integer euismod est quis turpis hendrerit, in feugiat mauris laoreet. Vivamus nec laoreet neque. Cras condimentum aliquam nunc nec maximus. Cras facilisis eros quis leo euismod pharetra sed cursus orci.",
    "author": "Sam Smith",
    "category_id": "1",
    "category_name": "Technology"
}
## Update a Post
### Request
`PUT /REST_API_with_PHP/api/post/update.php` 
- You update the post by its id, which you send together with the new content in the request body
    Header 'Accept: application/json'
### Response
    HTTP/1.1 200 OK
    Message: "Post Updated"
## Delete a Post
### Request
`PUT /REST_API_with_PHP/api/post/delete.php?id=1` 
change the id in the query string to Delete the specific Post
- You update the post by its id, which you send together with the new content in the request body
    Header 'Accept: application/json'
### Response
    HTTP/1.1 200 OK
    Message: "Post Deleted"


# Categories
## Get list of Categories
### Request
`GET /REST_API_with_PHP/api/category/read.php`
   Header 'Accept: application/json'
### Response
    HTTP/1.1 200 OK
    Array of all Categories
## Create a new Category
### Request
`POST /REST_API_with_PHP/api/category/create.php`
    Header 'Accept: application/json'
### Response
    HTTP/1.1 201 Created
    Message: "Category Created"
## Get a specific Category
### Request
`GET /REST_API_with_PHP/api/category/read_single?id=1` 
change the id in the query string to get the specific Category
    Header 'Accept: application/json'
### Response
    HTTP/1.1 200 OK
    Exemple of response: 
   {
    "id": "1",
    "name": "Technology"
}
## Update a Category
### Request
`PUT /REST_API_with_PHP/api/category/update.php` 
- You update the category by its id, which you send together with the new content in the request body
    Header 'Accept: application/json'
### Response
    HTTP/1.1 200 OK
    Message: "Category Updated"
## Delete a Category
### Request
`PUT /REST_API_with_PHP/api/category/delete.php?id=1` 
change the id in the query string to Delete the specific Post
- You update the category by its id, which you send together with the new content in the request body
    Header 'Accept: application/json'
### Response
    HTTP/1.1 200 OK
    Message: "Category Deleted"
