<?php
include 'connexion.php';
if (
    !empty($_POST['libelle_categorie'])
    && !empty($_FILES['images'])
) {

    $sql = "INSERT INTO categorie_article(libelle_categorie, images) VALUES(?, ?)";
    $req = $connexion->prepare($sql);
    
    // Coté image qui stock le logo 
    $name = $_FILES['images']['name'];;
    $tmp_name = $_FILES['images']['tmp_name'];
    
    $folder = "../public/images/";
    $destination = "../public/images/$name";
    
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }
    
    if (move_uploaded_file($tmp_name, $destination)) {
        $req->execute(array(
            $_POST['libelle_categorie'],  
            $destination
        ));
    
        if ($req->rowCount() != 0) {
            $_SESSION['message']['text'] = "Catégorie ajoutée avec succès";
            $_SESSION['message']['type'] = "success";
        } else {
            $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout de la catégorie";
            $_SESSION['message']['type'] = "danger";
        }
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'importation de l'image de l'article";
        $_SESSION['message']['type'] = "danger";
    }


} else {
    $_SESSION['message']['text'] ="Une information obligatoire non renseignée";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/categorie.php');  
?>
