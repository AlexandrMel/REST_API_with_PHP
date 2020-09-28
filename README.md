# REST_API_with_PHP
 API with CRUD operations made with plain PHP without any frameworks,
 the database manipulations and some exception hadling ar done with the PDO Class 
 I used Class Oriented Programing for API Controllers

## Install
    bundle install
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
`POST /thing/`
    Header 'Accept: application/json'
### Response
    HTTP/1.1 201 Created
    Message: "Post Created"
## Get a specific Thing
### Request
`GET /thing/id`
    curl -i -H 'Accept: application/json' http://localhost:7000/thing/1
### Response
    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 36
    {"id":1,"name":"Foo","status":"new"}
## Get a non-existent Thing
### Request
`GET /thing/id`
    curl -i -H 'Accept: application/json' http://localhost:7000/thing/9999
### Response
    HTTP/1.1 404 Not Found
    Date: Thu, 24 Feb 2011 12:36:30 GMT
    Status: 404 Not Found
    Connection: close
    Content-Type: application/json
    Content-Length: 35
    {"status":404,"reason":"Not found"}
## Create another new Thing
### Request
`POST /thing/`
    curl -i -H 'Accept: application/json' -d 'name=Bar&junk=rubbish' http://localhost:7000/thing
### Response
    HTTP/1.1 201 Created
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 201 Created
    Connection: close
    Content-Type: application/json
    Location: /thing/2
    Content-Length: 35
    {"id":2,"name":"Bar","status":null}
## Get list of Things again
### Request
`GET /thing/`
    curl -i -H 'Accept: application/json' http://localhost:7000/thing/
### Response
    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 74
    [{"id":1,"name":"Foo","status":"new"},{"id":2,"name":"Bar","status":null}]
## Change a Thing's state
### Request
`PUT /thing/:id/status/changed`
    curl -i -H 'Accept: application/json' -X PUT http://localhost:7000/thing/1/status/changed
### Response
    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 40
    {"id":1,"name":"Foo","status":"changed"}
## Get changed Thing
### Request
`GET /thing/id`
    curl -i -H 'Accept: application/json' http://localhost:7000/thing/1
### Response
    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 40
    {"id":1,"name":"Foo","status":"changed"}
## Change a Thing
### Request
`PUT /thing/:id`
    curl -i -H 'Accept: application/json' -X PUT -d 'name=Foo&status=changed2' http://localhost:7000/thing/1
### Response
    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:31 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 41
    {"id":1,"name":"Foo","status":"changed2"}
## Attempt to change a Thing using partial params
### Request
`PUT /thing/:id`
    curl -i -H 'Accept: application/json' -X PUT -d 'status=changed3' http://localhost:7000/thing/1
### Response
    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:32 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 41
    {"id":1,"name":"Foo","status":"changed3"}
## Attempt to change a Thing using invalid params
### Request
`PUT /thing/:id`
    curl -i -H 'Accept: application/json' -X PUT -d 'id=99&status=changed4' http://localhost:7000/thing/1
### Response
    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:32 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 41
    {"id":1,"name":"Foo","status":"changed4"}
## Change a Thing using the _method hack
### Request
`POST /thing/:id?_method=POST`
    curl -i -H 'Accept: application/json' -X POST -d 'name=Baz&_method=PUT' http://localhost:7000/thing/1
### Response
    HTTP/1.1 200 OK
    Date: Thu, 24 Feb 2011 12:36:32 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 41
    {"id":1,"name":"Baz","status":"changed4"}
## Change a Thing using the _method hack in the url
### Request
`POST /thing/:id?_method=POST`
    curl -i -H 'Accept: application/json' -X POST -d 'name=Qux' http://localhost:7000/thing/1?_method=PUT
### Response
    HTTP/1.1 404 Not Found
    Date: Thu, 24 Feb 2011 12:36:32 GMT
    Status: 404 Not Found
    Connection: close
    Content-Type: text/html;charset=utf-8
    Content-Length: 35
    {"status":404,"reason":"Not found"}
## Delete a Thing
### Request
`DELETE /thing/id`
    curl -i -H 'Accept: application/json' -X DELETE http://localhost:7000/thing/1/
### Response
    HTTP/1.1 204 No Content
    Date: Thu, 24 Feb 2011 12:36:32 GMT
    Status: 204 No Content
    Connection: close
## Try to delete same Thing again
### Request
`DELETE /thing/id`
    curl -i -H 'Accept: application/json' -X DELETE http://localhost:7000/thing/1/
### Response
    HTTP/1.1 404 Not Found
    Date: Thu, 24 Feb 2011 12:36:32 GMT
    Status: 404 Not Found
    Connection: close
    Content-Type: application/json
    Content-Length: 35
    {"status":404,"reason":"Not found"}
## Get deleted Thing
### Request
`GET /thing/1`
    curl -i -H 'Accept: application/json' http://localhost:7000/thing/1
### Response
    HTTP/1.1 404 Not Found
    Date: Thu, 24 Feb 2011 12:36:33 GMT
    Status: 404 Not Found
    Connection: close
    Content-Type: application/json
    Content-Length: 35
    {"status":404,"reason":"Not found"}
## Delete a Thing using the _method hack
### Request
`DELETE /thing/id`
    curl -i -H 'Accept: application/json' -X POST -d'_method=DELETE' http://localhost:7000/thing/2/
### Response
    HTTP/1.1 204 No Content
    Date: Thu, 24 Feb 2011 12:36:33 GMT
    Status: 204 No Content
    Connection: close
