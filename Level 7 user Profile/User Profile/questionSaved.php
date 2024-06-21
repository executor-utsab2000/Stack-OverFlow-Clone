<?php
$profileQueryQuestion = "select `question bookmarked`.`bookMark id` , `question bookmarked`.`question id` , question.`question title` , question.`question description` 
                        from `question bookmarked` left join question using(`question id`)
                        where `question bookmarked`.`user id` = '$sessionUser'";
$profileQueryExec2 = mysqli_query($connection, $profileQueryQuestion);
// var_dump($profileQueryExec2);

?>

<div class="questionSaved">
    <div class="headerPanel">questions you have preserved</div>

    <?php
    while ($questData = mysqli_fetch_assoc($profileQueryExec2)) {
        $bookMarkId = $questData['bookMark id'];
        $questionId = $questData['question id'];
        $questionTitle = $questData['question title'];
        $questionDescription = $questData['question description'];

        ?>


        <a href="allAnswers.php?questionId=<?php echo $questionId ?>" class="nav-link">
            <div class="contentContainerBox">
                <div>
                    <div class="questionTitle"><?php echo $questionTitle ?></div>
                    <div class="questionDesc"><?php echo $questionDescription ?></div>
                </div>


                <a href="./Backend/Question/deleteBookmarkedQuestion.php?bookMarkId=<?php echo $bookMarkId ?>">
                    <button class="btn deleteQuestBookMarked">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </a>
            </div>
        </a>






    <?php } ?>
</div>