<?php
include_once("man_include.php");


if(is_session($_REQUEST['id']))
{
	//echo (strlen(file_get_contents("ses".DS.$_GET['id'].".ses",FILE_USE_INCLUDE_PATH))-2);
	$group=get_groups($_REQUEST['id']);
	if($group)
	{
		$sql="SELECT * FROM mt4.mt4_trades where `LOGIN` in ('".$_REQUEST['login']."')";
		if(isset($_REQUEST['from'])&&$_REQUEST['from']!='')
		{
			$sql.=" and OPEN_TIME between '".$_REQUEST['from']."' and '".$_REQUEST['to']."'  ";
		}
		$users=mt4_users::find_by_sql($sql,true);
		echo '{"status":true,"data":'.json_encode($users).'}';
	}
	else
	{
		echo '{"status":false,"data":"Session Expired"}';
	}
}
else
{
	echo '{"status":false,"data":"Session Expired"}';
}

?>