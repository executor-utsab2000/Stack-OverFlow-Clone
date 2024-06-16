<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require './Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="./Style/login_Signup.scss">
</head>

<body>
    <div class="container-fluid login_Signup">

        <?php require_once './Frontend Components/backendMsg.php' ?>





        <div class="logoContainer">
            <img src="Images/UI/Logo.png" alt="" class="img-fluid">
        </div>
        <div class="contentBox">
            <div class="tabSection">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Sign Up</button>
                    </li>
                </ul>
            </div>
            <div class="formContainer">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <?php require_once './SignUp_LoginForm/login.php' ?>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <?php require_once './SignUp_LoginForm/signUp.php' ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<script type="module" src="Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js"></script>

</html>