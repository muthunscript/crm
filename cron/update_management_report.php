<?php
	//echo 'Disabled';die;
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;

	$loginid="";
	$user_register=user_register();
	$kola=withdraw_history($loginid);
	$inserted = $updated = 0;
	$date_wise=array();

	foreach($kola as $ko)
	{
		
		$va=$ko[0]["open_time"];
		$va=explode(" ", $va);
		$va=explode("-", $va[0]);
		$timestamp=mktime(0,0,0,$va[1],$va[2],$va[0]);
		
		$date_wise[$timestamp][]=array($ko[0]);
		
	}
	$management_report=array();
	
	
	foreach($date_wise as $k => $v)
	{
		$ticket = $v[0][0]['ticket'];
		$loginid = $v[0][0]['login'];
		$report=calculation($v);
		$register_date=date('m/d/Y', $k);
		$Registrations=0;
		$Active_user=1;
		$Volume=0;
		//$net_deposit=$report["totaldep"]+$report["totalwith"];
		$Credits=1;
		$lot=0;
		if(array_key_exists($myId, $USER_REGISTER))
		{
			$Registrations=$USER_REGISTER[$myId];
		}
		$management_report[]=array($register_date,$Registrations,$Active_user,$report["open_order"],$report["close_order"],$report["volume"],$report["pnlfinal"],$report["totaldep"],$report["totalwith"],$report["net_deposit"],$report["credit_in"],$report["credit_out"],$report["lot"], $ticket, $loginid);

		$getData = " select * from vtiger_managementreport where ticket = ".$ticket.' and loginid='.$loginid;
		$date=$adb->pquery($getData);
		$totalRows = $adb->num_rows($date);
		$date = $adb->fetch_array($date);
		if($totalRows == 0){
			$primaryID = $adb->getUniqueID('vtiger_crmentity');
			$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'managementreport', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$ticket."')";
			$adb->pquery($entityData);
			$reportData="INSERT INTO vtiger_managementreport (managementreportid, date, registrations, activeusers, openedtrades, closetrades, volume, totalpl, deposit, withdrawls, netdeposit, creditin, creditout, volumnlots, ticket, loginid) VALUES (".$primaryID.",'".$register_date."', '".$Registrations."', '".$Active_user."', '".$report["open_order"]."', '".$report["close_order"]."', '".$report["volume"]."', '".$report["pnlfinal"]."', '".$report["totaldep"]."', '".$report["totalwith"]."', '".$report["net_deposit"]."', '".$report["credit_in"]."', '".$report["credit_out"]."', '".$report["lot"]."', '".$ticket."', '".$loginid."')";
			$adb->pquery($reportData);
			$inserted++;
		} else {
			$reportData="UPDATE vtiger_managementreport set date = '".$register_date."', registrations = '".$Registrations."', activeusers = '".$Active_user."', openedtrades = '".$report["open_order"]."', closetrades = '".$report["close_order"]."', volume = '".$report["volume"]."', totalpl = '".$report["pnlfinal"]."', deposit = '".$report["totaldep"]."', withdrawls = '".$report["totalwith"]."', netdeposit = '".$report["net_deposit"]."', creditin = '".$report["credit_in"]."', creditout = '".$report["credit_out"]."', volumnlots = '".$report["lot"]."' where ticket = ".$ticket.' and loginid='.$loginid;
			$adb->pquery($reportData);
			$updated++;
		}
		
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
?>