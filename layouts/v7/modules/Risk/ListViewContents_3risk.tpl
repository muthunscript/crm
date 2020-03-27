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

{assign var=RISK value=$RISK}

{if $RISK eq '1'} 
<div class="acc_risk">
<div class="account-row" id="accrow1331790954"><div class="accounts-box"><div class="risk medium_risk"></div><div class="intelligence-box-in ac-tbl"><table><tbody><tr><th colspan="3">ID 1331790954</th></tr><tr><td>Bal</td><td> : </td><td>3277.13</td></tr>  <tr><td>Margin</td><td> : </td><td>1597.6</td></tr><tr><td>Floating</td><td> : </td><td>777.03</td></tr></tbody></table><div class="user-icon" style="background:url(images/user.png) center center no-repeat #1b2a37;"><i class="vicon-contacts"></i></div></div></div><div class="accounts-box1"><div class="intelligence-box-in"><div id="container0" style="min-width: 310px; height: 192px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="0"><div id="highcharts-5f3c7m3-0" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 481px; height: 192px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="481" height="192" viewBox="0 0 481 192"><desc>Created with Highcharts 8.0.0</desc><defs><clipPath id="highcharts-5f3c7m3-1-"><rect x="0" y="0" width="403" height="146" fill="none"></rect></clipPath></defs><rect fill="#2c3b49" class="highcharts-background" x="0" y="0" width="481" height="192" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="68" y="10" width="403" height="146"></rect><g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1"><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 71.5 10 L 71.5 156" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 203.5 10 L 203.5 156" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 334.5 10 L 334.5 156" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 466.5 10 L 466.5 156" opacity="1"></path></g><g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1"><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 156.5 L 471 156.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 83.5 L 471 83.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 9.5 L 471 9.5" opacity="1"></path></g><rect fill="none" class="highcharts-plot-border" data-z-index="1" x="68" y="10" width="403" height="146"></rect><g class="highcharts-axis highcharts-xaxis" data-z-index="2"><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 71.5 156 L 71.5 166" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 203.5 156 L 203.5 166" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 334.5 156 L 334.5 166" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 466.5 156 L 466.5 166" opacity="1"></path><path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 68 156.5 L 471 156.5"></path></g><g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="24.46875" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 24.46875 83)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="83"><tspan>Values</tspan></text><path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 68 10 L 68 156"></path></g><g class="highcharts-series-group" data-z-index="3"><g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-area-series highcharts-color-0" transform="translate(68,10) scale(1 1)" clip-path="url(#highcharts-5f3c7m3-1-)"><path fill="rgba(124,181,236,0.75)" d="M 3.9509803921569 27.849500000000006 L 69.800653594771 27.966300000000004 L 135.65032679739 31.6601 L 201.5 70.5034 L 267.34967320261 79.02980000000001 L 333.19934640523 92.4107 L 399.04901960784 125.3483 L 399.04901960784 146 L 333.19934640523 146 L 267.34967320261 146 L 201.5 146 L 135.65032679739 146 L 69.800653594771 146 L 3.9509803921569 146" class="highcharts-area" data-z-index="0"></path><path fill="none" d="M 3.9509803921569 27.849500000000006 L 69.800653594771 27.966300000000004 L 135.65032679739 31.6601 L 201.5 70.5034 L 267.34967320261 79.02980000000001 L 333.19934640523 92.4107 L 399.04901960784 125.3483" class="highcharts-graph" data-z-index="1" stroke="#7cb5ec" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M -6.0490196078431 27.849500000000006 L 3.9509803921569 27.849500000000006 L 69.800653594771 27.966300000000004 L 135.65032679739 31.6601 L 201.5 70.5034 L 267.34967320261 79.02980000000001 L 333.19934640523 92.4107 L 399.04901960784 125.3483 L 409.04901960784 125.3483" visibility="visible" data-z-index="2" class="highcharts-tracker-line" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-area-series highcharts-color-0 highcharts-tracker" transform="translate(68,10) scale(1 1)"><path fill="#7cb5ec" d="M 3 27.849500000000006 A 0 0 0 1 1 3 27.849500000000006 Z" class="highcharts-halo highcharts-color-0" data-z-index="-1" fill-opacity="0.25" visibility="hidden"></path><path fill="#7cb5ec" d="M 3.0000000000000004 31.849500000000006 A 4 4 0 1 1 3.003999999333336 31.849498000000175 Z" opacity="1" class="highcharts-point highcharts-color-0" stroke-width="0.0015372805081180774"></path><path fill="#7cb5ec" d="M 69 31.966300000000004 A 4 4 0 1 1 69.00399999933333 31.966298000000172 Z" opacity="1" class="highcharts-point highcharts-color-0" stroke-width="0.0007992249455124334"></path><path fill="#7cb5ec" d="M 135 35.6601 A 4 4 0 1 1 135.00399999933333 35.66009800000017 Z" opacity="1" class="highcharts-point highcharts-color-0" stroke-width="0.011994143149269387"></path><path fill="#7cb5ec" d="M 201 74.5034 A 4 4 0 1 1 201.00399999933333 74.50339800000016 Z" opacity="1" class="highcharts-point highcharts-color-0" stroke-width="0.0038598408951564522"></path><path fill="#7cb5ec" d="M 267 83 A 4 4 0 1 1 267.00399999933336 82.99999800000016 Z" opacity="1" class="highcharts-point highcharts-color-0"></path><path fill="#7cb5ec" d="M 333 96 A 4 4 0 1 1 333.00399999933336 95.99999800000016 Z" opacity="1" class="highcharts-point highcharts-color-0"></path><path fill="#7cb5ec" d="M 399 129 A 4 4 0 1 1 399.00399999933336 128.99999800000018 Z" opacity="1" class="highcharts-point highcharts-color-0"></path></g></g><text x="241" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="241" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="189"></text><g class="highcharts-legend" data-z-index="7"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="8" height="8" visibility="hidden"></rect><g data-z-index="1"><g></g></g></g><g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="71.950980392157" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">0</text><text x="203.65032679739" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">2</text><text x="335.34967320261" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">4</text><text x="467.04901960784" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">6</text></g><g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="161" opacity="1">0</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="88" opacity="1">100</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="15" opacity="1">200</text></g><g class="highcharts-label highcharts-tooltip    highcharts-color-0" style="pointer-events:none;white-space:nowrap;" data-z-index="8" transform="translate(16,-9999)" opacity="0" visibility="visible"><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 49.5 0.5 55.5 -5.5 61.5 0.5 110 0.5 C 113.5 0.5 113.5 0.5 113.5 3.5 L 113.5 41.5 C 113.5 44.5 113.5 44.5 110.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 49.5 0.5 55.5 -5.5 61.5 0.5 110 0.5 C 113.5 0.5 113.5 0.5 113.5 3.5 L 113.5 41.5 C 113.5 44.5 113.5 44.5 110.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 49.5 0.5 55.5 -5.5 61.5 0.5 110 0.5 C 113.5 0.5 113.5 0.5 113.5 3.5 L 113.5 41.5 C 113.5 44.5 113.5 44.5 110.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 49.5 0.5 55.5 -5.5 61.5 0.5 110 0.5 C 113.5 0.5 113.5 0.5 113.5 3.5 L 113.5 41.5 C 113.5 44.5 113.5 44.5 110.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#7cb5ec" stroke-width="1"></path><text x="8" data-z-index="1" style="font-size:12px;color:#333333;cursor:default;fill:#333333;" y="20"><tspan style="font-size: 10px">0</tspan><tspan style="fill:#7cb5ec" x="8" dy="15">●</tspan><tspan dx="0"> Series 1: </tspan><tspan style="font-weight:bold" dx="0">161.85</tspan></text></g></svg></div></div></div></div><div class="accounts-box2"><table><thead><tr><th>Order ID</th><th>Symbol</th><th>Volume</th><th>Profit</th></tr></thead><tbody><tr><td># 1235999</td><td>AUDJPY</td><td>10</td><td>161.85</td></tr><tr><td># 1236002</td><td>NZDJPY</td><td>10</td><td>161.69</td></tr><tr><td># 1232678</td><td>EURGBP</td><td>10</td><td>156.63</td></tr><tr><td># 1235961</td><td>USDCHF</td><td>10</td><td>103.42</td></tr><tr><td># 1235963</td><td>USDCAD</td><td>10</td><td>91.74</td></tr><tr><td># 1236003</td><td>NZDUSD</td><td>10</td><td>73.41</td></tr><tr><td># 1236000</td><td>CHFJPY</td><td>10</td><td>28.29</td></tr></tbody></table><div class="view-all" onclick="view_all(1331790954)">View all</div></div></div>
<div class="account-row" id="accrow1331790790"><div class="accounts-box"><div class="risk medium_risk"><img src="images/3.png"></div><div class="intelligence-box-in ac-tbl"><table><tbody><tr><th colspan="3">ID 1331790790</th></tr><tr><td>Bal</td><td> : </td><td>10000.96</td></tr>  <tr><td>Margin</td><td> : </td><td>2408.2</td></tr><tr><td>Floating</td><td> : </td><td>448.63</td></tr></tbody></table><div class="user-icon" style="background:url(images/user.png) center center no-repeat #1b2a37;"><i class="vicon-contacts"></i></div></div></div><div class="accounts-box1"><div class="intelligence-box-in"><div id="container1" style="min-width: 310px; height: 192px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="1"><div id="highcharts-5f3c7m3-11" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 481px; height: 192px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="481" height="192" viewBox="0 0 481 192"><desc>Created with Highcharts 8.0.0</desc><defs><clipPath id="highcharts-5f3c7m3-12-"><rect x="0" y="0" width="403" height="146" fill="none"></rect></clipPath></defs><rect fill="#2c3b49" class="highcharts-background" x="0" y="0" width="481" height="192" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="68" y="10" width="403" height="146"></rect><g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1"><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 71.5 10 L 71.5 156" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 170.5 10 L 170.5 156" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 269.5 10 L 269.5 156" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 367.5 10 L 367.5 156" opacity="1"></path><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 466.5 10 L 466.5 156" opacity="1"></path></g><g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1"><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 156.5 L 471 156.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 83.5 L 471 83.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 9.5 L 471 9.5" opacity="1"></path></g><rect fill="none" class="highcharts-plot-border" data-z-index="1" x="68" y="10" width="403" height="146"></rect><g class="highcharts-axis highcharts-xaxis" data-z-index="2"><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 71.5 156 L 71.5 166" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 170.5 156 L 170.5 166" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 269.5 156 L 269.5 166" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 367.5 156 L 367.5 166" opacity="1"></path><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 466.5 156 L 466.5 166" opacity="1"></path><path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 68 156.5 L 471 156.5"></path></g><g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="24.46875" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 24.46875 83)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="83"><tspan>Values</tspan></text><path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 68 10 L 68 156"></path></g><g class="highcharts-series-group" data-z-index="3"><g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-area-series highcharts-color-0" transform="translate(68,10) scale(1 1)" clip-path="url(#highcharts-5f3c7m3-12-)"><path fill="rgba(124,181,236,0.75)" d="M 3.9509803921569 36.74820000000001 L 102.72549019608 74.1023 L 201.5 77.234 L 300.27450980392 91.1405 L 399.04901960784 123.27510000000001 L 399.04901960784 146 L 300.27450980392 146 L 201.5 146 L 102.72549019608 146 L 3.9509803921569 146" class="highcharts-area" data-z-index="0"></path><path fill="none" d="M 3.9509803921569 36.74820000000001 L 102.72549019608 74.1023 L 201.5 77.234 L 300.27450980392 91.1405 L 399.04901960784 123.27510000000001" class="highcharts-graph" data-z-index="1" stroke="#7cb5ec" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M -6.0490196078431 36.74820000000001 L 3.9509803921569 36.74820000000001 L 102.72549019608 74.1023 L 201.5 77.234 L 300.27450980392 91.1405 L 399.04901960784 123.27510000000001 L 409.04901960784 123.27510000000001" visibility="visible" data-z-index="2" class="highcharts-tracker-line" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-area-series highcharts-color-0 highcharts-tracker" transform="translate(68,10) scale(1 1)"><path fill="#7cb5ec" d="M 3 36.74820000000001 A 0 0 0 1 1 3 36.74820000000001 Z" class="highcharts-halo highcharts-color-0" data-z-index="-1" fill-opacity="0.25" visibility="hidden"></path><path fill="#7cb5ec" d="M 3.0000000000000004 40.74820000000001 A 4 4 0 1 1 3.003999999333336 40.74819800000018 Z" opacity="1" class="highcharts-point highcharts-color-0" stroke-width="0.0006679025937929572"></path><path fill="#7cb5ec" d="M 102 78.1023 A 4 4 0 1 1 102.00399999933333 78.10229800000016 Z" opacity="1" class="highcharts-point highcharts-color-0" stroke-width="0.001938590851878197"></path><path fill="#7cb5ec" d="M 201 81.234 A 4 4 0 1 1 201.00399999933333 81.23399800000016 Z" opacity="1" class="highcharts-point highcharts-color-0" stroke-width="0.000009101363563024378"></path><path fill="#7cb5ec" d="M 300 95 A 4 4 0 1 1 300.00399999933336 94.99999800000016 Z" opacity="1" class="highcharts-point highcharts-color-0"></path><path fill="#7cb5ec" d="M 399 127 A 4 4 0 1 1 399.00399999933336 126.99999800000016 Z" opacity="1" class="highcharts-point highcharts-color-0"></path></g></g><text x="241" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="241" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="189"></text><g class="highcharts-legend" data-z-index="7"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="8" height="8" visibility="hidden"></rect><g data-z-index="1"><g></g></g></g><g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="71.950980392157" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">0</text><text x="170.72549019608" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">1</text><text x="269.5" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">2</text><text x="368.27450980392" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">3</text><text x="467.04901960784" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">4</text></g><g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="161" opacity="1">0</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="88" opacity="1">100</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="15" opacity="1">200</text></g><g class="highcharts-label highcharts-tooltip   highcharts-color-0" style="pointer-events:none;white-space:nowrap;" data-z-index="8" transform="translate(16,-9999)" opacity="0" visibility="visible"><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 49.5 0.5 55.5 -5.5 61.5 0.5 110 0.5 C 113.5 0.5 113.5 0.5 113.5 3.5 L 113.5 41.5 C 113.5 44.5 113.5 44.5 110.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 49.5 0.5 55.5 -5.5 61.5 0.5 110 0.5 C 113.5 0.5 113.5 0.5 113.5 3.5 L 113.5 41.5 C 113.5 44.5 113.5 44.5 110.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box highcharts-shadow" d="M 3.5 0.5 L 49.5 0.5 55.5 -5.5 61.5 0.5 110 0.5 C 113.5 0.5 113.5 0.5 113.5 3.5 L 113.5 41.5 C 113.5 44.5 113.5 44.5 110.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 49.5 0.5 55.5 -5.5 61.5 0.5 110 0.5 C 113.5 0.5 113.5 0.5 113.5 3.5 L 113.5 41.5 C 113.5 44.5 113.5 44.5 110.5 44.5 L 3.5 44.5 C 0.5 44.5 0.5 44.5 0.5 41.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#7cb5ec" stroke-width="1"></path><text x="8" data-z-index="1" style="font-size:12px;color:#333333;cursor:default;fill:#333333;" y="20"><tspan style="font-size: 10px">0</tspan><tspan style="fill:#7cb5ec" x="8" dy="15">●</tspan><tspan dx="0"> Series 1: </tspan><tspan style="font-weight:bold" dx="0">149.66</tspan></text></g></svg></div></div></div></div><div class="accounts-box2"><table><thead><tr><th>Order ID</th><th>Symbol</th><th>Volume</th><th>Profit</th></tr></thead><tbody><tr><td># 1238990</td><td>EURNZD</td><td>10</td><td>149.66</td></tr><tr><td># 1238996</td><td>EURTRY</td><td>10</td><td>98.49</td></tr><tr><td># 1239003</td><td>USDMXN</td><td>10</td><td>94.2</td></tr><tr><td># 1238991</td><td>CADCHF</td><td>10</td><td>75.15</td></tr><tr><td># 1239000</td><td>USDDKK</td><td>10</td><td>31.13</td></tr></tbody></table><div class="view-all" onclick="view_all(1331790790)">View all</div></div></div>
<div class="account-row" id="accrow1331791243"><div class="accounts-box"><div class="risk medium_risk"><img src="images/3.png"></div><div class="intelligence-box-in ac-tbl"><table><tbody><tr><th colspan="3">ID 1331791243</th></tr><tr><td>Bal</td><td> : </td><td>-460.18</td></tr>  <tr><td>Margin</td><td> : </td><td>91.35</td></tr><tr><td>Floating</td><td> : </td><td>85.43</td></tr></tbody></table><div class="user-icon" style="background:url(images/user.png) center center no-repeat #1b2a37;"><i class="vicon-contacts"></i></div></div></div><div class="accounts-box1"><div class="intelligence-box-in"><div id="container3" style="min-width: 310px; height: 192px; margin: 0px auto; overflow: hidden;" data-highcharts-chart="3"><div id="highcharts-5f3c7m3-26" dir="ltr" class="highcharts-container " style="position: relative; overflow: hidden; width: 481px; height: 192px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg version="1.1" class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="481" height="192" viewBox="0 0 481 192"><desc>Created with Highcharts 8.0.0</desc><defs><clipPath id="highcharts-5f3c7m3-27-"><rect x="0" y="0" width="403" height="146" fill="none"></rect></clipPath></defs><rect fill="#2c3b49" class="highcharts-background" x="0" y="0" width="481" height="192" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="68" y="10" width="403" height="146"></rect><g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1"><path fill="none" data-z-index="1" class="highcharts-grid-line" d="M 269.5 10 L 269.5 156" opacity="1"></path></g><g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1"><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 156.5 L 471 156.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 83.5 L 471 83.5" opacity="1"></path><path fill="none" stroke="#e6e6e6" stroke-width="1" data-z-index="1" class="highcharts-grid-line" d="M 68 9.5 L 471 9.5" opacity="1"></path></g><rect fill="none" class="highcharts-plot-border" data-z-index="1" x="68" y="10" width="403" height="146"></rect><g class="highcharts-axis highcharts-xaxis" data-z-index="2"><path fill="none" class="highcharts-tick" stroke="#ccd6eb" stroke-width="1" d="M 269.5 156 L 269.5 166" opacity="1"></path><path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 68 156.5 L 471 156.5"></path></g><g class="highcharts-axis highcharts-yaxis" data-z-index="2"><text x="24.46875" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 24.46875 83)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="83"><tspan>Values</tspan></text><path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 68 10 L 68 156"></path></g><g class="highcharts-series-group" data-z-index="3"><g data-z-index="0.1" class="highcharts-series highcharts-series-0 highcharts-area-series highcharts-color-0" transform="translate(68,10) scale(1 1)" clip-path="url(#highcharts-5f3c7m3-27-)"><path fill="rgba(124,181,236,0.75)" d="M 201.5 21.272199999999998 L 201.5 146" class="highcharts-area" data-z-index="0"></path><path fill="none" d="M 201.5 21.272199999999998" class="highcharts-graph" data-z-index="1" stroke="#7cb5ec" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 191.5 21.272199999999998 L 201.5 21.272199999999998 L 211.5 21.272199999999998" visibility="visible" data-z-index="2" class="highcharts-tracker-line" stroke-linejoin="round" stroke="rgba(192,192,192,0.0001)" stroke-width="22"></path></g><g data-z-index="0.1" class="highcharts-markers highcharts-series-0 highcharts-area-series highcharts-color-0 highcharts-tracker" transform="translate(68,10) scale(1 1)"><path fill="#7cb5ec" d="M 201 25 A 4 4 0 1 1 201.00399999933333 24.99999800000017 Z" opacity="1" class="highcharts-point highcharts-color-0"></path></g></g><text x="241" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24"></text><text x="241" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="24"></text><text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="189"></text><g class="highcharts-legend" data-z-index="7"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="8" height="8" visibility="hidden"></rect><g data-z-index="1"><g></g></g></g><g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"><text x="269.5" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="middle" transform="translate(0,0)" y="175" opacity="1">0</text></g><g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="161" opacity="1">0</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="88" opacity="1">50</text><text x="53" style="color:#666666;cursor:default;font-size:11px;fill:#666666;" text-anchor="end" transform="translate(0,0)" y="15" opacity="1">100</text></g></svg></div></div></div></div><div class="accounts-box2"><table><thead><tr><th>Order ID</th><th>Symbol</th><th>Volume</th><th>Profit</th></tr></thead><tbody><tr><td># 1238463</td><td>USDJPY</td><td>10</td><td>85.43</td></tr></tbody></table><div class="view-all" onclick="view_all(1331791243)">View all</div></div></div>
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
</style>
</div>


