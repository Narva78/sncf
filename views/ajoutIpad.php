<style>
	body {
		background-color: #273746;
	}

	.container {
		display: flex;
		flex-direction: column;
		height: 120vh;
		margin: 2.5em;
	}

	.container__card {
		width: 620px;
		height: 850px;
		border: 1px solid #404040;
		border-radius: 10px;
		background: #405a73;
		text-align: center;
		color: white;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
	}

	@media screen and (max-width: 620px) {

		.container__card {
			height: 900px;
		}
	}



	.container__card__info {
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
		gap: 20px;
	}

	@media screen and (max-width: 620px) {
		.container__card__info {
			display: block;

		}
	}

	.container__card__description {
		display: flex;
		justify-content: center;
		flex-direction: row;
		flex-wrap: wrap;
		gap: 10px;
	}

	h1 {
		margin: 20px;
		color: red;
	}

	h3 {
		background: purple;
		display: flex;
		justify-content: center;
		margin: 20px;

	}

	.container__card__identification {
		display: flex;
		justify-content: center;
		flex-direction: row;
		flex-wrap: wrap;
		gap: 10px;
	}



	input[type=submit] {
		height: 40px;
		width: 130px;
		background: #3498DB;
		color: #fff;
		border: none;
		font-size: 1rem;
		border-radius: 10px;
		margin: 5px;
		cursor: pointer;

	}

	input[type=submit]:hover {
		background: #215f91;
	}

	input[type=button] {
		height: 40px;
		width: 130px;
		background: red;
		color: #fff;
		border: none;
		font-size: 1rem;
		border-radius: 10px;
		margin: 5px;
		cursor: pointer;
	}

	input[type=button]:hover {
		background: #A00C00;
	}

	.bouton {
		margin: 10px;
	}

	input[type=date] {
		height: 30px;
		width: 160px;
		border-radius: 10px;
	}

	input[type=text],
	select {
		height: 30px;
		width: 160px;
		border-radius: 10px;
	}

	.container__card__description input[type=text] input[type=date] select {
		height: 30px;
		width: 200px;
		border-radius: 10px;
	}

	.container__card__identification input[type=text] {
		height: 30px;
		width: 140px;
		border-radius: 10px;
	}

	input {
		border: none;
	}

	input:focus {
		outline: none;
	}

	textarea:focus {
		outline: none;
	}



	label {
		display: block;
	}

	.reparable {
		display: flex;
		flex-direction: row;
		justify-content: center;
		gap: 20px;
	}
</style>

<title>Formulaire D'ajout D'Ipad</title>

