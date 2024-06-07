<?php
var_dump($_GET);

require '../Components/connection.php';
require '../Components/headerFunction.php';

$questionId = $_GET['questionId'];
$bookMarkId = uniqid('Question-Bookmark-');


$getDataSql = "SELECT * FROM `question bookmarked` where `user id`=0  AND `question id`='$questionId'";
$resIfData = mysqli_query($connection, $getDataSql);
$ifPresent = mysqli_num_rows($resIfData);

if ($ifPresent === 0) {

    $sql = "INSERT INTO `question bookmarked` (`bookMark id`, `question id`, `user id`) VALUES ('$bookMarkId', '$questionId', '0')";
    $res = mysqli_query($connection, $sql);
    if ($res) {
        headerFunction(
            "../../allQuestions.php",
            'Question Bookmarked Successfully',
            '<i class="fa-solid fa-check"></i>',
            'success'
        );

    }
} else {
    headerFunction(
        "../../allQuestions.php",
        'Question Already Bookmarked ',
        '<i class="fa-solid fa-triangle-exclamation"></i>',
        'warning'
    );
}
?>