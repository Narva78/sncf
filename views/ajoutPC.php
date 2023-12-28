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
		margin-top: 45px;

	}

	.ajout__ecran form input {
		height: 30px;
		width: 300px;
		border-radius: 10px;
	}

	.ajout__ecran form input[type=submit] {
		width: 150px;
		background: #3498DB;
		color: #fff;
	}

	.ajout__ecran form input[type=submit]:hover {
		background: #3564DB;
		transition: .3s;
	}

	h2 {
		text-align: center;
		color: #fff;
		margin-top: 50px;
		font-size: 3rem;
	}

	select {
		height: 30px;
		width: 300px;
		border-radius: 10px;
	}
</style>
<h2>AjoutEcran</h2>
<div class="container">
	<div class="container__card">
		<div class="ajout__ecran">
			<form action="index.php?uc=gestionPC&action=ajouterPC" method="POST">
				<input type="text" name="nSerie" required placeholder="nSerie">


				<select name="marque" id="marque">
					<option value="samsung">samsung</option>
					<option value="dell">dell</option>
				</select>


				<input type="text" name="modele" id="modele" placeholder="modele">

				<input type="text" name="quantite" required placeholder="Quantité">

				<input type="submit" name="ajouter" value="Ajouter">

			</form>

		</div>
	</div>
</div>