<?php
include("views/header.php");
//Si aucune action n'est spécifié 
if (!isset($_REQUEST['action'])) {
	$_REQUEST['action'] = 'statistique';
}
$action = $_REQUEST['action'];

switch ($action) {
	case 'statistique':
		// Calcul du temps moyen de réparation d'un iPad
		// Last 3 months

		$dureeRepLast3Months = $pdo->getDureeRepLast3Months(); // Récupère la durée de réparation de l'iPad en jour dans les 3 derniers mois

		$somme3Months = 0; // Initialise la variable somme à 0
		$count3Months = 0; // Initialise la variable count à 0
		foreach ($dureeRepLast3Months as $key => $value) {
			if ($value[0] !== null) {
				$dureeRepLast3Months[$key] = intval($value[0]);
				$somme3Months += $dureeRepLast3Months[$key];
				$count3Months++;
			}
		}
		$moyenneLast3Months = $somme3Months / $count3Months; // Calcul de la moyenne
		$moyenneLast3Months = round($moyenneLast3Months, 2); //Arrondir à 2 chiffres après la virgule
		/* ---------------*/



		// All Time
		$dureeRepAlltime = $pdo->getDureeRepAllTime(); // Récupère la durée de réparation de l'iPad en jour
		$somme = 0; // Initialise la variable somme à 0
		$count = 0; // Initialise la variable count à 0
		foreach ($dureeRepAlltime as $key => $value) {
			if ($value[0] !== null) {
				$dureeRepAlltime[$key] = intval($value[0]);
				$somme += $dureeRepAlltime[$key];
				$count++;
			}
		}
		$moyenneAllTime = $somme / $count; // Calcul de la moyenne de la durée de réparation de l'iPad en jour
		$moyenneAllTime = round($moyenneAllTime, 2); //Arrondir à 2 chiffres après la virgule

		/* --------------------------------------------------------------------------*/

		//Calcul du temps moyen d'attribution d'un Ipad

		// Last 3 months
		$dureeAttributionLast3Months = $pdo->getDureeAttributionLast3Months();
		$sommeAttrib3Months = 0; // Initialise la variable somme à 0
		$countAttrib3Months = 0; // Initialise la variable count à 0
		foreach ($dureeAttributionLast3Months as $key => $value) {
			if ($value[0] !== null) {
				$dureeAttributionLast3Months[$key] = intval($value[0]);
				$sommeAttrib3Months += $dureeAttributionLast3Months[$key];
				$countAttrib3Months++;
			}
		}
		$moyenneAttribLast3Months = $sommeAttrib3Months / $countAttrib3Months; // Calcul de la moyenne
		$moyenneAttribLast3Months = round($moyenneAttribLast3Months, 2); //Arrondir à 2 chiffres après la virgule

		/* ---------------*/


		// All Time
		$dureeAttributionAlltime = $pdo->getDureeAttributionAllTime();
		$sommeAttrib = 0; // Initialise la variable somme à 0
		$countAttrib = 0; // Initialise la variable count à 0
		foreach ($dureeAttributionAlltime as $key => $value) {
			if ($value[0] !== null) {
				$dureeAttributionAlltime[$key] = intval($value[0]);
				$sommeAttrib += $dureeAttributionAlltime[$key];
				$countAttrib++;
			}
		}
		$moyenneAttribAllTime = $sommeAttrib / $countAttrib; // Calcul de la moyenne
		$moyenneAttribAllTime = round($moyenneAttribAllTime, 2); //Arrondir à 2 chiffres après la virgule


		include('views/stat.php');
		// Inclusion de la vue

		break;
}
