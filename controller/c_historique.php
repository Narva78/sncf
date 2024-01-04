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
			$U = $pdo->getInfoUSerById($_SESSION['id']);
			if ($U['is_admin'] == 1) {
				$mytem = $_POST['mytem'];
			} else {
				$mytem = null;
			}

			//Récupération des données du formulaire
			$cp = $_POST['cp']; // Récupère la valeur du champ cp
			$nom = $_POST['nom']; // Récupère la valeur du champ nom
			$inc = $_POST['inc'];
			$Code_RG = $_POST['codeRG']; // Récupère la valeur de l'option sélectionnée (Liste Déroulante)
			$dateDemande = $_POST['dateDemande'];

			$typeD = $_POST['typeDemande'];
			$typeM = $_POST['typeMateriel'];
			$ifPanne = $_POST['panne'];
			$observation = $_POST['observation'] ? $_POST['observation'] : 0;


			$icloud = isset($_POST['icloud']) ? 1 : 0; // Si icloud est coché, icloud = 1, sinon icloud = 0
			$codeDev = isset($_POST['codeDev']) ? 1 : 0; // Si codeDev est coché, codeDev = 1, sinon codeDev = 0

			// Ajout de l'iPad
			$pdo->ajouterIpad($cp, $nom, $inc, $Code_RG, $mytem, $dateDemande, $typeD, $typeM, $ifPanne, $observation, $icloud, $codeDev);

			//Affichage de la notification popup avec SweetAlert2
			//Pop-up de notification d'ajout
			echo "
                <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Succès',
                        text: 'Ipad ajouté avec succès. CP: $cp, Nom: $nom,
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
			$cp = $_POST['cp_Agent']; // Récupère la valeur du champ cp
			$nom = $_POST['nom']; // Récupère la valeur du champ nom
			$inc = $_POST['inc'];
			$Code_RG = $_POST['code_RG']; // Récupère la valeur de l'option sélectionnée (Liste Déroulante)
			$dateDemande = $_POST['date_demande'];

			$typeD = $_POST['type_demande'];
			$typeM = $_POST['materiel'];
			$ifPanne = $_POST['type_panne'];
			$observation = $_POST['observation'] ? $_POST['observation'] : 0;


			$icloud = isset($_POST['icloud']) ? 1 : 0; // Si icloud est coché, icloud = 1, sinon icloud = 0
			$codeDev = isset($_POST['codeDev']) ? 1 : 0; // Si codeDev est coché, codeDev = 1, sinon codeDev = 0

			$pdo->modifierIpad($cp, $nom, $inc, $Code_RG, $mytem, $dateDemande, $typeD, $typeM, $ifPanne, $observation, $icloud, $codeDev, $id_form);

			//pop-up de confirmation de modification
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
			// Affichage de la page de modification de l'iPad
			$id = $_GET['id'];
			$lesIpad = $pdo->getInfosIpadById($id);
			foreach ($lesIpad as $unIpad) {
				$id_true = $unIpad['id_ipad'];
				$cp = $unIpad['cp_Agent']; // Récupère la valeur du champ cp
				$nom = $unIpad['nom']; // Récupère la valeur du champ nom
				$inc = $unIpad['inc'];
				$Code_RG = $unIpad['Code_RG']; // Récupère la valeur de l'option sélectionnée (Liste Déroulante)
				$mytem = $unIpad['mytem'];
				$dateDemande = $unIpad['date_demande'];

				$typeD = $unIpad['type_demande'];
				$typeM = $unIpad['type_materiel'];
				$ifPanne = $unIpad['type_panne'];
				$observation = $unIpad['observation'];


				$icloud = isset($_POST['icloud']) ? 1 : 0; // Si icloud est coché, icloud = 1, sinon icloud = 0
				$codeDev = isset($_POST['codeDev']) ? 1 : 0; // Si codeDev est coché, codeDev = 1, sinon codeDev = 0

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
