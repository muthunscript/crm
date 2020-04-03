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
	$inserted = $updated = 0;
	$date_wise=array();

	foreach($kola as $ko)
	{
		if($ko[0]["login"]!="")
		{
			$date_wise[$ko[0]["login"]][]=array($ko[0]);
		}
	}
	$management_report=array();
	
	$agent="";
	$last_trade=0;
	$trade=0;
	

	foreach($date_wise as $k => $v)
	{	
		
		$report=calculation($v);
		$management_report[]=array($v[0][0]["name"],$v[0][0]["login"],$agent,$v[0][0]["regdate"],$v[0][0]["country"],$last_trade,$report["ftd"],$report["totaldep"],$report["totalwith"],$report["net_deposit"],$report["credit_in"],$report["credit_out"],$trade,$report["volume"],$report["pnlfinal"],$report["lot"]);

		$getData = " select * from vtiger_tradereport where accountnumber = ".$v[0][0]["login"];
		$date=$adb->pquery($getData);
		$totalRows = $adb->num_rows($date);
		$date = $adb->fetch_array($date);
		if($totalRows == 0){
			$primaryID = $adb->getUniqueID('vtiger_crmentity');
			$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'tradereport', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$v[0][0]["login"]."')";
			$adb->pquery($entityData);
			$reportData="INSERT INTO vtiger_tradereport (tradereportid, accountname, accountnumber, agent, registerdate, country, lasttrade, ftd, deposit, withdrawals, balance, creditin, creditout, trades, volumn, totalpl, volumnlots) VALUES (".$primaryID.",'".$v[0][0]["name"]."', '".$v[0][0]["login"]."', '".$agent."', '".$v[0][0]["regdate"]."', '".$v[0][0]["country"]."', '".$last_trade."', '".$report["ftd"]."', '".$report["totaldep"]."', '".$report["totalwith"]."', '".$report["net_deposit"]."', '".$report["credit_in"]."', '".$report["credit_out"]."', '".$trade."', '".$report["volume"]."', '".$report["pnlfinal"]."', '".$report["lot"]."')";
			$adb->pquery($reportData);
			$inserted++;
		} else {
			$reportData="UPDATE vtiger_tradereport set accountname = '".$v[0][0]["name"]."', agent = '".$agent."', registerdate = '".$v[0][0]["regdate"]."', country = '".$v[0][0]["country"]."', lasttrade = '".$last_trade."', ftd = '".$report["ftd"]."', deposit = '".$report["totaldep"]."', withdrawals = '".$report["totalwith"]."', balance = '".$report["net_deposit"]."', creditin = '".$report["credit_in"]."', creditout = '".$report["credit_out"]."', trades = '".$trade."', volumn = '".$report["volume"]."', totalpl = '".$report["pnlfinal"]."', volumnlots = '".$report["lot"]."' where accountnumber = ".$v[0][0]["login"];
			$adb->pquery($reportData);
			$updated++;
		}
		
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
?>