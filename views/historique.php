<title>Affichage Ipad</title>

<style>
	body {
		background-color: #273746;
	}

	.historique {
		display: flex;
		flex-direction: row;
		width: 100%;
	}


	.reunion {
		display: flex;
		justify-content: center;
		flex-direction: column;
	}

	.search {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
		gap: 20px;
		margin-bottom: 20px;
	}

	.search input {
		width: 170px;
		border: none;
	}

	h1 {
		text-align: center;
		padding: 90px;
		color: #fff;
		font-size: 3rem;
	}

	.checkbox {
		display: flex;
		flex: 1;
		flex-direction: column;
		align-items: center;
	}

	.checkbox__enTete {
		background-color: #405a73 !important;
		color: #fff;
		font-weight: bold;
	}

	.checkbox__ligne {
		width: 80%;
		margin-left: auto;
		margin-right: auto;
	}

	.checkbox ul {
		display: grid;
		grid-template-columns: repeat(5, 1fr);
		gap: 20px;
		list-style: none;
		margin-bottom: 10px;
		border: 1px solid #fff;
		background: #fff;
		border-radius: 10px;
		padding: 10px;
		box-sizing: border-box;
	}

	.checkbox ul li {
		display: flex;
		align-items: center;
		justify-content: center;
		padding: 10px;
		border-right: solid 1px black;
	}

	.checkbox__enTete li span,
	.checkbox__enTete li input {
		text-align: center;
	}

	.checkbox ul li:last-child {
		border-right: none;
	}

	.search__btn__plus input {
		background: green;
		color: #fff;
	}

	.search__btn__plus input:hover {
		background: #006102;
		transition: .7s;

	}

	.search__btn__moins input {
		background: red;
		color: #fff;
	}

	.search__btn__moins input:hover {
		background: #A00C00;
		transition: .7s;
	}

	.search__btn__Reportable input {
		background: #76448a;
		color: #fff;
	}

	.search__btn__Reportable input:hover {
		background: #670070;
		transition: .7s;
	}

	.search__btn__Code__Dev input {
		background: #405a73;
		color: #fff;
	}

	.search__btn__Code__Dev input:hover {
		background: #395066;
		transition: .7s;

	}

	.search__btn__icloud input {
		background: #3389c2;
		color: #fff;
	}

	.search__btn__icloud input:hover {
		background: #266894;
		transition: .7s;
	}

	.search__btn__modif input {
		background: pink;
		color: #fff;
	}

	input {
		padding: 10px;
		border-radius: 10px;
		font-size: 1em;
		border: none;
		cursor: pointer;
	}

	input {
		padding: 10px;
		border-radius: 10px;
		font-size: 1em;
		border: none;
		cursor: pointer;
	}

	.search-input {
		cursor: initial;
	}

	.checkbox__ligne ul a {
		color: #fff;
		text-align: center;
		border-radius: 25px;
		cursor: pointer;
		background: #3389c2;

	}



	.checkbox__ligne ul a:hover {
		transition: .5s;
		background: aqua;
	}

	.checkbox__ligne1__modif {
		background-color: blue;
		width: 30px;
		height: 30px;
		border: none;
		cursor: pointer;
		transition: 0.3s;
	}

	.checkbox__ligne1 {
		list-style: none;
		margin-bottom: 10px;
		border: 1px solid #fff;
		background: #fff;
		border-radius: 10px;
		padding: 10px;
		box-sizing: border-box;
		align-items: center;
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

	.formulaireModif {
		flex: 1;
		/* Prend 50% de qd visible, sinon aucun */
		display: none;
	}
</style>

<!-- Section 1 -->
<h1>Historique Ipad</h1>
<div class="historique">
	<div class="flexContainer">
		<section class="checkbox">
			<form action="index.php?uc=historique&action=supprimerIpad" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer les Ipads sélectionnés ?');">
				<div class="reunion">
					<div class="search">
						<div class="search__nSerie">
							<input type="text" name="text" id="tags" class="search-input" placeholder="CP...">
						</div>
						<div class="search__btn__icloud">
							<input type="button" value="icloud">
						</div>
						<div class="search__btn__Code__Dev">
							<input type="button" value="Code Dev">
						</div>
						<div class="search__btn__Reportable">
							<input type="button" value="Reportable">
						</div>
						<div class="search__btn__moins">
							<input type="submit" name="supprimer" value="Supprimer">
						</div>
						<div class="search__btn__plus">
							<a href="index.php?uc=historique&action=ajouterIpad"><input type="button" value="Ajouter" /></a>
						</div>
					</div>



					<div class="checkbox__ligne">
						<ul class="checkbox__enTete">
							<li>
								<input type="checkbox" id="check-all">
							</li>

							<li>
								<p>CP</p>
							</li>
							<li>
								<p> icloud</p>
							</li>
							<li>
								<p>Code dev</p>
							</li>
							<li>
								<p style="border-right:none;">Date récap</p>
							</li>

						</ul>
					</div>

					<?php
					if (!isset($lesIpad) || empty($lesIpad))
						// Définissez $lesPC ou gérez le cas où il n'est pas défini ou vide
						$lesPC = [];

					foreach ($lesIpad as $ipad) : ?>
						<div class="checkbox__ligne">

							<div class="checkbox_ligne1">
								<ul class="pcList" onclick="window.location='index.php?uc=historique&action=modifierIpad&id=<?= $ipad['id_ipad'] ?>'">
									<li><input type="checkbox" class="check-ipad" name="idsIpad[]" value="<?= $ipad['id_ipad'] ?>"></li>
									<li class="cp_Agent"><?= $ipad['cp_Agent'] ?></li>
									<li><?php echo $ipad['Icloud']; ?></li>
									<li><?php echo $ipad['CodeDev']; ?></li>
									<li><?= $ipad['date_Reception'] ?></li>
								</ul>
							</div>
						</div>


					<?php endforeach; ?>
			</form>
		</section>
		<section class='formulaireModif'>
			<div class="container">
				<div class="container__card">
					<div class="ajout__ecran">

						<form action="index.php?uc=historique&action=modifierIpad" method="POST">
							<!-- Champ caché pour stocker l'ID de l'iPad -->
							<input type="hidden" name="id" value="<?php echo 'id'; ?>">

							<!-- Cp de l'agent avec taille max 11 charactères-->
							<div class="form-group">
								<input type="text" class="form-control" id="cp" name="cp" style="width: 450px;" maxlength="11" placeholder="Cp de l'Agent" value="<?php echo 'cp'; ?>">
							</div>

							<!-- Nom de l'agent-->
							<div class="form-group">
								<input type="text" class="form-control" id="nom" name="nom" style="width: 450px;" placeholder="Nom de l'Agent" value="<?php echo 'nom'; ?>">
							</div>

							<!-- Prenom de l'agent-->
							<div class="form-group">
								<input type="text" class="form-control" id="prenom" name="prenom" style="width: 450px;" placeholder="Prenom de l'Agent" value="<?php echo 'prenom'; ?>">


							</div>
							<div class="colonne">
								<!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="icloud" name="icloud" <?php if ('icloud' == 1) echo 'checked'; ?>>
										<label class="form-check-label" for="icloud">
											iCloud
										</label>
									</div>
								</div>

								<!-- Checkbox si l'Ipad possède un code de Déverouillage -->
								<div class="form-group">
									<div class="form-check">
										<input class="form-check-input" type="checkbox" id="codeDev" name="codeDev" <?php if ('codeDev' == 1) echo 'checked'; ?>>
										<label class="form-check-label" for="codeDev">
											code de dévérouillage
										</label>
									</div>
								</div>
								<!-- Checkbox si l'Ipad est réparable -->
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" id="reparable" name="reparable" <?php if ('nonReparable' == 1) echo 'checked'; ?>>
									<label class="form-check-label" for="nonReparable">Non réparable</label>
								</div>
							</div>



							<!-- Date Reception (Obligatoire) et Date Attribution de l'Ipad -->
							<div class=" row__1">
								<div class="col-sm-6">
									<label for="dateReception">Date de réception :</label>
									<input type="date" class="form-control" id="dateReception" name="dateReception" value="<?php echo 'dateReception'; ?>">
								</div>
								<div class="col-sm-6">
									<label for="dateAttribution">Date d'attribution :</label>
									<input type="date" class="form-control" id="dateAttribution" name="dateAttribution" value="<?php echo 'dateAttribution'; ?>">
								</div>
							</div>
							<!-- Date de début et de fin de réparation -->
							<div class="row__2">
								<div class="col-sm-6">
									<label for="debutRep">Début de réparation :</label>
									<input type="date" class="form-control" id="debutRep" name="debutRep" placeholder="jj/mm/aaaa" value="<?php echo 'debutRep'; ?>">
								</div>
								<div class="col-sm-6">
									<label for="finRep">Fin de réparation :</label>
									<input type="date" class="form-control" id="finRep" name="finRep" placeholder="jj/mm/aaaa" value="<?php echo 'finRep'; ?>">
								</div>
							</div>




							<input type="submit" name="modifier" value="Modifier">

						</form>
					</div>
				</div>
			</div>
		</section>

	</div>
</div>



<script>
	// JavaScript pour la recherche
	document.addEventListener('DOMContentLoaded', function() {
		const searchInput = document.getElementById('tags');
		const pcList = document.querySelectorAll('.pcList');

		searchInput.addEventListener('input', function(e) {
			const searchString = e.target.value.toLowerCase();

			pcList.forEach(pc => {
				const nSerie = pc.children[1].innerText.toLowerCase();
				const marque = pc.children[2].innerText.toLowerCase();
				const modele = pc.children[3].innerText.toLowerCase();

				if (nSerie.includes(searchString) || marque.includes(searchString) || modele.includes(searchString)) {
					pc.style.display = 'row';
				} else {
					pc.style.display = 'none';
				}
			});
		});
	});

	document.addEventListener('DOMContentLoaded', function() {
		const searchInput = document.getElementById('tags');
		const pcList = document.querySelectorAll('.pcList');

		searchInput.addEventListener('input', function(e) {
			// Votre logique de recherche existante...
		});

		const lignes = document.querySelectorAll('.checkbox_ligne1');
		const formulaire = document.querySelector('.formulaireModif');

		lignes.forEach(ligne => {
			ligne.addEventListener('click', function() {
				formulaire.style.display = 'flex';
				formulaire.style.flex = '1';
			});
		});

		// Votre script pour cocher/décocher toutes les cases...
	});



	// Cocher/décocher toutes les checkbox, JS vanilla
	const checkAll = document.querySelector("#check-all");
	const checkIpad = document.querySelectorAll(".check-ipad");
	checkAll.addEventListener("click", () => {
		checkIpad.forEach((check) => (check.checked = checkAll.checked));
	});
</script>