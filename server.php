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

$personName = $_POST['fNameInput'];
$personLname = $_POST['lNameInput'];
$personEmail = $_POST['emailInput'];
$personConfirmEmail = $_POST['confirmEmail'];
$personBirthday = $_POST['dobInput'];
$personUsername = $_POST['usernameInput'];
$personPassword = $_POST['passwordInput'];
$personConfirmPassword = $_POST['confirmPassword'];


$sql_statement = "INSERT INTO `users` (`id`, `fName`, `lName`, `email`, `confirmEmail`, `birthday`, `username`, `password`, `confirmPassword`) VALUES (NULL, '$personName', '$personLname', '$personEmail', '$personConfirmEmail', '$personBirthday', '$personUsername', '$personPassword', '$personConfirmPassword')";



if($conn->query($sql_statement) == TRUE){

    include "home.php";

} else{

    echo "Error " . $sql_statement . "<br>" . $conn->error;
}

$conn->close();



//$errors = array();
//// REGISTER USER
//if (isset($_POST['reg_user'])) {
//    // receive all input values from the form
//    $firstName = mysqli_real_escape_string($link, $_POST['fNameInput']);
//    $lastName = mysqli_real_escape_string($link, $_POST['lNameInput']);
//    $personEmail = mysqli_real_escape_string($link, $_POST['emailInput']);
//    $personConfirmEmail = mysqli_real_escape_string($link, $_POST['confirmEmail']);
//    $personBirthday = mysqli_real_escape_string($link, $_POST['dobInput']);
//    $personUsername = mysqli_real_escape_string($link, $_POST['usernameInput']);
//    $personPassword = mysqli_real_escape_string($link, $_POST['passwordInput']);
//    $personConfirmPassword = mysqli_real_escape_string($link, $_POST['confirmPassword']);
//    // form validation: ensure that the form is correctly filled ...
//    // by adding (array_push()) corresponding error unto $errors array
//    if (empty($firstName)) { array_push($errors, "First name is required"); }
//    if (empty($lastName)) { array_push($errors, "Last name is required"); }
//    if (empty($personEmail)) { array_push($errors, "Email is required"); }
//    if (empty($personConfirmEmail)) { array_push($errors, "Confirm Email is required"); }
//    if (empty($personBirthday)) { array_push($errors, "DOB is required"); }
//    if (empty($personUsername)) { array_push($errors, "Username is required"); }
//    if (empty($personPassword)) { array_push($errors, "Password is required"); }
//    if (empty($personConfirmPassword)) { array_push($errors, "Confirm password is required"); }
//    if ($personPassword != $personConfirmPassword) {
//        array_push($errors, "The two passwords do not match");
//    }
//    if ($personEmail != $personConfirmEmail) {
//        array_push($errors, "The two emails do not match");
//    }
//    // first check the database to make sure
//    // a user does not already exist with the same username and/or email
//    $user_check_query = "SELECT * FROM users WHERE username='$personUsername' OR email='$personEmail' LIMIT 1";
//    $result = mysqli_query($link, $user_check_query);
//    $user = mysqli_fetch_assoc($result);
//    if ($user) { // if user exists
//        if ($user['username'] === $personUsername) {
//            array_push($errors, "Username already exists");
//        }
//        if ($user['email'] === $personEmail) {
//            array_push($errors, "email already exists");
//        }
//    }
//    // Finally, register user if there are no errors in the form
//    if (count($errors) == 0) {
//        $password = md5($personPassword);//encrypt the password before saving in the database
//        $query = "INSERT INTO `users` (`id`, `fName`, `lName`, `email`, `confirmEmail`, `birthday`, `username`, `password`, `confirmPassword`) VALUES (NULL, '$firstName', '$lastName', '$personEmail', '$personConfirmEmail', '$personBirthday', '$personUsername', '$personPassword', '$personConfirmPassword')";
//        echo $query;
//        mysqli_query($link, $query);
//        $_SESSION['username'] = $personUsername;
//        $_SESSION['success'] = "You are now logged in";
//        header('location: home.php');
//    }
