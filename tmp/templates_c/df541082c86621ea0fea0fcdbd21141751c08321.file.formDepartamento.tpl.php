<?php /* Smarty version 3.0rc1, created on 2010-09-09 04:27:27
         compiled from "views/departamento/templates/formDepartamento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162944c88622f270da5-55381127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df541082c86621ea0fea0fcdbd21141751c08321' => 
    array (
      0 => 'views/departamento/templates/formDepartamento.tpl',
      1 => 1283820214,
    ),
  ),
  'nocache_hash' => '162944c88622f270da5-55381127',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Departamentos</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="3" class="ui-state-default ui-corner-all width100" />
<div>Centro</div>
<select id="idCentro" class="width100">
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
<p></p>
<p><button id="cadastrarDepartamento">Cadastrar</button></p>