<link rel="stylesheet" href="https://cdn.jsdelivr.net/525icons/2.6.0/525icons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/style.css">
<title>Page de connexion</title>

<style>
	body {
		background-color: #273746;
		font-family: 'poppins', sans-serif;
	}

	.container {
		display: flex;
		justify-content: center;
		align-items: center;
		height: 80vh;
		margin: 2.5em;
	}

	.container__card {
		width: 400px;
		height: 450px;
		border: 1px solid #404040;
		border-radius: 10px;
		background: #405a73;
		text-align: center;
		color: white;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
	}

	.container__card h2 {
		font-size: 34px;
		padding-top: 25px;
	}

	.container__card__login {
		width: 100%;
		max-width: 300px;
		margin: 8px auto;
		padding: 10px 15px;
		border: none;
		border-radius: 5px;
		background: #f9f9f9;
		color: #333;
		font-size: 16px;
		opacity: 0.5;
	}

	.container__card__login:focus {
		outline: none;
		opacity: 1;
	}

	.container__card__login__btn {
		margin-top: 50px;
		padding: 10px 40px;
		border: none;
		border-radius: 5px;
		background: #3389c2;
		color: #fff;
		font-size: 18px;
		cursor: pointer;
		transition: background-color 0.3s, color 0.3s;
	}

	.container__card__login__btn:hover {
		background-color: #215f91;
	}

	.input-icone {
		position: relative;
		margin-bottom: 20px;
	}

	.input-icone i {
		position: absolute;
		left: 75px;
		top: 2%;
		color: #fff;
		padding: 10px 8px;
		transition: color 0.3s;
	}

	/* Styles d'input */
	input[type=text],
	input[type=password] {
		width: 100%;
		max-width: 250px;
		border-radius: 4px;
		margin: 8px auto;
		outline: none;
		padding: 10px 35px;
		/* Padding l'icône */
		box-sizing: border-box;
	}

	input[type=text]:focus+i,
	input[type=password]:focus+i {
		color: #3389c2;
		/* couleur icônes au focus */
	}

	/* Hover inputs */
	input[type=text]:hover,
	input[type=password]:hover {
		background: #ebebeb;
	}
</style>

<body>
	<div class="container">
		<div class="container__card">
			<h2>Gestion Ipad</h2>
			<form method="post" action="index.php?uc=connexion&action=valideConnexion">
				<div class="container__card__input">
					<div class="input-icone">
						<input type="text" class="container__card__login" name="login" id="login" placeholder="Username">
						<i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
					</div>
					<div class="input-icone">
						<input type="password" class="container__card__login" name="mdp" id="mdp" placeholder="Password">
						<i class="fa fa-lock fa-lg fa-fw" aria-hidden="true"></i>
					</div>
					<input type="submit" class="container__card__login__btn" value="Login" name="valider">
				</div>
			</form>
		</div>
	</div>
</body>