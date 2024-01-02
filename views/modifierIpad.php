<style>
	.container {
		display: flex;
		flex-direction: column;
		height: 80vh;
		margin: 2.5em;
	}

	.container__card {
		width: 520px;
		height: 650px;
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
		gap: 25px;
		margin-top: 30px;
	}

	.ajout__ecran form input {
		height: 45px;
		width: 230px;
		border-radius: 10px;
		border: none;
		font-size: 1.2rem;
	}

	.ajout__ecran form input[type=submit] {
		height: 40px;
		width: 150px;
		background: #3498DB;
		color: #fff;
		border: none;
		font-size: 1rem;
	}

	.ajout__ecran form input[type=submit]:hover {
		background: #3564DB;
		transition: .2s;
	}

	h2 {
		text-align: center;
		color: #fff;
		margin-top: 50px;
		font-size: 3rem;
	}

	.row__1 {
		display: flex;
		flex-direction: row;
		gap: 10px;
	}

	.row__2 {
		display: flex;
		flex-direction: row;
		gap: 10px;
	}

	.colonne {
		display: flex;
		flex-direction: column;
		justify-content: left;
	}
</style>


<title>Formulaire de Modification d'Ipad</title>

<div class="container">
	<div class="container__card">
		<div class="ajout__ecran">

			<form action="index.php?uc=historique&action=modifierIpad" method="POST">
				<!-- Champ caché pour stocker l'ID de l'iPad -->
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<!-- Cp de l'agent avec taille max 11 charactères-->
				<div class="form-group">
					<input type="text" class="form-control" id="cp" name="cp" style="width: 450px;" maxlength="11" placeholder="Cp de l'Agent" value="<?php echo $cp; ?>">
				</div>

				<!-- Nom de l'agent-->
				<div class="form-group">
					<input type="text" class="form-control" id="nom" name="nom" style="width: 450px;" placeholder="Nom de l'Agent" value="<?php echo $nom; ?>">
				</div>

				<!-- Prenom de l'agent-->
				<div class="form-group">
					<input type="text" class="form-control" id="prenom" name="prenom" style="width: 450px;" placeholder="Prenom de l'Agent" value="<?php echo $prenom; ?>">


				</div>
				<div class="colonne">
					<!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="icloud" name="icloud" <?php if ($icloud == 1) echo 'checked'; ?>>
							<label class="form-check-label" for="icloud">
								iCloud
							</label>
						</div>
					</div>

					<!-- Checkbox si l'Ipad possède un code de Déverouillage -->
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="codeDev" name="codeDev" <?php if ($codeDev == 1) echo 'checked'; ?>>
							<label class="form-check-label" for="codeDev">
								code de dévérouillage
							</label>
						</div>
					</div>
					<!-- Checkbox si l'Ipad est réparable -->
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="reparable" name="reparable" <?php if ($nonReparable == 1) echo 'checked'; ?>>
						<label class="form-check-label" for="nonReparable">Non réparable</label>
					</div>
				</div>



				<!-- Date Reception (Obligatoire) et Date Attribution de l'Ipad -->
				<div class=" row__1">
					<div class="col-sm-6">
						<label for="dateReception">Date de réception :</label>
						<input type="date" class="form-control" id="dateReception" name="dateReception" value="<?php echo $dateReception; ?>">
					</div>
					<div class="col-sm-6">
						<label for="dateAttribution">Date d'attribution :</label>
						<input type="date" class="form-control" id="dateAttribution" name="dateAttribution" value="<?php echo $dateAttribution; ?>">
					</div>
				</div>
				<!-- Date de début et de fin de réparation -->
				<div class="row__2">
					<div class="col-sm-6">
						<label for="debutRep">Début de réparation :</label>
						<input type="date" class="form-control" id="debutRep" name="debutRep" placeholder="jj/mm/aaaa" value="<?php echo $debutRep; ?>">
					</div>
					<div class="col-sm-6">
						<label for="finRep">Fin de réparation :</label>
						<input type="date" class="form-control" id="finRep" name="finRep" placeholder="jj/mm/aaaa" value="<?php echo $finRep; ?>">
					</div>
				</div>




				<input type="submit" name="modifier" value="Modifier">

			</form>
		</div>
	</div>
</div>