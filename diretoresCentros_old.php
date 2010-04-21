<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<!--  <<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" /> -->
<!--  <meta http-equiv="content-type" content="text/html; charset= ISO-8859-1" />-->          <title>Relat&oacute;rio de Diretores dos Centros</title>
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
                        <h1>Relat&oacute;rio de Diretores de Centros</h1>
                        <!-- Fetch Rows -->
                        <table class="aatable">
                            <tr>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                            </tr>

                            <?php
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
			//	   var_dump($r);
			//    $items[] = array('id_centro'=>$r['id_centro'],
			//		'nome'=>$r['nome'],
			//		'sigla'=>$r['sigla'],
			//		'id_instituicao'=>$r['id_instituicao']);
			

         //           for($index=0; $index < count($result); $index++) {
          //                      $depData = $result[$index];
                                echo "<tr>";
						 //   	echo $r["id_centro"];
                        //        echo "<td>"$r['id_centro']."</td>";
                              	echo "<td>";
							  	echo $row["id_centro"];
    							echo "</td>";
								echo "<td>";
								echo $row["nome"];
								echo "</td>";
								echo "<td>";
    							echo $row["sigla"];
							  echo "</td>";
                         //       echo "<td>"$items['sigla']."</td>";
			//			 }

                             //   $result2 = $proxy->get_instituicao( $depData['id_instituicao'] );
                             //   $depData2 = $result2[0];
                             //   echo "<td>".$depData2['sigla']."</td>";

                                echo "</tr>";
                           }

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