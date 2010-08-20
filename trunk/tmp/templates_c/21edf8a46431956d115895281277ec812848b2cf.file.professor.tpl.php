<?php /* Smarty version 3.0rc1, created on 2010-08-20 00:07:20
         compiled from "views/professor/templates/professor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:240514c6df168dbd1f6-87429617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21edf8a46431956d115895281277ec812848b2cf' => 
    array (
      0 => 'views/professor/templates/professor.tpl',
      1 => 1282273631,
    ),
  ),
  'nocache_hash' => '240514c6df168dbd1f6-87429617',
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
		<td>Matr&iacute;cula</td>
		<td><input class="form_tfield width100" type="text" maxlength="255" name="Matricula" value="" /></td>
	</tr>
	<tr>
		<td>Siape</td>
		<td><input class="form_tfield width100" type="text" maxlength="255" name="Siape" value="" /></td>
	</tr>
	<tr>
		<td>Data da admiss&atilde;o</td>
		<td><input type="text" id="dataAdmissao" class="form_tfield width100" ></td>
	</tr>
	<tr>
		<td>Data da admiss&atilde;o na Ufsc</td>
		<td><input type="text" id="dataAdmissaoUfsc" class="form_tfield width100" ></td>
	</tr>
	<tr>
		<td>Data prevista da aposentadoria</td>
		<td><input type="text" id="dataAposentadoria" class="form_tfield width100" ></td>
	</tr>
	<tr>
		<td>Data efetiva da aposentadoria</td>
		<td><input type="text" id="dataEfetivaAposentadoria" class="form_tfield width100" ></td>
	</tr>
	<tr>
		<td>Departamento</td>
		<td><select name ="idDepartamento" class="width100">
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['name'] = 'departamentos';
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('departamentos')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['departamentos']['total']);
?>
				<option><?php echo $_smarty_tpl->getVariable('departamentos')->value[$_smarty_tpl->getVariable('smarty')->value['section']['departamentos']['index']]->nome;?>
</option>
			<?php endfor; endif; ?>
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Inicial</td>
		<td><select name ="idCategoriaFuncionalInicial" class="width100">
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['name'] = 'categoriasFuncionais';
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('categoriasFuncionais')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total']);
?>
				<option><?php echo $_smarty_tpl->getVariable('categoriasFuncionais')->value[$_smarty_tpl->getVariable('smarty')->value['section']['categoriasFuncionais']['index']]->descricao;?>
</option>
			<?php endfor; endif; ?>
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Atual</td>
		<td><select name ="idCategoriaFuncionalAtual" class="width100">
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['name'] = 'categoriasFuncionais';
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('categoriasFuncionais')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total']);
?>
				<option><?php echo $_smarty_tpl->getVariable('categoriasFuncionais')->value[$_smarty_tpl->getVariable('smarty')->value['section']['categoriasFuncionais']['index']]->descricao;?>
</option>
			<?php endfor; endif; ?>
		</select></td>
	</tr>
	<tr>
		<td>Tipo de Titula&ccedil;&atilde;o</td>
		<td><select name ="idTitulacao" class="width100">
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['name'] = 'titulacoes';
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('titulacoes')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['titulacoes']['total']);
?>
				<option><?php echo $_smarty_tpl->getVariable('titulacoes')->value[$_smarty_tpl->getVariable('smarty')->value['section']['titulacoes']['index']]->descricao;?>
</option>
			<?php endfor; endif; ?>
		</select></td>
	</tr>
	<tr>
		<td>Categoria Funcional Refer&ecirc;ncia</td>
		<td><select name ="idCategoriaFuncionalReferencia" class="width100">
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['name'] = 'categoriasFuncionais';
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('categoriasFuncionais')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['categoriasFuncionais']['total']);
?>
				<option><?php echo $_smarty_tpl->getVariable('categoriasFuncionais')->value[$_smarty_tpl->getVariable('smarty')->value['section']['categoriasFuncionais']['index']]->descricao;?>
</option>
			<?php endfor; endif; ?>
		</select></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><button id="cadastrarProfessor">Cadastrar</button></td>
	</tr>
</table>