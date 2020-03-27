<?php
	//echo 'Disabled';die;
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$adb->pquery("update vtiger_mt4users set display_from_cron=0");
	$log->info("mt4 cron");
	$mdb = new PearDatabase();
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	$groups=groups();
	$query = "
		SELECT *
		FROM mt4_users
		WHERE mt4_users.GROUP IN ('".implode("','",$groups)."')
	";
	$mt4_user=$mdb->pquery($query);
	$totalUsers = $mdb->num_rows($mt4_user);
	$ret=array();
	$inserted = 0;
	$updated = 0;
	$deleted = 0;
	if($totalUsers > 0) {
		while ($f = $mdb->fetch_array($mt4_user)) {
			if(isset($f['login']) && $f['login'] != ''){
				$log->info("Login : ".$f['login']);
				$getUserData = "select * from vtiger_mt4users where login = ".$f['login'];
				$log->info("Query : ".$getUserData);
				$userDate=$adb->pquery($getUserData);
				if($adb->num_rows($userDate) == 0){
					$log->info("INSERT");
					$primaryID = $adb->getUniqueID('vtiger_crmentity');
					$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'mt4users', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$f['login']."')";
					$log->info("CRM Entity Query : ".$entityData);
					$adb->pquery($entityData);
					$userData="INSERT INTO vtiger_mt4users (mt4usersid, login, vtiger_mt4users.group, vtiger_mt4users.enable, enable_change_pass, enable_readonly, enable_otp, password_phone, vtiger_mt4users.name, country, city, state, zipcode, address, lead_source, phone, email, vtiger_mt4users.comment, id, vtiger_mt4users.status, regdate, lastdate, leverage, agent_account, vtiger_mt4users.timestamp, balance, prevmonthbalance, prevbalance, credit, interestrate, taxes, send_reports, maid, user_color, equity, margin, margin_level, margin_free, currency, api_data, modify_time, display_from_cron) VALUES (".$primaryID.",'".$f[0]."', '".$f[1]."', '".$f[2]."', '".$f[3]."', '".$f[4]."', '".$f[5]."', '".$f[6]."', '".$f[7]."', '".$f[8]."', '".$f[9]."', '".$f[10]."', '".$f[11]."', '".$f[12]."', '".$f[13]."', '".$f[14]."', '".$f[15]."', '".$f[16]."', '".$f[17]."', '".$f[18]."', '".$f[19]."', '".$f[20]."', '".$f[21]."', '".$f[22]."', '".$f[23]."', '".$f[24]."', '".$f[25]."', '".$f[26]."', '".$f[27]."', '".$f[28]."', '".$f[29]."', '".$f[30]."', '".$f[31]."', '".$f[32]."', '".$f[33]."', '".$f[34]."', '".$f[35]."', '".$f[36]."', '".$f[37]."', '".$f[38]."', '".$f[39]."', 1)";
					$log->info("MT4 User Query : ".$userData);
					$adb->pquery($userData);
					$inserted++;
				} else {
					$log->info("UPDATE");
					$userData="UPDATE vtiger_mt4users set vtiger_mt4users.group='".$f[1]."', vtiger_mt4users.enable='".$f[2]."', enable_change_pass='".$f[3]."', enable_readonly='".$f[4]."', enable_otp='".$f[5]."', password_phone='".$f[6]."', vtiger_mt4users.name='".$f[7]."', country='".$f[8]."', city='".$f[9]."', state='".$f[10]."', zipcode='".$f[11]."', address='".$f[12]."', lead_source='".$f[13]."', phone='".$f[14]."', email='".$f[15]."', vtiger_mt4users.comment='".$f[16]."', id='".$f[17]."', vtiger_mt4users.status='".$f[18]."', regdate='".$f[19]."', lastdate='".$f[20]."', leverage='".$f[21]."', agent_account='".$f[22]."', vtiger_mt4users.timestamp='".$f[23]."', balance='".$f[24]."', prevmonthbalance='".$f[25]."', prevbalance='".$f[26]."', credit='".$f[27]."', interestrate='".$f[28]."', taxes='".$f[29]."', send_reports='".$f[30]."', maid='".$f[31]."', user_color='".$f[32]."', equity='".$f[33]."', margin='".$f[34]."', margin_level='".$f[35]."', margin_free='".$f[36]."', currency='".$f[37]."', api_data='".$f[38]."', modify_time='".$f[39]."', display_from_cron=1 WHERE login=".$f['login'];
					$log->info("MT4 Trade Query : ".$userData);
					$adb->pquery($userData);
					$updated++;
				}
			}
		}
		$mt4_user->close();
		$mt4_user=$mdb->pquery("
			SELECT mt4_users.login
			FROM mt4_users
			WHERE mt4_users.GROUP IN ('".implode("','",$groups)."')
		");
		$allUserLogin = array();
		while ($f = $mdb->fetch_array($mt4_user)) {
			$allUserLogin[] = $f[0];
		}
		$mt4_user->close();
		$result = $adb->pquery("select mt4usersid from vtiger_mt4users WHERE login NOT IN ('".implode("','",$allUserLogin)."')");
		$totalDeleted = $adb->num_rows($result);
		$deleted = $totalDeleted;
		$userData="UPDATE vtiger_mt4users set del_i=1 WHERE login NOT IN ('".implode("','",$allUserLogin)."')";
		$adb->pquery($userData);
	} else {
		$log->info("NO DATA MT4 TRADE DATABASE");
		echo "NO DATA MT4 TRADE DATABASE";die;
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
	echo 'Total Delete : '.$deleted.'<br>';
?>