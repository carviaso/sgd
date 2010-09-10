<?php /* Smarty version 3.0rc1, created on 2010-09-09 04:20:02
         compiled from "views/professor/templates/listarProfessores.tpl" */ ?>
<?php /*%%SmartyHeaderCode:94734c8860726c0d84-63762633%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec550e02dd52aeb7ceaa83da79b1216c3fccec40' => 
    array (
      0 => 'views/professor/templates/listarProfessores.tpl',
      1 => 1284005997,
    ),
  ),
  'nocache_hash' => '94734c8860726c0d84-63762633',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Relat&oacute;rio de Professores</h1>
<table class="aatable">
	<tr>
		<th>Nome</th>
		<th>Matr&iacute;cula</th>
		<!-- 
		<th>Editar</th>
		<th>Excluir</th>
		 -->
	</tr>
	<?php  $_smarty_tpl->tpl_vars['professor'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('professores')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['professor']->key => $_smarty_tpl->tpl_vars['professor']->value){
?>
		<tr>
	    	<td><?php echo $_smarty_tpl->getVariable('professor')->value->nome;?>
 <?php echo $_smarty_tpl->getVariable('professor')->value->sobrenome;?>
</td>
	    	<td><?php echo $_smarty_tpl->getVariable('professor')->value->matricula;?>
</td>
	    	<!-- 
	    	<td><a href="javascript:void(0);">Editar</a></td>
	    	<td><a href="javascript:void(0);">Excluir</a></td>
	    	 -->
	    </tr>
	<?php }} ?>
</table>
<div id="note">
	<p>Emitido em: <?php echo $_smarty_tpl->getVariable('emissao')->value;?>
</p>
</div>