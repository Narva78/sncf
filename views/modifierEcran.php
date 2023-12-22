<form action="index.php?uc=gestionEcran&action=modifierEcran" method="post">
	<input type="hidden" name="id" value="<?php echo '$id'; ?>"> <!-- Champ caché pour l'ID -->
	<label for="taille">Taille :</label>
	<input type="text" id="taille" name="taille" value="<?php echo $unEcran['taille']; ?>"><br>

	<label for="marque">Marque :</label>
	<input type="text" id="marque" name="marque" value="<?php echo $unEcran['marque']; ?>"><br>

	<label for="types">Type :</label>
	<input type="text" id="types" name="types" value="<?php echo $unEcran['types']; ?>"><br>

	<label for="quantite">Quantité :</label>
	<input type="number" id="quantite" name="quantite" value="<?php echo $unEcran['quantite']; ?>"><br>

	<input type="submit" name="modifier" value="Modifier">
</form>