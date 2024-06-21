<?php
$profileQuery3 = "SELECT question.`question id` , question.`question title` , question.`question description` ,answer.`answer` , `answer bookmarked`.`answer id`  
from `answer bookmarked` left join answer on `answer bookmarked`.`answer id` = answer.`answer id` 
left join question on `answer bookmarked`.`question id` = question.`question id` 
where `answer bookmarked`.`user id` = '$sessionUser' ; ";
$profileQueryExec3 = mysqli_query($connection, $profileQuery3);
// var_dump($profileQueryExec3);
// $questionId = $profileQueryExec3['question id'];
// $answerId = $profileQueryExec3['answer id'];
// $questionTitle = $profileQueryExec3['question title'];
// $questionDesc = $profileQueryExec3['question description'];
// $answer = $profileQueryExec3['answer'];

?>

<div class="answerSaved">
    <div class="headerPanel">Answer you have preserved</div>

    <?php
    while ($ansData = mysqli_fetch_assoc($profileQueryExec3)) {
        $questionId = $ansData['question id'];
        $answerId = $ansData['answer id'];
        $questionTitle = $ansData['question title'];
        $questionDesc = $ansData['question description'];
        $answer = $ansData['answer'];

        ?>


        <a href="question.Answers.php?questionId=<?php echo $questionId ?>&answerId=<?php echo $answerId ?>"
            class="nav-link">
            <div class="contentContainerBox">

                <div>
                    <div class="questionTitle my-1"><?php echo $questionTitle ?></div>
                    <div class="questionDesc my-1"><?php echo $questionDesc ?></div>
                    <div class="answerDesc mt-3"><?php echo $answer ?></div>
                </div>

                <a href="#">
                    <button class="btn deleteAnsBookMarked">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </a>

            </div>
        </a>






    <?php } ?>
</div>