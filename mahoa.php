<?php
    include "./RSA.php";
    if(empty($_POST["txt"]) && empty($_POST["keyb"]))
    {
        die;
    }
    else
    {
    $banro= $_POST["txt"];
    $keyb= $_POST["keyb"];
    $keyn = $_POST["keyn"];
    
    $banma = mahoa($banro,$keyb,$keyn);
    
    echo json_encode($banma);
    }
?>