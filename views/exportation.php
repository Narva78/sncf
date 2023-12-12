<?php 
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Export Ipad.csv');
try{
    $PDO = new PDO('mysql:host=localhost;dbname=ipad', 'root', 'secret');
    $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}catch(PDOException $e){
    echo 'Connexion Impossible';
}
$req = $PDO->prepare('SELECT * FROM ipad ORDER BY affectation, nom ASC');
$req->execute();
$data = $req->fetchAll();
//print_r($data);
?>"Id";"CP";"Nom";"Prenom";"Affectation";"Compte ICloud";"Code de Deverouillage";"date de Reception";"Date d'Attribution";"Debut de Reparation";"Fin de Reparation";"Non Reparable"<?php
foreach($data as $d){
    echo "\n".'"'.$d->id_ipad.'";"'.$d->cp_Agent.'";"'.$d->nom.'";"'.$d->prenom.'";"'.$d->affectation.'";"'.$d->Icloud.'";"'.$d->CodeDev.'";"'.$d->date_Reception.'";"'.$d->date_Attribution.'";"'.$d->debut_Rep.'";"'.$d->fin_Rep.'";"'.$d->non_reparable.'"';
}?>