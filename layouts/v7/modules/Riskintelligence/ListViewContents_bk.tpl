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

<div>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
	
	{assign var=DEPOSIT_DATA value=$DEPOSIT_DATA}
	{assign var=WITHDRAW_DATA value=$WITHDRAW_DATA}
	{assign var=OPEN_DATA value=$OPEN_DATA}
	{assign var=CLOSE_DATA value=$CLOSE_DATA}
	
	{*{$DEPOSIT_DATA|print_r}*}
	
	{*{php}
	exit();
	{/php}*}
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-xs-12">
        	 	<figure class="highcharts-figure">
                    <div id="trader"></div>
                </figure>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-xs-6">
            	<div class="grd_bx">
                	<div class="grd_bx_item">
                    	<p>Balance</p>
                        <h2>0.02</h2>
                	</div>
                    <div class="grd_bx_item">
                    	<p>P/L</p>
                        <h2>-246.37</h2>
                	</div>
                    <div class="grd_bx_item">
                    	<p>Levetage</p>
                        <h2>100</h2>
                	</div>
                    <div class="grd_bx_item">
                    	<p>Total Deposite</p>
                        <h2>250</h2>
                	</div>
                </div>
            </div>
            <div class="col-sm-6 col-xs-6">
            	<div class="trader_list">
            	<ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#trader_1">Deposit</a></li>
                  <li><a data-toggle="tab" href="#trader_2">Withdraw</a></li>
                  <li><a data-toggle="tab" href="#trader_3">Open Trades</a></li>
                  <li><a data-toggle="tab" href="#trader_4">Closed Trades</a></li>
                </ul>
                
                <div class="tab-content">
                  <div id="trader_1" class="tab-pane fade in active">
                    	<table>
                        	<tr>
                            	<th>Id</th>
                                <th>Value</th>
                                <th>Comment</th>
                                <th>Time</th>
                            </tr>
                            <tr>
                            	<td>1586</td>
                                <td>3224</td>
                                <td>test</td>
                                <td>1:25 28-25-2019</td> 
                             </tr>
                             <tr>
                            	<td>1586</td>
                                <td>3224</td>
                                <td>test</td>
                                <td>1:25 28-25-2019</td> 
                             </tr>
                             <tr>
                            	<td>1586</td>
                                <td>3224</td>
                                <td>test</td>
                                <td>1:25 28-25-2019</td> 
                             </tr>
                        </table>
                  </div>
                  <div id="trader_2" class="tab-pane fade">
                    <table>
                        	<tr>
                            	<th>Id</th>
                                <th>Value</th>
                                <th>Comment</th>
                                <th>Time</th>
                            </tr>
							{foreach key=myId item=i from=$WITHDRAW_HISTORY}
							
							{*{$myId[0]|print_r}*}
							
								<tr>
									<td>{$i[0].login}</td>
									<td>3224</td>
									<td>test</td>
									<td>1:25 28-25-2019</td> 
								 </tr>
							 {/foreach}
                            
                        </table>
                  </div>
                  <div id="trader_3" class="tab-pane fade">
                    <table>
                        	<tr>
                            	<th>Id</th>
                                <th>Symbol</th>
                                <th>Open Price</th>
                                <th>Time</th>
                                <th>Profit</th>
                            </tr>
                            
                        </table>
                  </div>
                  <div id="trader_4" class="tab-pane fade">
                    <table>
                        	<tr>
                            	<th>Id</th>
                                <th>Symbol</th>
                                <th>Open Price</th>
                                <th>Time</th>
                                <th>Profit</th>
                            </tr>
                           
                        </table>
                  </div>
				</div>
                </div>
            </div>
    	</div>
        <div class="row" style="margin-top:30px;">
            <div class="col-sm-6 col-xs-6">
            	<div class="p_charts">
            		<div id="container" style="min-width: 310px; height: 380px; max-width: 100%; margin: 0 auto"></div>
               	</div>

            </div>
            <div class="col-sm-6 col-xs-6">
            	<div class="trader_list">
            	<ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#trader_11">Lots - Last 15 Days</a></li>
                  <li><a data-toggle="tab" href="#trader_12">Trades - Last 15 Days</a></li>
                </ul>
                
                <div class="tab-content">
                  <div id="trader_11" class="tab-pane fade in active">
                    	    <div id="b_chart" style="min-width: 310px; height: 350px; max-width: 100%; margin: 0 auto"></div>
                  </div>
                  <div id="trader_12" class="tab-pane fade">
                    <table>
                        	<tr>
                            	<th>Id</th>
                                <th>Value</th>
                                <th>Comment</th>
                                <th>Time</th>
                            </tr>
                            <tr>
                            	<td>1586</td>
                                <td>3224</td>
                                <td>test</td>
                                <td>1:25 28-25-2019</td> 
                             </tr>
                             <tr>
                            	<td>1586</td>
                                <td>3224</td>
                                <td>test</td>
                                <td>1:25 28-25-2019</td> 
                             </tr>
                             <tr>
                            	<td>1586</td>
                                <td>3224</td>
                                <td>test</td>
                                <td>1:25 28-25-2019</td> 
                             </tr>
                        </table>
                  </div>
                 
				</div>
                </div>
            </div>
    	</div>
	</div>  
    
   
    <script>
	Highcharts.chart('trader', {
    chart: {
        type: 'areaspline'
    },
    title: {
        text: 'Trader Insights'
    },
		exporting: {
		enabled: false
	  },
    legend: {
        enabled: false
    },
    
    yAxis: {
        title: {
            text: ''
        }
    },
    tooltip: {
        shared: false,
    },
    credits: {
        enabled: false
    },
    plotOptions: {
        areaspline: {
            fillOpacity: 0.5
        }
    },
    series: [{
        name: '',
        data: [3, 4, 3, 5, 4, 10, 12]
    }]
});
// Build the chart
Highcharts.chart('container', {
  chart: {
    plotBackgroundColor: null,
    plotBorderWidth: null,
    plotShadow: false,
    type: 'pie',
	  options3d: {
      enabled: true,
      alpha: 45,
      beta: 0
    }
  },
  title: {
    text: 'Browser market shares in January, 2018'
  },
  exporting: {
		enabled: false
	  },
  plotOptions: {
    pie: {
      allowPointSelect: true,
      cursor: 'pointer',
	  depth: 35,
      dataLabels: {
        enabled: false
      },
      showInLegend: true
    }
  },
  legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'middle',
        x: 10,
        y: 10,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
    },
  series: [{
    name: 'Brands',
    colorByPoint: true,
    data: [{
      name: 'Chrome',
      y: 61.41,
      sliced: true,
      selected: true
    }, {
      name: 'Internet Explorer',
      y: 11.84
    }, {
      name: 'Firefox',
      y: 10.85
    }, {
      name: 'Edge',
      y: 4.67
    }, {
      name: 'Safari',
      y: 4.18
    }, {
      name: 'Other',
      y: 7.05
    }]
  }]
});


