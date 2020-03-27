<?php
include_once("man_include.php");


if(is_session($_REQUEST['id']))
{
	//echo (strlen(file_get_contents("ses".DS.$_GET['id'].".ses",FILE_USE_INCLUDE_PATH))-2);
	$group=get_groups($_REQUEST['id']);
	if($group)
	{
		$sql="SELECT * FROM mt4.mt4_users where `GROUP` in ('".implode("','",$group)."')";
		if(in_array('*',$group))
		{
			$sql="SELECT * FROM mt4.mt4_users where 1 ";
		}
		if(isset($_REQUEST['search'])&&$_REQUEST['search']!='')
		{
			$sql.=" and (`LOGIN` like '".$_REQUEST['search']."%' OR `LOGIN` like '".$_REQUEST['search']."' OR `NAME` like '".$_REQUEST['search']."%') ";
		}
		//echo $sql;
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