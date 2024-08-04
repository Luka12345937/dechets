<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=dechets", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $db->query("SELECT * FROM `gestion_dechets` WHERE 1");
    while ($res = $req = $req->fetch(PDO::FETCH_ASSOC)) {
        echo "<div style='border-radius: 2px 0px 2px 0px; background-color: azure; padding: 10px; margin: 5px 0;'>";
        echo "<p>type_dechet: " . htmlspecialchars($res['type_dechet']) . "</p>";
        echo "<p>quantite: " . htmlspecialchars($res['quantite']) . "</p>";
        ho "<p>date_collecte: " . htmlspecialchars($res['date_collecte']) . "</p>";
        echo "</div>";
    }
} catch (PDOException $e) {
    echo "Erreur: " . $e->getMessage();
}
?>

