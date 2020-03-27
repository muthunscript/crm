<?php


ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;

$response=array("status"=>false,"message"=>"Invalid data.");

if(isset($_REQUEST["email"],$_REQUEST["password"],$_REQUEST["login"],$_REQUEST["mt4_password"])&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!=""&&$_REQUEST["login"]!=""&&$_REQUEST["mt4_password"]!="")
{
	
	$login=$_REQUEST["login"];
	
	$user_auth=user_auth($_REQUEST["email"],$_REQUEST["password"],$login);

	$user_auth=json_decode($user_auth,true);
	if($user_auth["user_auth"]==1)
	{					
		$response=change_pwd($login,$_REQUEST["mt4_password"],$user_auth["mt4account"]["acc_type"]);	
		$response=trim($response);
		$log->info("change_pwd " . $response);
		
		if($response=='USER PASSWORD CHANGED'){
			$sql_data="UPDATE `vtiger_mt4account` SET `password`=? WHERE loginid=?";
			$sql_data=$adb->pquery($sql_data, array($_REQUEST["mt4_password"],$login));
			
			$response=array("status"=>true,"message"=>"USER PASSWORD CHANGED","login"=>$login);
		}
		
		else
		{
			$response=array("status"=>false,"message"=>"Failed");
		}
	}
	else
	{
		$response=array("status"=>false,"message"=>"Authentication failed.");
	}
	
}
echo json_encode($response);
?>