<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- lié au style.css -->
        <link rel="stylesheet" type="text/css" href="style/style.css">

        <!-- lié au bootstrap -->
    </head>


<!-- Header => Menu de Navigation -->

    <body style="background-image: url('image/arrierePlan.jpg'); background-size: cover; margin-bottom: 70px;">
        <div class ="main">    
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand mr-5" href="#">GDIP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="index.php?uc=profil">Profil</a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="index.php?uc=historique">Historique</a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="index.php?uc=stat">Statistiques</a>
                        </li>
                        <li class="nav-item mr-5">
                            <a class="nav-link" href="views/exportation.php">Exportation</a>
                        </li>
                        </ul>
                        <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=deconnexion">Se déconnecter</a>
                        </li>
                    </ul>
                </div>
            </nav>
    