{elseif $RISK eq '2'}

<div>
<div class="account-row" id="accrow0"><div class="accounts-box"><div class="intelligence-box-in"><table><tbody><tr><th><span class="app-icon-list fa fa-money"></span></th><th colspan="3">EURGBP</th></tr><tr><td><span class="app-icon-list fa fa-bar-chart"></span></td><td>NETT pl</td><td> : </td><td>180.2</td></tr><tr><td><span class="app-icon-list fa vicon-servicecontracts"></span></td><td>Orders</td><td> : </td><td>2</td></tr></tbody></table></div></div><div class="accounts-box1"><div class="intelligence-box-in"><div id="container0" style="min-width: 310px; height: 192px; margin: 0 auto"><div id="tradingview_63ec5-wrapper" style="position: relative;box-sizing: content-box;width: 100%;height: 100%;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;"><div style="width: 100%;height: 100%;background: transparent;padding: 0 !important;"><iframe id="tradingview_63ec5" src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_63ec5&amp;symbol=FX%3AEURGBP&amp;interval=D&amp;hidetoptoolbar=1&amp;hidelegend=1&amp;saveimage=0&amp;toolbarbg=f1f3f6&amp;studies=%5B%5D&amp;theme=Dark&amp;style=1&amp;timezone=Etc%2FUTC&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=in&amp;utm_source=crm.mistertrader.com&amp;utm_medium=widget&amp;utm_campaign=chart&amp;utm_term=FX%3AEURGBP" style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""></iframe></div></div></div></div></div><div class="accounts-box2"><table><thead><tr><th>Order ID</th><th>LOGIN ID</th><th>Volume</th><th>Profit</th></tr></thead><tbody><tr><td># 1232678</td><td>ID 1331790954</td><td>10</td><td>161.93</td></tr><tr><td># 1238724</td><td>ID 1331790582</td><td>10</td><td>18.27</td></tr></tbody></table><div class="view-all" onclick="view_all(0)">View all</div></div></div>
<div class="account-row" id="accrow1"><div class="accounts-box"><div class="intelligence-box-in"><table><tbody><tr><th><span class="app-icon-list fa fa-money"></span></th><th colspan="3">EURNZD</th></tr><tr><td><span class="app-icon-list fa fa-bar-chart"></span></td><td>NETT pl</td><td> : </td><td>146.76</td></tr><tr><td><span class="app-icon-list fa vicon-servicecontracts"></span></td><td>Orders</td><td> : </td><td>1</td></tr></tbody></table></div></div><div class="accounts-box1"><div class="intelligence-box-in"><div id="container1" style="min-width: 310px; height: 192px; margin: 0 auto"><div id="tradingview_14e52-wrapper" style="position: relative;box-sizing: content-box;width: 100%;height: 100%;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;"><div style="width: 100%;height: 100%;background: transparent;padding: 0 !important;"><iframe id="tradingview_14e52" src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_14e52&amp;symbol=FX%3AEURNZD&amp;interval=D&amp;hidetoptoolbar=1&amp;hidelegend=1&amp;saveimage=0&amp;toolbarbg=f1f3f6&amp;studies=%5B%5D&amp;theme=Dark&amp;style=1&amp;timezone=Etc%2FUTC&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=in&amp;utm_source=crm.mistertrader.com&amp;utm_medium=widget&amp;utm_campaign=chart&amp;utm_term=FX%3AEURNZD" style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""></iframe></div></div></div></div></div><div class="accounts-box2"><table><thead><tr><th>Order ID</th><th>LOGIN ID</th><th>Volume</th><th>Profit</th></tr></thead><tbody><tr><td># 1238990</td><td>ID 1331790790</td><td>10</td><td>146.76</td></tr></tbody></table><div class="view-all" onclick="view_all(1)">View all</div></div></div>
<div class="account-row" id="accrow2"><div class="accounts-box"><div class="intelligence-box-in"><table><tbody><tr><th><span class="app-icon-list fa fa-money"></span></th><th colspan="3">EURTRY</th></tr><tr><td><span class="app-icon-list fa fa-bar-chart"></span></td><td>NETT pl</td><td> : </td><td>119.11</td></tr><tr><td><span class="app-icon-list fa vicon-servicecontracts"></span></td><td>Orders</td><td> : </td><td>1</td></tr></tbody></table></div></div><div class="accounts-box1"><div class="intelligence-box-in"><div id="container2" style="min-width: 310px; height: 192px; margin: 0 auto"><div id="tradingview_f9b31-wrapper" style="position: relative;box-sizing: content-box;width: 100%;height: 100%;margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;"><div style="width: 100%;height: 100%;background: transparent;padding: 0 !important;"><iframe id="tradingview_f9b31" src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_f9b31&amp;symbol=FX%3AEURTRY&amp;interval=D&amp;hidetoptoolbar=1&amp;hidelegend=1&amp;saveimage=0&amp;toolbarbg=f1f3f6&amp;studies=%5B%5D&amp;theme=Dark&amp;style=1&amp;timezone=Etc%2FUTC&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=in&amp;utm_source=crm.mistertrader.com&amp;utm_medium=widget&amp;utm_campaign=chart&amp;utm_term=FX%3AEURTRY" style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""></iframe></div></div></div></div></div><div class="accounts-box2"><table><thead><tr><th>Order ID</th><th>LOGIN ID</th><th>Volume</th><th>Profit</th></tr></thead><tbody><tr><td># 1238996</td><td>ID 1331790790</td><td>10</td><td>119.11</td></tr></tbody></table><div class="view-all" onclick="view_all(2)">View all</div></div></div>
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

