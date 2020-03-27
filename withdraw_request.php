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
withdrawid: "2916",
type: "1",
current_url: "http://nscript/vtigercrm/index.php?module=withdraw&view=List&app=FINANCE"
}
*/

if(isset($_REQUEST["withdrawid"],$_REQUEST["type"],$_REQUEST["current_url"])&&$_REQUEST["withdrawid"]!=""&&$_REQUEST["type"]!=""&&$_REQUEST["current_url"]!="")
{
	$withdraw_data="select vtiger_crmentity.*,vtiger_withdraw.*,vtiger_mt4account.*   
						from vtiger_crmentity 
						left join vtiger_withdraw ON vtiger_withdraw.withdrawid= vtiger_crmentity.crmid 
						left join vtiger_mt4account ON vtiger_mt4account.mt4accountid= vtiger_withdraw.loginid 
						where vtiger_crmentity.crmid=?";
				$withdraw_data = $adb->pquery($withdraw_data, array($_REQUEST["withdrawid"]));
				$withdraw_data=$adb->fetch_array($withdraw_data);
				$log->info("withdraw data ".json_encode($withdraw_data));

	if(!empty($withdraw_data))
	{
		$login=$withdraw_data["loginid"];
		$mode=$withdraw_data["acc_type"];
	
		if($_REQUEST["type"]==1)//Approve
		{
		
			if($withdraw_data["status"]==2)
			{
					$withdraw_response =withdraw($login, $withdraw_data["amount"], $withdraw_data["cf_974"], $mode);
				
					$log->info("withdraw response $withdraw_response");
					
					$withdraw_response=json_decode($withdraw_response,true);
					
					
					if ($withdraw_response['status'] == 'OK')
					{
						
						$adb->pquery('UPDATE vtiger_withdraw SET status=1,ticket=? WHERE `withdrawid`= ?',array($withdraw_response['order'],$_REQUEST["withdrawid"]));
					}
					else
					{
						$adb->pquery('UPDATE vtiger_withdraw SET status=3 WHERE `withdrawid`= ?',array($_REQUEST["withdrawid"]));
					}

			}
			
			$_SESSION["message"]="Withdraw Approved Successfully.";
		
		}
		else if($_REQUEST["type"]==2)//Decline
		{
			
			
			if($withdraw_data["status"]==2)
			{
				$adb->pquery('UPDATE vtiger_withdraw SET status=3 WHERE `withdrawid`= ?',array($_REQUEST["withdrawid"]));
			}
			
			$_SESSION["message"]="Withdraw Declined.";
			
		}
	}



	header("Location:".urldecode($_REQUEST["current_url"]));
}



?>