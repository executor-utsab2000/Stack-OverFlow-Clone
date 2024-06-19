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

    <!-- --------------------------------------------------------------------------- -->

    <!-- login modal popup -->
    <div class="loginModalPopup animate__animated animate__bounceInUp animate__slower">
      <button id="closeModalPopup" class="btn">
        <i class="fa-solid fa-xmark"></i>
      </button>

      <div class="buttonContainer">
        <span>
          <a href="./login_SignUp.php"> <button class="btn me-1">Login</button></a>
          <a href="./login_SignUp.php"> <button class="btn ms-1">Sign Up</button></a>
        </span>
      </div>
      <div class="txt text-center">
        Login or Sign Up to get a better experience of our application
      </div>
    </div>



  </div>
</body>
<script type="module" src="Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js"></script>
<script>

  $(document).ready(function () {
    const element = document.querySelector('.loginModalPopup')


    const backendUrl = "./Backend/sessionUserAuth.php";

    $.get(backendUrl, function (data, status) {
      const datas = JSON.parse(data);
      console.log(datas);

      if (datas.ifActive) {
        document.querySelector('#closeModalPopup').parentNode.classList.add('d-none')
      }
      else {
        return
      }

    });

    document.querySelector('#closeModalPopup').addEventListener('click', () => {
      element.classList.remove(
        // 'animate__animated',
        'animate__bounceInUp',
        'animate__slower'
      )

      element.classList.add(
        'animate__bounceOutDown',
        'animate__slow'
      );
    })

  })

</script>

</html>