<?php
header('content_type:application/json');
require_once 'connection.php';

$reponse=array();

$query=$con->prepare("SELECT* FROM films");

//verifier le resultat de notre requette 
if ($query->execute()) {
    //La requte a bien été executée
    $films=array();
    $resultat=$query->get_result();
    while ($elmt=$resultat->fetch_array(MYSQLI_ASSOC)) {
        $films[]=$elmt;
    }
    $repoonse['error']=false;
    $reponse['films']=$films;
    $reponse['message']="la commande à été exécutée avec succes";
    $query->close();
     print_r($reponse);
}else{
    //impossible d'executer cette requette 
    $repoonse['error']=true;
    $reponse['message']="la commande n'a pas été exécutée";
}

echo json_encode($reponse);


?>