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
    $supportedFileType = ['webp', 'jpg', 'jpeg ', 'png', 'avif'];

    $ifSupportedFileType = in_array($fileExtension, $supportedFileType);
    $maxSize = 1024 * 1024 * 2;

    $serverFileName = uniqid("$questionId-img-");
    $fullNewName = "$serverFileName.$fileExtension";

    $fileSaveLocation = "../../Images/Uploads/Question/$fullNewName";






    if ($fileSize == 0) {
        $insertQuestionSqlNoImg = "INSERT INTO `question` (`question id`, `userId`, `topic id`, `question title`, `question description`    ) 
                                VALUES 
                                ('$questionId ', '0', '$questionCategory', '$questionTitle', '$questionDescription')";
        $queryNoImgExec = mysqli_query($connection, $insertQuestionSqlNoImg);
        if ($queryNoImgExec) {
            headerFunction(
                '../../allQuestions.php',
                [
                    'message' => 'Question added successfully',
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

                        $insertQuestionSql = "INSERT INTO `question` 
                        (`question id`, `userId`, `topic id`, `question title`, `question description`, `screenShot`) 
                        VALUES 
                        ('$questionId', '0', '$questionCategory', '$questionTitle', '$questionDescription', '$fullNewName')";

                        $queryExec = mysqli_query($connection, $insertQuestionSql);

                        if ($queryExec) {
                            headerFunction(
                                '../../allQuestions.php',
                                [
                                    'message' => 'Question added successfully',
                                    'icon' => '<i class="fa-solid fa-check"></i>',
                                    'colorClass' => 'success'
                                ]
                            );
                        }
                    }
                } else {
                    headerFunction(
                        '../../questionAdd.php',
                        [
                            'message' => 'Improper file Type',
                            'icon' => '<i class="fa-solid fa-x"></i>',
                            'colorClass' => 'danger'
                        ]
                    );
                }


            } else {
                headerFunction(
                    '../../questionAdd.php',
                    [
                        'message' => 'File too big . Max size 2MB',
                        'icon' => '<i class="fa-solid fa-x"></i>',
                        'colorClass' => 'danger'
                    ]
                );
            }


        } else {
            headerFunction(
                '../../questionAdd.php',
                [
                    'message' => 'There was a problem in file upload try again afer some time',
                    'icon' => '<i class="fa-solid fa-x"></i>',
                    'colorClass' => 'danger'
                ]
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