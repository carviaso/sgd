<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');
?>
<!DOCTYPE html>
<html class="ui-mobile-rendering"> 
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div data-role="page" id="id-pagina-principal">

	<div data-role="header" data-position="fixed" data-theme="a">
		<h1><?php echo SGD_TITULO_CABECALHO; ?></h1>

	</div><!-- /header -->

	<div data-role="content">	
		
		<div id="form-login" class="content-menu" style="margin-top: 10px">
			<div class="ui-body ui-body-b">
				<h4 style="margin:.5em 0">Para acessar digite seu Siape e sua senha:</h4>
				
				<div id="div-login-retorno" class="mensagem-login-retorno" align="center">Login e/ou senha incorreto(s)</div>
				
				<div data-role="fieldcontain">
			        <label for="siape-login">Siape:</label>
			        <input type="tel" placeholder="Siape" id="siape-login" value=""  />
				</div>
				<div data-role="fieldcontain">
			        <label for="senha-login">Senha:</label>
			        <input type="password" placeholder="Senha" id="senha-login" value=""  />
				</div>

				<div>
					<input id="bLogar" type="button" data-role="button" data-theme="e" value="Entrar" data-inline="true" />
				</div>
				
				<a href="esqueci_minha_senha.php" data-rel="dialog" style="margin-top: 10px; float: right;">Esqueci minha senha</a>

			</div>
		</div>
		
		<div class="content-page">
			<div class="ui-body ui-body-e">
			<h4 style="margin:.5em 0">Seja bem vindo!</h4>

			Este é um sistema desenvolvido para gerência das reuniões realizadas pela Comissão
			Permanente de Pessoal Docente da UFSC. 

			<br><br>
			Apesar de ser totalmente funcional, esta é uma versão beta a ser testada e possivelmente melhorada.
			</div>
			<div id="div-retorno"></div>
			
		</div>
		
	</div><!-- /content -->

	<?php require_once(dirname(__FILE__) . '/inc/inc.rodape.php'); ?>

</div><!-- /page -->

</body>
</html>