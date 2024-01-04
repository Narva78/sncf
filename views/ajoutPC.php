<style>
	.container {
		display: flex;
		flex-direction: column;
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

	.ajout__ecran form {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
		gap: 30px;
		margin-top: 40px;
	}

	.ajout__ecran form input {
		height: 50px;
		width: 300px;
		border-radius: 10px;
		border: none;
		font-size: 1.2rem;
	}

	input[type=submit] {
		height: 40px;
		width: 130px;
		background: #3498DB;
		color: #fff;
		border: none;
		font-size: 1rem;
		border-radius: 10px;
		margin: 5px;

	}

	input[type=button] {
		height: 40px;
		width: 130px;
		background: red;
		color: #fff;
		border: none;
		font-size: 1rem;
		border-radius: 10px;
		margin: 5px;
	}

	.bouton {
		margin: 30px;
	}

	h2 {
		text-align: center;
		color: #fff;
		margin-top: 50px;
		font-size: 3rem;
	}

	select {
		height: 50px;
		width: 300px;
		border-radius: 10px;
		font-size: 1.2rem;
	}
</style>
<h2>AjoutEcran</h2>
<div class="container">
	<div class="container__card">
		<div class="ajout__ecran">
			<form action="index.php?uc=gestionPC&action=ajouterPC" method="POST">
				<input type="text" name="nSerie" required placeholder="  nSerie">


				<select name="marque" id="marque">
					<option value=" samsung"> samsung</option>
					<option value=" dell"> dell</option>
				</select>


				<input type="text" name="modele" id="modele" placeholder="  modele">

				<input type="text" name="quantite" required placeholder="  Quantité">



			</form>

			<div class="bouton">
				<input type="submit" name="ajouter" value="Ajouter">
				<a href="index.php?uc=gestionPC"><input type="button" value="Retour"></a>

			</div>

		</div>
	</div>
</div>