<?php
header('content_type:application/json');
require_once 'connection.php';

$reponse=array();

if(isset($_GET['titre'])){ 

$titre=$_GET['titre'];
$query=$con->prepare("SELECT id,titre,description,langue,genre,date_de_sortie,box_office,duree,nombre_etoile 
FROM films WHERE titre=?");
$query->bind_param("s",$titre);

//verifier le resultat de notre requette 
if ($query->execute()) {
    //La requte a bien été executée
    $query->bind_result($id,$titre,$description,$langue,$genre,$date_de_sortie,$obx_office,
    $duree,$nombre_etoile);
    $query->fetch();

    $films=array(
        'id'=>$id,
        'titre'=>$titre,
        'description'=>$description,
        'langue'=>$langue,
        'genre'=>$genre,
        'date_de_sortie'=>$date_de_sortie,
        'obx_office'=>$obx_office,
        'duree'=>$duree,
        'nombre_etoile'=>$nombre_etoile,
    );
    
    $repoonse['error']=false;
    $reponse['films']=$films;
    $reponse['message']="le films rechercher est dans la base de donnée";
    $query->close();
     print_r($reponse);
}else{
    //impossible d'executer cette requette 
    $repoonse['error']=true;
    $reponse['message']="le films rechercher n'existe pas dans la base de donnée";
}


 }else { 
    $repoonse['error']=true;
    $reponse['message']="veuillez fournir un titre de films a rechercher";

 }
 echo json_encode($reponse);
?>