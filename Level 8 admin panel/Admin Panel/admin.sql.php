<?php

require '../Backend/Components/connection.php';
// notification bar

$countNoOfNotification = mysqli_num_rows(mysqli_query($connection, "SELECT * from `topicrequesttoadmin`"));

$totalTopicCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `topics`"));
$totalUsersCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `users`"));
$totalQuestionCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `question`"));
$totalAnswerCount = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM `answer`"));
$questionAnswerRatio = 0;
if ($totalAnswerCount != 0) {
    $questionAnswerRatio = $totalAnswerCount / $totalQuestionCount;
}


// ------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------

// all records




















?>