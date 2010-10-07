<?php /* Smarty version 3.0rc1, created on 2010-10-07 03:17:09
         compiled from "views/professor/templates/imprimirFicha.tpl" */ ?>
<?php /*%%SmartyHeaderCode:306234cad3bb5b13051-61497904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09a66873093122af2630e25587ee3b478b5bf9fd' => 
    array (
      0 => 'views/professor/templates/imprimirFicha.tpl',
      1 => 1286420514,
    ),
  ),
  'nocache_hash' => '306234cad3bb5b13051-61497904',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div>
	<div id="imprimirFichaLogo"></div>
	<div id="imprimirFichaCabecalho">
		<div>SERVI&Ccedil;O P&Uacute;BLICO FEDERAL</div>
		<div>UNIVERSIDADE FEDERAL DE SANTA CATARINA</div>
		<div>PR&Oacute;-REITORIA DE DESENVOLVIMENTO HUMANO E SOCIAL</div>
		<div>DEPARTAMENTO DE DESENVOLVIMENTO E ADMINISTRA&Ccedil;&atilde;O DE PESSOAL</div>
	</div>
	<div id="imprimirFichaSubtitulo">INFORMA&Ccedil;&Otilde;ES CADASTRAIS</div>
	<div id="imprimirFichaDados">	
		<table>
			<tr>
				<td>Nome:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->nome;?>
</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Matr&iacute;cula UFSC:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->matricula;?>
</td>
				<td>Matr&iacute;cula SIAPE:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->siape;?>
</td>
			</tr>
			<tr>
				<td>Cargo/Regime:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->descricaoCargo;?>
</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Grupo/Classe/Padr&atilde;o:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->descCategoriaFuncionalAtual;?>
</td>
				<td>Nascimento:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->dataNascimento;?>
</td>
			</tr>
			<tr>
				<td>Admiss&atilde;o na UFSC:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->dataAdmissaoUfsc;?>
</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Lota&ccedil;&atilde;o:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->nomeDepartamento;?>
</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Localiza&ccedil;&atilde;o:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->nomeInstituicao;?>
</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Jornada:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->jornada;?>
</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>Situa&ccedil;&atilde;o:</td>
				<td><?php echo $_smarty_tpl->getVariable('professor')->value->situacao;?>
</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</div>
	<div id="imprimirFichaData1">Florian&oacute;polis, <?php echo $_smarty_tpl->getVariable('dia')->value;?>
 de <?php echo $_smarty_tpl->getVariable('mesExtenso')->value;?>
 de <?php echo $_smarty_tpl->getVariable('ano')->value;?>
</div>
	<div id="imprimirFichaSubtitulo2">Progress&otilde;es</div>
	<table class="tbProgressoes">
		<tr>
			<th>Data</th>
			<th>Cargo</th>
			<th>Portaria</th>
			<th>Observa&ccedil;&otilde;es</th>
		</tr>
	<?php  $_smarty_tpl->tpl_vars['progressao'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('progressoes')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['progressao']->key => $_smarty_tpl->tpl_vars['progressao']->value){
?>
		<tr>
			<td><?php echo $_smarty_tpl->getVariable('progressao')->value->aPartirDe;?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('progressao')->value->categoriaFuncional;?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('progressao')->value->portaria;?>
</td>
			<td><?php echo $_smarty_tpl->getVariable('progressao')->value->observacao;?>
</td>
		</tr>
	<?php }} ?>
	</table>
	<div style="clear: both"></div>
	<br />
	<br />
	<br />
	<br />
	<div id="imprimirFichaData2">Em <?php echo $_smarty_tpl->getVariable('data')->value;?>
</div>
	<div id="imprimirFichaFonte">Fonte: CPPD/SGD</div>
</div>