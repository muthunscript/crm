<?php
include_once("man_include.php");
if($_REQUEST['id']!='7'&&$_REQUEST['id']!='110')
{
	echo '{"status":false,"data":"Invalid Login"}';
	exit();
}

$k =exec('man.exe "MANDETAILS" "'.$mt4_array['mt4'].':443" "'.$_REQUEST['pwd'].'" "'.$_REQUEST['id'].'" ',$n);
//echo 'man.exe "MANDETAILS" "'.$_REQUEST['ipport'].'" "'.$_REQUEST['pwd'].'" "'.$_REQUEST['id'].'" ';
//var_dump($k);
//var_dump($n);
if(isJson($k))
{
	$arr=json_decode($k,true);
	if(trim($arr['data'])==',*,')
	{
		$data=mt4_users::find_by_sql("SELECT concat(',',group_concat(DISTINCT(`GROUP`)),',') as grp FROM mt4.mt4_users ",true);
		$arr['data']=$data[0]['grp'];
		create_session($_REQUEST['id'],$arr['data']);
		echo json_encode($arr);
	}
	else
	{
		create_session($_REQUEST['id'],$arr['data']);
		echo $k;
	}
//	echo $arr['data'];
//	exit();
}
else
{
	echo '{"status":false,"data":"Invalid Data"}';
}
//echo  $k;

?>