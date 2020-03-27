<?php

	ini_set("include_path", "../");

	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$log->info("create user".json_encode($_REQUEST));
	
	
	/*
	
	{"salutation":"Ms.","firstname":"Revanth","lastname":"s","email":"lavanya+11000000@nscript.in","phone":"9890987876","mobile":"8989878900","assigned_user_id":1}
	*/
	$response=array("status"=>false,"message"=>"invalid data.");
	if(isset($_REQUEST["salutation"],$_REQUEST["firstname"],$_REQUEST["lastname"],$_REQUEST["email"],$_REQUEST["phone"],$_REQUEST["accountnew_id"],$_REQUEST["password"])&&$_REQUEST["salutation"]!=""&&$_REQUEST["firstname"]!=""&&$_REQUEST["lastname"]!=""&&$_REQUEST["accountnew_id"]!=""&&$_REQUEST["password"])
	{
		
		$groups = $adb->pquery("SELECT * FROM `vtiger_accountnew` where accountnewid=".$_REQUEST["accountnew_id"]."");
	 
		$groups =$adb->fetch_array($groups);
		
		if(!empty($groups))
		{
			$primaryID = $adb->getUniqueID('vtiger_crmentity');
			$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'Contacts', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'API', '".$_REQUEST["firstname"]." ".$_REQUEST["lastname"]."')";
			$log->info("CRM Entity Query : ".$entityData);
			$adb->pquery($entityData);
			
			$contact_no="CON".$primaryID;
			
			$vtiger_contactdetails=("INSERT INTO `vtiger_contactdetails`(`contactid`, `contact_no`, `salutation`, `firstname`, `lastname`, `email`, `phone`, `accountnewid`, `password`) VALUES (".$primaryID.",".$contact_no.",".$_REQUEST["salutation"].",".$_REQUEST["firstname"].",".$_REQUEST["lastname"].",".$_REQUEST["email"].",".$_REQUEST["phone"].",".$_REQUEST["accountnewid"].",".$_REQUEST["password"]."");
			$adb->pquery($vtiger_contactdetails);
			
			
			$response=array("status"=>true,"message"=>"Registered successfully","usersid"=>$primaryID);
			
		}
		else
		{
			$response=array("status"=>false,"message"=>"Account not exist.");
		}
		
	}
	

echo json_encode($response);

?>