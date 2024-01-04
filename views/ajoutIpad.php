<style>
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



	.container__card__info {
		display: flex;
		justify-content: center;
		flex-direction: column;
		gap: 10px;
	}

	.container__card__description {
		display: flex;
		justify-content: center;
		flex-direction: column;
		gap: 10px;
	}

	.container__card__description h3 {
		background: purple;
	}

	.container__card__identification {
		display: flex;
		justify-content: center;
		flex-direction: column;
		gap: 10px;
	}

	.container__card__identification h3 {
		background: purple;
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
	}

	.bouton {
		margin: 30px;
	}

	input[type=text],
	input[type=date],
	select {
		height: 30px;
		width: 300px;
		border-radius: 10px;
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
			<div class="container__card__description">
				<h3>Description de la demande</h3>
				<div>
					<label for="typeDemande">Type Demande :</label>
					<select id="typeDemande" name="typeDemande" required>

						<option value="panne">Panne</option>

						<option value="casse">Casse</option>

						<option value="perte">Perte</option>

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
				<div>
					<label for="panne">Panne :</label>
					<select id="panne" name="panne" required>

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

				<div>
					<input type="text" name="observation" id="observation">
				</div>
			</div>
			<br>

			<div class="container__card__identification">
				<!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
				<h3>Identification du matériel</h3>
				<div>
					<div class="form-check">
						<input type="text" id="icloud" name="icloud">
						<label for="icloud">
							Icloud
						</label>
					</div>
				</div>

				<!-- Checkbox si l'Ipad possède un code de Déverouillage -->
				<div>
					<div>
						<input type="text" id="codeDev" name="codeDev">
						<label for="code Deverouillage">
							code de dévérouillage
						</label>
					</div>
				</div>
			</div>

			<div>
				<input type="text" name="imei_mat_defec" id="imei_mat_defec">
			</div>
			<div>
				<input type="checkbox" id="imei">
				<input type="text" name="imei_remp" id="imei_remp">
			</div>


			<div class="bouton">
				<input type="submit" name="ajouter" value="Ajouter">
				<a href="index.php?uc=historique"><input type="button" value="Retour"></a>
			</div>

		</form>

		<div>
		</div>
	</div>