<?php /* Smarty version 3.0rc1, created on 2010-09-23 05:04:39
         compiled from "views/centro/templates/relDiretoresCentros.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273824c9adfe748c475-28330164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6472a7619fa37392f053c8845c3a4df08c461628' => 
    array (
      0 => 'views/centro/templates/relDiretoresCentros.tpl',
      1 => 1285218256,
    ),
  ),
  'nocache_hash' => '273824c9adfe748c475-28330164',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('option')->value=='listCentros'){?>
	<h1>Relat&oacute;rio de Diretores por Centro</h1>
	<label for="selectCentros">Escolha o centro</label>
	<select id="selectCentros" class="select ui-corner-all width100">
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
<?php if ($_smarty_tpl->getVariable('option')->value=='diretoresPorCentro'){?>
	<table class="aatable">
		<tr>
			<th>Nome</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['diretor'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('diretores')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['diretor']->key => $_smarty_tpl->tpl_vars['diretor']->value){
?>
			<tr>
		    	<td><?php echo $_smarty_tpl->getVariable('diretor')->value->nome;?>
</td>
		    </tr>	    
		<?php }} else { ?>
			<tr>
		    	<td>Nenhum diretor cadastrado para o centro selecionado</td>
		    </tr>
		<?php } ?>
	</table>	
<?php }?>