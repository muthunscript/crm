<?php
include_once("man_include.php");
$k =exec('spreadedit.exe "'.$_REQUEST['cmd'].'"  "'.$mt4_array['mt4'].':443" "'.$mt4_array['pass'].'" "'.$mt4_array['user'].'"  ',$n);
//echo 'spreadmini.exe "SPREAD|-|'.$_REQUEST['cmd'].'|-|"  "20.0.0.9:443" "Arthur@123" "15"  ';
//echo 'man.exe "MANDETAILS" "'.$_REQUEST['ipport'].'" "'.$_REQUEST['pwd'].'" "'.$_REQUEST['id'].'" ';
//print_r($n);
//var_dump(strpos($k,'{'));
$k=substr($k,strpos($k,'{'));
echo str_replace("},}","}}",str_replace("],}","]}",$k));

// "S|demoforex|0|12|1000|100|10|101" "20.0.0.9:443" "Arthur@123" "15" 
// "S|demoforex|id|spread_diff|lot_max|lot_min|lot_step|101"
// "G|demoforex|margin_call|margin_stopout|margin_type"
//echo  $k;

?>