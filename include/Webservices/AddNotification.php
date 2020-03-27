<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/
	
	function vtws_addnotification($username, $recipientid, $senderid, $type, $description){
		
		global $adb;

		if(empty($username)){
			throw new WebServiceException(WebServiceErrorCode::$ACCESSDENIED,"No username given");
		}

		$user = new Users();
		$userid = $user->retrieve_user_id($username);

        if(empty($userid)){
			throw new WebServiceException(WebServiceErrorCode::$ACCESSDENIED,"username does not exists");
		}

		if(isset($recipientid) && $recipientid != '' && isset($senderid) && $senderid] != '' && isset($type) && $type != '' && isset($description) && $description != ''){
			$primaryID = $adb->getUniqueID('vtiger_crmentity');
			$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'notifications', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'CRON', 'Test')";
			echo $entityData.'<br>';
			//$adb->pquery($entityData);
			$reportData="INSERT INTO vtiger_notification (notificationid, recipientid, senderid, type, description, seen, createtime) VALUES (".$primaryID.",".$recipientid.", ".$senderid.", '".$type."', '".$description."', '0', '".time()."')";
			echo $reportData.'<br>';
			//$adb->pquery($reportData);
			echo json_encode(array('success' => true, 'message' => 'Notification added successfully.'));
		} else {
			echo json_encode(array('success' => false, 'error' => 'Missing required data.'));
		}

	}

?>