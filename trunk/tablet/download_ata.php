<?php

require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

if(!isset($_GET['id'])) {
	die('Parametro invalido!');
}

$objReuniaoC = new ReuniaoC();
$arrayReuniao = $objReuniaoC->getReuniaoPorId($_GET['id']);

$nome = $arrayReuniao['arquivo_ata'];
$url = dirname(__FILE__) . DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'repositorio'.DIRECTORY_SEPARATOR;
$arquivo = $url.$nome;

if(!(file_exists($arquivo) && is_file($arquivo))) {
	die("Arquivo nao encontrado!");
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.$nome);
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($arquivo));
ob_clean();
flush();
readfile($arquivo);
exit;
?>