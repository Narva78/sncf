<title>Informations iPad</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

	.search__btn__moins input {
		background: red;
		color: #fff;
	}

	.search__btn__Reportable input {
		background: #76448a;
		color: #fff;
	}

	.search__btn__Code__Dev input {
		background: #405a73;
		color: #fff;
	}

	.search__btn__icloud input {
		background: #3389c2;
		color: #fff;
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

	<h1>Historique Ecran</h1>
	<div class="reunion">
		<div class="search">
			<div class="search__btn__icloud">
				<input type="button" value="Marque" onclick="sortItems('Marque')" />
			</div>
			<div class="search__btn__Code__Dev">
				<input type="button" value="Types" onclick="sortItems('Types')" />
			</div>
			<div class="search__btn__Reportable">
				<input type="button" value="Quantite" onclick="sortItems('Quantite')" />
			</div>

			<div class="search__btn__moins">
				<input type="button" value="-" />
			</div>
			<div class="search__btn__plus">
				<a href="index.php?uc=gestionEcran&action=ajouterEcran"><input type="button" value="+" /></a>
			</div>
		</div>
		<form action="index.php?uc=gestionEcran&action=supprimerEcran" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer les Ecrans sélectionnés ?');">

			<section class="checkbox">
				<div class="checkbox__ligne">
					<ul class="checkbox__enTete">
						<li>
							<input type="checkbox" id="check-all" />
						</li>
						<li>
							<span>Taille</span>
						</li>
						<li>
							<span>Marque</span>
						</li>
						<li>
							<span>Types</span>
						</li>
						<li>
							<span style="border-right: none">Quantite</span>
						</li>
					</ul>
				</div>

				<?php
				if (!isset($lesEcrans) || empty($lesEcrans))
					// Définissez $lesEcrans ou gérez le cas où il n'est pas défini ou vide
					$lesEcrans = [];

				foreach ($lesEcrans as $ecran) : ?>
					<div class="checkbox__ligne">
						<ul>
							<li>
								<input type="checkbox" class="check-ipad" name="idsEcran[]" value="<?= $ecran['id_ecran'] ?>" />
							</li>
							<li><?= $ecran['taille'] ?> cm</li>
							<li><?= $ecran['marque'] ?></li>
							<li><?= $ecran['types'] ?></li>
							<li><input type="number" value="<?= $ecran['quantite'] ?>"></li>
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
<input type="submit" name="supprimer" value="Supprimer">
</form>