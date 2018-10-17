<?php

$hostname = "localhost:8889";
$username = "root";
$password = "root";
$database = "heroku";

//isaiah's local database
//$hostname = "localhost";
//$username = "root";
//$password = "root";
//$database = "form-demo";

$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$postTitle = $_POST['title'];
$postBody = $_POST['body'];
$authorName = $_POST['author'];

$sql_statement = "INSERT INTO posts (id, title, body, author) VALUES (NULL, '$postTitle', '$postBody', '$authorName')";


if($conn->query($sql_statement) == TRUE){
    echo 'test';
    include "home.php";
    header("Location: home.php");

} else{

    echo "Error " . $sql_statement . "<br>" . $conn->error;
}

define ('ROOT_PATH', realpath(dirname(__FILE__)));

$conn->close();






//function getPublishedPosts() {
//    // use global $conn object in function
//    global $conn;
//    $sql = "SELECT * FROM posts";
//    $result = mysqli_query($conn, $sql);
//
//    // fetch all posts as an associative array called $posts
//    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
//
//    return $posts;
//}



