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
depositid: "2906",
type: "1",
current_url: "http://nscript/vtigercrm/index.php?module=deposit&parent=&page=1&view=List&viewname=57&orderby=&sortorder=&app=MARKETING&search_params=%5B%5D&tag_params=%5B%5D&nolistcache=0&list_headers=%5B%22(login_id+%3B+(mt4account)+loginid)%22%2C%22amount%22%2C%22status%22%2C%22credits%22%2C%22cf_972%22%5D&tag="
}
*/

if(isset($_REQUEST["depositid"],$_REQUEST["type"],$_REQUEST["current_url"])&&$_REQUEST["depositid"]!=""&&$_REQUEST["type"]!=""&&$_REQUEST["current_url"]!="")
{
	$deposit_data="select vtiger_crmentity.*,vtiger_deposit.*,vtiger_mt4account.*   
						from vtiger_crmentity 
						left join vtiger_deposit ON vtiger_deposit.depositid= vtiger_crmentity.crmid 
						left join vtiger_mt4account ON vtiger_mt4account.mt4accountid= vtiger_deposit.loginid 
						where vtiger_crmentity.crmid=?";
						
$deposit_data = $adb->pquery($deposit_data, array($_REQUEST["depositid"]));
$deposit_data=$adb->fetch_array($deposit_data);
$log->info("deposit data ".json_encode($deposit_data));

if(!empty($deposit_data))
{
		$login=$deposit_data["loginid"];
		$mode=$deposit_data["acc_type"];
	
		if($_REQUEST["type"]==1)//Approve
		{
		
			if($deposit_data["status"]==2)
			{
				//echo json_encode($deposit_data);
				//exit();
				/*******start******/
				
				$deposit_response =deposit($login, $deposit_data["amount"],$deposit_data["cf_972"], $mode);
			
				$log->info("deposit response ".$deposit_response);
				
				$deposit_response=json_decode($deposit_response,true);
				
				
				if ($deposit_response['status'] == 'OK')
				{
					
					$adb->pquery('UPDATE vtiger_deposit SET status=1,ticket=? WHERE `depositid`= ?',array($deposit_response['order'],$_REQUEST["depositid"]));
				}
				else
				{
					$adb->pquery('UPDATE vtiger_deposit SET status=3 WHERE `depositid`= ?',array($_REQUEST["depositid"]));
				}
				/*******end******/
				
				
				
				
			}
			
			$_SESSION["message"]="Deposit Approved Successfully.";
		
		}
		else if($_REQUEST["type"]==2)//Decline
		{
			
			
			if($deposit_data["status"]==2)
			{
				$adb->pquery('UPDATE vtiger_deposit SET status=3 WHERE `depositid`= ?',array($_REQUEST["depositid"]));
			}
			
			$_SESSION["message"]="Deposit Declined.";
			
		}
	}



	header("Location:".urldecode($_REQUEST["current_url"]));
}



?>