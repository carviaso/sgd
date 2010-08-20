<?php
	include '../../models/departamento.php'; 
	
	$departamento = new Departamento();
	$departamentos = $departamento->getDepartamentos();
	
	foreach ( $departamentos as $departamento ) {
		$opcoes[] = "<option value='" . $departamento['id_departamento'] . "'>";
		$opcoes[] = utf8_encode( $departamento['nome'] ) . "</option>";
	}
?>
<h1>Relat&oacute;rio de Professores por Departamentos</h1>
<span>Escolha aqui o centro</span>

<select id="selectDepartamentos">
	<?= join( '', $opcoes ); ?>
</select>

<br />
<br />

<div id="professoresPorDepartamento" ></div>

<div id="note">
	<p>Emitido em: <?php echo date('d/m/Y H:i:s P') ?></p>
</div>

<script type="text/javascript">

	$("#selectDepartamentos").change(function() {
		$.post("/sgd/app/views/departamentos/professoresPorDepartamento.php", { idDepartamento: $(this).val() },
			function(data){
				$('#professoresPorDepartamento').html(data);
		});
	});

	
</script>