<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <?php require '../Frontend Components/cdnLinks.php' ?>
    <link rel="stylesheet" href="./admin.login.scss">

</head>

<body>
    <div class="container-fluid adminLogin">
        <?php require '../Frontend Components/backendMsg.php' ?>
        <div class="contentContainer">
            <div class="logo">
                <img src="../Images//UI/Logo.png" alt="">
            </div>
            <div class="header text-center">Admin Login</div>
            <div class="formContainer">
                <form action="admin.login.back.php" method="post">
                    <div class="inputContainer">
                        <label for="loginId">Enter Login Id</label>
                        <input type="text" name="loginId" class="loginId" id="loginId">
                    </div>
                    <div class="inputContainer">
                        <label for="loginPassword">Enter Login Password</label>
                        <input type="text" name="loginPassword" class="loginPassword" id="loginPassword">
                    </div>
                    <div class="inputContainer">
                        <input type="submit" value="Submit" class="submitBtn">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>
</body>

</html>