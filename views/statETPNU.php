<style>
	.container {
		display: flex;
		flex-direction: row;
		align-items: center;
		gap: 20px;
	}


	.table-container,
	.dynamic-container {
		flex-grow: 1;
		background-color: #405a73;
		border-radius: 10px;
		padding: 20px;
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	}

	h1 {
		text-align: center;
		margin-bottom: -120px;
		margin-top: 50px;
		color: #fff;
		font-size: 3rem;
	}

	#residenceSelect {
		width: 100%;
		padding: 10px;
		margin-bottom: 20px;
		border-radius: 10px;
		border: none;
	}

	table {
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 20px;
	}

	th,
	td {
		padding: 8px;
		text-align: left;
		border: 1px solid #fff;
		color: #000;
	}

	th {
		background-color: #405a73;
		color: #fff;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
		/* Couleur pour les lignes paires */
	}

	tr:nth-child(odd) {
		background-color: #e0e0e0;
		/* Couleur pour les lignes impaires */
	}
</style>

<body>
	<h1>Statistiques ETPLC</h1>
	<div class="container">
		<div class="table-container">
			<table id="statsETPNU">
				<tr>
					<th>Résidence</th>
					<th>Temps moyen (jours)</th>
				</tr>
				<?php foreach ($statsETPNU['residences'] as $stat) { ?>
					<tr>
						<td><?php echo htmlspecialchars($stat['residence']); ?></td>
						<td><?php echo htmlspecialchars($stat['average_time']); ?></td>
					</tr>
				<?php } ?>
				<tr>
					<th>Moyenne Globale</th>
					<td><?php echo htmlspecialchars($statsETPNU['globalAverage']); ?></td>
				</tr>
			</table>
		</div>

		<div class="dynamic-container">
			<select id="residenceSelect" onchange="loadStatsByResidence()">
				<option value="">Sélectionnez une résidence</option>
				<?php foreach ($residences as $residence) { ?>
					<option value="<?php echo htmlspecialchars($residence['residence']); ?>">
						<?php echo htmlspecialchars($residence['residence']); ?>
					</option>
				<?php } ?>
			</select>

			<div id="statsTableContainer">
				<!-- Le deuxième tableau (dynamique) sera ici... -->
			</div>
		</div>
	</div>
</body>

<script>
	function loadStatsByResidence() {
		var residence = document.getElementById('residenceSelect').value;
		console.log('Résidence sélectionnée : ' + residence);

		fetch('ajax_controller.php?action=loadStatsByResidence&residence=' + residence)
			.then(response => {
				if (!response.ok) {
					throw new Error('La requête a échoué avec le statut ' + response.status);
				}
				return response.json(); // Récupérez le JSON
			})
			.then(data => {
				console.log('Données reçues : ', data);
				var container = document.getElementById('statsTableContainer');
				container.innerHTML = ''; // Videz le conteneur actuel

				if (data.length === 0) {
					// Si aucune donnée n'est disponible, affichez un message
					container.innerHTML = '<p>Aucune donnée disponible pour cette résidence.</p>';
				} else {
					// Sinon, construisez le tableau
					var table = document.createElement('table');
					table.innerHTML = '<tr><th>CP</th><th>Temps moyen (jours)</th></tr>';
					data.forEach(stat => {
						var row = document.createElement('tr');
						row.innerHTML = '<td>' + stat.cp_Agent + '</td><td>' + stat.average_time + '</td>';
						table.appendChild(row);
					});
					container.appendChild(table); // Ajoutez le tableau au conteneur
				}
			})
			.catch(error => {
				console.error('Erreur lors de la requête AJAX : ', error);
			});
	}
</script>