{elseif $RISK eq '3'}

<div>
<div id="all_sym_det"><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> EURUSD</li><li><span class="fa fa-bar-chart"></span> 4 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> USDJPY</li><li><span class="fa fa-bar-chart"></span> 1 Buy orders</li><li><span class="fa fa-arrow-up"></span> Market will go up</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> USDJPY.m</li><li><span class="fa fa-bar-chart"></span> 3 Buy orders</li><li><span class="fa fa-arrow-up"></span> Market will go up</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> USDCHF</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> AUDUSD</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> EURGBP</li><li><span class="fa fa-bar-chart"></span> 2 Buy orders</li><li><span class="fa fa-arrow-up"></span> Market will go up</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> USDCAD</li><li><span class="fa fa-bar-chart"></span> 2 Buy orders</li><li><span class="fa fa-arrow-up"></span> Market will go up</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> NZDUSD</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> EURJPY</li><li><span class="fa fa-bar-chart"></span> 3 Buy orders</li><li><span class="fa fa-arrow-up"></span> Market will go up</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> CHFJPY</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> EURAUD</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> EURCAD</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> USDSGD</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> AUDCAD</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> AUDJPY</li><li><span class="fa fa-bar-chart"></span> 6 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> AUDNZD</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> EURNZD</li><li><span class="fa fa-bar-chart"></span> 1 Buy orders</li><li><span class="fa fa-arrow-up"></span> Market will go up</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> NZDJPY</li><li><span class="fa fa-bar-chart"></span> 1 Sell orders</li><li><span class="fa fa-arrow-down"></span> Market will go down</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> EURHKD</li><li><span class="fa fa-bar-chart"></span> 1 Buy orders</li><li><span class="fa fa-arrow-up"></span> Market will go up</li></ul></div></div><div class="intelligence-box down"><div class="intelligence-box-in"><div class="intel_status " style="background: #e93535 !important;"><i class="fa fa fa-check-circle" aria-hidden="true"></i></div><ul><li><span class="fa fa-money"></span> USDHKD</li><li><span class="fa fa-bar-chart"></span> 1 Buy orders</li><li><span class="fa fa-arrow-up"></span> Market will go up</li></ul></div></div></div>
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

