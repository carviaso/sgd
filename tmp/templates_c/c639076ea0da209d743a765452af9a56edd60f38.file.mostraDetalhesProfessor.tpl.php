<?php /* Smarty version 3.0rc1, created on 2010-09-17 01:23:22
         compiled from "views/professor/templates/mostraDetalhesProfessor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189874c92c30a296137-24501985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c639076ea0da209d743a765452af9a56edd60f38' => 
    array (
      0 => 'views/professor/templates/mostraDetalhesProfessor.tpl',
      1 => 1284686592,
    ),
  ),
  'nocache_hash' => '189874c92c30a296137-24501985',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="viewDetalhesProfessor">
	<fieldset><legend>Dados do Professor</legend>
		<div>
			Nome
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->nome;?>

		</div>
		<div>
			Matr&iacute;cula
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->matricula;?>

		</div>
		<div>
			SIAPE
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->siape;?>

		</div>
		<div>
			Data Nascimento
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->dataNascimento;?>

		</div>
		<div>
			Aposentado
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->aposentado;?>

		</div>
	</fieldset>
	<fieldset><legend>Datas</legend>
		<div>
			Data Admiss&atilde;o
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->dataAdmissao;?>

		</div>
		<div>
			Data Admiss&atilde;o UFSC
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->dataAdmissaoUfsc;?>

		</div>
		<div>
			Data Prevista Aposentadoria
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->dataPrevistaAposentadoria;?>

		</div>
		<div>
			Data Efetiva Aposentadoria
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->dataEfetivaAposentadoria;?>

		</div>
	</fieldset>
	<fieldset><legend>Dados da Lota&ccedil;&atilde;o</legend>
		<div>
			Departamento
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->nomeDepartamento;?>
 - (<?php echo $_smarty_tpl->getVariable('professor')->value->siglaDepartamento;?>
)
		</div>
		<div>
			Centro
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->nomeCentro;?>
 - (<?php echo $_smarty_tpl->getVariable('professor')->value->siglaCentro;?>
)
		</div>
		<div>
			Institui&ccedil;&atilde;o
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->nomeInstituicao;?>
 - (<?php echo $_smarty_tpl->getVariable('professor')->value->siglaInstituicao;?>
)
		</div>
	</fieldset>
	<fieldset><legend>Dados da Categoria</legend>	
		<div>
			Categoria Funcional Inicial
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->descCategoriaFuncionalInicial;?>

		</div>
		<div>
			Categoria Funcional Atual
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->descCategoriaFuncionalAtual;?>

		</div>
		<div>
			Tipo Titula&ccedil;&atilde;o
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->descTipoTitulacao;?>

		</div>
		<div>
			Categoria Funcional Refer&ecirc;ncia
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->descCategoriaFuncionalReferencia;?>

		</div>
		<div>
			Cargo
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->descricaoCargo;?>

		</div>
		<div>
			Situa&ccedil;&atilde;o
		</div>
		<div>
			<?php echo $_smarty_tpl->getVariable('professor')->value->descricaoSituacao;?>

		</div>
	</fieldset>
</div>