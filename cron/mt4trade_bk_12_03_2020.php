<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
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
	//$mt4_trade=$mdb->pquery("select * from mt4_trades");
	$mt4_trade=$mdb->pquery("
		select mt4_trades.*,mt4_users.*
		from mt4_trades
		join mt4_users
		on mt4_users.LOGIN=mt4_trades.LOGIN
		where mt4_users.`GROUP` in (\"".implode('","',$groups)."\")
		order by mt4_trades.OPEN_TIME DESC
		limit 25
	");
	$tradeData=array();
	$entityData=array();
	$sql = '';
	if($mt4_trade) {
		$totalCount = 1;
		$totalRows = $mdb->num_rows($mt4_trade);
		while ($f = $mdb->fetch_array($mt4_trade)) {
			$tradeData[]=" ('".$f[0]."', '".$f[1]."', '".$f[2]."', '".$f[3]."', '".$f[4]."', '".$f[5]."', '".$f[6]."', '".$f[7]."', '".$f[8]."', '".$f[9]."', '".$f[10]."', '".$f[11]."', '".$f[12]."', '".$f[13]."', '".$f[14]."', '".$f[15]."', '".$f[16]."', '".$f[17]."', '".$f[18]."', '".$f[19]."', '".$f[20]."', '".$f[21]."', '".$f[22]."', '".$f[23]."', '".$f[24]."', '".$f[25]."', '".$f[26]."', '".$f[27]."', '".$f[28]."', '".$f[29]."')";
			$entityData[]=" (1, 1, 1, 'mt4trade', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$f[1]."')";
			if(count($tradeData) == 5 || $totalCount == $totalRows){
				$comma_separated = implode(",", $entityData);
				$sql="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, description, createdtime, modifiedtime, viewedtime, status, version, presence, deleted, smgroupid, source, label) VALUES ".$comma_separated.";";
				echo $sql.'<br><br>';
				$adb->pquery($sql);
				//////////////////////////////////////
				$comma_separated = implode(",", $tradeData);
				$sql="INSERT INTO `vtiger_mt4trade` (`TICKET`, `LOGIN`, `SYMBOL`, `DIGITS`, `CMD`, `VOLUME`, `OPEN_TIME`, `OPEN_PRICE`, `SL`, `TP`, `CLOSE_TIME`, `EXPIRATION`, `REASON`, `CONV_RATE1`, `CONV_RATE2`, `COMMISSION`, `COMMISSION_AGENT`, `SWAPS`, `CLOSE_PRICE`, `PROFIT`, `TAXES`, `COMMENT`, `INTERNAL_ID`, `MARGIN_RATE`, `TIMESTAMP`, `MAGIC`, `GW_VOLUME`, `GW_OPEN_PRICE`, `GW_CLOSE_PRICE`, `MODIFY_TIME`) VALUES ".$comma_separated.";";
				echo $sql.'<br><br><br><br>';
				//$adb->pquery($sql);
				//////////////////////////////////////
				echo '<pre>';
				print_R($entityData);
				print_R($tradeData);
				echo '</pre>';
				$tradeData = array();
				$entityData = array();
				die;
			}
			$totalCount++;
			
		}
		$mt4_trade->close();
	}
	die;
	/*$tradeData=array_chunk($tradeData, 50);
	foreach($tradeData as $r) {
		$comma_separated = implode(",", $r);
		$sql="INSERT INTO `vtiger_mt4trade` (`TICKET`, `LOGIN`, `SYMBOL`, `DIGITS`, `CMD`, `VOLUME`, `OPEN_TIME`, `OPEN_PRICE`, `SL`, `TP`, `CLOSE_TIME`, `EXPIRATION`, `REASON`, `CONV_RATE1`, `CONV_RATE2`, `COMMISSION`, `COMMISSION_AGENT`, `SWAPS`, `CLOSE_PRICE`, `PROFIT`, `TAXES`, `COMMENT`, `INTERNAL_ID`, `MARGIN_RATE`, `TIMESTAMP`, `MAGIC`, `GW_VOLUME`, `GW_OPEN_PRICE`, `GW_CLOSE_PRICE`, `MODIFY_TIME`) VALUES ".$comma_separated."";
		//$adb->pquery($sql);
	}*/
?>