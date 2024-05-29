<?php

require './Backend/Components/connection.php';


// questions.php

if (isset($_GET['topic_Id'])) {
    $questionSQL = "select 
                    question.`question id` , question.userId ,  question.`question title` , question.`question description`,question.`question created at`,
                    users.username , users.userAvtar 
                    from question left join answer on question.`question id` = answer.`question id` join users on question.userId = users.userID ;
                    where question.`topic id`;";
} else {
    $questionSQL = "select 
                    question.`question id` , question.userId ,  question.`question title` , question.`question description`,question.`question created at`,
                    users.username , users.userAvtar 
                    from question left join answer on question.`question id` = answer.`question id` join users on question.userId = users.userID ;";
}

$QueryExec5 = mysqli_query($connection, $questionSQL);


// save question 
// qustion id 
// userid = session 
// by ajax


// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



// answers.php

// query1 => top questionContainer
$answerQuery1 = "select question.`question id`  , question.`question title`,question.screenShot  , question.`question description` , question.`question created at` , 
                users.userAvtar , users.username 
                from question left join users on question.userId = users.userID where question.`question id`=";

















?>