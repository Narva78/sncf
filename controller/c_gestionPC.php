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

		$lesPC = $pdo->getInfosPC();



		// Inclusion de la vue
		include("views/gestionPC.php");
		break;


	case 'supprimerPC':
		ob_start();
		// Vérification de la présence des données du formulaire dans la requête
		//Si Methode POST, si le bouton supprimer est cliqué et si les id des iPads sont présents 
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['supprimer']) && isset($_POST['idsPC'])) {
			// Récupération des identifiants des iPad à supprimer
			$idsPC = $_POST['idsPC'];

			if (is_array($idsPC)) {
				// Suppression des iPad dans la base de données
				foreach ($idsPC as $id) {
					$pdo->supprimerPC($id);
				}
			}
			// Redirection vers la page d'historique
			header('Location: index.php?uc=gestionEcran&action=gestionPC');
			exit;
		}
		// Redirection vers la page historique
		header("Location: index.php?uc=gestionEcran&action=gestionPC");
		ob_end_flush();
		break;

	case 'ajouterPC':
		// Vérification de la présence des données du formulaire dans la requête
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {

			//Récupération des données du formulaire
			$marque = $_POST['marque']; // Récupère la valeur du champ cp		
			$n°serie = $_POST['n°serie'];
			$modele = $_POST['modele'];


			// Ajout de l'iPad
			$pdo->ajouterPC($n°serie, $marque, $modele);

			//Affichage de la notification popup avec SweetAlert2
			//Pop-up de notification d'ajout
			echo "
                <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Succès',
                        text: 'Ipad ajouté avec succès. taille: $n°serie, marque: $marque, quantité: $modele',
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
			include("views/ajoutPC.php");
			exit;
		}
		break;

	case 'modifierPC':
		if (isset($_POST['modifier'])) {
			// Récupération des données du formulaire
			$id_form = $_POST['id'];
			$n°serie = $_POST['n°serie'];
			$modele = $_POST['modele'];
			$marque = $_POST['marque'];


			$pdo->modifierPC($n°serie, $marque, $modele, $id_form);

			//pop-up de confirmation de modification
			echo "
                    <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Succès',
                            text: 'Ipad ajouté avec succès. CP: $n°serie, Nom: $marque, Prenom: $modele',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 3000
                        }).then(() => {
                            window.location.href = 'index.php?uc=gestionPC&action=gestionPC';
                        });
                    </script>";
			exit;
		} else {
			// Affichage de la page de modification de l'iPad
			$id = $_GET['id'];
			$lesPC = $pdo->getInfosEcranById($id);
			foreach ($lesPC as $unPC) {
				$id_true = $unPC['id_PC'];
				$taille = $unPC['n°serie'];
				$quantite = $unPC['modele'];
				$marque = $unPC['marque'];
			}
			include("views/modifierPC.php");
			exit;
		}
		break;
	default:
		// Action non reconnue : affichage de la page d'erreur 404
		include("views/404.php");
		break;
}
