<?php
	include '../class/centro.php'; 
?>
<h1>Relat&oacute;rio de Centros</h1>
<table class="aatable">
	<tr>
		<th>Nome</th>
		<th>Sigla</th>
	</tr>
<?php
	$centro = new Centro();
	$centros = $centro->getCentros();
	foreach ( $centros as $key =>$value ) {
		echo "<tr>";
		echo "<td>";
		echo utf8_encode( $value[1] );
		echo "</td>";
		echo "<td align='center'>";
		echo $value[2];
		echo "</td>";
		echo "</tr>";
	}
	
?>
</table>
<div id="note">
	<p>Emitido em: <?php echo date('d/m/Y H:i:s P') ?></p>
</div>