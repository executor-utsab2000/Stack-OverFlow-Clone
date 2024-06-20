<?php

session_start();
if (!isset($_SESSION['userId'])) {
  header("location: ./index.php");
}

$sessionUser = $_SESSION['userId'];
require_once './Backend/Components/connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <?php require './Frontend Components/cdnLinks.php' ?>
  <link rel="stylesheet" href="Style/userProfile.scss" />
</head>

<body>
  <div class="container-fluid">
    <?php require './Frontend Components/navbar.php' ?>

    <!-- --------------------------------------------------------------------------- -->

    <div class="container userProfile">

      <div class="headerSection">
        <div class="imgContainer">
          <img src="https://lh3.googleusercontent.com/a/ACg8ocIjawg6-MMG48vKnJ4wyU2hTFQiQ6wYe_JkKfHI4aaEIH3L=k-s256"
            alt="" class="img-fluid">
        </div>
        <div class="userDetailsTop ms-4 my-auto">
          <div class="nameTop">Utsab Sarkar</div>
          <div class="userId">user-12365478hfhfhfhf</div>
          <div class="smallDetails mt-3">
            <div class="createdAt"> <i class="fa-solid fa-cake-candles me-1"></i> 15th August 2000 </div>
            <div class="email ms-4"> <i class="fa-solid fa-at me-1"></i> utsab@gmail.com </div>
          </div>
        </div>
      </div>

      <!-- detailsSection -->

      <div class="detailsSection">
        <div class="leftMenu d-md-block d-none">
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>

              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>

              <button class="nav-link active" id="v-pills-question-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-question" type="button" role="tab" aria-controls="v-pills-question"
                aria-selected="false">Question Saved</button>

              <button class="nav-link" id="v-pills-answer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-answer"
                type="button" role="tab" aria-controls="v-pills-answer" aria-selected="false">Answer Saved</button>

              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                aria-selected="false">Settings</button>
            </div>
          </div>
        </div>


        <div class="leftMenu d-md-none d-block">
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i
                  class="fa-solid fa-house-user"></i>
              </button>

              <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                <i class="fa-solid fa-user"></i>
              </button>

              <button class="nav-link active" id="v-pills-question-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-question" type="button" role="tab" aria-controls="v-pills-question"
                aria-selected="false">
                <i class="fa-solid fa-circle-question"></i>
              </button>

              <button class="nav-link" id="v-pills-answer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-answer"
                type="button" role="tab" aria-controls="v-pills-answer" aria-selected="false">
                <i class="fa-solid fa-comment"></i>
              </button>

              <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                aria-selected="false">
                <i class="fa-solid fa-gear"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- right panel -->
        <div class="rightPanel ">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
              tabindex="0"><?php require './User Profile/homeSummary.php' ?></div>

            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
              tabindex="0"><?php require './User Profile/profile.php' ?></div>

            <div class="tab-pane fade show active" id="v-pills-question" role="tabpanel"
              aria-labelledby="v-pills-question-tab" tabindex="0"><?php require './User Profile/questionSaved.php' ?>
            </div>

            <div class="tab-pane fade" id="v-pills-answer" role="tabpanel" aria-labelledby="v-pills-answer-tab"
              tabindex="0"><?php require './User Profile/answerSaved.php' ?></div>

            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
              tabindex="0"><?php require './User Profile/settings.php' ?></div>

          </div>
        </div>
      </div>






























    </div>
  </div>
</body>

</html>