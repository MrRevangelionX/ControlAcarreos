<?php
    require_once('../cfg/db.php');
    if(isset($_GET['sucursal'])){
        $sql = "select codproyecto, nomproyecto from wapp_acarreos_proj where active = 1 order by codproyecto";
        if(!Query($sql)){
            echo "Error en la ejecucion de la consulta";
        }else{
            $results = Query($sql);
            $rows = countQuery($sql);
            if($rows > 0){
                $return_arr['proyectos'] = array();
                foreach($results as $row){
                    array_push($return_arr['proyectos'], array(
                        'codproyecto'=>$row['codproyecto'],
                        'nomproyecto'=>$row['nomproyecto']
                    ));
                }
                echo json_encode($return_arr);
            }
        }
    }
?>