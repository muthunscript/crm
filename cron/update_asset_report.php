<?php
	//echo 'Disabled';die;
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$loginid="";
	$kola=withdraw_history($loginid);
	$date_wise=array();
	foreach($kola as $ko) {
		if($ko[0]["symbol"]!="") {
			$date_wise[$ko[0]["symbol"]][]=array($ko[0]);
		}
	}
	$management_report=array();
	$inserted = $updated = 0;
	$agent="";
	$last_trade=0;
	$trade=0;
	$Active_user=1;
	foreach($date_wise as $k => $v) {
		$report=calculation($v);
		$management_report[]=array($v[0][0]["symbol"],$Active_user,$trade,$report["volume"],$report["pnlfinal"],$report["pnlfinal"],$report["lot"]);

		$getData = " select * from vtiger_assetreport where symbol = '".$v[0][0]["symbol"]."'";
		$date=$adb->pquery($getData);
		$totalRows = $adb->num_rows($date);
		$date = $adb->fetch_array($date);
		if($totalRows == 0){
			$primaryID = $adb->getUniqueID('vtiger_crmentity');
			$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'assetreport', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$v[0][0]["symbol"]."')";
			$adb->pquery($entityData);
			$reportData="INSERT INTO vtiger_assetreport (assetreportid, symbol, activeusers, totaltrades, totalvolumn, profit, plrate, volumnlots) VALUES (".$primaryID.",'".$v[0][0]["symbol"]."', '".$Active_user."', '".$trade."', '".$report["volume"]."', '".$report["pnlfinal"]."', '".$report["pnlfinal"]."', '".$report["lot"]."')";
			$adb->pquery($reportData);
			$inserted++;
		} else {
			$reportData="UPDATE vtiger_assetreport set symbol = '".$v[0][0]["symbol"]."', activeusers = '".$Active_user."', totaltrades = '".$trade."', totalvolumn = '".$report["volume"]."', profit = '".$report["pnlfinal"]."', plrate = '".$report["pnlfinal"]."', volumnlots = '".$report["lot"]."' where symbol = ".$v[0][0]["symbol"];
			$adb->pquery($reportData);
			$updated++;
		}
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
?>