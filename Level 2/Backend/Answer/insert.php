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

    $fileIfPresent = $_FILES['answerImg']['size'][0];
    $totalFileCount = count($_FILES['answerImg']['size']);


    $ifAllImgsCorrect = [];

    if ($fileIfPresent == 0) {
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
    } elseif ($totalFileCount <= 5) {

        for ($i = 0; $i < $totalFileCount; $i++) {
            $fileName = $_FILES['answerImg']['name'][$i];
            // $fileTmpPath = $_FILES['answerImg']['tmp_name'][$i];
            $fileSize = $_FILES['answerImg']['size'][$i];
            $fileError = $_FILES['answerImg']['error'][$i];


            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $supportedFileType = ['webp', 'jpg', 'jpeg ', 'png', 'avif'];
            $ifSupportedFileType = in_array($fileExtension, $supportedFileType);
            $maxSize = 1024 * 1024 * 2;

            if ($fileError == 0) {
                if ($ifSupportedFileType) {
                    if ($fileSize < $maxSize) {
                        array_push($ifAllImgsCorrect, true);
                    } else {
                        headerFunction(
                            '../../insertAnswer.php',
                            [
                                "$qdParamKey" => "$qdParamValue",
                                'message' => "File  with name $fileSize size must be within 2MB",
                                'icon' => '<i class="fa-solid fa-x"></i>',
                                'colorClass' => 'danger'
                            ]
                        );
                        exit();
                    }
                } else {
                    headerFunction(
                        '../../insertAnswer.php',
                        [
                            "$qdParamKey" => "$qdParamValue",
                            'message' => "File with name $fileName type not supported",
                            'icon' => '<i class="fa-solid fa-x"></i>',
                            'colorClass' => 'danger'
                        ]
                    );
                    exit();
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
                exit();
            }

        }
    } else {
        headerFunction(
            '../../insertAnswer.php',
            [
                "$qdParamKey" => "$qdParamValue",
                'message' => 'Maximum 5 files can be posted',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        );
    }

    // ------------------------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------------------------



    $imagesAnswerArray = [];

    if ($totalFileCount == count($ifAllImgsCorrect)) {
        for ($i = 0; $i < $totalFileCount; $i++) {
            $fileName = $_FILES['answerImg']['name'][$i];
            $fileTmpPath = $_FILES['answerImg']['tmp_name'][$i];

            $serverFileName = uniqid("$ansId-img-");
            $fullNewName = "$serverFileName.$fileExtension";
            $fileSaveLocation = "../../Images/Uploads/Answers/$fullNewName";

            $fileSaveToServer = move_uploaded_file($fileTmpPath, $fileSaveLocation);
            if ($fileSaveToServer) {
                array_push($imagesAnswerArray, $fullNewName);
            }
        }
        $imgArrayJson = json_encode($imagesAnswerArray);
        $insertSQl = "INSERT INTO `answer` 
                        (`answer id`, `question id`, `user id`, `answer`, `answerImage`) 
                        VALUES 
                        ('$ansId', '$questionId', '0', '$answer', '$imgArrayJson')";
        $response = mysqli_query($connection, $insertSQl);
        if ($response) {
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












}


?>