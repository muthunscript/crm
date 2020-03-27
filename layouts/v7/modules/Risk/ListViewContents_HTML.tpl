{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}
{* modules/Vtiger/views/List.php *}

{* START YOUR IMPLEMENTATION FROM BELOW. Use {debug} for information *}
{include file="PicklistColorMap.tpl"|vtemplate_path:$MODULE}
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




Highcharts.chart('container ', {
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
	
  </script>
</div>

