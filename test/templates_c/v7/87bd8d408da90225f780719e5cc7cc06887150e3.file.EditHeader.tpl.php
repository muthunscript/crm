<?php /* Smarty version Smarty-3.1.7, created on 2020-03-28 12:21:03
         compiled from "C:\xampp\htdocs\vtigercrm\crm\includes\runtime/../../layouts/v7\modules\Reports\EditHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6327193865e7ef3d72e8f78-05612623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87bd8d408da90225f780719e5cc7cc06887150e3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\crm\\includes\\runtime/../../layouts/v7\\modules\\Reports\\EditHeader.tpl',
      1 => 1585299349,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6327193865e7ef3d72e8f78-05612623',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'LABELS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e7ef3d72f0df',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7ef3d72f0df')) {function content_5e7ef3d72f0df($_smarty_tpl) {?>
<div class="editContainer" style="padding-left: 2%;padding-right: 2%"><div class="row"><?php $_smarty_tpl->tpl_vars['LABELS'] = new Smarty_variable(array("step1"=>"LBL_REPORT_DETAILS","step2"=>"LBL_SELECT_COLUMNS","step3"=>"LBL_FILTERS"), null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("BreadCrumbs.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('ACTIVESTEP'=>1,'BREADCRUMB_LABELS'=>$_smarty_tpl->tpl_vars['LABELS']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value), 0);?>
</div><div class="clearfix"></div><?php }} ?>