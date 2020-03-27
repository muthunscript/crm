<?php
include_once("man_include.php");
$k =exec('spreadmini.exe "SPREAD|-|'.$_REQUEST['group'].'|-|"  "'.$mt4_array['mt4'].':443" "'.$mt4_array['pass'].'" "'.$mt4_array['user'].'"  ',$n);
//echo 'man.exe "MANDETAILS" "'.$_REQUEST['ipport'].'" "'.$_REQUEST['pwd'].'" "'.$_REQUEST['id'].'" ';
echo str_replace("},}","}}",str_replace("],}","]}",$k))."}";


//echo  $k;

?>