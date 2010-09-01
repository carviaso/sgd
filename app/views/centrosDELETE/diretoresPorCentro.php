<?php

include '../../controllers/departamentoController.php';
 
?>
<table class="aatable">
	<tr>
		<th>Departamento</th>
		<th>Sigla</th>
	</tr>
<?php
	
	$departamentoC = new DepartamentoController();
	$departamentos = $departamentoC->getDepartamentosPorCentro( $_POST['id_centro'] );
		
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