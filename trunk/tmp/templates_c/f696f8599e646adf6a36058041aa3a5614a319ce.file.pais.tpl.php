<?php /* Smarty version 3.0rc1, created on 2010-09-04 20:44:15
         compiled from "views/jjj/templates/pais.tpl" */ ?>
<?php /*%%SmartyHeaderCode:60224c82af9f70cc70-91475368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f696f8599e646adf6a36058041aa3a5614a319ce' => 
    array (
      0 => 'views/jjj/templates/pais.tpl',
      1 => 1283632853,
    ),
  ),
  'nocache_hash' => '60224c82af9f70cc70-91475368',
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