<?php /* Smarty version 3.0rc1, created on 2010-10-07 03:31:20
         compiled from "views/professor/templates/mostraProgressaoFuncional.tpl" */ ?>
<?php /*%%SmartyHeaderCode:321784cad3f0847f9e7-14198225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '153894863e0b66030484e57a5a50be2012794645' => 
    array (
      0 => 'views/professor/templates/mostraProgressaoFuncional.tpl',
      1 => 1286422276,
    ),
  ),
  'nocache_hash' => '321784cad3f0847f9e7-14198225',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="viewProgressaoFuncional">
	<?php  $_smarty_tpl->tpl_vars['progressao'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('progressaoFuncional')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['progressao']->key => $_smarty_tpl->tpl_vars['progressao']->value){
?>
		<div class="viewProgressaoFuncionalItem">
			<div>Categoria Funcional</div>
			<div><?php echo $_smarty_tpl->getVariable('progressao')->value->categoriaFuncional;?>
</div>
			<div>Processo</div>
			<div><?php echo $_smarty_tpl->getVariable('progressao')->value->processo;?>
</div>
			<div>Data da Aprecia&ccedil;&atilde;o</div>
			<div><?php echo $_smarty_tpl->getVariable('progressao')->value->dataAvaliacao;?>
</div>
			<div>Nota Avalia&ccedil;&atilde;o</div>
			<div><?php echo $_smarty_tpl->getVariable('progressao')->value->notaAvaliacao;?>
</div>
			<div>A partir de:</div>
			<div><?php echo $_smarty_tpl->getVariable('progressao')->value->aPartirDe;?>
</div>
			<div>Portaria</div>
			<div><?php echo $_smarty_tpl->getVariable('progressao')->value->portaria;?>
</div>
			<div>Observacao</div>
			<div><?php echo $_smarty_tpl->getVariable('progressao')->value->observacao;?>
</div>
			<!-- 
			<table>
				<tr>
					<td>Categoria Funcional</td>
					<td><?php echo $_smarty_tpl->getVariable('progressao')->value->categoriaFuncional;?>
</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Processo</td>
					<td><?php echo $_smarty_tpl->getVariable('progressao')->value->processo;?>
</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Data da Aprecia&ccedil;&atilde;o do processo</td>
					<td><?php echo $_smarty_tpl->getVariable('progressao')->value->dataAvaliacao;?>
</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Categoria Funcional</td>
					<td><?php echo $_smarty_tpl->getVariable('progressao')->value->categoriaFuncional;?>
</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Categoria Funcional</td>
					<td><?php echo $_smarty_tpl->getVariable('progressao')->value->categoriaFuncional;?>
</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Categoria Funcional</td>
					<td><?php echo $_smarty_tpl->getVariable('progressao')->value->categoriaFuncional;?>
</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>Categoria Funcional</td>
					<td><?php echo $_smarty_tpl->getVariable('progressao')->value->categoriaFuncional;?>
</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			 -->
		</div>
	<?php }} else { ?>
		<div>
			<h4>Nenhuma progressao Funcional cadastrada para o professor selecionado.</h4>
		</div>
	<?php } ?>
</div>