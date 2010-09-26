<h1>Cadastro de Professor</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="{$professor->nome}" maxlength="100" class="input ui-corner-all width100" />
<div>Data de nascimento</div>
<input type="text" id="dataNascimento" value="{$professor->dataNascimento}" class="input ui-corner-all width100" />
<input type="hidden" id="siape" value="{$professor->siape}" />
<div>&nbsp;<div>
<div>Para alterar sua senha preencha os campos abaixo</div>
<div>Senha atual</div>
<input type="password" id="senhaAtual" name="senhaAtual" maxlength="32" value="" class="input ui-corner-all width100" />
<div>Nova senha</div>
<input type="password" id="novaSenha" name="novaSenha" maxlength="32" value="" class="input ui-corner-all width100" />
<div>Confirme a nova senha</div>
<input type="password" id="novaSenha2" name="novaSenha2" maxlength="32" value="" class="input ui-corner-all width100" />
<div>&nbsp;<div>
<div><button id="cadastrarProfessor" class="right button">Atualizar dados</button><div>