<?php
if (
    !isset($_GET['questionId']) &&
    !isset($_GET['answerId'])

) {
    header("location:./allAnswers.php?questionId=$questionId");
}


include './SQL/queries.php';

// question data
$questionId = $_GET['questionId'];
$answerId = $_GET['answerId'];



$anspageQuestionQuery = "$answerQuery1 '$questionId' ";
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
        "SELECT COUNT(*) from answer WHERE `question id`='$questionId';"
    )
)['COUNT(*)'];

// ---------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------

$answerQuery = "$answerQuery2 '$questionId' and answer.`answer id`= '$answerId'";
$ansQueryExec = mysqli_query($connection, $answerQuery);
// var_dump(mysqli_fetch_assoc($ansQueryExec));
$answerData = mysqli_fetch_assoc($ansQueryExec);

$answer = $answerData['answer'];
$ansImg = $answerData['answerImage'];
$ansCreatedAt = $answerData['answer created at'];
$ansUserName = $answerData['username'];
$ansUserAvtar = $answerData['userAvtar'];

if ($ansImg != NULL) {
    $imgs = json_decode($ansImg);
}

if ($ansUserAvtar == '') {
    $ifNoAvtar = 'https://images.freeimages.com/image/previews/374/instabutton-png-design-5690390.png?fmt=webp&w=500';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php require './Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="Style/question.Answers.scss" />
</head>

<body>
    <div class="container-fluid">
        <?php require './Frontend Components/navbar.php' ?>
        <?php require './Frontend Components/backendMsg.php' ?>
        <!-- --------------------------------------------------------------------------- -->

        <div class="container QuestionAnswer">

            <div class="row">
                <div class="col-lg-2 leftPanelFixed d-none d-lg-block">
                    <?php require './Frontend Components/leftPanelFixed.php' ?>
                </div>

                <div class="col-lg-10 offset-lg-2 rightPanelQnA">

                    <!-- question container start -->
                    <div class="questionContainer">
                        <div class="questionTitle"><?php echo $questionTitle ?></div>
                        <div class="questionIssueDesc"><?php echo $questionDescription ?></div>

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
                            <div class="questionDetailsSub"><?php echo $answerCount ?> Answers Available </div>
                            <div class="questionDetailsSub">
                                <div>Asked On</div>
                                <div> <?php echo $questionCreatedAt ?></div>
                            </div>
                            <div class="questionDetailsSub">Modified At </div>
                        </div>
                    </div>
                    <!-- question container end -->
                    
                    <!-- answer container end -->
                            <!-- answer content -->
                    <!-- answer container end -->
                    


                </div>
            </div>

        </div>

        <!--imgBigDisplay start  -->

        <!-- <div class="imgBigDisplay d-none">
            <button class="closeBtn btn" onclick="this.parentNode.classList.add('d-none')">
                <i class="fa-solid fa-circle-xmark"></i>
            </button>
            <div class="imgContainer">
                <img src="" alt="" id="imgBig">
            </div>
        </div> -->

        <!--imgBigDisplay end -->

    </div>
</body>

<!-- <script src=" Script/Answer Scripts/answerImgDisplay.js"></script> -->

</html>