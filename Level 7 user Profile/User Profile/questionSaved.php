<?php
$profileQueryQuestion = "select `question bookmarked`.`bookMark id` , `question bookmarked`.`question id` , question.`question title` , question.`question description` 
                        from `question bookmarked` left join question using(`question id`)
                        where `question bookmarked`.`user id` = '$sessionUser'";
$profileQueryExec2 = mysqli_query($connection, $profileQueryQuestion);
// var_dump($profileQueryExec2);


$profileQueryQuestionSub = "SELECT * FROM `question` WHERE `userId` = '$sessionUser'";
$profileQueryExec2by2 = mysqli_query($connection, $profileQueryQuestionSub);

?>





<ul class="nav nav-pills mb-3 subTabs" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-question-asked"
            type="button" role="tab" aria-controls="pills-question-asked" aria-selected="true">Question Asked</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-question-saved"
            type="button" role="tab" aria-controls="pills-question-saved" aria-selected="false">Question Saved</button>
    </li>
</ul>



<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-question-asked" role="tabpanel"
        aria-labelledby="pills-question-asked-tab" tabindex="0">
        <div class="questionAsked">
            <div class="headerPanel">questions you have Enquired About</div>

            <?php
            while ($questData = mysqli_fetch_assoc($profileQueryExec2by2)) {
                $questionId = $questData['question id'];
                $questionTitle = $questData['question title'];
                $questionDescription = $questData['question description'];

                // var_dump($questData);
                ?>



                <div class="contentContainerBox questionSave">
                    <input type="hidden" value="<?php echo $questionId ?>">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="itemTitle"><?php echo $questionTitle ?></div>
                            <div class="itemDesc"><?php echo $questionDescription ?></div>
                        </div>

                        <div class="col-md-1 btnBooMarkActionContainer my-md-auto my-3">
                            <!-- <a href="./Backend/Question/deleteQuestion.php?questionId=<?php echo $questionId ?>" > -->
                            <button class="btn btnBooMarkAction">
                                <i class="fa-solid fa-pen text-warning"></i>
                            </button>
                            <!-- </a> -->
                            <a href="./Backend/Question/deleteQuestion.php?questionId=<?php echo $questionId ?>">
                                <button class="btn btnBooMarkAction">
                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>






            <?php } ?>
        </div>
    </div>




    <div class="tab-pane fade" id="pills-question-saved" role="tabpanel" aria-labelledby="pills-question-saved-tab"
        tabindex="0">
        <div class="questionSaved">
            <div class="headerPanel">questions you have preserved</div>

            <?php
            while ($questData = mysqli_fetch_assoc($profileQueryExec2)) {
                $bookMarkId = $questData['bookMark id'];
                $questionId = $questData['question id'];
                $questionTitle = $questData['question title'];
                $questionDescription = $questData['question description'];

                ?>


                <div class="contentContainerBox questionSave">
                    <input type="hidden" value="<?php echo $questionId ?>">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="itemTitle"><?php echo $questionTitle ?></div>
                            <div class="itemDesc"><?php echo $questionDescription ?></div>
                        </div>

                        <div class="col-md-1 btnBooMarkActionContainer my-md-auto my-2">
                            <a href="./Backend/Question/deleteQuestion.php?questionId=<?php echo $questionId ?>">
                                <button class="btn btnBooMarkAction">
                                    <i class="fa-solid fa-trash-can text-danger"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>






            <?php } ?>
        </div>
    </div>
</div>


<script>

    const questionSave = document.querySelectorAll('.questionSave');
    console.log(questionSave);

    questionSave.forEach((elm) => {
        elm.addEventListener('click', () => {
            const questionId = elm.querySelector('input').value;
            location.href = `./allAnswers.php?questionId=${questionId}`;
        })
    })

</script>