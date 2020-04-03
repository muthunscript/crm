<?php
require_once('config.php');
require_once('udf.php');
require_once('include/utils/utils.php');

global $log,$sql_manager,$adb,$_site_config;
session_start();

/*

{
__vtrftk: "sid:0dac8fca930dd66342915253dced319ba763ce22,1585732244",
current_url: "http%3A%2F%2Flocalhost%2Fvtigercrm%2Findex.php%3Fmodule%3Dmt4report%26view%3DList%26app%3DSUPPORT%26ibcommission%3D1",
security: "[{"I":"0","S":"Forex"},{"I":"5","S":"Metals"},{"I":"6","S":"Oil"},{"I":"2","S":"CFD"},{"I":"30","S":"Bitcoin"}]",
direct_commission: "1",
Forex_0_1: "",
Metals_5_1: "",
Oil_6_1: "",
CFD_2_1: "",
Bitcoin_30_1: "",
sub_commission: "0",
Forex_0_2: "",
Metals_5_2: "",
Oil_6_2: "",
CFD_2_2: "",
Bitcoin_30_2: ""
}

*/

//echo json_encode($_REQUEST);
//exit();

if(isset($_REQUEST["account"])&&$_REQUEST["account"]!="")
{
	$mt4_users=mt4_users($_REQUEST["account"]);
	
	if(!empty($mt4_users))
	{
		if(isset($_REQUEST["direct_commission"],$_REQUEST["sub_commission"],$_REQUEST["security"])&&$_REQUEST["direct_commission"]!=0&&$_REQUEST["sub_commission"]!=0&&$_REQUEST["security"]!="")
		{
			
			
			$security=json_decode($_REQUEST["security"],true);
			foreach($security as $s)
			{
				$first=$s["S"]."_".$s["I"]."_1";
				$second=$s["S"]."_".$s["I"]."_2";
				
				$log->info("INSERT");
				$primaryID = $adb->getUniqueID('vtiger_crmentity');
				$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'ibmain', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'ibmain', '')";
				$log->info("IBMAIN Query : ".$entityData);
				$adb->pquery($entityData);
				$tradeData="INSERT INTO `vtiger_ibmain`(`ibmainid`, `mt4_id`, `users`, `datetime`, `commission`, `security`, `commissiontype`, `user_type`) VALUES (".$primaryID.",'".$_REQUEST["account"]."',".$_REQUEST["users"].",'".time()."','".$_REQUEST[$first]."','".$s["I"]."','".$_REQUEST["direct_commission"]."','1')";
				$log->info("IBMAIN Query : ".$tradeData);
				$adb->pquery($tradeData);
				
				
				
				$log->info("INSERT");
				$primaryID = $adb->getUniqueID('vtiger_crmentity');
				$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'ibmain', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'ibmain', '')";
				$log->info("IBMAIN Query : ".$entityData);
				$tradeData="INSERT INTO `vtiger_ibmain`(`ibmainid`, `mt4_id`, `users`, `datetime`, `commission`, `security`, `commissiontype`, `user_type`) VALUES (".$primaryID.",'".$_REQUEST["account"]."',".$_REQUEST["users"].",'".time()."','".$_REQUEST[$first]."','".$s["I"]."','".$_REQUEST["sub_commission"]."','2')";
				$log->info("IBMAIN Query : ".$tradeData);
				$adb->pquery($tradeData);
				
			}
			
			/******start******/
			$vtiger_users="UPDATE `vtiger_users` SET `loginid`='".$_REQUEST["account"]."',`commission`=1 WHERE id=".$_REQUEST["users"]."";
			$log->info("IBMAIN Query : ".$vtiger_users);
			$adb->pquery($vtiger_users);
			/******end******/
			
			$_SESSION["message"]="Commission added successfully.";
		
		}
		else
		{
			$_SESSION["message"]="Set commission for users.";
		}
	}
	else
	{
		$_SESSION["message"]="Mt4account not exist.";
	}
	
	

}
else
{
	$_SESSION["message"]="Please provide your mt4account.";
}




//header("Location:".urldecode($_REQUEST["current_url"]));
header("Location:index.php?module=Users&parent=Settings&view=List&block=1&fieldid=1");



?>