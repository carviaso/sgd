<?php
function erro($resultado){
if (!$resultado)
     {
       echo "Erro do banco de dados, não foi possível consultar o banco de dados\n";
       echo 'Erro MySQL: ' . mysql_error();
      exit;
     }
}
?>