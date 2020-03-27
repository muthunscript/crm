<?php

	ini_set("include_path", "../");

	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$log->info("login".json_encode($_REQUEST));
	
	$response=array("status"=>false,"message"=>"invalid data");
	
	if(isset($_REQUEST["email"],$_REQUEST["password"])&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!="")
	{
		$vtiger_contactdetails=("select * from vtiger_contactdetails where email='".$_REQUEST["email"]."' and password='".$_REQUEST["password"]."'");
			$vtiger_contactdetails=$adb->pquery($vtiger_contactdetails);
			
			$vtiger_contactdetails=$adb->fetch_array($vtiger_contactdetails);
			
			//echo json_encode($vtiger_contactdetails["email"]);
		//	exit();
			if(!empty($vtiger_contactdetails))
			{
				/*********/
				$get_mt4account=get_mt4account($vtiger_contactdetails["contactid"]);
				$vtiger_mt4account=("select * from vtiger_mt4account where mt4accountid in (\"".implode('","',$get_mt4account)."\")");
				
				//echo var_dump($vtiger_mt4account);
			//exit();
			$vtiger_mt4account=$adb->pquery($vtiger_mt4account);
			
			//$vtiger_mt4account=$adb->fetch_array($vtiger_mt4account);
			
			$ret=array();
			  if($vtiger_mt4account)
			   {

					while ($row = $adb->fetch_array($vtiger_mt4account))
					{
						array_push($ret,$row);

					}
					
			   }
			
			
			
			/*********/
				
				$response=array("status"=>true,"mt4_account"=>$ret);
			}
			else
			{
				$response=array("status"=>false,"message"=>"user not exist.");
			}
			
	}
	echo json_encode($response);
	
?>