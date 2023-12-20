<?php
include("views/header.php");
// Si aucune action n'est spécifiée, on affiche la liste des iPads
if (!isset($_REQUEST['action'])) {
	$_REQUEST['action'] = 'gestionPC';
}

// Sélection de l'action à effectuer en fonction de la valeur de action
$action = $_REQUEST['action'];

switch ($action) {
	case 'gestionPC':

		$lesEcrans = $pdo->getInfosEcran();



		// Inclusion de la vue
		include("views/gestionEcran.php");
		break;


	case 'supprimerEcran':
		ob_start();
		// Vérification de la présence des données du formulaire dans la requête
		//Si Methode POST, si le bouton supprimer est cliqué et si les id des iPads sont présents 
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer']) && isset($_POST['idsEcran'])) {
			// Récupération des identifiants des iPad à supprimer
			$idsEcran = $_POST['idsEcran'];

			if (is_array($idsEcran)) {
				// Suppression des iPad dans la base de données
				foreach ($idsEcran as $id) {
					$pdo->supprimerEcran($id);
				}
			}
			// Redirection vers la page d'historique
			header('Location: index.php?uc=gestionEcran&action=gestionEcran');
			exit;
		}
		// Redirection vers la page historique
		header("Location: index.php?uc=gestionEcran&action=gestionEcran");
		ob_end_flush();
		break;

	case 'ajouterIpad':
		// Vérification de la présence des données du formulaire dans la requête
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {

			//Récupération des données du formulaire
			$taille = $_POST['taille']; // Récupère la valeur du champ cp		
			$marque = $_POST['marque'];
			$qunatite = $_POST['quantite'];


			// Ajout de l'iPad
			$pdo->ajouterIpad($taille, $marque, $quantite);

			//Affichage de la notification popup avec SweetAlert2
			//Pop-up de notification d'ajout
			echo "
                <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Succès',
                        text: 'Ipad ajouté avec succès. taille: $taille, marque: $marque, quantité: $quantite',
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
			$taille = $_POST['taille'];
			$quantite = $_POST['quantite'];
			$marque = $_POST['marque'];


			$pdo->modifierIpad($taille, $marque, $quantite, $id_form);

			//pop-up de confirmation de modification
			echo "
                    <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Succès',
                            text: 'Ipad ajouté avec succès. CP: $taille, Nom: $marque, Prenom: $quantite',
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
			$lesEcrans = $pdo->getInfosEcranById($id);
			foreach ($lesEcrans as $unEcran) {
				$id_true = $unEcran['id_ecran'];
				$taille = $unEcran['taille'];
				$quantite = $unEcran['quantite'];
				$marque = $unEcran['marque'];
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
