<?php

class FormataHelper {

	/**
	 * Retorna um numero de 8 digitos no formato (48)8765-1234
	 *
	 * @param varchar(8) $telefone
	 * @return varchar
	 */
	function foneFormato( $fone ) {
		if ( strlen( $fone ) != 10 ){
			return 'Numero invali';
		} else {
			return '(' . substr($fone, 0, 2) . ')' . substr($fone, 2, 4) . '-' . substr($fone, -4);
		}
	}
}
?>