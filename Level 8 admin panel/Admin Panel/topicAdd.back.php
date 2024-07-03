<?php

require '../Backend/Components/headerFunction.php';
require '../Backend/Components/connection.php';

// var_dump($_POST);
// var_dump($_FILES);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    $topicId = uniqid("topic-");
    $userId = $_POST['userId'];
    $topicName = htmlspecialchars($_POST['topicName']);
    $topicDesc = htmlspecialchars($_POST['topicDesc']);
    $reqToAdminId = $_POST['reqToAdminId'];




    // file
    // var_dump($_FILES);
    $fileName = $_FILES['topicAvtar']['name'];
    $fileTmpPath = $_FILES['topicAvtar']['tmp_name'];
    $fileSize = $_FILES['topicAvtar']['size'];
    $fileError = $_FILES['topicAvtar']['error'];


    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    $supportedFileType = ['webp', 'jpg', 'jpeg ', 'png', 'avif'];

    $ifSupportedFileType = in_array($fileExtension, $supportedFileType);
    $maxSize = 1024 * 1024 * 2;

    $serverFileName = uniqid("$topicId-img-");
    $fullNewName = "$serverFileName.$fileExtension";

    $fileSaveLocation = "../Images/Uploads/Topic/$fullNewName";



    if ($fileError == 0) {

        if ($fileSize < $maxSize) {

            if ($ifSupportedFileType) {
                $fileSaveToServer = move_uploaded_file($fileTmpPath, $fileSaveLocation);

                if ($fileSaveToServer) {

                    $insertQuestionSql = "INSERT INTO `topics`
                                                (`topic id`, `topic name`, `topic description`, `topic avtar`, `requested by user`) 
                                                VALUES 
                                                ('$topicId','$topicName','$topicDesc','$fullNewName','$userId')";

                    $queryExec = mysqli_query($connection, $insertQuestionSql);

                    if ($queryExec) {
                        headerFunction(
                            './index.php',
                            [
                                'message' => 'Topic added successfully',
                                'icon' => '<i class="fa-solid fa-check"></i>',
                                'colorClass' => 'success'
                            ]
                        );

                        $sql = mysqli_query($connection, "DELETE FROM topicrequesttoadmin WHERE `topicrequesttoadmin`.`id` = '$reqToAdminId'");

                    }
                }
            } else {
                headerFunction(
                    './topicAdd.php.php',
                    [
                        'message' => 'Improper file Type',
                        'icon' => '<i class="fa-solid fa-x"></i>',
                        'colorClass' => 'danger'
                    ]
                );
            }


        } else {
            headerFunction(
                './topicAdd.php.php',
                [
                    'message' => 'File too big . Max size 2MB',
                    'icon' => '<i class="fa-solid fa-x"></i>',
                    'colorClass' => 'danger'
                ]
            );
        }


    } else {
        headerFunction(
            './topicAdd.php.php',
            [
                'message' => 'There was a problem in file upload try again afer some time',
                'icon' => '<i class="fa-solid fa-x"></i>',
                'colorClass' => 'danger'
            ]
        );
    }
}














?>