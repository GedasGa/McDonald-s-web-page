<?php
	
	// sukuriame klientų klasės objektą
	include 'libraries/sumustiniai.class.php';
	$sumustiniaiObj = new sumustiniai();

	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

?>

<table>
	<tr>
		<th>Nuotrauka</th>
		<th>Pavadinimas</th>
		<th>Kaina</th>
		<th></th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $sumustiniaiObj->getSumustinisListCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio klientus
		$data = $sumustiniaiObj->getSumustinisList($paging->size, $paging->first);

		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
					. "<td><img src=images/{$val['nuotrauka']} height=80 width=150></td>"
					. "<td>{$val['pavadinimas']}</td>"
					. "<td>{$val['kaina']}</td>"
					. "<td>"
						. "<a href='index.php?module={$module}&id={$val['ID']}' title=''>Pridėti į krepšelį</a>"
					. "</td>"
				. "</tr>";
		}
	?>
</table>

<?php
	// įtraukiame puslapių šabloną
	include 'controls/paging.php';
?>

