<?php

ini_set("include_path", "../");

require('send_mail.php');
require_once('config.php');
require_once('include/utils/utils.php');


global $log,$sql_manager,$adb,$_site_config;
$mt4trade_truncate = $adb->pquery('TRUNCATE TABLE vtiger_mt4users');


$log->info("mt4 cron");

$mdb = new PearDatabase();
	
$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);

$mt4_trade=$mdb->pquery("select * from mt4_users");

$ret=array();
if($mt4_trade)
{

	while ($f = $mdb->fetch_array($mt4_trade))
	{
		$ret[]=" ('".$f[0]."', '".$f[1]."', '".$f[2]."', '".$f[3]."', '".$f[4]."', '".$f[5]."', '".$f[6]."', '".$f[7]."', '".$f[8]."', '".$f[9]."', '".$f[10]."', '".$f[11]."', '".$f[12]."', '".$f[13]."', '".$f[14]."', '".$f[15]."', '".$f[16]."', '".$f[17]."', '".$f[18]."', '".$f[19]."', '".$f[20]."', '".$f[21]."', '".$f[22]."', '".$f[23]."', '".$f[24]."', '".$f[25]."', '".$f[26]."', '".$f[27]."', '".$f[28]."', '".$f[29]."', '".$f[30]."', '".$f[31]."', '".$f[32]."', '".$f[33]."', '".$f[34]."', '".$f[35]."', '".$f[36]."', '".$f[37]."', '".$f[38]."', '".$f[39]."')";
	}
	$mt4_trade->close();
   
}



$ret=array_chunk($ret, 50);

foreach($ret as $r)
{
	$comma_separated = implode(",", $r);
	
	$sql="INSERT INTO `vtiger_mt4users` (`LOGIN`, `GROUP`, `ENABLE`, `ENABLE_CHANGE_PASS`, `ENABLE_READONLY`, `ENABLE_OTP`, `PASSWORD_PHONE`, `NAME`, `COUNTRY`, `CITY`, `STATE`, `ZIPCODE`, `ADDRESS`, `LEAD_SOURCE`, `PHONE`, `EMAIL`, `COMMENT`, `ID`, `STATUS`, `REGDATE`, `LASTDATE`, `LEVERAGE`, `AGENT_ACCOUNT`, `TIMESTAMP`, `BALANCE`, `PREVMONTHBALANCE`, `PREVBALANCE`, `CREDIT`, `INTERESTRATE`, `TAXES`, `SEND_REPORTS`, `MQID`, `USER_COLOR`, `EQUITY`, `MARGIN`, `MARGIN_LEVEL`, `MARGIN_FREE`, `CURRENCY`, `MODIFY_TIME`) VALUES ".$comma_separated."";
	$adb->pquery($sql);	
}
?>