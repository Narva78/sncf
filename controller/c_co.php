<?php
// Controleur de la connexion

if (!isset($_REQUEST['action'])) {
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch ($action) {

		// Affichage de la page de connexion
	case 'demandeConnexion': {
			include("views/co.php");
			break;
		}
		// Vérification des identifiants
		// Vérification des identifiants
	case 'valideConnexion': {
			// Récupération des données du formulaire
			// On vérifie que les champs ne sont pas vides
			if (isset($_POST['valider']) && !empty($_POST['login']) && !empty($_POST['mdp'])) {
				$login = $_POST['login'];
				$mdp = $_POST['mdp'];
				$user = $pdo->getInfosUser($_POST['login'], $_POST['mdp']);
				if (is_array($user)) {
					$id = $user['id'];
					$nom = $user['nom'];
					$prenom = $user['prenom'];
					$login = $user['login'];
					$is_admin = $user['is_admin'];
					$residence = $user['residence'];
					$codeRG  = $user['code_rg'];

					connecter($id, $nom, $prenom, $login, $is_admin, $residence, $codeRG);
					//include("views/header.php");
					header("Location: index.php?uc=historique&action=historique");
				} else {
					ajouterErreur("Login ou mot de passe incorrect");
					echo "<script>alert('Login ou mot de passe incorrect. Veuillez réessayer.');</script>";
					include("views/co.php");
				}
			} else {
				ajouterErreur("Login ou mot de passe incorrect");
				include("views/co.php");
			}
			break;
		}

	default: {
			include("views/co.php");
			break;
		}
}
