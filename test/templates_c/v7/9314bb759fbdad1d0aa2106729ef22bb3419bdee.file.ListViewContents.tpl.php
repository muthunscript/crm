<?php /* Smarty version Smarty-3.1.7, created on 2020-04-17 20:19:56
         compiled from "C:\xampp\htdocs\crm\includes\runtime/../../layouts/v7\modules\riskintelligence\ListViewContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19022652665e99c2147e5948-79466708%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9314bb759fbdad1d0aa2106729ef22bb3419bdee' => 
    array (
      0 => 'C:\\xampp\\htdocs\\crm\\includes\\runtime/../../layouts/v7\\modules\\riskintelligence\\ListViewContents.tpl',
      1 => 1587119364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19022652665e99c2147e5948-79466708',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'OPENORDER' => 0,
    'openorder' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e99c2148338f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e99c2148338f')) {function content_5e99c2148338f($_smarty_tpl) {?>



<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("PicklistColorMap.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['OPENORDER']->value;?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["openorder"] = new Smarty_variable($_tmp1, null, 0);?>


<div id="all_sym_det">

</div>
<style>
.accounts-box th {
    padding: 0px;
}
span.app-icon-list {
    font-size: 16px;
}
.intelligence-box {
    width: calc(20% - 24px);
    background: #2c3b49;
    max-width: 290px;
	min-width:220px;
    display: table;
    height: 135px;
    margin: 12px;
    float: left;
	-webkit-box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
	-moz-box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
	box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
	-webkit-transition: 5s ease-in-out; 
    transition: 5s ease-in-out;
}

.intelligence-box-in {
    display: table-cell;
    vertical-align: middle;
    position: relative;
}

.intel_status {
    color: #fff;
    padding: 5px;
    width: 24px;
    position: absolute;
    top: 0;
    height: 100%;
    /* line-height: 4; */
}

.intel_status {
    background: #e93535;
}
.intel_status.up {
    background: #d46f32;
}
.intelligence-box.down .intel_status {
    background: #e93535 !important;
}
.intelligence-box.up .intel_status {
    background: #d46f32 !important;
}


.intel_status i {
    line-height: 130px;
}
.intelligence-box-in ul {
    margin: 0px auto;
    list-style: none;
    color: #ababad;
    display: table;
}

.intelligence-box-in ul li:first-child {
    font-size: 18px;
	font-weight: 500;
	padding-bottom:5px;
}

.intelligence-box-in ul li {
    line-height: 1.5;
    font-size: 14px;
    
}
.intelligence-box-in span
{
	background:url(../images/icons.png) no-repeat;
	width:20px;
	height:20px;
	margin-right:10px;
	background-position:0px 0px;
	float:left;	
}
span.icon_coin {
    background-position: 1px 3px;
    height: 25px;
}
span.icon_buy
{
	background-position:0px -31px;
}
span.fa fa-arrow-up
{
	background-position:0px -55px;
}
span.fa-arrow-down
{
	background-position:0px -76px;
}
/**.intelligence-box.down span.fa fa-arrow-up
{
	background-position:0px -76px !important;
}
.intelligence-box.up span.fa-arrow-down
{
	background-position:0px -55px !important;
} **/
span.icon_chart
{
	background-position:0px -103px;
}
.accounts-box {
    width: calc(24% - 24px);
    background: #2c3b49;
   
    min-width: 220px;
    display: table;
    height: 198px;
    margin: 12px;
    float: left;
    -webkit-box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    -moz-box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    -webkit-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
	position:relative;
}
.accounts-box1 {
    width: calc(38% - 24px);
    background: #2c3b49;
    display: table;
    height: 198px;
    margin: 12px;
    float: left;
    -webkit-box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    -moz-box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    -webkit-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
	position:relative;
}
.accounts-box2 {
    width: calc(38% - 24px);
    background: #2c3b49;
    display: block;
    height: 198px;
    margin: 12px;
    float: left;
    -webkit-box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    -moz-box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    box-shadow: 5px 5px 7px 0px rgba(15,15,15,1);
    -webkit-transition: 0.5s ease-in-out;
    transition: 0.5s ease-in-out;
	position:relative;
	min-height: 198px;
	overflow:hidden;
}
.accounts-box2 table {
    width: 100%;
	min-height: 198px;

}
.accounts-box2 table th{
    color: #ababad;
    font-weight: 400;
    font-size: 14px;
    padding: 10px 5px;
	text-align:center;
}

