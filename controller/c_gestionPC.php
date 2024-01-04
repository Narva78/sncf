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


		$tri = isset($_GET['tri']) ? $_GET['tri'] : '';
		$ordre = isset($_GET['ordre']) ? $_GET['ordre'] : 'asc';

		// Inverser l'ordre pour le prochain clic
		$prochainOrdre = ($ordre === 'asc') ? 'desc' : 'asc';

		if ($tri === 'marque' || $tri === 'nSerie' || $tri === 'modele' || $tri === 'quantite') {
			$lesPC = $pdo->getInfoPCByVariable($tri, $ordre);
		} else {
			$lesPC = $pdo->getInfoPCByVariable('', $ordre); // Ordre par défaut
		}



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
			header('Location: index.php?uc=gestionPC&action=gestionPC');
			exit;
		}
		// Redirection vers la page historique
		header("Location: index.php?uc=gestionPC&action=gestionPC");
		ob_end_flush();
		break;

	case 'ajouterPC':
		// Vérification de la présence des données du formulaire dans la requête
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajouter'])) {

			//Récupération des données du formulaire
			$marque = $_POST['marque']; // Récupère la valeur du champ cp		
			$nSerie = $_POST['nSerie'];
			$modele = $_POST['modele'];
			$quantite = $_POST['quantite'];


			// Ajout de l'iPad
			$pdo->ajouterPC($nSerie, $marque, $modele, $quantite);

			//Affichage de la notification popup avec SweetAlert2
			//Pop-up de notification d'ajout
			echo "
                <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script>
                    Swal.fire({
                        title: 'Succès',
                        text: 'Ipad ajouté avec succès. taille: $nSerie, marque: $marque, quantité: $modele',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    }).then(() => {
                        window.location.href = 'index.php?uc=gestionPC&action=gestionPC';
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
			$nSerie = $_POST['nSerie'];
			$modele = $_POST['modele'];
			$marque = $_POST['marque'];
			$quantite = $_POST['quantite'];


			$pdo->modifierPC($nSerie, $marque, $modele, $quantite, $id_form);

			//pop-up de confirmation de modification
			echo "
                    <script src = 'https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script>
                        Swal.fire({
                            title: 'Succès',
                            text: 'Ipad ajouté avec succès. CP: $nSerie, Nom: $marque, Prenom: $modele',
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
			$lesPC = $pdo->getInfosPCById($id);
			foreach ($lesPC as $unPC) {
				$id_true = $unPC['id_pc'];
				$nSerie = $unPC['nSerie'];
				$marque = $unPC['marque'];
				$modele = $unPC['modele'];
				$quantite = $unPC['quantite'];
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
