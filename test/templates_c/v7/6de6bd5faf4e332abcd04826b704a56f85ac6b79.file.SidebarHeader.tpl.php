<?php /* Smarty version Smarty-3.1.7, created on 2020-03-31 12:42:59
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\Settings\Vtiger\SidebarHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:258885de11b02081ef0-82031242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6de6bd5faf4e332abcd04826b704a56f85ac6b79' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\Settings\\Vtiger\\SidebarHeader.tpl',
      1 => 1585300598,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '258885de11b02081ef0-82031242',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5de11b0208df6',
  'variables' => 
  array (
    'SELECTED_MENU_CATEGORY' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5de11b0208df6')) {function content_5de11b0208df6($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['APP_IMAGE_MAP'] = new Smarty_variable(Vtiger_MenuStructure_Model::getAppIcons(), null, 0);?>
<div class="col-sm-12 col-xs-12 app-indicator-icon-container app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
">
    <div class="row" title="<?php echo vtranslate("LBL_SETTINGS",$_smarty_tpl->tpl_vars['MODULE']->value);?>
">
        <span class="app-indicator-icon fa fa-cog"></span>
    </div>
</div>
    
<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/SidebarAppMenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>