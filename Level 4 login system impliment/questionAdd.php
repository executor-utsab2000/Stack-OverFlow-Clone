<?php

if (!isset($_SESSION['userId'])) {
  header("./allQuestions.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <?php require './Frontend Components/cdnLinks.php' ?>
  <link rel="stylesheet" href="Style/addQuestion.scss" />
  <link rel="stylesheet" href="Style/contentContainer.scss" />
</head>

<body>
  <div class="container-fluid">
    <?php require './Frontend Components/navbar.php' ?>
    <?php require './Frontend Components/backendMsg.php' ?>

    <div class="container addQuestions">
      <div class="row">
        <div class="col-lg-4 imgContainer">
          <img src="./Images/UI/askQuestion.png" alt="" class="img-fluid" />
        </div>
        <div class="col-lg-8 offset-lg-4 ps-lg-5 askQuestionContent">
          <div class="header">Ask a Public Question</div>
          <div class="rulesContainer contentContainer">
            <div class="header">Write a good question</div>
            <div class="steps">Steps to Follow :</div>
            <ul>
              <li>Write your question in brief</li>
              <li>Explain your issue</li>
              <li>Select Category</li>
              <li>Review your question and post it to the site.</li>
            </ul>
          </div>

          <form action="./Backend/Question/insert.php" method="post" id="questionSubmit" enctype="multipart/form-data">
            <div class="contentContainer mt-3 questionTitle">
              <label for="questionTitle">Title of your question</label>
              <div class="labelDesc">
                Be specific and imagine you’re asking a question to another person.
              </div>
              <input type="text" class="inputs" id="questionTitle" name="questionTitle" placeholder="" />
            </div>

            <div class="contentContainer mt-3 questionDescription">
              <label for="questionDescription">What are the details of your problem?</label>
              <div class="labelDesc">
                Introduce the problem and expand on what you put in the title. Minimum 20 characters.
              </div>
              <textarea type="text" rows="10" class="inputs" id="questionDescription" name="questionDescription"
                placeholder=""></textarea>
            </div>

            <div class="contentContainer mt-3 questionCategory">
              <label for="questionCategory">Category</label>
              <div class="labelDesc">
                Select the appropriate category for your question
              </div>
              <select name="questionCategory" id="questionCategory" class="inputs">
                <option value="" selected disabled>Select Your Category</option>
                <?php

                require './SQL/leftFixedPanelSql.php';
                while ($topicsData = mysqli_fetch_assoc($QueryExec1)) {
                  $topicId = $topicsData['topic id'];
                  $topicName = $topicsData['topic name'];

                  echo '
                <option value="' . $topicId . '">' . $topicName . '</option>                
                ';
                }

                ?>
              </select>
            </div>

            <div class="contentContainer mt-3 questionImg">
              <label for="questionImg">Screenshot or Image</label>
              <div class="labelDesc">
                Select any image or screenshot of the error
              </div>
              <input type="file" class="inputsFile" id="questionImg" name="questionImg" />
              <div class="imgFormats text-danger ms-3">.webp , .jpg , .jpeg , .png . .avif only these formats are
                accepted and max size should be 2 MB .</div>
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
<script src="./Script/Question Scripts/askQuestion.js"></script>

</html>