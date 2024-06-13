<?php

if (!isset($_GET['questionId'])) {
    header("location:./allQuestions.php");
}

include './SQL/queries.php';
$Question_Id = $_GET['questionId'];
$anspageQuestionQuery = "$answerQuery1 '$Question_Id' ";
$QueryExec6 = mysqli_query($connection, $anspageQuestionQuery);
$questionData = mysqli_fetch_assoc($QueryExec6);

$questionTitle = $questionData['question title'];
$questionDescription = $questionData['question description'];
$questionCreatedAt = $questionData['question created at'];
$userAvtar = $questionData['userAvtar'];
$userName = $questionData['username'];
$questionScreenShot = $questionData['screenShot'];

if ($userAvtar == '') {
    $ifNoAvtar = 'https://images.freeimages.com/image/previews/374/instabutton-png-design-5690390.png?fmt=webp&w=500';
}

$answerCount = mysqli_fetch_assoc(
    mysqli_query(
        $connection,
        "SELECT COUNT(*) from answer WHERE `question id`='$Question_Id';"
    )
)['COUNT(*)'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php require './Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="Style/allAnswers.scss" />
</head>

<body>
    <div class="container-fluid">
        <?php require './Frontend Components/navbar.php' ?>
        <?php require './Frontend Components/backendMsg.php' ?>
        <!-- --------------------------------------------------------------------------- -->

        <div class="container allAnswers">

            <div class="row">
                <div class="col-lg-2 leftPanelFixed d-none d-lg-block">
                    <?php require './Frontend Components/leftPanelFixed.php' ?>
                </div>


                <div class="col-lg-10 offset-lg-2 rightPanelAnswers">

                    <!-- insert Answer Btn  -->
                    <div class="insertDiv">
                        <input type="hidden" value="<?php echo $Question_Id ?>">
                        <button class="btn" id="insertAnswer">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </div>
                    <!-- insert Answer Btn close  -->



                    <!-- content -->
                    <div class="question">
                        <div class="questionTitle">
                            <?php echo $questionTitle ?>
                        </div>

                        <div class="questionIssueDesc">
                            <?php echo $questionDescription ?>
                        </div>

                        <?php

                        if ($questionScreenShot != '') {
                            ?>
                            <div class="questionImgContainer">
                                <img src="./Images/Uploads/Question/<?php echo $questionScreenShot ?>" alt=""
                                    class="img-fluid">
                            </div>

                        <?php } ?>


                        <div class="userDetails d-flex justify-content-end pe-3">
                            <img src="./Images/UI/line.svg" alt="" class="line">
                            <img src=" <?php echo $ifNoAvtar ?>" alt="" class="userDp">
                            <?php echo $userName ?>
                        </div>
                        <div class="questionDetails">
                            <div class="questionDetailsSub">15 <i class="fa-regular fa-thumbs-up ms-1"></i> </div>
                            <div class="questionDetailsSub"><?php echo $answerCount ?> Answers </div>
                            <div class="questionDetailsSub">
                                <div>Asked On</div>
                                <div> <?php echo $questionCreatedAt ?></div>
                            </div>
                            <div class="questionDetailsSub">Modified At </div>
                        </div>
                    </div>









                    <!-- answer repeatable part start-->
                    <?php
                    $answerQuery = "$answerQuery2 '$Question_Id' order by answer.`answer created at` desc";
                    $ansQueryExec = mysqli_query($connection, $answerQuery);
                    // var_dump(mysqli_fetch_assoc($ansQueryExec));
                    while ($answerData = mysqli_fetch_assoc($ansQueryExec)) {
                        $answerId = $answerData['answer id'];
                        $answer = $answerData['answer'];
                        $ansImg = $answerData['answerImage'];
                        $ansCreatedAt = $answerData['answer created at'];
                        $ansUserName = $answerData['username'];
                        $ansUserAvtar = $answerData['userAvtar'];

                        $imgsCount = 'No';
                        if ($ansImg != NULL) {
                            $imgsCount = count(json_decode($ansImg));
                        }

                        if ($ansUserAvtar == '') {
                            $ifNoAvtar = 'https://images.freeimages.com/image/previews/374/instabutton-png-design-5690390.png?fmt=webp&w=500';
                        }

                        ?>


                        <!-- answer Content start -->
                        <div class="answerContainer">
                            <div class="answerContent">

                                <div class="leftPanel">
                                    <div class="userDp">
                                        <img src="<?php echo $ifNoAvtar ?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="functions my-auto">
                                        <input type="hidden" value="<?php echo $answerId ?>">
                                        <button class=" btn fa-regular fa-thumbs-up my-2"></button>
                                        <button class=" btn fa-regular fa-bookmark my-2 saveAnswer"></button>
                                    </div>
                                </div>

                                <div class="rightPanel">
                                    <div class="answerDesc"><?php echo $answer ?></div>
                                    <div class="images"><?php echo $imgsCount ?> Images Available </div>
                                    <div class="ansTime d-flex justify-content-end mt-4">
                                        answered on <?php echo $ansCreatedAt ?>
                                    </div>
                                    <div class="readMore d-flex justify-content-end mt-2">
                                        <a href="question.Answers.php?questionId=<?php echo $Question_Id ?>&answerId=<?php echo $answerId ?>"
                                            class="nav-link">
                                            <button class="btn">𝗥𝗲𝗮𝗱 𝗶𝗻 𝗗𝗲𝘁𝗮𝗶𝗹𝘀</button>
                                        </a>
                                    </div>
                                </div>

                            </div>




                            <?php
                            // if user logged in has posted the answer 
                            $questionUserId = $answerData['user id'];
                            if ($questionUserId == 0) { //1 will be replaced by sessionUserId
                                ?>
                                <div class="editDeleteBtn d-none">
                                    <div class="my-2">
                                        <form action="./Backend/Answer/.php" method="post">
                                            <input type="hidden" id="ansId" value="<?php echo $answerId ?>">
                                            <input type="hidden" class="currUrl" name="currUrl">
                                            <button class="btn buttonStyle" type="submit" id="editAnswer">
                                                <i class="fa-solid fa-pen-to-square me-2"></i></i>Edit Answer
                                            </button>
                                        </form>
                                    </div>

                                    <div class="my-2">
                                        <form action="./Backend/Answer/deleteAnswer.php" method="post">
                                            <input type="hidden" id="ansId" name="ansId" value="<?php echo $answerId ?>">
                                            <input type="hidden" class="currUrl" name="currUrl">
                                            <button class="btn buttonStyle" type="submit" id="deleteAnswer">
                                                <i class="fa-solid fa-trash-can me-2"></i></i>Delete Answer
                                            </button>
                                        </form>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>

                    <?php } ?>
                    <!-- answer repeatable part end-->
                    <!-- answer Content start -->





                </div>
            </div>


        </div>


    </div>
</body>

<script src="Script/ajaxCheckIfUserLoggedIn.js" type="module"></script>
<script src=" Script/Answer Scripts/answers.js" type="module"></script>
<script src="Script/Url Change BackendMsg/parameterGetMsg.changeUrl .js" type="module"></script>

</html>