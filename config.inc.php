<?php
/*********************************************************************************
 * The contents of this file are subject to the SugarCRM Public License Version 1.1.2
 * ("License"); You may not use this file except in compliance with the 
 * License. You may obtain a copy of the License at http://www.sugarcrm.com/SPL
 * Software distributed under the License is distributed on an  "AS IS"  basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for
 * the specific language governing rights and limitations under the License.
 * The Original Code is:  SugarCRM Open Source
 * The Initial Developer of the Original Code is SugarCRM, Inc.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.;
 * All Rights Reserved.
 * Contributor(s): ______________________________________.
********************************************************************************/

// Adjust error_reporting favourable to deployment.
version_compare(PHP_VERSION, '5.5.0') <= 0 ? error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED & E_ERROR) : error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED  & E_ERROR & ~E_STRICT); // PRODUCTION
//ini_set('display_errors','on'); version_compare(PHP_VERSION, '5.5.0') <= 0 ? error_reporting(E_WARNING & ~E_NOTICE & ~E_DEPRECATED) : error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);   // DEBUGGING
//ini_set('display_errors','on'); error_reporting(E_ALL); // STRICT DEVELOPMENT


include('vtigerversion.php');

// more than 8MB memory needed for graphics
// memory limit default value = 64M
ini_set('memory_limit','512M');

// show or hide calendar, world clock, calculator, chat and CKEditor 
// Do NOT remove the quotes if you set these to false! 
$CALENDAR_DISPLAY = 'true';
$USE_RTE = 'true';

// helpdesk support email id and support name (Example: 'support@vtiger.com' and 'vtiger support')
$HELPDESK_SUPPORT_EMAIL_ID = 'lavanya@nscript.in';
$HELPDESK_SUPPORT_NAME = 'your-support name';
$HELPDESK_SUPPORT_EMAIL_REPLY_ID = $HELPDESK_SUPPORT_EMAIL_ID;

/* database configuration
      db_server
      db_port
      db_hostname
      db_username
      db_password
      db_name
*/

$dbconfig['db_server'] = 'localhost';
$dbconfig['db_port'] = ':3306';
$dbconfig['db_username'] = 'root';
$dbconfig['db_password'] = 'nscript$';
$dbconfig['db_name'] = 'vtigercrm';
$dbconfig['db_type'] = 'mysqli';
$dbconfig['db_status'] = 'true';

// TODO: test if port is empty
// TODO: set db_hostname dependending on db_type
$dbconfig['db_hostname'] = $dbconfig['db_server'].$dbconfig['db_port'];

// log_sql default value = false
$dbconfig['log_sql'] = false;

// persistent default value = true
$dbconfigoption['persistent'] = true;

// autofree default value = false
$dbconfigoption['autofree'] = false;

// debug default value = 0
$dbconfigoption['debug'] = 0;

// seqname_format default value = '%s_seq'
$dbconfigoption['seqname_format'] = '%s_seq';

// portability default value = 0
$dbconfigoption['portability'] = 0;

// ssl default value = false
$dbconfigoption['ssl'] = false;

$host_name = $dbconfig['db_hostname'];

$site_URL = 'http://nscript/vtigercrm/';

// url for customer portal (Example: http://vtiger.com/portal)
$PORTAL_URL = $site_URL.'/customerportal';
// root directory path
$root_directory = 'C:\xampp\htdocs\vtigercrm';
$root_directory1 = 'C:/xampp/htdocs/vtigercrm/';

// cache direcory path
$cache_dir = 'cache/';

// tmp_dir default value prepended by cache_dir = images/
$tmp_dir = 'cache/images/';

// import_dir default value prepended by cache_dir = import/
$import_dir = 'cache/import/';

// upload_dir default value prepended by cache_dir = upload/
$upload_dir = 'cache/upload/';

// maximum file size for uploaded files in bytes also used when uploading import files
// upload_maxsize default value = 3000000
$upload_maxsize = 3145728;//3MB

// flag to allow export functionality
// 'all' to allow anyone to use exports 
// 'admin' to only allow admins to export 
// 'none' to block exports completely 
// allow_exports default value = all
$allow_exports = 'all';

// files with one of these extensions will have '.txt' appended to their filename on upload
// upload_badext default value = php, php3, php4, php5, pl, cgi, py, asp, cfm, js, vbs, html, htm
$upload_badext = array('php', 'php3', 'php4', 'php5', 'pl', 'cgi', 'py', 'asp', 'cfm', 'js', 'vbs', 'html', 'htm', 'exe', 'bin', 'bat', 'sh', 'dll', 'phps', 'phtml', 'xhtml', 'rb', 'msi', 'jsp', 'shtml', 'sth', 'shtm');

