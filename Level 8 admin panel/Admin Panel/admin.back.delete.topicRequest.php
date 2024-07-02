<?php


require '../Backend/Components/connection.php';

$reqToAdminId = $_REQUEST['reqToAdminId'];

$sql = mysqli_query($connection, "DELETE FROM topicrequesttoadmin WHERE `topicrequesttoadmin`.`id` = '$reqToAdminId'");


if ($sql) {
    echo 'Data deleted';
}

?>