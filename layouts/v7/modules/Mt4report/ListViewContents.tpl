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
{assign var=IBMANAGEMENT value=$IBMANAGEMENT}
{assign var=IBCOMMISSION value=$IBCOMMISSION}
{assign var=COMMISSION_REPORT value=$COMMISSION_REPORT}
{assign var=REPORT value=$REPORT}
{assign var=VOIP value=$VOIP}
{*{assign var=VOIP_DAT value=$VOIP_DATA}*}

{if $VOIP eq '1'}
<style>
.notificatn h2 {
    font-size: 24px;
    font-family: 'OpenSans-Semibold', 'ProximaNova-Semibold', sans-serif;
	    margin: 0px;
}
.top_flex {
    display: flex;
    justify-content: space-between;
    padding: 15px 0px;
}

.general_notificatn h3 {
    font-size: 18px;
    font-family: 'OpenSans-Regular', sans-serif;
    
        padding: 0px 18px;
}

.bordr_top{
	border-top: 1px solid #ccc;
	padding:15px 0px;
	}


div.checkbox.switcher label, div.radio.switcher label {
  padding: 0;
}
div.checkbox.switcher label *, div.radio.switcher label * {
  vertical-align: middle;
}
div.checkbox.switcher label input, div.radio.switcher label input {
  display: none;
}
div.checkbox.switcher label input + span, div.radio.switcher label input + span {
    position: relative;
    display: inline-block;
    margin-right: 10px;
    width: 45px;
    height: 20px;
    background: #f2f2f2;
    border: 1px solid #eee;
    border-radius: 0;
    transition: all 0.3s ease-in-out;
}
div.checkbox.switcher label input + span small, div.radio.switcher label input + span small {
    position: absolute;
    display: block;
    width: 40%;
    margin: 2px;
    height: 14px;
    background: #fff;
    border-radius: 0;
    transition: all 0.3s ease-in-out;
    left: 0;
}
div.checkbox.switcher label input:checked + span, div.radio.switcher label input:checked + span {
  background: #ef5e29;
  border-color: #ef5e29;
}
div.checkbox.switcher label input:checked + span small, div.radio.switcher label input:checked + span small {
  left: 50%;
}
 .dis_flex {
    padding: 8px 30px;
    display: flex;
    justify-content: space-between;
}
.checkbox.switcher {
    margin: 0px;
}

.dis_flex p {
    font-size: 15px !important;
	width: 68%;
	margin: 0px;
}

 
.checkbox.switcher {
    font-size: 15px;
}
.save_changes {
    float: right;
    padding: 40px 5px;
}
 

#offer_submit {
    background-color: #ef5e29;
    padding: 6px 50px;
    font-size: 15px;
    color: #fff;
    border: 0px;
    outline: none;
}
</style>
 <div class="container notificatn">
 

 <form method="post" action="voip.php">
 <input type="hidden" name="current_url" value="{$ACTUAL_LINK}">
 <input type="hidden" name="users" value='{$USERS}'>

 <div class="top_flex">
 	<h2>VOIP</h2>
	
  </div> 
    <div class="container general_notificatn">
        <div class="col-md-6 col-sm-12 ">
               <div class="bordr_top">
				<!---start--->
				<div class="dis_flex">
                     <p><b>Voip Username</b></p>
                                  <label for="btn2">
                                  <input type="text"  name="voip_username" value="{if $VOIP_DATA|@count ge 0}{$VOIP_DATA[2]} {/if}">
                                    <span><small></small></span>
                                  </label>
                </div>
				<div class="dis_flex">
                     <p><b>Voip Password</b></p>
                                  <label for="btn2">
                                  <input type="text"  name="voip_registerpass" value="{if $VOIP_DATA|@count ge 0}{$VOIP_DATA[4]} {/if}">
                                    <span><small></small></span>
                                  </label>
                </div>
				<div class="dis_flex">
                     <p><b>Voip Domain Host</b></p>
                                  <label for="btn2">
                                  <input type="text"  name="voip_domainhost" value="{if $VOIP_DATA|@count ge 0}{$VOIP_DATA[5]} {/if}">
                                    <span><small></small></span>
                                  </label>
                </div>
				<div class="dis_flex">
                     <p><b>Voip Register Name</b></p>
                                  <label for="btn2">
                                  <input type="text"  name="voip_registername" value="{if $VOIP_DATA|@count ge 0}{$VOIP_DATA[3]} {/if}">
                                    <span><small></small></span>
                                  </label>
                </div>
				<div class="dis_flex">
                     <p><b>Voip Display Name</b></p>
                                  <label for="btn2">
                                  <input type="text"  name="voip_dispname" value="{if $VOIP_DATA|@count ge 0}{$VOIP_DATA[1]} {/if}">
                                    <span><small></small></span>
                                  </label>
                </div>
				<div class="dis_flex">
                     <p><b>Voip Domain Port</b></p>
                                  <label for="btn2">
                                  <input type="text"  name="voip_domainport" value="{if $VOIP_DATA|@count ge 0}{$VOIP_DATA[6]} {/if}">
                                    <span><small></small></span>
                                  </label>
                </div>


			<!---end-->
              </div>
         
        </div>
    </div>
    <div class="save_changes">
    	<div class="buttn">
        	<button type="submit" id="offer_submit"  >Save</button>
        </div>
    </div>
     
    
 </form>   
</div>



{elseif $COMMISSION_REPORT eq '1'}

{*{$enc = json_encode(["First"=>$contact.first_name,"Last"=>$contact.last_name,"Email"=>$contact.channels.email.address])}
enc: {$enc}
{$dec = json_decode($enc)}<br><br>
{foreach $dec as $key => $value}
{$key}: {$value}<br>
{/foreach}
{php}exit();{/php}*}

