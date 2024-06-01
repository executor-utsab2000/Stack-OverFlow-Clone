<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require '../Components/connection.php';
    require '../Components/headerFunction.php';

    // var_dump($_POST);
    // var_dump(count($_FILES['answerImg']['name']));
    // var_dump($_FILES['answerImg']);
    var_dump($_FILES['answerImg']['size'][0]);
    // var_dump(count($_FILES['answerImg']['name']));


    $questionId = $_POST['questionId'];
    $currQuestUrl = $_POST['currQuestUrl'];
    $answer = htmlspecialchars($_POST['answerDescription']);
    $currQuestUrl = $_POST['currQuestUrl'];


    $ifNoImg = $_FILES['answerImg']['size'][0];
    $totalImgCount = count($_FILES['answerImg']['name']);

    $ansId = uniqid('answer-');
    if ($ifNoImg == 0) {
        $ansWithoutImg = "INSERT INTO `answer` 
                            (`answer id`, `question id`, `user id`, `answer`) 
                            VALUES 
                            ('$ansId', '$questionId', '0', '$answer')";
        $noImgExec = mysqli_query($connection, $ansWithoutImg);

        // if ($noImgExec) {
        //     headerFunction(

        //     );
        // }
    }














}

?>