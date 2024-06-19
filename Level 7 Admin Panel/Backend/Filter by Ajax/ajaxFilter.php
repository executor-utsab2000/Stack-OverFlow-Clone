<?php

$sessionUser = NULL;
session_start();
if (isset($_SESSION['userId'])) {
    $sessionUser = $_SESSION['userId'];
}

require '../Components/connection.php';
// var_dump($_REQUEST);

$queryQuestionBasic = " SELECT 
                    question.`question id` , question.userId , question.`topic id` , question.`question title` , question.`question description`,question.`question created at` ,
                    users.username , users.userAvtar 
                    FROM question LEFT JOIN users ON question.userId = users.userID left join `answer` 
                    on question.`question id` =  answer.`question id`  ";


// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

if (count($_POST) == 1) {
    if (isset($_POST['topic'])) {
        $topicId = $_POST['topic'];
        $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` = '$topicId' group by question.`question id`";

    } elseif (isset($_POST['timePosted'])) {

        if ($_POST['timePosted'] == 'recentPost') {
            $queryQuestionUpd = "$queryQuestionBasic group by question.`question id` order by question.`question created at` desc";
        } else {
            $queryQuestionUpd = "$queryQuestionBasic group by question.`question id` order by question.`question created at`";
        }


    } elseif (isset($_POST['answerNumber'])) {
        if ($_POST['answerNumber'] == 'mostAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic group by question.`question id` order by(count(answer.`question id`)) desc ";
        } else {
            $queryQuestionUpd = "$queryQuestionBasic group by question.`question id` order by(count(answer.`question id`))";
        }
    }
}

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
if (count($_POST) == 2) {
    if (
        isset($_POST['topic']) &&
        isset($_POST['answerNumber'])
    ) {
        $topicId = $_POST['topic'];

        if ($_POST['answerNumber'] == 'mostAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` = '$topicId' group by question.`question id` order by (count(answer.`question id`)) desc ";
        } else {
            $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` = '$topicId' group by question.`question id` order by (count(answer.`question id`))";
        }

    }

    // ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    elseif (
        isset($_POST['topic']) &&
        isset($_POST['timePosted'])
    ) {
        $topicId = $_POST['topic'];

        if ($_POST['timePosted'] == 'recentPost') {
            $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` = '$topicId' group by question.`question id` order by question.`question created at` desc";
        } else {
            $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` = '$topicId' group by question.`question id` order by question.`question created at`";
        }
    }

    // ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    elseif (
        isset($_POST['timePosted']) &&
        isset($_POST['answerNumber'])
    ) {

        if ($_POST['timePosted'] == 'recentPost' && $_POST['answerNumber'] == 'noAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic group by question.`question id` order by (count(answer.`question id`))  , question.`question created at` desc";
        } 
        elseif ($_POST['timePosted'] == 'recentPost' && $_POST['answerNumber'] == 'mostAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic group by question.`question id` order by (count(answer.`question id`)) desc , question.`question created at` desc";
        } 
        elseif ($_POST['timePosted'] == 'oldPost' && $_POST['answerNumber'] == 'noAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic group by question.`question id` order by (count(answer.`question id`)) , question.`question created at`";
        } 
        elseif ($_POST['timePosted'] == 'oldPost' && $_POST['answerNumber'] == 'mostAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic group by question.`question id` order by (count(answer.`question id`)) desc , question.`question created at` ";
        }

    }

}

// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

if (count($_POST) == 3) {
    if (
        isset($_POST['topic']) &&
        isset($_POST['timePosted']) &&
        isset($_POST['answerNumber'])
    ) {
        $topicId = $_POST['topic'];

        if ($_POST['timePosted'] == 'recentPost' && $_POST['answerNumber'] == 'noAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` =  '$topicId' group by question.`question id` order by (count(answer.`question id`))  , question.`question created at` desc";
        } 
        elseif ($_POST['timePosted'] == 'recentPost' && $_POST['answerNumber'] == 'mostAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` =  '$topicId' group by question.`question id` order by (count(answer.`question id`)) desc , question.`question created at` desc";
        } 
        elseif ($_POST['timePosted'] == 'oldPost' && $_POST['answerNumber'] == 'noAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` =  '$topicId' group by question.`question id` order by (count(answer.`question id`)) , question.`question created at`";
        } 
        elseif ($_POST['timePosted'] == 'oldPost' && $_POST['answerNumber'] == 'mostAnswer') {
            $queryQuestionUpd = "$queryQuestionBasic where question.`topic id` =  '$topicId' group by question.`question id` order by (count(answer.`question id`)) desc , question.`question created at` ";
        }
    }

}


