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