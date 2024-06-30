<?php

session_start();
if (!isset($_SESSION['userId'])) {
    header("location: ../../index.php");
}

$sessionUser = $_SESSION['userId'];

require '../Components/connection.php';
require '../Components/headerFunction.php';

// var_dump($_GET);



$bookmarkId = $_GET['bookmarkId'];
$response = mysqli_query($connection, "DELETE FROM `answer bookmarked` WHERE `bookMark id` = '$bookmarkId'");
if ($response) {
    headerFunction(
        '../../userProfile.php',
        [
            'message' => 'Bookmarked Answer Deleted Successfully',
            'icon' => '<i class="fa-solid fa-check"></i>',
            'colorClass' => 'success'
        ]
    );
}


?>