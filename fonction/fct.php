<?php

//Fonction logique de l'application ipad
 
// Test si l'utilisateur est connecté
function estConnecte(){
    return isset($_SESSION['id']);
}

// Enrigistre dans une variable session les infos d'un utilisateur
function connecter($id, $nom, $prenom, $cp){
    $_SESSION['id'] = $id;
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['cp'] = $cp;
}

// Détruit la session active
function deconnecter(){
    session_destroy();
}


//fonction ajouterErreur($msg)
function ajouterErreur($msg){
    if (!isset($_REQUEST['erreurs'])){
        $_REQUEST['erreurs']=array();
    }
    $_REQUEST['erreurs'][]=$msg;
}

?>