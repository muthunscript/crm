<?php
include_once("man_include.php");


if(is_session($_REQUEST['id']))
{
	//echo (strlen(file_get_contents("ses".DS.$_GET['id'].".ses",FILE_USE_INCLUDE_PATH))-2);
	//$query='dep.exe "'.$mt4_array['mt4'].':443" "'.$mt4_array['user'].'" "'.$mt4_array['pass'].'" "'.$_REQUEST['login'].'" "'.$_REQUEST['amount'].'" "'.substr($_REQUEST['comment'],-30).'"';
	//$query='useredit.exe "USEREDIT"  "'.$mt4_array['mt4'].':443" "'.$mt4_array['pass'].'" "'.$mt4_array['user'].'" "E" "'.$_REQUEST['login'].'" "'.$_REQUEST['name'].'" "'.$_REQUEST['leverage'].'" "'.$_REQUEST['group'].'" "'.$_REQUEST['enable'].'"';
	$group=get_groups($_REQUEST['id']);
	if($group)
	{
		$sql="select `GROUP` from mt4_users group by `GROUP`";
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