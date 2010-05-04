<?php

include '../../controllers/professorController.php';
 
$professor = new ProfessorController();
$professores = $professor->getProfessoresPorDepartamento( $_POST['idDepartamento'] );

if ( count( $professores ) > 0 ) {
	echo "<table class=\"aatable\">";
	echo "<tr>";
	echo "<th>Nome</th>";
	echo "<th>Sobrenome</th>";
	echo "</tr>";

	foreach ( $professores as $professor ) {
		echo "<tr>";
		echo "<td>";
		echo utf8_encode( $professor->getNome() );
		echo "</td>";
		echo "<td align='center'>";
		echo utf8_encode( $professor->getSobrenome() );
		echo "</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "<h2>Nenhum professor cadastrado.</h2>";
}
	
?>