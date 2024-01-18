<style>
	.container {
		display: flex;
		flex-direction: column;
		height: 100%;
		margin: 2.5em;
	}

	.container__card {
		width: 620px;
		height: 780px;
		border: 1px solid #404040;
		border-radius: 10px;
		background: #405a73;
		text-align: center;
		color: white;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
		margin-bottom: 20px;
		page-break-inside: avoid;
	}

	.row {
		display: flex;
		justify-content: space-between;
		padding: 10px;
		align-items: center;
	}

	.column {
		display: flex;
		flex-direction: column;
		align-items: flex-start;
		flex: 1;
		padding: 0 10px;
	}

	h1 {
		margin: 20px;
		color: red;
	}

	h3 {
		background: purple;
		color: white;
		display: flex;
		justify-content: center;
		margin: 20px;
		width: 100%;
	}

	label {
		font-weight: bold;
		color: #fff;
	}

	p {
		margin: 5px 0;
		color: #fff;
	}
</style>


<div class="container">
	<div class="container__card">
		<h1>SAV</h1>

		<div class="container__card__info">
			<div class="row">
				<div class="column">
					<label>CP :</label>
					<p><?= htmlspecialchars($cp); ?></p>
				</div>
				<div class="column">
					<label>Nom :</label>
					<p><?= htmlspecialchars($nom); ?></p>
				</div>
				<div class="column">
					<label>Résidence :</label>
					<p><?= htmlspecialchars($residence); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>INC :</label>
					<p><?= htmlspecialchars($inc); ?></p>
				</div>
				<div class="column">
					<label>Code RG :</label>
					<p><?= htmlspecialchars($Code_RG); ?></p>
				</div>
				<div class="column">
					<label>N° Mytem :</label>
					<p><?= htmlspecialchars($mytem); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>Date Demande :</label>
					<p><?= htmlspecialchars($dateDemande); ?></p>
				</div>
			</div>
		</div>

		<h3>Description de la demande</h3>
		<div class="container__card__description">
			<div class="row">
				<div class="column">
					<label>Type Demande :</label>
					<p><?= htmlspecialchars($typeD); ?></p>
				</div>
				<div class="column">
					<label>Type de matériel :</label>
					<p><?= htmlspecialchars($typeM); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>Panne :</label>
					<p><?= htmlspecialchars($ifPanne); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>Observation :</label>
					<p><?= htmlspecialchars($observation); ?></p>
				</div>
			</div>
		</div>

		<h3>Identification du matériel</h3>
		<div class="container__card__identification">
			<div class="row">
				<div class="column">
					<label>Icloud :</label>
					<p><?= htmlspecialchars($icloud); ?></p>
				</div>
				<div class="column">
					<label>Code de déverrouillage :</label>
					<p><?= htmlspecialchars($codeDev); ?></p>
				</div>
				<div class="column">
					<label>IMEI :</label>
					<p><?= htmlspecialchars($imei); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>IMEI de remplacement :</label>
					<p><?= htmlspecialchars($imei_r); ?></p>
				</div>
			</div>
		</div>

		<div class="reparable">
			<label>État de réparation :</label>
			<p><?= ($rep == 1) ? "Réparable" : "Rebus"; ?></p>
		</div>
	</div>
</div>