<div class="col-sm-12 col-xs-12 ">
<div class="floatThead-wrapper">
<div id="table-content" class="table-container ps-container"">
<table class="table  listview-table  floatThead-table">
	<thead>
		<tr>
			<th>Time</th>
			<th>Amount</th>
			
			<th>View</th>
		</tr>
	</thead>
	<tbody>
	{foreach item=REP from=$REPORT}

	{*{$REP|print_r}
	{php}exit();{/php}*}
			<tr>
			<td>{$REP["datetime"]}</td>
			<td>{$REP["amount"]}</td>
			
			<td><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target=".mt4_report_pop{$REP['settlementid']}">View</button></td>
		</tr>
	{/foreach}
		
		
	</tbody>
</table>
</div>
</div>
</div>


<!-- Large modal -->
{foreach item=REP from=$REPORT}

<div class="modal fade mt4_report_pop{$REP['settlementid']}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
		
      <div class="modal-header">
        <h5 class="modal-title">Commission Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div class="modal-body">
		{$REP['html']}
		<!--<table class="table  listview-table  floatThead-table"><thead><tr><th>Trade</th><th>Amount</th></tr></thead><tbody>


	
		
		

							
							</tbody></table>-->
</div>
    </div>
  </div>
</div>
{/foreach}

{*{assign var=enc value="{$REP['json']}"}

{$enc}

{$enc = '[{"amount":0.3275,"trade":"271941","user":"23"},{"amount":0.1638,"trade":"271931","user":"23"}]'}

{$enc = {$REP["json"]}}
		
{$enc}
{$dec = json_decode({$enc})}
{$dec|print_r}
*}
{*{foreach $dec as $key => $value}
{foreach $value as $key1 => $value1}
{$key1}: {$value1}<br>
{/foreach}
{/foreach}*}
<style>
.mt4_report_pop thead {
    background: #ddd;
	text-align:center;
}
.mt4_report_pop thead th{
	text-align:center;
}
.mt4_report_pop table {
    border: 1px solid #ddd;
}

.module-action-content {
    display: none;
}
</style>

{elseif  $IBCOMMISSION eq '1'}
<style>
.notificatn h2 {
    font-size: 24px;
    font-family: 'OpenSans-Semibold', 'ProximaNova-Semibold', sans-serif;
	    margin: 0px;
}
.top_flex {
    display: flex;
    justify-content: space-between;
    padding: 15px 0px;
}

.general_notificatn h3 {
    font-size: 18px;
    font-family: 'OpenSans-Regular', sans-serif;
    
        padding: 0px 18px;
}

.bordr_top{
	border-top: 1px solid #ccc;
	padding:15px 0px;
	}


div.checkbox.switcher label, div.radio.switcher label {
  padding: 0;
}
div.checkbox.switcher label *, div.radio.switcher label * {
  vertical-align: middle;
}
div.checkbox.switcher label input, div.radio.switcher label input {
  display: none;
}
div.checkbox.switcher label input + span, div.radio.switcher label input + span {
    position: relative;
    display: inline-block;
    margin-right: 10px;
    width: 45px;
    height: 20px;
    background: #f2f2f2;
    border: 1px solid #eee;
    border-radius: 0;
    transition: all 0.3s ease-in-out;
}
div.checkbox.switcher label input + span small, div.radio.switcher label input + span small {
    position: absolute;
    display: block;
    width: 40%;
    margin: 2px;
    height: 14px;
    background: #fff;
    border-radius: 0;
    transition: all 0.3s ease-in-out;
    left: 0;
}
div.checkbox.switcher label input:checked + span, div.radio.switcher label input:checked + span {
  background: #ef5e29;
  border-color: #ef5e29;
}
div.checkbox.switcher label input:checked + span small, div.radio.switcher label input:checked + span small {
  left: 50%;
}
 .dis_flex {
    padding: 8px 30px;
    display: flex;
    justify-content: space-between;
}
.checkbox.switcher {
    margin: 0px;
}

.dis_flex p {
    font-size: 15px !important;
	width: 68%;
	margin: 0px;
}

 
.checkbox.switcher {
    font-size: 15px;
}
.save_changes {
    float: right;
    padding: 40px 5px;
}
 

#offer_submit {
    background-color: #ef5e29;
    padding: 6px 50px;
    font-size: 15px;
    color: #fff;
    border: 0px;
    outline: none;
}
</style>
 <div class="container notificatn">
 <!-- <form method="post" action="ibmain.php">
		<input type="hidden" name="current_url" value="{$ACTUAL_LINK}">
		 <input type="hidden" name="security" value='{$SECURITY_JSON}'>
		 <input type="hidden" name="users" value='{$USERS}'>
 <div class="top_flex">
 	<h2>Mt4account</h2>
	
  </div> 

             <div class="bordr_top">
                <div class="dis_flex">
                     <p><b>Account </b></p>
                      
                                  <label for="btn1">
                                 
                                    <input type="text"  name="account">
                                    <span><small></small></span>
                                     
                                  </label>
                            
                     
                </div>



		  <div class="save_changes">
    	<div class="buttn">
        	<button type="submit" id="offer_submit1">Save</button>
        </div>
    </div>

  </form>-->
<form method="post" action="security.php">
 <input type="hidden" name="current_url" value="{$ACTUAL_LINK}">
 <div class="save_changes">
    	<div class="buttn">
        	<button type="submit" id="offer_submit"  >Refresh</button>
        </div>
    </div>
