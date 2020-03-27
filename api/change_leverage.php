<?php


ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;

$response=array("status"=>false,"message"=>"Invalid data.");

if(isset($_REQUEST["email"],$_REQUEST["password"],$_REQUEST["login"],$_REQUEST["leverage"])&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!=""&&$_REQUEST["login"]!=""&&$_REQUEST["leverage"]!="")
{
	$user_auth=user_auth($_REQUEST["email"],$_REQUEST["password"],$_REQUEST["login"]);

	$user_auth=json_decode($user_auth,true);
	if($user_auth["user_auth"]==1)
	{
		$response=array("status"=>true,"user_auth"=>$user_auth);
	}
	else
	{
		$response=array("status"=>false,"message"=>"Authentication failed.");
	}
	
}
echo json_encode($response);
?>