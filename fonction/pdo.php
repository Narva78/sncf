<?php

// class PDO
// host = localhost
// dbname = ipad
// user = root
// password = secret

class PdoIpad
{

	private static $serveur = 'mysql:host=localhost';
	private static $bdd = 'dbname=ipad';
	private static $user = 'root';
	private static $mdp = '';
	private static $monPdo;
	private static $monPdoIpad = null;


	// Constructeur privé, crée l'instance de PDO qui sera sollicitée
	// pour toutes les méthodes de la classe

	private function __construct()
	{
		PdoIpad::$monPdo = new PDO(PdoIpad::$serveur . ';' . PdoIpad::$bdd, PdoIpad::$user, PdoIpad::$mdp);
		PdoIpad::$monPdo->query("SET CHARACTER SET utf8");
	}

	public function _destruct()
	{
		PdoIpad::$monPdo = null;
	}


	// Fonction statique qui crée l'unique instance de la classe
	public static function getPdoIpad()
	{
		if (PdoIpad::$monPdoIpad == null) {
			PdoIpad::$monPdoIpad = new PdoIpad();
		}
		return PdoIpad::$monPdoIpad;
	}

	//Fonction qui vérifie le login et mdp de l'utilisateur qui veut se connecter
	public function getInfosUser($login, $mdp)
	{
		$req = "SELECT * FROM user WHERE login = '$login' AND mdp = '$mdp'";
		$res = PdoIpad::$monPdo->query($req);
		$user = $res->fetch();
		return $user;
	}

	//Fonction qui récupère les données utilisateur en fonction de l'id
	public function getInfoUSerById($id)
	{
		$req = "SELECT * FROM user
        WHERE id = '$id'";
		$res = PdoIpad::$monPdo->query($req);
		$laLigne = $res->fetch();
		return $laLigne;
	}

	//Fonction qui modifie le login et mdp
	public function updateLogMdp($login, $mdp, $id)
	{
		$req = "UPDATE user 
        SET login = ?, mdp = ?
        WHERE id = ?";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute([$login, $mdp, $id]);
	}

