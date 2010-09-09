<?php

class DataHelper {

	/**
	 * Retorna a diferenca entre duas datas
	 *
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
}

?>