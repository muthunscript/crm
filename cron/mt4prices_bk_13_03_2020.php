<?php

ini_set("include_path", "../");

require('send_mail.php');
require_once('config.php');
require_once('include/utils/utils.php');


global $log,$sql_manager,$adb,$_site_config;
$mt4trade_truncate = $adb->pquery('TRUNCATE TABLE vtiger_mt4prices');


$log->info("mt4 cron");

$mdb = new PearDatabase();
	
$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);

$mt4_trade=$mdb->pquery("select * from mt4_prices limit 1");

$ret=array();
if($mt4_trade)
{

	while ($f = $mdb->fetch_array($mt4_trade))
	{
		$ret[]=" ('".$f[0]."', '".$f[1]."', '".$f[2]."', '".$f[3]."', '".$f[4]."', '".$f[5]."', '".$f[6]."', '".$f[7]."', '".$f[8]."', '".$f[9]."')";
	}
	$mt4_trade->close();
   
}



$ret=array_chunk($ret, 50);

foreach($ret as $r)
{
	$comma_separated = implode(",", $r);

	
	$sql="INSERT INTO `vtiger_mt4prices` (`SYMBOL`, `TIME`, `BID`, `ASK`, `LOW`, `HIGH`, `DIRECTION`, `DIGITS`, `SPREAD`, `MODIFY_TIME`) VALUES ".$comma_separated."";
	$adb->pquery($sql);	
}
?>