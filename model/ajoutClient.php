<?php
include 'connexion.php';
if (
    !empty($_POST['nom'])
    && !empty($_POST['prenom'])
    && !empty($_POST['email'])
    && !empty($_POST['telephone'])
    && !empty($_POST['adresse'])
    && !empty($_FILES['images'])

) {

$sql = "INSERT INTO client(nom, prenom, email, telephone, adresse, images)
        VALUES(?,?, ?, ?, ?,?)";
    $req = $connexion->prepare($sql);
    



    $name = $_FILES['images']['name'];;
    $tmp_name = $_FILES['images']['tmp_name'];
    
    $folder = "../public/images/";
    $destination = "../public/images/$name";
    
    if (!is_dir($folder)) {
        mkdir($folder, 0777, true);
    }
    
    if (move_uploaded_file($tmp_name, $destination)) {
        $req->execute(array(
            $_POST['nom'],
        $_POST['prenom'],
        $_POST['email'],
        $_POST['telephone'],
        $_POST['adresse'],
            $destination
        ));
    
        if ( $req->rowCount()!=0) {
            $_SESSION['message']['text'] = "client ajouté avec succès";
            $_SESSION['message']['type'] = "success";
        }else {
            $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout du client";
            $_SESSION['message']['type'] = "danger";
        }
    }else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout du client";
        $_SESSION['message']['type'] = "danger";
    }
    

} else {
    $_SESSION['message']['text'] ="Une information obligatoire non rensignée";
    $_SESSION['message']['type'] = "danger";
}

header('Location: ../vue/client.php');