?>

<!-- -------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------
 -------------------------------------------------------------------------------------------------------------------
 ------------------------------------------------------------------------------------------------------------------- -->

<?php

$ajaxFilter = mysqli_query($connection, $queryQuestionUpd);
while ($allQuestion = mysqli_fetch_assoc($ajaxFilter)) {
    $questionId = $allQuestion['question id'];
    $questionTitle = $allQuestion['question title'];
    $questionDesc = $allQuestion['question description'];
    $questionCreatedAt = $allQuestion['question created at'];
    $userName = $allQuestion['username'];
    $userAvtar = $allQuestion['userAvtar'];
    // var_dump($allQuestion);
    if ($userAvtar == '') {
        $userAvtar = 'https://images.freeimages.com/image/previews/374/instabutton-png-design-5690390.png?fmt=webp&w=500';
    }

    // var_dump($allQuestion);

    $answerCount = mysqli_fetch_assoc(
        mysqli_query(
            $connection,
            "SELECT COUNT(*) from answer WHERE `question id`='$questionId';"
        )
    )['COUNT(*)'];
    // var_dump($answerCount);        
    ?>

    <div class="row questionContainer">
        <input type="hidden" name="questionId" value="<?php echo $questionId ?>">
        <div class="col-12 my-2">
            <div class="row">
                <div class="col-2 questionsleftPanel">
                    <div class="my-2"><?php echo $answerCount ?> Answers</div>
                    <div class="my-2">0 Likes</div>
                    <div class="my-auto">
                        <button class="btn buttonStyle saveQuestion">
                            <i class="fa-regular fa-bookmark me-2"></i>Save Question
                        </button>
                    </div>
                </div>

                <div class="col-10">
                    <div class="questionTitle">
                        <a href="allAnswers.php?questionId=<?php echo $questionId ?>" class="nav-link">
                            <?php echo $questionTitle ?></a>
                    </div>
                    <div class="questionIssue"> <?php echo $questionDesc ?> </div>
                    <div class="userDiv_time d-flex justify-content-lg-end justify-content-center">
                        <img src="<?php echo $userAvtar ?>" alt="" class="img-fluid">
                        <span class="my-auto"><span class="text-danger pe-2"><?php echo $userName ?>
                            </span> asked 11
                            mins ago</span>
                    </div>

                    <!--if session is active and  if session user == user of question -->
                    <!-- links will contain backend Deletepage with question id as get request  -->
                    <?php

                    $questionUserId = $allQuestion['userId'];
                    if ($questionUserId == $sessionUser) { //1 will be replaced by sessionUserId
                        ?>
                        <div class="editDeleteBtn d-none">
                            <div class="my-2">
                                <a href="./Backend/Question/updateQuestion.php?questionId=<?php echo $questionId ?>"
                                    class="nav-link">
                                    <button class="btn buttonStyle editQuestion">
                                        <i class="fa-solid fa-pen-to-square me-2"></i></i>Edit Question
                                    </button>
                                </a>
                            </div>

                            <div class="my-2">
                                <a href="./Backend/Question/deleteQuestion.php?questionId=<?php echo $questionId ?>"
                                    class="nav-link">
                                    <button class="btn buttonStyle deleteQuestion">
                                        <i class="fa-solid fa-trash-can me-2"></i></i>Delete Question
                                    </button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- if session user == user of question -->

                </div>
            </div>
        </div>
    </div>

<?php } ?>