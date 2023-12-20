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


		// Récupération de la liste des iPads
		$lesIpad = $pdo->getInfosIpad();

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

			//Récupération des données du formulaire
			$cp = $_POST['cp']; // Récupère la valeur du champ cp
			$nom = $_POST['nom']; // Récupère la valeur du champ nom
			$prenom = $_POST['prenom']; // Récupère la valeur du champ prenom
			$affectation = $_POST['affectation']; // Récupère la valeur de l'option sélectionnée (Liste Déroulante)
			$icloud = isset($_POST['icloud']) ? 1 : 0; // Si icloud est coché, icloud = 1, sinon icloud = 0
			$codeDev = isset($_POST['codeDev']) ? 1 : 0; // Si codeDev est coché, codeDev = 1, sinon codeDev = 0
			$dateReception = $_POST['dateReception'];

			//Attribution de la valeure 0000-00-00 si la date n'est pas renseignée
			if (empty($_POST['dateAttribution'])) {
				$dateAttribution = '0000-00-00';
			} else {
				$dateAttribution = $_POST['dateAttribution'];
			}

			$debutRep = $_POST['debutRep'] != '' ? $_POST['debutRep'] : '0000-00-00';
			$finRep = $_POST['finRep'] != '' ? $_POST['finRep'] : '0000-00-00';
			$nonReparable = isset($_POST['nonReparable']) ? 1 : 0; // Si nonReparable est coché, nonReparable = 1, sinon nonReparable = 0

			// Ajout de l'iPad
			$pdo->ajouterIpad($cp, $nom, $prenom, $affectation, $icloud, $codeDev, $dateReception, $dateAttribution, $debutRep, $finRep, $nonReparable);

			//Affichage de la notification popup avec SweetAlert2
			//Pop-up de notification d'ajout
			echo "
                <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Succès',
                        text: 'Ipad ajouté avec succès. CP: $cp, Nom: $nom, Prenom: $prenom',
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
			// Récupération des données du formulaire
			$id_form = $_POST['id'];
			$cp = $_POST['cp'];
			$nom = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$affectation = $_POST['affectation'];
			$icloud = isset($_POST['Icloud']) ? 1 : 0;
			$codeDev = isset($_POST['CodeDev']) ? 1 : 0;
			$dateReception = $_POST['dateReception'];
			$dateAttribution = $_POST['dateAttribution'];
			$debutRep = $_POST['debutRep'];
			$finRep = $_POST['finRep'];
			$nonReparable = isset($_POST['nonReparable']) ? 1 : 0;

			$pdo->modifierIpad($cp, $nom, $prenom, $affectation, $icloud, $codeDev, $dateReception, $dateAttribution, $debutRep, $finRep, $nonReparable, $id_form);

			//pop-up de confirmation de modification
			echo "
                    <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Succès',
                            text: 'Ipad ajouté avec succès. CP: $cp, Nom: $nom, Prenom: $prenom',
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
				$cp = $unIpad['cp_Agent'];
				$nom = $unIpad['nom'];
				$prenom = $unIpad['prenom'];
				$affectation = $unIpad['affectation'];
				$icloud = isset($unIpad['Icloud']) ? 1 : 0;
				$codeDev = isset($unIpad['CodeDev']) ? 1 : 0;
				$dateReception = $unIpad['date_Reception'];
				$dateAttribution = $unIpad['date_Attribution'];
				$debutRep = $unIpad['debut_Rep'];
				$finRep = $unIpad['fin_Rep'];
				$nonReparable = isset($unIpad['non_reparable']) ? 1 : 0;
			}
			include("views/modifierIpad.php");
			exit;
		}
		break;
	default:
		// Action non reconnue : affichage de la page d'erreur 404
		include("views/404.php");
		break;
}
