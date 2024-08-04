<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Déchets Urbains</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    background-color: #f4f4f4;
}

h1 {
    margin-bottom: 20px;
}

form {
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    padding: 10px 15px;
    background: #28a745;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background: #218838;
}

#response {
    margin-top: 20px;
}

#viewEntries {
    margin-top: 20px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 3px;
    padding: 10px 15px;
    cursor: pointer;
}

#viewEntries:hover {
    background: #0056b3;
}

.entry {
    background: white;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.entry p {
    margin: 5px 0;
}

.deleteEntry {
    background: #dc3545;
    color: white;
    border: none;
    border-radius: 3px;
    padding: 5px 10px;
    cursor: pointer;
}

.deleteEntry:hover {
    background: #c82333;
}
    </style>
</head>
<body style="background-image: url(R.jpeg); background-size: cover; background-position: center;">
    <h1>Déchets Urbains</h1>
    <form id="dechetForm">
        <label for="type_dechet">Type de Déchet:</label>
        <input type="text" id="type_dechet" name="type_dechet" required><br>

        <label for="quantite">Quantité:</label>
        <input type="number" id="quantite" name="quantite" required><br>

        <label for="date_collecte">Date de Collecte:</label>
        <input type="date" id="date_collecte" name="date_collecte" required><br>

        <button type="submit">Soumettre</button>
    </form>
    <div id="response"></div>

    <script src="app.js"></script>
</body>
</html>