</form>

 <form method="post" action="ibmain.php">
 <input type="hidden" name="current_url" value="{$ACTUAL_LINK}">
 <input type="hidden" name="security" value='{$SECURITY_JSON}'>
 <input type="hidden" name="users" value='{$USERS}'>

 <div class="top_flex">
 	<h2>Commission</h2>
	
  </div> 
    <div class="container general_notificatn">
	
        <div class="col-md-6 col-sm-12 ">

		


               <div class="bordr_top">

				<!---start--->
				<div class="dis_flex">
                     <p><b>Account </b></p>
                      
                                  <label for="btn2">
                                 
                                  <input type="text"  name="account">
                                    <span><small></small></span>
                                     
                                  </label>
                            
                     
                </div>

			<!---end-->


                <div class="dis_flex">
                     <p><b>Set Commission </b></p>
                      <div class="checkbox switcher">
                                  <label for="btn1">
                                 
                                    <select name="direct_commission" id="direct_commission">
									  <option value="0">No</option>
									  <option value="1">Fixed</option>
									  <option value="2">Percentage</option>
									</select>
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>

				<!---------->
                             
				<div class="direct_commission" style="display:none;">

							
							{foreach item=SECURIT from=$SECURITY}

								
									<div class="dis_flex">
										 <p><b>{$SECURIT["S"]} </b></p>
										 <div class="checkbox switcher">
													    
														<input type="text"  name="{$SECURIT['S']}_{$SECURIT['I']}_1">
										</div>

										</div>
								
							{/foreach}
				</div>
				
				<!------------>

				<div class="dis_flex">
                     <p><b>Commission form user </b></p>
                      <div class="checkbox switcher">
                                  <label for="btn2">
                                 
                                   <select name="sub_commission" id="sub_commission">
									  <option value="0">No</option>
									  <option value="1">Fixed</option>
									  <option value="2">Percentage</option>
									</select>
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>

					<!---------->
                              {*{$SECURITY|print_r}
								{php}exit();{/php}*}
				<div class="sub_commission" style="display:none;">{**}
							{foreach item=SECURIT from=$SECURITY}

								
									<div class="dis_flex">
										 <p><b>{$SECURIT["S"]} </b></p>
										 <div class="checkbox switcher">
													  
														<input type="text"  name="{$SECURIT['S']}_{$SECURIT['I']}_2">
										</div>

										</div>
								
							{/foreach}
				</div>
				

              </div>
         
        </div>
    </div>
    <div class="save_changes">
    	<div class="buttn">
        	<button type="submit" id="offer_submit"  >Save</button>
        </div>
    </div>
     
    
 </form>   
</div>

{elseif $IBMANAGEMENT eq '1'}
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">


<style>
.report-tab ul {
   
    width: 100%;
	background: #fff;
}
.nav-tabs>li>a {
    color: #666;
	font-family: 'OpenSans-Semibold', 'ProximaNova-Semibold', sans-serif;
    font-weight: normal;
	}
.nav-tabs {
    border-bottom: 1px solid #ddd;
}
.nav-tabs>li>a {
 
    border-radius: 2px 2px 0 0;
    font-weight: 500;
    font-size: 16px;
}
.nav-tabs>li.active>a,.nav-tabs>li.active>a:hover,.nav-tabs>li.active>a:focus{
color:#333;
border: none;
border-bottom: 3px solid #555;
}
.report-tab .nav-tabs > li:hover a{
color:#666;
border: none;
border-bottom: 3px solid #555;
}
.nav > li > a:hover, .nav > li > a:focus {
    background-color: #FFFFFF;
    color: #000;
}

.report-tab .tab-content {
    margin-left: 15px;
}
.content-area1{
    background: #f9f9f9;
	margin: 0px;
    padding: 0px;

}
.fa {
 font-size: 58px;
	opacity: 0.8;
}
.account1.account2 span {
    padding-left: 7px;
    font-size: 14px;
}
.account1 {
    padding: 20px 0px 0px;
    text-align: center;
	background: #eaeaea;
	cursor:pointer;
    
    margin: 10px 12px 3px 0px;
}
.mt4-addaccount .account1:hover{
background: #2c3b49;
color:#fff;
}
.account1:hover .fa{
opacity: 1;
}
.main-account {
    border-bottom: 1px solid #ccc;
    padding-bottom: 7px;
}


.account1 p {
        padding-top: 18px;
    margin-bottom: 0px;
    font-size: 14px;
 
}
#menu1 .account2 ul li p{
        padding-top: 5px;
}
#menu2 .account2 ul li p{
padding-top: 8px;
}
h6 {
    padding: 8px 1px 8px;
    font-size: 14px;
	margin-bottom: 0px;
}
.set_title {
    background: #ef5e29;
    color: #fff;
    padding: 0px;
	margin-top: 23px;
}
.account1 ul {
    list-style: none;
	margin-left:0px;
	width:auto;
	background:transparent;
	    padding-left: 0px;

}
.account2 .fa {
    font-size: 19px;}

.account1 ul {
    list-style: none;
    width: auto;
    background: transparent;
    padding-left: 0px;
    display: flex;
    flex-wrap: wrap;
    margin: 0px 20px;
}
.account1 ul li {
    /* column-count: 2; */
    display: inline-block;
    width: 48%;
    text-align: left;
 
	padding: 8px 2px 8px 12px;
}
.account2 .set_title{
margin-top: 3px;
}
.w-50 {
    width: 50%!important;
}
.flex-row {
    -webkit-box-orient: horizontal!important;
    -webkit-box-direction: normal!important;
    -ms-flex-direction: row!important;
    flex-direction: row!important;
	column-count:2;
}
.listViewPageDiv a {
width:100%;
display: block;
}
.modal-header button.close {
display:block;
background-color:transparent;
right: 9px;
top: 1px;
}
.modal-header .close{
    opacity: unset;

}
.modal-dialog.modal-lg {
    width: 650px;
}


