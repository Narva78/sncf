<title>Affichage Ipad</title>

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
		max-width: 100%;
		border: none;
		width: 224px;
	}

	@media screen and (max-width: 1200px) {
		.search input {
			width: 200px;
		}
	}

	@media screen and (max-width: 1082px) {
		.search input {
			width: 180px;
		}
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
		max-width: 100%;
		margin-left: auto;
		margin-right: auto;
		font-size: 0.9rem;
		width: 93%;
	}

	.checkbox__ligne li {
		word-wrap: break-word;
		word-break: break-all;
	}

	.checkbox ul {
		display: grid;
		grid-template-columns: repeat(8, 1fr);
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

	.search__btn__date input {
		background: #76448a;
		color: #fff;
	}

	.search__btn__date input:hover {
		background: #670070;
		transition: .7s;
	}

	.search__btn__etat input {
		background: #405a73;
		color: #fff;
	}

	.search__btn__etat input:hover {
		background: #395066;
		transition: .7s;
	}

	.search__btn__nom input {
		background: #3389c2;
		color: #fff;
	}

	.search__btn__nom input:hover {
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

	nav ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.page-item {
		margin: 0 5px;
	}

	.page-link {
		display: block;
		padding: 8px 12px;
		text-decoration: none;
		border: 1px solid #ccc;
		border-radius: 4px;
		background-color: white;
		color: black;
	}

	.page-link:hover {
		background-color: #f0f0f0;
		color: black;
	}

	/* Style pour les éléments désactivés */
	.page-item.disabled .page-link {
		pointer-events: none;
		background-color: #eee;
		color: #999;
		border-color: #ddd;
	}

	/* Style pour l'élément actif */
	.page-item.active .page-link {
		background-color: #007bff;
		color: #fff;
		border-color: #007bff;
	}


	.pcList.en-cours {
		background-color: #ffeb3b;
	}


	.pcList.traite {
		background-color: #4caf50;
	}

	.legend {
		position: absolute;
		/* Utilisez 'fixed' si vous voulez que la légende reste en place lors du défilement */
		top: 0;
		right: 0;
		margin: 50px;
		margin-top: 150px;
		color: #fff;
		background-color: rgba(255, 255, 255, 0.1);
		border-radius: 10px;
		padding: 10px;
		text-align: left;
	}

	.legend-item {
		display: block;
		padding: 5px 10px;
		margin-bottom: 5px;
		color: #000;
		font-weight: bold;
		border-radius: 5px;
	}

	.legend-item.en-cours {
		background-color: #ffeb3b;
		/* Couleur jaune pour 'en cours' */
	}

	.legend-item.traite {
		background-color: #4caf50;
		/* Couleur verte pour 'traité' */
	}
</style>

<!-- Section 1 -->
<h1>Historique Ipad</h1>
<div class="legend">
	<div>
		<span class="legend-item en-cours">En cours (Jaune)</span>
		<span class="legend-item traite">Traité (Vert)</span>
	</div>
</div>

<div class="historique">
	<section class="checkbox">
		<form action="index.php?uc=historique&action=supprimerIpad" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer les Ipads sélectionnés ?');">
			<div class="reunion">
				<div class="search">
					<div class="search__nSerie">
						<input type="text" name="text" id="tags" class="search-input" placeholder="CP...">
					</div>
					<div class="search__btn__nom">
						<a href="index.php?uc=historique&action=historique&tri=nom&ordre=<?= ($tri === 'nom') ? $prochainOrdre : 'asc' ?>&page=<?= $currentPage ?>"><input type="button" value="Nom" /></a>
					</div>
					<div class="search__btn__etat">
						<?php
						// Déterminer l'état actuel du tri
						$etatActuel = isset($_GET['etat']) ? $_GET['etat'] : 'tous';

						// Déterminer le label et l'état suivant pour le bouton
						switch ($etatActuel) {
							case 'en-cours':
								$labelEtat = 'Voir Traité';
								$etatSuivant = 'traite';
								break;
							case 'traite':
								$labelEtat = 'Voir Tous';
								$etatSuivant = 'tous';
								break;
							default:
								$labelEtat = 'Voir En cours';
								$etatSuivant = 'en-cours';
						}
						?>
						<a href="index.php?uc=historique&action=historique&tri=etat&etat=<?= $etatSuivant ?>"><input type="button" value="<?= $labelEtat ?>" /></a>
					</div>
					<div class="search__btn__date">
						<a href="index.php?uc=historique&action=historique&tri=date_demande&ordre=<?= ($tri === 'date_demande') ? $prochainOrdre : 'asc' ?>&page=<?= $currentPage ?>"><input type="button" value="Date" /></a>
					</div>
					<?php
					if (isset($_SESSION['id'])) {
						$userID = $pdo->getInfoUSerById($_SESSION['id']);
						$is_admin = $userID['is_admin'] == 1;
					}
					if ($is_admin) {
					?>
						<div class="search__btn__moins">
							<input type="submit" name="supprimer" value="Supprimer">
						</div>
					<?php } ?>

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
							<p>Nom</p>
						</li>

						<li>
							<p>IMEI</p>
						</li>
						<li>
							<p>Code RG</p>
						</li>
						<li>
							<p style="border-right:none;">Date demande</p>
						</li>
						<li>
							<p>Type demande</p>
						</li>





					</ul>
				</div>

				<?php
				if (!isset($lesIpad) || empty($lesIpad))
					// Définissez $lesPC ou gérez le cas où il n'est pas défini ou vide
					$lesPC = [];
				$etatFiltre = isset($_GET['etat']) ? $_GET['etat'] : 'tous';

				foreach ($lesIpad as $ipad) :
					$cellClass = empty($ipad['mytem']) ? 'en-cours' : 'traite'; // Définir si une cellule est en cours ou traité en fonction de mytem
					if ($etatFiltre !== 'tous' && $etatFiltre !== $cellClass) continue;
				?>
					<div class="checkbox__ligne">
						<div class="checkbox_ligne1">
							<ul class="pcList <?= $cellClass ?>">
								<li><input type="checkbox" class="check-ipad" name="idsIpad[]" value="<?= $ipad['id_ipad'] ?>"></li>
								<li class="cp_Agent"><?= $ipad['cp_Agent'] ?></li>
								<li><?= $ipad['nom'] ?></li>
								<li><?php echo $ipad['imei']; ?></li>
								<li><?php echo $ipad['Code_RG']; ?></li>
								<li><?= $ipad['date_demande'] ?></li>
								<li><?= $ipad['type_demande'] ?></li>

								<li>
									<a class="checkbox__ligne1__modif" href="index.php?uc=historique&action=modifierIpad&id=<?= $ipad['id_ipad'] ?>"></a>
									<a class="checkbox__ligne1__modif" href="index.php?uc=historique&action=telecharger&id=<?= $ipad['id_ipad'] ?>"></a>

								</li>
							</ul>
						</div>
					</div>


				<?php endforeach; ?>
		</form>
	</section>



	<nav>
		<ul>
			<!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
			<li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
				<a href="./?<?= http_build_query(array_merge($_GET, array("page" => $currentPage - 1))) ?>" class="page-link">Précédente</a>
			</li>

			<?php for ($page = 1; $page <= $pages; $page++) : ?>
				<!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
				<li class="pagination page-item <?= ($currentPage == $page) ? "active" : "" ?>">
					<a href="./?<?= http_build_query(array_merge($_GET, array("page" => $page))) ?>" class="page-link"><?= $page ?></a>
				</li>
			<?php endfor ?>


			<!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
			<li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
				<a href="./?<?= http_build_query(array_merge($_GET, array("page" => min($currentPage + 1, $pages)))) ?>" class="page-link">Suivante</a>
			</li>


		</ul>
	</nav>
</div>



<script>
	// JavaScript pour la recherche
	document.addEventListener('DOMContentLoaded', function() {
		const searchInput = document.getElementById('tags');
		const pcList = document.querySelectorAll('.pcList');

		searchInput.addEventListener('input', function(e) {
			const searchString = e.target.value.toLowerCase();

			pcList.forEach(pc => {
				const cp = pc.children[1].innerText.toLowerCase();
				const imei = pc.children[2].innerText.toLowerCase();
				const nom = pc.children[6].innerText.toLowerCase();


				if (cp.includes(searchString) || imei.includes(searchString) || nom.includes(searchString)) {
					pc.style.display = 'grid'; // Changer 'row' à 'block' pour l'affichage d'un élément
				} else {
					pc.style.display = 'none';
				}
			});

			// Réafficher tous les éléments lorsque la recherche est vide
		});
	});






	// Cocher/décocher toutes les checkbox, JS vanilla
	const checkAll = document.querySelector("#check-all");
	const checkIpad = document.querySelectorAll(".check-ipad");
	checkAll.addEventListener("click", () => {
		checkIpad.forEach((check) => (check.checked = checkAll.checked));
	});
</script>