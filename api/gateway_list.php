<?php

ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;


$response=array("status"=>false,"message"=>"Invalid data.");

if(isset($_REQUEST["email"],$_REQUEST["password"])&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!="")
{
	$sql="SELECT * FROM `vtiger_paymentsource`";
}

echo json_encode($response);

?>