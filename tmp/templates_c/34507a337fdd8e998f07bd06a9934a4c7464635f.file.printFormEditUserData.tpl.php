<?php /* Smarty version 3.0rc1, created on 2010-09-24 02:17:25
         compiled from "views/professor/templates/printFormEditUserData.tpl" */ ?>
<?php /*%%SmartyHeaderCode:266894c9c0a35db57f1-50209172%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34507a337fdd8e998f07bd06a9934a4c7464635f' => 
    array (
      0 => 'views/professor/templates/printFormEditUserData.tpl',
      1 => 1285294642,
    ),
  ),
  'nocache_hash' => '266894c9c0a35db57f1-50209172',
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
<div>&nbsp;<div>
<div>Para alterar sua senha preencha os campos abaixo</div>
<div>Senha atual</div>
<input type="text" id="senhaAtual" name="senhaAtual" maxlength="32" value="" class="input ui-corner-all width100" />
<div>Nova senha</div>
<input type="text" id="novaSenha" name="novaSenha" maxlength="32" value="" class="input ui-corner-all width100" />
<div>Confirme a nova senha</div>
<input type="text" id="novaSenha2" name="novaSenha2" maxlength="32" value="" class="input ui-corner-all width100" />
<div>&nbsp;<div>
<div><button id="cadastrarProfessor" class="right button">Atualizar dados</button><div>