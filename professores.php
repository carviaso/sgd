<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<!--  <<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" /> -->
<!--  <meta http-equiv="content-type" content="text/html; charset= ISO-8859-1" />-->          <title>Relat&oacute;rio de Centros</title>
        <meta name="keywords" content="centro, relatório" />
        <meta name="description" content="Esta é página de relatórios dos centros do sistema de gestão de docentes" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
   
    </head>

    <body>
        <div id="wrapper">
            <?php include 'include/header.php'; ?>
            <!-- end div#header -->
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Relat&oacute;rio de Professores por Departamento</h1>
                        <!-- Fetch Rows -->
<table>
                        <?php
import_request_variables("gP");

include 'include/opendb_cppd.php';

$opcao=$_POST["centro"];
//$opcao=$_GET["centro"];
 $sql = "SELECT * FROM departamento WHERE id_departamento = '$opcao'";
  	$result = mysql_query($sql, $db) or die(mysql_errno() . ": " . mysql_error());
    if (!$result)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }

$query = "SELECT p.nome,p.sobrenome FROM professor AS p LEFT JOIN departamento AS d ON p.id_departamento = d.id_departamento WHERE d.id_departamento ='$opcao' ORDER by p.nome"; 
 	$resultado  = mysql_query($query,$db)or die(mysql_errno() . ": " . mysql_error());
        if (!$resultado)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     } 
 	$recorde = mysql_fetch_object($result);
print "<table>\n";
print "<tr><th>Deparatamento</th> <th>Sigla</th> </tr>\n";
 print "<tr>\n";
  echo "<td>{$recorde->nome}</td>\n";
  print "<td>{$recorde->sigla}</td>\n";
  print "</tr>\n";
print "<tr><th>Nome</th> <th>Sobrenome</th> </tr>\n";
while ($record = mysql_fetch_object($resultado)){
  print "<tr>\n";
  print "<td>{$record->nome}</td>\n";
  print "<td>{$record->sobrenome}</td>\n";
  print "</tr>\n";
}

print "</table>\n";

     mysql_close();

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