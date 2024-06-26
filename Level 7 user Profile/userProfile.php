<?php

session_start();
if (!isset($_SESSION['userId'])) {
  header("location: ./index.php");
}

$sessionUser = $_SESSION['userId'];
require './Backend/Components/connection.php';
require './Frontend Components/backendMsg.php';

$userData = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM `users` WHERE `userID` = '$sessionUser'"));

$userId = $userData['userID'];
$userName = $userData['username'];
$userEmail = $userData['userEmail'];
$userDob = $userData['userDob'];
$userAvtar = $userData['userAvtar'];

if ($userAvtar == '') {
  $userAvtar = 'https://www.pngitem.com/pimgs/m/272-2720656_user-profile-dummy-hd-png-download.png';
}

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
          <img src="<?php echo $userAvtar ?>" alt="" class="img-fluid">
        </div>
        <div class="userDetailsTop ms-4 my-auto">
          <div class="nameTop"><?php echo $userName ?></div>
          <div class="userId"><?php echo $userId ?></div>
          <div class="smallDetails mt-3">
            <div class="createdAt"> <i class="fa-solid fa-cake-candles me-1"></i> <?php echo $userDob ?> </div>
            <div class="email ms-4"> <i class="fa-solid fa-at me-1"></i> <?php echo $userEmail ?> </div>
          </div>
        </div>
      </div>

      <!-- detailsSection -->

      <div class="detailsSection">

        <div class="leftMenu d-md-block d-none">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <button class="nav-link " id="v-pills-homeSummary-tab" data-bs-toggle="pill"
              data-bs-target="#v-pills-homeSummary" type="button" role="tab" aria-controls="v-pills-homeSummary"
              aria-selected="true">Home</button>

            <button class="nav-link" id="v-pills-profileTab-tab" data-bs-toggle="pill"
              data-bs-target="#v-pills-profileTab" type="button" role="tab" aria-controls="v-pills-profileTab"
              aria-selected="false">Profile</button>

            <button class="nav-link" id="v-pills-question-tab" data-bs-toggle="pill" data-bs-target="#v-pills-question"
              type="button" role="tab" aria-controls="v-pills-question" aria-selected="false">Question</button>

            <button class="nav-link" id="v-pills-answer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-answer"
              type="button" role="tab" aria-controls="v-pills-answer" aria-selected="false">Answer</button>

            <button class="nav-link active" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
              type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
          </div>
        </div>



        <div class="leftMenu d-md-none d-block">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <button class="nav-link active" id="v-pills-homeSummary-tab" data-bs-toggle="pill"
              data-bs-target="#v-pills-homeSummary" type="button" role="tab" aria-controls="v-pills-homeSummary"
              aria-selected="true">
              <i class="fa-solid fa-house-user"></i>
            </button>

            <button class="nav-link" id="v-pills-profileTab-tab" data-bs-toggle="pill"
              data-bs-target="#v-pills-profileTab" type="button" role="tab" aria-controls="v-pills-profileTab"
              aria-selected="false">
              <i class="fa-solid fa-user"></i>
            </button>

            <button class="nav-link" id="v-pills-question-tab" data-bs-toggle="pill" data-bs-target="#v-pills-question"
              type="button" role="tab" aria-controls="v-pills-question" aria-selected="false">
              <i class="fa-solid fa-circle-question"></i>
            </button>

            <button class="nav-link" id="v-pills-answer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-answer"
              type="button" role="tab" aria-controls="v-pills-answer" aria-selected="false">
              <i class="fa-solid fa-comment"></i>
            </button>

            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings"
              type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
              <i class="fa-solid fa-gear"></i>
            </button>
          </div>
        </div>


        <!-- right panel -->
        <div class="rightPanel">
          <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade " id="v-pills-homeSummary" role="tabpanel"
              aria-labelledby="v-pills-homeSummary-tab" tabindex="0">
            <?php require './User Profile/homeSummary.php' ?>
            </div>

            <div class="tab-pane fade" id="v-pills-profileTab" role="tabpanel" aria-labelledby="v-pills-profileTab-tab"
              tabindex="0">
            <?php require './User Profile/profile.php' ?>
            </div>

            <div class="tab-pane fade" id="v-pills-question" role="tabpanel" aria-labelledby="v-pills-question-tab"
              tabindex="0">
            <?php require './User Profile/questionSaved.php' ?>
            </div>

            <div class="tab-pane fade" id="v-pills-answer" role="tabpanel" aria-labelledby="v-pills-answer-tab"
              tabindex="0">
            <?php require './User Profile/answerSaved.php' ?>
            </div>

            <div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
              tabindex="0">
            <?php require './User Profile/settings.php' ?>
            </div>

          </div>
        </div>

      </div>





    </div>
  </div>
</body>
<script type="module" src="Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js"></script>

</html>