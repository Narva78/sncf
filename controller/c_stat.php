<?php
if (!isset($_REQUEST['action'])) {
	$_REQUEST['action'] = 'statistiqueETPNU';
}
$action = $_REQUEST['action'];

switch ($action) {
	case 'statistiqueETPNU':
		$residences = $pdo->getResidences('ETPNU');
		$statsETPNU = $pdo->getAverageTimeByCodeRgAndResidence('ETPNU');
		include("views/header.php");

		include('views/statETPNU.php');
		break;

	case 'statistiqueETPLC':
		$residences = $pdo->getResidences('ETPLC');
		$statsETPLC = $pdo->getAverageTimeByCodeRgAndResidence('ETPLC');
		include("views/header.php");
		include('views/statETPLC.php');
		break;
}
