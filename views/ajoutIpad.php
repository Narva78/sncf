<style>
	.container {
		display: flex;
		flex-direction: column;
		height: 80vh;
		margin: 2.5em;
	}

	.container__card {
		width: 520px;
		height: 650px;
		border: 1px solid #404040;
		border-radius: 10px;
		background: #405a73;
		text-align: center;
		color: white;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
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

			<div class="container__card__description">
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


			<div class="container__card__identification">
				<!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="icloud" name="icloud">
						<label class="form-check-label" for="icloud">
							Cochez si l'iPad est lié à un compte iCloud
						</label>
					</div>
				</div>

				<!-- Checkbox si l'Ipad possède un code de Déverouillage -->
				<div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="codeDev" name="codeDev">
						<label class="form-check-label" for="codeDev">
							Cochez si l'iPad possède un code de dévérouillage
						</label>
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
		</form>
	</div>
</div>