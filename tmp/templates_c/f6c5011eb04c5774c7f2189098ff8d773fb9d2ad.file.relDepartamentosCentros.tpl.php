<?php /* Smarty version 3.0rc1, created on 2010-09-10 02:42:37
         compiled from "views/centro/templates/relDepartamentosCentros.tpl" */ ?>
<?php /*%%SmartyHeaderCode:298904c899b1d05aa18-91228065%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6c5011eb04c5774c7f2189098ff8d773fb9d2ad' => 
    array (
      0 => 'views/centro/templates/relDepartamentosCentros.tpl',
      1 => 1284086553,
    ),
  ),
  'nocache_hash' => '298904c899b1d05aa18-91228065',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('option')->value=='listCentros'){?>
	<h1>Relat&oacute;rio de Departamento por Centro</h1>
	<label for="selectCentros">Escolha o centro</label>
	<select id="selectCentros">
		<?php  $_smarty_tpl->tpl_vars['centro'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('centros')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['centro']->key => $_smarty_tpl->tpl_vars['centro']->value){
?>
		    <option value="<?php echo $_smarty_tpl->getVariable('centro')->value->idCentro;?>
"><?php echo $_smarty_tpl->getVariable('centro')->value->nome;?>
</option>
		<?php }} ?>
	</select>
	<br />
	<br />
	<div id="departamentosPorCentro" ></div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('option')->value=='departamentosPorCentro'){?>
	<table class="aatable">
		<tr>
			<th>Nome</th>
			<th>Sigla</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('departamentos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value){
?>
			<tr>
		    	<td><?php echo $_smarty_tpl->getVariable('departamento')->value->nome;?>
</td>
		    	<td><?php echo $_smarty_tpl->getVariable('departamento')->value->sigla;?>
</td>
		    </tr>	    
		<?php }} else { ?>
			<tr>
		    	<td colspan="2">Nenhum departamento cadastrado para o centro selecionado</td>
		    </tr>
		<?php } ?>
	</table>	
<?php }?>