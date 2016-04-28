<?php

/**
 * Užkandžių redagavimo klasė
 *
 */

class salotos {
	
	public function __construct() {
		
	}
	
	/**
	 * Gėžkandžiorimo išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getSalotos($id) {
		$query = "  SELECT *
					FROM `PRODUKTAS`
					WHERE `ID`='{$id}'
					AND `tipas`=5";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Užkandžio sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getSalotosList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT *
					FROM `PRODUKTAS`
					WHERE `tipas`=5" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Gėrimų kiekio radimas
	 * @return type
	 */
	public function getSalotosListCount() {
		$query = "  SELECT COUNT(`ID`) as `kiekis`
					FROM `PRODUKTAS`
					WHERE `tipas`=5";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

	
}