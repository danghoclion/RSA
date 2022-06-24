<?php
    include "./RSA.php";
    if(empty($_POST["txt"]) && empty($_POST["city"]))
    {
        die;
    }
    else
    {
    $banma= $_POST["txt"];
    $keya= $_POST["keya"];
    $keyn = $_POST["keyn"];
    $banro = giaima($banma,$keya,$keyn);
    
    echo json_encode($banro);
    }
?>