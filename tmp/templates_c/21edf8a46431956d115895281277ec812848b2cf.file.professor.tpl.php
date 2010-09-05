<?php /* Smarty version 3.0rc1, created on 2010-09-04 07:57:07
         compiled from "views/professor/templates/professor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179674c81fbd3f417c1-70442211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21edf8a46431956d115895281277ec812848b2cf' => 
    array (
      0 => 'views/professor/templates/professor.tpl',
      1 => 1283586994,
    ),
  ),
  'nocache_hash' => '179674c81fbd3f417c1-70442211',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Professor</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sobrenome</div>
<input type="text" id="sobrenome" name="sobrenome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Data de nascimento</div>
<input type="text" id="dataNascimento" class="ui-state-default ui-corner-all width100" />
<div>Matr&iacute;cula</div>
<input type="text" id="matricula" name="Matricula" maxlength="255" value="" class="ui-state-default ui-corner-all width100" />
<div>Siape</div>
<input type="text" id="siape" name="Siape" maxlength="255" value="" class="ui-state-default ui-corner-all width100" />
<div>Data da admiss&atilde;o</div>
<input type="text" id="dataAdmissao" class="ui-state-default ui-corner-all width100" />
<div>Data da admiss&atilde;o na Ufsc</div>
<input type="text" id="dataAdmissaoUfsc" class="ui-state-default ui-corner-all width100" />
<div>Aposentado</div>
<div id="radio">
	<label for="aposentadoSim">Sim</label>
	<input type="radio" id="aposentadoSim" name="aposentado" value="1" />
	<label for="aposentadoNao">N&atilde;o</label>
	<input type="radio" id="aposentadoNao" name="aposentado" value="0" />
</div>
<div>Data prevista da aposentadoria</div>
<input type="text" id="dataPrevistaAposentadoria" class="ui-state-default ui-corner-all width100" />
<div>Data efetiva da aposentadoria</div>
<input type="text" id="dataEfetivaAposentadoria" class="ui-state-default ui-corner-all width100" />
<div>Departamento</div>
<select id="departamento" class="width100">
	<?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('departamentos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('departamento')->value->idDepartamento;?>
"><?php echo $_smarty_tpl->getVariable('departamento')->value->nome;?>
</option>
	<?php }} ?>
</select>
<div>Categoria Funcional Inicial<div>
<select id="categoriaFuncionalInicial" class="width100">
	<?php  $_smarty_tpl->tpl_vars['categoriaFuncional'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categoriasFuncionais')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoriaFuncional']->key => $_smarty_tpl->tpl_vars['categoriaFuncional']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->idCategoriaFuncional;?>
"><?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->descricao;?>
</option>
	<?php }} ?>
</select>
<div>Categoria Funcional Atual<div>
<select id="categoriaFuncionalAtual" class="width100">
	<?php  $_smarty_tpl->tpl_vars['categoriaFuncional'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categoriasFuncionais')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoriaFuncional']->key => $_smarty_tpl->tpl_vars['categoriaFuncional']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->idCategoriaFuncional;?>
"><?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->descricao;?>
</option>
	<?php }} ?>
</select>
<div>Tipo de Titula&ccedil;&atilde;o<div>
<select id="titulacao" class="width100">
	<?php  $_smarty_tpl->tpl_vars['titulacao'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('titulacoes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['titulacao']->key => $_smarty_tpl->tpl_vars['titulacao']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('titulacao')->value->idTipoTitulacao;?>
"><?php echo $_smarty_tpl->getVariable('titulacao')->value->descricao;?>
</option>
	<?php }} ?>
</select>
<div>Categoria Funcional Refer&ecirc;ncia<div>
<select id="categoriaFuncionalReferencia" class="width100">
	<?php  $_smarty_tpl->tpl_vars['categoriaFuncional'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categoriasFuncionais')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoriaFuncional']->key => $_smarty_tpl->tpl_vars['categoriaFuncional']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->idCategoriaFuncional;?>
"><?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->descricao;?>
</option>
	<?php }} ?>
</select>
<div>Cargo<div>
<select id="cargo" class="width100">
	<?php  $_smarty_tpl->tpl_vars['cargo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cargos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cargo']->key => $_smarty_tpl->tpl_vars['cargo']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('cargo')->value->idCargo;?>
"><?php echo $_smarty_tpl->getVariable('cargo')->value->descricaoCargo;?>
</option>
	<?php }} ?>
</select>
<div>Situacao<div>
<select id="situacao" class="width100">
	<?php  $_smarty_tpl->tpl_vars['situacao'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('situacoes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['situacao']->key => $_smarty_tpl->tpl_vars['situacao']->value){
?>
		<option value="<?php echo $_smarty_tpl->getVariable('situacao')->value->idSituacao;?>
"><?php echo $_smarty_tpl->getVariable('situacao')->value->descricaoSituacao;?>
</option>
	<?php }} ?>
</select>
<div>&nbsp;<div>
<div><button id="cadastrarProfessor" class="right">Cadastrar</button><div>