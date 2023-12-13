<!-- Description: Page de connexion -->


<title>Page de connexion</title>

<body>
    <section class="card">
        <div class="card__container">
            <h2>Gestion Ipad</h2>
            <form method="post" action="index.php?uc=connexion&action=valideConnexion" id="loginForm">
                    <div>
					<label for="login"></label>
                    <input type="login" class="card__container__login"  name="login" id="login" placeholder=" Username">
                
                    <label for="mdp"></label>
                    <input type="password" class="card__container__login" name="mdp" id="mdp" placeholder="password">
                </div>
                <div class="card__container__login__btn">
                    <input type="submit" value="Login" name="valider">
                </div>
            </form>
        </div>

    </section>

</body>
<script>
	document.getElementById('loginForm').addEventListener('submit', function(event) {
    const login = document.getElementById('login').value;
    const password = document.getElementById('mdp').value;

    if (login.trim() === 'null' || password.trim() === '') {
      event.preventDefault(); // Empêche l'envoi du formulaire

      // Affiche une boîte de dialogue (popup) pour l'erreur
      alert('Veuillez remplir tous les champs');
    }
  });
</script>