	//Fonction qui récupère toutes les infos de la table Ipad
	public function getAllIpad()
	{
		$req = "SELECT * FROM ipad";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}
	public function getAllEcran()
	{
		$req = "SELECT * FROM ecran";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	public function getAllPC()
	{
		$req = "SELECT * FROM pc";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}


	//Fonction qui permet de récupérer tous les CP de la table Ipad
	public function getAllCp()
	{
		$req = "SELECT DISTINCT cp_Agent FROM ipad";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	public function getAlltaille()
	{
		$req = "SELECT DISTINCT taille FROM ecran";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	public function getSerie()
	{
		$req = "SELECT DISTINCT nSerie FROM pc";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	// Fonction qui permet de récupérer les informations de la Table ipad en fonction du code postal et du nom de l'utilisateur
	public function findIpadByUser($cp)
	{
		$req = "SELECT * FROM ipad WHERE cp_Agent LIKE :cp";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute(array(':cp' => $cp . '%'));
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}


	//fonction qui permet de récupérer les informations de la Table ipad en fonction de la premiere ligne et du nombre de ligne par page
	public function getInfosIpad()
	{
		$req = "SELECT * FROM ipad ORDER BY date_Attribution DESC";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	public function getInfosEcran()
	{
		$req = "SELECT * FROM ecran ORDER BY marque ASC";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	public function getInfosPC()
	{
		$req = "SELECT * FROM pc ORDER BY nSerie ASC";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	// Fonction getInfosIpadById($id) qui permet de récupérer les informations de la Table ipad en fonction de l'id
	public function getInfosIpadById($id)
	{
		$req = "SELECT * FROM ipad WHERE id_ipad = '$id'";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	public function getInfosEcranById($id)
	{
		$req = "SELECT * FROM ecran WHERE id_ecran = '$id'";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	public function getInfosPCById($id)
	{
		$req = "SELECT * FROM pc WHERE id_pc = '$id'";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}



	//Fonction qui permet de savoir le nombre total d'ipad dans la table ipad

	public function getNbIpad()
	{
		$req = "SELECT COUNT(*) FROM ipad";
		$res = PdoIpad::$monPdo->query($req);
		$nb = $res->fetchColumn();
		return $nb;
	}


	//Fonction qui permet de supprimer un ipad de la table ipad en fonction de son id
	public function supprimerIpad($id)
	{
		$req = "DELETE FROM ipad WHERE id_ipad = ?";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute([$id]);
	}

	public function supprimerEcran($id)
	{
		$req = "DELETE FROM ecran WHERE id_ecran = ?";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute([$id]);
	}

	public function supprimerPC($id)
	{
		$req = "DELETE FROM pc WHERE id_pc = ?";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute([$id]);
	}

	//Fonction qui permet d'ajouter un ipad dans la table ipad en fonction des paramètres
	public function ajouterIpad($cp, $nom, $prenom, $affectation, $icloud, $codeDev, $dateReception, $dateAttribution, $debutRep, $finRep, $nonReparable)
	{
		$req = "INSERT INTO ipad (cp_Agent, nom, prenom, affectation, Icloud, CodeDev, date_Reception, date_Attribution, debut_Rep, fin_Rep, non_reparable) 
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute([$cp, $nom, $prenom, $affectation, $icloud, $codeDev, $dateReception, $dateAttribution, $debutRep, $finRep, $nonReparable]);
		$nombreLignesAffectees = $stmt->rowCount();
		if ($nombreLignesAffectees > 0) {
			echo "L'insertion a été effectuée avec succès.";
		} else {
			echo "Échec de l'insertion.";
		}
	}

	public function ajouterEcran($taille, $marque, $types, $quantite)
	{
		$req = "INSERT INTO ecran (taille, marque, types, quantite) VALUES (:taille, :marque, :types, :quantite)";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->bindParam(':taille', $taille);
		$stmt->bindParam(':marque', $marque);
		$stmt->bindParam(':types', $types);
		$stmt->bindParam(':quantite', $quantite);
		$stmt->execute();

		$nombreLignesAffectees = $stmt->rowCount();
		if ($nombreLignesAffectees > 0) {
			echo "L'insertion a été effectuée avec succès.";
		} else {
			echo "Échec de l'insertion.";
		}
	}

	public function ajouterPC($nSerie, $marque, $modele, $quantite)
	{
		$req = "INSERT INTO pc (nSerie, marque, modele, quantite) VALUES (:nSerie, :marque, :modele, :quantite)";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->bindParam(':nSerie', $nSerie);
		$stmt->bindParam(':marque', $marque);
		$stmt->bindParam(':modele', $modele);
		$stmt->bindParam(':quantite', $quantite);
		$stmt->execute();

		$nombreLignesAffectees = $stmt->rowCount();
		if ($nombreLignesAffectees > 0) {
			echo "L'insertion a été effectuée avec succès.";
		} else {
			echo "Échec de l'insertion.";
		}
	}

	//Fonction qui permet de modifier un ipad dans la table ipad en fonction des paramètres
	//modifierIpad($cp, $affectation, $icloud, $codeDev, $dateReception, $dateAttribution, $debutRep, $finRep, $nonReparable)
	public function modifierIpad($cp, $nom, $prenom, $affectation, $icloud, $codeDev, $dateReception, $dateAttribution, $debutRep, $finRep, $nonReparable, $id)
	{
		$req = "UPDATE ipad SET cp_Agent = ?, nom = ?, prenom = ?,affectation = ?, Icloud = ?, CodeDev = ?, date_Reception = ?, date_Attribution = ?, debut_Rep = ?, fin_Rep = ?, non_reparable = ? 
        WHERE id_ipad = ?";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute([$cp, $nom, $prenom, $affectation, $icloud, $codeDev, $dateReception, $dateAttribution, $debutRep, $finRep, $nonReparable, $id]);
	}


	public function modifierEcran($id_ecran, $taille, $marque, $types, $quantite)
	{
		$req = "UPDATE ecran SET taille = ?, marque = ?, types = ?, quantite = ? WHERE id_ecran = ?";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute([$taille, $marque, $types, $quantite, $id_ecran]);
	}

	public function modifierPC($id_pc, $nSerie, $marque, $modele, $quantite)
	{
		$req = "UPDATE pc SET nSerie = ?, marque = ?, modele = ?, quantite = ? WHERE id_pc = ?";
		$stmt = PdoIpad::$monPdo->prepare($req);
		$stmt->execute([$nSerie, $marque, $modele, $quantite, $id_pc]);
	}



	// Fonction qui permet de récupérer les informations de la Table ipad en fonction du cp de l'agent
	public function getInfosIpadBySearch($cp)
	{
		$req = "SELECT * FROM ipad WHERE cp_Agent = '$cp'";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}


	//FONCTIONS POUR LES STATISTIQUES

	//CELLES POUR TEMPS MOYEN DE REPARATION

	//Fonction qui récupère la différence entre la début et la fin de reparation en jours All Time
	public function getDureeRepAllTime()
	{
		$req = "SELECT TIMESTAMPDIFF(DAY , debut_Rep, fin_Rep) FROM ipad
        WHERE debut_Rep != '0000-00-00' AND fin_Rep != '0000-00-00'";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui récupère la différence entre le début et la fin de reparation en jours sur 3 mois en fonction du mois courant
	public function getDureeRepLast3Months()
	{
		$req = "SELECT TIMESTAMPDIFF(DAY , debut_Rep, fin_Rep) FROM ipad 
        WHERE debut_Rep != '0000-00-00' AND fin_Rep != '0000-00-00'
        AND fin_Rep >= DATE_SUB(NOW(), INTERVAL 3 MONTH)";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui récupère la différence entre le début et la fin de reparation en jours sur 6 mois en fonction du mois courant
	public function getDureeRepLast6Months()
	{
		$req = "SELECT TIMESTAMPDIFF(DAY , debut_Rep, fin_Rep) FROM ipad 
        WHERE debut_Rep != '0000-00-00' AND fin_Rep != '0000-00-00' 
        AND fin_Rep >= DATE_SUB(NOW(), INTERVAL 6 MONTH)";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui récupère la différence entre le début et la fin de reparation en jours sur 1 an en fonction du mois courant
	public function getDureeRepLast12Months()
	{
		$req = "SELECT TIMESTAMPDIFF(DAY , debut_Rep, fin_Rep) FROM ipad
         WHERE debut_Rep != '0000-00-00' AND fin_Rep != '0000-00-00'
         AND fin_Rep >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}


	//CELLES POUR TEMPS MOYEN D'ATTRIBUTION

	//Fonction qui permet de récupère la différence entre la date de reception et la date d'attribution en jours All Time
	public function getDureeAttributionAllTime()
	{
		$req = "SELECT TIMESTAMPDIFF(DAY , date_Reception, date_Attribution) FROM ipad WHERE date_Attribution != '0000-00-00'";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui permet de récupère la différence entre la date de reception et la date d'attribution en jours sur 3 mois en fonction du mois courant
	public function getDureeAttributionLast3Months()
	{
		$req = "SELECT TIMESTAMPDIFF(DAY , date_Reception, date_Attribution) FROM ipad 
        WHERE date_Attribution != '0000-00-00'
        AND date_Attribution >= DATE_SUB(NOW(), INTERVAL 3 MONTH)";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui permet de récupère la différence entre la date de reception et la date d'attribution en jours sur 6 mois en fonction du mois courant
	public function getDureeAttributionLast6Months()
	{
		$req = "SELECT TIMESTAMPDIFF(DAY , date_Reception, date_Attribution) FROM ipad 
        WHERE date_Attribution != '0000-00-00'
        AND date_Attribution >= DATE_SUB(NOW(), INTERVAL 6 MONTH)";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui permet de récupère la différence entre la date de reception et la date d'attribution en jours sur 1 an en fonction du mois courant
	public function getDureeAttributionLast12Months()
	{
		$req = "SELECT TIMESTAMPDIFF(DAY , date_Reception, date_Attribution) FROM ipad 
        WHERE date_Attribution != '0000-00-00' 
        AND date_Attribution >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}


	//CELLES POUR NOMBRE D'ATTRIBUTION D'IPAD PAR AFFECTATION 

	//Fonction qui permet de récupérer le nombre d'ipad attribué par affectation All Time
	public function getNbAttributionByAffectationAllTime()
	{
		$req = "SELECT affectation, COUNT(*) FROM ipad 
        WHERE date_Attribution != '0000-00-00'
        GROUP BY affectation";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui permet de récupérer le nombre d'ipad attribué par affectation sur 3 mois en fonction du mois courant
	public function getNbAttributionByAffectationLast3Months()
	{
		$req = "SELECT affectation, COUNT(*) FROM ipad 
        WHERE date_Attribution != '0000-00-00' 
        AND date_Attribution >= DATE_SUB(NOW(), INTERVAL 3 MONTH) 
        GROUP BY affectation";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui permet de récupérer le nombre d'ipad attribué par affectation sur 6 mois en fonction du mois courant
	public function getNbAttributionByAffectationLast6Months()
	{
		$req = "SELECT affectation, COUNT(*) FROM ipad 
        WHERE date_Attribution != '0000-00-00'
        AND date_Attribution >= DATE_SUB(NOW(), INTERVAL 6 MONTH) 
        GROUP BY affectation";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}

	//Fonction qui permet de récupérer le nombre d'ipad attribué par affectation sur 1 an en fonction du mois courant
	public function getNbAttributionByAffectationLast12Months()
	{
		$req = "SELECT affectation, COUNT(*) FROM ipad 
        WHERE date_Attribution != '0000-00-00' 
        AND date_Attribution >= DATE_SUB(NOW(), INTERVAL 1 YEAR) 
        GROUP BY affectation";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetchall();
		return $lesLignes;
	}


	//AUTRE

	//Fonction qui permet de récupérer le nombre d'ipad non réparable
	public function getNbNonReparable()
	{
		$req = "SELECT COUNT(*) FROM ipad WHERE non_reparable = 1";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	//Fonction qui permet de récupérer le nombre d'ipad en réparation, c'est a dire qui ont une date de début de réparation et pas de date de fin de réparation
	public function getNbEnReparation()
	{
		$req = "SELECT COUNT(*) FROM ipad WHERE debut_Rep != '0000-00-00' AND fin_Rep='0000-00-00'";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}

	public function enAttente()
	{
		$req = "SELECT COUNT(*) FROM ipad
        WHERE Icloud=0 OR CodeDev=0";
		$res = PdoIpad::$monPdo->query($req);
		$lesLignes = $res->fetch();
		return $lesLignes;
	}
}
