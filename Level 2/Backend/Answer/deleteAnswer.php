<?php

require '../Components/connection.php';
require '../Components/headerFunction.php';

var_dump($_POST);

$answerId = $_POST['ansId'];
$currUrlParam = $_POST['currUrl'];
// echo $answerId;
$getAnsImageQueryExe = mysqli_query($connection, "SELECT * FROM `answer` WHERE `answer id` = '$answerId'");
$answerImage = mysqli_fetch_assoc($getAnsImageQueryExe)['answerImage'];
// var_dump($answerImage);


if ($answerImage != '') {
    $imgDelete = unlink("../../Images/Uploads/Answers/$answerImage");
    // var_dump($imgDelete);

    if ($imgDelete) {

        $deleteAns = "DELETE FROM `answer` WHERE  `answer id` = '$answerId'";
        $QueryExec = mysqli_query($connection, $deleteAns);


        if ($imgDelete && $QueryExec) {
            header("location:../../answers.php?$currUrlParam");
        }
    }
} else {

    $deleteAns = "DELETE FROM `answer` WHERE  `answer id` = '$answerId'";
    $QueryExec = mysqli_query($connection, $deleteAns);


    if ($QueryExec) {
        header("location:../../answers.php?$currUrlParam");
    }
}
?>