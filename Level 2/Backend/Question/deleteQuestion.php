<?php

// if session active and question id is send by get req

if (isset($_GET['questionId'])) {

    require '../Components/headerFunction.php';
    require '../Components/connection.php';


    $questionId = $_GET['questionId'];

    $questionQuery = "SELECT * FROM question WHERE `question id`= '$questionId'";
    $queryExec = mysqli_query($connection, $questionQuery);
    $questionData = mysqli_fetch_assoc($queryExec);
    // var_dump($questionData);

    $questionImg = $questionData['screenShot'];


    if ($questionImg == NULL) {

        $res = mysqli_query($connection, "SELECT * FROM `answer` WHERE `question id`= '$questionId'");
        while ($answer = mysqli_fetch_assoc($res)) {
            // var_dump($answer);
            if ($answer['answerImage'] != NULL) {
                $answerImage = json_decode($answer['answerImage']);
                foreach ($answerImage as $img) {
                    unlink("../../Images/Uploads/Answers/$img");
                }
                ;
            }

            $deleteQuestion = mysqli_query($connection, "DELETE FROM question WHERE `question`.`question id` = '$questionId'");
            if ($deleteQuestion) {
                headerFunction(
                    '../../allQuestions.php',
                    [
                        'message' => 'Question Deleted Successfully',
                        'icon' => '<i class="fa-solid fa-check"></i>',
                        'colorClass' => 'success'
                    ]
                );
            }

        }
    }

    // if question img
    else {

        unlink("../../Images/Uploads/Question/$questionImg");

        $res = mysqli_query($connection, "SELECT * FROM `answer` WHERE `question id`= '$questionId'");
        while ($answer = mysqli_fetch_assoc($res)) {
            // var_dump($answer);
            if ($answer['answerImage'] != NULL) {
                $answerImage = json_decode($answer['answerImage']);
                foreach ($answerImage as $img) {
                    unlink("../../Images/Uploads/Answers/$img");
                }
                ;
            }

            $deleteQuestion = mysqli_query($connection, "DELETE FROM question WHERE `question`.`question id` = '$questionId'");
            if ($deleteQuestion) {
                headerFunction(
                    '../../allQuestions.php',
                    [
                        'message' => 'Question Deleted Successfully',
                        'icon' => '<i class="fa-solid fa-check"></i>',
                        'colorClass' => 'success'
                    ]
                );
            }

        }
    }


    // ----end  ----
}



?>