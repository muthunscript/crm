{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
************************************************************************************}
<script>
	$(document).ready(function(){
		var message = '{$smarty.session.message}';
		console.log(message);
		if(message && message != '') {
			$('#comon_popup .modal-header .modal-title').text('Message');
			$('#comon_popup .modal-body p').text(message);
			$('#comon_popup').modal('show');
		}
	});
</script>
{php}
	unset($_SESSION['message']);
{/php}
<div class="app-menu hide" id="app-menu">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 col-xs-2 cursorPointer app-switcher-container">
				<div class="row app-navigator">
					<span id="menu-toggle-action" class="app-icon fa fa-bars"></span>
				</div>
			</div>
		</div>
		{assign var=USER_PRIVILEGES_MODEL value=Users_Privileges_Model::getCurrentUserPrivilegesModel()}
		{assign var=HOME_MODULE_MODEL value=Vtiger_Module_Model::getInstance('Home')}
		{assign var=DASHBOARD_MODULE_MODEL value=Vtiger_Module_Model::getInstance('Dashboard')}
		<div class="app-list row">
			{if $USER_PRIVILEGES_MODEL->hasModulePermission($DASHBOARD_MODULE_MODEL->getId())}
				<div class="menu-item app-item dropdown-toggle" data-default-url="{$HOME_MODULE_MODEL->getDefaultUrl()}">
					<div class="menu-items-wrapper">
						<span class="app-icon-list fa fa-dashboard"></span>
						<span class="app-name textOverflowEllipsis"> {vtranslate('LBL_DASHBOARD',$MODULE)}</span>
					</div>
				</div>
			{/if}
			{assign var=APP_GROUPED_MENU value=Settings_MenuEditor_Module_Model::getAllVisibleModules()}
			{assign var=APP_LIST value=Vtiger_MenuStructure_Model::getAppMenuList()}
			{foreach item=APP_NAME from=$APP_LIST}
				{if $APP_NAME eq 'ANALYTICS'} {continue}{/if}
				{if count($APP_GROUPED_MENU.$APP_NAME) gt 0}
					<div class="dropdown app-modules-dropdown-container">
						{foreach item=APP_MENU_MODEL from=$APP_GROUPED_MENU.$APP_NAME}
							{assign var=FIRST_MENU_MODEL value=$APP_MENU_MODEL}
							{if $APP_MENU_MODEL}
								{break}
							{/if}
						{/foreach}
						{*$APP_MENU_MODEL->name*}
						<div class="menu-item app-item dropdown-toggle app-item-color-{$APP_NAME}" data-app-name="{$APP_NAME}" id="{$APP_NAME}_modules_dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-default-url="{if $APP_MENU_MODEL->name neq 'Management' && $APP_MENU_MODEL->name neq 'Payment Source'}{$FIRST_MENU_MODEL->getDefaultUrl()}&app={$APP_NAME}{else}index.php?module=livechat&view=List&app=SUPPORT{/if}">
							<div class="menu-items-wrapper app-menu-items-wrapper">
								<span class="app-icon-list fa {$APP_IMAGE_MAP.$APP_NAME}"></span>
								<span class="app-name textOverflowEllipsis"> {vtranslate("LBL_$APP_NAME")}</span>
								{if $APP_NAME neq 'BANKDETAILS'}
								<span class="fa fa-chevron-right pull-right"></span>
								{/if}
							</div>
						</div>
						{if $APP_NAME neq 'BANKDETAILS'}
						<ul class="dropdown-menu app-modules-dropdown" aria-labelledby="{$APP_NAME}_modules_dropdownMenu">
							{foreach item=moduleModel key=moduleName from=$APP_GROUPED_MENU[$APP_NAME]}
								{assign var='translatedModuleLabel' value=vtranslate($moduleModel->get('label'),$moduleName )}
								{assign var='custommodelid' value=vtranslate($moduleModel->get('id'),$moduleName )}
								
								

								<li>
									<a href="{if $translatedModuleLabel eq 'Sales'}index.php?module=Reports&view=Detail&record=20{else if $translatedModuleLabel eq 'Management'}index.php?module=allreport&view=List&app=MARKETING&report=management_report{else if $translatedModuleLabel eq 'Trading'}index.php?module=allreport&view=List&app=MARKETING&report=trade_report{else if $translatedModuleLabel eq 'Asset Report'}index.php?module=allreport&view=List&app=MARKETING&report=assert_report{else if $translatedModuleLabel eq 'Client Report'}index.php?module=allreport&view=List&app=MARKETING&report=client_report{else if $translatedModuleLabel neq 'Finance' && $translatedModuleLabel neq 'Marketing'  && $translatedModuleLabel neq 'Management'  && $translatedModuleLabel neq 'Trading' && $translatedModuleLabel neq 'Service Enquiry'  && $translatedModuleLabel neq 'Product Enquiry'}{$moduleModel->getDefaultUrl()}&app={$APP_NAME}{else}index.php?module=livechat&view=List&app=SUPPORT{/if}" title="{$translatedModuleLabel}">
										<span class="module-icon {if $custommodelid gt 52 || $custommodelid eq 27}custom-icon-container{/if} {$custommodelid}">{$moduleModel->getModuleIcon()}</span>
										<span class="module-name textOverflowEllipsis"> {$translatedModuleLabel}</span>
									</a>
								</li>
							{/foreach}
						</ul>
						{/if}
					</div>
				{/if}
			{/foreach}
			<div class="menu-item app-item dropdown-toggle app-item-color-DEPOSIT" data-app-name="DEPOSIT" id="DEPOSIT_modules_dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-default-url="http://20.0.0.2/vtigercrm/index.php?module=deposit&view=List&viewname=57&app=MARKETING&credit=1">
				<div class="menu-items-wrapper app-menu-items-wrapper">
					<span class="app-icon-list fa vicon-deposit"></span>
					<span class="app-name textOverflowEllipsis">Credit</span>
				</div>
			</div>
			<div class="menu-item app-item dropdown-toggle app-item-color-{$APP_NAME}" data-app-name="{$APP_NAME}" id="{$APP_NAME}_modules_dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-default-url="index.php?module=mt4report&view=List&app=SUPPORT&loginid=1331776130&offers=1">
				<div class="menu-items-wrapper app-menu-items-wrapper">
					<span class="app-icon-list fa vicon-mt4trade"></span>
					<span class="app-name textOverflowEllipsis">General Settings</span>
				</div>
			</div>
			<div class="app-list-divider"></div>
			{assign var=MAILMANAGER_MODULE_MODEL value=Vtiger_Module_Model::getInstance('MailManager')}
			{if $USER_PRIVILEGES_MODEL->hasModulePermission($MAILMANAGER_MODULE_MODEL->getId())}
				<div class="menu-item app-item app-item-misc" data-default-url="index.php?module=MailManager&view=List">
					<div class="menu-items-wrapper">
						<span class="app-icon-list fa">{$MAILMANAGER_MODULE_MODEL->getModuleIcon()}</span>
						<span class="app-name textOverflowEllipsis"> {vtranslate('MailManager')}</span>
					</div>
				</div>
			{/if}
			{assign var=DOCUMENTS_MODULE_MODEL value=Vtiger_Module_Model::getInstance('Documents')}
			{if $USER_PRIVILEGES_MODEL->hasModulePermission($DOCUMENTS_MODULE_MODEL->getId())}
				<div class="menu-item app-item app-item-misc" data-default-url="index.php?module=Documents&view=List">
					<div class="menu-items-wrapper">
						<span class="app-icon-list fa">{$DOCUMENTS_MODULE_MODEL->getModuleIcon()}</span>
						<span class="app-name textOverflowEllipsis"> {vtranslate('Documents')}</span>
					</div>
				</div>
			{/if}
			{if $USER_MODEL->isAdminUser()}
				{if vtlib_isModuleActive('ExtensionStore')}
					<div class="menu-item app-item app-item-misc" data-default-url="index.php?module=ExtensionStore&parent=Settings&view=ExtensionStore">
						<div class="menu-items-wrapper">
							<span class="app-icon-list fa fa-shopping-cart"></span>
							<span class="app-name textOverflowEllipsis"> {vtranslate('LBL_EXTENSION_STORE', 'Settings:Vtiger')}</span>
						</div>
					</div>
				{/if}
			{/if}
			{if $USER_MODEL->isAdminUser()}
				<div class="dropdown app-modules-dropdown-container dropdown-compact">
					<div class="menu-item app-item dropdown-toggle app-item-misc" data-app-name="TOOLS" id="TOOLS_modules_dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-default-url="{if $USER_MODEL->isAdminUser()}index.php?module=Vtiger&parent=Settings&view=Index{else}index.php?module=Users&view=Settings{/if}">
						<div class="menu-items-wrapper app-menu-items-wrapper">
							<span class="app-icon-list fa fa-cog"></span>
							<span class="app-name textOverflowEllipsis"> {vtranslate('LBL_SETTINGS', 'Settings:Vtiger')}</span>
							{if $USER_MODEL->isAdminUser()}
								<span class="fa fa-chevron-right pull-right"></span>
							{/if}
						</div>
					</div>
					<ul class="dropdown-menu app-modules-dropdown dropdown-modules-compact" aria-labelledby="{$APP_NAME}_modules_dropdownMenu" data-height="0.27">
						<li>
							<a href="?module=Vtiger&parent=Settings&view=Index">
								<span class="fa fa-cog module-icon"></span>
								<span class="module-name textOverflowEllipsis"> {vtranslate('LBL_CRM_SETTINGS','Vtiger')}</span>
							</a>
						</li>
						<li>
							<a href="?module=Users&parent=Settings&view=List">
								<span class="fa fa-user module-icon"></span>
								<span class="module-name textOverflowEllipsis"> {vtranslate('LBL_MANAGE_USERS','Vtiger')}</span>
							</a>
						</li>
					</ul>
				</div>
			{/if}
		</div>
	</div>
</div>






 <!-- $('#comon_popup').modal('show'); -->
 
<div id="comon_popup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<style>
.modal-header {
    padding: 10px 15px;
    background: #ef5e29;
    color: #FFFFFF;
    text-align: center;
}
.modal-body {
    text-align: center;
    padding: 30px 30px;
    margin: 0px;
}

.modal-body p {
    margin: 0;
}

.modal-footer {
    padding: 0px 15px 30px;
    background: transparent;
    color: #FFFFFF;
    text-align: center;
    border: 0px;
}

.modal-header button.close {
    background-color: #282828;
    padding: 3px 10px;
    position: absolute;
    right: 0;
    top: -7px;
	  display: none;
}

.modal-content {
    position: relative;
    border: 0px;
}

.modal-footer button.btn.btn-default {
    background-color: #ef5e29 !important;
    background-image: unset;
    padding: 8px 35px;
    color: #fff;
	    outline: none;
    border: 0px;
	 font-weight: normal;
	     text-shadow: none;
	  
}
button.btn.btn-default:hover {
    font-weight: normal;
}


</style>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$('#comon_popup').modal('show');
</script>-->