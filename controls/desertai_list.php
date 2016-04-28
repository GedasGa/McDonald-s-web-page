<?php
	
	// sukuriame klientų klasės objektą
	include 'libraries/desertai.class.php';
	$desertaiObj = new desertai();

	// sukuriame puslapiavimo klasės objektą
	include 'utils/paging.class.php';
	$paging = new paging(NUMBER_OF_ROWS_IN_PAGE);

?>

<?php if(isset($_GET['remove_error'])) { ?>
	<div class="errorBox">
		Klientas nebuvo pašalintas, nes turi užsakymą (-ų).
	</div>
<?php } ?>

<table>
	<tr>
		<th>Nuotrauka</th>
		<th>Pavadinimas</th>
		<th>Kaina</th>
		<th></th>
	</tr>
	<?php
		// suskaičiuojame bendrą įrašų kiekį
		$elementCount = $desertaiObj->getDesertasListCount();

		// suformuojame sąrašo puslapius
		$paging->process($elementCount, $pageId);

		// išrenkame nurodyto puslapio klientus
		$data = $desertaiObj->getDesertasList($paging->size, $paging->first);

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

