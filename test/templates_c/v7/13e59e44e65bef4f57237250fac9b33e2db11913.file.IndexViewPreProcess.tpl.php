<?php /* Smarty version Smarty-3.1.7, created on 2020-03-28 12:18:50
         compiled from "C:\xampp\htdocs\vtigercrm\crm\includes\runtime/../../layouts/v7\modules\Reports\IndexViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11016505815e7ef3521b3103-36805914%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13e59e44e65bef4f57237250fac9b33e2db11913' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\crm\\includes\\runtime/../../layouts/v7\\modules\\Reports\\IndexViewPreProcess.tpl',
      1 => 1585299349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11016505815e7ef3521b3103-36805914',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e7ef3522040e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7ef3522040e')) {function content_5e7ef3522040e($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="container-fluid app-nav"><div class="row"><?php echo $_smarty_tpl->getSubTemplate ("modules/Reports/partials/SidebarHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></nav><div class="clearfix main-container"><div><div class="editViewPageDiv viewContent"><div class="reports-content-area"><?php }} ?>