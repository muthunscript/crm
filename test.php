<?php

include_once 'config.inc.php';
global $adb;


$mt4_users=mt4_users('1331776584');
echo json_encode($mt4_users);
exit();

$security='{"crypto":[{"I":"0","S":"ForexMajours"},{"I":"1","S":"FX"},{"I":"5","S":"Crypto Ext"},{"I":"25","S":"cryptonew"},{"I":"29","S":"crypton"}],"demoforext2-eur":[{"I":"0","S":"ForexMajours"},{"I":"1","S":"FX"},{"I":"2","S":"Forex Ext"},{"I":"5","S":"Crypto Ext"},{"I":"6","S":"Gold"},{"I":"7","S":"Gold gr"},{"I":"9","S":"Silver"},{"I":"10","S":"Energy Spot"},{"I":"11","S":"Energy Spot 1"},{"I":"12","S":"Futures"},{"I":"13","S":"Energy Futures"},{"I":"14","S":"US Shares"},{"I":"15","S":"UK Shares"},{"I":"16","S":"French Shares"},{"I":"17","S":"German Shares"},{"I":"19","S":"Shares"},{"I":"20","S":"Forex Ext1"},{"I":"21","S":"Forex Ext2"},{"I":"22","S":"Forex Ext3"},{"I":"23","S":"Spot Indices"},{"I":"24","S":"Spot indices 1"},{"I":"25","S":"cryptonew"},{"I":"29","S":"crypton"},{"I":"30","S":"Crypto"}],"test":[{"I":"0","S":"ForexMajours"},{"I":"1","S":"FX"},{"I":"2","S":"Forex Ext"},{"I":"12","S":"Futures"},{"I":"13","S":"Energy Futures"},{"I":"14","S":"US Shares"},{"I":"15","S":"UK Shares"},{"I":"16","S":"French Shares"},{"I":"17","S":"German Shares"},{"I":"20","S":"Forex Ext1"},{"I":"21","S":"Forex Ext2"},{"I":"22","S":"Forex Ext3"},{"I":"23","S":"Spot Indices"},{"I":"24","S":"Spot indices 1"}]}';

$security=json_decode($security,true);

$security_array=array();
foreach($security as $k => $v)
{
	foreach($v as $k1 => $v1)
	{
		$security_array[]=$v1;
	}
	
}

$security_array = array_map("unserialize", array_unique(array_map("serialize", $security_array)));

//echo print_r($security);
//echo print_r($security_array);

echo json_encode($security_array);

exit();

//echo $adb->getUniqueID('vtiger_contactdetails');
//exit();

$challenge_token="5e7b211bdd1a3";
$accessKey="cwcPyNHnNVuNDf49";
$token=$challenge_token.$accessKey;
echo md5($token);
exit();

$vtiger_mt4account="SELECT vtiger_crmentityrel.* FROM `vtiger_mt4account` left join vtiger_crmentityrel ON vtiger_crmentityrel.relcrmid=vtiger_mt4account.mt4accountid where vtiger_mt4account.loginid=1331776548 and vtiger_crmentityrel.relmodule='mt4account' and vtiger_crmentityrel.module='Contacts'";
$vtiger_mt4account=$adb->pquery($vtiger_mt4account);
$vtiger_mt4account=$adb->fetch_array($vtiger_mt4account);
echo $vtiger_mt4account["crmid"];

exit();

$filename='crm_setting.php';
$str = file_get_contents($filename);
$json = json_decode($str,true);
exit();

/*$date = date("d-m-Y");
$curr_date=explode("-",$date);
echo mktime(0,0,0,$curr_date[1],$curr_date[0],$curr_date[2]);*/

//error_reporting(E_ALL);

$deposit="select * from `vtiger_deposit` where loginid=329 and status=1 limit 1";
$deposit=$adb->pquery($deposit);
$deposit_rows=$adb->num_rows($deposit);
echo var_dump($deposit_rows);
exit();

$credit=credit("1331776130","100","live");
echo var_dump($credit);
exit();

$SecretKey="6A9EBC4983C84C578AFD8BE747B93AAE";
$AgentCode="12297B64-C4E2-4ADF-B395-9EC06462CD22";
$UserRef="178";

echo MD5($AgentCode.$UserRef.$SecretKey);


exit();

echo mktime(0,0,0,date('m'),date('d'),date('Y'));
exit();

echo $now = strtotime("-5 minutes");
exit();

$today     = new DateTime(); // today
$begin     = $today->sub(new DateInterval('P30D')); //created 30 days interval back
$end       = new DateTime();
$end       = $end->modify('+1 day'); // interval generates upto last day
$interval  = new DateInterval('P1D'); // 1d interval range
$daterange = new DatePeriod($begin, $interval, $end); // it always runs forwards in date
foreach ($daterange as $date) { // date object
    $d[] = $date->format("Y-m-d"); // your date
}
print_r($d);
exit();



$mysqli_qr=mysqli_qr();
var_dump($mysqli_qr);
exit();


$users=array("operation"=>"create","sessionName"=>"3fcf5e5e22168368d","element"=>array("salutation"=>"Ms.","firstname"=>"Revanth","lastname"=>"s","email"=>"lavanya+10000@nscript.in","phone"=>"9890987876","mobile"=>"8989878900","assigned_user_id"=>1),"elementType"=>array("contact"));

echo json_encode($users);
exit();



$token="5e5e21e597a37";
$access="cwcPyNHnNVuNDf49";
$A=$token.$access;
echo md5($A);
exit();



//SELECT *,COUNT(login) AS regsister_count FROM mt4_users GROUP BY YEAR(regdate), MONTH(regdate),DAY(regdate);

