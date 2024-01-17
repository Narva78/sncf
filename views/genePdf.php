<?php

use Dompdf\Dompdf;


try {
	$PDO = new PDO('mysql:host=localhost;dbname=ipad', 'root', '');
} catch (PDOException $e) {
	echo 'Connexion Impossible';
}

require_once '../fonction/pdo.php';


ob_start();

require_once 'pdf.php';

$html = ob_get_contents();

ob_end_clean();
require_once './dompdf/dompdf/autoload.inc.php';

$dompdf = new Dompdf();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$fichier = 'donné';

$dompdf->stream($fichier);
