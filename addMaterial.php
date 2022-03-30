<?php
    require_once('./cfg/db.php');

    $nomMaterial = $_POST['addMaterialName'];

    $insert = "INSERT INTO wapp_acarreos_mat (nomMaterial)
                VALUES ('" .$nomMaterial. "')";

    $result = Query($insert);

    if($result){
        header('location: ./materiales.php');
    }
?>