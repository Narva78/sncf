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

<h2>ModifierEcran</h2>
<div class="container">
	<div class="container__card">
		<div class="ajout__ecran">
			<form action="index.php?uc=gestionPC&action=modifierPC" method="post">
				<input type="hidden" name="id" value="<?php echo '$id'; ?>"> <!-- Champ caché pour l'ID -->

				<input type="text" name="nSerie" value="  <?php echo $unPC['nSerie']; ?>">


				<select name="marque" id="marque">
					<option value="samsung" <?php if ($marque == 'samsung') echo ' selected'; ?>> samsung</option>
					<option value="dell" <?php if ($marque == 'dell') echo ' selected'; ?>> dell</option>
				</select>


				<input type="text" name="modele" id="modele" placeholder="modele" value="  <?php echo $unPC['modele']; ?>">


				<input type="text" id="quantite" name="quantite" value="  <?php echo $unPC['quantite']; ?>">




			</form>
			<div class="bouton">
				<input type="submit" name="modifier" value="Modifier">
				<a href="index.php?uc=gestionPC"><input type="button" value="Retour"></a>

			</div>


		</div>
	</div>
</div>