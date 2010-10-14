<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>SGD &minus; Sistema de Gest&atilde;o de Docentes</title>
		<link type="text/css" href="public/css/base/jquery.ui.all.css" rel="stylesheet" />
		<link type="text/css" href="public/css/default.css" rel="stylesheet" />

		<!--
		<link type="text/css" href="public/css/custom-theme/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
		-->

		<link type="text/css" href="public/css/ui.jqgrid.css" rel="stylesheet" />
	</head>
	<body>
		<div id="wrapper">
			<?php include 'app/views/header.php'; ?>
			<div id="page">
				<div id="content">
					<?php include 'app/views/sobre.php'; ?>
				</div>
				<div id="sidebar">
				<?php
					if ( !isset( $_SESSION['logado'] ) ) {
						include 'app/views/menuLogin.php';
					} //else {
						//include 'app/views/menuCadastro.php';
					//}
				?>
				</div>
				<div style="clear: both; height: 1px"></div>
			</div>
			<div id="auxiliarOculta"></div>
			<?php include 'app/views/footer.php'; ?>
		</div>
		<script type="text/javascript" src="public/js/jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="public/js/jquery-ui-1.8.4.custom.min.js"></script>

		<script type="text/javascript" src="public/js/plugins/myMultiSelect.js"></script>
		<script type="text/javascript" src="public/js/plugins/jquery.maskedinput-1.2.2.min.js"></script>
		<script type="text/javascript" src="public/js/locate/jquery.ui.datepicker-pt-BR.js"></script>
		<script type="text/javascript" src="public/js/locate/grid.locale-pt-br.js"></script>
		<script type="text/javascript" src="public/js/plugins/jquery.jqGrid.min.js"></script>
		<script type="text/javascript" src="public/js/plugins/jquery.searchFilter.js"></script>
		<script type="text/javascript" src="public/js/plugins/grid.formedit.js"></script>
		<script type="text/javascript" src="public/js/plugins/grid.common.js"></script>
		<script type="text/javascript" src="public/js/plugins/jquery.blockUI.js"></script>
		<script type="text/javascript" src="public/js/plugins/jquery.limit-1.2.js"></script>
		<script type="text/javascript" src="public/js/plugins/jquery.magnifier.js"></script>
		<script type="text/javascript" src="public/js/globals.js"></script>
		<script type="text/javascript" src="public/js/login.js"></script>
		<script type="text/javascript" src="public/js/cadastros.js"></script>
		<script type="text/javascript" src="public/js/professores.js"></script>
		<script type="text/javascript" src="public/js/relatorios.js"></script>
		<script type="text/javascript" src="public/js/formularios.js"></script>
		<script type="text/javascript" src="public/js/loader.js"></script>
	</body>
</html>