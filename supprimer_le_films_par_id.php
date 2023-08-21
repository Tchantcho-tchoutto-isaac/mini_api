<?php 
header('content_type:application/json');
require_once 'connection.php';

$reponse=[];

if (isset($_POST['id'])) {
    $id=$_POST['id'];
    $requete=$con->prepare("DELETE FROM films WHERE id=? LIMIT 1");
    $requete->bind_param('i',$id);
    if ($requete->execute()) {
        $reponse['error']=false;
        $reponse['message']="le films à ete surprimer";

    }else{
        $reponse['error']=true;
        $reponse['message']="le films n'a pas  ete surprimer";
        
    }
}else{
    $reponse['error']=true;
    $reponse['message']="veuillez renseigner l'id de l'element à supprimer ";
    
}
print_r($reponse);

?>
