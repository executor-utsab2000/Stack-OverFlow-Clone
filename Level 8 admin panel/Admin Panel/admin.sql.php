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
$allTopics = mysqli_query($connection, "select topics.`topic id` , topics.`topic name`,topics.`topic description` , topics.`topic avtar` , topics.`requested by user` , topics.`topic created at` ,
                                            users.`username`
                                            from topics left join users on topics.`requested by user` = users.userID;");





$allUserData = mysqli_query($connection, "
                                            select users.userID , users.username , users.userDob , users.userEmail , users.userAvtar , 
                                            (select count(*) from question group by userId) as `questionCount`,  
                                            (select count(*) from answer group by `user id`) as `answerCount`
                                            from users left join
                                            question on  users.userID = question.userId;
")













    ?>