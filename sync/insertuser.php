<?php
	$json = file_get_contents('php://input');
	// $json = file_get_contents('./request.txt');
	$data = json_decode($json, TRUE);

	// DUMP HACIA UN ARCHIVO JSON
	$myfile = fopen("request.txt", "w");
	fwrite($myfile, $json);
	fclose($myfile);

	require_once("../CFG/db.php");
	
	$status = "ERROR";
	$sync = 0;
	$rs = NULL;

	$response = array();

	if(isset($data['transPlate']) && !empty($data['transPlate'])){
		$cEmpresa = strval($data['codempresa']);
		$cSucursal = strval($data['codsucursal']);
		$cProyecto = strval($data['codproyecto']);
		$cLocacion = $data['codLocacion'];
		$tOwner = $data['transOwner'];
		$tPlate = $data['transPlate'];
		$tCapacity = $data['transCapacity'];
		$tMaterial = $data['transMaterial'];
		$tCheck = $data['checkpoint'];

		$query = "INSERT INTO wapp_acarreos (codempresa
	                                       ,codsucursal
	                                       ,codproyecto
										   ,nomLocacion
	                                       ,transOwner
	                                       ,transPlate
	                                       ,transCapacity
										   ,transMaterial
	                                       ,[checkpoint]
	                                       ,sync
	                                       ,sync_time)
	                               VALUES (".$cEmpresa."
	                                       ,".$cSucursal."
	                                       ,".$cProyecto."
										   ,".$cLocacion."
	                                       ,'".$tOwner."'
	                                       ,'".$tPlate."'
	                                       ,'".$tCapacity."'
										   ,".$tMaterial."
	                                       ,'".$tCheck."'
	                                       ,1
	                                       ,GETDATE())";

		// echo $query;
		// exit;

		$rs = Query($query);
		
	}else{
		$rs = FALSE;
	}
	
	if($rs){
		$response["status"] = "OK";
		$response["plate"] = $tPlate;
		$response["time"] =$tCheck;
		$response["sync"]="1";
	}else{
		$response["status"] = "ERROR";
		$response["plate"] = $tPlate;
		$response["time"] =$tCheck;
		$response["sync"]="0";
	}
	echo json_encode($response);
?>