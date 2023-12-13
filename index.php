<?php
// Inclusion du fichier pdo.php
require_once("fonction/pdo.php");

// Inclusion du fichier fct.php
require_once("fonction/fct.php");

//DocType
include("doctype.php");

// Démarrage de la session
session_start();

// Récupération de l'instance de PDO
$pdo = PdoIpad::getPdoIpad();

// Récupération de l'utilisateur connecté
$estCo = estConnecte();

// Si aucun contrôleur n'a été spécifié ou si l'utilisateur n'est pas connecté, on affiche la page de connexion
if (!isset($_REQUEST['uc']) || !$estCo) {
    $_REQUEST['uc'] = 'connexion';
}

// Sélection du contrôleur à utiliser en fonction de la valeur de uc
$uc = $_REQUEST['uc'];

switch ($uc) {
    case 'connexion': {
            include("controller/c_co.php");
            break;
        }
    case 'profil': {
            include("controller/c_profil.php");
            break;
        }
    case 'historique': {
            include("controller/c_historique.php");
            break;
        }
    case 'stat': {
            include("controller/c_stat.php");
            break;
        }
    default: {
            include("views/404.php"); // Page d'erreur 404
            break;
        }
}

//include("views/footer.php");
