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
		color: white;
		margin-bottom: 20px;
		page-break-inside: avoid;
	}

	h1 {
		margin: 20px;
		margin-left: 100px;
		color: black;
		margin-top: -35px;

	}

	.container__card__margin {
		border-bottom: 2px solid black;

	}

	.container__card h3 {
		background: #5e60ce;
		color: white;
		text-align: center;
		padding: 10px;
	}

	.row label {
		font-size: 0.8em;

	}

	.row {
		margin-bottom: 25px;
	}

	.row__info p {
		font-size: 0.8em;
	}

	.column {
		text-align: left;
	}

	label {
		font-weight: bold;
		color: black;
		padding-left: -30px;
		font-size: 0.8em;

	}

	p {
		margin: 5px 0;
		color: black;
	}

	.left p {
		color: black;
	}

	.left {
		border: solid black 2px;
		border-left: none;
		width: 45%;
		height: 200px;
		text-align: center;
		justify-content: space-around;
	}



	.reparable {
		background-color: #34495e;
		margin-top: 20px;
	}

	.container__card__info {
		margin-top: 25px;
	}



	.container__card__info p,
	.container__card__description p,
	.container__card__identification p,
	.reparable p {
		padding: 8px;
	}

	.container__card__tele p {
		color: red;
		text-align: right;
		margin-right: 80px;
	}
</style>


<div class="container">
	<div class="container__card">
		<div class="container__card__margin">
			<div class="container__card__tele">
				<p style="color: red; font-size: 0.8em;">S.A.V -ADC/TRACTION</p>
				<p style="color: black; margin-top:20px;">FICHE D'INTERVENTION</p>
			</div>
			<strong>
				<h1>TC-SNCF</h1>
			</strong>
		</div>
		<div class="container__card__info">
			<p style="font-size:1em; color: red; text-align: center; margin-top: -10px;">si appareil irréparable, merci de renvoyer le matériel</p>
			<div class="left" style="color: black;">
				<strong>
					<p style="padding-top: 25px;">TERMINAL à RETOURNER à :</p>
				</strong>
				<p>TOUCHSTONE COMMUNICATION <br> SAV SNCF <br> 65 rue Astride Briand <br> 92300 LEVALLOIS-PERRET</p>
			</div>
			<div class="row__info" style="margin-left: 355px; margin-top:-200px;">
				<label>Etablissement :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;">ETP NU</p>


				<label>Gestionnaire :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;"> Schattel Jérome</p>

				<label>Adresse :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;">7/9 rue du Corentin</p>

				<label>Code Postal :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;">75015 </p>

				<label>Tel(ligne externe) :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;">01.42.84.07.42</p>

				<label>Email :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;">jerome.schattel@sncf.fr</p>
				<br>
				<label>CP :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;"><?= htmlspecialchars($cp); ?></p>

				<label>Nom :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;"><?= htmlspecialchars($nom); ?></p>

				<label>Résidence :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;"><?= htmlspecialchars($residence); ?></p>



				<label>INC :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;"><?= htmlspecialchars($inc); ?></p>

				<label>Code RG :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;"><?= htmlspecialchars($Code_RG); ?></p>

				<label>N° Mytem :</label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;"><?= htmlspecialchars($mytem); ?></p>



				<label>Date Demande : </label>
				<p style="margin-left: 145px; margin-top: -30px; border: solid black 2px; padding: 3px; background-color :#CFDBD5;"><?= htmlspecialchars($dateDemande); ?></p>

			</div>
		</div>
		<h3 style="margin-top: 10px;">1-Description de la demande*</h3><br>
		<div class="container__card__description">
			<div class="row" style="margin-top: -15px;">
				<div class="column">
					<label>Type Demande :</label>
					<p style="margin-left: 205px; margin-top: -20px; text-align: center; border: solid black 2px; padding: 3px; background-color :#CFDBD5;  margin-right: 50px; font-size: 0.8em;"><?= htmlspecialchars($typeD); ?></p>
				</div>

				<div class="column" style="margin-top: 30px;">
					<label>Type de matériel :</label>
					<p style="margin-left: 205px; margin-top: -20px; text-align: center; border: solid black 2px; padding: 3px; background-color :#CFDBD5;  margin-right: 50px; font-size: 0.8em;"><?= htmlspecialchars($typeM); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label> Si Panne, casse précisez :</label>
					<p style="margin-left: 205px; margin-top: -20px; text-align: center; border: solid black 2px; padding: 3px; background-color :#CFDBD5;  margin-right: 50px; font-size: 0.8em;"><?= htmlspecialchars($ifPanne); ?></p>
				</div>
			</div>

			<div class="row">
				<div class="column">
					<label>Observation :</label>
					<p style="margin-left: 305px; margin-top: -30px; border: solid black 2px; padding: 10px; background-color :#CFDBD5;  margin-right: 50px; font-size: 0.8em;"><?= htmlspecialchars($observation); ?></p>
				</div>
			</div>
		</div>

		<h3>2-Identification du matériel*</h3><br>
		<div class="container__card__identification">
			<div class="row" style="margin-top: -15px;">
				<div class="column">
					<label>Icloud :</label>
					<p style="margin-left: 235px; margin-top: -30px;   border: solid black 2px; padding: 3px; background-color :#CFDBD5;  margin-right: 250px; font-size: 0.8em;"><?= htmlspecialchars($icloud); ?></p>
				</div>
				<br>
				<div class="column">
					<label>Code de déverrouillage :</label>
					<p style="margin-left: 235px; margin-top: -30px;  border: solid black 2px; padding: 3px; background-color :#CFDBD5;  margin-right: 250px; font-size: 0.8em;"><?= htmlspecialchars($codeDev); ?></p>
				</div>
				<br>
				<div class="column">
					<label>IMEI :</label>
					<p style="margin-left: 235px; margin-top: -30px;  border: solid black 2px; padding: 3px; background-color :#CFDBD5;  margin-right: 250px; font-size: 0.8em;"><?= htmlspecialchars($imei); ?></p>
				</div>
			</div>

			<div class="column">
				<label>IMEI de remplacement :</label>
				<p style="margin-left: 235px; margin-top: -30px;  border: solid black 2px; padding: 3px; background-color :#CFDBD5;  margin-right: 250px; font-size: 0.8em;"><?= htmlspecialchars($imei_r); ?></p>
			</div>
		</div>

		<p style="color: red; font-size: 0.8em; text-align:center; "><u>Les chanmps(*) doivent être obligatoirement renseignés, sans quoi le matériel ne sera pas traité par le SAV </u></p>


	</div>
</div>