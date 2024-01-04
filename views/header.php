<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
		font-family: "poppins", sans-serif;
	}

	header {
		background: #405a73;
	}

	.menu__list {
		display: flex;
		justify-content: space-around;
		padding: 30px;
		list-style: none;
	}

	.menu__item:hover {
		background: #273746;
		border-radius: 10px;
	}

	.menu__deco a {
		color: red;
		transition: color 0.3s ease;
	}

	.menu__deco a:hover {
		color: white;
	}

	.menu__item {
		position: relative;
		margin-right: 20px;
		font-size: 1.5em;
	}

	.menu__link {
		text-decoration: none;
		color: white;
		padding: 10px;
		display: block;
	}

	.menu__sublist {
		display: none;
		position: absolute;
		left: 0;
		right: 0;
		list-style: none;
		background: #405a73;
		border: 1px solid #273746;
		border-radius: 5px;
		padding: 10px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
		z-index: 100;
	}

	.menu__sublist li {
		margin-bottom: 5px;
	}

	.menu__sublist li:last-child {
		margin-bottom: 0;
	}

	.menu__sublist a {
		display: block;

		color: #fff;
		padding: 5px;
		text-align: left;
	}

	.menu__sublist a:hover {
		background-color: #273746;
	}

	.menu__item:hover .menu__sublist {
		display: block;
	}

	@media screen and (max-width: 768px) {
		.menu__list {
			display: flex;
			justify-content: center;
			flex-direction: column;
			padding: 10px;
		}

		.menu__item {
			font-size: 1em;
			margin-bottom: 10px;
		}
	}
</style>
<?php
if (isset($_SESSION['id'])) {
	$userID = $pdo->getInfoUSerById($_SESSION['id']);
	$is_admin = $userID['is_admin'] == 1;
}
?>

<header>
	<?php
	if ($is_admin) {
	?>
		<nav>
			<div class="menu">
				<ul class="menu__list">
					<li class="menu__item">
						<a class="menu__link" href="index.php?uc=historique">Historique</a>
						<ul class="menu__sublist">
							<li><a class="menu__link" href="index.php?uc=gestionEcran">Ecran</a></li>
							<li><a class="menu__link" href="index.php?uc=historique">Ipad</a></li>
							<li><a class="menu__link" href="index.php?uc=gestionPC">PC</a></li>
						</ul>
					</li>
					<li class="menu__item"><a class="menu__link" href="index.php?uc=stat">Statistiques</a></li>
					<li class="menu__item"><a class="menu__link" href="views/exportation.php">Exportation</a></li>
					<li class="menu__item menu__deco"><a class="menu__link" href="index.php?uc=deconnexion">Se déconnecter</a></li>
				</ul>
			</div>
		</nav>
	<?php } else { ?>
		<a class="menu__link" href="index.php?uc=deconnexion">Se déconnecter</a>
	<?php } ?>
</header>