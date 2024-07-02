<?php

require '../Backend/Components/connection.php';
// notification bar

// $notificationQuery = mysqli_query($connection, "select `topicrequesttoadmin`.id , `topicrequesttoadmin`.userId , `topicrequesttoadmin`.topicName ,users.userAvtar  from `topicrequesttoadmin` left join users using(userId);");

$countNoOfNotification = mysqli_num_rows(mysqli_query($connection, "SELECT * from `topicrequesttoadmin`"));

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------





















?>