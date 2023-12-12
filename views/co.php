<!-- Description: Page de connexion -->


	<title>Page de connexion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


<style>
.card {
	position: absolute;
	top: 40%;
	left: 50%;
	transform: translate(-50%, -50%);
}
</style>






<body style="background-image: url('image/arrierePlan.jpg'); background-size: cover;">
	<div class ="card container" style = "width: 28rem">
		<div class="mt-5 text-center">
			<h2 class="mb-4">Page de Connexion Gestion d'Ipad </h2>
			<i class="fas fa-star fa-spin"></i>

			<br><br>
			<!-- Formulaire de connexion à l'aide de bootstrap -->
			<form method="POST" action="index.php?uc=connexion&action=valideConnexion">
				<div class="form-group">
					<label for="login"></label>
					<input type="login" class="form-control" id="login" placeholder="Entrez le Cp" name="login">
				</div>
				<div class="form-group">
					<label for="mdp"></label>
					<input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp">
				</div>
				<br>
				<input type="submit" class="btn btn-primary" value="Se connecter" name="valider">
				<br><br>
			</form>
		</div>
	</div>
</body>

