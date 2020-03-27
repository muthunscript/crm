<?php

//spread
//exec('ManagerAPITrade.exe "SPREAD|-|2096566070|-|0|-|admin123|-|0|-|0|-|0|-|0|-|" "20.0.0.9:443" "Arthur@123" "15" ',$n);
//echo str_replace(array("], ]","],}","},}"),array("]]","]}","}}"),$n[1]);
$js=exec('login.exe "LOGIN|-|1000222|-|admin1234|-|" "173.234.164.170:443" "m6U4aCdc" "110" ');
/*$js = preg_replace('/\s\s+/', '', $js);
$js = str_replace('"":{"sym" : [],},','',$js);
$js = str_replace('},}','}}',$js);
$js = str_replace('], ]',']]',$js);
$js = str_replace('],}',']}',$js);
$js=$js.'}';
$js = utf8_decode($js);
$js = iconv("UTF-8", "ASCII//TRANSLIT", $js);*/
//$file=fopen("json.txt","w+");
//fwrite($file,$js);
//fclose($file);
echo $js;
/*if(substr($a, 0, 3) == pack("CCC", 0xEF, 0xBB, 0xBF)) {
  //$a = substr($a, 3);
}
$a = preg_replace('/[\x00-\x08\x10\x0B\x0C\x0E-\x19\x7F]'.
 '|[\x00-\x7F][\x80-\xBF]+'.
 '|([\xC0\xC1]|[\xF0-\xFF])[\x80-\xBF]*'.
 '|[\xC2-\xDF]((?![\x80-\xBF])|[\x80-\xBF]{2,})'.
 '|[\xE0-\xEF](([\x80-\xBF](?![\x80-\xBF]))|(?![\x80-\xBF]{2})|[\x80-\xBF]{3,})/S',
 '?', $a );
 
//reject overly long 3 byte sequences and UTF-16 surrogates and replace with ?
$a = preg_replace('/\xE0[\x80-\x9F][\x80-\xBF]'.
 '|\xED[\xA0-\xBF][\x80-\xBF]/S','?', $a );
$d=json_decode($a);

var_dump(json_last_error());*/
?>