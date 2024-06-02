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

    // file
    // var_dump($_FILES);
    $fileName = $_FILES['answerImg']['name'];
    $fileTmpPath = $_FILES['answerImg']['tmp_name'];
    $fileSize = $_FILES['answerImg']['size'];
    $fileError = $_FILES['answerImg']['error'];


    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    // echo $fileExtension;
    $supportedFileType = ['webp', 'jpg', 'jpeg ', 'png', 'avif'];
    $ifSupportedFileType = in_array($fileExtension, $supportedFileType);
    // var_dump($ifSupportedFileType);
    $maxSize = 1024 * 1024 * 2;

    $serverFileName = uniqid("$ansId-img-");
    $fullNewName = "$serverFileName.$fileExtension";
    // echo $fullNewName;

    $fileSaveLocation = "../../Images/Uploads/Answers/$fullNewName";
    // $fileSaveToServer = move_uploaded_file($fileTmpPath, $fileSaveLocation);
    // var_dump($fileSaveToServer);








    if ($fileSize == 0) {
        $insertAnswerSqlNoImg = "INSERT INTO `answer` (`answer id`, `question id`, `user id`, `answer`)
                                VALUES 
                                ('$ansId', '$questionId', '1', '$answer')";
        $queryNoImgExec = mysqli_query($connection, $insertAnswerSqlNoImg);
        if ($queryNoImgExec) {
            header("location:../../answers.php?$qdParam");
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
                                                ('$ansId', '$questionId', '1', '$answer', '$fullNewName')";

                        $queryExec = mysqli_query($connection, $insertQuestionSql);

                        if ($queryExec) {
                            header("location:../../answers.php?$qdParam");
                        }
                    }
                } else {
                    header("location:../../insertAnswer.php?$qdParam");
                }


            } else {
                header("location:../../insertAnswer.php?$qdParam");
            }


        } else {
            header("location:../../insertAnswer.php?$qdParam");
        }
    }














}

?>