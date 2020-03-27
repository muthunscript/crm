{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*
********************************************************************************/
-->*}

{*{assign var=TEST value=$TEST}
{$TEST}
{php}
exit();
{/php}*}

{assign var=TOTAL_WITHDRAW value=$TOTAL_WITHDRAW}
{assign var=TOTAL_DEPOSIT value=$TOTAL_DEPOSIT}
{assign var=MT4ACCOUNT_DETAILS value=$MT4ACCOUNT_DETAILS}
{assign var=PNLFINAL value=$PNLFINAL}
{assign var=TOTALDEP value=$TOTALDEP}
{assign var=OPEN_PL value=$OPEN_PL}
{assign var=DEPOSIT_COUNT value=$DEPOSIT_COUNT}
{assign var=WITHDRAW_COUNT value=$WITHDRAW_COUNT}

{strip}
   <div class="col-lg-6 col-md-6 col-sm-6">
	  <div class="record-header clearfix ">
		 <div class="hidden-sm hidden-xs recordImage bgcontacts app-{$SELECTED_MENU_CATEGORY}">
			{assign var=IMAGE_DETAILS value=$RECORD->getImageDetails()}
			{foreach key=ITER item=IMAGE_INFO from=$IMAGE_DETAILS}
			   {if !empty($IMAGE_INFO.url)}
				  <img src="{$IMAGE_INFO.url}" alt="{$IMAGE_INFO.orgname}" title="{$IMAGE_INFO.orgname}" width="100%" height="100%" align="left"><br>
			   {else}
				  <img src="{vimage_path('summary_Contact.png')}" class="summaryImg"/>
			   {/if}
			{/foreach}
			{if empty($IMAGE_DETAILS)}
				<div class="name"><span><strong>{$MODULE_MODEL->getModuleIcon()}</strong></span></div>
			{/if}
		 </div>
		 <div class="recordBasicInfo" style="position:relative">
			<div class="info-row" >
			   <h4>
				  <span class="recordLabel  pushDown" title="{$RECORD->getDisplayValue('salutationtype')}&nbsp;{$RECORD->getName()}">
					 {assign var=COUNTER value=0}
					 {foreach item=NAME_FIELD from=$MODULE_MODEL->getNameFields()}
						{assign var=FIELD_MODEL value=$MODULE_MODEL->getField($NAME_FIELD)}
						{if $FIELD_MODEL->getPermissions()}
						   <span class="{$NAME_FIELD}">
							   {if $RECORD->getDisplayValue('salutationtype') && $FIELD_MODEL->getName() eq 'firstname'}
									{$RECORD->getDisplayValue('salutationtype')}&nbsp;
							   {/if}
							   {trim($RECORD->get($NAME_FIELD))}
						   </span>
						   {if $COUNTER eq 0 && ($RECORD->get($NAME_FIELD))}&nbsp;{assign var=COUNTER value=$COUNTER+1}{/if}
						{/if}
					 {/foreach}
				  </span>
				  <div class="info-row" style="position:absolute;top:6px;left:176px;" >
			   <div style="width:10px;height:10px;background-color:green;border-radius:50%">.</div>
			</div>
			   </h4>
			</div>
			
			{include file="DetailViewHeaderFieldsView.tpl"|vtemplate_path:$MODULE}
			<div class="info-row">
			   <i class="fa fa-map-marker"></i>&nbsp;
			   <a class="showMap" href="javascript:void(0);" onclick='Vtiger_Index_Js.showMap(this);' data-module='{$RECORD->getModule()->getName()}' data-record='{$RECORD->getId()}'>{vtranslate('LBL_SHOW_MAP', $MODULE_NAME)}</a>
			</div>
			
		 </div>
		
	  </div>
	<table class="list_table">
	<tr>
	<th>Live Accounts</th>
	<th>Balance</th>
	<th>Credit</th>
	<th>Equity</th>
	<th>Free Margin</th>
	<th>Open P&L</th>
	<th>Closed P&L</th>
	<th>Deposit</th>
	<th>Withdraw</th>
	<th>Net Deposit</th>
	<th>User Time (UTC + 02:00)</th>
	<th>Last Deposit 31 min Ago {*{$MT4ACCOUNT_DETAILS["timestamp"]}*} <br>
	Not Uploaded<br>
   Trading Volume: {$MT4ACCOUNT_DETAILS["volume"]} <br></th>
	</tr>
	<tr>
	<td>{$MT4ACCOUNT_DETAILS["login"]}</td>
	<td>${$MT4ACCOUNT_DETAILS["balance"]}</td>
	<td>${$MT4ACCOUNT_DETAILS["credit"]}</td>
	<td>${$MT4ACCOUNT_DETAILS["equity"]}</td>
	<td>${$MT4ACCOUNT_DETAILS["margin_free"]}</td>
	<td>${$OPEN_PL}</td>
	<td>${$PNLFINAL}</td>
	<td style="color:blue">${$TOTAL_DEPOSIT}<span style="color:#000">{$DEPOSIT_COUNT}</span></td>
	<td style="color:red">${$TOTAL_WITHDRAW}<span style="color:#000">{$WITHDRAW_COUNT}</span></td>
	<td style="color:green">${$MT4ACCOUNT_DETAILS["balance"]}</td>
	<td>8.33</td>
	
	</tr>
	</table>
<div class="box-row">
<div class="col-lg-12 spncls">
<span id="today">Today</span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>
<span></span>

</div>

</div>
   </div>

 
{/strip}
  	