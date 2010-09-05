<?php /* Smarty version 3.0rc1, created on 2010-09-04 23:23:34
         compiled from "views/uf/templates/uf.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114914c82d4f66d4210-99921613%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c98b16296e93e3719cd0f8fcd1a18ec47bec2ff0' => 
    array (
      0 => 'views/uf/templates/uf.tpl',
      1 => 1283642289,
    ),
  ),
  'nocache_hash' => '114914c82d4f66d4210-99921613',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1>Cadastro de UF</h1>
<div>Nome</div>
<input type="text" id="nome" name="nome" value="" maxlength="100" class="ui-state-default ui-corner-all width100" />
<div>Sigla</div>
<input type="text" id="sigla" name="sigla" value="" maxlength="3" class="ui-state-default ui-corner-all width100" />
<div>Pa&iacute;s</div>
<select id="idPais" class="width100">
<?php  $_smarty_tpl->tpl_vars['pais'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('paises')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pais']->key => $_smarty_tpl->tpl_vars['pais']->value){
?>
	<option value="<?php echo $_smarty_tpl->getVariable('pais')->value->idPais;?>
"><?php echo $_smarty_tpl->getVariable('pais')->value->nome;?>
</option>
<?php }} ?>
</select>
<p></p>
<p><button id="cadastrarUf">Cadastrar</button></p>