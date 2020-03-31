<?php /* Smarty version Smarty-3.1.7, created on 2020-03-28 12:29:29
         compiled from "C:\xampp\htdocs\vtigercrm\crm\includes\runtime/../../layouts/v7\modules\Calendar\partials\SidebarHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4319170885e7ef5d195de74-72995932%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdc10da94473ebc91d005db75e07999efb2b1314' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\crm\\includes\\runtime/../../layouts/v7\\modules\\Calendar\\partials\\SidebarHeader.tpl',
      1 => 1585299344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4319170885e7ef5d195de74-72995932',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SELECTED_MENU_CATEGORY' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e7ef5d198168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7ef5d198168')) {function content_5e7ef5d198168($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['APP_IMAGE_MAP'] = new Smarty_variable(Vtiger_MenuStructure_Model::getAppIcons(), null, 0);?>
<div class="col-sm-12 col-xs-12 app-indicator-icon-container app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
">
	<div class="row" title="<?php echo strtoupper(vtranslate("LBL_CALENDAR",$_smarty_tpl->tpl_vars['MODULE']->value));?>
">
		<span class="app-indicator-icon fa fa-calendar"></span>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/SidebarAppMenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>