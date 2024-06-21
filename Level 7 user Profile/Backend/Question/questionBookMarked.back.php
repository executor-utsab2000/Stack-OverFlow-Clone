<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("location: ../../index.php");
}

var_dump($_GET);
$sessionUser = $_SESSION['userId'];

require '../Components/connection.php';
require '../Components/headerFunction.php';

$questionId = $_GET['questionId'];
$bookMarkId = uniqid('Question-Bookmark-');


$getDataSql = "SELECT * FROM `question bookmarked` where `user id`= '$sessionUser'  AND `question id`='$questionId'";
$resIfData = mysqli_query($connection, $getDataSql);
$ifPresent = mysqli_num_rows($resIfData);

if ($ifPresent === 0) {

    $sql = "INSERT INTO `question bookmarked` (`bookMark id`, `question id`, `user id`) VALUES ('$bookMarkId', '$questionId', '$sessionUser')";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        headerFunction(
            '../../allQuestions.php',
            [
                'message' => 'Question bookmarked successfully',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        );

    }
} else {
    headerFunction(
        '../../allQuestions.php',
        [
            'message' => 'Question Already Bookmarked',
            'icon' => '<i class="fa-solid fa-triangle-exclamation"></i>',
            'colorClass' => 'warning'
        ]
    );

}
?>