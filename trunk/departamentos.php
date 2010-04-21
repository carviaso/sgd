<html>
<head>
  <title>Departamentos por centro</title>
</head>
<body>

<?php
import_request_variables("gP");

include 'include/opendb_cppd.php';

    $sql .= "VALUES ('$data')";
/* Busca Centros */
 

/* $i =1;
 
SET @a=1;
PREPARE TESTE FROM 'SELECT * FROM tbl LIMIT ?';
EXECUTE TESTE USING @a;

podemos fazer assim, também:
SET @a=1;
SET @sql = 'SELECT * FROM centro WHERE id_centro = ?';
PREPARE TESTE FROM @sql;
EXECUTE TESTE USING @a;*/


switch($_POST["centro"])
{
case "CTC": $opcao=1;break;

case "CCA": $opcao=2;break;
case "CCB": $opcao=3;break;
case "CCE": $opcao=4;break;
case "CCJ": $opcao=5;break;
case "CCS": $opcao=6;break;
case "CDS": $opcao=7;break;
case "CED": $opcao=8;break;
case "CFH": $opcao=9;break;
case "CFM": $opcao=10;break;
case "CSE": $opcao=11;break;

default: echo "Nome do Centro Errado!!!";
}


//$opcao=1;

   $sql = "SELECT * FROM centro WHERE id_centro = '$opcao'";
  	$result = mysql_query($sql, $db) or die(mysql_errno() . ": " . mysql_error());
    if (!$result)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }
/*  Busca Departamento */ 
    
	$query = "SELECT d.* FROM departamento AS d LEFT JOIN centro AS c ON d.id_centro = c.id_centro WHERE c.id_centro ='$opcao'"; 
 	$resultado  = mysql_query($query,$db)or die(mysql_errno() . ": " . mysql_error());

 	$recorde = mysql_fetch_object($result);

         
print "<table>\n";
print "<tr><th>Centro</th> <th>Sigla</th> </tr>\n";
print "<tr>\n";
  print "<td>{$recorde->nome}</td>\n";
  print "<td>{$recorde->sigla}</td>\n";
  print "</tr>\n";
print "<tr><th>Departamento</th> <th>Sigla</th> </tr>\n";
while ($record = mysql_fetch_object($resultado)){
  print "<tr>\n";
  print "<td>{$record->nome}</td>\n";
  print "<td>{$record->sigla}</td>\n";
  print "</tr>\n";
}

print "</table>\n";

     mysql_close();
?>
</body>
</html>