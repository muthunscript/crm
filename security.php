<?php

session_start();
include_once 'config.inc.php';

$myfile = fopen("security.json", "w") or die("Unable to open file!");


$mode="live";

$security=security($mode);

fwrite($myfile, $security);
fclose($myfile);

$_SESSION["message"]="Security Updated Successfully.";

header("Location:".urldecode($_REQUEST["current_url"]));

?>