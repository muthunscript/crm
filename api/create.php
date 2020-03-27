<?php

	ini_set("include_path", "../");
	require_once('config.php');
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$log->info("create user".json_encode($_REQUEST));
	
	//echo json_encode($_REQUEST);
	//exit();
	
	/*
	
	{"salutation":"Ms.","firstname":"Revanth","lastname":"s","email":"lavanya+11000000@nscript.in","phone":"9890987876","mobile":"8989878900","assigned_user_id":1}
	*/
	$response=array("status"=>false,"message"=>"invalid data.");
	if(isset($_REQUEST["salutation"],$_REQUEST["firstname"],$_REQUEST["lastname"],$_REQUEST["email"],$_REQUEST["phone"],$_REQUEST["accountnew_id"],$_REQUEST["password"],$_REQUEST["country"],$_REQUEST["state"],$_REQUEST["city"],$_REQUEST["address"],$_REQUEST["zipcode"])&&$_REQUEST["salutation"]!=""&&$_REQUEST["firstname"]!=""&&$_REQUEST["lastname"]!=""&&$_REQUEST["accountnew_id"]!=""&&$_REQUEST["password"]!=""&&$_REQUEST["country"]!=""&&$_REQUEST["state"]!=""&&$_REQUEST["city"]!=""&&$_REQUEST["address"]!=""&&$_REQUEST["zipcode"]!="")//$_REQUEST["title"], &&$_REQUEST["title"]!=""
	{
		$log->info("register 1");		
		
		$check_email=$adb->pquery("SELECT * FROM `vtiger_contactdetails` where email='".$_REQUEST["email"]."' or phone='".$_REQUEST["phone"]."'");
		
		//echo "SELECT * FROM `vtiger_contactdetails` where email='".$_REQUEST["email"]."' or phone='".$_REQUEST["phone"]."'";
		//exit();
		
		$check_email =$adb->fetch_array($check_email);
		
		//echo var_dump($check_email);
		//exit();
		
		if(empty($check_email))
		{
			//echo 3;
			//exit();
			$log->info("register 2");		
			$groups = $adb->pquery("SELECT * FROM `vtiger_accountnew` where accountnewid=".$_REQUEST["accountnew_id"]."");
	 
			$groups =$adb->fetch_array($groups);
			
			if(!empty($groups))
			{
				$log->info("register 3");				
				$vtiger_countries=$adb->pquery("SELECT * FROM `vtiger_countries` where countriesid=".$_REQUEST["country"]."");
				$vtiger_countries =$adb->fetch_array($vtiger_countries);
						
				if(!empty($vtiger_countries))
				{
					    $log->info("register 4");		
						$primaryID = $adb->getUniqueID('vtiger_crmentity');
						$entityData="INSERT INTO vtiger_crmentity (crmid, smcreatorid, smownerid, modifiedby, setype, createdtime, modifiedtime, version, presence, deleted, smgroupid, source, label) VALUES (".$primaryID.",1, 1, 1, 'Contacts', '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '0', '1', '0', '0', 'API', '".$_REQUEST["firstname"]." ".$_REQUEST["lastname"]."')";
						$log->info("CRM Entity Query : ".$entityData);
						$adb->pquery($entityData);
						
						$log->info("register 5");		
						
						$contact_no="CON".$primaryID;
						
						$vtiger_contactdetails="INSERT INTO `vtiger_contactdetails`(`contactid`, `contact_no`, `salutation`, `firstname`, `lastname`, `email`, `phone`, `accountnewid`, `password`, `countriesid`) VALUES (".$primaryID.",'".$contact_no."','".$_REQUEST["salutation"]."','".$_REQUEST["firstname"]."','".$_REQUEST["lastname"]."','".$_REQUEST["email"]."','".$_REQUEST["phone"]."','".$_REQUEST["accountnew_id"]."','".$_REQUEST["password"]."','".$_REQUEST["country"]."')";
						$adb->pquery($vtiger_contactdetails);
						
						$log->info("register 6");		
						
						$vtiger_contactaddress="INSERT INTO `vtiger_contactaddress`(`contactaddressid`, `mailingcity`, `mailingstreet`, `mailingcountry`, `mailingstate`, `mailingzip`) VALUES (".$primaryID.",'".$_REQUEST["city"]."','".$_REQUEST["address"]."','".$vtiger_countries["country"]."','".$_REQUEST["state"]."','".$_REQUEST["zipcode"]."')";

							$adb->pquery($vtiger_contactaddress);
							$log->info("register 7");	
							$log->info("vtiger_mt4account enter");		
				
							
							$passsword = valid_pwd1(11);
							$ph_passsword = valid_pwd1(7); //rand(123456,999999);
							$investor_pwd = valid_pwd1(11);
						
							

							//$group = $_REQUEST['title'];
							$group = $groups['title'];
							//$group = "test";

							$master = 'junior';
							$comment = "Live account Online ^" . $group;
							$type = $_REQUEST['title'];
							$status = 'k';
							$login=get_mt4_series();
							$name=$_REQUEST['firstname']." ".$_REQUEST['lastname'];
							$email=$_REQUEST['email'];
							$agent=$_REQUEST['firstname']." ".$_REQUEST['lastname'];//affiliate name
							$country=$vtiger_countries["country"];
							$state=$_REQUEST['state'];
							$city=$_REQUEST['city'];
							$address=$_REQUEST['address'];
							$phone=$_REQUEST['phone'];
							$zipcode=$_REQUEST['zipcode'];
							$id="";
							$leverage="100";


							$response =open_account($group, $name, $passsword, $email, $agent, $country, $state, $city, $address, $phone, $ph_passsword, $status, $zipcode, $id, $leverage, $comment, $investor_pwd, $login = '');
							
							
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
							
							$params2 = array($current_id, $login_id, '1', '1', $passsword, $investor_pwd,$_REQUEST["accountnew_id"],'100','Live');
							$adb->pquery($sql2, $params2);
							
							$log->info($sql2);
							$log->info($params2);
							
							
							$sql3 = "INSERT INTO `vtiger_crmentityrel` (`crmid`, `module`, `relcrmid`, `relmodule`) VALUES (?, ?, ?, ?)";
							
							//$params3 = array($leadId, 'Leads', $current_id, 'mt4account');
							$params3 = array($primaryID, 'Contacts', $current_id, 'mt4account');
							$adb->pquery($sql3, $params3);
							
							$log->info($sql3);
							$log->info($params3);
							
							$log->info("vtiger_mt4account end");
						
						
						
						}
						
						$response=array("status"=>true,"message"=>"Registered successfully","usersid"=>$primaryID);
						
				}
				
				
				else
				{
					
					$response=array("status"=>false,"message"=>"Country not exist.");
				}
				
				
				
			}
			else
			{
				$response=array("status"=>false,"message"=>"Account not exist.");
			}
		}
		else
		{
			if($check_email["email"]==$_REQUEST["email"])
			{
				$response=array("status"=>false,"message"=>"Email already exist.");
			}
			else if($check_email["phone"]==$_REQUEST["phone"])
			{
				$response=array("status"=>false,"message"=>"Phone number already exist.");
				
			}
			else
			{
				$response=array("status"=>false,"message"=>"Email and phone number already exist.");
			}
		}
		
		
		
		
		
	}
	

echo json_encode($response);

?>