<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Relatório de Professores X Aposentadoria X Titulação</title>
        <meta name="keywords" content="professor x aposentadoria x titulacao, relatório" />
        <meta name="description" content="Esta é página de relatórios de professores x aposentadoria x titulacao do sistema de gestão de docentes" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>


    <body>
        <div id="wrapper">
        <?php include 'include/header.php'; ?>

            <!-- end div#header -->
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Relatório de Professores X Aposentadoria X Titulação</h1>

                        <!--body-->
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

                        //Se foi clicado no botão "Visualizar"
                        if (isset($_POST['submit'])) {
                            if (!$_POST['Quantidade_anos']) {
                                echo "Digite uma quantidade de anos";
                            } else if (!ctype_digit($_POST['Quantidade_anos'])) {
                                echo "A quantidade de anos deve ser numérica";

                            } else {
                                $quantidade_anos = $_POST['Quantidade_anos'];
                                $operador_logico_quantidade_anos = $_POST['Operador_logico_quantidade_anos'];
                                $id_tipo_titulacao = $_POST['Id_tipo_titulacao'];
                                $operador_logico_tipo_titulacao = $_POST['Operador_logico_tipo_titulacao'];

                                echo '<table class="aatable">';
                                    echo '<tr>';
                                        echo '<th>ID</th>';
                                        echo '<th>Nome</th>';
                                        echo '<th>Sobrenome</th>';
                                        echo '<th>Matrícula</th>';
                                        echo '<th>Siape</th>';
                                        echo '<th>Aposentado</th>';
                                        echo '<th>Data Previsão Aposentadoria</th>';
                                        echo '<th>Tipo Titulação</th>';
                                    echo '</tr>';

                                    echo 'ToDo: NÃO ESTÁ FUNCIONANDO CORRETAMENTE';

                                    $result = $proxy->get_all_professor_por_aposentadoria_por_tipo_titulacao(
                                        $quantidade_anos,
                                        $operador_logico_quantidade_anos,
                                        $id_tipo_titulacao,
                                        $operador_logico_tipo_titulacao);

                                    for($index=0; $index < count($result); $index++) {
                                        $depData = $result[$index];
                                        echo "<tr>";

                                        echo "<td>".$depData['id_professor']."</td>";
                                        echo "<td>".$depData['nome']."</td>";
                                        echo "<td>".$depData['sobrenome']."</td>";
                                        echo "<td>".$depData['matricula']."</td>";
                                        echo "<td>".$depData['siape']."</td>";

                                        if ($depData['aposentado']) {
                                            echo "<td>Sim</td>";
                                        } else {
                                            echo "<td>Não</td>";
                                        }
                                        echo "<td>".$depData['data_previsao_aposentadoria']."</td>";
                                        echo "<td>".$depData['id_tipo_titulacao']."</td>";

                                        echo "</tr>";
                                    }
                                    echo '</table>';
                            }

                        } else {
                            echo '<form method="post">';
                            echo '<p>';
                            echo '<div id="LOperadorLogicoQuantidadeAnos">Operador lógico sobre os anos para a aposentadoria</div>';
                            echo '<select name ="Operador_logico_quantidade_anos">';
                            echo "<OPTION VALUE = '=' >igual a";
                            echo "<OPTION VALUE = '>' >maior que";
                            echo "<OPTION VALUE = '<' >menor que";
                            echo "<OPTION VALUE = '>=' >maior ou igual a";
                            echo "<OPTION VALUE = '<=' >menor ou igual a";
                            echo '</select>';
                            echo '<div id="LQuantidadeAnos">Quantidade de anos para a aposentadoria</div><input class="form_tfield" type="text" maxlength="255" name="Quantidade_anos" value="" /><br>';
                            echo '</p>';

                            echo '<p>';
                            echo '<div id="LOperadorLogicoTipoTitulacao">Operador lógico sobre o tipo de titulação</div>';
                            echo '<select name ="Operador_logico_tipo_titulacao">';
                            echo "<OPTION VALUE = '=' >igual a";
                            echo "<OPTION VALUE = '>' >maior que";
                            echo "<OPTION VALUE = '<' >menor que";
                            echo "<OPTION VALUE = '>=' >maior ou igual a";
                            echo "<OPTION VALUE = '<=' >menor ou igual a";
                            echo '</select>';
                            echo '<div id="LTipoTitulacao">Tipo de Titulação</div>';
                            echo '<select name ="Id_tipo_titulacao">';

                            $result = $proxy->get_all_tipo_titulacao();

                            for($index=0; $index < count($result); $index++) {
                                $depData = $result[$index];
                                echo "<OPTION VALUE=".$depData['id_tipo_titulacao'].">".$depData['descricao'];
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

