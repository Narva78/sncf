<?php

//Fonction logique de l'application ipad

// Test si l'utilisateur est connecté
function estConnecte()
{
	return isset($_SESSION['id']);
}

// Enrigistre dans une variable session les infos d'un utilisateur
function connecter($id, $nom, $prenom, $login, $isAdmin, $residence)
{
	$_SESSION['id'] = $id;
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;
	$_SESSION['login'] = $login;
	$_SESSION['is_admin'] = $isAdmin;
	$_SESSION['residence'] = $residence;
}

// Détruit la session active
function deconnecter()
{
	session_destroy();
}


//fonction ajouterErreur($msg)
function ajouterErreur($msg)
{
	if (!isset($_REQUEST['erreurs'])) {
		$_REQUEST['erreurs'] = array();
	}
	$_REQUEST['erreurs'][] = $msg;
}
