<?php /* Smarty version 3.0rc1, created on 2010-07-19 02:23:11
         compiled from "views/centro2/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:301994c43e13fb37071-30120321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f2a22b341a1b2817f056819a2a9b14105872150' => 
    array (
      0 => 'views/centro2/templates/index.tpl',
      1 => 1279516944,
    ),
  ),
  'nocache_hash' => '301994c43e13fb37071-30120321',
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
	    	<td><?php echo $_smarty_tpl->tpl_vars['centro']->value['nome'];?>
</td>
	    	<td><?php echo $_smarty_tpl->tpl_vars['centro']->value['sigla'];?>
</td>
	    </tr>
	<?php }} ?>
</table>
<div id="note">
	<p>Emitido em: <?php echo $_smarty_tpl->getVariable('emissao')->value;?>
</p>
</div>