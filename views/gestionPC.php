<title>Informations iPad</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
	body {
		background-color: #273746;
	}

	.reunion {
		display: flex;
		justify-content: center;
		flex-direction: column;
	}

	.search {
		display: flex;
		justify-content: center;
		gap: 20px;
		margin-bottom: 20px;
	}

	h1 {
		text-align: center;
		padding: 90px;
		color: #fff;
		font-size: 3rem;
	}

	.checkbox {
		display: flex;
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
		grid-template-columns: repeat(6, 1fr);
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
	}

	input {
		cursor: pointer;
	}
</style>


<body>
	<form action="index.php?uc=gestionEcran&action=supprimerPC" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer les PC sélectionnés ?');">


		<h1>Historique PC</h1>
		<div class="reunion">
			<div class="search">
				<div class="search__btn__icloud">
					<input type="button" value="Marque" />
				</div>
				<div class="search__btn__Code__Dev">
					<input type="button" value="n°serie" />
				</div>
				<div class="search__btn__Reportable">
					<input type="button" value="modele" />
				</div>

				<div class="search__btn__moins">
					<input type="submit" name="supprimer" value="Supprimer">
				</div>
				<div class="search__btn__plus">
					<a href="index.php?uc=gestionEcran&action=ajouterPC"><input type="button" value="+" /></a>
				</div>
				<div class="search__btn__modif">

				</div>
			</div>




			<section class="checkbox">
				<div class="checkbox__ligne">
					<ul class="checkbox__enTete">
						<li>
							<input type="checkbox" id="check-all" />
						</li>
						<li>
							<span class="entete" data-sort="n°serie">n°serie</span>
						</li>
						<li>
							<span class="entete" data-sort="marque">Marque</span>
						</li>
						<li>
							<span class="entete" data-sort="modele">modele</span>
						</li>
						<li>
							<span style="border-right: none" class="entete" data-sort="quantite">Quantite</span>
						</li>

					</ul>
				</div>

				<script>
					$(document).ready(function() {
						// Rend chaque en-tête de colonne cliquable
						$('.search .entete').click(function() {
							// Code à exécuter lorsqu'un en-tête de colonne est cliqué
							console.log("En-tête de colonne cliqué !");
							// Tu peux ajouter ici le code pour trier la colonne ou effectuer d'autres actions
						});
					});
				</script>

				<?php
				if (!isset($lesPC) || empty($lesPC))
					// Définissez $lesPC ou gérez le cas où il n'est pas défini ou vide
					$lesPC = [];

				foreach ($lesPC as $PC) : ?>
					<div class="checkbox__ligne">
						<ul>
							<li>
								<input type="checkbox" class="check-ipad" name="idsPC[]" value="<?= $PC['id_pc'] ?>" />
							</li>
							<li><?= $PC['n°serie'] ?></li>
							<li><?= $PC['marque'] ?></li>
							<li><?= $PC['modele'] ?></li>
							<li><?= $PC['quantite'] ?></li>
							<a href="index.php?uc=gestionEcran&action=modifierPC&id=<?= $PC['id_pc'] ?>"><input type="button" value="Modifier" name="modifier"></a>

						</ul>

					</div>

				<?php endforeach; ?>

			</section>

		</div>
</body>
<script>
	// Cocher/décocher toutes les checkbox, JS vanilla
	const checkAll = document.querySelector("#check-all");
	const checkIpad = document.querySelectorAll(".check-ipad");
	checkAll.addEventListener("click", () => {
		checkIpad.forEach((check) => (check.checked = checkAll.checked));
	});
</script>

</form>