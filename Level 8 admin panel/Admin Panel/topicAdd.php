<?php
session_start();

if (
    !isset($_SESSION['isAdminActive']) &&
    $_SESSION['isAdminActive'] = !true &&
    !isset($_GET['topicName']) &&
    !isset($_GET['reqToAdminId'])
) {
    header("location:./Admin Panel/admin.login.php");
}

require '../Frontend Components/cdnLinks.php';
echo $_GET['topicName'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./topicAdd.scss" />
    <link rel="stylesheet" href="../Style/contentContainer.scss" />
    <title>Document</title>
</head>

<body>
    <div class="container-fluid topicAddAdmin px-0">
        <!-- ------------------------------------------------------------------------------------------------------ -->
        <!-- ------------------ navbar start -------------------------------- -->
        <div class="navBar">
            <img src="../Images/UI/Logo.png" alt="" />
            <span class="ps-3">Admin Panel</span>

            <div class="logoutBtn">
                <button>log out</button>
            </div>
        </div>
        <!-- ---------------------------------- navbar close --------------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------------------------------------------------------------- -->


        <div class="container content">
            <div class="row">
                <div class="col-lg-4">
                    <div class="imgContainer">
                        <img src="../Images/UI/Admin/addTopicImg.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header">Add Topic</div>
                </div>
            </div>
        </div>


        <!-- -------------------------------------------------- -->
    </div>
</body>
<script type="module" src="../Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js"></script>
<script src="./adminScript.js"></script>

</html>