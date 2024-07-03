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
require '../Backend/Components/connection.php';
require '../Frontend Components/backendMsg.php';

$reqToAdminId = $_GET['reqToAdminId'];
$topicName = $_GET['topicName'];
$userId = $_GET['userId'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./topicAdd.scss" />
    <link rel="stylesheet" href="../Style/contentContainer.scss" />
    <title>Admin || Add Topic</title>
</head>

<body>
    <div class="container-fluid topicAddAdmin px-0">
        <!-- ------------------------------------------------------------------------------------------------------ -->
        <!-- ------------------ navbar start -------------------------------- -->
        <div class="navBar">
            <img src="../Images/UI/Logo.png" alt="" />
            <span class="ps-3">Admin Panel</span>

            <div class="logoutBtn">
                <a href="./admin.logout.php">
                    <button>log out</button>
                </a>
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
                    <form action="./topicAdd.back.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 my-2">
                                <input type="hidden" name="reqToAdminId" value="<?php echo $reqToAdminId ?>">
                                <label for="topicName">topic name</label>
                                <input type="text" name="topicName" id="topicName" class="inputTopics"
                                    value="<?php echo $topicName ?>">
                            </div>
                            <div class="col-12 my-2">
                                <label for="topicDesc">topic description</label>
                                <textarea rows="5" name="topicDesc" id="topicDesc" class="inputTopics"></textarea>
                            </div>
                            <div class="col-12 my-2">
                                <label for="userId">topic requested by (userId)</label>
                                <input type="text" name="userId" id="userId" class="inputTopics"
                                    value="<?php echo $userId ?>" readonly>
                            </div>
                            <div class="col-12 my-2">
                                <label for="topicAvtar">topic avtar</label>
                                <input type="file" name="topicAvtar" id="topicAvtar" class="inputTopics">
                            </div>
                            <div class="col-12 my-4">
                                <input type="submit" name="" id="" class="inputTopics submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- -------------------------------------------------- -->
    </div>
</body>
<script type="module" src="../Script/Url Change BackendMsg/noParameterGetMsg.changeUrl.js"></script>
<script src="./adminScript.js"></script>

</html>