<?php
ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$adb->pquery("update vtiger_mt4trade set display_from_cron=0");
	$log->info("mt4 cron");
	$mdb = new PearDatabase();
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	$groups=groups();
	$mt4_trade=$mdb->pquery("
		select mt4_trades.*,mt4_users.*
		from mt4_trades
		join mt4_users
		on mt4_users.LOGIN=mt4_trades.LOGIN
		where mt4_users.`GROUP` in (\"".implode('","',$groups)."\")
		order by mt4_trades.OPEN_TIME DESC
		limit 1
	");
	$inserted = 0;
	$updated = 0;
	$deleted = 0;
	$totalRows = $mdb->num_rows($mt4_trade);
	if($totalRows > 0){
		while ($f = $mdb->fetch_array($mt4_trade)) {
			echo json_encode($f);
		}
	}
?>