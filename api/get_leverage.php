<?php
ini_set("include_path", "../");
	
	
require_once('udf.php');
require_once('include/utils/utils.php');
global $log,$sql_manager,$adb,$_site_config;



$leverage=get_leverage();

echo json_encode($leverage);


?>