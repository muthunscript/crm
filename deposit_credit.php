<?php

require_once('config.php');
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;

session_start();
//echo json_encode($_REQUEST);
//exit();
/*
{
depositid: "1781",
type: "1"
}
*/

if($_REQUEST["type"]==1)//Approve
{
	$deposit_data="select vtiger_crmentity.*,vtiger_deposit.*,vtiger_mt4account.*   
						from vtiger_crmentity 
						left join vtiger_deposit ON vtiger_deposit.depositid= vtiger_crmentity.crmid 
						left join vtiger_mt4account ON vtiger_mt4account.mt4accountid= vtiger_deposit.loginid 
						where vtiger_crmentity.crmid=?";
						
    $deposit_data = $adb->pquery($deposit_data, array($_REQUEST["depositid"]));
	$deposit_data=$adb->fetch_array($deposit_data);
	$log->info("withdraw data ".json_encode($deposit_data));
	
	if($deposit_data["credits_status"]==2)
	{
		//$credit_points=credit_points($deposit_data['mt4accountid'],$deposit_data["accountnewid"],$deposit_data["amount"]);
		
		//call credit function
		
		$adb->pquery('UPDATE vtiger_deposit SET credits_status=1 WHERE `depositid`= ?',array($_REQUEST["depositid"]));
	}
	
	$_SESSION["message"]="Offer Approved Successfully.";
	
}
else if($_REQUEST["type"]==2)//Decline
{
	$deposit_data="select vtiger_crmentity.*,vtiger_deposit.*,vtiger_mt4account.*   
						from vtiger_crmentity 
						left join vtiger_deposit ON vtiger_deposit.depositid= vtiger_crmentity.crmid 
						left join vtiger_mt4account ON vtiger_mt4account.mt4accountid= vtiger_deposit.loginid 
						where vtiger_crmentity.crmid=?";
						
    $deposit_data = $adb->pquery($deposit_data, array($_REQUEST["depositid"]));
	$deposit_data=$adb->fetch_array($deposit_data);
	$log->info("withdraw data ".json_encode($deposit_data));
	
	if($deposit_data["credits_status"]==2)
	{
		$adb->pquery('UPDATE vtiger_deposit SET credits_status=3 WHERE `depositid`= ?',array($_REQUEST["depositid"]));
	}
	
	$_SESSION["message"]="Offer Declined.";
	
}

header("Location:".urldecode($_REQUEST["current_url"]));

?>