<?php /* Smarty version Smarty-3.1.7, created on 2020-01-23 11:54:20
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\Invoice\ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:156405e29896cad5f84-02918296%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '92bc8752bfad2e760f8bedc23b71127ba18ef558' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\Invoice\\ModuleSummaryView.tpl',
      1 => 1572870387,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '156405e29896cad5f84-02918296',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e29896cae3c1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e29896cae3c1')) {function content_5e29896cae3c1($_smarty_tpl) {?>
<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>