<!-- Formulaire d'ajout d'un iPad -->
<div class="container">
	<div class="container__card">
		<h1>SAV </h1>
		<form action="index.php?uc=historique&action=ajouterIpad" method="POST">

			<div class="container__card__info">
				<!-- Cp de l'agent Obligatoire-->
				<div>
					<label for="cp">CP :</label>
					<input type="text" id="cp" name="cp" maxlength="11" placeholder="0000000T" required>
				</div>

				<!-- Nom de l'agent Obligatoire-->
				<div>
					<label for="nom">Nom :</label>
					<input type="text" id="nom" name="nom" placeholder="Doe" required>
				</div>

				<div>
					<label for="residence">Résidence :</label>
					<input type="text" id="residence" name="residence" readonly value="<?php echo $_SESSION['residence']; ?>">
				</div>

				<div>
					<label for="INC">INC :</label>
					<input type="text" id="inc" name="inc" placeholder="INC78956" required>
				</div>


				<!-- Affectation de l'Agent Obligatoire -->
				<div>
					<label for="codeRG">Code RG :</label>
					<select id="codeRG" name="codeRG" required>

						<option value="ETPNU">ETPNU</option> <!-- 0707 -->

						<option value="ETPLC">ETPLC</option> <!-- 64 682 -->

					</select>
				</div>
				<?php
				if (isset($_SESSION['id'])) {
					$userID = $pdo->getInfoUSerById($_SESSION['id']);
					$is_admin = $userID['is_admin'] == 1;
				}
				if ($is_admin) {
				?>
					<div>
						<label for="mytem">N° Mytem :</label>
						<input type="text" id="mytem" name="mytem" placeholder="TRACTION221123021" required>
					</div>
				<?php } ?>

				<div>
					<label for="dateDemande">Date demande :</label>
					<input type="date" name="dateDemande" required>
				</div>

			</div>
			<br>
			<h3>Description de la demande</h3>

			<div class="container__card__description">
				<div>
					<label for="typeDemande">Type Demande :</label>
					<select id="typeDemande" name="typeDemande" required>

						<option value="casse">Casse</option>

						<option value="panne">Panne</option>

						<option value="perte">Perte/Vol</option>

						<option value="retraite ou changement de fonction - Hors SAV xxx">Retraite ou Changement de Fonction</option>
						<option value="autre Hors SAV xxx">Autre</option>

					</select>
				</div>
				<div>
					<label for="typeMateriel">Type de matériel :</label>
					<select id="typeMateriel" name="typeMateriel" required>

						<option value="Ipad2020">Ipad 2020</option> <!-- 0707 -->

						<option value="Ipad2017">Ipad 2017</option> <!-- 64 682 -->

					</select>
				</div>
				<div style="display:none;" id="panne1">
					<label for="panne">Panne :</label>
					<select id="panne" name="panne">
						<option value="">Choisissez le Type :</option>
						<option value="casse ecran">Casse écran</option> <!-- 0707 -->

						<option value="oxydation">Oxydation</option> <!-- 64 682 -->
						<option value="casse vitre apparei photo">Casse Vitre appreil Photo</option>
						<option value="chassi abime">Chassi Abimé</option>
						<option value="connecteur Hs">Connecteur HS</option>
						<option value="connecteur jack Hs">Connecteur Jack Hs</option>
						<option value="bug logiciel">Bug Logiciel</option>
						<option value="sim non reconnue">SIM non Reconnue</option>
						<option value="panne reseau">Panne Réseau</option>
						<option value="probleme connexion wifi">Problème Connection WIFI</option>
						<option value="haut parleur HS">Haut Parleur HS</option>
						<option value="Micro HS">Micro HS</option>
						<option value="bouton Home HS">Bouton Home HS</option>
						<option value="bouton power hs">Bouton Power HS</option>
						<option value="Bouton volume HS">Bouton Volume HS</option>
						<option value="ne chare plus">Ne Charge Plus</option>
						<option value="ne s'allume plus">Ne S'allume Plus</option>
						<option value="autonomie faible">Autonomie Faible</option>
						<option value="Panne tactile">Panne Tactile</option>
						<option value="panne ecran">Panne Ecran</option>
					</select>
				</div>
			</div>
			<div>
				<textarea name="observation" id="observation" style="width:600px; height:100px; margin-top:30px; border:none; border-radius:5px" placeholder="observation" maxlength="100"></textarea>
			</div>

			<br>
			<h3>Identification du matériel</h3>

			<div class="container__card__identification">
				<!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
				<div>
					<label for="icloud">
						Icloud
					</label>
					<div>
						<input type="text" id="icloud" name="icloud">

					</div>
				</div>

				<!-- Checkbox si l'Ipad possède un code de Déverouillage -->
				<div>
					<div>
						<label for="code Deverouillage">
							code de dévérouillage
						</label>
						<input type="text" id="codeDev" name="codeDev">

					</div>
				</div>


				<div>
					<label for="imei">
						IMEI
					</label>
					<input type="text" name="imei_mat_defec" id="imei_mat_defec" maxlength="15" minlength="15">
				</div>
				<div>
					<label for="imei_remp">
						IMEI de remplacement
					</label>
					<input type="checkbox" id="imei">
					<input type="text" name="imei_remp" id="imei_remp" style="display:none;" maxlength="15" minlength="15">
				</div>
			</div>

			<br>
			<div class="reparable">
				<input type="radio" id="contactChoice1" name="rep" value="1" />
				<label for="contactChoice1">Réparable</label>

				<input type="radio" id="contactChoice2" name="rep" value="0" />
				<label for="contactChoice2">Rebus</label>
			</div>



			<div class="bouton">
				<input type="submit" name="ajouter" value="Ajouter">
				<a href="index.php?uc=historique"><input type="button" value="Retour"></a>
			</div>

		</form>

		<div>
		</div>
	</div>


	<script type="text/javascript">
		document.getElementById('typeDemande').addEventListener('change', function() {
			var deuxiemeListe = document.getElementById('panne1');

			// Afficher la deuxième liste si la sélection est égale à 'panne'
			if (this.value === 'panne') {
				deuxiemeListe.style.display = 'block';
			} else {
				deuxiemeListe.style.display = 'none';
			}

			// Rendre le champ "Panne" requis si "Panne" est sélectionné
			var panneSelect = document.getElementById('panne');
			if (this.value === 'panne') {
				panneSelect.required = true;
			} else {
				panneSelect.required = false;
			}
		});

		document.getElementById('imei').addEventListener('change', function() {
			var listeDeroulante = document.getElementById('imei_remp');

			// Afficher la liste déroulante si la case à cocher est cochée
			if (this.checked) {
				listeDeroulante.style.display = 'block';
			} else {
				listeDeroulante.style.display = 'none';
			}
		});
	</script>