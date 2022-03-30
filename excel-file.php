<?php
    require_once('./cfg/db.php');

    $consulta = "SELECT * FROM wapp_acarreos a
                inner join wapp_acarreos_proj c on c.codproyecto = a.codproyecto
                inner join wapp_acarreos_loc b on a.nomLocacion = b.codLocation
                inner join wapp_acarreos_mat d on d.codMaterial = a.transMaterial";

    $resultado = Query($consulta);

    $documento = "Acarreos_" .date('Ymd_His'). ".xls";

    // echo $documento;
    // exit;
    
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename='.$documento);
    header('Pragma: no-cache');
    header('Expires: 0');

echo "<table class='table table-hover'>";
echo "<thead>";
echo "<tr>";
echo "<th>Empresa</th>";
echo "<th>Sucursal</th>";
echo "<th>Proyecto</th>";
echo "<th>Locacion</th>";
echo "<th>Contratista</th>";
echo "<th>Placa</th>";
echo "<th>Capacidad</th>";
echo "<th>Material</th>";
echo "<th>Hora Registrada</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
foreach($resultado as $row){;
echo "<tr class='table-light'>";
echo "<td>" .$row['codsucursal'].    "</td>";
echo "<td>" .$row['codsucursal'].    "</td>";
echo "<td>" .$row['nomproyecto'].    "</td>";
echo "<td>" .$row['nomLocation'].    "</td>";
echo "<td>" .$row['transOwner'].     "</td>";
echo "<td>" .$row['transPlate'].     "</td>";
echo "<td>" .$row['transCapacity'].  "</td>";
echo "<td>" .$row['nomMaterial'].    "</td>";
echo "<td>" .$row['checkpoint'].     "</td>";
echo "</tr>";
};
echo "</tbody>";
echo "</table>";