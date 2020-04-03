<?php
	//echo 'Disabled';die;
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	
	$groups=groups();
	
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
		and mt4_trades.`CLOSE_TIME`='1970-01-01 00:00:00' order by mt4_trades.OPEN_TIME DESC");
	$inserted = 0;
	$updated = 0;
	$deleted = 0;
	$totalRows = $mdb->num_rows($mt4_trade);
	if($totalRows > 0){
		while ($f = $mdb->fetch_array($mt4_trade)) {
			if(isset($f['ticket']) && $f['ticket'] != ''){
				$log->info("Ticket : ".$f['ticket']);
				$getTradeData = " select * from vtiger_mt4trade where ticket = ".$f['ticket'];
				$log->info("Query : ".$getTradeData);
				$tradeDate=$adb->pquery($getTradeData);
				if($adb->num_rows($tradeDate) == 0){
					$log->info("INSERT");
					$primaryID = $adb->getUniqueID('vtiger_crmentity');
					$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'mt4trade', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$f['ticket']."')";
					$log->info("CRM Entity Query : ".$entityData);
					$adb->pquery($entityData);
					$tradeData="INSERT INTO `vtiger_mt4trade` (mt4tradeid, ticket, login, symbol, digits, cmd, volume, open_time, open_price, sl, tp, close_time, expiration, reason, conv_rate1, conv_rate2, commission, commission_agent, swaps, close_price, profit, taxes, comment, internal_id, margin_rate, timestamp, magic, gw_volume, gw_open_price, gw_close_price, modify_time, display_from_cron) VALUES (".$primaryID.",'".$f[0]."', '".$f[1]."', '".$f[2]."', '".$f[3]."', '".$f[4]."', '".$f[5]."', '".$f[6]."', '".$f[7]."', '".$f[8]."', '".$f[9]."', '".$f[10]."', '".$f[11]."', '".$f[12]."', '".$f[13]."', '".$f[14]."', '".$f[15]."', '".$f[16]."', '".$f[17]."', '".$f[18]."', '".$f[19]."', '".$f[20]."', '".$f[21]."', '".$f[22]."', '".$f[23]."', '".$f[24]."', '".$f[25]."', '".$f[26]."', '".$f[27]."', '".$f[28]."', '".$f[29]."', 1)";
					$log->info("MT4 Trade Query : ".$tradeData);
					$adb->pquery($tradeData);
					
					/******start********/
					
					if($f["profit"]>0 && $f["cmd"] == 6 )//deposit
					{
						$vtiger_deposit = "select * from vtiger_deposit where ticket = ".$f['ticket'];
						$log->info("Query : ".$vtiger_deposit);
						$vtiger_deposit=$adb->pquery($vtiger_deposit);
						if($adb->num_rows($vtiger_deposit) == 0){
							
							$vtiger_mt4account="SELECT vtiger_crmentityrel.* FROM `vtiger_mt4account` left join vtiger_crmentityrel ON vtiger_crmentityrel.relcrmid=vtiger_mt4account.mt4accountid where vtiger_mt4account.loginid=".$f["login"]." and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.module='Contacts'";
							$log->info("Query : ".$vtiger_mt4account);
							$vtiger_mt4account=$adb->pquery($vtiger_mt4account);
							$vtiger_mt4account=$adb->fetch_array($vtiger_mt4account);
							
							if(!empty($vtiger_mt4account))
							{
								$primaryID1 = $adb->getUniqueID('vtiger_crmentity');
								
								$entityData1="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID1.",1, 1, 1, 'deposit', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$f['ticket']."')";
								$log->info("CRM Entity Query : ".$entityData1);
								$adb->pquery($entityData1);
							
								$deposit_insert="INSERT INTO `vtiger_deposit`(`depositid`, `loginid`, `amount`, `status`, `cf_972`, `ticket`) VALUES (?,?,?,?,?,?)";
								$deposit_param=array($primaryID1,$vtiger_mt4account["relcrmid"],$f['profit'],1,$f[21],$f['ticket']);
								
								$adb->pquery($deposit_insert,$deposit_param);
								
								
								
								$vtiger_crmentityrel="INSERT INTO `vtiger_crmentityrel`(`crmid`, `module`, `relcrmid`, `relmodule`) VALUES (?,?,?,?)";
								$vtiger_crmentityrel_para=array($vtiger_mt4account["crmid"],$vtiger_mt4account["module"],$primaryID1,"deposit");
								
								$adb->pquery($vtiger_crmentityrel,$vtiger_crmentityrel_para);
							}
							
							
							
						}
					}
					else if($f["profit"]<0 && $f["cmd"] == 6 )//withadraw
					{
						//vtiger_withdraw
						$vtiger_withdraw = "select * from vtiger_withdraw where ticket = ".$f['ticket'];
						$log->info("Query : ".$vtiger_withdraw);
						$vtiger_withdraw=$adb->pquery($vtiger_withdraw);
						if($adb->num_rows($vtiger_withdraw) == 0){
							
							$vtiger_mt4account="SELECT vtiger_crmentityrel.* FROM `vtiger_mt4account` left join vtiger_crmentityrel ON vtiger_crmentityrel.relcrmid=vtiger_mt4account.mt4accountid where vtiger_mt4account.loginid=".$f["login"]." and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.module='Contacts'";
							$log->info("Query : ".$vtiger_mt4account);
							$vtiger_mt4account=$adb->pquery($vtiger_mt4account);
							$vtiger_mt4account=$adb->fetch_array($vtiger_mt4account);
							
							if(!empty($vtiger_mt4account))
							{
								$primaryID1 = $adb->getUniqueID('vtiger_crmentity');
								
								$entityData1="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID1.",1, 1, 1, 'withdraw', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$f['ticket']."')";
								$log->info("CRM Entity Query : ".$entityData1);
								$adb->pquery($entityData1);
							
								$withdraw="INSERT INTO `vtiger_withdraw`(`withdrawid`, `loginid`, `amount`, `status`, `cf_974`, `ticket`) VALUES (?,?,?,?,?,?)";
								$deposit_param=array($primaryID1,$vtiger_mt4account["relcrmid"],$f['profit'],1,$f[21],$f['ticket']);
								
								$adb->pquery($withdraw,$deposit_param);
								
								
								
								$vtiger_crmentityrel="INSERT INTO `vtiger_crmentityrel`(`crmid`, `module`, `relcrmid`, `relmodule`) VALUES (?,?,?,?)";
								$vtiger_crmentityrel_para=array($vtiger_mt4account["crmid"],$vtiger_mt4account["module"],$primaryID1,"withdraw");
								
								$adb->pquery($vtiger_crmentityrel,$vtiger_crmentityrel_para);
							}
							
							
							
						}
						
						
					}
					
					/******end*******/
					
					$inserted++;
				} else {
					$log->info("UPDATE");
					$tradeData="UPDATE `vtiger_mt4trade` set login='".$f[1]."', symbol='".$f[2]."', digits='".$f[3]."', cmd='".$f[4]."', volume='".$f[5]."', open_time='".$f[6]."', open_price='".$f[7]."', sl='".$f[8]."', tp='".$f[9]."', close_time='".$f[10]."', expiration='".$f[11]."', reason='".$f[12]."', conv_rate1='".$f[13]."', conv_rate2='".$f[14]."', commission='".$f[15]."', commission_agent='".$f[16]."', swaps='".$f[17]."', close_price='".$f[18]."', profit='".$f[19]."', taxes='".$f[20]."', comment='".$f[21]."', internal_id='".$f[22]."', margin_rate='".$f[23]."', timestamp='".$f[24]."', magic='".$f[25]."', gw_volume='".$f[26]."', gw_open_price='".$f[27]."', gw_close_price='".$f[28]."', modify_time='".$f[29]."', display_from_cron=1 WHERE ticket=".$f['ticket'];
					$log->info("MT4 Trade Query : ".$tradeData);
					$adb->pquery($tradeData);
					$updated++;
				}
			}
		}
		$mt4_trade->close();
		$mt4_trade=$mdb->pquery("
			select mt4_trades.TICKET
			from mt4_trades
			join mt4_users
			on mt4_users.LOGIN=mt4_trades.LOGIN
			where mt4_users.`GROUP` in (\"".implode('","',$groups)."\")
			order by mt4_trades.OPEN_TIME DESC
			limit 50
		");
		$allTradeID = array();
		while ($f = $mdb->fetch_array($mt4_trade)) {
			$allTradeID[] = $f[0];
		}
		$mt4_trade->close();
		// Deleted Recordss
		$result = $adb->pquery("select mt4tradeid from `vtiger_mt4trade` WHERE ticket NOT IN ('".implode("','",$allTradeID)."')");
		$totalDeleted = $adb->num_rows($result);
		$deleted = $totalDeleted;
		$tradeData="UPDATE `vtiger_mt4trade` set del_i=1 WHERE ticket NOT IN ('".implode("','",$allTradeID)."')";
		$adb->pquery($tradeData);
	} else {
		$log->info("NO DATA MT4 TRADE DATABASE");
		echo "NO DATA MT4 TRADE DATABASE";die;
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
	echo 'Total Delete : '.$deleted.'<br>';
?>