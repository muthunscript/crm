<?php
	
	ini_set("include_path", "../");
	require_once('include/utils/utils.php');
	global $log,$sql_manager,$adb,$_site_config;
	$where = '';
	if(isset($_POST['lastNotifyTime']) && $_POST['lastNotifyTime'] != ''){
		$where .= ' and createtime > '.$_POST['lastNotifyTime'];
	}
	$query = "
		SELECT * FROM vtiger_notification
		WHERE seen=0 ".$where."
	";
	echo $query;die;
	$result = $adb->pquery($query);
	$totalRows = $adb->num_rows($result);
	if($totalRows > 0){
		$notifications = '';
		$i = 0;
		while ($row = $adb->fetch_array($result)) {
			if($i == 0){
				$lastNotifyTime = $row['createtime'];
			}
			$notifications = '
				<div class="notification">
					<div class="details">
						<h4>'.$row['type'].'</h4>
						<p>'.$row['description'].'</p>
						<div>'.date('Y-m-d h:i A', $row['createtime']).'</div>
					</div>
					<div class="actions">
						<!-- <div><img src="circle-tick.png" /></div> -->
					</div>
				</div>';
			$i++;
		}
		echo json_encode(array('success' => true, 'totalRows' => $totalRows, 'lastNotifyTime' => $lastNotifyTime,'htmlContent' => $notifications));
	} else {
		echo json_encode(array('success' => false, 'totalRows' => $totalRows, 'lastNotifyTime' => '', 'htmlContent' => ''));
	}
?>