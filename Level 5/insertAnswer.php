<?php
session_start();
if (
    !isset($_GET['questionId']) &&
    !isset($_SESSION['userId'])
) {
    header("location:./allQuestions.php");
}

$questionId = $_GET['questionId'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php require './Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="Style/answerAdd.scss" />
    <link rel="stylesheet" href="Style/contentContainer.scss" />
</head>

<body>
    <div class="container-fluid">
        <?php require './Frontend Components/navbar.php' ?>
        <?php require './Frontend Components/backendMsg.php' ?>
        <!-- --------------------------------------------------------------------------- -->


        <div class="container addAnswers">
            <div class="row">
                <div class="col-lg-4 imgContainer">
                    <img src="./Images/UI/answer.png" alt="" class="img-fluid" />
                </div>
                <div class="col-lg-8 offset-lg-4 ps-lg-5 provideAnswer">
                    <div class="header">Provide Solution a Public Question</div>
                    <div class="rulesContainer contentContainer">
                        <div class="header">Write a good question</div>
                        <div class="steps">Steps to Follow :</div>
                        <ul>
                            <li>Please be sure to answer the question. Provide details and share your research!</li>
                            <li>Making statements based on opinion; back them up with references or personal experience.
                            </li>
                            <li>Try to give image or images to support yor answer </li>
                            <li>Maximum 5 images.</li>
                        </ul>
                    </div>

                    <form action="./Backend/Answer/insert.php" method="post" id="answerSubmit"
                        enctype="multipart/form-data">
                        <input type="hidden" name="questionId" value="<?php echo $questionId ?>">
                        <input type="hidden" name="currQuestUrl" id="currQuestUrl">
                        <div class="contentContainer mt-3 answerDescription">
                            <label for="answerDescription">Explain the solution to the problem asked </label>
                            <div class="labelDesc">
                                Elaborate the answer and if possible support it by image or images
                            </div>
                            <textarea type="text" rows="15" class="inputs" id="answerDescription"
                                name="answerDescription" placeholder=""></textarea>
                        </div>


                        <div class="contentContainer mt-3 answerImg">
                            <label for="answerImg">Screenshot or Image</label>
                            <div class="labelDesc">
                                Select any image or screenshot of the error .Max Limit 5
                            </div>
                            <input type="file" class="inputsFile" id="answerImg" name="answerImg[]" multiple />
                            <div class="imgFormats text-danger ms-3">.webp , .jpg , .jpeg , .png . .avif only these
                                formats are
                                accepted and max size should be 2 MB (each image).</div>
                        </div>

                        <div class="contentContainer my-3">
                            <input type="submit" value="Submit">
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</body>
<script src="Script/Answer Scripts/provideAnswer.js"></script>
<script src="Script/Url Change BackendMsg/parameterGetMsg.changeUrl .js" type="module"></script>

</html>