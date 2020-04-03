<?php
	//echo 'Disabled';die;
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$inserted = $updated = 0;
	$client_report=client_report();
	$user_data=array();
	foreach($client_report as $client) {
		$assigned=$client["user_fn"]." ".$client["user_ln"];
		$client_desc="-";
		$leadsource="-";
		if($client["leadsource"]!="")
			$leadsource=$client["leadsource"];
		$user_data[$client["loginid"]]=array($client["loginid"],$client["createdtime"],$client["label"],$assigned,$leadsource,$client_desc,$assigned);
	}
	$loginid="";
	$kola=withdraw_history($loginid);
	$date_wise=array();
	foreach($kola as $ko) {
		if($ko[0]["login"]!="")
			$date_wise[$ko[0]["login"]][]=array($ko[0]);
	}
	$management_report=array();
	$agent="";
	$last_trade=0;
	$trade=0;
	foreach($date_wise as $k => $v) {
		$client=$user_data[$v[0][0]["login"]];
		$report=calculation($v);
		$management_report[]=array($client[0],$client[1],$client[2],$client[3],$client[4],$client[5],$client[6],$report["ftd"],$report["open_time"],$report["no_redeposits"],$report["redeposits"]);
		$getData = " select * from vtiger_clientreport where accountnumber = '".$client[0]."'";
		$date=$adb->pquery($getData);
		$totalRows = $adb->num_rows($date);
		$date = $adb->fetch_array($date);
		if($totalRows == 0){
			$primaryID = $adb->getUniqueID('vtiger_crmentity');
			$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'clientreport', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$client[0]."')";
			$adb->pquery($entityData);
			$reportData="INSERT INTO vtiger_clientreport (clientreportid, accountnumber, creationdate, name, assignedto, clientsource, clientdescription, conversionowner, ftd, ftddate, noofredeposits, totalredeposits, createdtime, updatedtime) VALUES (".$primaryID.",'".$client[0]."', '".$client[1]."', '".$client[2]."', '".$client[3]."', '".$client[4]."', '".$client[5]."', '".$client[6]."', '".$report["ftd"]."', '".$report["open_time"]."', '".$report["no_redeposits"]."', '".$report["redeposits"]."', '".time()."', '".time()."')";
			$adb->pquery($reportData);
			$inserted++;
		} else {
			$reportData="UPDATE vtiger_clientreport set creationdate = '".$client[1]."', name = '".$client[2]."', assignedto = '".$client[3]."', clientsource = '".$client[4]."', clientdescription = '".$client[5]."', conversionowner = '".$client[6]."', ftd = '".$report["ftd"]."', ftddate = '".$report["open_time"]."', noofredeposits = '".$report["no_redeposits"]."', totalredeposits = '".$report["redeposits"]."', updatedtime = '".time()."' where accountnumber = ".$client[0];
			$adb->pquery($reportData);
			$updated++;
		}
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
?>