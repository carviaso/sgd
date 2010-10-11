<?php

class DataHelper {

	/**
	 * Retorna a diferenca entre duas datas
	 * @todo Melhorar funcao, fazer retorno por tipo
	 * @return int
	 */
	function dataDiff( $date1, $date2, $type = '' ) {
//		$date1 = "2007-03-24";
//		$date2 = "2009-06-26";
		$data = new stdClass();
		$diff = abs(strtotime($date2) - strtotime($date1));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));

//		switch ( $type ) {
//			case 'd':
//			;
//			break;
//
//			default:
//				;
//			break;
//		}

//		printf("%d years, %d months, %d days\n", $years, $months, $days);
		$meses = ($years*12)+$months;
		$data->meses = $meses;
		return $data;
	}

	/**
	 * Retorna o mes por extenso
	 *
	 * @param int - Numero do mes do ano
	 * @return string
	 */
	function mesExtenso( $int ) {
		$mes['1'] = 'Janeiro';
		$mes['2'] = 'Fevereiro';
		$mes['3'] = 'Mar&ccedil;o';
		$mes['4'] = 'Abril';
		$mes['5'] = 'Maio';
		$mes['6'] = 'Junho';
		$mes['7'] = 'Julho';
		$mes['8'] = 'Agosto';
		$mes['9'] = 'Setembro';
		$mes['10'] = 'Outubro';
		$mes['11'] = 'Novembro';
		$mes['12'] = 'Dezembro';
		return $mes[$int];
	}

	/**
	 * Verifica se a data eh valida no formato ANO-MES-DIA e caso seja valida
	 * retorna a data no formato DD/MM/YYYY caso contrario retorna vazio.
	 *
	 * @param string format 2005-12-25
	 * @return string format 25/12-2005
	 */
	function validaData( $date ) {
		$aDate_parts = preg_split("/[\s-]+/", $date);
		if( !empty( $date ) && checkdate( $aDate_parts[1], $aDate_parts[2], $aDate_parts[0] ) ) {
			$date = date( 'd/m/Y', strtotime( $date ) );
		} else {
			$date = '';
		}
		return $date;
	}
}

?>