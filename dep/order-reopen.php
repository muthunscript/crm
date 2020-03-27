<?php
include_once("man_include.php");


if(is_session($_REQUEST['id']))
{
	//exit();
	{
		$query='editdeleteorder1.exe "ORDEREDIT"  "'.$mt4_array['mt4'].':443" "'.$mt4_array['pass'].'" "'.$mt4_array['user'].'" "O" "'.$_REQUEST['oid'].'" "'.$_REQUEST['login'].'" "" "" "" "" "" ';
	}
	echo $query;
	exit();
	$a=exec($query,$n);
	if(strpos($login1,'DONE OPENING')!==false)
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