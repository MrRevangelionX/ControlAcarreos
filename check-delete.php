<?php
    require_once('./cfg/db.php');

    if (isset($_GET['Location']) && !empty($_GET['Location'])){
        $consulta = "update wapp_acarreos_loc set last_update = GETDATE(), active = 0 where codLocation ='" .$_GET['Location']. "'";
        $rs = Query($consulta);
        if($rs){
            header('location: ./locations.php');
        }
    }

    if (isset($_GET['Proyecto']) && !empty($_GET['Proyecto'])){
        $consulta = "update wapp_acarreos_proj set last_update = GETDATE(), active = 0 where codproyecto ='" .$_GET['Proyecto']. "'";
        $rs = Query($consulta);
        if($rs){
            header('location: ./proyectos.php');
        }
    }
?>