// list_max_entries_per_page default value = 20
$list_max_entries_per_page = '20';

// history_max_viewed default value = 5
$history_max_viewed = '5';

// default_module default value = Home
$default_module = 'Home';

// default_action default value = index
$default_action = 'index';

// set default theme
// default_theme default value = blue
$default_theme = 'softed';

// default text that is placed initially in the login form for user name
// no default_user_name default value
$default_user_name = '';

// default text that is placed initially in the login form for password
// no default_password default value
$default_password = '';

// create user with default username and password
// create_default_user default value = false
$create_default_user = false;

//Master currency name
$currency_name = 'USA, Dollars';

// default charset
// default charset default value = 'UTF-8' or 'ISO-8859-1'
$default_charset = 'ISO-8859-1';

// default language
// default_language default value = en_us
$default_language = 'en_us';

//Option to hide empty home blocks if no entries.
$display_empty_home_blocks = false;

//Disable Stat Tracking of vtiger CRM instance
$disable_stats_tracking = false;

// Generating Unique Application Key
$application_unique_key = 'b859855f3500299a6b1404f3d90e4cf8';

// trim descriptions, titles in listviews to this value
$listview_max_textlength = 40;

// Maximum time limit for PHP script execution (in seconds)
$php_max_execution_time = 0;

// Set the default timezone as per your preference
$default_timezone = 'asia/calcutta';//UTC

/** If timezone is configured, try to set it */
if(isset($default_timezone) && function_exists('date_default_timezone_set')) {
	@date_default_timezone_set($default_timezone);
}

//Set the default layout 
$default_layout = 'v7';




include_once 'config.security.php';

/** for mt4 **/

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
$ex=explode('\\',getcwd());
	defined('DR') ? null : define('DR',str_replace('/','\\',$_SERVER['DOCUMENT_ROOT']).DS.$ex[3].DS);

//include_once 'mt4phpapi_temp.php';
include_once 'udf.php';

//184.95.62.122
//23.81.66.123
$site="vtigercrm";
$tr_array=array("vtigercrm");

$_exe_array=array("vtigercrm"=>array("live"=>array("23.81.66.123:443","abcd1234","100"),"demo"=>array("23.81.66.123:443","abcd1234","100")));

$sql_manager=array("vtigercrm"=>array("live"=>array("23.81.66.123:3306","usern","password","mt4"),"demo"=>array("23.81.66.123:3306","usern","password","mt4")));

/*
$_exe_array=array("vtigercrm"=>array("live"=>array("184.95.62.122:443","m6U4aCdc","110"),"demo"=>array("184.95.62.122:443","m6U4aCdc","110")));

$sql_manager=array("vtigercrm"=>array("live"=>array("184.95.62.122:3306","usern","password","mt4"),"demo"=>array("184.95.62.122:3306","usern","password","mt4")));
*/

$explore_serv_array=array("vtigercrm");
$updemo_array=array("vtigercrm");

