<?php
	// nuskaitome konfigūracijų failą
	include 'config.php';

	// iškviečiame prisijungimo prie duomenų bazės klasę
	include 'utils/mysql.class.php';
	
	// nustatome pasirinktą modulį
	$module = '';
	if(isset($_GET['module'])) {
		$module = mysql::escape($_GET['module']);
	}
	
	// jeigu pasirinktas elementas (sutartis, automobilis ir kt.), nustatome elemento id
	$id = '';
	if(isset($_GET['id'])) {
		$id = mysql::escape($_GET['id']);
	}
	
	// nustatome, ar kuriamas naujas elementas
	$action = '';
	if(isset($_GET['action'])) {
		$action = mysql::escape($_GET['action']);
	}
	
	// jeigu šalinamas elementas, nustatome šalinamo elemento id
	$removeId = 0;
	if(!empty($_GET['remove'])) {
		// paruošiame $_GET masyvo id reikšmę SQL užklausai
		$removeId = mysql::escape($_GET['remove']);
	}
		
	// nustatome elementų sąrašo puslapio numerį
	$pageId = 1;
	if(!empty($_GET['page'])) {
		$pageId = mysql::escape($_GET['page']);
	}
	
	// nustatome, kiek įrašų rodysime elementų sąraše
	define('NUMBER_OF_ROWS_IN_PAGE', 10);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="robots" content="noindex">
		<title>McDonaldo savitarna</title>
		<link rel="stylesheet" type="text/css" href="scripts/datetimepicker/jquery.datetimepicker.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
		<script type="text/javascript" src="scripts/jquery-1.12.0.min.js"></script>
		<script type="text/javascript" src="scripts/datetimepicker/jquery.datetimepicker.full.min.js"></script>
		<script type="text/javascript" src="scripts/main.js"></script>
	</head>
	<body>
		<div id="body">
			<div id="header">
				<a href=index.php><img id="logo" src=images/mc-do.png height="120px"/></a>
				<h3 id="slogan"><a href="index.php">McDonaldo savitarnos užsakymų sistema</a></h3>
			</div>
			<div id="content">
				<div id="topMenu">
					<ul class="float-left">
						<li><a href="index.php?module=sumustiniai" title="Sumuštiniai"<?php if($module == 'sumustiniai') { echo 'class="active"'; } ?>>Sumuštiniai</a></li>
						<li><a href="index.php?module=uzkandziai" title="Uzkandziai"<?php if($module == 'uzkandziai') { echo 'class="active"'; } ?>>Užkandžiai</a></li>
						<li><a href="index.php?module=gerimai" title="Gerimai"<?php if($module == 'gerimai') { echo 'class="active"'; } ?>>Gėrimai</a></li>
						<li><a href="index.php?module=padazai" title="Padažai"<?php if($module == 'padazai') { echo 'class="active"'; } ?>>Padažai</a></li>
						<li><a href="index.php?module=salotos" title="Salotos"<?php if($module == 'salotos') { echo 'class="active"'; } ?>>Salotos</a></li>
						<li><a href="index.php?module=desertai" title="Desertai"<?php if($module == 'desertai') { echo 'class="active"'; } ?>>Desertai</a></li>
					</ul>
					<ul class="float-right">
						<!--float right-->
					</ul>
				</div>
				<div id="contentMain">
					<?php
						if(!empty($module)) {
							if(empty($id) && empty($action)) {
								include "controls/{$module}_list.php";
							} else {
								include "controls/{$module}_edit.php";
							}
						}
						else {
							include "controls/news.php";
						}
					?>
					<div class="float-clear"></div>
				</div>
			</div>
			<div id="footer">
				<p>All rights reserved © 2016</p>
			</div>
		</div>
	</body>
</html>
