<?php
//header('Content-type:text/csv;');
header('Content-Disposition:attachement;filename="Export tutoriel.csv"');
try{
$PDO=new PDO('mysql:host=localhost;dbname=test','root');
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e){
    echo 'Connexion impossible';
}
$req = $PDO->prepare('select id,name,description,price from produit');
$req->execute();
$data = $req->fetchAll();
?>"Id";"name";"description";"price"<?php 
foreach($data as $d){
    echo "\n" .'"'. $d->id.'";"'.$d->name.'";"'.$d->description .'";"'. $d->price .'"';
}?>