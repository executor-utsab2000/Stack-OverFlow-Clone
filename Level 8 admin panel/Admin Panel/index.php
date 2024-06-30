<?php
session_start();

if (
    !isset($_SESSION['isAdminActive']) &&
    $_SESSION['isAdminActive'] = !true
) {
    header("location:./Admin Panel/admin.login.php");
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
    <title>Document</title>
</head>

<body>
    <div class="container-fluid adminPanel px-0">
        <!-- -------------------------------------------------- -->
        <div class="navBar">
            <img src="../Images/UI/Logo.png" alt="" />
            <span class="ps-3">Admin Panel</span>

            <div class="notificationButton">
                <i class="fa-solid fa-bell"></i>
                <span class="countNoNotification">75</span>
            </div>
            <div class="notificationBox">
                <div class="header"></div>
                <div class="notifiicationContent">

                    <!-- msg notifaction start-->
                    <div class="notificationTab">
                        <div class="dp">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxIMA5q-wOA7Xegu1rx-BSdG5tmNLYIuCNvjMJ1JFHAc13zxlj2Fb0mB6MA7vGWAXrWZA&usqp=CAU"
                                alt="" class="img-fluid">
                        </div>
                        <div class="content">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus
                            accusamus autem doloremque! Aspernatur, est eveniet.</div>
                    </div>
                    <!-- msg notifaction end-->

                </div>
            </div>
        </div>


        <!-- -------------------------------------------------- -->
    </div>
</body>
<script type="module" src="../Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js"></script>
<script src="./adminScript.js"></script>

</html>