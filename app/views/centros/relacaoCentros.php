<?php
	include '../../models/centro.php'; 
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
	
	foreach ( $centros as $centro ) {
		echo "<tr>";
		echo "<td>";
		echo utf8_encode( $centro->getNome() );
		echo "</td>";
		echo "<td align='center'>";
		echo $centro->getSigla();
		echo "</td>";
		echo "</tr>";
	}
	
?>
</table>
<div id="note">
	<p>Emitido em: <?php echo date('d/m/Y H:i:s P') ?></p>
</div>