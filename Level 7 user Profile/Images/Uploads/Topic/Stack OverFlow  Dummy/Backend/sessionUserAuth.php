<?php

// is session set or not 
// $ifUserLoggedIn ;
// if ((1+1)==2) {
//     // session variable active check
//     $ifUserLoggedIn = ["ifActive" => true];
// } 
// else {
//     $ifUserLoggedIn = ["ifActive" => false];
// }
$ifUserLoggedIn = ["ifActive" => true];
echo json_encode($ifUserLoggedIn);

?>