//error_reporting(E_ALL);


$res=mt4_users();
//echo json_encode($res);
exit();



$kola=json_decode('[[{"0":"259149","ticket":"259149","1":"1331776130","login":"1331776130","2":"","symbol":"","3":"6","cmd":"6","4":"1","volume":"1","5":"2020-02-03 06:05:49","open_time":"2020-02-03 06:05:49","6":"0","open_price":"0","7":"0","sl":"0","8":"0","tp":"0","9":"2020-02-03 06:05:49","close_time":"2020-02-03 06:05:49","10":"0","close_price":"0","11":"20","profit":"20","12":"ok","comment":"ok"}],[{"0":"259150","ticket":"259150","1":"1331776130","login":"1331776130","2":"","symbol":"","3":"6","cmd":"6","4":"1","volume":"1","5":"2020-02-03 06:06:33","open_time":"2020-02-03 06:06:33","6":"0","open_price":"0","7":"0","sl":"0","8":"0","tp":"0","9":"2020-02-03 06:06:33","close_time":"2020-02-03 06:06:33","10":"0","close_price":"0","11":"30","profit":"30","12":"ok","comment":"ok"}],[{"0":"262832","ticket":"262832","1":"1331776130","login":"1331776130","2":"","symbol":"","3":"6","cmd":"6","4":"1","volume":"1","5":"2020-02-05 08:49:40","open_time":"2020-02-05 08:49:40","6":"0","open_price":"0","7":"0","sl":"0","8":"0","tp":"0","9":"2020-02-05 08:49:40","close_time":"2020-02-05 08:49:40","10":"0","close_price":"0","11":"-2","profit":"-2","12":"ok","comment":"ok"}],[{"0":"262833","ticket":"262833","1":"1331776130","login":"1331776130","2":"","symbol":"","3":"6","cmd":"6","4":"1","volume":"1","5":"2020-02-05 08:50:18","open_time":"2020-02-05 08:50:18","6":"0","open_price":"0","7":"0","sl":"0","8":"0","tp":"0","9":"2020-02-05 08:50:18","close_time":"2020-02-05 08:50:18","10":"0","close_price":"0","11":"-1","profit":"-1","12":"ok","comment":"ok"}]]',true);

//print_r($tet);
//$res=calculation($tet);

$open_orders = array_filter($kola,function($v){ if($v[0]["close_time"]=='1970-01-01 00:00:00' && ($v[0]["cmd"] == 0 || $v[0]["cmd"] == 1)){return TRUE; }else{return FALSE; } });
	$close_orders = array_filter($kola,function($v){ if($v[0]["close_time"]!='1970-01-01 00:00:00' && ($v[0]["cmd"] == 0 || $v[0]["cmd"] == 1)){return TRUE; }else{return FALSE; } });
	$deposit = array_filter($kola,function($v){ if($v[0]["profit"]>0 && $v[0]["cmd"] == 6 ){ return TRUE; }else{ return FALSE; } });
	$withadraw = array_filter($kola,function($v){ if($v[0]["profit"]<0 && $v[0]["cmd"] == 6 ){return TRUE; }else{return FALSE; } });
	

	echo json_encode($open_orders);
	exit();
	
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

	
	$deposit_count=0;
	$demosit_arr = Array(); $totaldep = 0;
	foreach($deposit as $deposit_t){

		array_push($demosit_arr,Array($deposit_t[0]["ticket"],$deposit_t[0]["profit"],$deposit_t[0]["comment"],$deposit_t[0]["close_time"]));
		
		$totaldep += $deposit_t[0]["profit"]; 
		$deposit_count++;
		}

		$withdraw_count=0;
	$with_arr = Array();  $totalwith = 0;
	foreach($withadraw as $withadraw_t){
		
		array_push($with_arr,Array($withadraw_t[0]["ticket"],$withadraw_t[0]["profit"],$withadraw_t[0]["comment"],$withadraw_t[0]["close_time"]));
		
		$totalwith += $withadraw_t[0]["profit"];
		$withdraw_count++;
	}

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
	
	$response=array("demosit_arr"=>$demosit_arr,"with_arr"=>$with_arr,"open_arr"=>$open_arr,"close_arr"=>$close_arr,"pnlfinal"=>$pnlfinal,"totaldep"=>$totaldep,"totalwith"=>$totalwith,"totaldep"=>$totaldep,"deposit_count"=>$deposit_count,"withdraw_count"=>$withdraw_count,"open_pl"=>$open_pl);

echo json_encode($response);

exit();


$var = '20/04/2012';
$date = str_replace('/', '-', $var);
echo strtotime($date);
exit();

$va="2020-02-06 16:20:52";
$va=explode(" ", $va);
$va=explode("-", $va[0]);
echo mktime(0,0,0,$va[1],$va[2],$va[0]);

exit();


$kola=withdraw_history();
		
			
//$response=calculation($kola);

$dates=array();

foreach($kola as $date){	
	if(!in_array($date['open_time']))
	{
			$dates[] = $date['open_time'];
	}
}




exit();
$group=groups();
echo json_encode($group);
exit();

$myfile = fopen("C:/xampp/htdocs/vtigercrm/user_privileges/testfile.txt", "w");
exit();


//$token="5dce3cfd69ca4"."cwcPyNHnNVuNDf49";
//echo md5($token);


echo json_encode(array("operation"=>"create","sessionName"=>"45175dcd4f1983bd9","element"=>array("lastname"=>"b", "assigned_user_id"=>"19x1"),"elementType"=>"Contacts"));


?>