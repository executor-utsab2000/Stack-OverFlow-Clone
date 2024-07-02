<?php


function headerFunction($location, $assoctativeArrayParams = '')
{
    $assoctativeArrayParamsUrl = http_build_query($assoctativeArrayParams);

    header("location:$location?$assoctativeArrayParamsUrl");
}




?>
