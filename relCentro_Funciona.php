<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Relatório de Centros</title>
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
                        <h1>Relatório de Centros</h1>
                        <!-- Fetch Rows -->
                        <h2> Selecione o Centro para verificar os Departamentos Pertencentes</h2><br></br>
<form action = "departamentos.php"
      method = "post">

<table border = 1
       width = 200>
<tr>
  <td><center><h2>Centros</h2></center></td>
</tr>

<tr>
  <td><center>

<select name=centro size=10>
<?php
import_request_variables("gP");
include 'include/opendb_cppd.php';

$sql = "SELECT * FROM centro ORDER BY nome";
  	$result = mysql_query($sql, $db) or die(mysql_errno() . ": " . mysql_error());
    if (!$result)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }
while($row = mysql_fetch_assoc($result)){
  $currentQuery = $row['nome'];
  $theDescription = $row['sigla'];
  print <<<HERE
      <option value = "$theDescription">$currentQuery</option>

HERE;
  } // end while

?>

    </select>
  </center></td>
</tr>

<tr>
  <td><center>
    <input type = "submit"
       value = "Escolher o Centro" ></input>
  </center></td>
</tr>
</table>

</form>
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