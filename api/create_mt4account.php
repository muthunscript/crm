<?php

ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;

$response=array("status"=>false,"message"=>"Invalid data.");

if(isset($_REQUEST["email"],$_REQUEST["password"],$_REQUEST["acc_type"],$_REQUEST["leverage"])&&$_REQUEST["email"]!=""&&$_REQUEST["password"]!=""&&$_REQUEST["acc_type"]!=""&&$_REQUEST["leverage"]!="")
{
	/********start********/
	
	$log->info("vtiger_mt4account enter");		

	$lead_data="select vtiger_crmentity.*,vtiger_contactdetails.*,vtiger_contactaddress.*  
		from vtiger_crmentity 
		left join vtiger_contactdetails ON vtiger_contactdetails.contactid= vtiger_crmentity.crmid 
		left join vtiger_contactaddress ON vtiger_contactaddress.contactaddressid= vtiger_crmentity.crmid 
		where vtiger_contactdetails.email=? and vtiger_contactdetails.password=?";

	$lead_data = $adb->pquery($lead_data, array($_REQUEST["email"],$_REQUEST["password"]));
	$lead_data=$adb->fetch_array($lead_data);
	
	
	if(!empty($lead_data))
	{
		//$response=$lead_data;
		
		$passsword = valid_pwd1(11);
		$ph_passsword = valid_pwd1(7); 
		$investor_pwd = valid_pwd1(11);

	


		$sql = 'SELECT * from vtiger_accountnew where accountnewid=?';

		$account_master = $adb->pquery($sql, array($lead_data['accountnewid']));

		$account_master=$adb->fetch_array($account_master);


		$log->info("accountnewId ".$lead_data['accountnewid']);


		$group = $account_master['title'];
		//$group = "test";

		$master = 'junior';
		//$comment = "Live account Online ^" . $u['type_of_account'];
		$comment = "Live account Online ^" . $group;
		$type = $account_master['title'];
		$status = 'k';
		//$login=10000003;
		$login=get_mt4_series();
		$name=$lead_data['firstname']." ".$lead_data['lastname'];
		$email=$lead_data['email'];
		$agent=$lead_data['firstname']." ".$lead_data['lastname'];//affiliate name
		$country=$lead_data['mailingcountry'];
		$state=$lead_data['mailingstate'];
		$city=$lead_data['mailingcity'];
		$address=$lead_data['mailingstreet'];
		$phone=$lead_data['phone'];
		$zipcode=$lead_data['mailingzip'];
		$id="";
		$leverage="100";


		//$response =open_account($group, $name, $passsword, $email, $agent, $country, $state, $city, $address, $phone, $ph_passsword, $status, $zipcode, $id, $leverage, $comment, $investor_pwd, $login = '');
		
		$response=add_account($group,$name,$passsword,$ph_passsword,1,$_REQUEST["leverage"],$comment,$investor_pwd,$email,$_REQUEST["acc_type"]);


		$log->info("mt4 response $response");

		if (strpos($response, 'OK') !== false)
		{
			$log->info("vtiger_mt4account start");

			$current_id = $adb->getUniqueID("vtiger_crmentity");

			$log->info("vtiger_crmentity getUniqueID $current_id");

			$f = explode_string('=', $response);
			$login_id = $f[1];

			$date_var = date("Y-m-d H:i:s");

			$sql1 = "INSERT INTO vtiger_crmentity (crmid,setype,createdtime,modifiedtime) VALUES (?, ?, ?, ?)";
			$params1 = array($current_id, 'mt4account', $adb->formatDate($date_var, true), $adb->formatDate($date_var, true));
			$adb->pquery($sql1, $params1);

			$log->info($sql1);
			$log->info($params1);

			//vtiger_mt4account

			$sql2 = "INSERT INTO `vtiger_mt4account` (`mt4accountid`, `loginid`, `response`, `pri_mary`, `password`, `investor_password`, `accountnewid`, `leverage`, `acc_type`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$params2 = array($current_id, $login_id, '1', '0', $passsword, $investor_pwd, $lead_data['accountnewid'],$_REQUEST["leverage"],ucfirst($_REQUEST["acc_type"]));
			$adb->pquery($sql2, $params2);

			$log->info($sql2);
			$log->info($params2);


			$sql3 = "INSERT INTO `vtiger_crmentityrel` (`crmid`, `module`, `relcrmid`, `relmodule`) VALUES (?, ?, ?, ?)";

			//$params3 = array($leadId, 'Leads', $current_id, 'mt4account');
			$params3 = array($lead_data["contactid"], 'Contacts', $current_id, 'mt4account');
			$adb->pquery($sql3, $params3);

			$log->info($sql3);
			$log->info($params3);

			$log->info("vtiger_mt4account end");


			$response=array("status"=>true,"login"=>$login_id,"password"=>$passsword,"investor_pwd"=>$investor_pwd,"leverage"=>$_REQUEST["leverage"],"acc_type"=>$_REQUEST["acc_type"]);
		}
		
	}
	else
	{
		$response=array("status"=>false,"message"=>"Invalid user.");
	}		
	
	

	
}

echo json_encode($response);







?>