Highcharts.chart('b_chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            '01/01',
            '02/01',
            '03/01',
            '04/01',
            '05/01',
            '06/01',
            '07/01',
            '08/01',
            '09/01',
            '10/01',
            '11/01',
            '12/01',
            '13/01',
            '14/01',
            '15/01'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Lots'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Days',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }]
});
	</script>
    <style>
	#trader {
    height: 400px; 
}
figure.highcharts-figure {
    border: 1px solid #2c3b49;
    padding: 10px 20px;
    margin-bottom: 30px;
}
.p_charts {
    border: 1px solid #2c3b49;
    padding: 10px;
}
.grd_bx {
    display: flex;
    height: 400px;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    /* border: 1px solid #2c3b49; */
}

.grd_bx_item {
    width: 50%;
    text-align: center;
    justify-content: center;
    align-items: center;
    height: 50%;
    display: flex;
    flex-direction: column;
    border: 1px solid #2c3b49;
}
.trader_list {
    height: 400px;
    border: 1px solid #2c3b49;
    padding: 10px 20px;
}

.trader_list table {
    width: 100%;
    border: 1px solid #2c3b49;
}

.trader_list table th {
    background: #77838e;
    color: #fff;
}

.trader_list table td {
    padding: 5px;
    border-bottom: 1px solid #ccc;
}

.trader_list li.active a {
    border-radius: 5px 5px 0px 0px;
    padding: 9px 20px;
    background: #2c3b49;
    color: #fff;
    border-bottom: 3px solid #ef5e29 !important;
}
.trader_list .nav-tabs>li.active>a, .trader_list .nav-tabs>li.active>a:hover, .trader_list .nav-tabs>li.active>a:focus
{
	background: #2c3b49;
	color:#fff;
}
.trader_list .nav-tabs {
    border-bottom: 1px solid #fff;
}
.trader_list li a {
    border-bottom: 3px solid #fff !important;
    padding: 9px 20px !important;
}
	</style>
</div>