.form-group,.form-check {
    margin-bottom: 15px;
    text-align: left;
}
.modal-body h6 {
    padding: 8px 1px 8px;
    font-size: 18px;
    margin-bottom: 20px;
    text-align: left;
    font-weight: 600;
}



#menu1 .account1 ,#menu2 .account1{
margin: 10px 0px 3px 0px;
}
#menu1.account1 p ,#menu2 .account1 p { 
font-size:12px;
}
#menu1.account1 ul li ,#menu2 .account1 ul li { 
width: 20%;
}
#menu1 .account2 .fa,#menu2 .account2 .fa{
    font-size: 58px;
}
#menu1 .account1 ul li,#menu2 .account1 ul li {
    
    transition:ease .8s;
    text-align: center;
           padding: 9px 2px 11px 1px;
    margin-bottom: 6px;
}


#menu1 .account1.account2 ul li:hover,#menu2 .account1.account2 ul li:hover {
    background: #2c3b49;
    cursor: pointer;
	color:#fff;
	    border-radius: 6px;
}



    .treegrid-indent {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
    }

    .treegrid-expander {
        width: 0px;
        height: 16px;
        display: inline-block;
        position: relative;
        left:-17px;
        cursor: pointer;
    }
	.table-bordered>tbody>tr>th,.table-bordered1>tbody>tr>th{
	border: 1px solid #ddd !important;
	}
	.table-hover>tbody>tr>th,.table-hover1>tbody>tr>th{
    background-color: #2c3b49;
    color: #fff;
	text-align: center;
}
.table-hover>tbody>tr>td,.table-hover1>tbody>tr>td{
text-align:center;
}
.account2.account1:hover {
    cursor: unset;
}
.account2.account1 ul li:hover {
    background: #ef5e29;
	cursor:pointer;
}
.modal-content button.btn {
    background: #2c3b49;
    padding: 8px 39px;
    outline: none !important;
    color: #fff !important;
	    border-radius: 4px;
		    margin-top: 16px;
}
.modal-content button.btn:hover{
background:#ef5e29;
}
input#defaultUnchecked {
    background: #ebeff3;
    padding: 8px 8px;
	outline: none;
	}
input[type=checkbox]:checked::after{
position: absolute;
    top: -2px;
    left: -4px;
}
.custom-control.custom-checkbox label{
    margin-top: 9px;
    padding-left: 9px;
}
.custom-control.custom-checkbox{
    display: flex;
    align-items: center;
    
    justify-content: left;
}
.container-fluid table {
    display: none;
}
.container-fluid table.fr_mib {
    display: table;
}



.dataTables_wrapper .row{

margin-right:0px;
    margin-left:0px;
}


.dataTables_filter {
  float:right;
  margin-bottom: 1em;
  
  &:after {
    clear:both;
  }
}

.dt-buttons a .glyphicon {
  visibility: hidden;
}
.dt-buttons a:hover .glyphicon {
  visibility: visible;
}
div.dt-buttons{
display:none;
}
.dataTable thead tr th,.dataTable tbody tr td{
text-align:center;
}
.dataTable thead{
background:#2c3b49;
color:#fff;
text-align:center;
}
#First_mibtable_wrapper, #First_mibtable1_wrapper
{
    display: none;
}
#menu1 .row,#menu2 .row {
    margin-right: 0px;
    margin-left: 0px;
}
div.dataTables_wrapper div.dataTables_filter {
    text-align: right;
    margin: 11px 13px 3px;
}
div.dataTables_wrapper div.dataTables_filter label {
    
    color: #000;
    font-size: 15px;
}
div.dataTables_wrapper div.dataTables_filter input {
  
    box-shadow: none;
    border: 2px solid #ccc;
}
div.dataTables_wrapper div.dataTables_info {
    padding-top: 8px;
    white-space: nowrap;
    padding-left: 12px;
}
a.dte_btn {
    border: 1px solid #dc070e;
    padding: 2px 13px;
    background: #dc070e;
    color: #fff;
    display: inline;
}
a.add_btn{
 border: 1px solid #ef5e29;
    padding: 2px 13px;
    background: #ef5e29;
    color: #fff;
    display: inline;
}

</style>



