<?php

function headerFunction($location, $msg = '', $icon = '', $colorClass = '')
{
    header("location:$location?message=$msg&icon=$icon&colorClass=$colorClass");
}





?>