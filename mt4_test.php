<?php
/*+**********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.1
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 ************************************************************************************/

//Overrides GetRelatedList : used to get related query
//TODO : Eliminate below hacking solution
include_once 'config.inc.php';
include_once 'include/Webservices/Relation.php';





require_once('include/logging.php');
require_once('data/Tracker.php');
require_once('include/utils/utils.php');
require_once('include/utils/UserInfoUtil.php');
require_once("include/Zend/Json.php");
require_once 'include/RelatedListView.php';






global $adb,$log; 



	
	



//$adb = new PearDatabase(); 
  // $adb->connect();
   // ADD THIS LINE
   //$adb->setDebug(true);

$passsword = valid_pwd1(11);


$ph_passsword = valid_pwd1(7); //rand(123456,999999);
$investor_pwd = valid_pwd1(11);

//$account_master = account_master::find_by_id(63);


$sql = 'SELECT * from vtiger_accountnew where accountnewid=63';

$account_master = $adb->pquery($sql);

$account_master=$adb->fetch_array($account_master);


$group = $account_master['title'];
$group = "test";



$master = 'junior';
 	$comment = "Live account Online ^" . $u['type_of_account'];
 	$type = $account_master['title'];
 	$status = 'k';


//$login=get_mt4_series();
$login=10000003;




//$create_demo = new mt4api1(1);



/*

$response = $create_demo->open_account($group, $fd_temp['name'].(isset($fd_temp['surname'])?$fd_temp['surname']:""), $passsword, $fd_temp['email'], ((isset($get_affname[0]['username'])&&$get_affname[0][0]['username']!='')?$get_affname[0]['username']:(isset($_POST['ib_code'])?$_POST['ib_code']:'')), (isset($fd_temp['country'])?$fd_temp['country']:""), (isset($_POST['state'])?$_POST['state']:""), (isset($_POST['city'])?$_POST['city']:""), (isset($_POST['address'])?$_POST['address']:""), $fd_temp['phonenumber'], $ph_passsword, $status, (isset($_POST['zipcode'])?$_POST['zipcode']:""), '', '100', $comment, $investor_pwd,$login);


*/

$name="lavanya";
$email="lavanya+01@nscript.in";
$agent="lavanya";
$country="INDIA";
$state="TAMIL NADU";
$city="CHENNAI";
$address="address";
$phone="919098789090";
$zipcode="602024";
$id="";
$leverage="100";


$response =open_account($group, $name, $passsword, $email, $agent, $country, $state, $city, $address, $phone, $ph_passsword, $status, $zipcode, $id, $leverage, $comment, $investor_pwd, $login = '');

echo var_dump($response);
//exit();


//$log->info($group." ".$name." ".$passsword." ".$email." ".$agent." ".$country." ".$state." ".$city." ".$address." ".$phone." ".$phone_password." ".$status." ".$zipcode." ".$id." ".$leverage." ".$comment." ".$investor." ".$login);

//$log->info("mt4......".$response);



