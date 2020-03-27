<?php

ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;


$response=array("status"=>false,"message"=>"Invalid data.");

if(isset($_REQUEST["email"],$_REQUEST["password"])&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!="")
{
	$user_auth=user_auth($_REQUEST["email"],$_REQUEST["password"],$login);

	$user_auth=json_decode($user_auth,true);
	if($user_auth["user_auth"]==1)
	{
			$sql="SELECT * FROM `vtiger_paymentsource`";
	}
	else
	{
		$response=array("status"=>false,"message"=>"Authentication failed.");
	}
	
	
}

echo json_encode($response);

?>