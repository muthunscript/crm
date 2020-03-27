<?php /* Smarty version Smarty-3.1.7, created on 2020-03-07 12:56:01
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\riskinstruments\ListViewContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:263995e58e17ec5f940-49917951%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cce94c218032f4371e9962631b17f356b1303240' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\riskinstruments\\ListViewContents.tpl',
      1 => 1583585736,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '263995e58e17ec5f940-49917951',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e58e17ed5f87',
  'variables' => 
  array (
    'MODULE' => 0,
    'OPENORDER' => 0,
    'i' => 0,
    'inc' => 0,
    'to' => 0,
    'open_orders_count' => 0,
    'j' => 0,
    'SYMARRAYS' => 0,
    'FXIDC' => 0,
    'FXNYMEX' => 0,
    'SYMARRAYSFOREXCOM' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e58e17ed5f87')) {function content_5e58e17ed5f87($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include 'C:\\xampp\\htdocs\\vtigercrm\\libraries\\Smarty\\libs\\plugins\\function.counter.php';
?>



<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("PicklistColorMap.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>



<!-----start---->
<?php echo smarty_function_counter(array('assign'=>'inc','start'=>0,'print'=>false),$_smarty_tpl);?>

<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['OPENORDER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
<?php ob_start();?><?php echo count($_smarty_tpl->tpl_vars['i']->value["open_orders"]);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["open_orders_count"] = new Smarty_variable($_tmp1, null, 0);?>
<div>
<div class="account-row" id="accrow<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
">
	<div class="accounts-box">
        <div class="intelligence-box-in">
        
        	<table>
            	<tr><th><span class="icon_coin"></span></th><th colspan="2"><?php echo $_smarty_tpl->tpl_vars['i']->value["symbol"];?>
</th></tr>
                <tr><td><span class="icon_chart"></span></td><td>NETT pl</td><td> : </td><td><?php echo $_smarty_tpl->tpl_vars['i']->value["profit"];?>
</td></tr>
                <tr><td><span class="icon_down"></span></td><td>Orders</td><td> : </td><td><?php echo $_smarty_tpl->tpl_vars['i']->value["orders"];?>
</td></tr>
            </table>
            
        </div>
    </div>
    <div class="accounts-box1">
        <div class="intelligence-box-in">

           <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
<!--              <div id="tradingview_7b64c" style="min-width: 310px; height:198px; margin: 0 auto"></div>
              <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>-->

			  <div id="container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
" style="min-width: 310px; height: 192px; margin: 0 auto"></div>
             
            </div>
            <!-- TradingView Widget END -->
        </div>
    </div>
    <div class="accounts-box2">
        <table>
        	<thead><tr><th>Order ID</th><th>Singin</th><th>Volume</th><th>Profit</th></tr></thead>
            <tbody>

			<?php $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['j']->step = 1;$_smarty_tpl->tpl_vars['j']->total = (int)min(ceil(($_smarty_tpl->tpl_vars['j']->step > 0 ? $_smarty_tpl->tpl_vars['to']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['to']->value)+1)/abs($_smarty_tpl->tpl_vars['j']->step)),$_smarty_tpl->tpl_vars['open_orders_count']->value);
if ($_smarty_tpl->tpl_vars['j']->total > 0){
for ($_smarty_tpl->tpl_vars['j']->value = 0, $_smarty_tpl->tpl_vars['j']->iteration = 1;$_smarty_tpl->tpl_vars['j']->iteration <= $_smarty_tpl->tpl_vars['j']->total;$_smarty_tpl->tpl_vars['j']->value += $_smarty_tpl->tpl_vars['j']->step, $_smarty_tpl->tpl_vars['j']->iteration++){
$_smarty_tpl->tpl_vars['j']->first = $_smarty_tpl->tpl_vars['j']->iteration == 1;$_smarty_tpl->tpl_vars['j']->last = $_smarty_tpl->tpl_vars['j']->iteration == $_smarty_tpl->tpl_vars['j']->total;?>
					
					<tr><td># <?php echo $_smarty_tpl->tpl_vars['i']->value["open_orders"][$_smarty_tpl->tpl_vars['j']->value]['ticket'];?>
</td><td>ID <?php echo $_smarty_tpl->tpl_vars['i']->value["open_orders"][$_smarty_tpl->tpl_vars['j']->value]['login_user'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['i']->value["open_orders"][$_smarty_tpl->tpl_vars['j']->value]['volume'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['i']->value["open_orders"][$_smarty_tpl->tpl_vars['j']->value]['profit_user'];?>
</td></tr>

			<?php }} ?>
            	
            </tbody>
        </table>
        <div class="view-all" onclick="view_all(<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
)">View all</div>
    </div>
    </div></div>
<?php echo smarty_function_counter(array(),$_smarty_tpl);?>


<?php } ?>
<!-----end---->

<!--<div>
<div class="account-row">
	<div class="accounts-box">
        <div class="intelligence-box-in">
        
        	<table>
            	<tr><th><span class="icon_coin"></span></th><th colspan="2">AUD/ZAR</th></tr>
                <tr><td><span class="icon_chart"></span></td><td>NETT pl</td><td> : </td><td>300035</td></tr>
                <tr><td><span class="icon_down"></span></td><td>Orders</td><td> : </td><td>300035</td></tr>
            </table>
            
        </div>
    </div>
    <div class="accounts-box1">
        <div class="intelligence-box-in">


            <div class="tradingview-widget-container">
              <div id="tradingview_7b64c" style="min-width: 310px; height:198px; margin: 0 auto"></div>
              <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"><span class="blue-text">AAPL Chart</span></a> by TradingView</div>
             
            </div>

        </div>
    </div>
    <div class="accounts-box2">
        <table>
        	<thead><tr><th>Order ID</th><th>Singin</th><th>Volume</th><th>Profit</th></tr></thead>
            <tbody>
            	<tr><td>#32165</td><td>ID 9865745</td><td>1.1</td><td>632587.48</td></tr>
                <tr><td>#32165</td><td>ID 9865745</td><td>1.1</td><td>632587.48</td></tr>
                <tr><td>#32165</td><td>ID 9865745</td><td>1.1</td><td>632587.48</td></tr>
                <tr><td>#32165</td><td>ID 9865745</td><td>1.1</td><td>632587.48</td></tr>
                <tr><td>#32165</td><td>ID 9865745</td><td>1.1</td><td>632587.48</td></tr>
            </tbody>
        </table>
        <div class="view-all" onclick="view_all()">View all</div>
    </div>
    </div></div>-->
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
	.tradingview-widget-copyright {
		font-size:0px;
		display:none;
	}
	/* Animation */
