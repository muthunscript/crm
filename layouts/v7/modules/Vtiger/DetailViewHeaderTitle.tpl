{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*************************************************************************************}

{strip}
	<div class="col-lg-6 col-md-6 col-sm-6">
		<div class="record-header clearfix">
			{if !$MODULE}
				{assign var=MODULE value=$MODULE_NAME}
			{/if}
			<div class="hidden-sm hidden-xs recordImage bg_{$MODULE} app-{$SELECTED_MENU_CATEGORY}">
				<div class="name"><span><strong>{$MODULE_MODEL->getModuleIcon()}</strong></span></div>
			</div>

			<div class="recordBasicInfo">
				<div class="info-row">
					<h4>
						<span class="recordLabel pushDown" title="{$RECORD->getName()}">
							{foreach item=NAME_FIELD from=$MODULE_MODEL->getNameFields()}
								{assign var=FIELD_MODEL value=$MODULE_MODEL->getField($NAME_FIELD)}
								{if $FIELD_MODEL->getPermissions()}
									<span class="{$NAME_FIELD}">{$RECORD->get($NAME_FIELD)}</span>&nbsp;
								{/if}
							{/foreach}
						</span>
					</h4>
				</div>
				{*********start********}
				{if $MODULE eq 'mt4account'}
						{foreach key=myId item=i from=$ALL_MT4ACCOUNT}
						<table class="list_table">
						<tr>
						
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
						<th>Last Deposit {$i["open_time"]} <br>
						<!--Not Uploaded<br>-->
					   Trading Volume: {$i["volume"]} <br></th>
						</tr>
						<tr>
						
						<td>${$i[0]["balance"]}</td>
						<td>${$i[0]["credit"]}</td>
						<td>${$i[0]["equity"]}</td>
						<td>${$i[0]["margin_free"]}</td>
						<td>${$i["open_pl"]}</td>
						<td>${$i["pnlfinal"]}</td>
						<td style="color:blue">${$i["totaldep"]}<span style="color:#000">{$i["withdraw_count"]}</span></td>
						<td style="color:red">${$i["totalwith"]}<span style="color:#000">{$i["withdraw_count"]}</span></td>
						<td style="color:green">${$i[0]["balance"]}</td>
						<td>8.33</td>
						
						</tr>
						</table>
					   {/foreach}
					{/if}
				{**********end*********}
				{include file="DetailViewHeaderFieldsView.tpl"|vtemplate_path:$MODULE}
			</div>
		</div>
	</div>
{/strip}