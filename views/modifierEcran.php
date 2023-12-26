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
		margin-top: 20px;

	}

	.ajout__ecran form input {
		height: 40px;
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
		transition: .2s;
	}

	h2 {
		text-align: center;
		color: #fff;
		margin-top: 50px;
	}

	select {
		height: 40px;
		width: 300px;
		border-radius: 10px;
	}
</style>

<h2>ModifierEcran</h2>
<div class="container">
	<div class="container__card">
		<div class="ajout__ecran">
			<form action="index.php?uc=gestionEcran&action=modifierEcran" method="post">
				<input type="hidden" name="id" value="<?php echo '$id'; ?>"> <!-- Champ caché pour l'ID -->

				<input type="text" id="taille" name="taille" value="<?php echo $unEcran['taille']; ?>">


				<select name="marque" id="marque">
					<option value="<?php echo $unEcran['marque']; ?>">samsung</option>
					<option value="<?php echo $unEcran['marque']; ?>">dell</option>
				</select>


				<select name="marque" id="marque">
					<option value="<?php echo $unEcran['types']; ?>">plat</option>
					<option value="<?php echo $unEcran['types']; ?>">incurvé</option>
				</select>

				<input type="number" id="quantite" name="quantite" value="<?php echo $unEcran['quantite']; ?>">

				<input type="submit" name="modifier" value="Modifier">

			</form>

		</div>
	</div>
</div>