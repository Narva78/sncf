<?php 
include("views/header.php");
// Si aucune action n'est spécifiée, on affiche la liste des iPads
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'profil';
}

// Sélection de l'action à effectuer en fonction de la valeur de action
$action = $_REQUEST['action'];
$id = $_SESSION['id'];
$infoUser = $pdo->getInfoUSerById($id);
switch($action){
    case 'profil':
        $nom = $infoUser['nom'];
        $prenom = $infoUser['prenom'];
        $login = $infoUser['login'];
        $mdp = $infoUser['mdp'];
        include('views/profil.php');
        break;

    case 'modifInfo' :
        if(isset($_POST['modifInfo'])){
            $newLogin = $_POST['newLogin'];
            $newMdp = $_POST['newMdp'];
            $pdo->updateLogMdp($newLogin, $newMdp, $id);
            header('Location: index.php?uc=profil&action=profil');
        }
}
?>