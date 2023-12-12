<div class = "card container cover w-100">
    <br><br>
<h1 class="mb-4">Information Profil</h2>
<br>
    <tbdody>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Informations du profil
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Utilisateur : <?= $nom.' '.$prenom ?></h5>
                            <p class="card-text">Login : <?= $login ?></p>
                            <p class="card-text">Mot de passe : <?= $mdp ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            Modifier le nom d'utilisateur et le mot de passe
                        </div>
                        <div class="card-body">
                            <form method="POST" action="index.php?uc=profil&action=modifInfo">
                                <div class="form-group">
                                    <label for="newUsername">Nouveau nom d'utilisateur</label>
                                    <input type="text" class="form-control" name="newLogin" id="newUsername" placeholder="Entrez le nouveau nom d'utilisateur">
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">Nouveau mot de passe</label>
                                    <input type="password" class="form-control" name="newMdp" id="newPassword" placeholder="Entrez le nouveau mot de passe">
                                </div>
                                <div class="form-group">
                                    <label for="confirmPassword">Confirmez le mot de passe</label>
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirmez le mot de passe">
                                </div>
                                <button type="submit" name ="modifInfo" class="btn btn-primary">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </tbdody>
</div>