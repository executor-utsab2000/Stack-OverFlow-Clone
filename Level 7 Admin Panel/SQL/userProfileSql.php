<?php

require_once './Backend/Components/connection.php';


$sessionUser = $_SESSION['userId'];

$profileQuery1 = "SELECT * FROM `users` WHERE `userID`= '$sessionUser' ";
$profileQueryExec1 = mysqli_fetch_assoc(mysqli_query($connection, $profileQuery1));
// var_dump($profileQueryExec1);

$userId = $profileQueryExec1['userID'];
$userEmail = $profileQueryExec1['userEmail'];
$userDob = $profileQueryExec1['userDob'];

// ------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------





// ------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------



$profileQuery3 = "SELECT question.`question id` , question.`question title` , question.`question description` ,answer.`answer` , `answer bookmarked`.`answer id`  
                    from `answer bookmarked` left join answer on `answer bookmarked`.`answer id` = answer.`answer id` 
                    left join question on `answer bookmarked`.`question id` = question.`question id` 
                    where `answer bookmarked`.`user id` = '$sessionUser' ; ";
$profileQueryExec3 = mysqli_fetch_assoc(mysqli_query($connection, $profileQuery3));
// var_dump($profileQueryExec3);
$questionId = $profileQueryExec3['question id'];
$answerId = $profileQueryExec3['answer id'];
$questionTitle = $profileQueryExec3['question title'];
$questionDesc = $profileQueryExec3['question description'];
$answer = $profileQueryExec3['answer'];




// Answers Successfully Saved
// Answers Stored
// Your Answers Have Been Recorded
// Answers Archived
// Responses Captured
// Answers Secured
// Answers Locked In
// Responses Filed
// Answers Confirmed
// Answers Preserved






















?>