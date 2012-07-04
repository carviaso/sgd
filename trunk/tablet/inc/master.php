<?php
session_start();

//error_reporting(E_ALL);
//ini_set("display_errors", 1); 

define('SGD_TITULO_PRINCIPAL', 'SGD - Módulo Reuniões');
define('SGD_TITULO_CABECALHO', 'SGD - Módulo Reuniões');

/*
 * #### Estrutura do menu ####
 * Aqui retorno o nome do arquivo, e com isso
 * adiciono no array conforme a hierarquia do menu.
 */
preg_match('/.*\/(.*).php/', $_SERVER['SCRIPT_NAME'], $arrayPreg);
$arquivo = $arrayPreg[1];

$arrayMenu = array();
$arrayMenu[1] = array(
		1 => array('dados_pessoais'),
		2 => array('alterar_senha')
	);
$arrayMenu[2] = array(
		1 => array('nova_reuniao'),
		2 => array('listar_reunioes','reuniao_listar_processos','edit_reuniao','visualizar_parecer_simplificado'),
		3 => array('proxima_reuniao','reuniao_listar_processos','edit_reuniao','edit_processo_simplificado','visualizar_parecer_simplificado')
	);
$arrayMenu[3] = array(
		1 => array('listar_membros','listar_membros_edit'),
		2 => array('add_membro','add_membro_edit')
	);
$arrayMenu[4] = array(
		1 => array('novo_processo'),
		2 => array('listar_processos','edit_processo','visualizar_parecer'),
		3 => array('listar_processos_andamento','edit_processo','visualizar_parecer')
	);
$arrayMenu[5] = array(
		1 => array('nova_pauta'),
		2 => array('listar_pautas','edit_pauta')
	);

if(isset($_GET['logout'])) {
	session_unset();
	session_destroy();
}

if($arquivo != 'index' && @$_SESSION['CPPD']['ID_MEMBRO'] == '' && !isset($_POST['verificaLogin'])) {
	header('Location: index.php');
	die();
}
require_once(dirname(__FILE__) . '/../../app/library/MPDF45/mpdf.php');

$dirs = array( 'models/lib', 'models', 'controllers', 'views/*', 'inc', 'helper' );
foreach ( $dirs as $dir ) {
	foreach ( glob( "./app/{$dir}/*.php" ) as $filename ) {
		include_once "{$filename}";
	}
}

$perfil = @$_SESSION['CPPD']['PERFIL'];

?>