<div class="col-sm-12 col-xs-12 content-area1">
		<div class="report-tab">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">Accounts</a></li>
					<li><a data-toggle="tab" href="#menu1">Reports</a></li>
					<li><a data-toggle="tab" href="#menu2">Settings</a></li>
				  </ul>

		  <div class="tab-content">
				<div id="home" class="col-sm-12 col-md-12 col-lg-12 tab-pane fade in active main-account">
					<div class="row mt4-addaccount">
							<div class="col-sm-4 col-md-4 col-lg-1 account1">
									<a href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus" aria-hidden="true"></i>
									<p>Add Accounts</p>
									<div class="set_title">
										<h6>Add Accounts</h6></a>
									</div>
							</div>
							<div class="col-sm-4 col-md-4 col-lg-4 account2 account1">
									<ul class="filter_tables">
										<li><a class="all_mib"><i class="fa fa-newspaper-o" aria-hidden="true"> </i><span>View all MIB</span></li></a>
										<li><a class="tree_view"><i class="fa fa-th-list" aria-hidden="true"></i> <span>Tree View</span></a></li>
										<li><a class="all_ibs"><i class="fa fa-object-group" aria-hidden="true"></i> <span>View all IBs</span></a></li>
										<li><a class="expand_all"><i class="fa fa-th-list" aria-hidden="true"></i> <span>Expand all</span></a></li>
										<li><a class="all_acc"><i class="fa fa-users" aria-hidden="true"></i></i> <span>View all Accounts</span></a></li>
									</ul>
								<div class="set_title">
									<h6>View</h6>
								</div>
							</div>
							<div class="col-sm-4 col-md-4 col-lg-1 account1">
									<i class="fa fa-refresh" aria-hidden="true"></i>
									<p>Refresh Security</p>
									<div class="set_title">
										<h6>Refresh</h6>
									</div>
							</div>
					</div>
				</div>
			
				<div id="menu1" class="tab-pane fade main-account">
					  <div class="row">
							<div class="col-sm-4 col-md-4 col-lg-3 account1 account2">
								<ul>
									<li><a class="all_report"><i class="fa fa-user" aria-hidden="true"></i> <p>User Report</p></a></li>
									<li><a class="all_commission"><i class="fa fa-th-list" aria-hidden="true"></i> <p>Commission Report</p></a></li>
								</ul>
								<div class="set_title">
									<h6>Reports</h6>
								</div>
							</div>
					  </div>
				</div>
			
				<div id="menu2" class="tab-pane fade main-account">
					<div class="row">
						<div class="col-sm-4 col-md-4 col-lg-5 account1 account2">
							<ul>
								<li><i class="fa fa-object-group" aria-hidden="true"></i> <p>Branding</p></li>
								<li><i class="fa fa-user" aria-hidden="true"></i> <p>User Rights</p></li>
								<li><i class="fa fa-refresh" aria-hidden="true"></i> <p>Refresh</p></li>
								<li><i class="fa fa-retweet" aria-hidden="true"></i> <p>Refresh Commission</p></li>
								<li><i class="fa fa-sign-out" aria-hidden="true"></i> <p>Logout</p></li>
							</ul>
							<div class="set_title">
								<h6>Settings</h6>
							</div>
						</div>
					</div>
				</div>
			
			</div>
		</div>
</div>



