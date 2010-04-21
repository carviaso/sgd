<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Cadastro de Tipos de Afastamento</title>
        <meta name="keywords" content="tipo afastamento, cadastro" />
        <meta name="description" content="Esta é página de cadastro de tipos de afastamento do sistema de gestão de docentes" />
        <link href="css/default.css" rel="stylesheet" type="text/css" />
    </head>

    
    <body>
        <div id="wrapper">
        <?php include 'include/header.php'; ?>

            <!-- end div#header -->
            <div id="page">
                <div id="content">
                    <div id="welcome">
                        <h1>Cadastro de Tipos de Afastamento</h1>

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
                            if (!$_POST['Descricao']) {
                                echo "Digite uma descrição";
                            } else {
                                $descricao = $_POST['Descricao'];

                                $item = array(  'descricao' => $descricao);
                                
                                $result = $proxy->insert_tipo_afastamento( $item );

                                if (!$result) {
                                    echo 'Falha';
                                } else {
                                    echo 'Sucesso';
                                }
                            }
                        } else {
                            echo '<form method="post">';
                            echo '<p>';
                            echo '<div id="LDescricao">Descrição</div><input class="form_tfield" type="text" maxlength="100" name="Descricao" value="" /><br>';
                            
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
                    <?php include 'include/navCadastro.php'; ?>
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


