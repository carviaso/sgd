<?php /* Smarty version 3.0rc1, created on 2010-08-10 23:24:05
         compiled from "views/departamentos/templates/departamento.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287854c6209c5aee146-58397645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a95d366d47316d55590a7dc4bcbfcbc82a3b0e6' => 
    array (
      0 => 'views/departamentos/templates/departamento.tpl',
      1 => 1281493442,
    ),
  ),
  'nocache_hash' => '287854c6209c5aee146-58397645',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_smarty_tpl->getVariable('option')->value=='viewDepartamento'){?>
	<h1>Relat&oacute;rio de Centros</h1>
	<table class="aatable">
		<tr>
			<th>Nome</th>
			<th>Sigla</th>
			<th>Centro</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('departamentos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value){
?>
			<tr>
		    	<td><?php echo $_smarty_tpl->getVariable('departamento')->value->nome;?>
</td>
		    	<td><?php echo $_smarty_tpl->getVariable('departamento')->value->departamentoSigla;?>
</td>
		    	<td><?php echo $_smarty_tpl->getVariable('departamento')->value->centroSigla;?>
</td>
		    </tr>		
		<?php }} ?>
	</table>
	<div id="note">
		<p>Emitido em: <?php echo $_smarty_tpl->getVariable('emissao')->value;?>
</p>
	</div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('option')->value=='listDepartamento'){?>
	<h1>Relat&oacute;rio de Professores por Departamento</h1>
	<span>Escolha aqui o centro</span>
	
	<select id="selectDepartamentos">
		<?php  $_smarty_tpl->tpl_vars['departamento'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('departamentos')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['departamento']->key => $_smarty_tpl->tpl_vars['departamento']->value){
?>
		    <option value="<?php echo $_smarty_tpl->getVariable('departamento')->value->idDepartamento;?>
"><?php echo $_smarty_tpl->getVariable('departamento')->value->nome;?>
</option>
		<?php }} ?>
	</select>
	<br />
	<br />
	<div id="professoresPorDepartamento" ></div>
<?php }?>
<?php if ($_smarty_tpl->getVariable('option')->value=='viewProfessoresPorDepartamento'){?>
	<?php if (count($_smarty_tpl->getVariable('professores')->value)>0){?>
		<table class="aatable">
			<tr>
				<th>Nome</th>
				<th>Matr&iacute;cula</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['professor'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('professores')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if (count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['professor']->key => $_smarty_tpl->tpl_vars['professor']->value){
?>
				<tr>
					<td><?php echo $_smarty_tpl->getVariable('professor')->value->nome;?>
 <?php echo $_smarty_tpl->getVariable('professor')->value->sobrenome;?>
</td>
					<td><?php echo $_smarty_tpl->getVariable('professor')->value->matricula;?>
</td>
			    </tr>
			<?php }} ?>
		</table>
		<div id="note">
			<p>Emitido em: <?php echo $_smarty_tpl->getVariable('emissao')->value;?>
</p>
		</div>
	<?php }else{ ?>
		<h2>Nenhum registro encontrado.</h2>
	<?php }?>
<?php }?>