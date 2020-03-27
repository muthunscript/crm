<?php
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$adb->pquery("UPDATE vtiger_mt4account set display_from_cron=0");
	$client_report=client_report();
	$user_data=array();
	foreach($client_report as $client) {
		$assigned=$client["user_fn"]." ".$client["user_ln"];
		$client_desc="-";
		$leadsource="-";
		if($client["leadsource"]!="") {
			$leadsource=$client["leadsource"];
		}
		$user_data[$client["loginid"]]=array($client["loginid"],$client["createdtime"],$client["label"],$assigned,$leadsource,$client_desc,$assigned);
	}
	$loginid="";
	$kola=withdraw_history($loginid);
	$date_wise=array();
	foreach($kola as $ko) {
		if($ko[0]["login"]!="") {
			$date_wise[$ko[0]["login"]][]=array($ko[0]);
		}
	}
	$management_report=array();
	$agent="";
	$last_trade=0;
	$trade=0;
	$updated=0;
	foreach($date_wise as $k => $v) {
		$client=$user_data[$v[0][0]["login"]];
		$report=calculation($v);
		$query = "UPDATE vtiger_mt4account set pnlfinal='".$report['pnlfinal']."', totaldep='".$report['totaldep']."', totalwith='".$report['totalwith']."', deposit_count='".$report['deposit_count']."', withdraw_count='".$report['withdraw_count']."', open_pl='".$report['open_pl']."', open_order='".$report['open_order']."', close_order='".$report['close_order']."', volume='".$report['volume']."', lot='".$report['lot']."', ftd='".$report['ftd']."', net_deposit='".$report['net_deposit']."', credit_in='".$report['credit_in']."', credit_out='".$report['credit_out']."', credit='".$report['credit']."', close_time='".$report['close_time']."', open_time='".$report['open_time']."', redeposits='".$report['redeposits']."', no_redeposits='".$report['no_redeposits']."', display_from_cron=1 where loginid=".$client[0].";";
		//echo $query.'<br><br>';
		$adb->pquery($query);
		$updated++;
	}
	echo 'Total Updates : '.$updated;
?>