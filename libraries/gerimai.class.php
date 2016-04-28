<?php

/**
 * Gėrimų redagavimo klasė
 *
 */

class gerimai {
	
	public function __construct() {
		
	}
	
	/**
	 * Gėrimo išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getGerimas($id) {
		$query = "  SELECT *
					FROM `PRODUKTAS`
					WHERE `ID`='{$id}'
					AND `tipas`=3";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Gėrimų sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getGerimasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT `PRODUKTAS`.`pavadinimas`, 
						   `PRODUKTAS`.`kaina`, 
						   `PRODUKTAS`.`nuotrauka`,
						   `dydziu_pavadinimai`.`name` AS `porcija`
					FROM `PRODUKTAS`, `dydziu_pavadinimai`
					WHERE `tipas`=3 AND `PRODUKTAS`.`porcija`=`dydziu_pavadinimai`.`id_dydziu_pavadinimai`" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Gėrimų kiekio radimas
	 * @return type
	 */
	public function getGerimasListCount() {
		$query = "  SELECT COUNT(`ID`) as `kiekis`
					FROM `PRODUKTAS`
					WHERE `tipas`=3";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
}