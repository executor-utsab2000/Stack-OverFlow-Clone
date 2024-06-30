<?php

session_start();
if (!isset($_SESSION['userId'])) {
    header("location: ../../index.php");
}

// $sessionUser = $_SESSION['userId'];

require '../Components/connection.php';
require '../Components/headerFunction.php';

// var_dump($_GET);



$bookMarkId = $_GET['bookMarkId'];
$response = mysqli_query($connection, "DELETE FROM `question bookmarked` WHERE `bookMark id` = '$bookMarkId'");
if ($response) {
    headerFunction(
        '../../userProfile.php',
        [
            'message' => 'Bookmarked Question Deleted Successfully',
            'icon' => '<i class="fa-solid fa-check"></i>',
            'colorClass' => 'success'
        ]
    );
    // var_dump($response);
}


?>