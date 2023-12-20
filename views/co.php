<link rel="stylesheet" href="https://cdn.jsdelivr.net/525icons/2.6.0/525icons.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/style.css">
<title>Page de connexion</title>

<style>
	body {
		background-color: #273746;
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
		display: block;
		justify-content: center;


	}

	.container__card__input {
		padding-top: 30px;
	}

	.container__card h2 {
		font-size: 34px;
		padding-top: 25px;
	}

	.container__card__login {
		display: block;
		box-sizing: border-box;
		max-width: 300px;
		margin: 0 auto 20px auto;
		padding: 10px 15px;
		border: none;
		border-radius: 5px;
		background: #f9f9f9;
		color: #333;
		font-size: 16px;
		opacity: 0.5;
	}

	.container__card__login::placeholder {
		color: black;
	}

	.container__card__login:focus {
		outline: none;
	}

	.container__card__login__btn {
		margin-top: 50px;
		margin-bottom: 20px;
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

	input[type=login],
	input[type=password] {
		width: 100%;
		max-width: 250px;
		border-radius: 4px;
		margin: 8px 80px;
		outline: none;
		padding: 30px;
		box-sizing: border-box;
	}

	input[type=login],
	input[type=password] {
		height: 35px
	}

	.input-icone input[type=login],
	input[type=password] {
		padding-left: 35px;
	}

	.input-icone {
		position: relative;
	}

	.input-icone i {
		position: absolute;
		left: 80px;
		;
		top: 10px;
		/*gestion du placement des icones*/
		padding: 10px 8px;
		color: #fff;
	}

	input[type=login]:hover {
		background: #f2f2f2;
	}

	.input[type=password]:hover {
		background: #f2f2f2;
	}

	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: 'poppins', sans-serif;
	}
</style>

<body>
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
</body>