<?php
/* Smarty version 3.1.30, created on 2017-03-22 22:35:34
  from "E:\ICFrame\App\Home\View\user1.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58d28bb65ed439_08319636',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b02bdecd23651354209757a2ed3cb670c4fb56d' => 
    array (
      0 => 'E:\\ICFrame\\App\\Home\\View\\user1.html',
      1 => 1490193320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58d28bb65ed439_08319636 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table border=1>
	<tr>
		<td>用户ID</td>
		<td>用户名</td>
		<td>年龄</td>
	</tr>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['username']->value;?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['age']->value;?>
</td>
	</tr>
</table><?php }
}