<div class="container-fluid" style="padding:0px;">
		  <table id="tree-table1" class="fr_mib table table-hover1 table-bordered1">
				<tbody>
					<tr>
						<th>Name</th>
						<th>MT4 ID</th>
						<th>Balance</th>
						<th>Type</th>
						<th>Registration Date</th>
					</tr>
					<tr data-id="1" data-parent="0" data-level="1">
						  <td data-column="name"><img style="padding-top:2px;" src="DH/imgs/dhxgrid_skyblue/tree/../../../18/user3.png" align="top" title="test">aaa</td>
						  <td>1022</td>
						  <td>0</td>
						  <td></td>
						  <td></td>
					</tr>
				</tbody>
			
		  </table>
		  <table id="tree-table2" class="fr_ib table table-hover1 table-bordered1">
				<tbody>
					<tr>
						<th>Name</th>
						<th>MT4 ID</th>
						<th>Balance</th>
						<th>Type</th>
						<th>Registration Date</th>
					</tr>
					<tr data-id="1" data-parent="0" data-level="1">
						  <td data-column="name"><img style="padding-top:2px;" src="DH/imgs/dhxgrid_skyblue/tree/../../../18/user3.png" align="top" title="test">aaa</td>
						  <td>1022</td>
						  <td>0</td>
						  <td>MIB</td>
						  <td></td>
					</tr>
				</tbody>
			
		  </table>
		  <table id="tree-table3" class="fr_all_acc table table-hover1 table-bordered1">
				<tbody>
					<tr>
						<th>Name</th>
						<th>MT4 ID</th>
						<th>Balance</th>
						<th>Type</th>
						<th>Registration Date</th>
					</tr>
					<tr data-id="1" data-parent="0" data-level="1">
						  <td data-column="name"><img style="padding-top:2px;" src="DH/imgs/dhxgrid_skyblue/tree/../../../18/user3.png" align="top" title="test">aaa</td>
						  <td>1022</td>
						  <td>0</td>
						  <td>MIB</td>
						  <td>MIB</td>
					</tr>
				</tbody>
		  </table>
		  <table id="tree-table4" class="fr_tree_view table table-hover table-bordered">
				<tbody>
					<tr>	
						<th>Name</th>
						<th>MT4 ID</th>
						<th>Balance</th>
						<th>Type</th>
						<th>Registration Date</th>
						<th>Delete</th>
						<th>Add</th>
					</tr>
					<tr data-id="1" data-parent="0" data-level="1">
						  <td data-column="name"><img style="padding-top:2px;" src="DH/imgs/dhxgrid_skyblue/tree/../../../18/user3.png" align="top" title="test">aaa</td>
						  <td>1022</td>
						  <td>0</td>
						  <td>MIB</td>
						  <td></td>
						  <td><a class="dte_btn">Delete</a></td>
						  <td><a class="add_btn">Add</a></td> 
					</tr>
					<tr data-id="2" data-parent="1" data-level="2">
						<td data-column="name">Node 1</td>
						<td>1022</td>
						<td>0</td>
						<td>MIB</td>
					</tr>
					<tr data-id="3" data-parent="1" data-level="2">
					  <td data-column="name">Node 1</td>
					  <td>1022</td>
					  <td>0</td>
					  <td>MIB</td>
					</tr>
					<tr data-id="4" data-parent="3" data-level="3">
					  <td data-column="name">Node 1</td>
					  <td>Additional info</td>
					</tr>
					<tr data-id="5" data-parent="3" data-level="3">
					  <td data-column="name">Node 1</td>
					  <td>Additional info</td>
					</tr>
				</tbody>
		  </table>

			<table id="tree-table5" class="fr_exp_view table table-hover table-bordered">
				<tbody>
					<tr>	
						<th>Name</th>
						<th>MT4 ID</th>
						<th>Balance</th>
						<th>Type</th>
						<th>Registration Date</th>
						<th>Delete</th>
						<th>Add</th>
					</tr>
					<tr data-id="1" data-parent="0" data-level="1">
						  <td data-column="name"><img style="padding-top:2px;" src="DH/imgs/dhxgrid_skyblue/tree/../../../18/user3.png" align="top" title="test">aaa</td>
						  <td>1022</td>
						  <td>0</td>
						  <td>MIB</td>
						  <td></td>
						  <td><a class="dte_btn">Delete</a></td>
						  <td><a class="add_btn">Add</a></td>
					</tr>
					<tr data-id="2" data-parent="1" data-level="2">
						  <td data-column="name">Node 1</td>
						  <td>1022</td>
						  <td>0</td>
						  <td>MIB</td>
					</tr>
					<tr data-id="3" data-parent="1" data-level="2">
					  <td data-column="name">Node 1</td>
					  <td>1022</td>
					  <td>0</td>
					  <td>MIB</td>
					</tr>
					<tr data-id="4" data-parent="3" data-level="3">
					  <td data-column="name">Node 1</td>
					  <td>Additional info</td>
					</tr>
					<tr data-id="5" data-parent="3" data-level="3">
					  <td data-column="name">Node 1</td>
					  <td>Additional info</td>
					</tr>
				</tbody>
			</table>
		
			<table id="First_mibtable" class="fr_user_report table  table-striped table-bordered dataTable" >
				<thead>
					<tr>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Name: activate to sort column ascending">Name</th>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="MT4 ID: activate to sort column ascending">MT4 ID</th>
						  <th class="sorting" tabindex="0" aria-controls="example"  aria-label="Balance: activate to sort column ascending">Balance</th>
						  <th class="sorting_desc" tabindex="0" aria-controls="example"  aria-label="Type: activate to sort column ascending" aria-sort="descending">Type</th>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Registration date: activate to sort column ascending">Registration date</th>
					</tr>
				</thead>
				<tbody>
					<tr role="row" class="even">
						<td class="">Brielle Williamson</td>
						<td>10023</td>
						<td class="sorting_1">61</td>
						<td>IB</td>	
						<td>2012/12/02</td>
					</tr>
					<tr role="row" class="even">
					   <td class="">Garrett Winters</td>
					   <td>100</td>
					   <td class="sorting_1">61</td>
					   <td>Client</td>
					   <td>2012/12/02</td>
					</tr>
					<tr role="row" class="odd">
					  <td class="">Garrett Winters</td>
					  <td>100234</td>
					  <td class="sorting_1">63</td>
					  <td>IB</td>
					  <td>2012/12/22</td>
					</tr>
				</tbody>
			</table>

			<table id="First_mibtable1" class="fr_comission_report table  table-striped table-bordered dataTable" >
				  <thead>
						<tr>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Parent Name: activate to sort column ascending">Parent Name</th>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Parent MT4 ID: activate to sort column ascending">Parent MT4 ID</th>
						  <th class="sorting" tabindex="0" aria-controls="example"  aria-label="Child Name: activate to sort column ascending">Child Name</th>
						  <th class="sorting_desc" tabindex="0" aria-controls="example"  aria-label="Parent MT4 ID: activate to sort column ascending" aria-sort="descending">Parent MT4 ID</th>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Commission: activate to sort column ascending">Commission</th>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Symbol : activate to sort column ascending">Symbol</th>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Ticket Id : activate to sort column ascending">Ticket Id</th>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Lot : activate to sort column ascending">Lot</th>
						  <th class="sorting" tabindex="0" aria-controls="example" aria-label="Time : activate to sort column ascending">Time</th>
						</tr>
				  </thead>
					<tbody>
						<tr role="row" class="even">
							  <td class="">aa1</td>
							  <td>10023</td>
							  <td >aa2</td>
							  <td class="sorting_1">11161</td>
							  <td>12,444</td>
							  <td>AUDUSD</td>
							  <td>4567	</td>
							  <td>45</td>
							  <td>2012/12/02</td>
						</tr>
						<tr role="row" class="even">
							  <td class="">aa4</td>
							  <td>10023</td>
							  <td >ar2</td>
							  <td class="sorting_1">13361</td>
							  <td>12,444</td>
							  <td>AUDUSD</td>
							  <td>4567	</td>
							  <td>45</td>
							  <td>2020/02/22</td>
						</tr>
						<tr role="row" class="odd">
							  <td class="">aa3</td>
							  <td>10023</td>
							  <td >ay2</td>
							  <td class="sorting_1">11161</td>
							  <td>12,444</td>
							  <td>USDCAD</td>
							  <td>4567	</td>
							  <td>100</td>
							  <td>2020/01/21</td>
						</tr>
				  </tbody>
			</table>
  </div>



	<div class="modal fade" id="myModal" role="dialog">
		 <div class="modal-dialog modal-sm modal-lg modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Accounts</h4>
				</div>
				<div class="modal-body">
					<h6>Your MT4 Client and IB Details</h6>
					 <form class="container1" >
						  <div class="form-group">
								<label for="exampleInputPassword1">IB MT4 Login:</label>
								<input type="text"  class="form-control"  name="fname"  placeholder="IB MT4 Login" required>
						   </div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="defaultUnchecked">
								<label class="custom-control-label" for="defaultUnchecked">Master IB</label>
							</div>
							<button type="submit" class="btn">Add IB</button>
					 </form>
				</div>
			 </div>
		  </div>
	</div>


<!-- Table click start-->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(function () {
  $('#First_mibtable1').dataTable({
    paging: false,
	filter:true,
    fixedHeader: {
      header: true
    },
  });
  $('#First_mibtable').dataTable({
    paging: false,
	filter:true,
    fixedHeader: {
      header: true
    },
  });
});
</script>

