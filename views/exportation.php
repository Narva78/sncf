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

require('vendor/autoload.php');
$con = mysqli_connect('localhost', 'root', '', 'ipad');
$res = mysqli_query($con, "select * from ipad");
if (mysqli_num_rows($res) > 0) {
	$html = '<table>';
	$html .= '<tr><td>ID</td><td>CP</td><td>NOM</td> <td>inc</td> <td>code RG</td>  <td>Mytem</td> <td>date Demande</td> <td>type Demande</td> <td>type Materiel</td> <td>panne</td> <td>observation</td> <td>icloud</td> <td>code Dev</td> <td>imei_mat_defec</td> <td>imei_remp</td>';
	while ($row = mysqli_fetch_assoc($res)) {
		$html .= '<tr><td>' . $row['id_ipad'] . '</td><td>' . $row['cp_Agent'] . '</td><td>' . $row['nom'] . '</td><td>' . $row['inc'] . '</td><td>' . $row['Code_RG'] . '</td><td>' . $row['mytem'] . '</td><td>' . $row['date_demande'] . '</td><td>' . $row['type_demande'] . '</td><td>' . $row['type_materiel'] . '</td><td>' . $row['type_panne'] . '</td><td>' . $row['observation'] . '</td><td>' . $row['Icloud'] . '</td><td>' . $row['CodeDev'] . '</td><td>' . $row['imei'] . '</td><td>' . $row['imei_remp'] . '</td></tr>';
	}
	$html .= '</table>';
}
