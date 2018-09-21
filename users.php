<?php

//$hostname = "bbj31ma8tye2kagi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306";
//$username = "c6yha5d7xaec2saa";
//$password = "mmz42r0bv1ukt52b";
//$database = "ecdupp1z6rgjtuqa";

//declare database variables
//isaiah's personal database
/* $hostname = "localhost";
$username = "root";
$password = "root";
$database = "form-demo"; */

//establish db connect
$conn = new mysqli($hostname, $username, $password, $database);

//declare local variables from form submission
$personEmail = $_POST['emailInput'];
$personPassword = $_POST['passwordInput'];

//define SQL query
$sql_statement = "SELECT password FROM users WHERE email = '".$personEmail."' AND password = '".$personPassword."'";

//check connection
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

//declare results and check if null
if ($result = $conn->query($sql_statement)) {
    //update header if a match is greater than zero
    if ($result->num_rows > 0){
        header("Location: home.php");
    }
    else {
        echo '<div class="login-error">incorrect login</div>';
        include("index.php");
        //header("Location: index.php");
    }
    die();
}

//close db connect
$conn->close();