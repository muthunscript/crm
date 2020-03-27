<?php
	//echo 'Disabled';die;
	ini_set("include_path", "../");
	require('send_mail.php');
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	/*$query = '
		-- select CONCAT(vtiger_users.first_name, " ", vtiger_users.last_name) as "Affiliate__Name", vtiger_users.id, count(distinct vtiger_contactdetails.contactid) as totalusers
		-- select CONCAT(vtiger_users.first_name, " ", vtiger_users.last_name) as "Affiliate__Name", CONCAT(vtiger_contactdetails.firstname, " ", vtiger_contactdetails.lastname) as "User__Name"
		select CONCAT(vtiger_users.first_name, " ", vtiger_users.last_name) as "Affiliate__Name", CONCAT(vtiger_contactdetails.firstname, " ", vtiger_contactdetails.lastname) as "User__Name", vtiger_mt4account.totaldep, vtiger_mt4account.deposit_count, vtiger_mt4account.close_time, vtiger_mt4account.open_time
		from vtiger_crmentity
		inner join vtiger_contactdetails
		on vtiger_contactdetails.contactid = vtiger_crmentity.crmid 
		inner join vtiger_users
		on vtiger_users.id = vtiger_crmentity.smownerid
		left join vtiger_crmentityrel
		on vtiger_crmentityrel.crmid = vtiger_contactdetails.contactid
		left join vtiger_mt4account
		on vtiger_mt4account.mt4accountid = vtiger_crmentityrel.relcrmid
		group by vtiger_users.id
		order by vtiger_crmentity.crmid asc
	';*/
	$query = "
		select vtiger_users.id as affiliateid, vtiger_contactdetails.contactid as userid, CONCAT(vtiger_users.first_name, ' ', vtiger_users.last_name) as affiliatename, CONCAT(vtiger_contactdetails.firstname, ' ', vtiger_contactdetails.lastname) as username, vtiger_mt4account.totaldep as depositamount, vtiger_mt4account.deposit_count as totaldeposits, vtiger_mt4account.close_time as closetime, vtiger_mt4account.open_time as opentime, vtiger_mt4account.acc_type as accounttype, vtiger_mt4account.loginid as accountloginid
		from vtiger_crmentityrel
		left join vtiger_contactdetails
		ON vtiger_contactdetails.contactid= vtiger_crmentityrel.crmid
		left join vtiger_mt4account
		ON vtiger_mt4account.mt4accountid= vtiger_crmentityrel.relcrmid
		left join vtiger_crmentity
		ON vtiger_crmentity.crmid= vtiger_crmentityrel.crmid
		left join vtiger_users
		ON vtiger_users.id= vtiger_crmentity.smownerid
		left join vtiger_contactsubdetails
		ON vtiger_contactsubdetails.contactsubscriptionid= vtiger_crmentityrel.crmid
		where vtiger_crmentityrel.module='Contacts' and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.crmid!=0 and vtiger_crmentityrel.relcrmid!=0 and vtiger_mt4account.loginid!='' and vtiger_mt4account.loginid!=0
		order by vtiger_users.id asc
	";
	$result = $adb->pquery($query);
	/*while ($row = $adb->fetch_array($result)) {
		echo '<pre>';
		print_r($row);
		echo '</pre>';
	}die;*/
	$totalRows = $adb->num_rows($result);
	$inserted = 0;
	$updated = 0;
	if($totalRows > 0){
		$adb->pquery("UPDATE vtiger_salesreport set displayfromcron='0'");
		while ($row = $adb->fetch_array($result)) {
			if(isset($row['affiliateid']) && $row['affiliateid'] != '' && isset($row['userid']) && $row['userid'] != ''){
				$getData = " select * from vtiger_salesreport where affiliateid = ".$row['affiliateid'].' and userid='.$row['userid']." and accountloginid=".$row['accountloginid'];
				$date=$adb->pquery($getData);
				$totalRows = $adb->num_rows($date);
				$date = $adb->fetch_array($date);
				if($totalRows == 0){
					$primaryID = $adb->getUniqueID('vtiger_crmentity');
					$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'salesreport', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', '".$row['accountloginid']."')";
					$adb->pquery($entityData);
					$reportData="INSERT INTO vtiger_salesreport (salesreportid, affiliateid, affiliatename, userid, username, depositamount, accountloginid, accounttype, totaldeposits, opentime, closetime, displayfromcron) VALUES (".$primaryID.",'".$row['affiliateid']."', '".$row['affiliatename']."', '".$row['userid']."', '".$row['username']."', '".$row['depositamount']."', '".$row['accountloginid']."', '".$row['accounttype']."', '".$row['totaldeposits']."', '".$row['opentime']."', '".$row['closetime']."', '1')";
					$adb->pquery($reportData);
					$inserted++;
				} else {
					$reportData="UPDATE vtiger_salesreport set affiliatename='".$row['affiliatename']."', username='".$row['username']."', depositamount='".$row['depositamount']."', totaldeposits='".$row['totaldeposits']."', opentime='".$row['opentime']."', closetime='".$row['closetime']."', accounttype='".$row['accounttype']."', displayfromcron='1' where salesreportid=".$date['salesreportid'];
					$adb->pquery($reportData);
					$updated++;
				}
			}
		}
	}
	echo 'Total Insert : '.$inserted.'<br>';
	echo 'Total Update : '.$updated.'<br>';
?>