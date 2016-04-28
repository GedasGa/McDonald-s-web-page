<?php

/**
 * Užkandžių redagavimo klasė
 *
 */

class uzkandziai {
	
	public function __construct() {
		
	}
	
	/**
	 * Gėžkandžiorimo išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getUzkandis($id) {
		$query = "  SELECT *
					FROM `PRODUKTAS`
					WHERE `ID`='{$id}'
					AND `tipas`=2";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Užkandžio sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getUzkandisList($limit = null, $offset = null) {
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
					WHERE `tipas`=2 AND `PRODUKTAS`.`porcija`=`dydziu_pavadinimai`.`id_dydziu_pavadinimai`" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Gėrimų kiekio radimas
	 * @return type
	 */
	public function getUzkandisListCount() {
		$query = "  SELECT COUNT(`ID`) as `kiekis`
					FROM `PRODUKTAS`
					WHERE `tipas`=2";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}
	
}