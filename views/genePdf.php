<?php

use Dompdf\Dompdf;


try {
	$PDO = new PDO('mysql:host=localhost;dbname=ipad', 'root', '');
} catch (PDOException $e) {
	echo 'Connexion Impossible';
}

require_once 'C:/wamp64/www/sncf/fonction/pdo.php';

$sql = 'SELECT * FROM `ipad`';

$query = $PDO->query($sql);

$ipads = $query->fetchAll();

ob_start();
require_once 'pdf.php';

$html = ob_get_contents();

ob_end_clean();
require_once 'C:/wamp64/www/sncf/views/dompdf/dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('A2', 'paysages');

$dompdf->render();

$fichier = 'donné';

$dompdf->stream($fichier);
