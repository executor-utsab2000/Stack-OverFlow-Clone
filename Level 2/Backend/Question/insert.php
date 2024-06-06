<?php
// session if active

require '../Components/headerFunction.php';
require '../Components/connection.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST);


    $questionId = uniqid("question-");
    $questionTitle = htmlspecialchars($_POST['questionTitle']);
    $questionDescription = htmlspecialchars($_POST['questionDescription']);
    $questionCategory = $_POST['questionCategory'];







    // file
    // var_dump($_FILES);
    $fileName = $_FILES['questionImg']['name'];
    $fileTmpPath = $_FILES['questionImg']['tmp_name'];
    $fileSize = $_FILES['questionImg']['size'];
    $fileError = $_FILES['questionImg']['error'];


    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
    // echo $fileExtension;
    $supportedFileType = ['webp', 'jpg', 'jpeg ', 'png', 'avif'];
    $ifSupportedFileType = in_array($fileExtension, $supportedFileType);
    // var_dump($ifSupportedFileType);
    $maxSize = 1024 * 1024 * 2;

    $serverFileName = uniqid("$questionId-img-");
    $fullNewName = "$serverFileName.$fileExtension";
    // echo $fullNewName;

    $fileSaveLocation = "../../Images/Uploads/Question/$fullNewName";
    // $fileSaveToServer = move_uploaded_file($fileTmpPath, $fileSaveLocation);
    // var_dump($fileSaveToServer);













    if ($fileSize == 0) {
        $insertQuestionSqlNoImg = "INSERT INTO `question` (`question id`, `userId`, `topic id`, `question title`, `question description`    ) 
                                VALUES 
                                ('$questionId ', '0', '$questionCategory', '$questionTitle', '$questionDescription')";
        $queryNoImgExec = mysqli_query($connection, $insertQuestionSqlNoImg);
        if ($queryNoImgExec) {
            headerFunction(
                '../../allQuestions.php',
                'Question added successfully',
                '<i class="fa-solid fa-check"></i>',
                'success'
            );
        }
    } else {

        if ($fileError == 0) {

            if ($fileSize < $maxSize) {

                if ($ifSupportedFileType) {
                    $fileSaveToServer = move_uploaded_file($fileTmpPath, $fileSaveLocation);

                    if ($fileSaveToServer) {

                        $insertQuestionSql = "INSERT INTO `question` 
                        (`question id`, `userId`, `topic id`, `question title`, `question description`, `screenShot`) 
                        VALUES 
                        ('$questionId', '0', '$questionCategory', '$questionTitle', '$questionDescription', '$fullNewName')";

                        $queryExec = mysqli_query($connection, $insertQuestionSql);

                        if ($queryExec) {
                            headerFunction(
                                '../../allQuestions.php',
                                'Question added successfully',
                                '<i class="fa-solid fa-check"></i>',
                                'success'
                            );
                        }
                    }
                } else {
                    headerFunction(
                        '../../questionAdd.php',
                        'Improper file Type',
                        '<i class="fa-solid fa-x"></i>',
                        'danger'
                    );
                }


            } else {
                headerFunction(
                    '../../questionAdd.php',
                    'File too big . Max size 2MB',
                    '<i class="fa-solid fa-x"></i>',
                    'danger'
                );
            }


        } else {
            headerFunction(
                '../../questionAdd.php',
                'There was a problem in file upload try again afer some time',
                '<i class="fa-solid fa-x"></i>',
                'danger'
            );
        }
    }






}




// headerFunction(
//     '../../questionAdd.php',
//     'There was a problem in file upload try again afer some time',
//     '<i class="fa-solid fa-x"></i>',
//     'danger'
// );














?>