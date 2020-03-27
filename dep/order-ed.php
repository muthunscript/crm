<?php
include_once("man_include.php");


if(is_session($_REQUEST['id']))
{
	//echo (strlen(file_get_contents("ses".DS.$_GET['id'].".ses",FILE_USE_INCLUDE_PATH))-2);
	//$query='dep.exe "'.$mt4_array['mt4'].':443" "'.$mt4_array['user'].'" "'.$mt4_array['pass'].'" "'.$_REQUEST['login'].'" "'.$_REQUEST['amount'].'" "'.substr($_REQUEST['comment'],-30).'"';
	//$query='useredit.exe "USEREDIT"  "'.$mt4_array['mt4'].':443" "'.$mt4_array['pass'].'" "'.$mt4_array['user'].'" "E" "'.$_REQUEST['login'].'" "'.$_REQUEST['name'].'" "'.$_REQUEST['leverage'].'" "'.$_REQUEST['group'].'" "'.$_REQUEST['enable'].'"';
	if($_REQUEST['type']=="E")
	{
		$query='editdeleteorder.exe "ORDEREDIT"  "'.$mt4_array['mt4'].':443" "'.$mt4_array['pass'].'" "'.$mt4_array['user'].'" "'.$_REQUEST['type'].'" "'.$_REQUEST['oid'].'" "'.$_REQUEST['login'].'" "'.$_REQUEST['op'].'" "'.$_REQUEST['cp'].'" "'.$_REQUEST['pr'].'" "'.$_REQUEST['sl'].'"  "'.$_REQUEST['tp'].'"';
	}
	else
	{
		$query='editdeleteorder.exe "ORDEREDIT"  "'.$mt4_array['mt4'].':443" "'.$mt4_array['pass'].'" "'.$mt4_array['user'].'" "'.$_REQUEST['type'].'" "'.$_REQUEST['oid'].'" "'.$_REQUEST['login'].'" "" "" "" "" "" ';
	}
	//echo $query;
	//exit();
	$a=exec($query,$n);
	if(strpos($login1,'DONE EDITING')!==false)
	{
		//echo '{"status":true,"data":"sucess"}';
		echo '{"status":false,"data":"'.$a.'"}';
	}
	else
	{
		//echo '{"status":false,"data":'.$a.'}';
		echo '{"status":true,"data":"sucess"}';
	}
}
else
{
	echo '{"status":false,"data":"Session Expired"}';
}

?>