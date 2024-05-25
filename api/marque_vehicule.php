<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rental";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, libelle_categorie, images FROM categorie_article";
$result = $conn->query($sql);

$marques = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Préfixer le chemin de l'image avec l'URL du serveur
        if ($row['images'] !== null) {
            $row['images'] = "http://192.168.56.1/gstock-dclic/" . $row['img'];
        }
        $marques[] = $row;
    }
}

$conn->close();

// Encodage et affichage du JSON
echo json_encode($marques, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
?>
