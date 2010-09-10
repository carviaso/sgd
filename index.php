<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>SGD - Sistema de Gest&atilde;o de Docentes</title>
        <meta name="keywords" content="docente, list" />
        <meta name="description" content="Esta &eacute; p&aacute;gina principal do sistema de gest&atilde;o de docentes" />
        <link type="text/css" href="public/css/default.css" rel="stylesheet"  />
        <link type="text/css" href="public/css/base/jquery.ui.all.css" rel="stylesheet"  />
        <!--
        <link type="text/css" href="public/css/custom-theme/jquery-ui-1.8.4.custom.css" rel="stylesheet"  />
         -->
        <link type="text/css" href="public/css/ui.selectmenu.css" rel="stylesheet"  />
    </head>
    <body>
        <div id="wrapper">
			<?php include 'app/views/header.php'; ?>
            <div id="page">
                <div id="content">
					<?php include 'app/views/sobre.php'; ?>
                </div>
                <div id="sidebar">
                    <?php include 'app/views/menuCadastro.php'; ?>
                </div>
                <div style="clear: both; height: 1px"></div>
            </div>
            <?php include 'app/views/footer.php'; ?>
        </div>
        <script type="text/javascript" src="public/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="public/js/jquery-ui-1.8.4.custom.min.js"></script>
        <script type="text/javascript" src="public/js/locate/jquery.ui.datepicker-pt-BR.js"></script>
        <script type="text/javascript" src="public/js/jquery.maskedinput-1.2.2.min.js"></script>
        <script type="text/javascript" src="public/js/ui.selectmenu.js"></script>
        <script type="text/javascript" src="public/js/globals.js"></script>
        <script type="text/javascript" src="public/js/loader.js"></script>
        <script type="text/javascript" src="public/js/cadastros.js"></script>
        <script type="text/javascript" src="public/js/professores.js"></script>
        <script type="text/javascript" src="public/js/relatorios.js"></script>
    </body>
</html>