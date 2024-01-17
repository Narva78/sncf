<style>

</style>
<!-- Formulaire d'ajout d'un iPad -->
<form action="index.php?uc=historique&action=telecharger" method="post"></form>
<div class="container">
	<div class="container__card">
		<h1>SAV </h1>

		<div class="container__card__info">
			<!-- Cp de l'agent Obligatoire-->
			<?php foreach ($ipads as $ipad) : ?>

				<div>
					<label for="cp">CP :</label>
					<li><?= $ipad['cp_Agent'] ?></li>
				</div>

				<!-- Nom de l'agent Obligatoire-->
				<div>
					<label for="nom">Nom :</label>
					<li><?= $ipad['nom'] ?></li>
				</div>

				<div>
					<label for="residence">Résidence :</label>
					<li><?= $ipad['residence'] ?></li>
				</div>

				<div>
					<label for="INC">INC :</label>
					<li><?= $ipad['inc'] ?></li>
				</div>


				<!-- Affectation de l'Agent Obligatoire -->
				<div>
					<label for="codeRG">Code RG :</label>
					<li><?= $ipad['Code_RG'] ?></li>
				</div>

				<div>
					<label for="mytem">N° Mytem :</label>
					<li><?= $ipad['mytem'] ?></li>
				</div>

				<div>
					<label for="dateDemande">Date demande :</label>
					<li><?= $ipad['date_demande'] ?></li>
				</div>

		</div>
		<br>
		<h3>Description de la demande</h3>

		<div class="container__card__description">
			<div>
				<label for="typeDemande">Type Demande :</label>
				<li><?= $ipad['type_demande'] ?></li>
			</div>
			<div>
				<label for="typeMateriel">Type de matériel :</label>
				<li><?= $ipad['type_materiel'] ?></li>
			</div>
			<div style="display:none;" id="panne1">
				<label for="panne">Panne :</label>
				<li><?= $ipad['type_panne'] ?></li>
			</div>
		</div>
		<div>
			<textarea name="observation" id="observation" style="width:600px; height:100px; margin-top:30px; border:none; border-radius:5px" placeholder="observation"></textarea>
		</div>

		<h3>Identification du matériel</h3>

		<div class="container__card__identification">
			<!-- Checkbox si l'Ipad est tjr lié a un comte ICloud -->
			<div>
				<label for="icloud">
					Icloud
				</label>
				<div>
					<li><?= $ipad['Icloud'] ?></li>
				</div>
			</div>

			<!-- Checkbox si l'Ipad possède un code de Déverouillage -->
			<div>
				<div>
					<label for="code Deverouillage">
						code de dévérouillage
					</label>
					<li><?= $ipad['CodeDev'] ?></li>
				</div>
			</div>


			<div>
				<label for="imei">
					IMEI
				</label>
				<li><?= $ipad['imei'] ?></li>
			</div>
			<div>
				<label for="imei_remp">
					IMEI de remplacement
				</label>
				<input type="checkbox" id="imei">
				<li><?= $ipad['imei_remp'] ?></li>
			</div>
		</div>

		<br>
		<div class="reparable">
			<input type="radio" id="contactChoice1" name="rep" value="Réparable" required />
			<label for="contactChoice1">Réparable</label>

			<input type="radio" id="contactChoice2" name="rep" value="Rebus" required />
			<label for="contactChoice2">Rebus</label>
		</div>


	<?php endforeach;  ?>




	<div>
	</div>