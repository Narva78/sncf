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
		flex-wrap: wrap;
		justify-content: center;
		gap: 20px;
		margin-bottom: 20px;
	}

	.search input {
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
		list-style: none;
		margin-bottom: 10px;
		border: 1px solid #fff;
		background: #fff;
		border-radius: 10px;
		padding: 10px;
		box-sizing: border-box;
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
		width: 170px;
	}

	.search__btn__plus input:hover {
		background: #006102;
		transition: .7s;


	}

	.search__btn__moins input {
		background: red;
		color: #fff;
		width: 170px;


	}

	.search__btn__moins input:hover {
		background: #A00C00;
		transition: .7s;

	}

	.search__btn__Reportable input {
		background: #582900;
		color: #fff;
		width: 170px;


	}

	.search__btn__Reportable input:hover {
		background: #591A00;
		transition: .7s;
	}

	.search__btn__Code__Dev input {
		background: #76448a;
		color: #fff;
		width: 170px;


	}

	.search__btn__Code__Dev input:hover {
		background: #670070;
		transition: .7s;

	}

	.search__btn__icloud input {
		background: #405a73;
		color: #fff;
		width: 170px;


	}

	.search__btn__icloud input:hover {
		background: #395066;
		transition: .7s;
	}

	.search__btn__taille input {
		background: #3389c2;
		color: #fff;
		width: 170px;


	}

	.search__btn__taille input:hover {
		background: #266894;
		transition: .7s;
	}

	input {
		padding: 10px;
		border-radius: 10px;
		font-size: 1em;
	}

	input {
		padding: 10px;
		border-radius: 10px;
		font-size: 1em;
		border: none;
		cursor: pointer;
	}

	.checkbox__ligne ul a {
		color: #3389c2;
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
</style>


<body>
	<form action="index.php?uc=gestionEcran&action=supprimerEcran" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer les Ecrans sélectionnés ?');">


		<h1>Historique Ecran</h1>
		<div class="reunion">
			<div class="search">
				<div class="search__btn__taille">
					<input type="button" value="Taille" />

				</div>
				<div class="search__btn__icloud">
					<input type="button" value="Marque" />
				</div>
				<div class="search__btn__Code__Dev">
					<input type="button" value="Types" />
				</div>
				<div class="search__btn__Reportable">
					<input type="button" value="Quantite" />
				</div>
				<div class="search__btn__plus">
					<a href="index.php?uc=gestionEcran&action=ajouterEcran"><input type="button" value="Ajouter" /></a>
				</div>
				<div class="search__btn__moins">
					<input type="submit" name="supprimer" value="Supprimer">
				</div>
			</div>




			<section class="checkbox">
				<div class="checkbox__ligne">
					<ul class="checkbox__enTete">
						<li>
							<input type="checkbox" id="check-all" />
						</li>
						<li>
							<span class="entete" data-sort="taille">Taille</span>
						</li>
						<li>
							<span class="entete" data-sort="marque">Marque</span>
						</li>
						<li>
							<span class="entete" data-sort="types">Types</span>
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
				if (!isset($lesEcrans) || empty($lesEcrans))
					// Définissez $lesEcrans ou gérez le cas où il n'est pas défini ou vide
					$lesEcrans = [];

				foreach ($lesEcrans as $ecran) : ?>
					<div class="checkbox__ligne">
						<ul class="checkbox__ligne1">
							<li>
								<input type="checkbox" class="check-ipad" name="idsEcran[]" value="<?= $ecran['id_ecran'] ?>" />
							</li>
							<li><?= $ecran['taille'] ?></li>
							<li><?= $ecran['marque'] ?></li>
							<li><?= $ecran['types'] ?></li>
							<li><?= $ecran['quantite'] ?></li>
							<li>
								<a class="checkbox__ligne1__modif" href="index.php?uc=gestionEcran&action=modifierEcran&id=<?= $ecran['id_ecran'] ?>"></a>
							</li>
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