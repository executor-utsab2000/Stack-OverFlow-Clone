<?php

require '../Components/connection.php';
require '../Components/headerFunction.php';

// var_dump($_POST);

$answerId = $_POST['ansId'];
$currUrlParam = $_POST['currUrl'];
$urlParamKey = explode('=', explode('&', $currUrlParam)[0])[0];
$urlParamValue = explode('=', explode('&', $currUrlParam)[0])[1];



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
                '../../answers.php',
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
            '../../answers.php',
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
                '../../answers.php',
                [
                    "$qdParamKey" => "$qdParamValue",
                    'message' => 'Answer added Successfully',
                    'icon' => '<i class="fa-solid fa-check"></i>',
                    'colorClass' => 'success'
                ]
            );
        } -->