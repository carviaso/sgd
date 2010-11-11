<div id="userInfo">
	<div><?php
		if( isset( $_SESSION['logado'] ) ) {
			echo "<a href='javascript:void(0);' id='editUserData'>{$_SESSION['nome']}</a>";
			echo ' | <a href="javascript:void(0);" id="logout">Sair</a>';
		} else {
			echo '&nbsp;';
		}
	?></div>
</div>
<div id="header">
	<div id="logo">
		<h1><a href="index.php">SGD</a></h1>
		<h2><a href="index.php">Sistema de Gest&atilde;o de Docentes da UFSC</a></h2>
	</div>
	<div id="menu"><?php
		if( isset( $_SESSION['logado'] ) ) {
			 include_once 'menu.php';
		}
	?></div>
</div>