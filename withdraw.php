<?php

ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;

$response=array("status"=>false,"message"=>"Invalid data.");

if(isset($_REQUEST["email"],$_REQUEST["password"],$_REQUEST["login"],$_REQUEST["amount"],$_REQUEST["comment"])&&$_REQUEST["login"]!=""&&$_REQUEST["amount"]!=""&&$_REQUEST["comment"]!=""&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!="")
{
	$vtiger_mt4account="SELECT vtiger_crmentityrel.* FROM `vtiger_mt4account` left join vtiger_crmentityrel ON vtiger_crmentityrel.relcrmid=vtiger_mt4account.mt4accountid where vtiger_mt4account.loginid=".$_REQUEST["login"]." and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.module='Contacts'";
	$log->info("Query : ".$vtiger_mt4account);
	$vtiger_mt4account=$adb->pquery($vtiger_mt4account);
	$vtiger_mt4account=$adb->fetch_array($vtiger_mt4account);

	if(!empty($vtiger_mt4account))
	{
		$filename='crm_setting.json';
		$str = file_get_contents($filename);
		$json = json_decode($str,true);
		
		/**start**/
		$mode=2;
		if($json["withdraw"]==1)
		{
			$mode=1;
		}
		
		/**end**/
		
		
		$primaryID1 = $adb->getUniqueID('vtiger_crmentity');

		$entityData1="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID1.",1, 1, 1, 'withdraw', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'API', '')";
		$log->info("CRM Entity Query : ".$entityData1);
		$adb->pquery($entityData1);

		$withdraw="INSERT INTO `vtiger_withdraw`(`withdrawid`, `loginid`, `amount`, `status`, `cf_974`, `mode`) VALUES (?,?,?,?,?,?)";
		$deposit_param=array($primaryID1,$vtiger_mt4account["relcrmid"],$_REQUEST["amount"],2,$_REQUEST["comment"],$mode);

		$adb->pquery($withdraw,$deposit_param);



		$vtiger_crmentityrel="INSERT INTO `vtiger_crmentityrel`(`crmid`, `module`, `relcrmid`, `relmodule`) VALUES (?,?,?,?)";
		$vtiger_crmentityrel_para=array($vtiger_mt4account["crmid"],$vtiger_mt4account["module"],$primaryID1,"withdraw");

		$adb->pquery($vtiger_crmentityrel,$vtiger_crmentityrel_para);
		
		
		/*******start******/
		
		/*
		if($json["withdraw"]==1)//automatic
		{
			
			$withdraw_response =withdraw($login, $withdraw_data["amount"], $withdraw_data["cf_974"], $mode);
		
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
			
			

		}
		else // manual
		{
			$adb->pquery('UPDATE vtiger_withdraw SET status=2 WHERE `withdrawid`= ?',array($withdraw_id));
		}
		
		*/
		
		/*******end******/
		
		
		$response=array("status"=>true,"message"=>"Withdraw success.","withdrawid"=>$primaryID1);
	}
					
}
echo json_encode($response);
?>