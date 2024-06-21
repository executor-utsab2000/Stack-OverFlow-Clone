<?php
session_start();
// is session set or not 
$ifUserLoggedIn;
if (isset($_SESSION['userId'])) {
    $ifUserLoggedIn = ["ifActive" => true];
} else {
    $ifUserLoggedIn = ["ifActive" => false];
}


// $ifUserLoggedIn = ["ifActive" => false];
echo json_encode($ifUserLoggedIn);

?>