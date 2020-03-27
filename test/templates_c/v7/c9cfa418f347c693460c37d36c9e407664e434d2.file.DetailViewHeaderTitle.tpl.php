<?php /* Smarty version Smarty-3.1.7, created on 2020-03-21 17:45:30
         compiled from "C:\xampp\htdocs\vtigercrm\includes\runtime/../../layouts/v7\modules\Vtiger\DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:127625de0fc222a8a63-68701855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9cfa418f347c693460c37d36c9e407664e434d2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\includes\\runtime/../../layouts/v7\\modules\\Vtiger\\DetailViewHeaderTitle.tpl',
      1 => 1584767402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '127625de0fc222a8a63-68701855',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5de0fc223396f',
  'variables' => 
  array (
    'MODULE' => 0,
    'MODULE_NAME' => 0,
    'SELECTED_MENU_CATEGORY' => 0,
    'MODULE_MODEL' => 0,
    'RECORD' => 0,
    'NAME_FIELD' => 0,
    'FIELD_MODEL' => 0,
    'ALL_MT4ACCOUNT' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5de0fc223396f')) {function content_5de0fc223396f($_smarty_tpl) {?>

<div class="col-lg-6 col-md-6 col-sm-6"><div class="record-header clearfix"><?php if (!$_smarty_tpl->tpl_vars['MODULE']->value){?><?php $_smarty_tpl->tpl_vars['MODULE'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_NAME']->value, null, 0);?><?php }?><div class="hidden-sm hidden-xs recordImage bg_<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
 app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
"><div class="name"><span><strong><?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getModuleIcon();?>
</strong></span></div></div><div class="recordBasicInfo"><div class="info-row"><h4><span class="recordLabel pushDown" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getField($_smarty_tpl->tpl_vars['NAME_FIELD']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getPermissions()){?><span class="<?php echo $_smarty_tpl->tpl_vars['NAME_FIELD']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value);?>
</span>&nbsp;<?php }?><?php } ?></span></h4></div><?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='mt4account'){?><?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_MT4ACCOUNT']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?><table class="list_table"><tr><th>Balance</th><th>Credit</th><th>Equity</th><th>Free Margin</th><th>Open P&L</th><th>Closed P&L</th><th>Deposit</th><th>Withdraw</th><th>Net Deposit</th><th>User Time (UTC + 02:00)</th><th>Last Deposit <?php echo $_smarty_tpl->tpl_vars['i']->value["open_time"];?>
 <br><!--Not Uploaded<br>-->Trading Volume: <?php echo $_smarty_tpl->tpl_vars['i']->value["volume"];?>
 <br></th></tr><tr><td>$<?php echo $_smarty_tpl->tpl_vars['i']->value[0]["balance"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['i']->value[0]["credit"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['i']->value[0]["equity"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['i']->value[0]["margin_free"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['i']->value["open_pl"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['i']->value["pnlfinal"];?>
</td><td style="color:blue">$<?php echo $_smarty_tpl->tpl_vars['i']->value["totaldep"];?>
<span style="color:#000"><?php echo $_smarty_tpl->tpl_vars['i']->value["withdraw_count"];?>
</span></td><td style="color:red">$<?php echo $_smarty_tpl->tpl_vars['i']->value["totalwith"];?>
<span style="color:#000"><?php echo $_smarty_tpl->tpl_vars['i']->value["withdraw_count"];?>
</span></td><td style="color:green">$<?php echo $_smarty_tpl->tpl_vars['i']->value[0]["balance"];?>
</td><td>8.33</td></tr></table><?php } ?><?php }?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("DetailViewHeaderFieldsView.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></div><?php }} ?>