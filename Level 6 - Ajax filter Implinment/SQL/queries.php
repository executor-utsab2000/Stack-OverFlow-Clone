<?php

require './Backend/Components/connection.php';


// questions.php

// if (isset($_GET['topic_Id'])) {
//     $questionSQL = "SELECT 
//                     question.`question id` , question.userId , question.userId , question.`question title` , question.`question description`,question.`question created at`,
//                     users.username , users.userAvtar 
//                     FROM question LEFT JOIN users ON question.userId = users.userID ;
//                     where question.`topic id` = ;";
// } else {
    $questionSQL = "SELECT 
                    question.`question id` , question.userId , question.`topic id` , question.`question title` , question.`question description`,question.`question created at` ,
                    users.username , users.userAvtar 
                    FROM question LEFT JOIN users ON question.userId = users.userID ORDER BY RAND();";
// }

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


// query 2 => answer details
$answerQuery2 = "select answer.`answer id` ,answer.`user id`, answer.`answer` , answer.`answerImage` , answer.`answer created at`  ,
                users.username , users.userAvtar
                from answer left join users on answer.`user id` = users.`userID` where answer.`question id`="













    ?>