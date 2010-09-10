<?php /* Smarty version 3.0rc1, created on 2010-09-08 06:16:56
         compiled from "views/professor/templates/formAfastamentoProfessor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207704c872a58da4f51-55873692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8bb9d9d5bdae9c1dbfb57282ffedefc59c1b5232' => 
    array (
      0 => 'views/professor/templates/formAfastamentoProfessor.tpl',
      1 => 1283926607,
    ),
  ),
  'nocache_hash' => '207704c872a58da4f51-55873692',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Afastamento de Professor</h1>
<div>Professor</div>
<select id="idProfessor" class="width100">
	<?php  $_smarty_tpl->tpl_vars['professor'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('professores')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['professor']->key => $_smarty_tpl->tpl_vars['professor']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('professor')->value->id_professor;?>
"><?php echo $_smarty_tpl->getVariable('professor')->value->nome;?>
</option>
	<?php }} ?>
</select>
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
<div>Tipo de Afastamento</div>
<select id="idTipoAfastamento" class="width100">
<?php  $_smarty_tpl->tpl_vars['tipoAfastamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tiposAfastamento')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tipoAfastamento']->key => $_smarty_tpl->tpl_vars['tipoAfastamento']->value){
?>
	<option value="<?php echo $_smarty_tpl->getVariable('tipoAfastamento')->value->idTipoAfastamento;?>
"><?php echo $_smarty_tpl->getVariable('tipoAfastamento')->value->descricao;?>
</option>
<?php }} ?>
</select>
<div>Tipo de Titula&ccedil;&atilde;o<div>
<select id="idTipoTitulacao" class="width100">
	<?php  $_smarty_tpl->tpl_vars['tipoTitulacao'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('tiposTitulacao')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['tipoTitulacao']->key => $_smarty_tpl->tpl_vars['tipoTitulacao']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('tipoTitulacao')->value->idTipoTitulacao;?>
"><?php echo $_smarty_tpl->getVariable('tipoTitulacao')->value->descricao;?>
</option>
	<?php }} ?>
</select>
<div>Data de in&iacute;cio</div>
<input type="text" id="dataInicio" class="ui-state-default ui-corner-all width100" />
<div>Data de previs&atilde;o de t&eacute;rmino</div>
<input type="text" id="dataPrevisaoTermino" class="ui-state-default ui-corner-all width100" />
<div class="mesesDuracao">Meses de duracao</div>
<div>Processo</div>
<input type="text" id="processo" value="" maxlength="45" class="ui-state-default ui-corner-all width100" />
<div>Prorroga&ccedil;&atilde;o</div>
<div id="radio">
	<label for="prorrogacaoSim">Sim</label>
	<input type="radio" id="prorrogacaoSim" name="prorrogacao" value="1" />
	<label for="prorrogacaoNao">N&atilde;o</label>
	<input type="radio" id="prorrogacaoNao" name="prorrogacao" value="0" />
</div>
<div>Observa&ccedil;&atilde;o</div>
<textarea id="observacao" rows="6" class="ui-state-default ui-corner-all width100"></textarea>
<div>&nbsp;<div>
<div><button id="cadastrarAfastamentoProfessor" class="right">Cadastrar</button><div>