.accounts-box2 table th:last-child, .accounts-box2 table td:last-child {
    border-right: none;
	padding-right:30px;
}
.accounts-box2 table th {
    border-bottom: 1px solid #31333a;
    border-right: 1px solid #31333a;
}

.accounts-box2 table td
{
	    border-right: 1px solid #31333a;

    color: #ababad;
    font-weight: 400;
    font-size: 14px;
    padding: 6px 5px;
	text-align:center;
}
.view-all {
    position: absolute;
    top: 86px;
    right: -85px;
    height: 25px;
    transform: rotate(270deg);
    background: #1b2a37;
    font-size: 14px;

    line-height: 25px;
    width: 197px;
    text-align: center;
	color:#adaeb0;
	cursor:pointer;
	 -webkit-transition: .5s ease-in-out;
    transition: .5s ease-in-out;
}
.view-all a{
	color:#adaeb0;
}
.account-row {
    padding: 5px 10px 10px;

    display: flex;

	transition:0.3s ease-in-out;
}
.intelligence-box-in table {
    color: #ababad;
    margin: 0px auto;
}

.intelligence-box-in table td {
    font-size: 14px;
	line-height:1.5;
}
.intelligence-box-in table th
{
	padding-bottom:6px;
	text-align:left;
}
.risk {
    position: absolute;
    top: 5px;
    left: 0px;
}
.intelligence-box-in.ac-tbl table {
    color: #ababad;
	margin:0px;
    float: right;
    width: 46%;
    margin-right: 30px;
}
.user-icon {
    width: 80px;
    height: 80px;
    background: #1b2a37;
    border-radius: 50%;
    -webkit-box-shadow: 2px 2px 7px 0px rgba(15,15,15,1);
    -moz-box-shadow: 2px 2px 7px 0px rgba(15,15,15,1);
    box-shadow: 2px 2px 7px 0px rgba(15,15,15,1);
    float: right;
    margin-right: 20px;
    margin-top: 10px;
    text-align: center;
    line-height: 100px;
    color: #aab0b6;
    display: table-cell;
}
.user-icon i {
    font-size: 40px;
}
.account-row:last-child {
    border: none;
}

.risk img {
    display: none;
}

.risk.medium_risk::after {
	content: 'Low Risk';
	background: #edd471;
	font-size: 12px;
	font-weight: 600;
	color: #1b2a37;
	padding: 5px 15px;}
</style>
</div>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

//console.log("kkkkkkkkkkk");

//var arr = <?php echo $_smarty_tpl->tpl_vars['openorder']->value;?>
; 
var json1 = '<?php echo $_smarty_tpl->tpl_vars['openorder']->value;?>
';
console.log(json1);
var json = JSON.parse(json1);
			
var arr = [];
var sym=[];
for(var event in json){
	sym.push(event);
    var dataCopy = json[event];   
    arr.push(dataCopy);	
}
console.log(arr);
var hdata='';

for(var i=0;i<sym.length;i++)
{
	if(arr[i]['msg']=='StrongBuy' || arr[i]['msg']=='Buy')
	{ 
		var ordr_msg='Buy orders';
		var icon='icon_up';
		var msg_ic='Market will go up';
	}
	else if(arr[i]['msg']=='StrongSell' || arr[i]['msg']=='Sell')
	{
		var ordr_msg='Sell orders';
		var icon='icon_down';
		var msg_ic='Market will go down';
	}
	if(arr[i]['order']!=0)
	{
	hdata+='<div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="icon_coin"></span> '+sym[i]+'</li><li><span class="icon_buy"></span> '+arr[i]['order']+' '+ordr_msg+'</li><li><span class="'+icon+'"></span> '+msg_ic+'</li></ul></div></div>';
	}
}	
$('#all_sym_det').html(hdata);

</script><?php }} ?>