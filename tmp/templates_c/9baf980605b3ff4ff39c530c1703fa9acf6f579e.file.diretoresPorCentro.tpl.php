<?php /* Smarty version 3.0rc1, created on 2010-08-10 23:11:57
         compiled from "views/centro/templates/diretoresPorCentro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:117714c6206ed071da0-70245515%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9baf980605b3ff4ff39c530c1703fa9acf6f579e' => 
    array (
      0 => 'views/centro/templates/diretoresPorCentro.tpl',
      1 => 1281492713,
    ),
  ),
  'nocache_hash' => '117714c6206ed071da0-70245515',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('option')->value=='listCentros'){?>
	<h1>Relat&oacute;rio de Departamentos por Centro</h1>
	<span>Escolha aqui o centro</span>
	
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
<?php if ($_smarty_tpl->getVariable('option')->value=='diretoresPorCentro'){?>
	<?php  $_smarty_tpl->tpl_vars['diretor'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('diretores')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['diretor']->key => $_smarty_tpl->tpl_vars['diretor']->value){
?>
	    <div><?php echo $_smarty_tpl->getVariable('diretor')->value->nome;?>
</div>
	<?php }} ?>
	<br />
<?php }?>