<?php
include_once("man_include.php");


if(is_session($_REQUEST['id']))
{
	//echo (strlen(file_get_contents("ses".DS.$_GET['id'].".ses",FILE_USE_INCLUDE_PATH))-2);
	$group=get_groups($_REQUEST['id']);
	if($group)
	{
		
		if(in_array('*',$group))
		{
			$sql="select mt4_trades.* from mt4_trades join mt4_users on mt4_trades.LOGIN=mt4_users.LOGIN where 1 ";
		}
		else
		{
			$sql="select mt4_trades.* from mt4_trades join mt4_users on mt4_trades.LOGIN=mt4_users.LOGIN where mt4_users.`GROUP` in ('".implode("','",$group)."')";
		}
		$sql.=" and mt4_trades.CMD=6 order by mt4_trades.TICKET DESC limit 50 ";

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