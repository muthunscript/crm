<?php

ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;


$response=array("status"=>false,"message"=>"Invalid data.");

if(isset($_REQUEST["email"],$_REQUEST["password"])&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!="")
{
	$user_auth=user_auth($_REQUEST["email"],$_REQUEST["password"]);

	$user_auth=json_decode($user_auth,true);
	if($user_auth["user_auth"]==1)
	{
		//vtiger_crmentity
			$sql="SELECT vtiger_paymentsource.* FROM `vtiger_paymentsource` 
			left join vtiger_crmentity ON vtiger_crmentity.crmid= vtiger_paymentsource.paymentsourceid where vtiger_crmentity.deleted=0 and vtiger_paymentsource.visible=1";
			$sql_data=$adb->pquery($sql);
			//$sql_data=$adb->fetch_array($sql_data);
			
			
			$ret=array();
			  if($sql_data)
			   {

					while ($row = $adb->fetch_array($sql_data))
					{
						array_push($ret,$row);

					}
					$sql_data->close();
				   $response=array("status"=>true,"data"=>$ret);
			   }
			   else{
				   $response=array("status"=>true,"data"=>array());
			   }
	}
	else
	{
		$response=array("status"=>false,"message"=>"Authentication failed.");
	}
	
	
}

echo json_encode($response);

?>