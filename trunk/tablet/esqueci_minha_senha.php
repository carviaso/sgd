<div id="esqueci-minha-senha" data-role="page">
	
	<div data-role="header" data-theme="d">
		<h1>Esqueceu sua senha?</h1>

	</div>

	<div data-role="content" data-theme="c">
		Preencha o campo abaixo com o seu siape que em breve você 
		receberá um e-mail informando sua senha de acesso ao sistema.
		<div id="div-esqueci-senha-retorno" class="mensagem-login-retorno" align="center"></div>
		<div data-role="fieldcontain">
	        <label for="numero-siape">Siape:</label>
	        <input type="tel" id="numero-siape" value=""  />
		</div>
		<br />
		<a href="#" data-inline="true" data-role="button" data-rel="back" data-theme="e">Fechar</a>       
		<input id="bEnviarSenhaParaEmail" type="button" data-role="button" data-theme="c" value="Enviar senha para o meu e-mail" data-inline="true" />    
	</div>
</div>