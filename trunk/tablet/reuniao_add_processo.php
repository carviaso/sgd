<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objProcessoC = new ProcessoC();
$condicao = array();
$condicao['STATUS'] = '3,4,5,7,8';
$array = $objProcessoC->getProcessos(false, $condicao);

?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="reuniao-add-processo" data-role="dialog">

		<div data-role="header" data-theme="d">
			<h1>Selecione um processo</h1>

		</div>
		<div data-role="content" data-theme="c">
			<br>
			<?php
			if(count($array) > 0) { ?>
			<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Pesquisar...">
				<?php foreach ($array as $processo) { ?>
				<li>
					<a href="#" onclick="processoSelecionado('<?php echo $processo['id_processo']; ?>')" data-prefetch>
						<h3>Processo: <?php echo $processo['numero']; ?>, <?php echo "{$processo['nome_requerente']} ({$processo['siglaDepartamento']}/{$processo['siglaCentro']})"; ?></h3>
						<p><strong>Assunto: <?php echo $processo['assunto']; ?></strong></p>
						<p><strong>Status: <?php echo $processo['nome_status']; ?></strong></p>
						<p>Relator: <?php echo $processo['nome_relator']; ?></p>
					</a>
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