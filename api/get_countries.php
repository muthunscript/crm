<?php

	ini_set("include_path", "../");
	
	
	require_once('udf.php');
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	//$log->info("create user".json_encode($_REQUEST));
	
	
	$response=get_countries();

echo json_encode($response);

?>