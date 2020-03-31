<?php
include_once 'config.php';
include_once 'include/Webservices/Relation.php';

require_once('include/logging.php');
require_once('data/Tracker.php');
require_once('include/utils/utils.php');
require_once('include/utils/UserInfoUtil.php');
require_once("include/Zend/Json.php");
require_once 'include/RelatedListView.php';
require_once 'ws.php';

//error_reporting(E_ALL);

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

function withdraw_exc($login, $withdraw, $mode)
{
		
		
 		global $deposit_socket, $_site_config, $_exe_array, $log;
		
		$log->info("withdraw");
	
		$mode=strtolower($mode);
 		
		$comment='ok';
		
		$q = DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket[$mode] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . -$withdraw . '" "' . $comment . '"';
		$log->info($q);
		$n='';
		$n = exec_exe(DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket[$mode] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . -$withdraw . '" "' . substr($comment, -30) . '"');
		$a=$n[1];
		$log->info($a);
		$log->info(json_encode($n));
		
		////loge(json_encode($n));
		$login1 = $n[1];
		
		
		if(strpos($n,'SUCEEDED')!==false)
		{
			//$login1 = "DEPOSIT SUCCESSFUL";
			$login1 = "SUCCESSFUL";
		}
		return $login1;	
}

function withdraw($login, $withdraw, $comment, $mode)
{
	
	global $deposit_socket, $_site_config, $_exe_array, $log;
		
		if($comment=="")
		{
			$comment='ok';
		}
		$log->info("withdraw socket");
	
		$mode=strtolower($mode);
	
	//ws://23.81.66.123:1111/
	
	$ws = new ws(array(
		'host' => $deposit_socket[$mode],
		'port' => $deposit_socket[$mode."_port"],
		'path' => '',
		'secure_socket' => false));
	$query = time().rand(1111,9999).'|-|DC|-|6|-|' . $login . '|-|' . -$withdraw . '|-|' . substr($comment, -30) . '|-|';
	$query=preg_replace('/\s+/', '',$query);
	$log->info($query);
	$login1 = $ws->send($query);
	$log->info($login1);
	$ret = json_decode($login1, true);
	
	/*****
	
	{"status": "OK",  "accno": "1331776532","depo":-100,"REQNO":15847760195092}
	
	*****/
	/*
	if ($ret['status'] == 'OK')
	{
		$response = "SUCCESSFUL";
	}
	*/
	return $login1;	
}

function deposit($login, $deposit, $comment, $mode)
{
	global $deposit_socket, $_site_config, $_exe_array, $log;
		
		if($comment=="")
		{
			$comment='ok';
		}
		
		$log->info("deposit socket");
	
		$mode=strtolower($mode);
	
	//ws://23.81.66.123:1111/
	
	$ws = new ws(array(
		'host' => $deposit_socket[$mode],
		'port' => $deposit_socket[$mode."_port"],
		'path' => '',
		'secure_socket' => false));
	$query = time().rand(1111,9999).'|-|DC|-|6|-|' . $login . '|-|' . $deposit . '|-|' . substr($comment, -30) . '|-|';
	$query=preg_replace('/\s+/', '',$query);
	$log->info($query);
	$login1 = $ws->send($query);
	$log->info($login1);
	$ret = json_decode($login1, true);
	
	/*****
	
	{"status": "OK",  "order": "271372",  "accno": "1331776532","depo":200,"REQNO":15847763731228}
	
	*****/
	/*
	if ($ret['status'] == 'OK')
	{
		$response = "DEPOSIT SUCCESSFUL";
	} */
	return $login1;	
}



function deposit_exc($login, $deposit, $mode)
{
		
		
 		global $deposit_socket, $_site_config, $_exe_array, $log;
		
		$log->info("deposit");
	
		$mode=strtolower($mode);
 		
		$comment='ok';
		
		$q = DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket[$mode] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . $deposit . '" "' . $comment . '"';
		$log->info($q);
		$n='';
		$n = exec_exe(DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket[$mode] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . $deposit . '" "' . substr($comment, -30) . '"');
		$a=$n[1];
		$log->info($a);
		$log->info(json_encode($n));
		
		////loge(json_encode($n));
		$login1 = $n[1];
		
		
		if(strpos($n,'SUCEEDED')!==false)
		{
			$log->info("if login1.....");
			$login1 = "DEPOSIT SUCCESSFUL";
			
		}
		
		$log->info("login1.....".$login1);
		
		return $login1;	
}

