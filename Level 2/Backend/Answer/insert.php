<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require '../Components/connection.php';
    require '../Components/headerFunction.php';

    $ansId = uniqid('answer-');

    $questionId = $_POST['questionId'];
    $currQuestUrl = $_POST['currQuestUrl'];
    $answer = htmlspecialchars($_POST['answerDescription']);


    $currQuestUrl = $_POST['currQuestUrl'];
    $qdParam = explode("?", $currQuestUrl)[1];
    $qdParamKey = explode('=', $qdParam)[0];
    $qdParamValue = explode('=', $qdParam)[1];
    // echo $qdParam;

    if (strpos($qdParam, 'message') == true) {
        $qdParamValue = explode('&', $qdParamValue)[0];
    }


    // file
    $fileName = $_FILES['answerImg']['name'];
    $fileTmpPath = $_FILES['answerImg']['tmp_name'];
    $fileSize = $_FILES['answerImg']['size'];
    $fileError = $_FILES['answerImg']['error'];


    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $supportedFileType = ['webp', 'jpg', 'jpeg ', 'png', 'avif'];
    $ifSupportedFileType = in_array($fileExtension, $supportedFileType);
    $maxSize = 1024 * 1024 * 2;

    $serverFileName = uniqid("$ansId-img-");
    $fullNewName = "$serverFileName.$fileExtension";

    $fileSaveLocation = "../../Images/Uploads/Answers/$fullNewName";



    if ($fileSize == 0) {
        $insertAnswerSqlNoImg = "INSERT INTO `answer` (`answer id`, `question id`, `user id`, `answer`)
                                VALUES 
                                ('$ansId', '$questionId', '0', '$answer')";
        $queryNoImgExec = mysqli_query($connection, $insertAnswerSqlNoImg);
        if ($queryNoImgExec) {
            headerFunction(
                '../../answers.php',
                [
                    "$qdParamKey" => "$qdParamValue",
                    'message' => 'Answer added Successfully',
                    'icon' => '<i class="fa-solid fa-check"></i>',
                    'colorClass' => 'success'
                ]
            );
        }
    } else {

        if ($fileError == 0) {

            if ($fileSize < $maxSize) {

                if ($ifSupportedFileType) {
                    $fileSaveToServer = move_uploaded_file($fileTmpPath, $fileSaveLocation);

                    if ($fileSaveToServer) {

                        $insertQuestionSql = "INSERT INTO `answer` 
                                                    (`answer id`, `question id`, `user id`, `answer`, `answerImage`) 
                                                    VALUES 
                                                    ('$ansId', '$questionId', '0', '$answer', '$fullNewName')";

                        $queryExec = mysqli_query($connection, $insertQuestionSql);

                        if ($queryExec) {
                            headerFunction(
                                '../../answers.php',
                                [
                                    "$qdParamKey" => "$qdParamValue",
                                    'message' => 'Answer added Successfully',
                                    'icon' => '<i class="fa-solid fa-check"></i>',
                                    'colorClass' => 'success'
                                ]
                            );
                        }
                    }
                } else {
                    headerFunction(
                        '../../insertAnswer.php',
                        [
                            "$qdParamKey" => "$qdParamValue",
                            'message' => 'File type not supported',
                            'icon' => '<i class="fa-solid fa-x"></i>',
                            'colorClass' => 'danger'
                        ]
                    );
                }


            } else {
                headerFunction(
                    '../../insertAnswer.php',
                    [
                        "$qdParamKey" => "$qdParamValue",
                        'message' => 'File size must be within 2MB',
                        'icon' => '<i class="fa-solid fa-x"></i>',
                        'colorClass' => 'danger'
                    ]
                );
            }


        } else {
            headerFunction(
                '../../insertAnswer.php',
                [
                    "$qdParamKey" => "$qdParamValue",
                    'message' => 'Error in Image Upload',
                    'icon' => '<i class="fa-solid fa-x"></i>',
                    'colorClass' => 'danger'
                ]
            );
        }
    }














}

?>