<?php
session_start();

if (
    !isset($_SESSION['isAdminActive']) &&
    $_SESSION['isAdminActive'] == !true
) {
    header("location:./admin.login.php");
}

require './admin.sql.php';
require '../Frontend Components/cdnLinks.php';
require '../Frontend Components/backendMsg.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.scss" />
    <link rel="stylesheet" href="../Style/contentContainer.scss" />
    <title>Document</title>
</head>

<body>
    <div class="container-fluid adminPanel px-0">
        <!-- ------------------------------------------------------------------------------------------------------ -->
        <!-- ------------------ navbar start -------------------------------- -->
        <div class="navBar">
            <img src="../Images/UI/Logo.png" alt="" />
            <span class="ps-3">Admin Panel</span>

            <div class="notificationButton">
                <i class="fa-solid fa-bell"></i>
                <span class="countNoNotification"><?php echo $countNoOfNotification ?></span>
            </div>
            <div class="notificationBox">
                <div class="header"></div>
                <div class="notifiicationContent">

                    <!-- msg notifaction start-->

                    <!-- msg notifaction end-->

                </div>
            </div>

            <div class="logoutBtn">
                <a href="./admin.logout.php">
                    <button>log out</button>
                </a>
            </div>
        </div>
        <!-- ---------------------------------- navbar close --------------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------------------------------------------------------------- -->


        <div class="container content">

            <div class="header">Analytics DashBoard</div>

            <div class="contentContainer mt-4">
                <div class="summary">
                    <div class="header">In a brief</div>
                    <div class="contentDivs my-2">

                        <div class="contentContainer">
                            <div class="imgContainer">
                                <img src="../Images/UI/Admin/topic.png" class="img-fluid" alt="">
                            </div>
                            <div class="">
                                <div class="header">Total Topics Available</div>
                                <div class="contentMatter">5 </div>
                            </div>
                        </div>
                        <div class="contentContainer">
                            <div class="imgContainer">
                                <img src="../Images/UI/Admin/user.png" class="img-fluid" alt="">
                            </div>
                            <div class="">
                                <div class="header">Total Active Users </div>
                                <div class="contentMatter">5 </div>
                            </div>
                        </div>
                        <div class="contentContainer">
                            <div class="imgContainer">
                                <img src="../Images/UI/Admin/question.png" class="img-fluid" alt="">
                            </div>
                            <div class="">
                                <div class="header">Total Questions Available</div>
                                <div class="contentMatter">5 </div>
                            </div>
                        </div>
                        <div class="contentContainer">
                            <div class="imgContainer">
                                <img src="../Images/UI/Admin/answer.png" class="img-fluid" alt="">
                            </div>
                            <div class="">
                                <div class="header">Total Answers Available</div>
                                <div class="contentMatter">5 </div>
                            </div>
                        </div>
                        <div class="contentContainer">
                            <div class="imgContainer">
                                <img src="../Images/UI/Admin/qNaRatio.png" class="img-fluid" alt="">
                            </div>
                            <div class="">
                                <div class="header">Question to Answer Ratio</div>
                                <div class="contentMatter">2:1 </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <!-- details -->



        </div>






        <!-- -------------------------------------------------- -->
    </div>
</body>
<script type="module" src="../Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js"></script>
<script src="./adminScript.js"></script>

</html>