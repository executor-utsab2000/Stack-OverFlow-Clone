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

$questionId = $questionData['question id'];
$questionTitle = $questionData['question title'];
$questionDescription = $questionData['question description'];
$questionCreatedAt = $questionData['question created at'];
$userAvtar = $questionData['userAvtar'];
$userName = $questionData['username'];
$questionScreenShot = $questionData['screenShot'];

if ($userAvtar == '') {
    $userAvtar = 'https://images.freeimages.com/image/previews/374/instabutton-png-design-5690390.png?fmt=webp&w=500';
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

        <!-- insert answer modal start -->
        <div class="modal fade " id="insertAnswerModal" tabindex="-1" aria-labelledby="insertAnswerModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="insertAnswerModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- insert answer modal end -->

        <div class="container allAnswers">

            <div class="row">
                <div class="col-lg-2 leftPanelFixed d-none d-lg-block">
                    <?php require './Frontend Components/leftPanelFixed.php' ?>
                </div>


                <div class="col-lg-10 offset-lg-2 rightPanelAnswers">
                    <div class="insertDiv">
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#insertAnswerModal"
                            id="insertAnswerModalBtn">
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
                                <img src="https://code.visualstudio.com/assets/docs/languages/javascript/auto-import-after.png"
                                    alt="" class="imgFluid">
                            </div>

                        <?php } ?>


                        <div class="userDetails d-flex justify-content-end pe-3">
                            <img src="./Images/UI/line.svg" alt="" class="line">
                            <img src=" <?php echo $userAvtar ?>" alt="" class="userDp">
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
                    <div class="answerContent">
                        <div class="userDp">
                            <img src="https://i.pinimg.com/236x/5d/35/c3/5d35c3084cc6afc27479ba340f27dc15.jpg" alt="">
                        </div>
                        <div class="functions my-auto">
                            <i class="fa-regular fa-thumbs-up my-2"></i>
                            <i class="fa-regular fa-bookmark my-2"></i>
                        </div>
                        <div class="answer">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum dolore quo
                            laboriosam repellat velit aut iusto officia nostrum quidem veritatis, similique voluptatum,
                            enim alias vel. In commodi magni sapiente ad vel? Dolorem soluta temporibus laudantium
                            recusandae facere corrupti, qui reiciendis fuga harum laborum necessitatibus aliquam
                            perferendis incidunt nemo enim voluptas optio adipisci deleniti cum dolore fugiat? Sequi sed
                            nam, quidem ab consequatur tempore. Quasi error, magni aperiam maxime voluptatem omnis nisi
                            ut dolor distinctio placeat minus doloribus deserunt soluta excepturi ipsa quidem tenetur
                            ipsum non, eveniet dolorem. Harum magnam non voluptatem similique perferendis quisquam id
                            sapiente dolor magni, distinctio quam quaerat expedita aliquam dolorem. Eveniet, ad quis
                            deserunt inventore atque sequi eaque est, doloremque corrupti tempora ea praesentium maxime
                            enim corporis! Maxime reprehenderit voluptates hic provident sed laudantium quo iure
                            quibusdam. Assumenda voluptates corporis eum eius, est consequuntur magnam fuga delectus
                            veritatis sunt provident itaque iure fugit nam. Aspernatur consequuntur, labore mollitia at
                            asperiores rem officiis beatae, autem cumque repellat deleniti ullam voluptatem, nisi
                            aliquam. Sequi repellendus quae ea maiores vel vero, consectetur omnis. Perferendis odit
                            explicabo quia commodi. Numquam enim nostrum nemo incidunt, sit commodi temporibus. Nemo
                            placeat molestias ab odit, dolorum neque, corrupti dolore, animi ipsum minus quis.
                            <div class="ansImg mt-3">
                                <img src="https://codesandbox.io/_next/image?url=%2Fnew%2Fblog%2Fcodesandbox-an-online-react-editor%2F0.png&w=3840&q=75"
                                    alt="" class="img-fluid">
                            </div>
                        </div>


                    </div>
                    <!-- answer repeatable part end-->

                </div>
            </div>


        </div>

        <!--imgBigDisplay start  -->

        <div class="imgBigDisplay d-none">
            <button class="closeBtn" onclick="this.parentNode.classList.add('d-none')">
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


</html>