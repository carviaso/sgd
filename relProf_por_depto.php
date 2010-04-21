<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
        <title>Relatório de Professores por Departamento</title>
        <meta name="keywords" content="professor por departamento, relatório" />
        <meta name="description" content="Esta é página de relatórios de professores por departamento do sistema de gestão de docentes" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>


    <body>
        <div id="wrapper">
        <?php include 'include/header.php'; ?>

            <!-- end div#header -->
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Relatório de Professores por Departamento</h1>

                        <!--body-->
<!--   <form method="post">
                       <p>
                          <div id="LDepartamento">Selecione o Departamento</div>
                          <select name ="Id_departamento"> -->
<form action = "professores.php"
      method = "post"> 
      <div id="LDepartamento">Selecione o Departamento</div>
      <p>
                         
<!-- <table border = 1>


<tr>
  <td><center>  -->

<select name="centro" size=11>


<?php
import_request_variables("gP");
include 'include/opendb_cppd.php';

$sql = "SELECT * FROM departamento ORDER by nome ";

$result = mysql_query($sql, $db) or die(mysql_errno() . ": " . mysql_error());
    if (!$result)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }

 while($row = mysql_fetch_assoc($result)){
  $id_departamento = $row['id_departamento'];
  $nome = $row['nome'];
  $sigla = $row['sigla'];
  print <<<HERE
      <option value = "$id_departamento">$nome</option>

HERE;
  } // end while

//     echo "<OPTION VALUE=".$depData['id_departamento'].">".$depData['nome'];
?>
  </select>
 <!--</center>
 </td>
</tr>
</table> -->
  </p>
      <p></p>
             <p>
                <input class="form_submitb" name="submit" type="submit" value="Visualizar" ></input>
          <!--    <input class="form_submitb" name="reset" type="reset" value="Cancelar" >' -->
             </p>
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
