<link rel="stylesheet" href="https://cdn.jsdelivr.net/525icons/2.6.0/525icons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Page de connexion</title>
    <div class="container">
        <div class="container__card">
            <h2>Gestion Ipad</h2>
            <form method="post" action="index.php?uc=connexion&action=valideConnexion">
                <div class="container__card__input">
                    <div class="input-icone">
                        <label for="login"></label>
                        <input type="login" class="container__card__login" name="login" id="login" placeholder=" Username">
                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
                    </div>
                    <div class="input-icone">
                        <label for="mdp"></label>
                        <input type="password" class="container__card__login" name="mdp" id="mdp" placeholder=" Password">
                        <i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>               
                    <div>
                </div>
                
                    <input type="submit" class="container__card__login__btn" value="Login" name="valider">
                </div>
            </form>   
        </div>
    </div>


    