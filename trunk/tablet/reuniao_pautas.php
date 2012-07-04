<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objPautaC = new PautaC();
$condicao = array();
//$condicao['REUNIAO'] = '1';
$array = $objPautaC->getPautas(false, $condicao);

//echo '<pre>';
//print_r($array);
//die();
?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="reuniao-pautas" data-role="dialog">

		<div data-role="header" data-theme="d">
			<h1>Selecione uma pauta</h1>

		</div>
		<div data-role="content" data-theme="c">
			<br>
			<?php
			if(count($array) > 0) { ?>
			<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Pesquisar...">
				<?php foreach ($array as $pauta) { ?>
				<li>
					<a href="#" onclick="pautaSelecionada('<?php echo $pauta['id_pauta']; ?>','<?php echo $pauta['numero']; ?>')" data-prefetch><?php echo $pauta['numero']; ?>	</a>
				</li>
				<?php } ?>
			</ul>
			<?php } else {
				echo "Nenhum registro";
			}?>
		</div>


</div>

</body>
</html>