<?php


require '../Backend/Components/connection.php';
// notification bar

$notificationQuery = mysqli_query($connection, "select `topicrequesttoadmin`.id , `topicrequesttoadmin`.userId , `topicrequesttoadmin`.topicName ,users.userAvtar  from `topicrequesttoadmin` left join users using(userId);");



while ($notifData = mysqli_fetch_assoc($notificationQuery)) {

    $id = $notifData['id'];
    $userId = $notifData['userId'];
    $userDp = $notifData['userAvtar'];
    $topicName = $notifData['topicName'];

    if ($userDp == '') {
        $userDp = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxIMA5q-wOA7Xegu1rx-BSdG5tmNLYIuCNvjMJ1JFHAc13zxlj2Fb0mB6MA7vGWAXrWZA&usqp=CAU";
    }

    ?>
    <div class="notificationTab">
        <div class="leftContent">
            <input type="hidden" value="<?php echo $id ?>">
            <input type="hidden" value="<?php echo $topicName ?>">
            <input type="hidden" value="<?php echo $userId ?>">
            <div class="dp">
                <img src="<?php echo $userDp ?></strong>" alt="" class="img-fluid">
            </div>
            <div class="contentNotif">
                User Id : <strong class="text-danger"><?php echo $userId ?></strong> has requested for a
                topic : <strong class="text-danger"><?php echo $topicName ?></strong>
            </div>
        </div>
        <div class="iconContent">
            <button class="btn accept"><i class="fa-solid fa-check text-success"></i></button>
            <button class="btn deleteNotif"><i class="fa-solid fa-trash-can text-danger"></i></button>
        </div>
    </div>
<?php } ?>