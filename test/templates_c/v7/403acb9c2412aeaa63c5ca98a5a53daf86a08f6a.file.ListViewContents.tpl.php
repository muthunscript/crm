<?php /* Smarty version Smarty-3.1.7, created on 2020-03-16 11:23:15
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\risk\ListViewContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:172555e58c10a2a8f07-68367126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '403acb9c2412aeaa63c5ca98a5a53daf86a08f6a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\risk\\ListViewContents.tpl',
      1 => 1584337990,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172555e58c10a2a8f07-68367126',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e58c10a3e799',
  'variables' => 
  array (
    'MODULE' => 0,
    'LOWRISK' => 0,
    'MEDIUMRISK' => 0,
    'HIGHRISK' => 0,
    'OPENORDER' => 0,
    'i' => 0,
    'balance' => 0,
    'HIGHRISKMIN' => 0,
    'HIGHRISKMAX' => 0,
    'MEDIUMRISKMIN' => 0,
    'MEDIUMRISKMAX' => 0,
    'LOWRISKMIN' => 0,
    'LOWRISKMAX' => 0,
    'inc' => 0,
    'to' => 0,
    'open_orders_count' => 0,
    'j' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e58c10a3e799')) {function content_5e58c10a3e799($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include 'C:\\xampp\\htdocs\\vtigercrm\\libraries\\Smarty\\libs\\plugins\\function.counter.php';
?>



<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("PicklistColorMap.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>







<div class="settings"><a data-toggle="modal" data-target="#myModal"><i class="fa fa-cog" aria-hidden="true"></i> Settings </a></div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Settings</h4>
      </div>
      <div class="modal-body">
      
		<div class="mx_val"><label> MAX </label> <input type="text" name="max_value" value="8000" id="max_value"> </div>
	
        <p>
		  <label for="amount">Price range:</label>
		  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
		</p>
		 
		<div id="slider-range"></div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div class="">
<input type="hidden" id="lowrisk1" value="<?php echo $_smarty_tpl->tpl_vars['LOWRISK']->value;?>
" >
<input type="hidden" id="mediumrisk1" value="<?php echo $_smarty_tpl->tpl_vars['MEDIUMRISK']->value;?>
" >
<input type="hidden" id="highrisk1" value="<?php echo $_smarty_tpl->tpl_vars['HIGHRISK']->value;?>
">
</div>





<?php echo smarty_function_counter(array('assign'=>'inc','start'=>0,'print'=>false),$_smarty_tpl);?>

<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['OPENORDER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?>

<?php $_smarty_tpl->tpl_vars["balance"] = new Smarty_variable($_smarty_tpl->tpl_vars['i']->value["profit"], null, 0);?>
<?php ob_start();?><?php echo count($_smarty_tpl->tpl_vars['i']->value["open_orders"]);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["open_orders_count"] = new Smarty_variable($_tmp1, null, 0);?>





<div class="acc_risk">
<div class="account-row" id="accrow<?php echo $_smarty_tpl->tpl_vars['i']->value["login"];?>
">
<div class="accounts-box">

<?php if ($_smarty_tpl->tpl_vars['balance']->value>=$_smarty_tpl->tpl_vars['HIGHRISKMIN']->value&&$_smarty_tpl->tpl_vars['balance']->value<=$_smarty_tpl->tpl_vars['HIGHRISKMAX']->value){?>
    <div class="risk high_risk"><img src="images/1.png"></div>
<?php }elseif($_smarty_tpl->tpl_vars['balance']->value>=$_smarty_tpl->tpl_vars['MEDIUMRISKMIN']->value&&$_smarty_tpl->tpl_vars['balance']->value<=$_smarty_tpl->tpl_vars['MEDIUMRISKMAX']->value){?>
    <div class="risk medium_risk"><img src="images/2.png"></div>
<?php }elseif($_smarty_tpl->tpl_vars['balance']->value>=$_smarty_tpl->tpl_vars['LOWRISKMIN']->value&&$_smarty_tpl->tpl_vars['balance']->value<=$_smarty_tpl->tpl_vars['LOWRISKMAX']->value){?>
    <div class="risk medium_risk"><img src="images/3.png"></div>
<?php }?>

<!--<div class="risk medium_risk"></div>-->
<div class="intelligence-box-in ac-tbl">
<table>
<tbody>



<tr><th colspan="3">ID <?php echo $_smarty_tpl->tpl_vars['i']->value["login"];?>
</th></tr>
<tr><td>Bal</td><td> : </td><td><?php echo $_smarty_tpl->tpl_vars['i']->value["balance"];?>
</td></tr>  
<tr><td>Margin</td><td> : </td><td><?php echo $_smarty_tpl->tpl_vars['i']->value["margin"];?>
</td></tr>
<tr><td>Floating</td><td> : </td><td><?php echo $_smarty_tpl->tpl_vars['i']->value["profit"];?>
</td></tr>
</tbody>
</table>
<div class="user-icon" style="background:url(images/user.png) center center no-repeat #1b2a37;"><i class="vicon-contacts"></i></div>
</div>
</div>
<div class="accounts-box1">
<div class="intelligence-box-in">
  <div id="container<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
" style="height:198px;"></div>


</div></div><div class="accounts-box2"><table><thead><tr><th>Order ID</th><th>Symbol</th><th>Volume</th><th>Profit</th></tr></thead><tbody>

<?php $_smarty_tpl->tpl_vars['j'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['j']->step = 1;$_smarty_tpl->tpl_vars['j']->total = (int)min(ceil(($_smarty_tpl->tpl_vars['j']->step > 0 ? $_smarty_tpl->tpl_vars['to']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['to']->value)+1)/abs($_smarty_tpl->tpl_vars['j']->step)),$_smarty_tpl->tpl_vars['open_orders_count']->value);
if ($_smarty_tpl->tpl_vars['j']->total > 0){
for ($_smarty_tpl->tpl_vars['j']->value = 0, $_smarty_tpl->tpl_vars['j']->iteration = 1;$_smarty_tpl->tpl_vars['j']->iteration <= $_smarty_tpl->tpl_vars['j']->total;$_smarty_tpl->tpl_vars['j']->value += $_smarty_tpl->tpl_vars['j']->step, $_smarty_tpl->tpl_vars['j']->iteration++){
$_smarty_tpl->tpl_vars['j']->first = $_smarty_tpl->tpl_vars['j']->iteration == 1;$_smarty_tpl->tpl_vars['j']->last = $_smarty_tpl->tpl_vars['j']->iteration == $_smarty_tpl->tpl_vars['j']->total;?>



   <tr>
   <td>#<?php echo $_smarty_tpl->tpl_vars['i']->value["open_orders"][$_smarty_tpl->tpl_vars['j']->value]['ticket'];?>
</td>
   <td><?php echo $_smarty_tpl->tpl_vars['i']->value["open_orders"][$_smarty_tpl->tpl_vars['j']->value]['symbol'];?>
</td>
   <td><?php echo $_smarty_tpl->tpl_vars['i']->value["open_orders"][$_smarty_tpl->tpl_vars['j']->value]['volume'];?>
</td>
   <td><?php echo $_smarty_tpl->tpl_vars['i']->value["open_orders"][$_smarty_tpl->tpl_vars['j']->value]['profit_user'];?>
</td>
   </tr>
    
<?php }} ?>

<!--
<tr><td># 1235999</td><td>AUDJPY</td><td>10</td><td>161.85</td></tr><tr><td># 1236002</td><td>NZDJPY</td><td>10</td><td>161.69</td></tr><tr><td># 1232678</td><td>EURGBP</td><td>10</td><td>156.63</td></tr><tr><td># 1235961</td><td>USDCHF</td><td>10</td><td>103.42</td></tr><tr><td># 1235963</td><td>USDCAD</td><td>10</td><td>91.74</td></tr><tr><td># 1236003</td><td>NZDUSD</td><td>10</td><td>73.41</td></tr><tr><td># 1236000</td><td>CHFJPY</td><td>10</td><td>28.29</td></tr>

-->

</tbody></table><div class="view-all" onclick="view_all(<?php echo $_smarty_tpl->tpl_vars['i']->value['login'];?>
)">View all</div></div></div>




<?php echo smarty_function_counter(array(),$_smarty_tpl);?>


<?php } ?>

<div class="acc_risk">
<div class="account-row" id="accrow1331790954">
<div class="accounts-box"><div class="risk medium_risk"></div>
<div class="intelligence-box-in ac-tbl">
<table>
<tbody>
<tr><th colspan="3">ID 1331790954</th></tr>
<tr><td>Bal</td><td> : </td><td>3277.13</td></tr>  
<tr><td>Margin</td><td> : </td><td>1597.6</td></tr>
<tr><td>Floating</td><td> : </td><td>777.03</td></tr>
</tbody>
</table>
<div class="user-icon" style="background:url(images/user.png) center center no-repeat #1b2a37;"><i class="vicon-contacts"></i></div>
</div>
</div>
<div class="accounts-box1">
<div class="intelligence-box-in">
  <div id="container" style="height:198px;"></div>


</div></div><div class="accounts-box2"><table><thead><tr><th>Order ID</th><th>Symbol</th><th>Volume</th><th>Profit</th></tr></thead><tbody><tr><td># 1235999</td><td>AUDJPY</td><td>10</td><td>161.85</td></tr><tr><td># 1236002</td><td>NZDJPY</td><td>10</td><td>161.69</td></tr><tr><td># 1232678</td><td>EURGBP</td><td>10</td><td>156.63</td></tr><tr><td># 1235961</td><td>USDCHF</td><td>10</td><td>103.42</td></tr><tr><td># 1235963</td><td>USDCAD</td><td>10</td><td>91.74</td></tr><tr><td># 1236003</td><td>NZDUSD</td><td>10</td><td>73.41</td></tr><tr><td># 1236000</td><td>CHFJPY</td><td>10</td><td>28.29</td></tr></tbody></table><div class="view-all" onclick="view_all(1331790954)">View all</div></div></div>

<style>
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
	.settings {
    text-align: right;
    margin-right: 25px;
}
.mx_val {
    float: right;
}
.mx_val input {
    padding: 0px 10px;
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


</div>



<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );
  
  function view_all(ticket)
{
	$('#accrow'+ticket).toggleClass('fullview');
	
}




Highcharts.chart('container', {
    chart: {
		backgroundColor: '#2c3b49',
        type: 'area'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
   
	exporting: { enabled: false },
    tooltip: {
        split: true,
        valueSuffix: ' millions'
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
		showInLegend: false,  
        data: [502, 635, 809, 947, 1402, 3634, 5268]
    }, ]
});
	


 

function view_all(ticket)
{
	$('#accrow'+ticket).toggleClass('fullview');
	
}


function chart_details(id,chdata)
{
	var ch='['+chdata.replace(/^,|,$/g,'')+']';
	//console.log(ch);
	ch=JSON.parse(ch);
	//console.log('container'+id+'---------'+ch);
	Highcharts.chart('container'+id+'', {
	  chart: {
		backgroundColor: '#282a31',
		type: 'area'
	  },
	  title:{
		text:''
	},
	 exporting: { enabled: false },
	 
	  credits: {
		enabled: false
	  },
	  series: [{
		showInLegend: false,   
		//name: 'John',
		data: ch
	  }]
	});  
}

<?php echo smarty_function_counter(array('assign'=>'inc','start'=>0,'print'=>false),$_smarty_tpl);?>

<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['OPENORDER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
chart_details(<?php echo $_smarty_tpl->tpl_vars['inc']->value;?>
,'<?php echo $_smarty_tpl->tpl_vars['i']->value["chart_data"];?>
');
<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

<?php } ?>


</script><?php }} ?>