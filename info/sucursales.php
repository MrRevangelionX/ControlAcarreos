<?php
    require_once('../cfg/db.php');
    $sql = "select codsucursal, nomsucursal from gen_sucursal order by codsucursal";
    if(!Query($sql)){
        echo "Error en la ejecucion de la consulta";
    }else{
        $results = Query($sql);
        $rows = countQuery($sql);
        if($rows > 0){
            $return_arr['sucursales'] = array();
            foreach($results as $row){
                array_push($return_arr['sucursales'], array(
                    'codsucursal'=>$row['codsucursal'],
                    'nomsucursal'=>$row['nomsucursal']
                ));
            }
            echo json_encode($return_arr);
        }
    }
?>