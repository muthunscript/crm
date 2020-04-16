<?php  
require_once('config.php');
require_once('udf.php');
require_once('include/utils/utils.php');

global $log,$sql_manager,$adb,$_site_config;
session_start();

//echo json_encode($_SESSION);
//exit();
/*
{
__HTTP_Session2_Info: 2,
AUTHUSERID: "18",
authenticated_user_id: "18",
app_unique_key: "b859855f3500299a6b1404f3d90e4cf8",
authenticated_user_language: "en_us",
KCFINDER: {
disabled: false,
uploadURL: "test/upload",
uploadDir: "../test/upload",
deniedExts: "php php3 php4 php5 pl cgi py asp cfm js vbs html htm exe bin bat sh dll phps phtml xhtml rb msi jsp shtml sth shtm"
}
}
*/

/*
{
__vtrftk: "sid:f25a40d8aa8e57638a80d2f1291b00c980cb80d2,1586608980",
current_url: "http%3A%2F%2Fnscript%2Fvtigercrm%2Findex.php%3Fmodule%3Dmt4report%26view%3DList%26app%3DSUPPORT%26voip%3D1%26users%3D1",
users: "1",
voip_username: "1305",
voip_registerpass: "1305",
voip_domainhost: "1305",
voip_registername: "Pompadur123!",
voip_dispname: "KAPITALFX.coperato.net",
voip_domainport: "5060"
}
*/

/**start**/

//echo json_encode($_REQUEST);
//echo json_encode($_POST);
//exit();

if(isset($_REQUEST["users"])&&$_REQUEST["users"]!="")
{
	
	//echo json_encode($_REQUEST);
	//echo json_encode($_POST);
	//exit();
	
	
	
	$filename='voip_'.$_REQUEST["users"].'.txt';
	
	//echo DR.DS.'voip'.DS.$_site_config['folder'].DS.$filename;
	
	//C:\xampp\htdocs\vtigercrm\\voip\vtigercrm\voip_1.txt
	
	//exit();
	
	$res=encode_voip(true,8).' '.((isset($_POST['voip_dispname'])&&$_POST['voip_dispname']!='')?encode_voip($_POST['voip_dispname'],8):encode_voip($_POST['voip_username'],8)).' '.encode_voip($_POST['voip_username'],8).' '.((isset($_POST['voip_registername'])&&$_POST['voip_registername']!='')?encode_voip($_POST['voip_registername'],8):encode_voip($_POST['voip_username'],8)).' '.encode_voip($_POST['voip_registerpass'],8).' '.encode_voip($_POST['voip_domainhost'],8).' '.((isset($_POST['voip_domainport'])&&$_POST['voip_domainport']!='')?encode_voip($_POST['voip_domainport'],8):encode_voip('5060',8));
			
	$fp = fopen(DR.DS.'voip'.DS.$_site_config['folder'].DS.$filename, 'w+');
	fwrite($fp, $res);
	fclose($fp);
}
/**end**/
/*
if(isset($_SESSION['priv'])&& $_SESSION['priv']!='')
{
	if(!in_array('voip',$_SESSION['aff_priv']))
	{
		header('location:dashboard.php');
		exit();
	}
	
}
if(isset($_SESSION['admin_type'])&&$_SESSION['admin_type']=='affiliate')
{
	$filename='voip_aff_'.$_SESSION['admin'].'.txt';
}
else{
	$filename='voip_admin_'.$_SESSION['admin'].'.txt';
}

if(isset($_POST['submit_flag']))
{
	if(isset($_site_config['voip']))
	{
		
		
		if(!in_array('edit_voip',$_POST['privilege']))
		{

			$res=encode_voip(true,8).' '.((isset($_POST['voip_dispname'])&&$_POST['voip_dispname']!='')?encode_voip($_POST['voip_dispname'],8):encode_voip($_POST['voip_username'],8)).' '.encode_voip($_POST['voip_username'],8).' '.((isset($_POST['voip_registername'])&&$_POST['voip_registername']!='')?encode_voip($_POST['voip_registername'],8):encode_voip($_POST['voip_username'],8)).' '.encode_voip($_POST['voip_registerpass'],8).' '.encode_voip($_POST['voip_domainhost'],8).' '.((isset($_POST['voip_domainport'])&&$_POST['voip_domainport']!='')?encode_voip($_POST['voip_domainport'],8):encode_voip('5060',8));
			
			$fp = fopen(DR.DS.'images'.DS.$_site_config['folder'].DS.$filename, 'w+');
			fwrite($fp, $res);
			fclose($fp);
		}
		else
		{
			if(is_file(DR.DS.'images'.DS.$_site_config['folder'].DS.$filename))
			{
			 unlink(DR.DS.'images'.DS.$_site_config['folder'].DS.$filename);
			}
		}
	}
}
*/


header("Location:index.php?module=Users&parent=Settings&view=List&block=1&fieldid=1");

?>
