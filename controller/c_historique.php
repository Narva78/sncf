<?php

use Dompdf\Dompdf;

include("views/header.php");
// Si aucune action n'est spécifiée, on affiche la liste des iPads
if (!isset($_REQUEST['action'])) {
	$_REQUEST['action'] = 'historique';
}

// Sélection de l'action à effectuer en fonction de la valeur de action
$action = $_REQUEST['action'];

switch ($action) {
	case 'historique':
		// var_dump($_SESSION); // Utilisé pour le débogage, peut être commenté ou supprimé dans la version finale

		// Constantes pour les valeurs par défaut
		define('DEFAULT_PAGE', 1);
		define('DEFAULT_IPP', 10);

		// Récupération et validation du numéro de page
		$currentPage = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : DEFAULT_PAGE;
		$currentPage = max(1, $currentPage);

		// Récupération du nombre total d'iPads et de la valeur de ipp à utiliser
		$ipp = isset($_SESSION['ipp']) ? max(1, intval($_SESSION['ipp'])) : DEFAULT_IPP;
		$parPage = $ipp;

		// Calcul du premier iPad de la page actuelle
		$premier = ($currentPage * $parPage) - $parPage;

		// Vérifier si l'utilisateur est un administrateur
		$is_admin = $_SESSION['is_admin']; // Assurez-vous que cette information est stockée dans la session lors de la connexion

		// Filtrer les iPads en fonction de l'utilisateur connecté
		if ($is_admin) {
			// Si l'utilisateur est administrateur, récupérez tous les iPads
			$nbIpad = $pdo->getNbIpad(); // Récupération du nombre total d'iPads pour l'admin
			$lesIpad = $pdo->getInfosIpad($premier, $parPage);
		} else {
			// Sinon, récupérez uniquement les iPads liés à cet utilisateur
			$userID = $_SESSION['id'];
			$nbIpad = $pdo->getNbIpadByUser($userID);
			$lesIpad = $pdo->getInfosIpadByUserId($userID, $premier, $parPage);
		}

		// Gestion du tri
		$tri = isset($_GET['tri']) ? $_GET['tri'] : '';
		$ordre = isset($_GET['ordre']) ? $_GET['ordre'] : 'asc';
		$prochainOrdre = ($ordre === 'asc') ? 'desc' : 'asc';

		// Appliquer le tri si nécessaire
		if ($tri === 'nom' || $tri === 'Code_RG' || $tri === 'date_demande') {
			$lesIpad = $pdo->getInfoIpadByVariable($tri, $ordre, $premier, $parPage);
		}

		// Calcul du nombre total de pages
		$pages = ceil($nbIpad / $parPage);

		// Inclusion de la vue
		include("views/historique.php");
		break;

	case 'supprimerIpad':
		ob_start();
		// Vérification de la présence des données du formulaire dans la requête
		//Si Methode POST, si le bouton supprimer est cliqué et si les id des iPads sont présents 
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer']) && isset($_POST['idsIpad'])) {
			// Récupération des identifiants des iPad à supprimer
			$idsIpad = $_POST['idsIpad'];

			if (is_array($idsIpad)) {
				// Suppression des iPad dans la base de données
				foreach ($idsIpad as $id) {
					$pdo->supprimerIpad($id);
				}
			}
			// Redirection vers la page d'historique
			header('Location: index.php?uc=historique&action=historique');
			exit;
		}
		// Redirection vers la page historique
		header("Location: index.php?uc=historique&action=historique");
		ob_end_flush();
		break;

	case 'ajouterIpad':
		// Vérification de la présence des données du formulaire dans la requête
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {
			$U = $pdo->getInfoUSerById($_SESSION['id']);
			if ($U['is_admin'] == 1) {
				$mytem = $_POST['mytem'];
			} else {
				$mytem = null;
			}
			$dateCourante = date('y-m-d');
			//Récupération des données du formulaire
			$cp = $_POST['cp'];
			$nom = $_POST['nom'];
			$residence = $_POST['residence'];
			$inc = $_POST['inc'];
			$Code_RG = $_POST['codeRG'];
			$dateDemande = $_POST['dateDemande'];
			$typeD = $_POST['typeDemande'];
			$typeM = $_POST['typeMateriel'];
			$ifPanne = $_POST['panne'] ? $_POST['panne'] : NULL;
			$observation = $_POST['observation'] ? $_POST['observation'] : null;
			$icloud = $_POST['icloud'];
			$codeDev = $_POST['codeDev'];
			$imei = $_POST['imei_mat_defec'];
			$imei_r = $_POST['imei_remp'];
			$rep = $_POST['rep'];
			$id = $_SESSION['id'];
			/*
			echo '<pre>';
			var_dump($_POST);
			var_dump($pdo->ajouterIpad($cp, $nom, $residence, $inc, $Code_RG, $mytem, $dateDemande, $typeD, $typeM, $ifPanne, $observation, $icloud, $codeDev, $imei, $imei_r, $rep, $id));;
			echo '</pre>';
*/
			// Ajout de l'iPad
			$pdo->ajouterIpad($cp, $nom, $residence, $inc, $Code_RG, $mytem, $dateDemande, $typeD, $typeM, $ifPanne, $observation, $icloud, $codeDev, $imei, $imei_r, $rep, $id);
			// Redirection après l'ajout
			echo "
                    <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Succès',
                            text: 'Ipad ajouté avec succès. CP: $cp, Nom: $nom',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(() => {
													window.location.href = 'index.php?uc=historique&action=historique';

													
                        });
                    </script>";
			exit;
		} else {
			// Formulaire non envoyé : affichage de la page d'ajout d'iPad
			include("views/ajoutIpad.php");
			exit;
		}
		break;

	case 'modifierIpad':
		//var_dump($_POST);
		if (isset($_POST['modifier'])) {
			$U = $pdo->getInfoUSerById($_SESSION['id']);
			if ($U['is_admin'] == 1) {
				$mytem = $_POST['mytem'];
			} else {
				$mytem = null;
			}

			$U = $pdo->getInfoUSerById($_SESSION['id']);
			if ($U['is_admin'] == 1) {
				$dateR = $_POST['recu'];
			} else {
				$dateR = null;
			}

			//Récupération des données du formulaire
			$id_form = $_POST['id'];

			$cp = $_POST['cp']; // Récupère la valeur du champ cp
			$nom = $_POST['nom']; // Récupère la valeur du champ nom
			$residence = $_POST['residence'];
			$inc = $_POST['inc'];
			$Code_RG = $_POST['codeRG']; // Récupère la valeur de l'option sélectionnée (Liste Déroulante)
			$dateDemande = $_POST['dateDemande'];

			$dateBdd = $pdo->getInfosIpadById($id_form);
			if (isset($_POST['recu']) && empty($dateBdd[0]['date_reception'])) {
				$dateCourante = date('Y-m-d');
				$dateR = $dateCourante;
			} else {
				$dateR = $dateBdd[0]['date_reception'];
			}

			$dateBdd = $pdo->getInfosIpadById($id_form);
			if (isset($_POST['ok']) && empty($dateBdd[0]['date_validation'])) {
				$dateCourante = date('Y-m-d');
				$dateV = $dateCourante;
			} else {
				$dateV = $dateBdd[0]['date_validation'];
			}


			$typeD = $_POST['typeDemande'];
			$typeM = $_POST['typeMateriel'];
			$ifPanne = $_POST['panne'];
			$observation = $_POST['observation'];


			$icloud = $_POST['icloud']; //? 1 : 0; // Si icloud est coché, icloud = 1, sinon icloud = 0
			$codeDev = $_POST['codeDev']; //? 1 : 0; // Si codeDev est coché, codeDev = 1, sinon codeDev = 0
			$imei = $_POST['imei_mat_defec'];
			$imei_r = $_POST['imei_remp'];
			$rep = $_POST['rep'];

			$pdo->modifierIpad($cp, $nom, $residence, $inc, $Code_RG, $mytem, $dateDemande, $dateR, $dateV, $typeD, $typeM, $ifPanne, $observation, $icloud, $codeDev, $id_form, $imei, $imei_r, $rep);

			//pop-up de confirmation de modification
			echo "
                    <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Succès',
                            text: 'Ipad ajouté avec succès. CP: $cp, Nom: $nom', IMEI: $imei,
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(() => {
													window.location.href = 'index.php?uc=historique&action=historique';
                        });
                    </script>";
			exit;
		} else {
			// Affichage de la page de modification de l'iPad
			$id = $_GET['id'];
			$lesIpad = $pdo->getInfosIpadById($id);
			foreach ($lesIpad as $unIpad) {
				$id_true = $unIpad['id_ipad'];
				$cp = $unIpad['cp_Agent']; // Récupère la valeur du champ cp
				$nom = $unIpad['nom']; // Récupère la valeur du champ nom
				$residence = $unIpad['residence'];
				$inc = $unIpad['inc'];
				$Code_RG = $unIpad['Code_RG']; // Récupère la valeur de l'option sélectionnée (Liste Déroulante)
				$mytem = $unIpad['mytem'];
				$dateDemande = $unIpad['date_demande'];
				$dateR = $unIpad['date_reception'];
				$dateV = $unIpad['date_validation'];

				$typeD = $unIpad['type_demande'];
				$typeM = $unIpad['type_materiel'];
				$ifPanne = $unIpad['type_panne'];
				$observation = $unIpad['observation'];


				$icloud = $unIpad['Icloud']; //? 1 : 0; // Si icloud est coché, icloud = 1, sinon icloud = 0
				$codeDev = $unIpad['CodeDev']; //? 1 : 0; // Si codeDev est coché, codeDev = 1, sinon codeDev = 0
				$imei = $unIpad['imei'];
				$imei_r = $unIpad['imei_remp'];
				$rep = $unIpad['reparable'];
			}
			include("views/modifierIpad.php");
			exit;
		}
		break;

	case 'telecharger':
		// Affichage de la page de modification de l'iPad
		$id = $_GET['id'];
		$unIpad = $pdo->getInfosIpadById($id)[0]; // Assurez-vous que cette ligne renvoie le tableau correct

		$cp = isset($unIpad['cp_Agent']) ? $unIpad['cp_Agent'] : 'Non défini';
		$nom = isset($unIpad['nom']) ? $unIpad['nom'] : 'Non défini';
		$residence = isset($unIpad['residence']) ? $unIpad['residence'] : 'Non défini';
		$inc = isset($unIpad['inc']) ? $unIpad['inc'] : 'Non défini';
		$Code_RG = isset($unIpad['Code_RG']) ? $unIpad['Code_RG'] : 'Non défini';
		$mytem = isset($unIpad['mytem']) ? $unIpad['mytem'] : 'Non défini';
		$dateDemande = isset($unIpad['date_demande']) ? $unIpad['date_demande'] : 'Non défini';

		$typeD = isset($unIpad['type_demande']) ? $unIpad['type_demande'] : 'Non défini';
		$typeM = isset($unIpad['type_materiel']) ? $unIpad['type_materiel'] : 'Non défini';
		$ifPanne = isset($unIpad['type_panne']) ? $unIpad['type_panne'] : 'Non défini';
		$observation = isset($unIpad['observation']) ? $unIpad['observation'] : 'Non défini';

		$icloud = isset($unIpad['Icloud']) ? $unIpad['Icloud'] : 'Non défini';
		$codeDev = isset($unIpad['CodeDev']) ? $unIpad['CodeDev'] : 'Non défini';
		$imei = isset($unIpad['imei']) ? $unIpad['imei'] : 'Non défini';
		$imei_r = isset($unIpad['imei_remp']) ? $unIpad['imei_remp'] : 'Non défini';
		$rep = isset($unIpad['reparable']) ? $unIpad['reparable'] : 'Non défini';

		ob_clean();

		ob_start();

		include("views/pdf2.php");

		$html = ob_get_contents();

		ob_end_clean();

		require_once __DIR__ . '/../views/dompdf/dompdf/autoload.inc.php';
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();

		$fichier = 'iPad_Info_' . $id . '.pdf';
		$dompdf->stream($fichier);

		exit;

	default:
		// Action non reconnue : affichage de la page d'erreur 404
		include("views/404.php");
		break;
}
