<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objProfessorC = new ProfessorC();
$array = $objProfessorC->getDadosProfessor($_SESSION['CPPD']['ID_PROFESSOR']);

?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?> 
<body>
<div id="dados-pessoais" data-role="page" class="type-interior" data-dom-cache="true">

	<div data-role="header" data-position="fixed" data-theme="a">
		<h1><?php echo SGD_TITULO_CABECALHO; ?></h1>
		<a href="index.php?logout=true" data-transition="fade" data-theme="e">Sair</a>
		<a href="menu.php" id="btn-menu-header" data-rel="dialog" data-transition="fade" data-theme="e">Menu</a>
	</div><!-- /header -->

	<div data-role="content">	
		
		<div class="content-menu">
			<div data-role="collapsible" data-collapsed="true" data-theme="b" data-content-theme="d">

					<ul data-role="listview" data-theme="c" data-dividertheme="d">

						<?php include_once("./inc/menu_lateral.php"); ?>

					</ul>
			</div>
		</div>

		<div class="content-page">
		
		
			<ul data-role="listview" data-inset="true">
				<li>
					Professor(a)
					<span class="span-texto-esquerdo"><?php echo $array['nome'] ?></span>					
				</li>
				<li>
					Matrícula
					<span class="span-texto-esquerdo"><?php echo $array['matricula'] ?></span>					
				</li>
				<li>
					SIAPE
					<span class="span-texto-esquerdo"><?php echo $array['siape'] ?></span>					
				</li>
				<li>
					Data Nascimento
					<span class="span-texto-esquerdo"><?php echo $array['data_nascimento'] ?></span>					
				</li>
			</ul>
			<ul data-role="listview" data-inset="true">
				<li>
					Data Admissão
					<span class="span-texto-esquerdo"><?php echo $array['data_admissao'] ?></span>					
				</li>
				<li>
					Data Admissão UFSC
					<span class="span-texto-esquerdo"><?php echo $array['data_admissao_ufsc'] ?></span>					
				</li>
				<li>
					Data Prevista Aposentadoria
					<span class="span-texto-esquerdo"><?php echo $array['data_previsao_aposentadoria'] ?></span>					
				</li>
				<li>
					Data Efetiva Aposentadoria
					<span class="span-texto-esquerdo"><?php echo ($array['data_aposentadoria']=='00/00/0000')?'-':$array['data_aposentadoria']; ?></span>					
				</li>
			</ul>
			<ul data-role="listview" data-inset="true">
				<li>
					Departamento
					<span class="span-texto-esquerdo"><?php echo "{$array['nomeDepartamento']} ({$array['siglaDepartamento']})"; ?></span>					
				</li>
				<li>
					Centro
					<span class="span-texto-esquerdo"><?php echo "{$array['nomeCentro']} ({$array['siglaCentro']})"; ?></span>					
				</li>
				<li>
					Instituição
					<span class="span-texto-esquerdo"><?php echo "{$array['nomeInstituicao']} ({$array['siglaInstituicao']})"; ?></span>					
				</li>
			</ul>
			<ul data-role="listview" data-inset="true">
				<li>
					Categoria Funcional Inicial
					<span class="span-texto-esquerdo"><?php echo $array['descCategoriaFuncionalInicial'] ?></span>					
				</li>
				<li>
					Categoria Funcional Atual
					<span class="span-texto-esquerdo"><?php echo $array['descCategoriaFuncionalAtual'] ?></span>					
				</li>
				<li>
					Tipo Titulação
					<span class="span-texto-esquerdo"><?php echo $array['descTipoTitulacao'] ?></span>					
				</li>
				<li>
					Próxima Categoria Funcional
					<span class="span-texto-esquerdo"><?php echo $array['descCategoriaFuncionalReferencia']; ?></span>					
				</li>
				<li>
					Cargo
					<span class="span-texto-esquerdo"><?php echo $array['descricaoCargo'] ?></span>					
				</li>
				<li>
					Situação Atual
					<span class="span-texto-esquerdo"><?php echo $array['descricaoSituacaoAtual'] ?></span>					
				</li>
			</ul>
			
		</div>
		
	</div><!-- /content -->

	<?php require_once(dirname(__FILE__) . '/inc/inc.rodape.php'); ?>

</div>
</body>
</html>