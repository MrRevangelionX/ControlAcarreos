<?php
    require_once('./cfg/db.php');

    $codempresa = "9";
    $codsucursal = explode(' ', $_POST['addProyectoSucursal']);
    $nomProyecto = $_POST['addProyectoName'];

    $insert = "INSERT INTO wapp_acarreos_proj (codempresa,codsucursal,nomproyecto,creation_date,last_update,active)
                                      VALUES ('" .$codempresa. "','" .$codsucursal[0]. "','" .$nomProyecto. "', GETDATE(), GETDATE(), '1')";

    $result = Query($insert);

    if($result){
        header('location: ./proyectos.php');
    }
?>