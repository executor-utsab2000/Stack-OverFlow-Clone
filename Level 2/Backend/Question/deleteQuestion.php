<?php

// if session active and question id is send by get req

if ($_GET['questionId']) {

    require '../Components/headerFunction.php';
    require '../Components/connection.php';


    $questionId = $_GET['questionId'];

    $questionQuery = "SELECT * FROM question WHERE `question id`= '$questionId'";
    $queryExec = mysqli_query($connection, $questionQuery);
    $questionData = mysqli_fetch_assoc($queryExec);
    // var_dump($questionData);
    $img = $questionData['screenShot'];

    $res = mysqli_query($connection, "SELECT * FROM `answer` WHERE `question id`= '$questionId'");

    $ifAllAnsImgDeleted = true;
    while ($ansimage = mysqli_fetch_assoc($res)) {

        $ansImg = $ansimage['answerImage'];
        $answerImgDelete = unlink("../../Images/Uploads/Answers/$ansImg");

        if (!$answerImgDelete) {
            $ifAllAnsImgDeleted = false;
            break;
        }
    }



    $deleteImg = unlink("../../Images/Uploads/Question/$img");
    $deleteData = mysqli_query($connection, "DELETE FROM `question` WHERE `question id`= '$questionId'");


    if ($deleteData && $deleteImg && $ifAllAnsImgDeleted) {
        headerFunction(
            '../../allQuestions.php',
            [
                'message' => 'Question deleted successfully',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        );
    }

} else {
    headerFunction(
        '../../allQuestions.php',
    );
}













?>