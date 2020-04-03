<?php /* Smarty version Smarty-3.1.7, created on 2020-04-03 18:16:14
         compiled from "C:\xampp\htdocs\vtigercrm\crm\includes\runtime/../../layouts/v7\modules\Contacts\DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20016729505e87301669db72-54914500%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e215c0b9b6844b5d26480568a0f31b4b0cd1c2f9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\vtigercrm\\crm\\includes\\runtime/../../layouts/v7\\modules\\Contacts\\DetailViewHeaderTitle.tpl',
      1 => 1585299344,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20016729505e87301669db72-54914500',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ALL_MT4ACCOUNT' => 0,
    'TOTAL_WITHDRAW' => 0,
    'TOTAL_DEPOSIT' => 0,
    'MT4ACCOUNT_DETAILS' => 0,
    'PNLFINAL' => 0,
    'TOTALDEP' => 0,
    'OPEN_PL' => 0,
    'DEPOSIT_COUNT' => 0,
    'WITHDRAW_COUNT' => 0,
    'VOLUME' => 0,
    'OPEN_TIME' => 0,
    'SELECTED_MENU_CATEGORY' => 0,
    'RECORD' => 0,
    'IMAGE_DETAILS' => 0,
    'IMAGE_INFO' => 0,
    'MODULE_MODEL' => 0,
    'NAME_FIELD' => 0,
    'FIELD_MODEL' => 0,
    'COUNTER' => 0,
    'ONLINESTATUS' => 0,
    'PAGE' => 0,
    'MODULE' => 0,
    'MODULE_NAME' => 0,
    'i' => 0,
    'ONLINE' => 0,
    'CLASS' => 0,
    'myId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e87301676dc1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e87301676dc1')) {function content_5e87301676dc1($_smarty_tpl) {?>



<?php $_smarty_tpl->tpl_vars['ALL_MT4ACCOUNT'] = new Smarty_variable($_smarty_tpl->tpl_vars['ALL_MT4ACCOUNT']->value, null, 0);?>




<?php $_smarty_tpl->tpl_vars['TOTAL_WITHDRAW'] = new Smarty_variable($_smarty_tpl->tpl_vars['TOTAL_WITHDRAW']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['TOTAL_DEPOSIT'] = new Smarty_variable($_smarty_tpl->tpl_vars['TOTAL_DEPOSIT']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['MT4ACCOUNT_DETAILS'] = new Smarty_variable($_smarty_tpl->tpl_vars['MT4ACCOUNT_DETAILS']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['PNLFINAL'] = new Smarty_variable($_smarty_tpl->tpl_vars['PNLFINAL']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['TOTALDEP'] = new Smarty_variable($_smarty_tpl->tpl_vars['TOTALDEP']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['OPEN_PL'] = new Smarty_variable($_smarty_tpl->tpl_vars['OPEN_PL']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['DEPOSIT_COUNT'] = new Smarty_variable($_smarty_tpl->tpl_vars['DEPOSIT_COUNT']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['WITHDRAW_COUNT'] = new Smarty_variable($_smarty_tpl->tpl_vars['WITHDRAW_COUNT']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['VOLUME'] = new Smarty_variable($_smarty_tpl->tpl_vars['VOLUME']->value, null, 0);?>
<?php $_smarty_tpl->tpl_vars['OPEN_TIME'] = new Smarty_variable($_smarty_tpl->tpl_vars['OPEN_TIME']->value, null, 0);?>


<div class="col-lg-6 col-md-6 col-sm-6"><div class="record-header clearfix "><div class="hidden-sm hidden-xs recordImage bgcontacts app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
"><?php $_smarty_tpl->tpl_vars['IMAGE_DETAILS'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECORD']->value->getImageDetails(), null, 0);?><?php  $_smarty_tpl->tpl_vars['IMAGE_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['ITER'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['IMAGE_INFO']->key => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value){
$_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['ITER']->value = $_smarty_tpl->tpl_vars['IMAGE_INFO']->key;
?><?php if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'])){?><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" width="100%" height="100%" align="left"><br><?php }else{ ?><img src="<?php echo vimage_path('summary_Contact.png');?>
" class="summaryImg"/><?php }?><?php } ?><?php if (empty($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)){?><div class="name"><span><strong><?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getModuleIcon();?>
</strong></span></div><?php }?></div><div class="recordBasicInfo" style="position:relative"><div class="info-row" ><h4><span class="recordLabel  pushDown" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype');?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?><?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getField($_smarty_tpl->tpl_vars['NAME_FIELD']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getPermissions()){?><span class="<?php echo $_smarty_tpl->tpl_vars['NAME_FIELD']->value;?>
"><?php if ($_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype')&&$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName()=='firstname'){?><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getDisplayValue('salutationtype');?>
&nbsp;<?php }?><?php echo trim($_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value));?>
</span><?php if ($_smarty_tpl->tpl_vars['COUNTER']->value==0&&($_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value))){?>&nbsp;<?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable($_smarty_tpl->tpl_vars['COUNTER']->value+1, null, 0);?><?php }?><?php }?><?php } ?></span><?php if ($_smarty_tpl->tpl_vars['ONLINESTATUS']->value==1){?><div class="info-row" style="margin-left:15px;top:6px;display: inline-block;width: 10px;" ><div style="width:10px;height:10px;background-color:green;border-radius:50%">.</div></div> <p style="font-size:12px; display:inline-block;">(<?php echo $_smarty_tpl->tpl_vars['PAGE']->value;?>
)</p><?php }?></h4></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("DetailViewHeaderFieldsView.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="info-row"><i class="fa fa-map-marker"></i>&nbsp;<a class="showMap" href="javascript:void(0);" onclick='Vtiger_Index_Js.showMap(this);' data-module='<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getModule()->getName();?>
' data-record='<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getId();?>
'><?php echo vtranslate('LBL_SHOW_MAP',$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</a></div></div></div><?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ALL_MT4ACCOUNT']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?><table class="list_table"><tr><th>Live Accounts</th><th>Balance</th><th>Credit</th><th>Equity</th><th>Free Margin</th><th>Open P&L</th><th>Closed P&L</th><th>Deposit</th><th>Withdraw</th><th>Net Deposit</th><th>User Time (UTC + 02:00)</th><th>Last Deposit <?php echo $_smarty_tpl->tpl_vars['i']->value["open_time"];?>
 <br><!--Not Uploaded<br>-->Trading Volume: <?php echo $_smarty_tpl->tpl_vars['i']->value["volume"];?>
 <br></th></tr><tr><td><?php echo $_smarty_tpl->tpl_vars['i']->value[0]["login"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['i']->value[0]["balance"];?>
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
</td><td>8.33</td></tr></table><?php } ?><!--<table class="list_table"><tr><th>Live Accounts</th><th>Balance</th><th>Credit</th><th>Equity</th><th>Free Margin</th><th>Open P&L</th><th>Closed P&L</th><th>Deposit</th><th>Withdraw</th><th>Net Deposit</th><th>User Time (UTC + 02:00)</th><th>Last Deposit <?php echo $_smarty_tpl->tpl_vars['OPEN_TIME']->value;?>
   <br>Not Uploaded<br>Trading Volume: <?php echo $_smarty_tpl->tpl_vars['VOLUME']->value;?>
 <br></th></tr><tr><td><?php echo $_smarty_tpl->tpl_vars['MT4ACCOUNT_DETAILS']->value["login"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['MT4ACCOUNT_DETAILS']->value["balance"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['MT4ACCOUNT_DETAILS']->value["credit"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['MT4ACCOUNT_DETAILS']->value["equity"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['MT4ACCOUNT_DETAILS']->value["margin_free"];?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['OPEN_PL']->value;?>
</td><td>$<?php echo $_smarty_tpl->tpl_vars['PNLFINAL']->value;?>
</td><td style="color:blue">$<?php echo $_smarty_tpl->tpl_vars['TOTAL_DEPOSIT']->value;?>
<span style="color:#000"><?php echo $_smarty_tpl->tpl_vars['DEPOSIT_COUNT']->value;?>
</span></td><td style="color:red">$<?php echo $_smarty_tpl->tpl_vars['TOTAL_WITHDRAW']->value;?>
<span style="color:#000"><?php echo $_smarty_tpl->tpl_vars['WITHDRAW_COUNT']->value;?>
</span></td><td style="color:green">$<?php echo $_smarty_tpl->tpl_vars['MT4ACCOUNT_DETAILS']->value["balance"];?>
</td><td>8.33</td></tr></table>--><div class="box-row"><div class="col-lg-12 spncls"><?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myId'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['ONLINE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myId']->value = $_smarty_tpl->tpl_vars['i']->key;
?><?php $_smarty_tpl->tpl_vars['CLASS'] = new Smarty_variable('', null, 0);?><?php if ($_smarty_tpl->tpl_vars['i']->value==1){?><?php $_smarty_tpl->tpl_vars['CLASS'] = new Smarty_variable("today", null, 0);?><?php }?><span id=<?php echo $_smarty_tpl->tpl_vars['CLASS']->value;?>
 data-toggle="tooltip" data-placement="bottom" title="<?php echo $_smarty_tpl->tpl_vars['myId']->value;?>
"></span><?php } ?><!--<span id="today">Today</span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>--></div></div></div>
  	<?php }} ?>