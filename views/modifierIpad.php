<title>Formulaire de Modification d'Ipad</title>

<!-- Formulaire de modification d'un iPad -->
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-lg-4 col-md-6 col-sm-8 col-10 my-5 p-4 bg-white rounded-lg shadow-lg">
			<h1 class="text-center mb-4">Formulaire de Modification d'Ipad</h1>
			<form action="index.php?uc=historique&action=modifierIpad" method="POST">
				<br><br>

				<!-- Champ caché pour stocker l'ID de l'iPad -->
				<input type="hidden" name="id" value="<?php echo $id; ?>">

				<!-- Cp de l'agent avec taille max 11 charactères-->
				<div class="form-group">
					<input type="text" class="form-control" id="cp" name="cp" maxlength="11" placeholder="Cp de l'Agent" value="<?php echo $cp; ?>">
				</div>

				<!-- Nom de l'agent-->
				<div class="form-group">
					<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom de l'Agent" value="<?php echo $nom; ?>">
				</div>

				<!-- Prenom de l'agent-->
				<div class="form-group">
					<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom de l'Agent" value="<?php echo $prenom; ?>">
				</div>

				<!-- Affectation de l'Agent -->
				<div class="form-group">
					<label for="affectation">Affectation :</label>
					<select class="form-control" id="affectation" name="affectation">
						<option value="LigneN&U" <?php if ($affectation == 'LigneN&U') echo ' selected'; ?>>Ligne N&U</option>
						<option value="LigneC" <?php if ($affectation == 'LigneC') echo ' selected'; ?>>Ligne C</option>
					</select>
				</div>



				<!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="icloud" name="icloud" <?php if ($icloud == 1) echo 'checked'; ?>>
						<label class="form-check-label" for="icloud">
							Cochez si l'iPad est lié à un compte iCloud
						</label>
					</div>
				</div>

				<!-- Checkbox si l'Ipad possède un code de Déverouillage -->
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="codeDev" name="codeDev" <?php if ($codeDev == 1) echo 'checked'; ?>>
						<label class="form-check-label" for="codeDev">
							Cochez si l'iPad possède un code de dévérouillage
						</label>
					</div>
				</div>

				<!-- Date Reception (Obligatoire) et Date Attribution de l'Ipad -->
				<div class="form-group row">
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
				<div class="form-group row">
					<div class="col-sm-6">
						<label for="debutRep">Début de réparation :</label>
						<input type="date" class="form-control" id="debutRep" name="debutRep" placeholder="jj/mm/aaaa" value="<?php echo $debutRep; ?>">
					</div>
					<div class="col-sm-6">
						<label for="finRep">Fin de réparation :</label>
						<input type="date" class="form-control" id="finRep" name="finRep" placeholder="jj/mm/aaaa" value="<?php echo $finRep; ?>">
					</div>
				</div>

				<!-- Checkbox si l'Ipad est réparable -->
				<div class="form-group form-check">
					<input type="checkbox" class="form-check-input" id="reparable" name="reparable" <?php if ($nonReparable == 1) echo 'checked'; ?>>
					<label class="form-check-label" for="nonReparable">Non réparable</label>
				</div>


				<!-- Bouton de validation de Modification du formulaire -->
				<center>
					<div class="form-group">
						<button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
					</div>
				</center>

			</form>
		</div>
	</div>
</div>