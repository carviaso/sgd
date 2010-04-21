<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Relatório de Departamentos por Centro</title>
        <meta name="keywords" content="departamento por centro, relatório" />
        <meta name="description" content="Esta é página de relatórios dos departamentos por centro do sistema de gestão de docentes" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>


    <body>
        <div id="wrapper">
        <?php include 'include/header.php'; ?>

            <!-- end div#header -->
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Relatório de Departamentos por Centro</h1>

                        <!--body-->
                        <?php
                       include 'deptoporcentro.php';

                        //Se foi clicado no botão "Visualizar"
                        if (isset($_POST['submit'])) {
                            $id_centro = $_POST['Id_centro'];

                            $result2 = $proxy->get_centro( $id_centro );
                            $depData2 = $result2[0];
                            echo "Centro: ".$depData2['nome']." - ".$depData2['sigla'];

                            echo '<table class="aatable">';
                                echo '<tr>';
                                    echo '<th>ID</th>';
                                    echo '<th>Nome</th>';
                                    echo '<th>Sigla</th>';
                                echo '</tr>';

                                $result = $proxy->get_all_departamento_por_centro($id_centro);

                                for($index=0; $index < count($result); $index++) {
                                    $depData = $result[$index];
                                    echo "<tr>";

                                    echo "<td>".$depData['id_departamento']."</td>";
                                    echo "<td>".$depData['nome']."</td>";
                                    echo "<td>".$depData['sigla']."</td>";
                                    echo "</tr>";
                                }
                                echo '</table>';

                        } else {
                            echo '<form method="post">';
                            echo '<p>';
                            echo '<div id="LCentro">Centro</div>';
                            echo '<select name ="Id_centro">';

                            $result = $proxy->get_all_centro();

                            for($index=0; $index < count($result); $index++) {
                                $depData = $result[$index];
                                echo "<OPTION VALUE=".$depData['id_centro'].">".$depData['nome'];
                            }
                            echo '</select>';
                            echo '</p>';
                            echo '<p></p>';
                            echo '<p>';
                            echo '<input class="form_submitb" name="submit" type="submit" value="Visualizar" >';
                            echo '<input class="form_submitb" name="reset" type="reset" value="Cancelar" >';
                            echo '</p>';
                            echo '</form>';
                        }
                        ?>

                        <!--body ends-->
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

