<?php
$sessionUser = NULL;
session_start();
if (isset($_SESSION['userId'])) {
    $sessionUser = $_SESSION['userId'];
}
include './SQL/queries.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php require './Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="Style/allQuestions.scss" />
</head>

<body>
    <div class="container-fluid">
        <?php require './Frontend Components/navbar.php' ?>
        <?php require './Frontend Components/backendMsg.php' ?>
        <!-- --------------------------------------------------------------------------- -->

        <div class="container allQuestions">

            <div class="row">
                <div class="col-lg-2 leftPanelFixed d-none d-lg-block">
                    <?php require './Frontend Components/leftPanelFixed.php' ?>
                </div>


                <div class="col-lg-10 offset-lg-2 rightPanel">

                    <!-- header Section -->
                    <div class="headerSection">
                        <div class="subHeaderSection">
                            <div>
                                <div class="header1">all questions</div>
                                <div class="header2">
                                    <span class="text-danger"> <?php echo $totalQuestions ?></span>
                                    Questions
                                </div>
                            </div>

                            <div class="my-auto">
                                <div class="questionBtn my-2">
                                    <button class="btn" id="askQuestionBtn">Ask a Question <i
                                            class="fa-solid fa-question ms-1"></i>
                                    </button>
                                </div>
                                <div class="filter my-2">
                                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#filter"
                                        aria-expanded="true" aria-controls="filter">Filter</button>
                                </div>
                            </div>
                        </div>
                        <!-- -------------------------------------------------------- -->
                        <div class="accordion" id="filterAccordian">
                            <div class="accordion-item">
                                <div id="filter" class="accordion-collapse collapse"
                                    data-bs-parent="#filterAccordian">
                                    <div class="accordion-body">
                                        <div class="row">

                                            <!-- to impliment ajax to filter rows -->

                                            <div class="col-sm-4">
                                                <div class="filterHeader">Topics : </div>
                                                <div class="filterOptions">

                                                    <?php

                                                    while ($filtertopics = mysqli_fetch_assoc($QueryExec1)) {
                                                        $topicName = $filtertopics['topic name'];
                                                        $topicId = $filtertopics['topic id'];

                                                        echo '
                                                                <div class="items my-2">
                                                                <input type="radio" name="topic" class="topic" id="' . $topicName . '" value="' . $topicId . '">
                                                                <label for="' . $topicName . '">' . $topicName . '</label>
                                                            </div>';
                                                    }

                                                    ?>

                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="filterHeader">Sort By : </div>
                                                <div class="filterOptions">

                                                    <div class="items my-2">
                                                        <input type="radio" name="timePosted" class="topic" id="recentPost"
                                                            value="recentPost">
                                                        <label for="recentPost">Recently Posted</label>
                                                    </div>
                                                    <div class="items my-2">
                                                        <input type="radio" name="timePosted" class="topic" id="oldPost"
                                                            value="oldPost">
                                                        <label for="oldPost">Older First</label>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="filterHeader">Answers : </div>
                                                <div class="filterOptions">

                                                    <div class="items my-2">
                                                        <input type="radio" name="answerNumber" class="topic"
                                                            id="noAnswer" value="noAnswer">
                                                        <label for="noAnswer">No Answers</label>
                                                    </div>
                                                    <div class="items my-2">
                                                        <input type="radio" name="answerNumber" class="topic"
                                                            id="mostAnswer" value="mostAnswer">
                                                        <label for="mostAnswer">Most Answers</label>
                                                    </div>

                                                </div>
                                            </div>


                                            <div class="col-12 d-flex justify-content-center justify-content-lg-end">
                                                <button class="btn filterClearBtn" id="filterClearBtn">Clear
                                                    Filter</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--------------------- header section complete ---------------------------------->

                    <!-- questions container start  -->
                    <div id="filteredSectionQuestion">
                        <?php
                        while ($allQuestion = mysqli_fetch_assoc($QueryExec5)) {
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
                                                <a href="allAnswers.php?questionId=<?php echo $questionId ?>"
                                                    class="nav-link">
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
                    </div>
                    <!-- questions container end  -->
                </div>
            </div>


        </div>





    </div>
    <script src="Script/ajaxCheckIfUserLoggedIn.js" type="module"></script>
    <script src="Script/Question Scripts/questions.js"></script>
    <script src="Script/Filter Ajax/filterAjax.js"></script>
    <script src="Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js" type="module"></script>

</body>

</html>