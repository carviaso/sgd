<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
        <title>Relat&oacute;rio de Departamentos</title>
        <meta name="keywords" content="departamento, relatório" />
        <meta name="description" content="Esta é página de relatórios dos departamentos do sistema de gestão de docentes" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="wrapper">
            <?php include 'include/header.php'; ?>
            <!-- end div#header -->
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Relat&oacute;rio de Departamentos</h1>
                        <!-- Fetch Rows -->
                        <table class="aatable">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Sigla</th>
                                <th>Centro</th>
                            </tr>

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

/*
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

*/
$opcao=1;

   $sql = "SELECT * FROM centro WHERE id_centro = '$opcao'";
  	$result = mysql_query($sql, $db) or die(mysql_errno() . ": " . mysql_error());
    if (!$result)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }
/*  Busca Departamento */ 
/*$query= "SELECT d.* FROM departamento AS d LEFT JOIN centro AS cigla
FROM centro INNER JOIN departamento ON centro.id_centro = departamento.id_centro";*/

$query= "SELECT departamento.id_departamento, departamento.nome, departamento.sigla AS departamento_sigla, centro.sigla AS centro_sigla
FROM centro INNER JOIN departamento ON centro.id_centro = departamento.id_centro ORDER by centro_sigla,departamento.nome,departamento.sigla ";  
/*  
	$query = "SELECT d.* FROM departamento AS d LEFT JOIN centro AS c ON d.id_centro = c.id_centro WHERE c.id_centro ='$opcao'"; */
 	$resultado  = mysql_query($query,$db)or die(mysql_errno() . ": " . mysql_error());

 	$recorde = mysql_fetch_object($result);

/*         
print "<table>\n";
print "<tr><th>Centro</th> <th>Sigla</th> </tr>\n";
print "<tr>\n";
  print "<td>{$recorde->nome}</td>\n";
  print "<td>{$recorde->sigla}</td>\n";
  print "</tr>\n";
print "<tr><th>Departamento</th> <th>Sigla</th> </tr>\n";
*/
while ($record = mysql_fetch_object($resultado)){
  print "<tr>\n";
  print "<td>{$record->id_departamento}</td>\n";
  print "<td>{$record->nome}</td>\n";
  print "<td>{$record->departamento_sigla}</td>\n";
  print "<td>{$record->centro_sigla}</td>\n";
  print "</tr>\n";
}

//print "</table>\n";

                      /*     include 'include/opendb_cppd.php';
                         $sql = "SELECT * FROM departamento ORDER BY nome";
  	$result = mysql_query($sql, $db) or die(mysql_errno() . ": " . mysql_error());
    if (!$result)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }

                     while($row = mysql_fetch_assoc($result)){
			                    echo "<tr>";
			                   	echo "<td>";
							  	echo $row["id_departamento"];
    							echo "</td>";
								echo "<td>";
								echo $row["nome"];
								echo "</td>";
								echo "<td>";
    							echo $row["sigla"];
							  echo "</td>";
					
					
					/*       for($index=0; $index < count($result); $index++) {
                                $depData = $result[$index];
                                echo "<tr>";

                                echo "<td>".$depData['id_departamento']."</td>";
                                echo "<td>".$depData['nome']."</td>";
                                echo "<td>".$depData['sigla']."</td>";

                                $result2 = $proxy->get_centro( $depData['id_centro'] );
                                $depData2 = $result2[0];
                                echo "<td>".$depData2['sigla']."</td>";

                                echo "</tr>";
                            } */

                            ?>

                        </table>
                    </div>
                    <div id="note">
                        <p>Emitido em: <?php echo date('d/m/Y H:i:s P') ?></p>
                    </div>
                    <!-- end div#welcome -->

                </div>
                <!-- end div#content -->
                <div id="sidebar">
                    <ul>
                        <?php include 'include/navRelatorio.php'; ?>
                        <!-- end navigation -->
                    </ul>
                </div>
                <!-- end div#sidebar -->
                <div style="clear: both; height: 1px"></div>
            </div>
            <?php include 'include/footer.php'; ?>
        </div>
        <!-- end div#wrapper -->
    </body>
</html>

