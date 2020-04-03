<?php
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;

	echo '<pre>';
	print_r($_REQUEST);
	echo '</pre>';


	echo 'hi';die;
		$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'notifications', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', 'Test')";
		$adb->pquery($entityData);
		$reportData="INSERT INTO vtiger_notification (notificationid, recipientid, senderid, type, description, seen, createtime) VALUES (".$primaryID.",".$_POST['recipientid'].", ".$_POST['senderid'].", '".$_POST['type']."', '".$_POST['description']."', '0', '".time()."')";
		$adb->pquery($reportData);
	$_SESSION["message"]="Settings Updated Successfully.";
?>