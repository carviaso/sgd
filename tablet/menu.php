<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

?>
<div data-role="page">
	
	<div data-role="header" data-theme="d">
		<h1>Menu</h1>

	</div>

	<div data-role="content" data-theme="c">
		
			<ul data-role="listview" data-theme="c" data-divider-theme="d" data-inset="true">
	
<li data-role="list-divider">Informações Cadastrais</li>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[1][1])) echo 'a'; ?>"><a href="dados_pessoais.php" rel="external">Dados pessoais</a></li>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[1][2])) echo 'a'; ?>"><a href="alterar_senha.php" data-rel="dialog" data-transition="pop">Alterar senha</a></li>

<li data-role="list-divider">Reunião</li>
<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[2][1])) echo 'a'; ?>"><a href="nova_reuniao.php" rel="external">Nova reunião</a></li>
<?php } ?>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[2][2]) && (@$_GET['lista'] == '1' || @$_GET['lista'] == '')) echo 'a'; ?>"><a href="listar_reunioes.php" rel="external">Listar reuniões</a></li>

<?php 
$objReuniaoMenu = new ReuniaoC();
$arrayProxima = $objReuniaoMenu->getProximaReuniao();
if(count($arrayProxima) > 0) {
	$nomeMenu = ($arrayProxima['hoje'] == '1')?"Reunião de hoje":'Próxima reunião'; ?>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[2][3]) && (@$_GET['lista'] == '2' || @$_GET['lista'] == '')) echo 'a'; ?>"><a href="reuniao_listar_processos.php?id_reuniao=<?php echo $arrayProxima['id_reuniao']; ?>&id_pauta=<?php echo $arrayProxima['id_pauta']; ?>&lista=2" rel="external"><?php echo $nomeMenu; ?></a></li>
<?php } ?>

<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
<li data-role="list-divider">Membros da CPPD</li>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[3][1])) echo 'a'; ?>"><a href="listar_membros.php" rel="external">Listar Membros</a></li>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[3][2])) echo 'a'; ?>"><a href="add_membro.php" rel="external">Adicionar membro</a></li>
<?php } ?>

<li data-role="list-divider">Processo</li>
<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[4][1])) echo 'a'; ?>"><a href="novo_processo.php" rel="external">Novo processo</a></li>
<?php } ?>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[4][2]) && (@$_GET['lista'] == '1' || @$_GET['lista'] == '')) echo 'a'; ?>"><a href="listar_processos.php" rel="external">Listar processos</a></li>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[4][3]) && (@$_GET['lista'] == '2' || @$_GET['lista'] == '')) echo 'a'; ?>"><a href="listar_processos_andamento.php" rel="external">Processos em andamento</a></li>

<?php if( in_array($_SESSION['CPPD']['PERFIL'], array('1','2'))) { ?>
<li data-role="list-divider">Pauta</li>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[5][1])) echo 'a'; ?>"><a href="nova_pauta.php" rel="external">Nova pauta</a></li>
<li data-theme="<?php if(in_array($arquivo, $arrayMenu[5][2])) echo 'a'; ?>"><a href="listar_pautas.php" rel="external">Listar pautas</a></li>
<?php } ?>
	
			</ul>
		
		   
	</div>
</div>