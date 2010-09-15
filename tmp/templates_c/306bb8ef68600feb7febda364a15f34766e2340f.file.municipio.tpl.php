<?php /* Smarty version 3.0rc1, created on 2010-09-11 23:42:38
         compiled from "views/municipio/templates/municipio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:309114c8c13eec3a7c1-75106407%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '306bb8ef68600feb7febda364a15f34766e2340f' => 
    array (
      0 => 'views/municipio/templates/municipio.tpl',
      1 => 1284248512,
    ),
  ),
  'nocache_hash' => '309114c8c13eec3a7c1-75106407',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Munic&iacute;pio</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>UF</div>     
<select id="idUf" class="width100">
<?php  $_smarty_tpl->tpl_vars['uf'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('ufs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['uf']->key => $_smarty_tpl->tpl_vars['uf']->value){
?>
	<option value="<?php echo $_smarty_tpl->getVariable('uf')->value->idUf;?>
"><?php echo $_smarty_tpl->getVariable('uf')->value->nome;?>
</option>
<?php }} ?>
</select>
<p></p>
<p>
	<button id="cadastrarMunicipio" class="right">Cadastrar</button>
</p>