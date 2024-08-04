<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type_dechet = $conn->real_escape_string($_POST['type_dechet']);
    $quantite = $conn->real_escape_string($_POST['quantite']);
    $date_collecte = $conn->real_escape_string($_POST['date_collecte']);

    $sql = "INSERT INTO gestion_dechets (type_dechet, quantite, date_collecte) VALUES ('$type_dechet', '$quantite', '$date_collecte')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau enregistrement créé avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
} elseif (isset($_GET['action'])) {
    if ($_GET['action'] == 'view') {
        $result = $conn->query("SELECT * FROM gestion_dechets");
        $entries = [];
        while ($row = $result->fetch_assoc()) {
            $entries[] = $row;
        }
        echo json_encode($entries);
    } elseif ($_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = $conn->real_escape_string($_GET['id']);
        $sql = "DELETE FROM gestion_dechets WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Enregistrement supprimé avec succès";
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>