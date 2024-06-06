<?php

require './Backend/Components/connection.php';

// total topics
$topicAll = "SELECT * FROM `topics`;";
$QueryExec1 = mysqli_query($connection, $topicAll);
$topicCount = mysqli_num_rows($QueryExec1);

$topic = "SELECT * FROM `topics` LIMIT 4  ;";
$QueryExec2 = mysqli_query($connection, $topic);


// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------


// user Count

$userCountQuery = "SELECT * FROM `users`";
$QueryExec3 = mysqli_query($connection, $userCountQuery);
$totalUsers = mysqli_num_rows($QueryExec3);



// -------------------------------------------------------------------------------
// -------------------------------------------------------------------------------


// question Count Count

$questionCountQuery = "SELECT * FROM `question`";
$QueryExec4 = mysqli_query($connection, $questionCountQuery);
$totalQuestions = mysqli_num_rows($QueryExec4);






























































?>