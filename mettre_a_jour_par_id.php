<?php 
header('content_type:application/json');
require_once 'connection.php';

$reponse=array();
//les element à mettre à jour :box office ,genre,langue,date de sortie,nombre d'étoiles.

if(isset($_POST['id']) && isset($_POST['description'])&& isset($_POST['nombre_etoile'])
&& isset($_POST['box_office'])){
    //success
    $id=$_POST['id'];
    $description=$_POST['description'];
    $nombre_etoile=$_POST['nombre_etoile'];
    $box_office=$_POST['box_office'];

    $requete = $con->prepare("UPDATE films SET description='$description', nombre_etoile='$nombre_etoile',
    box_office='$box_office' WHERE id ='$id'");

    if($requete->execute()){
        $reponse['error']= "false";
        $reponse['message']= "mise à jour effectuer avec succès";
    }
    else{

        $reponse['error']= "true";
        $reponse['message']= "impossible de mettre a jour les elements renseigner";
    }

}
else{
    $reponse['error']= "true";
        $reponse['message']= "renseiger les element a mettre a jour";
}

print_r($reponse)

?>