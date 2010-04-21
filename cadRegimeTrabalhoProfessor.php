<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Cadastro de Regimes de Trabalho do Professor</title>
        <meta name="keywords" content="regime trabalho professor, cadastro" />
        <meta name="description" content="Esta é página de cadastro de regimes de trabalho do professor do sistema de gestão de docentes" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>

    
    <body>
        <div id="wrapper">
        <?php include 'include/header.php'; ?>

            <!-- end div#header -->
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Cadastro de Regimes de Trabalho do Professor</h1>

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

                        //Se foi clicado no botão "Gravar"
                        if (isset($_POST['submit'])) {
                            if ( !ctype_digit($_POST['Dia'])) {
                                echo "O dia deve ser numérico";
                            } else if ( !ctype_digit($_POST['Mes'])) {
                                echo "O mês deve ser numérico";
                            } else if ( !ctype_digit($_POST['Ano'])) {
                                echo "O ano deve ser numérico";

                            } else {

                                $id_professor = $_POST['Id_professor'];
                                $id_regime_trabalho = $_POST['Id_regime_trabalho'];
                                $processo = $_POST['Processo'];
                                $deliberacao = $_POST['Deliberacao'];
                                $portaria = $_POST['Portaria'];
                                $data_inicio =  $_POST['Ano'].'-'.
                                                $_POST['Mes'].'-'.
                                                $_POST['Dia'];

                                $item = array(  'id_professor' => $id_professor,
                                                'id_regime_trabalho' => $id_regime_trabalho,
                                                'processo' => $processo,
                                                'deliberacao' => $deliberacao,
                                                'portaria' => $portaria,
                                                'data_inicio' => $data_inicio);
                                
                                $result = $proxy->insert_regime_trabalho_professor( $item );

                                if (!$result) {
                                    echo 'Falha';
                                } else {
                                    echo 'Sucesso';
                                }
                            }
                        } else {
                            echo '<form method="post">';
                            echo '<p>';
                            echo '<div id="LProfessor">Professor</div>';
                            echo '<select name ="Id_professor">';
                            $result = $proxy->get_all_professor();
                            for($index=0; $index < count($result); $index++) {
                                $depData = $result[$index];
                                echo "<OPTION VALUE=".$depData['id_professor'].">".$depData['nome']." ".$depData['sobrenome'];
                            }
                            echo '</select>';

                            echo '<div id="LRegimeTrabalho">Regime de Trabalho</div>';
                            echo '<select name ="Id_regime_trabalho">';
                            $result = $proxy->get_all_regime_trabalho();
                            for($index=0; $index < count($result); $index++) {
                                $depData = $result[$index];
                                echo "<OPTION VALUE=".$depData['id_regime_trabalho'].">".$depData['descricao'];
                            }
                            echo '</select>';

                            echo '<div id="LProcesso">Processo</div><input class="form_tfield" type="text" maxlength="45" name="Processo" value="" /><br>';
                            echo '<div id="LDeliberacao">Deliberação</div><input class="form_tfield" type="text" maxlength="45" name="Deliberacao" value="" /><br>';
                            echo '<div id="LPortaria">Portaria</div><input class="form_tfield" type="text" maxlength="45" name="Portaria" value="" /><br>';

                            echo '<div id="LDataInicio">Data de início (dd/mm/aaaa)</div>';
                            echo '<input class="form_tfield" id="Dia" name="Dia" class="element text" size="2" maxlength="2" value="" type="text"> /';
                            echo '<input class="form_tfield" id="Mes" name="Mes" class="element text" size="2" maxlength="2" value="" type="text"> /';
                            echo '<input class="form_tfield" id="Ano" name="Ano" class="element text" size="4" maxlength="4" value="" type="text">';

                            echo '</p>';
                            echo '<p></p>';
                            echo '<p>';
                            echo '<input class="form_submitb" name="submit" type="submit" value="Gravar" >';
                            echo '<input class="form_submitb" name="reset" type="reset" value="Cancelar" >';
                            echo '</p>';
                            echo '</form>';
                        }
                        ?>
                        
                        <!--body ends-->
                    </div>
                    
                    <!-- end div#welcome -->			
                    
                </div>
                <!-- end div#content -->
                <div id="sidebar">
                    <ul>
                    <?php include 'include/navProfessor.php'; ?>
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