{else}
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
	{assign var=MT_USER value=$MT_USER}
	{assign var=PNLFINAL value=$PNLFINAL}
	{assign var=TOTALDEP value=$TOTALDEP}
	
	{*{$MT_USER[0]["balance"]|print_r}
	{php}
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
                        <h2>{$MT_USER[0]["balance"]}</h2>
                	</div>
                    <div class="grd_bx_item">
                    	<p>P/L</p>
                        <h2>{$PNLFINAL}</h2>
                	</div>
                    <div class="grd_bx_item">
                    	<p>Levetage</p>
                        <h2>{$MT_USER[0]["leverage"]}</h2>
                	</div>
                    <div class="grd_bx_item">
                    	<p>Total Deposite</p>
                        <h2>{$TOTALDEP}</h2>
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
							{foreach key=myId item=i from=$DEPOSIT_DATA}
							<tr>
									<td>{$i[0]}</td>
									<td>{$i[1]}</td>
									<td>{$i[2]}</td>
									<td>{$i[3]}</td> 
								 </tr>
							{/foreach}
                           
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
							{foreach key=myId item=i from=$WITHDRAW_DATA}
								<tr>
									<td>{$i[0]}</td>
									<td>{$i[1]}</td>
									<td>{$i[2]}</td>
									<td>{$i[3]}</td> 
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
							{foreach key=myId item=i from=$OPEN_DATA}
								<tr>
									<td>{$i[0]}</td>
									<td>{$i[1]}</td>
									<td>{$i[2]}</td>
									<td>{$i[3]}</td> 
									<td>{$i[4]}</td> 
								 </tr>
							 {/foreach}
                            
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
							{foreach key=myId item=i from=$CLOSE_DATA}
								<tr>
									<td>{$i[0]}</td>
									<td>{$i[1]}</td>
									<td>{$i[2]}</td>
									<td>{$i[3]}</td> 
									<td>{$i[4]}</td> 
								 </tr>
							 {/foreach}
                           
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
{/if}