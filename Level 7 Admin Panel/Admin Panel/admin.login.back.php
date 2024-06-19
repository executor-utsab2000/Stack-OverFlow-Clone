<?php
// admin login Id = Admin123
// admin login password = admin@123456

if (isset($_POST['loginPassword']) && isset($_POST['loginId'])) {

    require '../Backend/Components/headerFunction.php';


    $loginId = $_POST['loginId'];
    $loginPassword = $_POST['loginPassword'];


    $loginIdToMatch = sha1('Admin123');
    $loginPasswordToMatch = sha1('admin@123456');


    if (sha1($loginId) == $loginIdToMatch) {
        if (sha1($loginPassword) == $loginPasswordToMatch) {
            session_start();
            $_SESSION['isAdminActive'] = true;
            headerFunction(
                './index.php',
                [
                    'message' => 'Login Successful',
                    'icon' => '<i class="fa-solid fa-check"></i>',
                    'colorClass' => 'success'
                ]
            );
        } else {
            headerFunction(
                './admin.login.php',
                [
                    'message' => 'Login Password incorrect',
                    'icon' => '<i class="fa-solid fa-x"></i>',
                    'colorClass' => 'danger'
                ]
            );
        }

    } else {
        headerFunction(
            './admin.login.php',
            [
                'message' => 'Login ID incorrect',
                'icon' => '<i class="fa-solid fa-x"></i>',
                'colorClass' => 'danger'
            ]
        );
    }



















}

?>