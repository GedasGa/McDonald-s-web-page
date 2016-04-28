<?php

/**
 * Užkandžių redagavimo klasė
 *
 */

class padazai {
	
	public function __construct() {
		
	}
	
	/**
	 * Gėžkandžiorimo išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getPadazas($id) {
		$query = "  SELECT *
					FROM `PRODUKTAS`
					WHERE `ID`='{$id}'
					AND `tipas`=4";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Užkandžio sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getPadazasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT *
					FROM `PRODUKTAS`
					WHERE `tipas`=4" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Gėrimų kiekio radimas
	 * @return type
	 */
	public function getPadazasListCount() {
		$query = "  SELECT COUNT(`ID`) as `kiekis`
					FROM `PRODUKTAS`
					WHERE `tipas`=4";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

	
}