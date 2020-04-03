<?php
session_start();
//echo json_encode($_REQUEST);
//exit();

$myfile = fopen("crm_setting.json", "w") or die("Unable to open file!");
$offers=0;
$withdraw=0;
$deposit=0;
if($_REQUEST["offers"]==1)
{
	$offers=1;
}
if($_REQUEST["withdraw"]==1)
{
	$withdraw=1;
}
if($_REQUEST["deposit"]==1)
{
	$deposit=1;
}
$arr=json_encode(array("offers"=>$offers,"withdraw"=>$withdraw,"deposit"=>$deposit));
fwrite($myfile, $arr);
fclose($myfile);

$_SESSION["message"]="Settings Updated Successfully.";

header("Location:".urldecode($_REQUEST["current_url"]));


?>