<?php /* Smarty version 3.0rc1, created on 2010-09-26 19:20:17
         compiled from "views/professor/templates/printFormUser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52664c9f9cf13aa3e4-56393536%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b5d1f68b266bbaacc2414d9e89459cd7b3d7b62' => 
    array (
      0 => 'views/professor/templates/printFormUser.tpl',
      1 => 1285528814,
    ),
  ),
  'nocache_hash' => '52664c9f9cf13aa3e4-56393536',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de Professor</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="<?php echo $_smarty_tpl->getVariable('professor')->value->nome;?>
" maxlength="100" class="input ui-corner-all width100" />
<div>Data de nascimento</div>
<input type="text" id="dataNascimento" value="<?php echo $_smarty_tpl->getVariable('professor')->value->dataNascimento;?>
" class="input ui-corner-all width100" />
<input type="hidden" id="siape" value="<?php echo $_smarty_tpl->getVariable('professor')->value->siape;?>
" />
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