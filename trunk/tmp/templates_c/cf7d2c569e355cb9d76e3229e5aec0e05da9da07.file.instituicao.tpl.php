<?php /* Smarty version 3.0rc1, created on 2010-09-11 23:42:40
         compiled from "views/instituicao/templates/instituicao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:193404c8c13f00d3e16-40945802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf7d2c569e355cb9d76e3229e5aec0e05da9da07' => 
    array (
      0 => 'views/instituicao/templates/instituicao.tpl',
      1 => 1284248518,
    ),
  ),
  'nocache_hash' => '193404c8c13f00d3e16-40945802',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Institui&ccedil;&otilde;es</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="10" class="ui-state-default ui-corner-all width100" />
<div>Munic&iacute;pio</div>
<select id="idMunicipio" class="width100">
<?php  $_smarty_tpl->tpl_vars['municipio'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('municipios')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['municipio']->key => $_smarty_tpl->tpl_vars['municipio']->value){
?>
	<option value="<?php echo $_smarty_tpl->getVariable('municipio')->value->idMunicipio;?>
"><?php echo $_smarty_tpl->getVariable('municipio')->value->nome;?>
</option>
<?php }} ?>
</select>
<p></p>
<p><button id="cadastrarInstituicao" class="right">Cadastrar</button></p>