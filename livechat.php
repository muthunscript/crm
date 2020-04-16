<?php  
require_once('config.php');
require_once('udf.php');
require_once('include/utils/utils.php');

global $log,$sql_manager,$adb,$_site_config;


$data=array("aff_id"=>"1","band"=>$_site_config["brandname"],"email"=>"lavanya+2001@nscript.in","first_name"=>"lavanya","last_name"=>"baskaran","password"=>"Ev3d2VE6ZwZgg3G5","affiliates"=>array());
chat($data);

?>  