function withdraw_history($loginid="")
{
	global $log,$sql_manager,$_site_config;
	$log->info("withdraw_history");
	
	$mdb = new PearDatabase();
	//$mdb->connect1("23.81.66.123:3306","usern","password","mt4");
	
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	
	if($loginid!="" && $loginid!=1)
	{
		$with_result = $mdb->pquery("SELECT TICKET,LOGIN,SYMBOL,CMD,VOLUME,OPEN_TIME,OPEN_PRICE,SL,TP,CLOSE_TIME,CLOSE_PRICE,PROFIT,COMMENT FROM mt4.mt4_trades where mt4_trades.LOGIN = ? order by mt4_trades.CLOSE_TIME",array($loginid));
	}
	else if($loginid==1)
	{
		
		//$with_result = $mdb->pquery("SELECT TICKET,LOGIN,SYMBOL,CMD,VOLUME,OPEN_TIME,OPEN_PRICE,SL,TP,CLOSE_TIME,CLOSE_PRICE,PROFIT,COMMENT FROM mt4.mt4_trades order by mt4_trades.OPEN_TIME DESC");
		
		$groups=groups();
		
		
	
		$with_result=$mdb->pquery("select mt4_trades.*,mt4_users.* from mt4_trades join mt4_users on mt4_users.LOGIN=mt4_trades.LOGIN order by mt4_trades.OPEN_TIME DESC");
		
	}
	else
	{
		$groups=groups();

		$with_result=$mdb->pquery("select mt4_trades.*,mt4_users.* from mt4_trades join mt4_users on mt4_users.LOGIN=mt4_trades.LOGIN where mt4_users.`GROUP` in (\"".implode('","',$groups)."\")  order by mt4_trades.OPEN_TIME DESC");
		
	}
   
	  $ret=array();
	   if($with_result)
	   {

			while ($row = $mdb->fetch_array($with_result))
			{
				$ret[]=array($row);

			}
			$with_result->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	  
	  $log->info("withdraw_history data ".json_encode($ret)); 
	   //$mdb->close();
	   return $ret;	
}


function mt4_users($loginid)
{
	global $log,$sql_manager,$_site_config;
	$log->info("withdraw_history");
	
	$mdb = new PearDatabase();
	//$mdb->connect1("23.81.66.123:3306","usern","password","mt4");
	
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	
   
	$with_result = $mdb->pquery("select * from mt4.mt4_users WHERE mt4_users.LOGIN = ?",array($loginid));
	
	//$with_result = $mdb->pquery("select mt4_trades.*,mt4_users.* from mt4_trades join mt4_users on mt4_users.LOGIN=mt4_trades.LOGIN where mt4_users.LOGIN = ?",array($loginid));
	
	
	
	  $ret=array();
	   if($with_result)
	   {

			while ($row = $mdb->fetch_array($with_result))
			{
				$ret[]=array($row);

			}
			$with_result->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	  
	  $log->info("mt4_users data ".json_encode($ret)); 
	   //$mdb->close();
	   return $ret;	
}

function user_register()
{
	
	global $log,$sql_manager,$_site_config;
	$log->info("user_register");
	
	$mdb = new PearDatabase();
	
	
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	
   
	$with_result = $mdb->pquery("SELECT *,COUNT(login) AS regsister_count FROM mt4_users GROUP BY YEAR(regdate), MONTH(regdate),DAY(regdate)");
	
	
	
	
	
	  $ret=array();
	   if($with_result)
	   {

			while ($row = $mdb->fetch_array($with_result))
			{
				//echo var_dump($row);
				$va=$row["regdate"];
				$va=explode(" ", $va);
				$va=explode("-", $va[0]);
				$timestamp=mktime(0,0,0,$va[1],$va[2],$va[0]);
				
				$ret[$timestamp]=$row["regsister_count"];

			}
			$with_result->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	  
	  $log->info("mt4_users data ".json_encode($ret)); 
	   //$mdb->close();
	   return $ret;	
}


function group_array($arr,$key){
	$result = array();
	foreach ($arr as $data) {
	  $id = $data->$key;
	  if (isset($result[$id])) {
		 $result[$id][] = $data;
	  } else {
		 $result[$id] = array($data);
	  }
	}
	return $result;
}

function maxValueInArray($array, $keyToSearch)
{
    $currentMax = NULL;
    foreach($array as $arr)
    {
        foreach($arr as $key => $value)
        {
            if ($key == $keyToSearch && ($value[$keyToSearch] >= $currentMax))
            {
                $currentMax = $value;
            }
        }
    }

	//echo "currentMax";
	
	//echo var_dump($currentMax);
	//exit();
	
    return $currentMax;
}

function trades($op_type,$op_status,$loginid,$trade,$groups,$type)
{
	
		global $log,$sql_manager,$_site_config;
		$log->info("trades");
		
		$mdb = new PearDatabase();
		
		$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
		
		//$group=array();
		
		if($type=="users")
		{
			$basic_q="select mt4_users.* from mt4_users where `GROUP` in (\"".implode('","',$groups)."\")";
		}
		else
		{
			
	
			$basic_q="select mt4_trades.* from mt4_trades join mt4_users on mt4_users.LOGIN=mt4_trades.LOGIN where mt4_users.`GROUP` in (\"".implode('","',$groups)."\")";
			
			if($op_type!="")
			{
				if($op_type=='0')
				{ 
					$basic_q.=" AND mt4_trades.`CMD` not in (6,7) ";
				}
				else if($op_type=='1')
				{
					$basic_q.=" AND mt4_trades.`CMD` in (6) and mt4_trades.PROFIT>=0 "; 
				}
				else if($op_type=='2')
				{ 
					$basic_q.=" AND mt4_trades.`CMD` in (6) and mt4_trades.PROFIT<0 "; 
				}
				else if($op_type=='3')
				{ 
					$basic_q.=" AND mt4_trades.`CMD` in (7)  "; 
				}
			}
			
			if($op_status!="")
			{
				if($op_status=='0')
				{ 
					$basic_q.=" AND mt4_trades.`CLOSE_TIME`='1970-01-01 00:00:00' "; 
				}
				else if($op_status=='1')
				{ 
					$basic_q.=" AND mt4_trades.`CLOSE_TIME`!='1970-01-01 00:00:00' "; 
				}
			}
		}

		if($loginid!="" && $loginid!=0)
		{
			$basic_q.=" AND mt4_users.LOGIN='".$_REQUEST['login']."'";
		}
		
		if($trade!="")
		{
			$basic_q.=" AND mt4_trades.TICKET='".$_REQUEST['trade']."'";
		}
		
		if($groups!="")
		{ 
			$basic_q.=" AND mt4_users.`GROUP`='".$_REQUEST['groups']."'"; 
		}
		
		$with_result = $mdb->pquery($basic_q);
		
	   $ret=array();
	   if($with_result)
	   {

			while ($row = $mdb->fetch_array($with_result))
			{
				$ret[]=array($row);

			}
			$with_result->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	  
	   $log->info("mt4_trades data ".json_encode($ret)); 
	   return $ret;	
		
}

function groups()
{

	global $log,$sql_manager,$_site_config,$adb;
	 $log->info("groups"); 

	 $groups = $adb->pquery("SELECT * FROM `vtiger_accountnew`");
	 
	 $ret=array();
	  if($groups)
	   {

			while ($row = $adb->fetch_array($groups))
			{
				array_push($ret,$row["title"]);

			}
			$groups->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	 
	 $log->info("groups data ".json_encode($ret)); 
	  return $ret;	
	
}

function get_groups()
{

	global $log,$sql_manager,$_site_config,$adb;
	 $log->info("groups"); 

	 //$groups = $adb->pquery("SELECT * FROM `vtiger_accountnew` where visible=1");
	 $groups = $adb->pquery("SELECT vtiger_accountnew.* FROM `vtiger_accountnew` LEFT JOIN vtiger_crmentity on vtiger_crmentity.crmid=vtiger_accountnew.accountnewid WHERE vtiger_crmentity.deleted=0 and vtiger_accountnew.visible=1");
	 
	 $ret=array();
	  if($groups)
	   {

			while ($row = $adb->fetch_array($groups))
			{
				array_push($ret,$row);

			}
			$groups->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	 
	 $log->info("groups data ".json_encode($ret)); 
	  return $ret;	
	
}

function calculation($kola)
{
	//error_reporting(E_ALL);
	
	global $log;
	$log->info("calculation data ".json_encode($kola));

	$open_orders = array_filter($kola,function($v){ if($v[0]["close_time"]=='1970-01-01 00:00:00' && ($v[0]["cmd"] == 0 || $v[0]["cmd"] == 1)){return TRUE; }else{return FALSE; } });
	$close_orders = array_filter($kola,function($v){ if($v[0]["close_time"]!='1970-01-01 00:00:00' && ($v[0]["cmd"] == 0 || $v[0]["cmd"] == 1)){return TRUE; }else{return FALSE; } });
	$deposit = array_filter($kola,function($v){ if($v[0]["profit"]>0 && $v[0]["cmd"] == 6 ){ return TRUE; }else{ return FALSE; } });
	$withadraw = array_filter($kola,function($v){ if($v[0]["profit"]<0 && $v[0]["cmd"] == 6 ){return TRUE; }else{return FALSE; } });
	
	/************/
	
	$credit_in = array_filter($kola,function($v){ if($v[0]["profit"]>0 && $v[0]["cmd"] == 7 ){ return TRUE; }else{ return FALSE; } });
	$credit_out = array_filter($kola,function($v){ if($v[0]["profit"]<0 && $v[0]["cmd"] == 7 ){return TRUE; }else{return FALSE; } });
	
	/************/

	$orders_by_symbol = group_array($close_orders,"SYMBOL");
	
	$today = strtotime('12:00:00');
	$today24 = $today - (24 * 60 * 60);
	$grouped = Array();
	$grouped_lot = Array();
	$grouped_number = Array();
	$grouped_sym = Array();
	$grouped_sym_n = Array();
	$pnl = Array();

	for($i=0;$i<15;$i++){
		$grouped[$i] = Array(); $grouped_lot[$i] = Array(0,0,date("d/m",$today24)); $grouped_number[$i] = Array(0,0,date("d/m",$today24));
		foreach($close_orders as $close_orders_t){
			if(strtotime($close_orders_t[0]["close_time"])<$today && strtotime($close_orders_t[0]["close_time"])>$today24){
				array_push($grouped[$i],$close_orders_t);
				$te1 = $grouped_lot[$i][1] + $close_orders_t[0]["volume"];
				$te2 = $grouped_number[$i][1] + 1;
				$grouped_lot[$i] = Array($i,$te1,date("d/m",$today24));
				$grouped_number[$i] =  Array($i,$te2,date("d/m",$today24));
			}
		}
		$today = $today24 ;
		$today24 = $today24 - (24 * 60 * 60);
	}
	$pnl[0] = Array("id"=>0,"day"=>0,"profit"=>0);
	$pnlmax = 0; $pnlmin = 0; $pnlfinal=0;
	foreach($close_orders as $close_orders_t){
			$grouped_sym[$close_orders_t[0]["symbol"]] = $close_orders_t;
			if(!array_key_exists($close_orders_t[0]["symbol"],$grouped_sym_n)){ $grouped_sym_n[$close_orders_t[0]["symbol"]] = 0; }  
			$grouped_sym_n[$close_orders_t[0]["symbol"]]++;
			if($close_orders_t[0]["profit"]>$pnlmax){ $pnlmax = $close_orders_t[0]["profit"]; }
			if($close_orders_t[0]["profit"]<$pnlmin){ $pnlmin = $close_orders_t[0]["profit"]; }
			$pnlfinal += $close_orders_t[0]["profit"];
			array_push($pnl,Array("id"=>sizeof($pnl),"day"=>sizeof($pnl),"profit"=>$pnl[sizeof($pnl)-1]["profit"]+$close_orders_t[0]["profit"]));
		}


		
		$m = Array();
		foreach($grouped_sym_n as $key=>$value){
			array_push($m,Array($key,$value));
		}

	$i=0;
	$numItems = count($deposit);
	$ftd=0;
	$open_time="";
	$close_time="";
	$redeposits="";
	$no_redeposits="";
	$deposit_count=0;
	$demosit_arr = Array(); $totaldep = 0;
	foreach($deposit as $deposit_t){

		array_push($demosit_arr,Array($deposit_t[0]["ticket"],$deposit_t[0]["profit"],$deposit_t[0]["comment"],$deposit_t[0]["close_time"]));
		
		$totaldep += $deposit_t[0]["profit"]; 
		$deposit_count++;
		
		if(++$i === $numItems) {
			//echo var_dump($deposit_t[0]);
			$ftd=$deposit_t[0]["profit"];
			$open_time=$deposit_t[0]["open_time"];
			$close_time=$deposit_t[0]["close_time"];
			$redeposits=$totaldep-$ftd;
			$no_redeposits=$deposit_count-1;
		  }
		
		}
		//exit();
	

		$withdraw_count=0;
	$with_arr = Array();  $totalwith = 0;
	foreach($withadraw as $withadraw_t){
		
		array_push($with_arr,Array($withadraw_t[0]["ticket"],$withadraw_t[0]["profit"],$withadraw_t[0]["comment"],$withadraw_t[0]["close_time"]));
		
		$totalwith += $withadraw_t[0]["profit"];
		$withdraw_count++;
	}
	
	/**********/
	$total_credit_in=0;
	foreach($credit_in as $in){

		$total_credit_in += $in[0]["profit"];
	
	}
	$total_credit_out=0;
	foreach($credit_out as $out){

		$total_credit_out += $out[0]["profit"];
	
	}
	/**********/
	

	$open_arr = Array();
	$open_pl=0;
	foreach($open_orders as $open_orders_t){

		
		array_push($open_arr,Array($open_orders_t[0]["ticket"],$open_orders_t[0]["symbol"],$open_orders_t[0]["open_price"],$open_orders_t[0]["open_time"],$open_orders_t[0]["profit"]));
		$open_pl+=$open_orders_t[0]["profit"];
	}
	
	$close_arr = Array();
	foreach($close_orders as $open_orders_t){
		
		array_push($close_arr,Array($open_orders_t[0]["ticket"],$open_orders_t[0]["symbol"],$open_orders_t[0]["open_price"],$open_orders_t[0]["open_time"],$open_orders_t[0]["profit"]));
	}
	
	
	//echo var_dump($grouped);
	//exit();
	$Volume=0;
	$lot=0;
	if($te1!='' && $te1!=0)
	{
		$Volume=$te1;
		$lot=$te1/100;
	}

	$net_deposit=$totaldep+$totalwith;
	$credits=$total_credit_in+$total_credit_out;
	
	$response=array("demosit_arr"=>$demosit_arr,"with_arr"=>$with_arr,"open_arr"=>$open_arr,"close_arr"=>$close_arr,"pnlfinal"=>$pnlfinal,"totaldep"=>$totaldep,"totalwith"=>$totalwith,"deposit_count"=>$deposit_count,"withdraw_count"=>$withdraw_count,"open_pl"=>$open_pl,"open_order"=>count($open_arr),"close_order"=>count($close_arr),"volume"=>$Volume,"lot"=>$lot,"ftd"=>$ftd,"net_deposit"=>$net_deposit,"credit_in"=>$total_credit_in,"credit_out"=>$total_credit_out,"credit"=>$credits,"close_time"=>$close_time,"open_time"=>$open_time,"redeposits"=>$redeposits,"no_redeposits"=>$no_redeposits);
	
	//echo json_encode($response);
	//exit();
	
	
	return $response;
	
	
}

function client_report()
{
	
	global $log,$sql_manager,$_site_config,$adb;
	 $log->info("client_report"); 

	 $groups = $adb->pquery("
		select vtiger_crmentityrel.*,vtiger_contactdetails.*,vtiger_mt4account.*,vtiger_crmentity.*,vtiger_users.first_name as user_fn,vtiger_users.last_name as user_ln,vtiger_contactsubdetails.leadsource as leadsource
		from vtiger_crmentityrel 
		left join vtiger_contactdetails
		ON vtiger_contactdetails.contactid= vtiger_crmentityrel.crmid
		left join vtiger_mt4account
		ON vtiger_mt4account.mt4accountid= vtiger_crmentityrel.relcrmid
		left join vtiger_crmentity
		ON vtiger_crmentity.crmid= vtiger_crmentityrel.crmid
		left join vtiger_users
		ON vtiger_users.id= vtiger_crmentity.smownerid
		left join vtiger_contactsubdetails
		ON vtiger_contactsubdetails.contactsubscriptionid= vtiger_crmentityrel.crmid 
		where vtiger_crmentityrel.module='Contacts' and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.crmid!=0 and vtiger_crmentityrel.relcrmid!=0 and vtiger_mt4account.loginid!='' and vtiger_mt4account.loginid!=0
	");

	 $ret=array();
	  if($groups)
	   {

			while ($row = $adb->fetch_array($groups))
			{
				array_push($ret,$row);

			}
			$groups->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	 
	 $log->info("client_report data ".json_encode($ret)); 
	  return $ret;

  
}




function get_accounts()
{
	
	global $log,$sql_manager,$_site_config,$adb,$current_user;
	$log->info("get_accounts".$current_user->id);

	$mdb = new PearDatabase();
	
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	
	
	
	$groups=groups();
	
	$basic_q="select mt4_trades.TICKET,mt4_trades.SYMBOL,mt4_trades.VOLUME,mt4_trades.LOGIN,mt4_trades.PROFIT AS profit,mt4_users.MARGIN,mt4_users.LOGIN,mt4_users.BALANCE from mt4_trades  join mt4_users on mt4_users.LOGIN=mt4_trades.LOGIN where mt4_trades.CLOSE_TIME='1970-01-01 00:00:00' AND mt4_trades.CMD IN (0,1) AND mt4_users.`GROUP` in (\"".implode('","',$groups)."\")";
	

		
		$af=array();

		
		$aff=$adb->query("SELECT * FROM `vtiger_users` WHERE id='".$current_user->id."' OR reports_to_id='".$current_user->id."'");
		
		$log->info("vtiger_users");
		
		if(!empty($aff))
		{
				foreach($aff as $af_temp)
				{
					$af[]=$af_temp['id'];
				}
				
				$log->info("vtiger_users".json_encode($af));

				
				$sq="SELECT * FROM `vtiger_crmentity` JOIN vtiger_crmentityrel ON vtiger_crmentityrel.crmid = vtiger_crmentity.crmid LEFT JOIN vtiger_mt4account ON vtiger_mt4account.mt4accountid = vtiger_crmentityrel.relcrmid WHERE vtiger_crmentity.smownerid in (".implode(",",$af).") and vtiger_crmentity.setype='Contacts' and vtiger_crmentityrel.relmodule='mt4account' AND vtiger_crmentityrel.module='Contacts' AND vtiger_mt4account.loginid!=0 AND vtiger_mt4account.loginid!='' AND vtiger_mt4account.acc_type='Live' ";
				$acc='0';
				$acc_ar=array();
				$mt4_live_acc=$adb->query($sq);
				
				$log->info("mt4_live_acc");
				
				foreach($mt4_live_acc as $mta)
				{
					if($mta['loginid']!='')
					$acc_ar[]=$mta['loginid'];
				}
				if(!empty($acc_ar)){$acc=implode(",",$acc_ar);}
				
				$log->info("mt4_live_acc".$acc);
				
				
				$basic_q.=" and mt4_users.`LOGIN` in (".$acc.") ";
		} 
	$basic_q.='ORDER BY mt4_trades.PROFIT DESC LIMIT 20';
	
	
	/****test data****/
	
	$basic_q="select mt4_trades.CMD,mt4_trades.TICKET,mt4_trades.SYMBOL,mt4_trades.VOLUME,mt4_trades.LOGIN,mt4_trades.PROFIT AS profit,mt4_users.MARGIN,mt4_users.LOGIN,mt4_users.BALANCE from mt4_trades  join mt4_users on mt4_users.LOGIN=mt4_trades.LOGIN where mt4_trades.CLOSE_TIME='1970-01-01 00:00:00' AND mt4_trades.CMD IN (0,1) ORDER BY mt4_trades.PROFIT DESC LIMIT 20";
	
	/****test data****/
	
	$log->info("mt4 account................");
	$log->info($basic_q);
	
	$result = $mdb->query($basic_q);

	$ret=array();
	if($result)
	{
		 while ($row = $mdb->fetch_array($result))
		 {
				array_push($ret,$row);

		 }
		$result->close();
		   
	}
	
	return $ret;
}

function find_ip(){
	$ip;
	if (getenv("HTTP_CLIENT_IP"))
	$ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
	$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
	$ip = getenv("REMOTE_ADDR");
	else
	$ip = "UNKNOWN";
	return $ip;
}
function credit($login, $credit, $expire, $mode)
{
	
	global $deposit_socket, $_site_config, $_exe_array, $log;
		
		
	$comment='ok';
		
		
	$log->info("credit socket");
	
	$mode=strtolower($mode);
	
	//ws://23.81.66.123:1111/
	
	$ws = new ws(array(
		'host' => $deposit_socket[$mode],
		'port' => $deposit_socket[$mode."_port"],
		'path' => '',
		'secure_socket' => false));
	$query = time().rand(1111,9999).'|-|DC|-|7|-|' . $login . '|-|' . $credit . '|-|' . substr($comment, -30) . '|-|' . $expire . '|-|';
	$query=preg_replace('/\s+/', '',$query);
	$log->info($query);
	$login1 = $ws->send($query);
	$log->info($login1);
	$ret = json_decode($login1, true);
	
	//132|-|DC|-|7|-|1331776532|-|1000|-|test|-|1585506600|-|

	
	/*****
	
	{"status": "OK",  "order": "271372",  "accno": "1331776532","depo":200,"REQNO":15847763731228}
	
	*****/

	return $login1;
}
function credit_points($loginid, $accountnewid, $amount)//$loginid=>crmid of mt4account,$accountnewid=>crmid of accountnew
{
	global $log,$sql_manager,$_site_config,$adb;
	
	//($deposit_data['mt4accountid'],$deposit_data["accountnewid"],$deposit_data["amount"])
	
	$deposit="select * from `vtiger_deposit` where loginid=".$loginid." and status=1";
	$log->info("deposit................ ".$deposit);
	$deposit=$adb->pquery($deposit);
	$deposit_rows=$adb->num_rows($deposit);
	$log->info("deposit_rows................ ".$deposit_rows);
	
	$deposit_type="Reqular";
	if($deposit_rows==0)
	{
		$deposit_type="FTD";
	}
	
	$offers=$adb->pquery("SELECT vtiger_offers.* FROM `vtiger_offers`LEFT JOIN vtiger_crmentity on vtiger_crmentity.crmid=vtiger_offers.offersid WHERE vtiger_crmentity.deleted=0 and vtiger_offers.visible=1");
	$credit_points=0;
	$offerid=0;
	  // $ret=array();
	   if($offers)
	   {

			while ($offer = $adb->fetch_array($offers))
			{
				//$ret[]=$row;
				$log->info("each offers ".json_encode($offer));
				$log->info("offers condition".$offer["accountnewid"]."==".$accountnewid." ".$offer["deposit_type"]."==".$deposit_type." ".$offer["deposit"]."==".$amount);
				if($offer["accountnewid"]==$accountnewid && $offer["deposit_type"]==$deposit_type && $offer["deposit"]==$amount)
				{
					$credit_points=$offer["credits"];
					$offersid=$offer["offersid"];
				}
			}
			
		   
	   } 
	$log->info("credit_points ".$credit_points);
	return json_encode(array("credit_points"=>$credit_points,"offersid"=>$offersid));
	
}
function order_edit_delete($login,$deal,$openprice,$closeprice,$profit,$sl,$tp,$mode)
{
 		global $deposit_socket, $_site_config, $_exe_array, $log;
		
		$log->info("order_edit_delete");
	
		$mode=strtolower($mode);
		
		$query=DR.DS.'dep'.DS.'editdeleteorder.exe "ORDEREDIT"  "'.$deposit_socket[$mode].':443" "'.$deposit_socket['rp'].'" "'.$deposit_socket['ra'].'" "E" "'.$deal.'" "'.$login.'" "'.$openprice.'" "'.$closeprice.'" "'.$profit.'" "'.$sl.'"  "'.$tp.'"';
		
		if($site=="easyfxsolutions")
		{
			$message='ALL DONE';
		}
		else
		{			
			$message=exec_exe($query);
		}
		$log->info("Login ID-".$login."  ".$deal." - DEAL EDIT - OP/CP/SL/TP/PR : ".$openprice."/".$closeprice."/".$sl."/".$tp."/".$profit);
		
		if($message=='ALL DONE')
		{
			$message="DEAL Edited Successfully";
		}
		else
		{
			$message="Error in editing DEAL";
		}
		
		$log->info("order_edit_delete message ".$message);
		
		return $message;
		
		
}

function order_close($login,$deal,$openprice,$closeprice,$profit,$sl,$tp,$comment,$symbol,$mode)
{
	
 		global $deposit_socket, $_site_config, $_exe_array, $log;
		
		$log->info("order_close");
	
		$mode=strtolower($mode);
		
		
		
		/************/
		
		$query=DR.DS.'dep'.DS.'orderProcess.exe "ORDPROCESS|-|1519639095|-|76|-|1|-|'.$deal.'|-|'.$login.'|-|0|-|0|-|'.$closeprice.'|-|0|-|0|-|0|-|'.$comment.'|-|0|-|admin|-|'.$symbol.'|-|"  "'.$deposit_socket[$mode].':443" "'.$deposit_socket['rp'].'" "'.$deposit_socket['ra'].'"';
		
		/************/
		
		$log->info($deal." - DEAL CLOSE STARTED");
		
		if($site=="easyfxsolutions")
		{
			$message='-Order Closed Successfully';
			$message=exec_exe($query);
		}
		else
		{
			$message=exec_exe($query);
		}
		if (!(strpos($message,'-Order Closed Successfully') === false))
		{
			$message="DEAL Closed Successfully";
			$log->info($deal." - DEAL CLOSED SUCESSFULLY");
		}
		else
		{
			$msg_type=0;
			$message="Error in Closing DEAL";
			$log->info($deal." - ERROR IN CLOSING DEAL");
		}
		
		return $message;
}

function get_mt4account($contactid)
{

	global $log,$sql_manager,$_site_config,$adb;
	 $log->info("get_mt4account"); 

	 $groups = $adb->pquery("SELECT * FROM `vtiger_crmentityrel` where crmid=".$contactid." and module='Contacts' and relmodule='mt4account'");
	 
	 //echo "SELECT * FROM `vtiger_crmentityrel` where crmid=".$contactid." and module='Contacts' and relmodule='mt4account'";
	 //exit();
	 
	 $ret=array();
	  if($groups)
	   {

			while ($row = $adb->fetch_array($groups))
			{
				array_push($ret,$row["relcrmid"]);

			}
			$groups->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	 
	 $log->info("get_mt4account data ".json_encode($ret)); 
	  return $ret;	
	
}


function get_countries()
{

	global $log,$sql_manager,$_site_config,$adb;
	 $log->info("get_countries"); 

	 
	// $groups = $adb->pquery("SELECT * FROM `vtiger_accountnew` LEFT JOIN vtiger_crmentity on vtiger_crmentity.crmid=vtiger_accountnew.accountnewid WHERE vtiger_crmentity.deleted=0 and vtiger_accountnew.visible=1");
	 
	  $groups = $adb->pquery("SELECT vtiger_countries.* FROM `vtiger_countries` LEFT JOIN vtiger_crmentity on vtiger_crmentity.crmid=vtiger_countries.countriesid WHERE vtiger_crmentity.deleted=0 limit 20");
	  

	 
	 $ret=array();
	  if($groups)
	   {

			while ($row = $adb->fetch_array($groups))
			{
				array_push($ret,$row);

			}
			$groups->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	 
	 $log->info("get_countries data ".json_encode($ret)); 
	  return $ret;	
	
}

function get_leverage()
{

	global $log,$sql_manager,$_site_config,$adb;
	 $log->info("groups"); 

	 //$groups = $adb->pquery("SELECT * FROM `vtiger_accountnew` where visible=1");
	 $groups = $adb->pquery("SELECT vtiger_leverage.* FROM `vtiger_leverage` LEFT JOIN vtiger_crmentity on vtiger_crmentity.crmid=vtiger_leverage.leverageid WHERE vtiger_crmentity.deleted=0 and vtiger_leverage.visible=1");
	 
	 $ret=array();
	  if($groups)
	   {

			while ($row = $adb->fetch_array($groups))
			{
				array_push($ret,$row);

			}
			$groups->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	 
	 $log->info("groups data ".json_encode($ret)); 
	  return $ret;	
	
}

function user_auth($email,$password,$login="")
{
	global $log,$sql_manager,$_site_config,$adb;
	$lead_data="select vtiger_crmentity.*,vtiger_contactdetails.*,vtiger_contactaddress.*  
		from vtiger_crmentity 
		left join vtiger_contactdetails ON vtiger_contactdetails.contactid= vtiger_crmentity.crmid 
		left join vtiger_contactaddress ON vtiger_contactaddress.contactaddressid= vtiger_crmentity.crmid 
		where vtiger_contactdetails.email=? and vtiger_contactdetails.password=?";
	

	$lead_data = $adb->pquery($lead_data, array($email,$password));
	$lead_data=$adb->fetch_array($lead_data);
	
	$lead_data["mt4account"]=array();
	if(!empty($lead_data))
	{
		
		if($login!="")
		{
		
			//$sql_data="select * from vtiger_mt4account where loginid=?";
			
			$sql_data="select vtiger_mt4account.* from vtiger_mt4account
			left join vtiger_crmentityrel ON vtiger_crmentityrel.relcrmid= vtiger_mt4account.mt4accountid
			where vtiger_mt4account.loginid=? and vtiger_crmentityrel.crmid=?";
			
			$sql_data=$adb->pquery($sql_data, array($login,$lead_data["crmid"]));
			$sql_data=$adb->fetch_array($sql_data);
			
			if(!empty($sql_data))
			{
				$lead_data["user_auth"]=1;
				$lead_data["mt4account"]=$sql_data;
			}
			else
			{
				$lead_data["user_auth"]=0;
			}

		}
		else
		{
			$lead_data["user_auth"]=1;
		}

		
		
	}
	else
	{
		$lead_data["user_auth"]=0;
	}
	return json_encode($lead_data);
	 
}
function reopen($login, $ticket, $mode)
{

	global $deposit_socket, $_site_config, $_exe_array, $log;
	
	$log->info("reopen");

	$mode=strtolower($mode);
	
	/******start******/
	/*
	$q = DR . DS . 'dep' . DS . 'dep.exe "' . $deposit_socket[$mode] . ':443" "' . $deposit_socket["ra"] . '" "' . $deposit_socket["rp"] . '" "' . $login . '" "' . -$withdraw . '" "' . $comment . '"';
	*/	
	/******end******/
	
	$a=exec_exe(DR.DS.'dep'.DS.'editdeleteorder1.exe "ORDEREDIT"  "'.$deposit_socket[$mode].':443" "'.$deposit_socket['rp'].'" "'.$deposit_socket['ra'].'" "O" "'.$ticket.'" "'.$login.'" "" "" "" "" "" ');

	$log->info($ticket." - DEAL REOPEN STARTED");
	
	$log->info($a." - DEAL REOPEN STARTED");
	
	//$a=exec($query,$n);
	if (!(strpos($a,'ALL DONE') === false))
	{
		//$message="It take some time to reopen this deal";
        $log->info($ticket." - DEAL REOPEN SUCESSFULLY");
		
		$res="SUCESSFULLY";
		
	}
	else
	{
		
		//$message="Error in Reopened DEAL";
        $log->info($ticket." - ERROR IN REOPEN DEAL");
		
		$res="ERROR";
		
	}
	
	return $res;
}


function mysqli_qr($sql)
{
	

	global $deposit_socket, $_site_config, $_exe_array, $log,$sql_manager;
	
	
	$mdb = new PearDatabase();
	
	$mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	

	
	$groups = $mdb->pquery($sql);
	
	$ret=array();
	  if($groups)
	   {

			while ($row = $mdb->fetch_array($groups))
			{
				array_push($ret,$row);

			}
			$groups->close();
		   
	   }
	   else
	   {
		   return false;
	   }
	 
	 $log->info("profit_cal ".json_encode($ret)); 
	  return $ret;	
	
}


function profit_calculation($login,$ticket,$amount,$mode)
{
	//echo "profit_calculation.............".json_encode(array($login,$ticket,$amount,$mode));
	//exit();
	

	global $deposit_socket, $_site_config, $_exe_array, $log, $sql_manager;
	$mode=strtolower($mode);
	
	
	$log->info("profit_calculation..");
	
	
		$sql="SELECT mt4_users.CURRENCY,mt4_trades.SYMBOL,mt4_trades.TICKET,mt4_users.LOGIN,mt4_trades.PROFIT,mt4_trades.SL,mt4_trades.TP,mt4_trades.VOLUME,mt4_trades.CLOSE_TIME,mt4_trades.OPEN_PRICE,mt4_trades.CLOSE_PRICE,mt4_trades.CMD FROM mt4_users LEFT JOIN mt4_trades ON mt4_users.LOGIN=mt4_trades.LOGIN WHERE mt4_users.LOGIN='".$login."' AND mt4_trades.TICKET='".$ticket."'";
		
		
	
		
		$mdb = new PearDatabase();
	
	    $mdb->connect1($sql_manager[$_site_config['sql']]['live'][0],$sql_manager[$_site_config['sql']]['live'][1],$sql_manager[$_site_config['sql']]['live'][2],$sql_manager[$_site_config['sql']]['live'][3]);
	
	
	
	    $result = $mdb->query($sql);
		$order_main_list=array();
		if($result)
		{
			$log->info("profit_calculation got data..");
			 while ($row = $result->fetch_array(MYSQLI_ASSOC))
			 {
				$order_main_list[]=$row;
			 }
			// $result->close();
			 $mdb->next_result();
		}
		else
		{
			$log->info("profit_calculation connection fail.");
			echo 'database connection failed';
			exit();
		}
		//$mdb->close();
		
	
		
	$filename=($_site_config['sql']=='explorefx')?'live_server_new.json':'live_server_old.json';
	
	$log->info("profit_calculation filename..".$filename);
			
			
			//$order_main_list=mysqli_qr($sql);
			if(empty($order_main_list))die("error");
			$order_main_list=array_shift($order_main_list);
			
			
			$server_currency=$order_main_list['CURRENCY'];
			$server_symbol=$order_main_list['SYMBOL'];
			
			$g_msg=file_get_contents("http://multiterminal.nsuite.in/mt4_json/".$filename);	
			$json_arr=json_decode($g_msg,true);
		
			$margin=array("Forex","CFD","Futures","CFD-Index","CFD-Leverage");
			$profit=array("Forex","CFD","Futures");
			
			$log->info("profit_calculation before foreach ..".$filename);
			
			foreach($json_arr['spreads'] as $spreads)
			{
				$log->info("profit_calculation in calculation.");
				foreach($spreads['sym'] as $s)
				{
					
					if($s[0]==$server_symbol)
					{
						$t=explode(",",$s[4]);
						
						foreach($t as $k=>$tt)
						{
							
							if($k==0)
							{
								$currency=$tt;						
							}
							if($k==1)
							{
								$contract_size=$tt;						
							}
							if($k==9)
							{
								$profit_calc=$profit[$tt];
							}
							if($k==5)
							{
								$ticksize=$tt;
							}
							if($k==6)
							{
								$tickprice=$tt;
							}
						}
					}
					
				}
			}

			//$amount=$_POST['amount'];
			
			$lot=($order_main_list['VOLUME']/100);
			
			if($profit_calc=='Forex')
			{
				if($order_main_list['CMD']==0)//Buy order
				{
					$op=$order_main_list['CLOSE_PRICE']-($amount/($contract_size*$lot));
				}
				elseif($order_main_list['CMD']==1)//Sell order
				{
					$op=($amount/($contract_size*$lot))+$order_main_list['CLOSE_PRICE'];
				}
			}
			elseif($profit_calc=='CFD')
			{
				if($order_main_list['CMD']==0)//Buy order
				{
					$op=$order_main_list['CLOSE_PRICE']-($amount/($contract_size*$lot));
				}
				elseif($order_main_list['CMD']==1)//Sell order
				{
					$op=($amount/($contract_size*$lot))+$order_main_list['CLOSE_PRICE'];
				}
			}
			elseif($profit_calc=='Futures')
			{
				if($order_main_list['CMD']==0)//Buy order
				{
					$op=$order_main_list['CLOSE_PRICE']-(($amount*$ticksize)/($tickprice*$lot));
				}
				elseif($order_main_list['CMD']==1)//Sell order
				{
					$op=(($amount*$ticksize)/($tickprice*$lot))+$order_main_list['CLOSE_PRICE'];
				}
			}
			//echo $amount.'---'.$lot.'---'.$contract_size.'---'.$order_main_list['CLOSE_PRICE'];exit;
$log->info("profit_calculation calling exe....");

		$query=DR.DS.'dep'.DS.'editdeleteorder.exe "ORDEREDIT" "'.$deposit_socket[$real].':443" "'.$deposit_socket['rp'].'" "'.$deposit_socket['ra'].'" "E" "'.$ticket.'" "'.$login.'" "'.$op.'" "'.$order_main_list['CLOSE_PRICE'].'" "'.$order_main_list['PROFIT'].'" "'.$order_main_list['SL'].'" "'.$order_main_list['TP'].'"';
		
		
		$a=exec($query,$n);
		$log->info("resp exe.....".$a);
		if($n[2]=='ALL DONE')
		{
			
			$message="Profit caluculation success in this deal";
			
		}
		else{
		
			$message="Profit caluculation not done try after some time";
		}
		$log->info($ticket." - ".$messge);
		
		
}
