<?php 
include("views/header.php");
//Si aucune action n'est spécifié 
if(!isset($_REQUEST['action'])){
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
            foreach ($dureeRepLast3Months as $key=>$value) {
                if($value[0] !== null){
                    $dureeRepLast3Months[$key] = intval($value[0]);
                    $somme3Months += $dureeRepLast3Months[$key];
                    $count3Months++;
                }
            }
            $moyenneLast3Months = $somme3Months/$count3Months; // Calcul de la moyenne
            $moyenneLast3Months = round($moyenneLast3Months, 2);//Arrondir à 2 chiffres après la virgule
            /* ---------------*/

            // Last 6 months
            $dureeRepLast6Months = $pdo->getDureeRepLast6Months(); // Récupère la durée de réparation de l'iPad en jour dans les 6 derniers mois
            $somme6Months = 0; // Initialise la variable somme à 0
            $count6Months = 0; // Initialise la variable count à 0
            foreach ($dureeRepLast6Months as $key=>$value) {
                if($value[0] !== null){
                    $dureeRepLast6Months[$key] = intval($value[0]);
                    $somme6Months += $dureeRepLast6Months[$key];
                    $count6Months++;
                }
            }
            $moyenneLast6Months = $somme6Months/$count6Months; // Calcul de la moyenne de la durée de réparation de l'iPad en jour
            $moyenneLast6Months = round($moyenneLast6Months, 2);//Arrondir à 2 chiffres après la virgule

            /* ---------------*/

            // Last 12 months
            $dureeRepLast12Months = $pdo->getDureeRepLast12Months(); // Récupère la durée de réparation de l'iPad en jour dans les 12 derniers mois
            $somme12Months = 0; // Initialise la variable somme à 0
            $count12Months = 0; // Initialise la variable count à 0
            foreach ($dureeRepLast12Months as $key=>$value) {
                if($value[0] !== null){
                    $dureeRepLast12Months[$key] = intval($value[0]);
                    $somme12Months += $dureeRepLast12Months[$key];
                    $count12Months++;
                }
            }
            $moyenneLast12Months = $somme12Months/$count12Months; // Calcul de la moyenne de la durée de réparation de l'iPad en jour
            $moyenneLast12Months = round($moyenneLast12Months, 2);//Arrondir à 2 chiffres après la virgule        
            
            /* ---------------*/

            // All Time
            $dureeRepAlltime = $pdo->getDureeRepAllTime(); // Récupère la durée de réparation de l'iPad en jour
            $somme = 0; // Initialise la variable somme à 0
            $count = 0; // Initialise la variable count à 0
            foreach ($dureeRepAlltime as $key=>$value) {
                if($value[0] !== null){
                    $dureeRepAlltime[$key] = intval($value[0]);
                    $somme += $dureeRepAlltime[$key];
                    $count++;
                }
            }
            $moyenneAllTime = $somme/$count; // Calcul de la moyenne de la durée de réparation de l'iPad en jour
            $moyenneAllTime = round($moyenneAllTime, 2);//Arrondir à 2 chiffres après la virgule

            /* --------------------------------------------------------------------------*/

            //Calcul du temps moyen d'attribution d'un Ipad

            // Last 3 months
            $dureeAttributionLast3Months = $pdo->getDureeAttributionLast3Months();
            $sommeAttrib3Months = 0; // Initialise la variable somme à 0
            $countAttrib3Months = 0; // Initialise la variable count à 0
            foreach ($dureeAttributionLast3Months as $key=>$value) {
                if($value[0] !== null){
                    $dureeAttributionLast3Months[$key] = intval($value[0]);
                    $sommeAttrib3Months += $dureeAttributionLast3Months[$key];
                    $countAttrib3Months++;
                }
            }
            $moyenneAttribLast3Months = $sommeAttrib3Months/$countAttrib3Months; // Calcul de la moyenne
            $moyenneAttribLast3Months = round($moyenneAttribLast3Months, 2);//Arrondir à 2 chiffres après la virgule

            /* ---------------*/

            // Last 6 months
            $dureeAttributionLast6Months = $pdo->getDureeAttributionLast6Months();
            $sommeAttrib6Months = 0; // Initialise la variable somme à 0
            $countAttrib6Months = 0; // Initialise la variable count à 0
            foreach ($dureeAttributionLast6Months as $key=>$value) {
                if($value[0] !== null){
                    $dureeAttributionLast6Months[$key] = intval($value[0]);
                    $sommeAttrib6Months += $dureeAttributionLast6Months[$key];
                    $countAttrib6Months++;
                }
            }
            $moyenneAttribLast6Months = $sommeAttrib6Months/$countAttrib6Months; // Calcul de la moyenne
            $moyenneAttribLast6Months = round($moyenneAttribLast6Months, 2);//Arrondir à 2 chiffres après la virgule

            /* ---------------*/

            // Last 12 months
            $dureeAttributionLast12Months = $pdo->getDureeAttributionLast12Months();
            $sommeAttrib12Months = 0; // Initialise la variable somme à 0
            $countAttrib12Months = 0; // Initialise la variable count à 0
            foreach ($dureeAttributionLast12Months as $key=>$value) {
                if($value[0] !== null){
                    $dureeAttributionLast12Months[$key] = intval($value[0]);
                    $sommeAttrib12Months += $dureeAttributionLast12Months[$key];
                    $countAttrib12Months++;
                }
            }
            $moyenneAttribLast12Months = $sommeAttrib12Months/$countAttrib12Months; // Calcul de la moyenne
            $moyenneAttribLast12Months = round($moyenneAttribLast12Months, 2);//Arrondir à 2 chiffres après la virgule

            /* ---------------*/

            // All Time
            $dureeAttributionAlltime = $pdo->getDureeAttributionAllTime();
            $sommeAttrib = 0; // Initialise la variable somme à 0
            $countAttrib = 0; // Initialise la variable count à 0
            foreach ($dureeAttributionAlltime as $key=>$value) {
                if($value[0] !== null){
                    $dureeAttributionAlltime[$key] = intval($value[0]);
                    $sommeAttrib += $dureeAttributionAlltime[$key];
                    $countAttrib++;
                }
            }
            $moyenneAttribAllTime = $sommeAttrib/$countAttrib; // Calcul de la moyenne
            $moyenneAttribAllTime = round($moyenneAttribAllTime, 2);//Arrondir à 2 chiffres après la virgule
    
            /* --------------------------------------------------------------------------*/

            //Calcul du nombre d'ipad attribué par affectation 
            //Last 3 months
            $nbIpadAttribLast3Months = $pdo->getNbAttributionByAffectationLast3Months();
            //Ligne C
            $nbIpad3MonthsLigneC = intval($nbIpadAttribLast3Months[0][1]);
            //LigneN&U
            $nbIpad3MonthsLigneNU = intval($nbIpadAttribLast3Months[1][1]);
            
            //Last 6 months
            $nbIpadAttribLast6Months = $pdo->getNbAttributionByAffectationLast6Months();
            //Ligne C
            $nbIpad6MonthsLigneC = intval($nbIpadAttribLast6Months[0][1]);
            //LigneN&U
            $nbIpad6MonthsLigneNU = intval($nbIpadAttribLast6Months[1][1]);

            //Last 12 months
            $nbIpadAttribLast12Months = $pdo->getNbAttributionByAffectationLast12Months();
            //Ligne C
            $nbIpad12MonthsLigneC = intval($nbIpadAttribLast12Months[0][1]);
            //LigneN&U
            $nbIpad12MonthsLigneNU = intval($nbIpadAttribLast12Months[1][1]);

            //All Time
            $nbIpadAttribAllTime = $pdo->getNbAttributionByAffectationAllTime();
            //Ligne C
            $nbIpadAllTimeLigneC = intval($nbIpadAttribAllTime[0][1]);
            //LigneN&U
            $nbIpadAllTimeLigneNU = intval($nbIpadAttribAllTime[1][1]);

            /* --------------------------------------------------------------------------*/

            //Autre
            //Récupère les données pour le nombre d'Ipad non réparable
            $nbIpadNonRep = $pdo->getNbNonReparable();
            $nonRep = $nbIpadNonRep[0][0];

            //Récupère les données pour le nombre d'ipad en réparation
            $nbIpadEnRep = $pdo->getNbEnReparation();
            $enRep = $nbIpadEnRep[0][0];

            //Récupère les données pour le nombre D'ipad en attente => si CodeDEv ou CompteIcloud est manquant
            $enAttente = $pdo->enAttente();
            $att = $enAttente[0][0];

            include('views/stat.php');
        // Inclusion de la vue
        
        break;
}

?>
