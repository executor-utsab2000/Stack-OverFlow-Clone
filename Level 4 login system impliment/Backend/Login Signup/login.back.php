<?php

require '../Components/connection.php';
require '../Components/headerFunction.php';



// var_dump($_POST);


$email = $_POST['email'];
$password = $_POST['password'];

$ifUserPresentQueryExec = mysqli_query($connection, "SELECT * FROM `users` WHERE `userEmail`= '$email'");
$noOfRows = mysqli_num_rows($ifUserPresentQueryExec);

$userData = mysqli_fetch_assoc($ifUserPresentQueryExec);
// var_dump($userData);
$dbPassword = $userData['userPassword'];
$userId = $userData['userID'];



if ($noOfRows == 1) {
    if ($password == $dbPassword) {

        session_start();
        $_SESSION['userId'] = $userId;

        headerFunction(
            '../../index.php',
            [
                'message' => 'Login Successful',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        );


    } else {
        headerFunction(
            '../../login_SignUp.php',
            [
                'message' => 'Password Incorrect',
                'icon' => '<i class="fa-solid fa-x"></i>',
                'colorClass' => 'danger'
            ]
        );
    }
} else {
    headerFunction(
        '../../login_SignUp.php',
        [
            'message' => 'No User registered on this email',
            'icon' => '<i class="fa-solid fa-x"></i>',
            'colorClass' => 'danger'
        ]
    );
}














?>


<!-- 
headerFunction(
            '../../question.Answers.php',
            [
                explode('=', $questionParam)[0] => explode('=', $questionParam)[1],
                explode('=', $answerParam)[0] => explode('=', $answerParam)[1],
                'message' => 'Answer bookmarked successfully',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        ); -->