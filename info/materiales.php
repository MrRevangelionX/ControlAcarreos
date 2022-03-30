<?php
    require_once('../cfg/db.php');
    $sql = "select codMaterial, nomMaterial from wapp_acarreos_mat order by codMaterial";
    if(!Query($sql)){
        echo "Error en la ejecucion de la consulta";
    }else{
        $results = Query($sql);
        $rows = countQuery($sql);
        if($rows > 0){
            $return_arr['materiales'] = array();
            foreach($results as $row){
                array_push($return_arr['materiales'], array(
                    'codMaterial'=>$row['codMaterial'],
                    'nomMaterial'=>$row['nomMaterial']
                ));
            }
            echo json_encode($return_arr);
        }
    }
?>