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

function withdraw($login, $withdraw, $mode)
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


function deposit($login, $deposit, $mode)
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

	 $groups = $adb->pquery("select vtiger_crmentityrel.*,vtiger_contactdetails.*,vtiger_mt4account.*,vtiger_crmentity.*,vtiger_users.first_name as user_fn,vtiger_users.last_name as user_ln,vtiger_contactsubdetails.leadsource as leadsource    
from vtiger_crmentityrel 
left join vtiger_contactdetails ON vtiger_contactdetails.contactid= vtiger_crmentityrel.crmid 
left join vtiger_mt4account ON vtiger_mt4account.mt4accountid= vtiger_crmentityrel.relcrmid 
left join vtiger_crmentity ON vtiger_crmentity.crmid= vtiger_crmentityrel.crmid 
left join vtiger_users ON vtiger_users.id= vtiger_crmentity.smownerid 
left join vtiger_contactsubdetails ON vtiger_contactsubdetails.	contactsubscriptionid= vtiger_crmentityrel.crmid 
where vtiger_crmentityrel.module='Contacts' and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.crmid!=0 and vtiger_crmentityrel.relcrmid!=0 and vtiger_mt4account.loginid!='' and vtiger_mt4account.loginid!=0");
	 
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
