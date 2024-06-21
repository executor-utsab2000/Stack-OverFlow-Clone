<?php
var_dump($_POST);

require '../Components/connection.php';
require '../Components/headerFunction.php';

$email = $_REQUEST['email'];
$name = $_REQUEST['name'];
$dob = $_REQUEST['dob'];
$password = $_REQUEST['password'];


$ifUserPresent = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `users` where `userEmail` = '$email'"));

if ($ifUserPresent == 0) {


    $userId = uniqid('user-');
    $passHash = password_hash($password , PASSWORD_DEFAULT);
    $insertQueryRegister = "INSERT INTO `users`
                            (`userID`, `username`, `userEmail`, `userDob`, `userPassword`) 
                            VALUES 
                            ('$userId','$name','$email','$dob','$passHash')";

    $response = mysqli_query($connection, $insertQueryRegister);

    if ($response) {

        session_start();
        $_SESSION['userId'] = $userId;

        headerFunction(
            '../../index.php',
            [
                'message' => 'You have registered Successfully',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        );
    }




} else {
    headerFunction(
        '../../login_SignUp.php',
        [
            'message' => 'Email Already Registered with some User',
            'icon' => '<i class="fa-solid fa-x"></i>',
            'colorClass' => 'danger'
        ]
    );
}




?>