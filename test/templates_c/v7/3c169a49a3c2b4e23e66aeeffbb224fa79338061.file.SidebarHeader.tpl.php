<?php /* Smarty version Smarty-3.1.7, created on 2020-04-17 20:19:26
         compiled from "C:\xampp\htdocs\crm\includes\runtime/../../layouts/v7\modules\riskinstruments\partials\SidebarHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4626564435e99c1f6be65c6-72508148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c169a49a3c2b4e23e66aeeffbb224fa79338061' => 
    array (
      0 => 'C:\\xampp\\htdocs\\crm\\includes\\runtime/../../layouts/v7\\modules\\riskinstruments\\partials\\SidebarHeader.tpl',
      1 => 1587119364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4626564435e99c1f6be65c6-72508148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SELECTED_MENU_CATEGORY' => 0,
    'MODULE' => 0,
    'APP_IMAGE_MAP' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e99c1f6bfe3d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e99c1f6bfe3d')) {function content_5e99c1f6bfe3d($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['APP_IMAGE_MAP'] = new Smarty_variable(Vtiger_MenuStructure_Model::getAppIcons(), null, 0);?>

<div class="col-sm-12 col-xs-12 app-indicator-icon-container app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
">
	<div class="row" title="<?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='Home'||!$_smarty_tpl->tpl_vars['MODULE']->value){?> <?php echo vtranslate('LBL_DASHBOARD');?>
 <?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
<?php }?>">
		<span class="app-indicator-icon fa <?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='Home'||!$_smarty_tpl->tpl_vars['MODULE']->value){?>fa-dashboard<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['APP_IMAGE_MAP']->value[$_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value];?>
<?php }?>"></span>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/SidebarAppMenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>