<?php
	//echo 'Disabled';die;
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	
	global $log,$sql_manager,$adb,$_site_config;
	$adb->pquery("update vtiger_mt4prices set display_from_cron=0");
	$log->info("mt4 cron");
	$mdb = new PearDatabase();
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	$groups=groups();
	$mt4_price=$mdb->pquery("select mt4_prices.* from mt4_prices");
	$ret=array();
	$inserted = 0;
	$updated = 0;
	$deleted = 0;
	$totalPrices = $mdb->num_rows($mt4_price);
	if($totalPrices > 0) {
		while ($f = $mdb->fetch_array($mt4_price)) {
			if(isset($f['symbol']) && $f['symbol'] != ''){
				$log->info("Symbol : ".$f['symbol']);
				$getTradeData = " select * from vtiger_mt4prices where symbol like '".$f['symbol']."'";
				$log->info("Query : ".$getTradeData);
				$tradeDate=$adb->pquery($getTradeData);
				if($adb->num_rows($tradeDate) == 0){
					$log->info("INSERT");
					$primaryID = $adb->getUniqueID('vtiger_crmentity');
					$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'mt4prices', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$f['symbol']."')";
					$log->info("CRM Entity Query : ".$entityData);
					//$adb->pquery($entityData);
					$tradeData="INSERT INTO vtiger_mt4prices (mt4pricesid, symbol, time, bid, ask, low, high, direction, digits, spread, modify_time, display_from_cron) VALUES (".$primaryID.",'".$f[0]."', '".$f[1]."', '".$f[2]."', '".$f[3]."', '".$f[4]."', '".$f[5]."', '".$f[6]."', '".$f[7]."', '".$f[8]."', '".$f[9]."', 1)";
					$log->info("MT4 Trade Query : ".$tradeData);
					//$adb->pquery($tradeData);
					$inserted++;
				} else {
					$log->info("UPDATE");
					$tradeData="UPDATE vtiger_mt4prices set (time='".$f[1]."', bid='".$f[2]."', ask='".$f[3]."', low='".$f[4]."', high='".$f[5]."', direction='".$f[6]."', digits='".$f[7]."', spread='".$f[8]."', modify_time='".$f[9]."', display_from_cron=1 WHERE symbol like '".$f['symbol']."'";
					$log->info("MT4 Trade Query : ".$tradeData);
					//$adb->pquery($tradeData);
					$updated++;
				}
			}
		}
		$mt4_price->close();
		$mt4_trade=$mdb->pquery("select mt4_prices.SYMBOL from mt4_prices");
		$allTradeID = array();
		while ($f = $mdb->fetch_array($mt4_trade)) {
			$allTradeID[] = $f[0];
		}
		$mt4_trade->close();
		// Deleted Recordss
		$result = $adb->pquery("select mt4tradeid from vtiger_mt4prices WHERE SYMBOL NOT IN ('".implode("','",$allTradeID)."')");
		$totalDeleted = $adb->num_rows($result);
		$deleted = $totalDeleted;
		$tradeData="UPDATE vtiger_mt4prices set del_i=1 WHERE SYMBOL NOT IN ('".implode("','",$allTradeID)."')";
		$adb->pquery($tradeData);
	} else {
		$log->info("NO DATA MT4 TRADE DATABASE");
		echo "NO DATA MT4 TRADE DATABASE";die;
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
	echo 'Total Delete : '.$deleted.'<br>';
?>