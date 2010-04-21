<?php
		

   $sql .= "VALUES ('$data')";
/* Busca Centros     
    $query = 'SELECT *	FROM centro ORDER BY id_centro';
	$resultado  = mysql_query($query,$db)or die(mysql_errno() . ": " . mysql_error());
  Busca Departamento 
    
	$sql = 'SELECT * FROM departamento ORDER BY id_centro,sigla';
    $result = mysql_query($sql, $db) or die(mysql_errno() . ": " . mysql_error());
    if (!$resultado)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }
*/
		$query = "SELECT * FROM departamento AS d LEFT JOIN centro AS c ON d.id_centro = c.id_centro WHERE c.id_centro ='CTC'";
	//		mysql_real_escape_string($id_centro));
		$result  = mysql_query($query);

		// Checagem de erro simples
		if (!$result) {
			$items[] = array('id_departamento'=>'',
					'nome'=>'Erro interno do servidor!',
					'sigla'=>'',
					'id_centro'=>'');
		}

		// nenhum registro
		if (mysql_num_rows($result) == 0) {
			$items[] = array('id_departamento'=>'',
					'nome'=>'Nenhum departamento encontrado!',
					'sigla'=>'',
					'id_centro'=>'');
		}

		while($r = mysql_fetch_array($result)){
			$items[] = array('id_departamento'=>$r['id_departamento'],
					'nome'=>$r['nome'],
					'sigla'=>$r['sigla'],
					'id_centro'=>$r['id_centro']);
		}
	
		print "<table>\n";
print "<tr><th>Centro</th> <th>Sigla</th> </tr>\n";
while ($record = mysql_fetch_object($resultado)): {
  print "<tr>\n";
  print "<td>{$record->nome}</td>\n";
  print "<td>{$record->sigla}</td>\n";
  print "</tr>\n";
}
print "</table>\n";
		
		
			mysql_close($conn);

//		return $items;
?>	
 