/*site*/
	$_site_config=array(
							"sitename"=>"vtigercrm",
							"brandname"=>"vtigercrm",
							"domainname"=>"vtigercrm",
							"legalname"=>"vtigercrm Limited",
							"folder"=>"vtigercrm",
							"site"=>"vtigercrm",
							"webterminalno"=>"110",
							"svg"=>"tradeu2.svg",
							"adminemail"=>array("ganesh@nscript.in","fundingwhitelabel@gmail.com"),
							"lang"=>array("en"=>"us"),
							"mainlang"=>"en",
							"verification"=>true,
							
							"accountgraph"=>true,
							"admin_deposit_withdraw"=>true,
							"nadmin_userpopup"=>true,
							
							"admin_report"=>true,
                            "dashboard_affiliate_report"=>true,
                            "admin_user_trade_report"=>true,
                            "deal_log"=>true,
							"user_login_log"=>true,
                            "admin_dashboard_graph"=>true,
							
							"aff_report"=>true,

							"admin_lte"=>true,
							"noreplyemail"=>"noreply",
							"accountgraph"=>true,
							"maildomain"=>"easycrypto.com",
							"smtphost"=>"box5065.bluehost.com",
							"smtpsecure"=>"ssl",
							"exe"=>"vtigercrm",
							"sql"=>"vtigercrm",
							"smtpport"=>465,
                            "smtpsecure1"=>true,
							"noreplypassword"=>'!:R-"#49c+mo',
							"paymentgateway"=>array(/*"empay"=>3,*//*,'ecore'=>4*/),
							"empay"=>false,
							"empaycompany"=>"master",
							"ipayments"=>false,
							"ipaycompany"=>"master4x",							
							"ipay_mode"=>"live",
							"neteller"=>false,
							"skrill"=>false,
							"skrill_email"=>"XXXX",
							"ecore"=>false,
							"ecore_mode"=>"LIVE",
							
							"ecore_config"=>array("TEST"=>array("USD"=>array("51174023","csbwdNFxxjhdkkCH"),"EUR"=>array("51174023","csbwdNFxxjhdkkCH")),"LIVE"=>array("USD"=>array("46561821","TlkdmpSqHOzUCmJu"),"EUR"=>array("91023479","iWRMibWAZPsUpQmW"))),
							
							"nadmin_userpopup"=>true,
							
							"ssl"=>true,
							"www"=>false,
							"mt4_series"=>true,
							"ipay_config"=>array(
											"test"=>array(
															"url"=>"https://test.oppwa.com/v1/checkouts",
															"js_url"=>"https://test.oppwa.com/",
															"user_id"=>"8a8294185e5c61f5015e6f23c47e2208",
															"password"=>"PDcKFT758p",
															"entity_id"=>"8a8294185e5c61f5015e6f2e7956220e"
															),
											"live"=>array(
															"url"=>"https://oppwa.com/v1/checkouts",
															"js_url"=>"https://oppwa.com/",
															"user_id"=>"8acda4cc5eb84172015ebc6a131028be",
															"password"=>"Qwj6y5YBpS",
															"entity_id"=>"8acda4cc5eb84172015ebc6a650528c2"
															)
												),
							
							"mt4"=>array("desktop"=>array("status"=>true,"url"=>"https://download.mql5.com/cdn/web/9383/mt4/4xbrands4setup.exe","branded"=>true),"webterminal"=>array("status"=>true,"url"=>"http://demo.easyfxsolutions.com/webterminal"),"andriod"=>array("status"=>true,"url"=>""),"ios"=>array("status"=>true,"url"=>"")),
							"mt4_live"=>"108.170.12.26",
							"mt4_demo"=>"108.170.12.26",
							"site_url"=>"https://demo.easyfxsolutions.com",
							"logfolder"=>"easyfxsolutions"
						);
						
						
						$deposit_socket=array("status"=>true,"live"=>"23.81.66.123","ra"=>"100","rp"=>"abcd1234","live_port"=>"1111","demo"=>"23.81.66.123","da"=>"100","dp"=>"abcd1234","demo_port"=>"1111");
			
			$account_socket=array("status"=>true,"real"=>"108.170.12.26","live_port"=>"443","demo"=>"108.170.12.26","demo_port"=>"443");
	$_web_terminal_link=$_site_config['mt4']['webterminal']['url'];
	//Company Info
	$_site_name=$_site_config['sitename'];
	$_brand_name = $_site_config['brandname'];
	$_domain_name = $_site_config['domainname'];
	$_legal_name= $_site_config['legalname'];
	$_mt4_link = $_site_config['mt4']['desktop']['url'];
	
	
	/*  Header Backgrund & text Colors */
	$_header_main_color = "#000000";
	//echo $_header_main_color;
	$_header_second_color = "#f9d16c";
	$_header_button_color = "#f9d16c";
	$_header_text_color = "#fff";
	
	/*  Footer Backgrund Colors */
	$_footer_main_color = "#1e1e1e";
	$_footer_second_color = "#29292c";
	$_footer_third_color = "#101010";
	$_footer_fourth_color = "#edf0f2";
	
	/*  Footer text Colors */
	$_footer_nav_text_color = "#a9a9a9";
	$_footer_text_color = "#a9a9a9";
	
	
	/*  Inner sections Backgrund & text Colors */
	$_white_color = "#fff";
	$_block_color = "#000";
	$_red_color = "red";
	$_green_color = "green";
	
	/*button-color*/
	$_common_button_color="#000";
	
	
	$_main_color = "#000";
	$_second_color = "#000";
	$_dark_color = "#43a0d9";
	$_lightdark_color = "#43a0d9";
	$_bright_color = "#43a0d9";

	$_mt4download_link=$_mt4_link;
	$_mt4download_multi_link="";
	$_mt4download_android_link="";
	$_mt4download_iphone_link="";
	$_mt4download_mac_link="";
	


	

?>
