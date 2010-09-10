<?php /* Smarty version 3.0rc1, created on 2010-09-10 02:42:51
         compiled from "views/departamento/templates/relDepartamentos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7234c899b2b483553-92106379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '971f4bc52cf2653c3b903f7f616c04c366a8547c' => 
    array (
      0 => 'views/departamento/templates/relDepartamentos.tpl',
      1 => 1284086488,
    ),
  ),
  'nocache_hash' => '7234c899b2b483553-92106379',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('option')->value=='viewDepartamento'){?>
	<h1>Relat&oacute;rio de Centros</h1>
	<table class="aatable">
		<tr>
			<th>Nome</th>
			<th>Sigla</th>
			<th>Centro</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('departamentos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value){
?>
			<tr>
		    	<td><?php echo $_smarty_tpl->getVariable('departamento')->value->nome;?>
</td>
		    	<td><?php echo $_smarty_tpl->getVariable('departamento')->value->departamentoSigla;?>
</td>
		    	<td><?php echo $_smarty_tpl->getVariable('departamento')->value->centroSigla;?>
</td>
		    </tr>		
		<?php }} ?>
	</table>
	<div id="note">
		<p>Emitido em: <?php echo $_smarty_tpl->getVariable('emissao')->value;?>
</p>
	</div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('option')->value=='listDepartamento'){?>
	<h1>Relat&oacute;rio de Professores por Departamento</h1>
	<span>Escolha aqui o centro</span>
	
	<select id="selectDepartamentos">
		<?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('departamentos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value){
?>
		    <option value="<?php echo $_smarty_tpl->getVariable('departamento')->value->idDepartamento;?>
"><?php echo $_smarty_tpl->getVariable('departamento')->value->nome;?>
</option>
		<?php }} ?>
	</select>
	<br />
	<br />
	<div id="professoresPorDepartamento" ></div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('option')->value=='relProfessoresPorDepartamento'){?>
	<table class="aatable">
		<tr>
			<th>Nome</th>
			<th>Matr&iacute;cula</th>
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
		    </tr>
		<?php }} else { ?>
			<tr>
		    	<td colspan="2">Nenhum professor cadastrado para o centro selecionado</td>
		    </tr>
		<?php } ?>
		
	</table>
	<div id="note">
		<p>Emitido em: <?php echo $_smarty_tpl->getVariable('emissao')->value;?>
</p>
	</div>
<?php }?>