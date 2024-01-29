<?php
require_once("fonction/pdo.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = PdoIpad::getPdoIpad();

// Votre logique pour traiter la requête AJAX
if (isset($_GET['action']) && $_GET['action'] == 'loadStatsByResidence') {
	$residence = $_GET['residence'];
	$statsByResidence = $pdo->getStatsByResidence($residence);
	$jsonData = json_encode($statsByResidence);
	header('Content-Type: application/json');
	echo $jsonData;
	die();
}

// Autres traitements pour d'autres requêtes AJAX si nécessaire
