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

<div class="col-sm-12 col-xs-12 ">
	{if $MODULE neq 'EmailTemplates' && $SEARCH_MODE_RESULTS neq true}
		{assign var=LEFTPANELHIDE value=$CURRENT_USER_MODEL->get('leftpanelhide')}
		<div class="essentials-toggle" title="{vtranslate('LBL_LEFT_PANEL_SHOW_HIDE', 'Vtiger')}">
			<span class="essentials-toggle-marker fa {if $LEFTPANELHIDE eq '1'}fa-chevron-right{else}fa-chevron-left{/if} cursorPointer"></span>
		</div>
	{/if}
	<input type="hidden" name="view" id="view" value="{$VIEW}" />
	<input type="hidden" name="cvid" value="{$VIEWID}" />
	<input type="hidden" name="pageStartRange" id="pageStartRange" value="{$PAGING_MODEL->getRecordStartRange()}" />
	<input type="hidden" name="pageEndRange" id="pageEndRange" value="{$PAGING_MODEL->getRecordEndRange()}" />
	<input type="hidden" name="previousPageExist" id="previousPageExist" value="{$PAGING_MODEL->isPrevPageExists()}" />
	<input type="hidden" name="nextPageExist" id="nextPageExist" value="{$PAGING_MODEL->isNextPageExists()}" />
	<input type="hidden" name="alphabetSearchKey" id="alphabetSearchKey" value= "{$MODULE_MODEL->getAlphabetSearchField()}" />
	<input type="hidden" name="Operator" id="Operator" value="{$OPERATOR}" />
	<input type="hidden" name="totalCount" id="totalCount" value="{$LISTVIEW_COUNT}" />
	<input type='hidden' name="pageNumber" value="{$PAGE_NUMBER}" id='pageNumber'>
	<input type='hidden' name="pageLimit" value="{$PAGING_MODEL->getPageLimit()}" id='pageLimit'>
	<input type="hidden" name="noOfEntries" value="{$LISTVIEW_ENTRIES_COUNT}" id="noOfEntries">
	<input type="hidden" name="currentSearchParams" value="{Vtiger_Util_Helper::toSafeHTML(Zend_JSON::encode($SEARCH_DETAILS))}" id="currentSearchParams" />
	<input type="hidden" name="currentTagParams" value="{Vtiger_Util_Helper::toSafeHTML(Zend_JSON::encode($TAG_DETAILS))}" id="currentTagParams" />
	<input type="hidden" name="noFilterCache" value="{$NO_SEARCH_PARAMS_CACHE}" id="noFilterCache" >
	<input type="hidden" name="orderBy" value="{$ORDER_BY}" id="orderBy">
	<input type="hidden" name="sortOrder" value="{$SORT_ORDER}" id="sortOrder">
	<input type="hidden" name="list_headers" value='{$LIST_HEADER_FIELDS}'/>
	<input type="hidden" name="tag" value="{$CURRENT_TAG}" />
	<input type="hidden" name="folder_id" value="{$FOLDER_ID}" />
	<input type="hidden" name="folder_value" value="{$FOLDER_VALUE}" />
	<input type="hidden" name="viewType" value="{$VIEWTYPE}" />
	<input type="hidden" name="app" id="appName" value="{$SELECTED_MENU_CATEGORY}">
	<input type="hidden" id="isExcelEditSupported" value="{if $MODULE_MODEL->isExcelEditAllowed()}yes{else}no{/if}" />
	{if !empty($PICKIST_DEPENDENCY_DATASOURCE)}
		<input type="hidden" name="picklistDependency" value='{Vtiger_Util_Helper::toSafeHTML($PICKIST_DEPENDENCY_DATASOURCE)}' />
	{/if}
	{if !$SEARCH_MODE_RESULTS}
		{include file="ListViewActions.tpl"|vtemplate_path:$MODULE}
	{/if}

	<div id="table-content" class="table-container">
		<form name='list' id='listedit' action='' onsubmit="return false;">
			<table id="listview-table" class="table {if $LISTVIEW_ENTRIES_COUNT eq '0'}listview-table-norecords {/if} listview-table ">
				<thead>
					<tr class="listViewContentHeader">
					{******start******}
					
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Deal" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Date&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Login" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Registrations&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Open Time" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Active Users&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Type" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Opened Trades&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Symbol" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Close Trades&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Lots" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Volume&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Open Price" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Total P&L&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="S/L" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Deposit&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="T/P" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Withdrawls&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Open Price" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Net Deposit&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Close Time" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Credits&nbsp;
						</a>
					</th>
					<th>
					<a href="#" class="listViewContentHeaderValues" data-nextsortorderval="ASC" data-columnname="Close Time" >
					<i class="fa fa-sort customsort"></i>
					&nbsp;Volume (lots)&nbsp;
						</a>
					</th>
					
					
					{******end********}
					
						
				
				</tr>

				
				</thead>
				<tbody class="overflow-y">

				
					{*{foreach item=LISTVIEW_ENTRY from=$LISTVIEW_ENTRIES name=listview}*}
					{foreach from=$LISTVIEW_ENTRIES name=listview key=myId item=LISTVIEW_ENTRY}
						
						
						<tr class="listViewEntries" >
							<td class = "listViewRecordActions">
								
								{$myId|date_format:"%D"}
							</td>
							<td class = "listViewRecordActions">
							
							{if array_key_exists($myId, $USER_REGISTER)}
								{$USER_REGISTER[$myId]}
							{else}
								0
							{/if}
							</td>
							<td class = "listViewRecordActions">
								1
							</td>
							<td class = "listViewRecordActions">
								{$LISTVIEW_ENTRY["open_order"]}
							</td>
							<td class = "listViewRecordActions">
								{$LISTVIEW_ENTRY["close_order"]}
							</td>
							<td class = "listViewRecordActions">
							{if $LISTVIEW_ENTRY["volume_lot"] eq '' or $LISTVIEW_ENTRY["volume_lot"] eq 0}
							0
							{else}
							{$LISTVIEW_ENTRY["volume_lot"]}
							{/if}
								</td>
							<td class = "listViewRecordActions">
								{$LISTVIEW_ENTRY["pnlfinal"]}
							</td>
							<td class = "listViewRecordActions">
								{$LISTVIEW_ENTRY["totaldep"]}
							</td>
							<td class = "listViewRecordActions">
								{$LISTVIEW_ENTRY["totalwith"]}
							</td>
							<td class = "listViewRecordActions">
								{$LISTVIEW_ENTRY["totaldep"]+$LISTVIEW_ENTRY["totalwith"]}
							</td>
							<td class = "listViewRecordActions">
								1
							</td>
							<td class = "listViewRecordActions">
							{if $LISTVIEW_ENTRY["volume_lot"] eq '' or $LISTVIEW_ENTRY["volume_lot"] eq 0}
							0
							{else}
							{$LISTVIEW_ENTRY["volume_lot"]/100}
							{/if}
								
							</td>
					</tr>
				{/foreach}
				{*{if $LISTVIEW_ENTRIES_COUNT eq '0'}
					<tr class="emptyRecordsDiv">
						{assign var=COLSPAN_WIDTH value={count($LISTVIEW_HEADERS)}+1}
						<td colspan="{$COLSPAN_WIDTH}">
							<div class="emptyRecordsContent">
								{assign var=SINGLE_MODULE value="SINGLE_$MODULE"}
								{vtranslate('LBL_NO')} {vtranslate($MODULE, $MODULE)} {vtranslate('LBL_FOUND')}.
								{if $IS_CREATE_PERMITTED}
									<a style="color:blue" href="{$MODULE_MODEL->getCreateRecordUrl()}"> {vtranslate('LBL_CREATE')}</a>
									{if Users_Privileges_Model::isPermitted($MODULE, 'Import') && $LIST_VIEW_MODEL->isImportEnabled()}
										{vtranslate('LBL_OR', $MODULE)}
										<a style="color:blue" href="#" onclick="return Vtiger_Import_Js.triggerImportAction()">{vtranslate('LBL_IMPORT', $MODULE)}</a>
										{vtranslate($MODULE, $MODULE)}
									{else}
										{vtranslate($SINGLE_MODULE, $MODULE)}
									{/if}
								{/if}
							</div>
						</td>
					</tr>
				{/if}*}
				</tbody>
			</table>
		</form>
	</div>
	<div id="scroller_wrapper" class="bottom-fixed-scroll">
		<div id="scroller" class="scroller-div"></div>
	</div>
</div>
