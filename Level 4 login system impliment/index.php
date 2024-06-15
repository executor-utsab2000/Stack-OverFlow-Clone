<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>

  <?php require './Frontend Components/cdnLinks.php' ?>
  <link rel="stylesheet" href="Style/index.scss" />
</head>

<body>
  <div class="container-fluid">
    <?php require './Frontend Components/backendMsg.php' ?>
    <?php require './Frontend Components/navbar.php' ?>

    <!-- --------------------------------------------------------------------------- -->

    <div class="container landingContainer">
      <div class="row">
        <div class="col-lg-6 landingImg">
          <img src="./Images/UI/landing.jpg" class="img-fluid" alt="" />
        </div>

        <div class="col-lg-6 px-3 landingContent">
          <div class="headerMain">
            <div class="txt1">Question <span class="txt2">&</span></div>
            <div class="txt3">Answer</div>
            <div class="slogan">get your complete solution to your queries </div>
          </div>

          <div class="description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident architecto accusantium doloribus. Minus,
            ex? Eius rerum voluptatem sapiente minus tenetur quasi incidunt assumenda quidem minima est nemo, adipisci
            repudiandae beatae tempore consequatur natus, veritatis accusantium amet, omnis vitae? Voluptatibus porro,
            eligendi sit sint id neque beatae perferendis dolor natus alias!
          </div>

          <div class="button d-flex justify-content-lg-end justify-content-center">
            <a href="allQuestions.php">
              <button class="btn">Get Started...</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script type="module" src="Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js"></script>

</html>