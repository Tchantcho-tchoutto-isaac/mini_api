<?php
header('Content-Type: application/json');
require_once 'connection.php';

$response = array();

if (isset($_POST['titre']) && isset($_POST['description']) &&
    isset($_POST['langue']) && isset($_POST['genre']) && isset($_POST['date_de_sortie']) &&
    isset($_POST['box_office']) && isset($_POST['nombre_etoile']) && isset($_POST['duree']))
{
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $langue = $_POST['langue'];
    $genre = $_POST['genre'];
    $date_de_sortie = $_POST['date_de_sortie'];
    $box_office = $_POST['box_office'];
    $duree = $_POST['duree'];
    $nombre_etoile = $_POST['nombre_etoile'];

    $requete = $con->prepare("INSERT INTO films (titre, description, langue, genre, date_de_sortie, box_office, duree, nombre_etoile) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    $requete->bind_param('sssssdss', $titre, $description, $langue, $genre, $date_de_sortie, $box_office, $duree, $nombre_etoile);

    if ($requete->execute()) {
        $response['error'] = false;
        $response['message'] = "Nouveau film ajouté avec succès";
    } else {
        $response['error'] = true;
        $response['message'] = "Le film n'a pas été ajouté";
    }
} else {
    $response['error'] = true;
    $response['message'] = "Veuillez renseigner tous les champs a ajouter";
}

echo json_encode($response);
?>
