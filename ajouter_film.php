<?php
header('content_type:application/json');
require_once 'connection.php';

$reponse=array();
//les differents entrées: titre,description,langue,genre,date_sortie,box_office,duree et nombre d'étoile

if (isset($_POST['titre'])&& isset($_POST['description']) &&
 isset($_POST['langue']) && isset($_POST['genre'])&& isset($_POST['date_de_sortie']) 
 && isset($_POST['box_office'])&& isset($_POST['nombre_etoile']) && isset($_POST['duree']) )
{
   $titre = $_POST['titre'] ;
   $description = $_POST['description'] ;
   $genre = $_POST['genre'] ;
   $date_de_sorti = $_POST['date_de_sorti'] ;
   $box_office = $_POST['box_office'] ;
   $duree = $_POST['duree'] ;
   $nombre_etoile = $_POST['nombre_etoile'] ;
   $requete = $con->prepare("INSERT INTO films(titre,description,langue,genre,date_de_sortie,box_office,duree,nombre_d'etoile) 
   VALUE (?,?,?,?,?,?,?,?)");
   $requete->bind_param('sssssdsd',$titre,$descriptionp, $langue, $genre,$date_sorti,
   $box_office,$duree,$nombre_etoile);
   if ($requete->execute()) {
    //si success 
    $reponse['error']=false;
    $reponse['message']="Nouveau film ajouté avec succès";
      }else {
        $reponse['error']=true;
        $reponse['message']="le film n'a pas été  ajouté";
      }
}else {
    $reponse['error']=true;
    $reponse['message']="veuillez renseigner les champ à ajouter";
}

print_r($reponse);

?>