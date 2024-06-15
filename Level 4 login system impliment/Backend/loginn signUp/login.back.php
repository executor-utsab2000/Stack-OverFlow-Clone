<?php

require '../Components/connection.php';
require '../Components/headerFunction.php';



// var_dump($_POST);


$email = $_POST['email'];
$password = $_POST['password'];

$ifUserPresentQueryExec = mysqli_query($connection, "SELECT * FROM `users` WHERE `userEmail`= '$email'");
$noOfRows = mysqli_num_rows($ifUserPresentQueryExec);













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