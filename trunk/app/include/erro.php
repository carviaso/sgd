<?php
function erro($resultado){
if (!$resultado)
     {
       echo "Erro do banco de dados, n�o foi poss�vel consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }
}
?>