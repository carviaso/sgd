<?php /* Smarty version 3.0rc1, created on 2010-05-16 15:22:45
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10764bf037f57f1924-84406624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1272607038,
    ),
  ),
  'nocache_hash' => '10764bf037f57f1924-84406624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_popup_init')) include 'C:\wamp\www\SGD\app\library\Smarty-3.0rc1\libs\plugins\function.popup_init.php';
?><HTML>
<HEAD>
<?php echo smarty_function_popup_init(array('src'=>"/javascripts/overlib.js"),$_smarty_tpl->smarty,$_smarty_tpl);?>

<TITLE><?php echo $_smarty_tpl->getVariable('title')->value;?>
 - <?php echo $_smarty_tpl->getVariable('Name')->value;?>
</TITLE>
</HEAD>
<BODY bgcolor="#ffffff">
