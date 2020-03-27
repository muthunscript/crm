<?php
include_once 'config.php';
include_once 'include/Webservices/Relation.php';

require_once('include/logging.php');
require_once('data/Tracker.php');
require_once('include/utils/utils.php');
require_once('include/utils/UserInfoUtil.php');
require_once("include/Zend/Json.php");
require_once 'include/RelatedListView.php';


/*  common functions */

function explode_string($node,$string)
{
	$arr=explode($node,$string);
	$ay=array();
	foreach($arr as $a)
	{
		$ay[]=trim($a);
	}
	return $ay;
}

function get_mt4_series()
{
	
	
	 global $_REQUEST,$database,$_site_config,$adb;//
	 
	//$adb = new PearDatabase(); 
   //$adb->connect();
   // ADD THIS LINE
  // $adb->setDebug(true);
	 
	 if(isset($_site_config['mt4_series'])&&$_site_config['mt4_series'])
	 {
		$mt4_live_acc = $adb->pquery("select * from vtiger_mt4account where loginid!='' and loginid IS NOT NULL order by mt4accountid desc limit 1");
		
		$mt4_live_acc=$adb->fetch_array($mt4_live_acc);
		
		return $mt4_live_acc['loginid']+1;
	 }
	 else
	 {
		 return '';
	 }
	
 }
 
function valid_pwd1($l)
{
$alpha = "abcdefghjkmnpqrstuvwxyz";
$alpha_upper = strtoupper($alpha);
$numeric = "0123456789";
//$special = ".-+=_,!@$#*%<>[]{}";
$chars = "";

    // default [a-zA-Z0-9]{9}
    $chars = $alpha . $numeric. $alpha_upper ;
    $length = $l;//rand(10,12);


$len = strlen($chars);
$pw = '';

for ($i=0;$i<$length;$i++)
        $pw .= substr($chars, rand(0, $len-1), 1);

// the finished password
return $pw = str_shuffle($pw.rand(0,9));


}

function exec_exe($command)
{
	global $n,$log;
	$log->info($command);
	$a=exec($command,$n);
	$log->info($a);
	$log->info($n);
	return $a;
}

function open_account($group, $name, $passsword, $email, $agent, $country, $state, $city, $address, $phone, $phone_password, $status, $zipcode, $id, $leverage, $comment, $investor, $login = '')
{
	
	
	global $_exe_array,$_site_config,$log;
	
	$log->info("mt4......open_account2");
	
	$ret = exec_exe(DR . 'dep' . DS . 'acreate.exe "NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-||-|" "' . $_exe_array[$_site_config['exe']]['live'][0] . '" "' . $_exe_array[$_site_config['exe']]['live'][1] . '" "' . $_exe_array[$_site_config['exe']]['live'][2] . '"  ');
	
	$ret = json_decode($ret, true);
 	if ($ret['status'] == 'OK')
 			{
				$log->info("17");
 				$response = 'OK , LOGIN=' . $ret['accno'];
				$log->info($response);
 			}
 			else
 			{
				$log->info("18");
 				$response = 'Invalid Data';
				$log->info($response);
 			}
 			return $response;

	
}

function add_account($group, $name, $passsword, $phone_password, $id, $leverage, $comment, $investor, $email, $mode, $login = '')
{
	global $_exe_array,$_site_config,$log;
	
	$mode=strtolower($mode);
	
	$ret = exec_exe(DR . 'dep' . DS . 'acreate.exe "NEWUSER|-|0|-|' . $group . '|-|' . $passsword . '|-|' . $name . '|-|' . $country . '|-|' . $email . '|-|' . $agent . '|-|' . $state . '|-|' . $city . '|-|' . $address . '|-|' . $phone . '|-|' . $zipcode . '|-|' . $leverage . '|-|' . $investor . '|-||-|" "' . $_exe_array[$_site_config['exe']][$mode][0] . '" "' . $_exe_array[$_site_config['exe']][$mode][1] . '" "' . $_exe_array[$_site_config['exe']][$mode][2] . '"  ');
	
	$ret = json_decode($ret, true);
	if ($ret['status'] == 'OK')
	{
		$response = 'OK , LOGIN=' . $ret['accno'];
	}
	else
	{
		$response = 'Invalid Data';
	}
	return $response;
	
}

function change_pwd($login, $pwd, $mode)//, $investor = 0, $public_key = 0
{
	
	
	global $_exe_array,$_site_config,$log;
	
	$mode=strtolower($mode);
	
	$log->info("change_pwd");

		$ret = exec_exe(DR . 'dep' . DS . 'changepasss.exe "CHANGEPASS|-|' . $login . '|-|' . $pwd . '|-|" "'.$_exe_array[$_site_config['exe']][$mode][0].'" "'.$_exe_array[$_site_config['exe']][$mode][1].'" "'.$_exe_array[$_site_config['exe']][$mode][2].'" ');
			
		$log->info($ret);
			
		$ret = json_decode($ret, true);
		if (is_array($ret)&&isset($ret['status'])&&$ret['status'] == 'OK')
		{
			
			
			$response = 'USER PASSWORD CHANGED' ;
		}
		else
		{
			$response = 'Invalid Data';
		}
		
		$log->info($response);
		
		return $response;
	
	
}


function change_investor($login, $pwd, $mode)//, $investor = 0, $public_key = 0
{
	
	
	global $_exe_array,$_site_config,$log;
	
	$log->info("change_investor");
	
	$mode=strtolower($mode);
	
	//"CHANGEINVT|-|1000222|-|admin123|-|" "108.170.12.26:443" "m6U4aCdc" "110"
	
// "CHANGEPASS|-|1331775816|-|Rseb5Y8sj5rm|-|" "23.81.66.123:443" "abcd1234" "100"
		$ret = exec_exe(DR . 'dep' . DS . 'changepasss.exe "CHANGEINVT|-|' . $login . '|-|' . $pwd . '|-|" "'.$_exe_array[$_site_config['exe']][$mode][0].'" "'.$_exe_array[$_site_config['exe']][$mode][1].'" "'.$_exe_array[$_site_config['exe']][$mode][2].'" ');
			
		$log->info($ret);
			
		$ret = json_decode($ret, true);
		if (is_array($ret)&&isset($ret['status'])&&$ret['status'] == 'OK')
		{
			
			
			$response = 'INVESTOR PASSWORD CHANGED' ;
		}
		else
		{
			$response = 'Invalid Data';
		}
		
		$log->info($response);
		
		return $response;
	
	
}

function change_leverage($login, $levarage, $mode)
{
	
	
	global $_exe_array,$_site_config,$log;
	
	$log->info("change_leverage");
	
	$mode=strtolower($mode);
	
	//"CHANGELEVG|-|1000222|-|100|-|" "108.170.12.26:443" "m6U4aCdc" "110"
	
		$ret = exec_exe(DR . 'dep' . DS . 'changepasss.exe "CHANGELEVG|-|' . $login . '|-|' . $levarage . '|-|" "'.$_exe_array[$_site_config['exe']][$mode][0].'" "'.$_exe_array[$_site_config['exe']][$mode][1].'" "'.$_exe_array[$_site_config['exe']][$mode][2].'" ');
			
		$log->info($ret);
			
		$ret = json_decode($ret, true);
		if (is_array($ret)&&isset($ret['status'])&&$ret['status'] == 'OK')
		{
			$response = 'LEVERAGE CHANGED' ;
		}
		else
		{
			$response = 'Invalid Data';
		}
		
		$log->info($response);
		
		return $response;
	
	
}
