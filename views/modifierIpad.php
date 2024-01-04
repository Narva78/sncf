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


<title>Formulaire de Modification d'Ipad</title>

<div class="container">
	<div class="container__card">
		<h1>SAV </h1>
		<form action="index.php?uc=historique&action=ajouterIpad" method="POST">

			<div class="container__card__info">
				<!-- Cp de l'agent Obligatoire-->
				<div>
					<label for="cp">CP :</label>
					<input type="text" id="cp" name="cp" maxlength="11" placeholder="0000000T" required value="<?php echo $cp; ?>">
				</div>

				<!-- Nom de l'agent Obligatoire-->
				<div>
					<label for="nom">Nom :</label>
					<input type="text" id="nom" name="nom" placeholder="Doe" required value="<?php echo $nom; ?>">
				</div>

				<div>
					<label for="INC">INC :</label>
					<input type="text" id="inc" name="inc" placeholder="INC78956" required value="<?php echo $inc; ?>">
				</div>


				<!-- Affectation de l'Agent Obligatoire -->
				<div>
					<label for="codeRG">Code RG :</label>
					<select id="codeRG" name="codeRG" required>

						<option value="ETPNU" <?php if ($Code_RG == 'ETPNU') echo ' selected'; ?>>ETPNU</option> <!-- 0707 -->

						<option value="ETPLC" <?php if ($Code_RG == 'ETPLC') echo ' selected'; ?>>ETPLC</option> <!-- 64 682 -->

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
						<input type="text" id="mytem" name="mytem" placeholder="TRACTION221123021" required value="<?php echo $mytem; ?>">
					</div>
				<?php } ?>

				<div>
					<label for="dateDemande">Date demande :</label>
					<input type="date" name="dateDemande" required value="<?php echo $dateDemande; ?>">
				</div>

			</div>

			<div class="container__card__description">
				<div>
					<label for="typeDemande">Type Demande :</label>
					<select id="typeDemande" name="typeDemande" required>

						<option value="panne" <?php if ($typeD == 'panne') echo ' selected'; ?>>Panne</option>

						<option value="casse" <?php if ($typeD == 'casse') echo ' selected'; ?>>Casse</option>

						<option value="perte" <?php if ($typeD == 'perte') echo ' selected'; ?>>Perte</option>

						<option value="retraite ou changement de fonction - Hors SAV xxx" <?php if ($typeD == 'retraite ou changement de fonction - Hors SAV xxx') echo ' selected'; ?>>Retraite ou Changement de Fonction</option>

						<option value="autre Hors SAV xxx" <?php if ($typeD == 'autre Hors SAV xxx') echo ' selected'; ?>>Autre</option>

					</select>
				</div>
				<div>
					<label for="typeMateriel">Type de matériel :</label>
					<select id="typeMateriel" name="typeMateriel" required>

						<option value="Ipad2020" <?php if ($typeM == 'Ipad2020') echo ' selected'; ?>>Ipad 2020</option> <!-- 0707 -->

						<option value="Ipad2017" <?php if ($typeM == 'Ipad2017') echo ' selected'; ?>>Ipad 2017</option> <!-- 64 682 -->

					</select>
				</div>
				<div>
					<label for="panne">Panne :</label>
					<select id="panne" name="panne" required>

						<option value="casse ecran" <?php if ($ifPanne == 'casse ecran') echo ' selected'; ?>>Casse écran</option> <!-- 0707 -->

						<option value="oxydation" <?php if ($ifPanne == 'oxydation') echo ' selected'; ?>>Oxydation</option> <!-- 64 682 -->
						<option value="casse vitre apparei photo" <?php if ($ifPanne == 'casse vitre apparei photo') echo ' selected'; ?>>Casse Vitre appreil Photo</option>
						<option value="chassi abime" <?php if ($ifPanne == 'chassi abime') echo ' selected'; ?>>Chassi Abimé</option>
						<option value="connecteur Hs" <?php if ($ifPanne == 'connecteur Hs') echo ' selected'; ?>>Connecteur HS</option>
						<option value="connecteur jack Hs" <?php if ($ifPanne == 'connecteur jack Hs') echo ' selected'; ?>>Connecteur Jack Hs</option>
						<option value="bug logiciel" <?php if ($ifPanne == 'bug logiciel') echo ' selected'; ?>>Bug Logiciel</option>
						<option value="sim non reconnue" <?php if ($ifPanne == 'sim non reconnue') echo ' selected'; ?>>SIM non Reconnue</option>
						<option value="panne reseau" <?php if ($ifPanne == 'panne reseau') echo ' selected'; ?>>Panne Réseau</option>
						<option value="probleme connexion wifi" <?php if ($ifPanne == 'probleme connexion wifi') echo ' selected'; ?>>Problème Connection WIFI</option>
						<option value="haut parleur HS" <?php if ($ifPanne == 'haut parleur HS') echo ' selected'; ?>>Haut Parleur HS</option>
						<option value="Micro HS" <?php if ($ifPanne == 'Micro HS') echo ' selected'; ?>>Micro HS</option>
						<option value="bouton Home HS" <?php if ($ifPanne == 'bouton Home HS') echo ' selected'; ?>>Bouton Home HS</option>
						<option value="bouton power hs" <?php if ($ifPanne == 'bouton power hs') echo ' selected'; ?>>Bouton Power HS</option>
						<option value="Bouton volume HS" <?php if ($ifPanne == 'Bouton volume HS') echo ' selected'; ?>>Bouton Volume HS</option>
						<option value="ne chare plus" <?php if ($ifPanne == 'ne chare plus') echo ' selected'; ?>>Ne Charge Plus</option>
						<option value="ne s'allume plus" <?php if ($ifPanne == "ne s'allume plus") echo ' selected'; ?>>Ne S'allume Plus</option>
						<option value="autonomie faible" <?php if ($ifPanne == 'autonomie faible') echo ' selected'; ?>>Autonomie Faible</option>
						<option value="Panne tactile" <?php if ($ifPanne == 'Panne tactile') echo ' selected'; ?>>Panne Tactile</option>
						<option value="panne ecran" <?php if ($ifPanne == 'panne ecran') echo ' selected'; ?>>Panne Ecran</option>

					</select>
				</div>

				<div>
					<input type="text" name="observation" id="observation" value="<?php echo $observation; ?>">
				</div>
			</div>


			<div class="container__card__identification">
				<!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
				<div>
					<div>
						<input type="checkbox" id="icloud" name="icloud" <?php if ($icloud == 1) echo 'checked'; ?>>
						<label for="icloud">
							Cochez si l'iPad est lié à un compte iCloud
						</label>
					</div>
				</div>

				<!-- Checkbox si l'Ipad possède un code de Déverouillage -->
				<div>
					<div>
						<input type="checkbox" id="codeDev" name="codeDev" <?php if ($codeDev == 1) echo 'checked'; ?>>
						<label for="codeDev">
							Cochez si l'iPad possède un code de dévérouillage
						</label>
					</div>
				</div>
			</div>
			<div>
				<input type="submit" name="modifier" value="Modifier">
				<a href="index.php?uc=historique"><input type="button" value="Retour"></a>
			</div>
		</form>
	</div>
</div>