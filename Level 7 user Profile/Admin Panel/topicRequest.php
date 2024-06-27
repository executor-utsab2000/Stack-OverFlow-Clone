<?php

session_start();
if (!isset($_SESSION['userId'])) {
    header("location: ../../index.php");
}

$sessionUser = $_SESSION['userId'];

require '../Backend/Components/connection.php';


// var_dump($_POST);

$id = uniqid('topicRequest-');
$topicName = $_POST['topicName'];

$sql = "INSERT INTO `topicrequesttoadmin`(`id`, `userId`, `topicName`) 
            VALUES 
        ('$id','$sessionUser','$topicName')";
$res = mysqli_query($connection, $sql);

if ($res) {
    echo 'Thanks For your Suggession.Our Admin will rewiew it and add the topic1';
}



?>