<?php

$profileHomeSummary1 = "select topics.`topic name` , count(question.`topic id`) from question left join topics using(`topic id`)
                        where question.`userId` =  '$sessionUser' 
                        group by question.`topic id` 
                        order by count(question.`topic id`) desc  ;";
$profileHomeSummary1Exec = mysqli_query($connection, $profileHomeSummary1);

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------


$profileHomeSummary2 = "select count(DISTINCT `question id`) from answer where `user id` = '$sessionUser' ;";
$profileHomeSummary2Exec = mysqli_query($connection, $profileHomeSummary2);


// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------



$profileHomeSummary3 = "select count(`bookMark id`) from `question bookmarked`  where `user id` = '$sessionUser' ;";
$profileHomeSummary3Exec = mysqli_query($connection, $profileHomeSummary3);

// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------



$profileHomeSummary4 = "select count(`question id`) from question  where `userId` = '$sessionUser' ;";
$profileHomeSummary4Exec = mysqli_query($connection, $profileHomeSummary4);


// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------


$profileHomeSummary5 = "select count(`bookMark id`) from `answer bookmarked`  where `user id` = '$sessionUser' ;";
$profileHomeSummary5Exec = mysqli_query($connection, $profileHomeSummary5);







?>

<style>
    .homeSummary .itemContent {
        margin-top: 1rem;
        font-weight: 800;
        font-size: 0.6rem;
        letter-spacing: 0.5px;
        color: red;
    }

    .itemContent li {
        line-height: 5px;
    }
</style>







<div class="homeSummary">
    <div class="contentContainerBox">
        <div class="itemTitle">Questions of Topics you have posted</div>
        <div class="itemContent">
            <?php
            while ($tab1HomeSummary = mysqli_fetch_assoc($profileHomeSummary1Exec)) {
                $countNo = $tab1HomeSummary['count(question.`topic id`)'];
                $topicName = $tab1HomeSummary['topic name'];

                echo "
                <div class=''>
                    <ul>
                    <li>$topicName : $countNo Question Only</li>               
                    </ul>               
                </div>
                ";
            }


            ?>
        </div>
    </div>


    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



    <div class="contentContainerBox">
        <div class="itemTitle">Total Questions Answered</div>
        <div class="itemContent">
            <?php
            $totalQuestionsAnswered = mysqli_fetch_assoc($profileHomeSummary2Exec)['count(DISTINCT `question id`)'];
            echo "$totalQuestionsAnswered  Questions Answered";
            ?>
        </div>
    </div>

    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <div class="contentContainerBox">
        <div class="itemTitle">Total Questions Asked</div>
        <div class="itemContent">
            <?php
            $totalQuestionAsked = mysqli_fetch_assoc($profileHomeSummary4Exec)["count(`question id`)"];
            echo "$totalQuestionAsked Questions Asked";
            ?>
        </div>
    </div>

    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


    <div class="contentContainerBox">
        <div class="itemTitle">Total Questions Saved</div>
        <div class="itemContent">
            <?php
            $totalQuestionsSaved = mysqli_fetch_assoc($profileHomeSummary3Exec)["count(`bookMark id`)"];
            echo "$totalQuestionsSaved Questions Saved";
            ?>
        </div>
    </div>

    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

    <div class="contentContainerBox">
        <div class="itemTitle">Total Answers Saved</div>
        <div class="itemContent">
            <?php
            $totalQuestionsSaved = mysqli_fetch_assoc($profileHomeSummary5Exec)["count(`bookMark id`)"];
            echo "$totalQuestionsSaved Questions Saved";
            ?>
        </div>
    </div>


    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
</div>