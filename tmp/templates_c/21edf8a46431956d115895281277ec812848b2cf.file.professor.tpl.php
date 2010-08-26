<?php /* Smarty version 3.0rc1, created on 2010-08-26 01:33:13
         compiled from "views/professor/templates/professor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:266944c75ee891fdd33-80406277%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21edf8a46431956d115895281277ec812848b2cf' => 
    array (
      0 => 'views/professor/templates/professor.tpl',
      1 => 1282797185,
    ),
  ),
  'nocache_hash' => '266944c75ee891fdd33-80406277',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Professor</h1>
<table class="aatable">
	<tr>
		<th colspan="2">Cadastro de novo professor</th>
	</tr>
	<tr>
		<td>Nome</td>
		<td><input type="text" id="nome" name="nome" value="" maxlength="100" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Sobrenome</td>
		<td><input type="text" id="sobrenome" name="sobrenome" value="" maxlength="100" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Data de nascimento</td>
		<td><input type="text" id="dataNascimento" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Matr&iacute;cula</td>
		<td><input type="text" id="matricula" name="Matricula" maxlength="255" value="" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Siape</td>
		<td><input type="text" id="siape" name="Siape" maxlength="255" value="" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Data da admiss&atilde;o</td>
		<td><input type="text" id="dataAdmissao" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Data da admiss&atilde;o na Ufsc</td>
		<td><input type="text" id="dataAdmissaoUfsc" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Aposentado</td>
		<td>
			<div id="radio">
				<label for="aposentadoSim">Sim</label>
				<input type="radio" id="aposentadoSim" name="aposentado" value="1" />
				<label for="aposentadoNao">N&atilde;o</label>
				<input type="radio" id="aposentadoNao" name="aposentado" value="0" />
			</div>
		</td>
	</tr>
	<tr>
		<td>Data prevista da aposentadoria</td>
		<td><input type="text" id="dataPrevistaAposentadoria" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Data efetiva da aposentadoria</td>
		<td><input type="text" id="dataEfetivaAposentadoria" class="form_tfield width100" /></td>
	</tr>
	<tr>
		<td>Departamento</td>
		<td><select id="departamento" class="width100">
			<?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('departamentos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('departamento')->value->idDepartamento;?>
"><?php echo $_smarty_tpl->getVariable('departamento')->value->nome;?>
</option>
			<?php }} ?>
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Inicial</td>
		<td><select id="categoriaFuncionalInicial" class="width100">
			<?php  $_smarty_tpl->tpl_vars['categoriaFuncional'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categoriasFuncionais')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoriaFuncional']->key => $_smarty_tpl->tpl_vars['categoriaFuncional']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->idCategoriaFuncional;?>
"><?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->descricao;?>
</option>
			<?php }} ?>
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Atual</td>
		<td><select id="categoriaFuncionalAtual" class="width100">
			<?php  $_smarty_tpl->tpl_vars['categoriaFuncional'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categoriasFuncionais')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoriaFuncional']->key => $_smarty_tpl->tpl_vars['categoriaFuncional']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->idCategoriaFuncional;?>
"><?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->descricao;?>
</option>
			<?php }} ?>
		</select></td>
	</tr>
	<tr>
		<td>Tipo de Titula&ccedil;&atilde;o</td>
		<td><select id="titulacao" class="width100">
			<?php  $_smarty_tpl->tpl_vars['titulacao'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('titulacoes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['titulacao']->key => $_smarty_tpl->tpl_vars['titulacao']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('titulacao')->value->idTipoTitulacao;?>
"><?php echo $_smarty_tpl->getVariable('titulacao')->value->descricao;?>
</option>
			<?php }} ?>
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Refer&ecirc;ncia</td>
		<td><select id="categoriaFuncionalReferencia" class="width100">
			<?php  $_smarty_tpl->tpl_vars['categoriaFuncional'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('categoriasFuncionais')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['categoriaFuncional']->key => $_smarty_tpl->tpl_vars['categoriaFuncional']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->idCategoriaFuncional;?>
"><?php echo $_smarty_tpl->getVariable('categoriaFuncional')->value->descricao;?>
</option>
			<?php }} ?>
		</select></td>
	</tr>
	<tr>
		<td>Cargo</td>
		<td><select id="cargo" class="width100">
			<?php  $_smarty_tpl->tpl_vars['cargo'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cargos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cargo']->key => $_smarty_tpl->tpl_vars['cargo']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('cargo')->value->idCargo;?>
"><?php echo $_smarty_tpl->getVariable('cargo')->value->descricaoCargo;?>
</option>
			<?php }} ?>
		</select></td>
	</tr>
	<tr>
		<td>Situacao</td>
		<td><select id="situacao" class="width100">
			<?php  $_smarty_tpl->tpl_vars['situacao'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('situacoes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['situacao']->key => $_smarty_tpl->tpl_vars['situacao']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('situacao')->value->idSituacao;?>
"><?php echo $_smarty_tpl->getVariable('situacao')->value->descricaoSituacao;?>
</option>
			<?php }} ?>
		</select></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td align="right"><button id="cadastrarProfessor">Cadastrar</button></td>
	</tr>
</table>