<script>	
$(function () {
$('.all_mib').click(function(){
$('.container-fluid table').hide();
$('.container-fluid table.fr_mib').css("display","table");
$('#First_mibtable_wrapper, #First_mibtable1_wrapper').hide();
});

$('.all_ibs').click(function(){
$('.container-fluid table').hide();
$('.container-fluid table.fr_ib').css("display" ,"table");
});


$('.all_acc').click(function(){
$('.container-fluid table').hide();
$('.container-fluid table.fr_all_acc').css("display","table");
$('#First_mibtable_wrapper, #First_mibtable1_wrapper').hide();
});


$('.tree_view').click(function(){
$('.container-fluid table').hide();
$('.container-fluid table.fr_tree_view').css("display","table");
$('#First_mibtable_wrapper, #First_mibtable1_wrapper').hide();
});

$('.expand_all').click(function(){
$('.container-fluid table').hide();
$('.container-fluid table.fr_exp_view').css("display","table");
$('#First_mibtable_wrapper, #First_mibtable1_wrapper').hide();

});


$('.all_report').click(function(){
$('.container-fluid table').hide();
$('.container-fluid table.fr_user_report').css("display","table");
$('#First_mibtable1_wrapper').hide();
$('#First_mibtable_wrapper').show();

});

$('.all_commission').click(function(){
$('.container-fluid table').hide();
$('.container-fluid table.fr_comission_report').css("display","table");
$('#First_mibtable1_wrapper').show();
$('#First_mibtable_wrapper').hide();
});

});
</script> 


<script>
  $(function () {
			var
				$table = $('#tree-table'),
				rows = $table.find('tr');

			rows.each(function (index, row) {
				var
					$row = $(row),
					level = $row.data('level'),
					id = $row.data('id'),
					$columnName = $row.find('td[data-column="name"]'),
					children = $table.find('tr[data-parent="' + id + '"]');

				if (children.length) {
					var expander = $columnName.prepend('' +
						'<span class="treegrid-expander glyphicon glyphicon-chevron-right"></span>' +
						'');

					children.hide();

					expander.on('click', function (e) {
						var $target = $(e.target);
						if ($target.hasClass('glyphicon-chevron-right')) {
							$target
								.removeClass('glyphicon-chevron-right')
								.addClass('glyphicon-chevron-down');

							children.show();
						} else {
							$target
								.removeClass('glyphicon-chevron-down')
								.addClass('glyphicon-chevron-right');

							reverseHide($table, $row);
						}
					});
				}

				$columnName.prepend('' +
					'<span class="treegrid-indent" style="width:' + 15 * level + 'px"></span>' +
					'');
			});

			// Reverse hide all elements
			reverseHide = function (table, element) {
				var
					$element = $(element),
					id = $element.data('id'),
					children = table.find('tr[data-parent="' + id + '"]');

				if (children.length) {
					children.each(function (i, e) {
						reverseHide(table, e);
					});

					$element
						.find('.glyphicon-chevron-down')
						.removeClass('glyphicon-chevron-down')
						.addClass('glyphicon-chevron-right');

					children.hide();
				}
			};
  });

</script>






{elseif $RISK eq '1'} 

<style>
.notificatn h2 {
    font-size: 24px;
    font-family: 'OpenSans-Semibold', 'ProximaNova-Semibold', sans-serif;
	    margin: 0px;
}
.top_flex {
    display: flex;
    justify-content: space-between;
    padding: 15px 0px;
}

.general_notificatn h3 {
    font-size: 18px;
    font-family: 'OpenSans-Regular', sans-serif;
    
        padding: 0px 18px;
}

.bordr_top{
	border-top: 1px solid #ccc;
	padding:15px 0px;
	}


div.checkbox.switcher label, div.radio.switcher label {
  padding: 0;
}
div.checkbox.switcher label *, div.radio.switcher label * {
  vertical-align: middle;
}
div.checkbox.switcher label input, div.radio.switcher label input {
  display: none;
}
div.checkbox.switcher label input + span, div.radio.switcher label input + span {
    position: relative;
    display: inline-block;
    margin-right: 10px;
    width: 45px;
    height: 20px;
    background: #f2f2f2;
    border: 1px solid #eee;
    border-radius: 0;
    transition: all 0.3s ease-in-out;
}
div.checkbox.switcher label input + span small, div.radio.switcher label input + span small {
    position: absolute;
    display: block;
    width: 40%;
    margin: 2px;
    height: 14px;
    background: #fff;
    border-radius: 0;
    transition: all 0.3s ease-in-out;
    left: 0;
}
div.checkbox.switcher label input:checked + span, div.radio.switcher label input:checked + span {
  background: #ef5e29;
  border-color: #ef5e29;
}
div.checkbox.switcher label input:checked + span small, div.radio.switcher label input:checked + span small {
  left: 50%;
}
 .dis_flex {
    padding: 8px 30px;
    display: flex;
    justify-content: space-between;
}
.checkbox.switcher {
    margin: 0px;
}

.dis_flex p {
    font-size: 15px !important;
	width: 68%;
	margin: 0px;
}

 
.checkbox.switcher {
    font-size: 15px;
}
.save_changes {
    float: right;
    padding: 40px 5px;
}
 

