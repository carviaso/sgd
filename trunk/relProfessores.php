<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Relatório de Professor</title>
        <meta name="keywords" content="professor, relatório" />
        <meta name="description" content="Esta é página de relatórios do professor do sistema de gestão de docentes" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="wrapper">
            <?php include 'include/header.php'; ?>
            <!-- end div#header -->
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Relatório de Professor</h1>
                        <!-- Fetch Rows -->
                        <table class="aatable">
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Matrícula</th>
                                <th>Siape</th>
                                <th>Data Admissão</th>
                                <th>Data Admissão UFSC</th>
                                <th>Aposentado</th>
                                <th>Data Aposentadoria</th>
                                <th>Data Previsão Aposentadoria</th>
                                <th>Departamento</th>
                                <th>Categoria Funcional Inicial</th>
                                <th>Categoria Funcional Atual</th>
                                <th>Tipo Titulação</th>
                                <th>Categoria Funcional Ref.</th>
                            </tr>

                            <?php
                            require_once("lib/nusoap.php");
                            require_once("classes/configuration.php");

                            $config = new Configuration();
                            $wsdl = $config->get_wsdl();
                            $client = new soapclientnusoap($wsdl, true);
                            $err = $client->getError();
                            if ($err) {
                                echo '<h2>Erro na construcao do cliente nuSoap: </h2><pre>' . $err . '</pre>';
                            }
                            $proxy = $client->getProxy();
                            $result = $proxy->get_all_professor();

                            for($index=0; $index < count($result); $index++) {
                                $depData = $result[$index];
                                echo "<tr>";
                                echo "<td>".$depData['id_professor']."</td>";
                                echo "<td>".$depData['nome']."</td>";
                                echo "<td>".$depData['sobrenome']."</td>";
                                echo "<td>".$depData['matricula']."</td>";
                                echo "<td>".$depData['siape']."</td>";
                                echo "<td>".$depData['data_admissao']."</td>";
                                echo "<td>".$depData['data_admissao_ufsc']."</td>";
                                if ($depData['aposentado']) {
                                    echo "<td>Sim</td>";
                                } else {
                                    echo "<td>Não</td>";
                                }
                                echo "<td>".$depData['data_aposentadoria']."</td>";
                                echo "<td>".$depData['data_previsao_aposentadoria']."</td>";

                                $result2 = $proxy->get_departamento( $depData['id_departamento'] );
                                $depData2 = $result2[0];
                                echo "<td>".$depData2['nome']."</td>";

                                $result2 = $proxy->get_categoria_funcional( $depData['id_categoria_funcional_inicial'] );
                                $depData2 = $result2[0];
                                echo "<td>".$depData2['descricao']."</td>";

                                $result2 = $proxy->get_categoria_funcional( $depData['id_categoria_funcional_atual'] );
                                $depData2 = $result2[0];
                                echo "<td>".$depData2['descricao']."</td>";

                                $result2 = $proxy->get_tipo_titulacao( $depData['id_tipo_titulacao'] );
                                $depData2 = $result2[0];
                                echo "<td>".$depData2['descricao']."</td>";
                                
                                $result2 = $proxy->get_categoria_funcional( $depData['id_categoria_funcional_referencia'] );
                                $depData2 = $result2[0];
                                echo "<td>".$depData2['descricao']."</td>";
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

