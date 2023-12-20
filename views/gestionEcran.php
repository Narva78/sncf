<title>Informations iPad</title>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
	.reunion {

		display: flex;
		justify-content: center;
		flex-direction: column;
	}

	.search {
		display: flex;
		justify-content: center;
		gap: 20px;

	}

	h1 {
		text-align: center;
		padding: 90px;
		color: #FFF;
		font-size: 3rem;
	}

	.checkbox ul {
		display: flex;
		justify-content: center;
		align-items: center;
		gap: 20px;
		list-style: none;
		margin: 30px;
		border: 1px solid #fff;
		background: #FFF;
		border-radius: 10px;
		box-sizing: border-box;
	}

	.checkbox ul li {
		border-right: solid 1px black;
	}

	p {
		border-right: solid 1px black;
		text-align: center;
	}

	.checkbox input {
		border-right: solid 1px black;
		text-align: center;
		margin-top: 12px;
	}

	.search__btn__plus input {
		background: green;
		color: #fff;
	}

	.search__btn__moins input {
		background: red;
		color: #fff;
	}

	.search__btn__Reportable input {
		background: #76448A;
		color: #fff;
	}

	.search__btn__Code__Dev input {
		background: #405A73;
		color: #fff;
	}

	.search__btn__icloud input {
		background: #3389C2;
		color: #fff;
	}


	input {
		padding: 10px;
		border-radius: 10px;
		font-size: 1em;
	}
</style>


<h1>Historique Ecran</h1>
<div class="reunion">
	<div class="search">


		<div class="search__btn__icloud">
			<input type="button" value="Marque">
		</div>
		<div class="search__btn__Code__Dev">
			<input type="button" value="Types">
		</div>
		<div class="search__btn__Reportable">
			<input type="button" value="Quantite">
		</div>
		<div class="search__btn__moins">
			<input type="button" value="-">
		</div>
		<div class="search__btn__plus">
			<input type="button" value="+">
		</div>

	</div>

	<section class="checkbox">
		<ul>
			<li>
				<input type="checkbox" id="check-all">
			</li>

			<li>
				<p style="border-left:1px solid black;">Taille</p>
			</li>
			<li>
				<p> Marque</p>
			</li>
			<li>
				<p>Types</p>
			</li>
			<li>
				<p style="border-right:none;">Quantite</p>
			</li>
		</ul>

		<?php
		if (!isset($lesEcrans) || empty($lesEcrans))
			// Définissez $lesEcrans ou gérez le cas où il n'est pas défini ou vide
			$lesEcrans = [];

		foreach ($lesEcrans as $ecran) : ?>
			<div>
				<ul>
					<li><input type="checkbox" class="check-ipad" name="idsEcran[]" value="<?= $ecran['id_ecran'] ?>"></li>
					<li><?= $ecran['taille'] ?></li>
					<li><?= $ecran['marque'] ?></li>
					<li><?= $ecran['types'] ?></li>
					<li><?= $ecran['quantite'] ?></li>
				</ul>
			</div>
		<?php endforeach; ?>



	</section>
</div>


<script>
	// Cocher/décocher toutes les checkbox, JS vanilla
	const checkAll = document.querySelector('#check-all');
	const checkIpad = document.querySelectorAll('.check-ipad');
	checkAll.addEventListener('click', () => {
		checkIpad.forEach(check => check.checked = checkAll.checked);
	});
</script>