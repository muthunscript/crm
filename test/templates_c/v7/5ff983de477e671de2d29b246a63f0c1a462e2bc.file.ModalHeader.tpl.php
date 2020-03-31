<?php /* Smarty version Smarty-3.1.7, created on 2020-03-28 09:39:23
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\Vtiger\ModalHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312405ddfd231682f00-46868956%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5ff983de477e671de2d29b246a63f0c1a462e2bc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\ModalHeader.tpl',
      1 => 1585300599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312405ddfd231682f00-46868956',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5ddfd23168918',
  'variables' => 
  array (
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ddfd23168918')) {function content_5ddfd23168918($_smarty_tpl) {?>
<div class="modal-header"><div class="clearfix"><div class="pull-right " ><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div><h4 class="pull-left"><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</h4></div></div>    <?php }} ?>