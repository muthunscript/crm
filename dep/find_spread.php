<?php

function findspread($login,$pass)
{
	if(is_file('userspread/'.$login.'.json')&&filesize('userspread/'.$login.'.json')>0)
	{
		$js=file_get_contents('userspread/'.$login.'.json');
	}
	else
	{
		$js=exec('spread.exe "SPREAD|-|'.$login.'|-|'.$pass.'|-|0|-|0|-|0|-|0|-|0|-|" "173.234.164.170:443" "m6U4aCdc" "110" ');
		$js = preg_replace('/\s\s+/', '', $js);
		$js = str_replace('"":{"sym" : [],},','',$js);
		$js = str_replace('},}','}}',$js);
		$js = str_replace('], ]',']]',$js);
		$js = str_replace('],}',']}',$js);
		$js=$js.'}';
		$js = utf8_decode($js);
		$js = iconv("UTF-8", "ASCII//TRANSLIT", $js);
		$file=fopen('userspread/'.$login.'.json',"w+");
		fwrite($file,$js);
		fclose($file);
	}
	return $js;
}
function findorders($login,$pass,$from,$to)
{
	$js=exec('history.exe "0+0+'.$login.'+'.$pass.'+2+'.$from.'+'.$to.'," "173.234.164.170:443" "m6U4aCdc" "110" ');
	$js = preg_replace('/\s\s+/', '', $js);
	$js = str_replace('"":{"sym" : [],},','',$js);
	$js = str_replace('},}','}}',$js);
	$js = str_replace('], ]',']]',$js);
	$js = str_replace('],}',']}',$js);
	$js='['.$js.']';
	$js = utf8_decode($js);
	$js = iconv("UTF-8", "ASCII//TRANSLIT", $js);
	return $js;
}
function userlogin($login,$pass)
{
	$js=exec('login.exe "LOGIN|-|'.$login.'|-|'.$pass.'|-|" "173.234.164.170:443" "m6U4aCdc" "110" ');
	$js = preg_replace('/\s\s+/', '', $js);
	$js = str_replace('"":{"sym" : [],},','',$js);
	$js = str_replace('},}','}}',$js);
	$js = str_replace('], ]',']]',$js);
	$js = str_replace('],}',']}',$js);
	$js='['.$js.']';
	$js = utf8_decode($js);
	$js = iconv("UTF-8", "ASCII//TRANSLIT", $js);
	return $js;
}
//echo findspread('1000222','admin123');
//echo findorders('1000222','admin123','1462937202','1594494128');
?>