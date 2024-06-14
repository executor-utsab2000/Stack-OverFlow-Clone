<?php

require '../Components/connection.php';
require '../Components/headerFunction.php';
require '../Components/urlSplit.php';

// var_dump($_POST);

$answerId = $_POST['ansId'];



$currUrlParam = splitUrl($_POST['currUrl']);
$urlParamKey = $currUrlParam['urlParamKey'];
$urlParamValue = $currUrlParam['urlParamValue'];
// echo "$urlParamKey   $urlParamValue";




$getAnsImageQueryExe = mysqli_query($connection, "SELECT * FROM `answer` WHERE `answer id` = '$answerId'");
$answerImage = mysqli_fetch_assoc($getAnsImageQueryExe)['answerImage'];
// var_dump($answerImage);




if ($answerImage != '') {

    foreach (json_decode($answerImage) as $imgs) {
        $imgDelete = unlink("../../Images/Uploads/Answers/$imgs");
    }

    if ($imgDelete) {

        $deleteAns = "DELETE FROM `answer` WHERE  `answer id` = '$answerId'";
        $QueryExec = mysqli_query($connection, $deleteAns);


        if ($imgDelete && $QueryExec) {
            headerFunction(
                '../../allAnswers.php',
                [
                    "$urlParamKey" => "$urlParamValue",
                    'message' => 'Answer Deleted Successfully',
                    'icon' => '<i class="fa-solid fa-check"></i>',
                    'colorClass' => 'success'
                ]
            );
        }
    }
} else {

    $deleteAns = "DELETE FROM `answer` WHERE  `answer id` = '$answerId'";
    $QueryExec = mysqli_query($connection, $deleteAns);


    if ($QueryExec) {
        headerFunction(
            '../../allAnswers.php',
            [
                "$urlParamKey" => "$urlParamValue",
                'message' => 'Answer Deleted Successfully',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        );
    }
}
?>

<!-- headerFunction(
                '../../allAnswers.php',
                [
                    "$qdParamKey" => "$qdParamValue",
                    'message' => 'Answer added Successfully',
                    'icon' => '<i class="fa-solid fa-check"></i>',
                    'colorClass' => 'success'
                ]
            );
        } -->