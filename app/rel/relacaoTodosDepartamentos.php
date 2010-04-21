<?php
	include '../class/departamento.php'; 
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
	$departamentos = $departamento->getDepartamentos();
	foreach ( $departamentos as $key =>$value ) {
		echo "<tr>";
		echo "<td>";
		echo utf8_encode( $value[1] );
		echo "</td>";
		echo "<td>";
		echo $value[2];
		echo "</td>";
		echo "<td>";
		echo $value[3];
		echo "</td>";
		echo "</tr>";
	}
	
?>
</table>
<div id="note">
	<p>Emitido em: <?php echo date('d/m/Y H:i:s P') ?></p>
</div>