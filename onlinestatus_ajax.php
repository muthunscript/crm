<?php


require_once('config.php');
require_once('include/utils/utils.php');

global $log,$sql_manager,$adb,$_site_config;

$log->info("online status ".json_encode($_REQUEST));


//echo json_encode($_REQUEST);
//{"__vtrftk":"sid:fc3d355a8d7c408dd7d0a97d69fce721af52f8f5,1583736640","page":"http:\/\/20.0.0.2\/vtigercrm\/index.php?module=Contacts&view=Detail&record=183&app=MARKETING","userid":"1"}


if(isset($_REQUEST['page'],$_REQUEST['userid'])&&$_REQUEST['page']!=""&&$_REQUEST['userid']!="")
{
	$now=mktime(0,0,0,date('m'),date('d'),date('Y'));
	$now1=mktime(0,0,0,date('m'),date('d'),date('Y'));
	
	
	/************/
	
	$now=strtotime("-30 minutes");
	$now1 = time();
			
	$online=$adb->pquery("SELECT * FROM `vtiger_onlinestatus` where userid=".$_REQUEST['userid']." and  datetime>=".$now." and datetime<=".$now1." limit 1");
	
   $online_arr=array();
   if($online)
   {

		while ($row = $adb->fetch_array($online))
		{
			
			$online_arr[]=$row;

		}
		
	   
   }
   
 
	if(!empty($online_arr))
	{
		
		$adb->pquery("UPDATE `vtiger_crmentity` SET `label`=".$_REQUEST['page']." WHERE crmid=".$online_arr["onlinestatusid"]."");
		
		$adb->pquery("UPDATE `vtiger_onlinestatus` SET `page`=".$_REQUEST['page'].",`ip`='".find_ip()."',`datetime`='".time()."' WHERE onlinestatusid=".$online_arr["onlinestatusid"]."");
	}
	else
	{
		$current_id = $adb->getUniqueID("vtiger_crmentity");
		$log->info("onlinestatusid ".$current_id);


		$vtiger_crmentity="INSERT INTO `vtiger_crmentity`(`crmid`,`setype`, `label`) VALUES ('".$current_id."','onlinestatus','".$_REQUEST['page']."')"; 

		$adb->pquery($vtiger_crmentity);

		$sql="INSERT INTO `vtiger_onlinestatus`(`onlinestatusid`, `page`, `userid`, `ip`, `datetime`) VALUES ('".$current_id."','".$_REQUEST['page']."','".$_REQUEST['userid']."','".find_ip()."','".time()."')";
		$adb->pquery($sql);	
	}
	
	/************/
	
	
	

	echo 1;
}





?>