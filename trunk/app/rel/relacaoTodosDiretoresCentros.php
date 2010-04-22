<?php
	include '../class/centro.php';
	
	$centro = new Centro();
	$centros = $centro->getCentros();
	
	foreach ( $centros as $centro ) {
		$opcoes[] = "<option value='" . $centro['id_centro'] . "'>";
		$opcoes[] = utf8_encode( $centro['nome'] ) . "</option>";
	}
?>
<h1>Relat&oacute;rio de Departamentos por Centro</h1>
<span>Escolha aqui o centro</span>

<select id="selectCentros">
	<?= join( '', $opcoes ); ?>
</select>

<br />
<br />

<div id="departamentosPorCentro" ></div>

<div id="note">
	<p>Emitido em: <?php echo date('d/m/Y H:i:s P') ?></p>
</div>

<script type="text/javascript">

	$("#selectCentros").change(function() {
		$.post("../sgd/app/content/diretoresPorCentro.php", { id_centro: $(this).val() },
			function(data){
				$('#departamentosPorCentro').html(data);
		});
	});

	
</script>