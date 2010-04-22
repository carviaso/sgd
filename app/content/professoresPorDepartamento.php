<?php
	include '../class/professor.php'; 
?>
<table class="aatable">
	<tr>
		<th>Nome</th>
		<th>Sobrenome</th>
	</tr>
<?php
	
	$professor = new Professor();
	$professores = $professor->getProfessoresPorDepartamento( $_POST['id_departamento'] );
			
	foreach ( $professores as $professor ) {
		echo "<tr>";
		echo "<td>";
		echo utf8_encode( $professor['nome'] );
		echo "</td>";
		echo "<td align='center'>";
		echo utf8_encode( $professor['sobrenome'] );
		echo "</td>";
		echo "</tr>";
	}
	
?>
</table>