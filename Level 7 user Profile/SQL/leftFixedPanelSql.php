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


// last tab left panel
$topicQuestionQuery = "select topics.`topic name` , count(question.`topic id`) as `questCount`
from question left join topics 
on question.`topic id` = topics.`topic id` 
group by question.`topic id` 
order by  count(question.`topic id`) desc limit 4;";
$QueryExec7 = mysqli_query($connection, $topicQuestionQuery);

























































?>