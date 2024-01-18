<?php
include("views/header.php");
// Si aucune action n'est spécifiée, on affiche la liste des iPads
if (!isset($_REQUEST['action'])) {
	$_REQUEST['action'] = 'historique';
}

// Sélection de l'action à effectuer en fonction de la valeur de action
$action = $_REQUEST['action'];

switch ($action) {
	case 'historique':



		// Constantes pour les valeurs par défaut
		define('DEFAULT_PAGE', 1);
		define('DEFAULT_IPP', 3);

		// Récupération et validation du numéro de page
		$currentPage = (isset($_GET['page']) && is_numeric($_GET['page'])) ? (int)$_GET['page'] : DEFAULT_PAGE;
		$currentPage = max(1, $currentPage); // Assure que currentPage est au moins égal à 1

		// Récupération du nombre total d'iPads
		$nbIpad = $pdo->getNbIpad();

		// Gestion du nombre d'iPads par page (ipp)
		if (isset($_POST['ipp']) && is_numeric($_POST['ipp'])) {
			$_SESSION['ipp'] = intval($_POST['ipp']);
		}

		// Détermination de la valeur de ipp à utiliser
		$ipp = isset($_SESSION['ipp']) ? max(1, intval($_SESSION['ipp'])) : DEFAULT_IPP;

		$parPage = $ipp;

		// Calcul du nombre total de pages
		$pages = ceil($nbIpad / $parPage);

		// Calcul du premier iPad de la page actuelle
		$premier = ($currentPage * $parPage) - $parPage;

		// Récupération de la liste des iPads pour la page actuelle
		$lesIpad = $pdo->getInfosIpad($premier, $parPage);



		$tri = isset($_GET['tri']) ? $_GET['tri'] : '';
		$ordre = isset($_GET['ordre']) ? $_GET['ordre'] : 'asc';

		// Inverser l'ordre pour le prochain clic
		$prochainOrdre = ($ordre === 'asc') ? 'desc' : 'asc';

		if ($tri === 'nom' || $tri === 'Code_RG' || $tri === 'date_demande') {
			$lesIpad = $pdo->getInfoIpadByVariable($tri, $ordre, $premier, $parPage);
		} else {
			$lesIpad = $pdo->getInfoIpadByVariable('', $ordre, $premier, $parPage); // Ordre par défaut
		}

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

			//Récupération des données du formulaire
			$cp = $_POST['cp'];
			$nom = $_POST['nom'];
			$residence = $_POST['residence'];
			$inc = $_POST['inc'];
			$Code_RG = $_POST['codeRG'];
			$dateDemande = $_POST['dateDemande'];
			$typeD = $_POST['typeDemande'];
			$typeM = $_POST['typeMateriel'];
			$ifPanne = $_POST['panne'];
			$observation = $_POST['observation'] ? $_POST['observation'] : 0;
			$icloud = $_POST['icloud'];
			$codeDev = $_POST['codeDev'];
			$imei = $_POST['imei_mat_defec'];
			$imei_r = $_POST['imei_remp'];
			$rep = $_POST['rep'];

			// var_dump() des variables - à commenter ou supprimer pour éviter l'envoi de contenu inattendu
			// var_dump($cp, $nom, $inc, $Code_RG, $mytem, $dateDemande, $typeD, $typeM, $ifPanne, $observation, $icloud, $codeDev, $imei, $imei_r);

			// Ajout de l'iPad
			$pdo->ajouterIpad($cp, $nom, $residence, $inc, $Code_RG, $mytem, $dateDemande, $typeD, $typeM, $ifPanne, $observation, $icloud, $codeDev, $imei, $imei_r, $rep);

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
		if (isset($_POST['modifier'])) {
			$U = $pdo->getInfoUSerById($_SESSION['id']);
			if ($U['is_admin'] == 1) {
				$mytem = $_POST['mytem'];
			} else {
				$mytem = null;
			}

			//Récupération des données du formulaire
			$id_form = $_POST['id'];
			$cp = $_POST['cp']; // Récupère la valeur du champ cp
			$nom = $_POST['nom']; // Récupère la valeur du champ nom
			$residence = $_POST['residence'];
			$inc = $_POST['inc'];
			$Code_RG = $_POST['codeRG']; // Récupère la valeur de l'option sélectionnée (Liste Déroulante)
			$dateDemande = $_POST['dateDemande'];

			$typeD = $_POST['typeDemande'];
			$typeM = $_POST['typeMateriel'];
			$ifPanne = $_POST['panne'];
			$observation = $_POST['observation'];


			$icloud = $_POST['icloud']; //? 1 : 0; // Si icloud est coché, icloud = 1, sinon icloud = 0
			$codeDev = $_POST['codeDev']; //? 1 : 0; // Si codeDev est coché, codeDev = 1, sinon codeDev = 0
			$imei = $_POST['imei_mat_defec'];
			$imei_r = $_POST['imei_remp'];
			$rep = $_POST['rep'];

			$pdo->modifierIpad($cp, $nom, $residence, $inc, $Code_RG, $mytem, $dateDemande, $typeD, $typeM, $ifPanne, $observation, $icloud, $codeDev, $id_form, $imei, $imei_r, $rep);

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

		include("views/genePdf.php");
		exit;
		break;


	default:
		// Action non reconnue : affichage de la page d'erreur 404
		include("views/404.php");
		break;
}
