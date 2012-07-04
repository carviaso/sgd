<?php 

echo '<pre>';
echo realpath(dirname(__FILE__). DIRECTORY_SEPARATOR);

die();

echo '<hr>';
echo $_SERVER['SCRIPT_NAME'];
echo '<hr>';
preg_match('/(.*)\/[a-zA-Z]+.php/i', $_SERVER['SCRIPT_NAME'], $ret);
		
$img = 'http://' . $_SERVER['HTTP_HOST'] . $ret[1] . '/public/imagens/Brastra.gif';

print_r($img);

$sr = explode("\n", $array['parecer']);

die();
print_r($_SERVER);
?>

<html>
<head>
	<title>P&aacute;gina de teste</title>
	<script src="./public/jqm/jquery-1.7.min.js"></script>
</head>
<style>
<!--
.texto-cabecalho {
	text-align: center !important;
}
-->
</style>
<body>
	<div align="center">
			<img src="public/imagens/Brastra.gif"><br />
			SERVIÇO PÚBLICO FEDERAL
		<h3 style='margin-bottom:0; text-align: center;margin-top: 0'>
			<strong>UNIVERSIDADE FEDERAL DE SANTA CATARINA</strong><br />
			<strong>PRÓ-REITORIA DE ENSINO DE GRADUAÇÃO</strong><br />
			<strong>COMISSÃO PERMANENTE DE PESSOAL DOCENTE</strong><br />
			
		</h3>
		Prédio da Reitoria - 2º andar | Campus Prof. João David Ferreira Lima | CEP 88040-900<br />
			Trindade - Florianópolis - Santa Catarina - Brasil | www.cppd.ufsc.br<br />
			Fonr +55 (48) 3721-9307 | cppd@reitoria.ufsc.br
	</div>
	<div style='margin-top:20px'>
		<table width='100%' cellpadding='0' cellspacing='0'>
			<tr>
				<td width='100%' align='left' class='texto'>
				<span style="text-align: left;"></span>
				
				Convocação nº{$arraReuniao['numero_pauta']}</td>
			</tr>
		</table>
	</div>
</body>
</html>