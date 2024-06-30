<?php
$profileQueryAnswerSaved = "SELECT question.`question id` , question.`question title` , question.`question description` ,answer.`answer` , `answer bookmarked`.`answer id`  , `answer bookmarked`.`bookMark id`  
                                from `answer bookmarked` left join answer on `answer bookmarked`.`answer id` = answer.`answer id` 
                                left join question on `answer bookmarked`.`question id` = question.`question id` 
                                where `answer bookmarked`.`user id` = '$sessionUser' ; ";
$profileQueryExec3 = mysqli_query($connection, $profileQueryAnswerSaved);




$profileQueryAnswerProvided = "SELECT question.`question id` , answer.`answer id`, question.`question title` , question.`question description` , answer.`answer`  from answer left join question 
                                using(`question id`) where answer.`user id` = '$sessionUser'";
$profileQueryExec2by2 = mysqli_query($connection, $profileQueryAnswerProvided);
?>








<ul class="nav nav-pills mb-3 subTabs" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-answer-asked"
            type="button" role="tab" aria-controls="pills-answer-asked" aria-selected="true">Answers Provided</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-answer-saved"
            type="button" role="tab" aria-controls="pills-answer-saved" aria-selected="false">Answers Saved</button>
    </li>
</ul>



<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-answer-asked" role="tabpanel"
        aria-labelledby="pills-answer-asked-tab" tabindex="0">


        <div class="questionAsked">
            <div class="headerPanel">Answers You have Provided</div>

            <?php
            while ($answerData = mysqli_fetch_assoc($profileQueryExec2by2)) {
                $questionId = $answerData['question id'];
                $answerId = $answerData['answer id'];
                $questionTitle = $answerData['question title'];
                $questionDescription = $answerData['question description'];

                // var_dump($answerData);
                ?>



                <div class="contentContainerBox answerSaved">
                    <input type="hidden" value="<?php echo $questionId ?>">
                    <input type="hidden" value="<?php echo $answerId ?>">
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




    <div class="tab-pane fade" id="pills-answer-saved" role="tabpanel" aria-labelledby="pills-answer-saved-tab"
        tabindex="0">
        <div class="answerSaved">
            <div class="headerPanel">Answer you have preserved</div>

            <?php
            while ($ansData = mysqli_fetch_assoc($profileQueryExec3)) {
                $bookMarkId = $ansData['bookMark id'];
                $questionId = $ansData['question id'];
                $answerId = $ansData['answer id'];
                $questionTitle = $ansData['question title'];
                $questionDesc = $ansData['question description'];
                $answer = $ansData['answer'];

                ?>


                <div class="contentContainerBox answerSaved">
                    <input type="hidden" value="<?php echo $questionId ?>">
                    <input type="hidden" value="<?php echo $answerId ?>">
                    <div class="row">
                        <div class="col-md-11">
                            <div class="itemTitle my-1"><?php echo $questionTitle ?></div>
                            <div class="itemDesc my-1"><?php echo $questionDesc ?></div>
                            <div class="itemDesc itemSub mt-3"><?php echo $answer ?></div>
                        </div>

                        <div class="col-md-1 btnBooMarkActionContainer my-md-auto my-3">
                            <a href="./Backend/Question/questionBookMarked.back.php?bookMarkId=<?php echo $bookMarkId ?>">
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

    const answerSaved = document.querySelectorAll('.answerSaved');
    console.log(answerSaved);

    answerSaved.forEach((elm) => {
        elm.addEventListener('click', () => {
            const questionId = elm.querySelectorAll('input')[0].value;
            const answerId = elm.querySelectorAll('input')[1].value;
            // console.log(answerId + questionId);  
            location.href = `./question.Answers.php?questionId=${questionId}&answerId=${answerId}`;
        })
    })

</script>