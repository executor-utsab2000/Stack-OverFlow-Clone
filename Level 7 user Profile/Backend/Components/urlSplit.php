<?php



function splitUrl($url)
{
    $urlParamKey = explode('=', explode('?', $url)[1])[0];
    $urlParamValue = explode('=', explode('?', $url)[1])[1];

    if (strpos($url, 'message') == true) {
        $urlParamKey = explode('=', explode('&', explode('?', $url)[1])[0])[0];
        $urlParamValue = explode('=', explode('&', explode('?', $url)[1])[0])[1];
    }

    return ['urlParamKey' => $urlParamKey, 'urlParamValue' => $urlParamValue];
}





?>