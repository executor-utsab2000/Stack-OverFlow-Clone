<?php


session_start();
if (!isset($_SESSION['userId'])) {
    header("location: ../../index.php");
}

$sessionUser = $_SESSION['userId'];


if (!isset($_GET['deleteCriteria'])) {
    header("location: ../../index.php");
}

// var_dump($_GET);
require './Components/headerFunction.php';
require './Components/connection.php';



if (isset($_GET['deleteCriteria'])) {

    if ($_GET['deleteCriteria'] == 'allQuestions') {
        $sql = "DELETE FROM `question` WHERE `userId` ='$sessionUser'";
    }
    //  delete all answer 
    elseif ($_GET['deleteCriteria'] == 'allAnswers') {
        $sql = "DELETE FROM `answer` WHERE`user id` ='$sessionUser'";
    }

    $deleteQueryExec = mysqli_query($connection, $sql);
    if ($deleteQueryExec) {
        headerFunction(
            '../userProfile.php',
            [
                'message' => 'Action executed successfully',
                'icon' => '<i class="fa-solid fa-check"></i>',
                'colorClass' => 'success'
            ]
        );
    }
}


// ---------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------
elseif (isset($_GET['deleteUser'])) {
    if ($_GET['deleteUser'] == 'accountDetails') {
        $sql = "DELETE FROM `users` WHERE `userID` ='$sessionUser'";
        $deleteQueryUserExec = mysqli_query($connection, $sql);
        if ($deleteQueryUserExec) {
            headerFunction(
                '../index.php',
                [
                    'message' => 'User deleted successfully',
                    'icon' => '<i class="fa-solid fa-check"></i>',
                    'colorClass' => 'success'
                ]
            );
            session_unset();
            session_destroy();
        }
    }
}






















































?>