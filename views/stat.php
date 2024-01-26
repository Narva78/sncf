<style>
	td.table-cell {
		width: 50%;
	}

	.stat {
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
</style>
<br>
<h1 class="mb-4">Statistique</h1>
<br>

<div class="row">
	<!-- Le temps moyen de réparation d'un Ipad -->
	<div class="col-md-4">
		<div class="card container">
			<br>
			<h5 class="card-title text-center">Temps moyen de réparation d'un iPad</h5>
			<br>
			<div class="card-body table-responsive">
				<table class="table table-striped">
					<thead class="text-center">
						<tr>
							<td class="table-cell">
								<p><b>Temps</b></p>
							</td>
							<td class="table-cell">
								<p><b>Nb jours</b></p>
							</td>
						</tr>
					</thead>

					<!-- Affichage moyenne 3 dernier mois -->
					<tbody class="text-center">
						<tr>
							<td class="table-cell">
								<p>3 mois</p>
							</td>
							<td class="table-cell">
								<p><?= $moyenneLast3Months ?> jours</p>
							</td>
						</tr>

						<!-- Affichage moyenne 6 dernier mois -->


						<!-- Affichage moyenne all time -->
						<tr>
							<td class="table-cell">
								<p>All Time</p>
							</td>
							<td class="table-cell">
								<p><?= $moyenneAllTime ?> jours</p>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>


	<!-- Temps Moyen d'Attribution d'un Ipad -->
	<div class="col-md-4">
		<div class="card container">
			<br>
			<h5 class="card-title text-center">Temps moyen d'attribution d'un iPad</h5>
			<br>
			<!-- tableau moyenne 3 mois en fonction des lignes -->
			<div class="card-body table-responsive">
				<table class="table table-striped">
					<thead class="text-center">
						<tr>
							<td class="table-cell"><b>Temps</b></th>
							<td class="table-cell"><b>Nb jours</b></th>
						</tr>
					</thead>

					<!-- Affichage moyenne 3 dernier mois -->
					<tbody class="text-center">
						<tr>
							<td class="table-cell">3 mois</th>
							<td class="table-cell"><?= "$moyenneAttribLast3Months" ?> jours</th>
						</tr>


						<!-- Affichage moyenne all time -->
						<tr>
							<td class="table-cell">All Time</th>
							<td class="table-cell"><?= "$moyenneAttribAllTime" ?> jours</th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Le nombre d'iPads réparés/non réparables -->

</div>


<table>
	<tr>
		<th>ETPNU</th>

	</tr>

	<tr class="stat">
		<td>RAMBOUILLET : <?= "$moyenneAttribLast3Months" ?> jours </td>
		<td>VERSAILLES</td>
		<td>TRAPPES</td>
	</tr>
</table>