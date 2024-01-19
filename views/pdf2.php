<style>
	/* styles.css */

	body {
		font-family: Arial, sans-serif;
		margin: 0;
	}

	.container {

		height: 100vh;
	}

	.container__card {

		border: 1px solid #404040;
		border-radius: 10px;
		text-align: center;
		color: white;
		margin-bottom: 20px;
		page-break-inside: avoid;
	}

	.container__card h1 {
		margin: 20px;
		color: red;
	}

	.container__card h3 {
		background: purple;
		color: white;
		margin: 20px;
	}



	.row {
		background-color: #34495e;
		margin-bottom: 25px;
	}

	.column {
		text-align: left;
		margin-left: 30px;
	}

	label {
		font-weight: bold;
		color: #fff;
	}

	p {
		margin: 5px 0;
		color: #fff;
	}

	.reparable {
		background-color: #34495e;
		margin-top: 20px;
	}

	.container__card__info p,
	.container__card__description p,
	.container__card__identification p,
	.reparable p {
		padding: 11px;
		border-radius: 5px;
	}
</style>


<div class="container">
	<div class="container__card">
		<h1>SAV</h1>

		<div class="container__card__info">
			<div class="row">
				<div class="column">
					<label>CP :</label>
					<p style="margin-left: 35px; margin-top: -30px;"><?= htmlspecialchars($cp); ?></p>
				</div>
				<div class="column">
					<label>Nom :</label>
					<p style="margin-left: 45px; margin-top: -30px;"><?= htmlspecialchars($nom); ?></p>
				</div>

				<div class="column">
					<label>Résidence :</label>
					<p style="margin-left: 90px; margin-top: -30px;"><?= htmlspecialchars($residence); ?></p>
				</div>

			</div>

			<div class="row">
				<div class="column">
					<label>INC :</label>
					<p style="margin-left: 45px; margin-top: -30px;"><?= htmlspecialchars($inc); ?></p>
				</div>
				<div class="column">
					<label>Code RG :</label>
					<p style="margin-left: 85px; margin-top: -30px;"><?= htmlspecialchars($Code_RG); ?></p>
				</div>
				<div class="column">
					<label>N° Mytem :</label>
					<p style="margin-left: 85px; margin-top: -30px;"><?= htmlspecialchars($mytem); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>Date Demande :</label>
					<p style="margin-left: 125px; margin-top: -30px;"><?= htmlspecialchars($dateDemande); ?></p>
				</div>
			</div>
		</div>

		<h3>Description de la demande</h3>
		<div class="container__card__description">
			<div class="row">
				<div class="column">
					<label>Type Demande :</label>
					<p style="margin-left: 127px; margin-top: -30px;"><?= htmlspecialchars($typeD); ?></p>
				</div>
				<div class="column">
					<label>Type de matériel :</label>
					<p style="margin-left: 135px; margin-top: -30px;"><?= htmlspecialchars($typeM); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>Panne :</label>
					<p style="margin-left: 55px; margin-top: -30px;"><?= htmlspecialchars($ifPanne); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>Observation :</label>
					<p style="margin-left: 105px; margin-top: -30px;"><?= htmlspecialchars($observation); ?></p>
				</div>
			</div>
		</div>

		<h3>Identification du matériel</h3>
		<div class="container__card__identification">
			<div class="row">
				<div class="column">
					<label>Icloud :</label>
					<p style="margin-left: 55px; margin-top: -30px;"><?= htmlspecialchars($icloud); ?></p>
				</div>
				<div class="column">
					<label>Code de déverrouillage :</label>
					<p style="margin-left: 185px; margin-top: -30px;"><?= htmlspecialchars($codeDev); ?></p>
				</div>
				<div class="column">
					<label>IMEI :</label>
					<p style="margin-left: 45px; margin-top: -30px;"><?= htmlspecialchars($imei); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>IMEI de remplacement :</label>
					<p style="margin-left: 180px; margin-top: -30px;"><?= htmlspecialchars($imei_r); ?></p>
				</div>
			</div>
		</div>

		<div class="reparable">
			<label>État de réparation :</label>
			<p><?= ($rep == 1) ? "Réparable" : "Rebus"; ?></p>
		</div>
	</div>
</div>