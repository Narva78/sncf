<?php
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Export Ipad.csv');
try {
	$PDO = new PDO('mysql:host=localhost;dbname=ipad', 'root', '');
	$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (PDOException $e) {
	echo 'Connexion Impossible';
}
$req = $PDO->prepare('SELECT * FROM ipad ORDER BY cp_Agent, nom ASC');
$req->execute();
$data = $req->fetchAll();
//print_r($data);
?>"Id";"CP";"Nom";"INC";"Code RG";"Mytem";"Date de demande";"Types de demande";"Types de matériel";"Types de panne";"observation";"Compte Icloud";"Code de dévérouillage";"IMEI";"IMEI de remplacement"
<?php
foreach ($data as $d) {
	echo "\n" . '"' . $d->id_ipad . '";"' . $d->cp_Agent . '";"' . $d->nom . '";"' . $d->inc . '";"' . $d->Code_RG . '";"' . $d->mytem . '";"' . $d->date_demande . '";"' . $d->type_demande . '";"' . $d->type_materiel . '";"' . $d->type_panne . '";"' . $d->observation . '";"' . $d->Icloud . '";"' . $d->CodeDev . '"; "' . $d->imei . '";"' . $d->imei_remp . '"';
}
