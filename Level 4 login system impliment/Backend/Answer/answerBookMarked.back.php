<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header("location: ../../index.php");
}

$sessionUser = $_SESSION['userId'];

// var_dump($_GET);

require '../Components/connection.php';
require '../Components/headerFunction.php';

$questionId = $_GET['questionId'];
$answerId = $_GET['answerId'];
$currUrl = urldecode($_GET['currUrl']);
// echo $currUrl;

$param = explode('?', $currUrl)[1];
// var_dump($param);

$questionParam = explode('&', $param)[0];
$answerParam = explode('&', $param)[1];

$bookMarkId = uniqid('Answer-Bookmark-');

$ifAnswerPresent = "SELECT * FROM `answer bookmarked` WHERE `question id` ='$questionId' AND `answer id`= '$answerId' AND `user id` = '$sessionUser' ";
$queryExec = mysqli_query($connection, $ifAnswerPresent);
// var_dump($queryExec);

if (mysqli_num_rows($queryExec) === 0) {

    $sql = "INSERT INTO `answer bookmarked`(`bookMark id`, `question id`, `answer id`, `user id`) VALUES ('$bookMarkId','$questionId','$answerId','$sessionUser')";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        headerFunction(
            '../../question.Answers.php',
            [
                explode('=', $questionParam)[0] => explode('=', $questionParam)[1],
                explode('=', $answerParam)[0] => explode('=', $answerParam)[1],
                'message' => 'Answer bookmarked successfully',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        );

    }
} else {
    headerFunction(
        '../../question.Answers.php',
        [
            explode('=', $questionParam)[0] => explode('=', $questionParam)[1],
            explode('=', $answerParam)[0] => explode('=', $answerParam)[1],
            'message' => 'Answer Already Bookmarked',
            'icon' => '<i class="fa-solid fa-triangle-exclamation"></i>',
            'colorClass' => 'warning'
        ]
    );

}

?>