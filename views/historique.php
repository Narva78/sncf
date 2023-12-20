<title>Informations iPad</title>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
	.search {
		display: flex;
		justify-content: center;
		gap: 20px;
	}

	h1 {
		text-align: center;
		padding: 90px;
		color: #FFF;
		font-size: 3rem;
	}

	.checkbox ul {
		display: flex;
		justify-content: center;
		gap: 20px;
		list-style: none;
		margin: 30px;
		border: 1px solid #fff;
		width: 30%;
		background: #FFF;
		margin-left: 35%;
		border-radius: 10px;
	}

	p {
		border-right: solid 1px black;
		padding: 10px;
		text-align: center;

	}

	.checkbox input {
		border-right: solid 1px black;
		text-align: center;
		padding: 10px;
		margin-top: 12px;
	}

	.info {
		display: flex;
		justify-content: center;
		list-style: none;
		gap: 20px;
		margin: 30px;
		border: 1px solid #fff;
		width: 30%;
		background: #FFF;
		margin-left: 35%;
		border-radius: 10px;

	}

	.info li {
		border-right: solid 1px black;
	}

	.info input {
		align-items: center;
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
		background: #76448A;
		color: #fff;
	}

	.search__btn__Code__Dev input {
		background: #405A73;
		color: #fff;
	}

	.search__btn__icloud input {
		background: #3389C2;
		color: #fff;
	}


	input {
		padding: 10px;
		border-radius: 10px;
		font-size: 1em;
	}
</style>

<script type="text/javascript">
	$(function() {
		// Tableau des options de l'autocomplétion
		var availableTags = [

		];
		// Initialisation de l'autocomplétion
		$("#tags").autocomplete({
			source: availableTags,
		});
		// Filtrage dynamique de la table
		$("#tags").on("input", function() {
			var filter = $("#tags").val().toLowerCase();
			$('.list_treatment > tbody > tr').each(function() {
				var cp = $(this).find(".cp_Agent").html().toLowerCase();
				if (cp.includes(filter)) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});
		});
	});

	// Script.js pour le tri des colonnes de tableau
	$(document).ready(function() {
		// Rend chaque en-tête de colonne cliquable
		$('#maTable th.sortable').click(function() {
			var table = $(this).parents('table').eq(0)
			var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
			this.asc = !this.asc
			if (!this.asc) {
				rows = rows.reverse()
			}
			for (var i = 0; i < rows.length; i++) {
				table.append(rows[i])
			}

			// Ajoute la classe active à l'en-tête de colonne active et supprime la classe active de tous les autres en-têtes de colonne
			table.find('th.sortable').removeClass('active');
			$(this).addClass('active');
		})

		// Fonction de comparaison pour trier les colonnes
		function comparer(index) {
			return function(a, b) {
				var valA = getCellValue(a, index)
				var valB = getCellValue(b, index)
				return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
			}
		}

		// Fonction pour obtenir la valeur d'une cellule de tableau
		function getCellValue(row, index) {
			return $(row).children('td').eq(index).text()
		}

		function filterTable(searchTerm) {
			// Supprime les espaces de début et de fin
			searchTerm = $.trim(searchTerm);
			// Ignorer la casse (majuscules / minuscules)
			searchTerm = searchTerm.toLowerCase();
			// Parcours des lignes de la table
			$('#maTable tbody tr').each(function() {
				var currentRow = $(this);
				var cpAgent = currentRow.find('td:eq(1)').text().toLowerCase();
				// Masquer la ligne si la valeur du cp_Agent ne correspond pas à la recherche
				if (cpAgent.indexOf(searchTerm) === -1) {
					currentRow.hide();
				} else {
					currentRow.show();
				}
			});
		}

		// Appeler la fonction de filtrage à chaque changement dans le champ de recherche
		$('#search-input').on('input', function() {
			filterTable($(this).val());
		});

	});
</script>
<h1>Historique</h1>

<div class="search">

	<div class="search__cp">
		<input type="text" name="text" id="tags" placeholder="CP...">
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
		<input type="button" value="-">
	</div>
	<div class="search__btn__plus">
		<input type="button" value="+">
	</div>

</div>

<section class="checkbox">
	<ul>
		<li>
			<input type="checkbox" id="check-all">
		</li>

		<li>
			<p style="border-left:1px solid black;">CP</p>
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

	<?php foreach ($lesIpad as $ipad) : ?>
		<div class="info">
			<li><input type="checkbox" class="check-ipad" name="idsIpad[]" value="<?= $ipad['id_ipad'] ?>"></li>
			<li class="cp_Agent"><?= $ipad['cp_Agent'] ?></li>
			<li><?php echo $ipad['Icloud']; ?></li>
			<li><?php echo $ipad['CodeDev']; ?></li>
			<li><?= $ipad['date_Reception'] ?></li>
		</div>
	<?php endforeach; ?>



</section>




<script>
	// Cocher/décocher toutes les checkbox, JS vanilla
	const checkAll = document.querySelector('#check-all');
	const checkIpad = document.querySelectorAll('.check-ipad');
	checkAll.addEventListener('click', () => {
		checkIpad.forEach(check => check.checked = checkAll.checked);
	});
</script>