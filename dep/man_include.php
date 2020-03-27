<?php require_once('../includes/functions-api.php');
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
$mt4_array=array(
					"easyfx"=>array("mt4"=>"108.170.12.26","user"=>"110","pass"=>"m6U4aCdc"),
				);
$mt4_array=	array("mt4"=>"108.170.12.26","user"=>"110","pass"=>"m6U4aCdc");			
function isJson($string)
{
	json_decode($string);
	return (json_last_error() == JSON_ERROR_NONE);
}

function create_session($id,$data)
{
	$file=fopen("ses".DS.$id.".ses","w+");
	fwrite($file, $data);
	fclose($file);
}
function is_session($id)
{
	$status=false;
	if(file_exists("ses".DS.$id.".ses"))
	{
		if((time()-filemtime("ses".DS.$id.".ses"))>=7200)
		{
			unlink("ses".DS.$id.".ses");
		}
		else
		{
			$status=true;
		}
	}
	return $status;
}
function destroy_session($id)
{
	$status=false;
	if(file_exists("ses".DS.$id.".ses"))
	{
		if((time()-filemtime("ses".DS.$id.".ses"))>=7200)
		{
			unlink("ses".DS.$id.".ses");
		}
		else
		{
			$status=true;
		}
	}
	return $status;
}
function get_groups($id)
{
	error_reporting(E_ALL);
	$status=false;
	///echo "ses".DS.$id.".ses";
	if(file_exists("ses".DS.$id.".ses"))
	{
		//echo $id;
		//print_r(file("ses".DS.$id.".ses"));
		$status=explode(",",substr(file_get_contents("ses".DS.$id.".ses"),1,(strlen(file_get_contents("ses".DS.$id.".ses"))-2)));
	}
	return $status;
}

?>