<?php
include("views/header.php");
// Si aucune action n'est spécifiée, on affiche la liste des iPads
if (!isset($_REQUEST['action'])) {
	$_REQUEST['action'] = 'gestionEcran';
}

// Sélection de l'action à effectuer en fonction de la valeur de action
$action = $_REQUEST['action'];

switch ($action) {
	case 'gestionEcran':
		$tri = isset($_GET['tri']) ? $_GET['tri'] : '';
		$ordre = isset($_GET['ordre']) ? $_GET['ordre'] : 'asc';

		// Inverser l'ordre pour le prochain clic
		$prochainOrdre = ($ordre === 'asc') ? 'desc' : 'asc';

		if ($tri === 'taille' || $tri === 'marque' || $tri === 'types' || $tri === 'quantite') {
			$lesEcrans = $pdo->getInfoEcranByVariable($tri, $ordre);
		} else {
			$lesEcrans = $pdo->getInfoEcranByVariable('', $ordre); // Ordre par défaut
		}

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
		}
		// Redirection vers la page historique
		header("Location: index.php?uc=gestionEcran&action=gestionEcran");
		ob_end_flush();
		break;

	case 'ajouterEcran':
		// Vérification de la présence des données du formulaire dans la requête
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {

			//Récupération des données du formulaire
			$taille = $_POST['taille']; // Récupère la valeur du champ cp		
			$marque = $_POST['marque'];
			$types = $_POST['types'];
			$quantite = $_POST['quantite'];


			// Ajout de l'iPad
			$pdo->ajouterEcran($taille, $marque, $types, $quantite);

			//Affichage de la notification popup avec SweetAlert2
			//Pop-up de notification d'ajout
			echo "
                <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Succès',
                        text: 'Ecran ajouté avec succès. taille: $taille, marque: $marque, quantité: $quantite',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(() => {
                        window.location.href = 'index.php?uc=gestionEcran&action=gestionEcran';
                    });
                </script>";

			exit;
		} else {
			// Formulaire non envoyé : affichage de la page d'ajout d'iPad
			include("views/ajoutEcran.php");
			exit;
		}
		break;

	case 'modifierEcran':
		if (isset($_POST['modifier'])) {
			// Récupération des données du formulaire
			$id_form = $_POST['id'];
			$taille = $_POST['taille'];
			$marque = $_POST['marque'];
			$types = $_POST["types"];
			$quantite = $_POST['quantite'];


			$pdo->modifierEcran($id_form, $taille, $marque, $types, $quantite);

			//pop-up de confirmation de modification
			echo "
                    <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Succès',
                            text: 'Ecran ajouté avec succès. Taille: $taille, Marque: $marque, Type: $types, Quantité: $quantite',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(() => {
                            window.location.href = 'index.php?uc=gestionEcran&action=gestionEcran';
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
				$types = $unEcran['types'];
				$quantite = $unEcran['quantite'];
				$marque = $unEcran['marque'];
			}
			include("views/modifierEcran.php");
			exit;
		}
		break;
	default:
		// Action non reconnue : affichage de la page d'erreur 404
		include("views/404.php");
		break;
}
