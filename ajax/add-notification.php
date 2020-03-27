<?php
	ini_set("include_path", "../");
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	/*
	$_POST['recipientid'] = 1;
	$_POST['senderid'] = 1;
	$_POST['type'] = 'PageVisit';
	$_POST['description'] = 'User visited the page.';
	*/
	if(isset($_POST) && count($_POST)>0){
		if(isset($_POST['recipientid']) && $_POST['recipientid'] != '' && isset($_POST['senderid']) && $_POST['senderid'] != '' && isset($_POST['type']) && $_POST['type'] != '' && isset($_POST['description']) && $_POST['description'] != ''){
			$primaryID = $adb->getUniqueID('vtiger_crmentity');
			$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'notifications', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', 'Test')";
			//echo $entityData.'<br>';
			$adb->pquery($entityData);
			$reportData="INSERT INTO vtiger_notification (notificationid, recipientid, senderid, type, description, seen, createtime) VALUES (".$primaryID.",".$_POST['recipientid'].", ".$_POST['senderid'].", '".$_POST['type']."', '".$_POST['description']."', '0', '".time()."')";
			//echo $reportData.'<br>';
			$adb->pquery($reportData);
			echo json_encode(array('success' => true, 'message' => 'Notification added successfully.'));
		} else {
			echo json_encode(array('success' => false, 'error' => 'Missing required data.'));
		}
	} else {
		echo json_encode(array('success' => false, 'error' => 'Invalid data.'));
	}
?>