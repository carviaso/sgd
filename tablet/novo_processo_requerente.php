<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'master.php');

?>
<html class="ui-mobile-rendering">
<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'inc.head.php');
?>
<body>
<div id="novo-processo-requerente" data-role="dialog">

		<div data-role="header" data-theme="d">
			<h1>Selecione um requerente</h1>

		</div>
		<div data-role="content" data-theme="c">
			<br>
			<label for="nome-requerente-search">Pesquisar por nome:</label>
			<input type="search" name="nome-requerente-search" id="nome-requerente-search" value="" />
			<br>
			<div id="lista-requerente">
				<ol id="listview-requerente" data-role="listview" data-inset="true">
					
				</ol>
			</div>
		</div>


</div>

</body>
</html>