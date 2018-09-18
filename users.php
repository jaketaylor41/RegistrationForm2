<?php

$hostname = "bbj31ma8tye2kagi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
$username = "c6yha5d7xaec2saa";
$password = "mmz42r0bv1ukt52b";
$database = "ecdupp1z6rgjtuqa";

//$hostname = "localhost:8889";
//$username = "root";
//$password = "root";
//$database = "heroku";


// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connection was successfully established!";


$personEmail = $_POST['emailInput'];
$personPassword = $_POST['passwordInput'];


$sql_statement = "SELECT * FROM `users` WHERE password = '$personPassword'";





if($conn->query($sql_statement) == TRUE){

    include "home.php";

} else{

    echo "Error " . $sql_statement . "<br>" . $conn->error;
}

$conn->close();