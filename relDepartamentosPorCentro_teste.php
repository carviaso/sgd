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
                        <h1>Relat&oacute;rio de Departamentos por Centro</h1>

                        <!--body-->

<div id="contguia">
<div id="popdown">
<p>Escolha aqui o Centro
<select id="curso" name="curso" onchange="location.href='relDepartamentosPorCentro_teste_1.php?curso='+this.value">
	<option></option>
	<option value = 2   >Centro de Ci&ecirc;ncias Agr&aacute;rias</option>
	<option value = 3   >Centro de Ci&ecirc;ncias Biol&oacute;gicas</option>
	<option value = 8   >Centro de Ci&ecirc;ncias da Educa&ccedil;&atilde;o</option>
	<option value = 6   >Centro de Ci&ecirc;ncias da Sa&uacute;de</option>	
	<option value = 10   >Centro de Ci&ecirc;ncias F&iacute;sicas e Matem&aacute;ticas</option>
	<option value = 5   >Centro de Ci&ecirc;ncias Jur&iacute;dicas</option>
	<option value = 4   >Centro de Comunica&ccedil;&atilde;o e Express&atilde;o</option>
	<option value = 7   >Centro de Desportos</option>
	<option value = 9   >Centro de Filosofia e Ci&ecirc;ncias Humanas</option>
	<option value = 11   >Centro de S&oacute;cio Ec&ocirc;nomico</option>
	<option value = 1   >Centro Tecnol&oacute;gico</option>
	
</select></p>
</div>
</div> 

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

