<?php
    include "./RSA.php";
    taokhoa();
    $myobj = array($a,$b,$n);
    $myjson = json_encode($myobj);
    echo $myjson;
?>