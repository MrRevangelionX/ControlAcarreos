<?php
    require_once('./cfg/db.php');

    $codempresa = "9";
    $codsucursal = explode(' ', $_POST['addLocationSucursal']);
    $codproyecto = explode(' ', $_POST['addLocationProyecto']);
    $nomLocation = $_POST['addLocationName'];

    $insert = "INSERT INTO wapp_acarreos_loc (codempresa,codsucursal,codproyecto,nomLocation,creation_date,last_update,active)
                                      VALUES ('" .$codempresa. "','" .$codsucursal[0]. "','" .$codproyecto[0]. "','" .$nomLocation. "', GETDATE(), GETDATE(), '1')";

    $result = Query($insert);

    if($result){
        header('location: ./locations.php');
    }
?>