<?php
	//echo 'Disabled';die;

	ini_set("include_path", "../");

	include_once 'config.php';
	include_once 'include/Webservices/Relation.php';

	include_once 'vtlib/Vtiger/Module.php';
	include_once 'includes/main/WebUI.php';
	global $log,$sql_manager,$adb,$_site_config;
	
	

	
	/****start*****/
	
	$affiliate=new Vtiger_ListView_Model();
//	$aff=$affiliate->get_direct_aff(26);
   
    $time=strtotime("-30minutes",strtotime("-40hours"));
	
	 $time=date("Y-m-d H:i:s",$time);//2017-07-17 17:54:09

	/****end*****/
	
	$new_record=array();
	$loginid=array();
	$groups=groups();
	
/*
	echo "select mt4_trades.*,mt4_users.*
		from mt4_trades
		join mt4_users
		on mt4_users.LOGIN=mt4_trades.LOGIN
		where mt4_users.`GROUP` in (\"".implode('","',$groups)."\")
		and mt4_trades.`CLOSE_TIME`>='".$time."' AND mt4_trades.CMD in (0,1) order by mt4_trades.OPEN_TIME DESC";
		
		exit();
	*/
	
	$log->info("closeorder cron");
	$mdb = new PearDatabase();
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	$groups=groups();

	$mt4_trade=$mdb->pquery("
		select mt4_trades.*,mt4_users.*
		from mt4_trades
		join mt4_users
		on mt4_users.LOGIN=mt4_trades.LOGIN
		where mt4_users.`GROUP` in (\"".implode('","',$groups)."\")
		and mt4_trades.`CLOSE_TIME`>='".$time."' AND mt4_trades.CMD in (0,1) order by mt4_trades.OPEN_TIME DESC");
	$inserted = 0;
	$updated = 0;
	$deleted = 0;
	$totalRows = $mdb->num_rows($mt4_trade);
	if($totalRows > 0){
		while ($f = $mdb->fetch_array($mt4_trade)) {
			if(isset($f['ticket']) && $f['ticket'] != ''){
				$log->info("Ticket : ".$f['ticket']);
				$getTradeData = "select * from vtiger_mt4trade where ticket = ".$f['ticket'];
				$log->info("Query : ".$getTradeData);
				$tradeDate=$adb->pquery($getTradeData);
				
				$tradeDate1=$adb->fetch_array($tradeDate);
				
			//	echo json_encode($tradeDate);
			//	echo $tradeDate["closeorder_cron"];
			//	exit();

				if($adb->num_rows($tradeDate) == 0){
					
					$new_record[]=$f;
					$loginid[]=$f["login"];
					
					$log->info("INSERT");
					$primaryID = $adb->getUniqueID('vtiger_crmentity');
					$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'mt4trade', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$f['ticket']."')";
					$log->info("CRM Entity Query : ".$entityData);
					$adb->pquery($entityData);
					$tradeData="INSERT INTO `vtiger_mt4trade` (mt4tradeid, ticket, login, symbol, digits, cmd, volume, open_time, open_price, sl, tp, close_time, expiration, reason, conv_rate1, conv_rate2, commission, commission_agent, swaps, close_price, profit, taxes, comment, internal_id, margin_rate, timestamp, magic, gw_volume, gw_open_price, gw_close_price, modify_time, display_from_cron, closeorder_cron) VALUES (".$primaryID.",'".$f[0]."', '".$f[1]."', '".$f[2]."', '".$f[3]."', '".$f[4]."', '".$f[5]."', '".$f[6]."', '".$f[7]."', '".$f[8]."', '".$f[9]."', '".$f[10]."', '".$f[11]."', '".$f[12]."', '".$f[13]."', '".$f[14]."', '".$f[15]."', '".$f[16]."', '".$f[17]."', '".$f[18]."', '".$f[19]."', '".$f[20]."', '".$f[21]."', '".$f[22]."', '".$f[23]."', '".$f[24]."', '".$f[25]."', '".$f[26]."', '".$f[27]."', '".$f[28]."', '".$f[29]."', 1, 1)";
					$log->info("MT4 Trade Query : ".$tradeData);
					$adb->pquery($tradeData);
					
					
					
					$inserted++;
				} else if($tradeDate1["closeorder_cron"]==0){
						$new_record[]=$f;
						$loginid[]=$f["login"];
					
						$log->info("UPDATE");
						$tradeData="UPDATE `vtiger_mt4trade` set login='".$f[1]."', symbol='".$f[2]."', digits='".$f[3]."', cmd='".$f[4]."', volume='".$f[5]."', open_time='".$f[6]."', open_price='".$f[7]."', sl='".$f[8]."', tp='".$f[9]."', close_time='".$f[10]."', expiration='".$f[11]."', reason='".$f[12]."', conv_rate1='".$f[13]."', conv_rate2='".$f[14]."', commission='".$f[15]."', commission_agent='".$f[16]."', swaps='".$f[17]."', close_price='".$f[18]."', profit='".$f[19]."', taxes='".$f[20]."', comment='".$f[21]."', internal_id='".$f[22]."', margin_rate='".$f[23]."', timestamp='".$f[24]."', magic='".$f[25]."', gw_volume='".$f[26]."', gw_open_price='".$f[27]."', gw_close_price='".$f[28]."', modify_time='".$f[29]."', display_from_cron=1, closeorder_cron=0 WHERE ticket=".$f['ticket'];
						$log->info("MT4 Trade Query : ".$tradeData);
						$adb->pquery($tradeData);
						$updated++;
					
					
					
				}
			}
		}
		$mt4_trade->close();
		
		/*****start****/
		
		
		if(!empty($new_record))
		{
			
			
			$data=$adb->pquery("select vtiger_crmentityrel.*,vtiger_contactdetails.*,vtiger_mt4account.*,vtiger_crmentity.*,vtiger_users.first_name as user_fn,vtiger_users.last_name as user_ln,vtiger_users.reports_to_id as affiliate 
			from vtiger_crmentityrel
			left join vtiger_contactdetails ON vtiger_contactdetails.contactid= vtiger_crmentityrel.crmid
			left join vtiger_mt4account ON vtiger_mt4account.mt4accountid= vtiger_crmentityrel.relcrmid
			left join vtiger_crmentity ON vtiger_crmentity.crmid= vtiger_crmentityrel.crmid
			left join vtiger_users ON vtiger_users.id= vtiger_crmentity.smownerid
			where vtiger_crmentityrel.module='Contacts' and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.crmid!=0 and vtiger_crmentityrel.relcrmid!=0 and vtiger_mt4account.loginid in (\"".implode('","',$loginid)."\")");
			
			$data=$adb->fetch_array($data);
			
			
			
			foreach($new_record as $new)
			{
				// $aff=$affiliate->get_direct_aff($data["smownerid"]);
				
			}
		}
	
		
		
		/*****end****/
		
		
	} else {
		$log->info("NO DATA FROM MT4 TRADE DATABASE");
		echo "NO DATA FROM MT4 TRADE DATABASE";die;
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
	echo 'Total Delete : '.$deleted.'<br>';
?>