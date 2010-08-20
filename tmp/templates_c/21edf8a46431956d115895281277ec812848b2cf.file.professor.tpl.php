<?php /* Smarty version 3.0rc1, created on 2010-08-13 00:49:06
         compiled from "views/professor/templates/professor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57994c64c0b22d30d6-92811747%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '21edf8a46431956d115895281277ec812848b2cf' => 
    array (
      0 => 'views/professor/templates/professor.tpl',
      1 => 1281671343,
    ),
  ),
  'nocache_hash' => '57994c64c0b22d30d6-92811747',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Professor</h1>
	<label for="nome">Nome</label>
	<input type="text" id="nome" name="nome" value=""  maxlength="100" class="form_tfield" />
	<label for="sobrenome">Sobrenome</label>
	<input type="text" id="sobrenome" name="sobrenome" value=""  maxlength="100" class="form_tfield" />

	<div>Matr&iacute;cula</div>
	<input class="form_tfield" type="text" maxlength="255" name="Matricula" value="" />
	<div>Siape</div>
	<input class="form_tfield" type="text" maxlength="255" name="Siape" value="" />
	
	<div>Data da admiss&atilde;o (dd/mm/aaaa)</div>
	<input type="text" id="dataAdmissao" class="form_tfield" >
	
	<div>Data da admiss&atilde;o na Ufsc (dd/mm/aaaa)</div>
	<input type="text" id="dataAdmissaoUfsc" class="form_tfield" >
	
	<div>Data prevista da aposentadoria (dd/mm/aaaa)</div>
	<input type="text" id="dataAposentadoria" class="form_tfield" >
	
	<div>Data efetiva da aposentadoria (dd/mm/aaaa)</div>
	<input type="text" id="dataEfetivaAposentadoria" class="form_tfield" >
	
	<div>Departamento</div>
	<select name ="idDepartamento">
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
	</select>
	
	<div>Categoria Funcional Inicial</div>
	<select name ="idCategoriaFuncionalInicial">
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
	</select>
	
	<div>Categoria Funcional Atual</div>
	<select name ="idCategoriaFuncionalAtual">
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
	</select>
	
	<div>Tipo de Titula&ccedil;&atilde;o</div>
	<select name ="idTitulacao">
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
	</select>
	
	<div>Categoria Funcional Referência</div>
	<select name ="idCategoriaFuncionalReferencia">
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
	</select>
	<p>&nbsp;</p>
	<p><input class="form_submitb" name="submit" type="submit" value="Gravar" ></p>