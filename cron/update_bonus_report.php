<?php
	//echo 'Disabled';die;
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$query = "
		select vtiger_contactdetails.contactid as userid, CONCAT(vtiger_contactdetails.firstname, ' ', vtiger_contactdetails.lastname) as username, vtiger_deposit.depositid, vtiger_deposit.amount as depositamount, vtiger_accountnew.webname as usergroup, vtiger_deposit.credits as bonus, (CASE WHEN vtiger_deposit.credits_status = 1 THEN 'Success' WHEN vtiger_deposit.credits_status = 2 THEN 'Pending' WHEN vtiger_deposit.credits_status = 3 THEN 'Failure' ELSE '' END) as bonusstatus, vtiger_crmentity.createdtime as date, vtiger_mt4account.loginid as useraccountid
		from vtiger_deposit
		left join vtiger_mt4account
		on vtiger_mt4account.mt4accountid = vtiger_deposit.loginid
		left join vtiger_accountnew
		on vtiger_accountnew.accountnewid = vtiger_mt4account.accountnewid
		left join vtiger_crmentityrel
		on vtiger_crmentityrel.relcrmid = vtiger_mt4account.mt4accountid
		left join vtiger_contactdetails
		ON vtiger_contactdetails.contactid= vtiger_crmentityrel.crmid
		left join vtiger_crmentity
		ON vtiger_crmentity.crmid = vtiger_deposit.depositid
		where vtiger_crmentity.deleted=0 and vtiger_deposit.credits_status != 0
	";
	$result = $adb->pquery($query);
	$totalRows = $adb->num_rows($result);
	/*echo $totalRows;
	while ($row = $adb->fetch_array($result)) {
		echo '<pre>';
		print_r($row);
		echo '</pre>';
	}*/
	$totalRows = $adb->num_rows($result);
	$inserted = 0;
	$updated = 0;
	if($totalRows > 0){
		$adb->pquery("UPDATE vtiger_bonusreport set displayfromcron='0'");
		
		while ($row = $adb->fetch_array($result)) {
			/*echo '<pre>';
			print_r($row);
			echo '<pre>';die;*/
			if(isset($row['userid']) && $row['userid'] != '' && isset($row['depositid']) && $row['depositid'] != ''){
				$date=$adb->pquery("select * from vtiger_bonusreport where userid = ".$row['userid'].' and depositid = '.$row['depositid']);
				$totalRows = $adb->num_rows($date);
				$date = $adb->fetch_array($date);
				if($totalRows == 0){
					$primaryID = $adb->getUniqueID('vtiger_crmentity');
					$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'bonusreport', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$row['useraccountid']."')";
					$adb->pquery($entityData);
					$reportData="INSERT INTO vtiger_bonusreport (bonusreportid, userid, username, depositid, depositamount, usergroup, bonus, bonusstatus, date, useraccountid, displayfromcron) VALUES (".$primaryID.",'".$row['userid']."', '".$row['username']."', '".$row['depositid']."', '".$row['depositamount']."', '".$row['usergroup']."', '".$row['bonus']."', '".$row['bonusstatus']."', '".$row['date']."', '".$row['useraccountid']."', '1')";
					$adb->pquery($reportData);
					$inserted++;
				} else {
					$reportData="Update vtiger_bonusreport set username='".$row['username']."', depositamount='".$row['depositamount']."', usergroup='".$row['usergroup']."', bonus='".$row['bonus']."', bonusstatus='".$row['bonusstatus']."', date='".$row['date']."', useraccountid='".$row['useraccountid']."', displayfromcron=1 where userid = ".$row['userid'].' and depositid = '.$row['depositid'];
					$adb->pquery($reportData);
					$updated++;
				}
			}
		}
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
?>