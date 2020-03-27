<?php

ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;

$response=array("status"=>false,"message"=>"Invalid data");

if(isset($_REQUEST["email"],$_REQUEST["password"],$_REQUEST["login"])&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!=""&&$_REQUEST["login"]!="")
{
	$all_mt4account=array();
	$lead_data="select vtiger_crmentity.*,vtiger_contactdetails.*,vtiger_contactaddress.*  
		from vtiger_crmentity 
		left join vtiger_contactdetails ON vtiger_contactdetails.contactid= vtiger_crmentity.crmid 
		left join vtiger_contactaddress ON vtiger_contactaddress.contactaddressid= vtiger_crmentity.crmid 
		where vtiger_contactdetails.email=? and vtiger_contactdetails.password=?";

	$lead_data = $adb->pquery($lead_data, array($_REQUEST["email"],$_REQUEST["password"]));
	$lead_data=$adb->fetch_array($lead_data);
	
	$loginid=$_REQUEST["login"];
	$_mt_user=array_shift(mt4_users($loginid));
	
	$kola=withdraw_history($loginid);
	$log->info("withdraw_history list ".json_encode($kola));
	
	$response=calculation($kola);
	
	array_push($response,array_shift($_mt_user));
				array_push($all_mt4account,$response);
	
	echo json_encode($all_mt4account);
	
	//echo json_encode($lead_data);
	//exit();
	
	/*
	$user_auth=user_auth($_REQUEST["email"],$_REQUEST["password"]);
	echo var_dump($user_auth);
	exit();
	if(!empty($user_auth))
	{
		$loginid=$_REQUEST["login"];
		$mt4_users=mt4_users($loginid);
		echo json_encode($mt4_users);
		exit();
	}
	*/
}



?>