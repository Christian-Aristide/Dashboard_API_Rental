<?php
header('Content-Type: application/json');

// Connexion à la base de données
$host = 'localhost';
$db = 'rental';
$user = 'root';
$pass = '';

// Création d'une connexion PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Connexion échouée: ' . $e->getMessage()]);
    exit();
}

// Récupération du paramètre de recherche
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

// Préparation et exécution de la requête
$query = $pdo->prepare("SELECT * FROM article WHERE nom_article LIKE :searchTerm");
$query->execute(['searchTerm' => '%' . $searchTerm . '%']);

// Récupération des résultats
$results = $query->fetchAll(PDO::FETCH_ASSOC);

// Vérification des résultats et envoi de la réponse JSON
if ($results) {
    echo json_encode($results);
} else {
    echo json_encode(['message' => 'Aucune réponse trouvée']);
}
?>
