<?php /* Smarty version 3.0rc1, created on 2010-09-07 00:11:53
         compiled from "views/pais/templates/pais.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321154c858349ba9ad4-08675176%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90300e751e6b7e8ceaaffa46764509296c2c892e' => 
    array (
      0 => 'views/pais/templates/pais.tpl',
      1 => 1283818165,
    ),
  ),
  'nocache_hash' => '321154c858349ba9ad4-08675176',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Pa&iacute;s</h1>
<p>
	<div>Nome</div>
	<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
	<div>Sigla</div>     
	<input type="text" id="sigla" name="sigla" value="" maxlength="3" class="ui-state-default ui-corner-all width100" />
</p>
<p></p>
<p>
	<button id="cadastrarPais">Cadastrar</button>
</p>