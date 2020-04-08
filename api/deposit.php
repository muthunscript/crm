<?php

ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;

$response=array("status"=>false,"message"=>"Invalid data.");

if(isset($_REQUEST["email"],$_REQUEST["password"],$_REQUEST["login"],$_REQUEST["amount"],$_REQUEST["comment"])&&$_REQUEST["login"]!=""&&$_REQUEST["amount"]!=""&&$_REQUEST["comment"]!=""&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!="")
{
	$login=$_REQUEST["login"];
	$user_auth=user_auth($_REQUEST["email"],$_REQUEST["password"],$login);

	$user_auth=json_decode($user_auth,true);
	if($user_auth["user_auth"]==1)
	{
		/********start*********/
		$vtiger_mt4account="SELECT vtiger_crmentityrel.* FROM `vtiger_mt4account` left join vtiger_crmentityrel ON vtiger_crmentityrel.relcrmid=vtiger_mt4account.mt4accountid where vtiger_mt4account.loginid=".$f["login"]." and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.module='Contacts'";
		$log->info("Query : ".$vtiger_mt4account);
		$vtiger_mt4account=$adb->pquery($vtiger_mt4account);
		$vtiger_mt4account=$adb->fetch_array($vtiger_mt4account);
		if(!empty($vtiger_mt4account))
		{
			$primaryID1 = $adb->getUniqueID('vtiger_crmentity');
			
			$entityData1="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID1.",1, 1, 1, 'deposit', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$f['ticket']."')";
			$log->info("CRM Entity Query : ".$entityData1);
			$adb->pquery($entityData1);
		
			$deposit_insert="INSERT INTO `vtiger_deposit`(`depositid`, `loginid`, `amount`, `status`, `cf_972`, `ticket`) VALUES (?,?,?,?,?,?)";
			$deposit_param=array($primaryID1,$vtiger_mt4account["relcrmid"],$f['profit'],1,$f[21],$f['ticket']);
			
			$adb->pquery($deposit_insert,$deposit_param);
			
			
			
			$vtiger_crmentityrel="INSERT INTO `vtiger_crmentityrel`(`crmid`, `module`, `relcrmid`, `relmodule`) VALUES (?,?,?,?)";
			$vtiger_crmentityrel_para=array($vtiger_mt4account["crmid"],$vtiger_mt4account["module"],$primaryID1,"deposit");
			
			$adb->pquery($vtiger_crmentityrel,$vtiger_crmentityrel_para);
			
			
			/******call fun start******/
			
			
			//$withdraw_response =withdraw($f["login"], $withdraw_data["amount"], $withdraw_data["cf_974"], $mode);
		
			$log->info("withdraw response $withdraw_response");
			
			$withdraw_response=json_decode($withdraw_response,true);
			
			
			if ($withdraw_response['status'] == 'OK')
			{
				
				$adb->pquery('UPDATE vtiger_withdraw SET status=1,ticket=? WHERE `withdrawid`= ?',array($withdraw_response['order'],$withdraw_id));
			}
			else
			{
				$adb->pquery('UPDATE vtiger_withdraw SET status=3 WHERE `withdrawid`= ?',array($withdraw_id));
			}

			
			/******call fun end******/
			
			
		}
		/********end*********/
	}
	else
	{
		$response=array("status"=>false,"message"=>"Authentication failed.");
	}
	
	
	exit();
	
	
}

?>