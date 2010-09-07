<?php /* Smarty version 3.0rc1, created on 2010-09-07 03:42:07
         compiled from "views/centro/templates/centro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:53664c7dd2d3b6bd57-68356528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6104f912a855ed643bdcb1b041a59e7b2901696a' => 
    array (
      0 => 'views/centro/templates/centro.tpl',
      1 => 1283817612,
    ),
  ),
  'nocache_hash' => '53664c7dd2d3b6bd57-68356528',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Relat&oacute;rio de Centros</h1>
<table class="aatable">
	<tr>
		<th>Nome</th>
		<th>Sigla</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['centro'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('centros')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['centro']->key => $_smarty_tpl->tpl_vars['centro']->value){
?>
		<tr>
	    	<td><?php echo $_smarty_tpl->getVariable('centro')->value->nome;?>
</td>
	    	<td><?php echo $_smarty_tpl->getVariable('centro')->value->sigla;?>
</td>
	    </tr>
	<?php }} ?>
</table>
<div id="note">
	<p>Emitido em: <?php echo $_smarty_tpl->getVariable('emissao')->value;?>
</p>
</div>