.fullview  .accounts-box2{
    width:  calc(100% - 24px)!important;
    height: 100% !important;
    float: none !important;

}


.account-row.fullview {
    display: block;
}

.account-row.fullview .accounts-box {
    width: calc(100% - 24px)!important;
    float: none;
}

.account-row.fullview .accounts-box1 {
    display: none;
}
.fullview .view-all {
    height: 25px !important;
    width: 25px !important;
    right: 0px;
    top: 0;
    transform: rotate(0deg);
    background: #32353f;
	font-size:0px;
}

.fullview .view-all a {
    color: transparent;
}

.fullview .view-all:after {
    content: "-";
    width: 24px;
    font-size: 35px;
    position: absolute;
    left: 0px;
    z-index: 999;
    top: 0px;
    transform: rotate(0deg);
}

.fullview .intelligence-box-in {
    display: table-cell;
    vertical-align: middle;
    position: relative;
    width: 550px;
    text-align: left;
    float: left;
    margin-top: 50px;
}
</style>



 <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script type="text/javascript">
/*  
function view_all()
{
	$('.account-row').toggleClass('fullview');
	
}
*/
function view_all(ticket)
{
	$('#accrow'+ticket).toggleClass('fullview');
	
}
/*
  new TradingView.widget(
  {
  "autosize": true,
  "symbol": "NASDAQ:AAPL",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "dark",
  "style": "1",
  "locale": "in",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "hide_top_toolbar": true,
  "hide_legend": true,
  "save_image": false,
  "container_id": "tradingview_7b64c"
}
  );
*/
<?php echo smarty_function_counter(array('assign'=>'inc','start'=>0,'print'=>false),$_smarty_tpl);?>