#offer_submit {
    background-color: #ef5e29;
    padding: 6px 50px;
    font-size: 15px;
    color: #fff;
    border: 0px;
    outline: none;
}
</style>
 <div class="container notificatn">
 <form method="post" action="crm_setting.php">
 <input type="hidden" name="current_url" value="{$ACTUAL_LINK}">

 {************}
 <div class="top_flex">
 	<h2>General Settings</h2>
	{*<div class="checkbox switcher">
          <label for="disable_all">
          Disable all sounds : 
            <input type="checkbox" id="disable_all" name="all_notification" value="">
            <span><small></small></span>
             
          </label>
    </div>*}
  </div> 
    <div class="container general_notificatn">
	{*    <h3>General Notifications</h3>*}
	{*{$SETTINGS|print_r}
	{$SETTINGS['offers']}
	{php}exit();{/php}*}
        <div class="col-md-6 col-sm-12 ">
               <div class="bordr_top">
                <div class="dis_flex">
                     <p><b>Offers </b></p>
                      <div class="checkbox switcher">
                                  <label for="btn1">
                                 
                                    <input type="checkbox" id="btn1" name="offers" {if $SETTINGS['offers'] eq "1"} checked {/if} value="1">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>
				
				<div class="dis_flex">
                     <p><b>Deposit </b></p>
                      <div class="checkbox switcher">
                                  <label for="btn2">
                                 
                                    <input type="checkbox" id="btn2" name="deposit" {if $SETTINGS['deposit'] eq "1"} checked {/if} value="1">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>

				<div class="dis_flex">
                     <p><b>Withdraw </b></p>
                      <div class="checkbox switcher">
                                  <label for="btn3">
                                 
                                    <input type="checkbox" id="btn3" name="withdraw" {if $SETTINGS['withdraw'] eq "1"} checked {/if} value="1">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>


              </div>
         
        </div>
    </div>
    
   
    
    
     
    
  {************}
  {*  <div class="top_flex">
 	<h2>Notification Settings</h2>
  </div> 
    <div class="container general_notificatn">
    <h3>General Notifications</h3>
        <div class="col-md-6 col-sm-12 ">
               <div class="bordr_top">
                <div class="dis_flex">
                     <p><b>Reminder </b></p>
                      <div class="checkbox switcher">
                                  <label for="btn1">
                                  Popup : 
                                    <input type="checkbox" id="btn1" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>
                
                 <div class="dis_flex">
                     <p>For task notification  </p>
                      <div class="checkbox switcher">
                                  <label for="btn2">
                                  Sound : 
                                    <input type="checkbox" id="btn2" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                      
                </div>
              </div>
         
        </div>
    </div>
    
    
    <div class="container general_notificatn">
    <h3>My Dashboard Notifications</h3>
        <div class="col-md-6 col-sm-12 ">
            
            <div class="bordr_top">
                <div class="dis_flex">
                     <p><b>Reminder </b> </p>
                      <div class="checkbox switcher">
                                  <label for="btn3">
                                  Popup : 
                                    <input type="checkbox" id="btn3" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>
                
                 <div class="dis_flex">
                     <p>For Every Failiure of deposit  </p>
                      <div class="checkbox switcher">
                                  <label for="btn4">
                                  Sound : 
                                    <input type="checkbox" id="btn4" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                      
                </div>
                 </div>
         </div>
        
         <div class="col-md-6 col-sm-12 ">
            <div class="bordr_top">
                <div class="dis_flex">
                      <p><b>Reminder </b> </p>
                      <div class="checkbox switcher">
                                  <label for="btn5">
                                  Popup : 
                                    <input type="checkbox" id="btn5" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>
                
                 <div class="dis_flex">
                     <p>For Every Failiure of deposit  </p>
                      <div class="checkbox switcher">
                                  <label for="btn6">
                                  Sound : 
                                    <input type="checkbox" id="btn6" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                      
                </div>
                 </div>
           </div>
        
        
         <div class="col-md-6 col-sm-12 ">
            <div class="bordr_top">
                <div class="dis_flex">
                       <p><b>Reminder </b> </p>
                      <div class="checkbox switcher">
                                  <label for="btn7">
                                  Popup : 
                                    <input type="checkbox" id="btn7" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>
                
                 <div class="dis_flex">
                     <p>For Every Failiure of deposit  </p>
                      <div class="checkbox switcher">
                                  <label for="btn8">
                                  Sound : 
                                    <input type="checkbox" id="btn8" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                      
                </div>
            </div>
        </div>
        
   		 <div class="col-md-6 col-sm-12 ">
            <div class="bordr_top">
                <div class="dis_flex">
                       <p><b>Reminder </b> </p>
                      <div class="checkbox switcher">
                                  <label for="btn9">
                                  Popup : 
                                    <input type="checkbox" id="btn9" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                     
                </div>
                
                 <div class="dis_flex">
                     <p>For Every Failiure of deposit  </p>
                      <div class="checkbox switcher">
                                  <label for="btn10">
                                  Sound : 
                                    <input type="checkbox" id="btn10" value="">
                                    <span><small></small></span>
                                     
                                  </label>
                            </div>
                      
                </div>
            </div>
        </div>	
   
        
   </div>*}
    
    <div class="save_changes">
    	<div class="buttn">
        	<button type="submit" id="offer_submit"  >Save</button>
        </div>
    </div>
     
    
 </form>   
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
    {assign var=PROFIT_CHART value=$PROFIT_CHART}
	{assign var=PIE_CHART value=$PIE_CHART}
	{assign var=C1_DATE value=$C1_DATE}
	{assign var=C1_DATA value=$C1_DATA}
	
	
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
				   <div id="b_chart1" style="min-width: 310px; height: 350px; max-width: 100%; margin: 0 auto"></div>
                    
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
        data: {$PROFIT_CHART}
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
    text: ''
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
    data: {$PIE_CHART}
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
        categories: {$C1_DATE},
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
        data: {$C1_DATA}

    }]
});





Highcharts.chart('b_chart1', {
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
        categories: {$C2_DATE},
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
        data: {$C2_DATA}

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

