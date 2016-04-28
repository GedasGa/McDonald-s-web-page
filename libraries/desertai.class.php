<?php

/**
 * Užkandžių redagavimo klasė
 *
 */

class desertai {
	
	public function __construct() {
		
	}
	
	/**
	 * Gėžkandžio išrinkimas
	 * @param type $id
	 * @return type
	 */
	public function getDesertas($id) {
		$query = "  SELECT *
					FROM `PRODUKTAS`
					WHERE `ID`='{$id}'
					AND `tipas`=6";
		$data = mysql::select($query);
		
		return $data[0];
	}
	
	/**
	 * Užkandžio sąrašo išrinkimas
	 * @param type $limit
	 * @param type $offset
	 * @return type
	 */
	public function getDesertasList($limit = null, $offset = null) {
		$limitOffsetString = "";
		if(isset($limit)) {
			$limitOffsetString .= " LIMIT {$limit}";
		}
		if(isset($offset)) {
			$limitOffsetString .= " OFFSET {$offset}";
		}
		
		$query = "  SELECT *
					FROM `PRODUKTAS`
					WHERE `tipas`=6" . $limitOffsetString;
		$data = mysql::select($query);
		
		return $data;
	}

	/**
	 * Gėrimų kiekio radimas
	 * @return type
	 */
	public function getDesertasListCount() {
		$query = "  SELECT COUNT(`ID`) as `kiekis`
					FROM `PRODUKTAS`
					WHERE `tipas`=6";
		$data = mysql::select($query);
		
		return $data[0]['kiekis'];
	}

	
}