<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['OPENORDER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?>

var symarrays=["GBPJPY","EURCHF","AUDUSD","GBPUSD","USDJPY","USDJPY.D","EURSEK","USDCHF","EURCAD","USDCAD","EURUSD.D","EURGBP","GBPNZD","EURUSD","NZDUSD","AUDNZD","AUDCAD","AUDCHF","AUDJPY","CHFJPY","EURAUD","EURJPY","EURNZD","GBPCHF","GBPAUD","GBPCAD","CADCHF","CADJPY","NZDJPY","EURTRY","NZDCAD","NZDCHF","USDHKD","USDMXN","USDNOK","USDSEK","USDTRY","EURNOK","USDCNH","USDZAR","ESP35","BRENT"];
 var symarraysFOREXCOM=["BTCUSD","USDDKK","USDSGD","USDRUB","EURCZK","EURDKK","EURHKD","EURHUF","EURMXN","EURPLN","EURSGD","EURZAR","GBPDKK","GBPNOK","GBPSGD","GBPPLN","GBPSEK","GBPZAR","USDCZK","USDPLN","EURRUB","NOKSEK","XAGUSD","GOLDEURO","SILVER"];
 
 var  symarray_fxidc=["GBPTRY","USDHUF","NZDSGD","PLATINUM","XPDUSD","XPTUSD","SILVEREURO","PALLADIUM","WTI"];
 
 var symarray_fxnymex=["NAT.GAS"];

 var symbol='<?php echo $_smarty_tpl->tpl_vars['i']->value["symbol"];?>
';



		//if(inArray(symbol, symarrays))	
		//{
			<?php if (in_array($_smarty_tpl->tpl_vars['i']->value["symbol"],$_smarty_tpl->tpl_vars['SYMARRAYS']->value)){?>
			
					
					new TradingView.widget(
					  {
					  "autosize": true,
					  "symbol": "FX:"+symbol.substr(0,6),
					  "interval": "D",
					  "timezone": "Etc/UTC",
					  "theme": "Dark",
					  "style": "1",
					  "locale": "in",
					  "toolbar_bg": "#f1f3f6",
					  "enable_publishing": false,
					  "hide_top_toolbar": true,
					  "hide_legend": true,
					  "save_image": false,
					  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
					}
					  );
		//}
		
		//else if(inArray(symbol, symarray_fxidc))	
		//{
			<?php }elseif(in_array($_smarty_tpl->tpl_vars['i']->value["symbol"],$_smarty_tpl->tpl_vars['FXIDC']->value)){?>
					
					 new TradingView.widget(
					  {
					  "autosize": true,
					  "symbol": "FX_IDC:"+symbol.substr(0,6),
					  "interval": "D",
					  "timezone": "Etc/UTC",
					  "theme": "Dark",
					  "style": "1",
					  "locale": "in",
					  "toolbar_bg": "#f1f3f6",
					  "enable_publishing": false,
					  "hide_top_toolbar": true,
					  "hide_legend": true,
					  "save_image": false,
					  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
					}
						);
		//}
		//else if(inArray(symbol, symarray_fxnymex))	
		//{
		<?php }elseif(in_array($_smarty_tpl->tpl_vars['i']->value["symbol"],$_smarty_tpl->tpl_vars['FXNYMEX']->value)){?> 		 				
					
					new TradingView.widget(
					  {
					  "autosize": true,
					  "symbol": "NYMEX:"+symbol.substr(0,6),
					  "interval": "D",
					  "timezone": "Etc/UTC",
					  "theme": "Dark",
					  "style": "1",
					  "locale": "in",
					  "toolbar_bg": "#f1f3f6",
					  "enable_publishing": false,
					  "hide_top_toolbar": true,
					  "hide_legend": true,
					  "save_image": false,
					  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
					}
					  );
		//}
		// else if(inArray(symbol, symarraysFOREXCOM))
		//{
		<?php }elseif(in_array($_smarty_tpl->tpl_vars['i']->value["symbol"],$_smarty_tpl->tpl_vars['SYMARRAYSFOREXCOM']->value)){?> 		 			
			
			new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "FOREXCOM:"+symbol.substr(0,6),
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );
		 //}
		// else if(symbol=="Italy40.m")
		// {
				 
		<?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="Italy40.m"){?> 		 		
			
			new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "FOREXCOM:ITA40",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );
			//}
	    // else if(symbol=="#Boeing")
		// {
		 
		<?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="#Boeing"){?> 		 	
			new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "NYSE:BA",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );
		//}
	  // else if(symbol=="GOLD")
	  // {
			 
		<?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="GOLD"){?> 		 
		
			new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "TVC:GOLD",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );
		// }
	   //  else if(symbol=="#USNDAQ100")
		// {
						 
		<?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="#USNDAQ100"){?> 
					
			 new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "NASDAQ:NDX",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );


		<?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="Amazon"){?> 
					
			 new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "NASDAQ:AMZN",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );
		<?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="EURUSD.m"){?> 
					
			 new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "FX:EURUSD",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );
		<?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="EURNOK.m"){?> 
					
			 new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "FX:EURNOK",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );

		<?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="BTCEUR.m"||$_smarty_tpl->tpl_vars['i']->value["symbol"]=="BTCEUR"){?> 
					
			 new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "FOREXCOM:BTCEUR",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );

			  <?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="US30.m"){?> 
					
			 new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "CURRENCYCOM:US30",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );

			   <?php }elseif($_smarty_tpl->tpl_vars['i']->value["symbol"]=="BTCUSD.m"||$_smarty_tpl->tpl_vars['i']->value["symbol"]=="BTCUSD"){?> 
					
			 new TradingView.widget(
			  {
			  "autosize": true,
			  "symbol": "FOREXCOM:BTCUSD",
			  "interval": "D",
			  "timezone": "Etc/UTC",
			  "theme": "Dark",
			  "style": "1",
			  "locale": "in",
			  "toolbar_bg": "#f1f3f6",
			  "enable_publishing": false,
			  "hide_top_toolbar": true,
			  "hide_legend": true,
			  "save_image": false,
			  "container_id": "container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
"
			}
			  );

		  //}
		// else
		// {
		<?php }else{ ?>
			 $("#container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
").html("<div class='errorhtml'>Error loading Charts</div>");
		// }
		 <?php }?>
<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

<?php } ?>
  </script>
</div>
<?php }} ?>