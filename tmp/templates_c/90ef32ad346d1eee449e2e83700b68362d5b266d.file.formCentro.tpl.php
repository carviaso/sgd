<?php /* Smarty version 3.0rc1, created on 2010-09-11 23:42:41
         compiled from "views/centro/templates/formCentro.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7254c8c13f1155422-02054968%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90ef32ad346d1eee449e2e83700b68362d5b266d' => 
    array (
      0 => 'views/centro/templates/formCentro.tpl',
      1 => 1284248538,
    ),
  ),
  'nocache_hash' => '7254c8c13f1155422-02054968',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Centros</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="3" class="ui-state-default ui-corner-all width100" />
<div>Institui&ccedil;&atilde;o</div>
<select id="idInstituicao" class="width100">
<?php  $_smarty_tpl->tpl_vars['instituicao'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('instituicoes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['instituicao']->key => $_smarty_tpl->tpl_vars['instituicao']->value){
?>
	<option value="<?php echo $_smarty_tpl->getVariable('instituicao')->value->idInstituicao;?>
"><?php echo $_smarty_tpl->getVariable('instituicao')->value->nome;?>
</option>
<?php }} ?>
</select>
<p></p>
<p><button id="cadastrarCentro" class="right">Cadastrar</button></p>