<?php
	include '../../models/departamento.php'; 
?>
<h1>Relat&oacute;rio de Departamentos</h1>
<table class="aatable">
	<tr>
		<th>Nome</th>
		<th>Sigla</th>
		<th>Centro</th>
	</tr>
<?php
	$departamento = new Departamento();
	$departamentos = $departamento-> getDepartamentos();
	foreach ( $departamentos as $key =>$value ) {
		echo "<tr>";
		echo "<td>";
		echo utf8_encode( $value['nome'] );
		echo "</td>";
		echo "<td>";
		echo $value['departamento_sigla'];
		echo "</td>";
		echo "<td>";
		echo $value['centro_sigla'];
		echo "</td>";
		echo "</tr>";
	}
	
?>
</table>
<div id="note">
	<p>Emitido em: <?php echo date('d/m/Y H:i:s P') ?></p>
</div>