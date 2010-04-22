<?php
	include '../class/departamento.php'; 
?>
<table class="aatable">
	<tr>
		<th>Departamento</th>
		<th>Sigla</th>
	</tr>
<?php
	
	$departamento = new Departamento();
	$departamentos = $departamento->getDepartamentosPorCentro( $_POST['id_centro'] );
		
	foreach ( $departamentos as $departamento ) {
		echo "<tr>";
		echo "<td>";
		echo utf8_encode( $departamento['nome'] );
		echo "</td>";
		echo "<td align='center'>";
		echo $departamento['departamento_sigla'];
		echo "</td>";
		echo "</tr>";
	}
	
?>
</table>