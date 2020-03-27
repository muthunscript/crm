<?php
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$log->info("mt4 cron");
	$mdb = new PearDatabase();
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	$groups=groups();
	$mt4_trade=$adb->pquery("
		select vtiger_mt4trade.*,vtiger_mt4users.*
		from vtiger_mt4trade
		join vtiger_mt4users
		on vtiger_mt4users.LOGIN=vtiger_mt4trade.LOGIN
		where vtiger_mt4users.`GROUP` in (\"".implode('","',$groups)."\")
		order by vtiger_mt4trade.OPEN_TIME DESC
	");
	$totalRows = $mdb->num_rows($mt4_trade);
	$formattedData = array();
	if($totalRows > 0){
		while ($row = $mdb->fetch_array($mt4_trade)) {
			$formattedData[] = array($row);
		}
	} else {
		
	}
	echo '<pre>';
	print_r($formattedData);
	echo '</pre>';
	echo '<pre>';
	print_r(calculation($formattedData));
	echo '</pre>';die;
?>