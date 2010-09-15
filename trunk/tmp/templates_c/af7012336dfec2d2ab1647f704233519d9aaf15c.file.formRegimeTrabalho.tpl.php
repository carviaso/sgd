<?php /* Smarty version 3.0rc1, created on 2010-09-11 23:42:45
         compiled from "views/regimeTrabalho/templates/formRegimeTrabalho.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111904c8c13f5ac3191-09766973%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af7012336dfec2d2ab1647f704233519d9aaf15c' => 
    array (
      0 => 'views/regimeTrabalho/templates/formRegimeTrabalho.tpl',
      1 => 1284248480,
    ),
  ),
  'nocache_hash' => '111904c8c13f5ac3191-09766973',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Regime de Trabalho</h1>
<div>Descri&ccedil;&atilde;o</div>
<input type="text" id="descricao" name="descricao" value="" maxlength="45" class="ui-state-default ui-corner-all width100" />
<div>Quantidade de Horas</div>
<input type="text" id="quantidadeHoras" name="quantidadeHoras" value="" maxlength="11" class="ui-state-default ui-corner-all width100" />
<div>Dedica&ccedil;&atilde;o exclusiva</div>
<div id="radio">
	<label for="dedicacaoExclusivaSim">Sim</label>
	<input type="radio" id="dedicacaoExclusivaSim" name="dedicacaoExclusiva" value="1" />
	<label for="dedicacaoExclusivaNao">N&atilde;o</label>
	<input type="radio" id="dedicacaoExclusivaNao" name="dedicacaoExclusiva" value="0" />
</div>
<p></p>
<p><button id="cadastrarRegimeTrabalho" class="right">Cadastrar</button></p>