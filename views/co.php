<title>Page de connexion</title>

<body>
    <div class="container">
        <div class="container__card">
            <h2>Gestion Ipad</h2>
            <form method="post" action="index.php?uc=connexion&action=valideConnexion">
                <div>
                    <label for="login"></label>
                    <input type="login" class="container__card__login" name="login" id="login" placeholder=" Username">
                </div>
                <div>
                    <label for="mdp"></label>
                    <input type="password" class="container__card__login" name="mdp" id="mdp" placeholder="password">
                </div>
                <div>
                    <input type="submit" class="container__card__login__btn" value="Login" name="valider">
                </div>
            </form>
        </div>
    </div>