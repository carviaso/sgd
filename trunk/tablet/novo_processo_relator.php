<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

$objMembroC = new MembroC();
$array = $objMembroC->getMembrosAtivos();

?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="novo-processo-relator" data-role="dialog">

		<div data-role="header" data-theme="d">
			<h1>Selecione um relator</h1>

		</div>
		<div data-role="content" data-theme="c">
			<br>
			<?php
			if(count($array) > 0) { ?>
			<ul data-role="listview" data-inset="true" data-filter="true" data-filter-placeholder="Pesquisar...">
				<?php foreach ($array as $membro) {
					$nomeCompleto = "{$membro['nome']} ({$membro['siglaDepartamento']}/{$membro['siglaCentro']})";
					?>
				<li>
					<a href="#" onclick="novoProcessoRelator('<?php echo $membro['id_membro']; ?>','<?php echo $nomeCompleto; ?>')" data-prefetch><?php echo $nomeCompleto; ?>	</a>
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