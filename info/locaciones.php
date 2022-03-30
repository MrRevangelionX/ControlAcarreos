<?php
    require_once('../cfg/db.php');
    $sql = "select codLocation, nomLocation from wapp_acarreos_loc where active = 1 order by codLocation";
    if(!Query($sql)){
        echo "Error en la ejecucion de la consulta";
    }else{
        $results = Query($sql);
        $rows = countQuery($sql);
        if($rows > 0){
            $return_arr['locaciones'] = array();
            foreach($results as $row){
                array_push($return_arr['locaciones'], array(
                    'codLocation'=>$row['codLocation'],
                    'nomLocation'=>$row['nomLocation']
                ));
            }
            echo json_encode($return_arr);
        }
    }
?>