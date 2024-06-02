<?php

if (!isset($_GET['questionId'])) {
    header("location:./allQuestions.php");
}

include './SQL/queries.php';
$Question_Id = $_GET['questionId'];
$anspageQuestionQuery = "$answerQuery1 '$Question_Id' ";
$QueryExec6 = mysqli_query($connection, $anspageQuestionQuery);
$questionData = mysqli_fetch_assoc($QueryExec6);
// var_dump($questionData);

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
// var_dump($answerCount);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php require './Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="Style/answers.scss" />
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
                    <div class="insertDiv">
                        <input type="hidden" value="<?php echo $Question_Id ?>">
                        <button class="btn" id="insertAnswer">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </button>
                    </div>

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

                        if ($ansUserAvtar == '') {
                            $ifNoAvtar = 'https://images.freeimages.com/image/previews/374/instabutton-png-design-5690390.png?fmt=webp&w=500';
                        }
                        ?>



                        <div class="answerContentContainer">
                            <div class="answerContent">
                                <div class="userDp">
                                    <img src="<?php echo $ifNoAvtar ?>" alt="">
                                </div>
                                <div class="functions my-auto">
                                    <i class="fa-regular fa-thumbs-up my-2"></i>
                                    <i class="fa-regular fa-bookmark my-2"></i>
                                </div>
                                <div class="answer"> <?php echo $answer ?>

                                    <?php

                                    if ($ansImg != '') {
                                        ?>
                                        <div class="ansImg mt-3">
                                            <img src="./Images/Uploads/Answers/<?php echo $ansImg ?>" alt="" class=" img-fluid">
                                        </div>

                                    <?php } ?>

                                    <div class="ansTime d-flex justify-content-end mt-4">
                                        answered on <?php echo $ansCreatedAt ?>
                                    </div>
                                </div>
                            </div>




                            <?php
                            // if user logged in has posted the answer 
                            $questionUserId = $answerData['user id'];
                            if ($questionUserId == 0) { //1 will be replaced by sessionUserId
                                ?>
                                <div class="editDeleteBtn">
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






                </div>
            </div>


        </div>

        <!--imgBigDisplay start  -->

        <div class="imgBigDisplay d-none">
            <button class="closeBtn btn" onclick="this.parentNode.classList.add('d-none')">
                <i class="fa-solid fa-circle-xmark"></i>
            </button>
            <div class="imgContainer">
                <img src="" alt="" id="imgBig">
            </div>
        </div>

        <!--imgBigDisplay end -->

    </div>
</body>

<script src="Script/ajaxCheckIfUserLoggedIn.js" type="module"></script>
<script src=" Script/answerImgDisplay.js"></script>
<!-- <script src=" Script/deleteEditAnswer.js"></script> -->
<script>
    const currUrl = document.querySelectorAll('.currUrl');
    console.log(currUrl);
    currUrl.forEach(elm => elm.value = location.href.split('?')[1])
</script>

</html>