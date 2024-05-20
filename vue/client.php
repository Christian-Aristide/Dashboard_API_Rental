<?php
include 'entete.php';

if (!empty($_GET['id'])) {
    $client = getClient($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id']) ?  "../model/modifClient.php" : "../model/ajoutClient.php" ?>" method="post" enctype="multipart/form-data">
                <label for="nom">Nom</label>
                <input value="<?= !empty($_GET['id']) ?  $client['nom'] : "" ?>" type="text" name="nom" id="nom" placeholder="Veuillez saisir le nom">
                <input value="<?= !empty($_GET['id']) ?  $client['id'] : "" ?>" type="hidden" name="id" id="id" >
                
                <label for="prenom">Prénom</label>
                <input value="<?= !empty($_GET['id']) ?  $client['prenom'] : "" ?>" type="text" name="prenom" id="prenom" placeholder="Veuillez saisir le prénom">
               
                <label for="prenom">Email</label>
                <input value="<?= !empty($_GET['id']) ?  $client['email'] : "" ?>" type="text" name="email" id="email" placeholder="Veuillez saisir l'email'">

                <label for="telephone">N° de téléphone</label>
                <input value="<?= !empty($_GET['id']) ?  $client['telephone'] : "" ?>" type="text" name="telephone" id="telephone" placeholder="Veuillez saisir le N° de téléphone">
                
                <label for="adresse">Adresse</label>
                <input value="<?= !empty($_GET['id']) ?  $client['adresse'] : "" ?>" type="text" name="adresse" id="adresse" placeholder="Veuillez saisir l'adresse">

                <label for="images">Piece ID</label>
                <input value="<?= !empty($_GET['id']) ?  $article['images'] : "" ?>" type="file" name="images" id="images">

                <button type="submit">Enregistrer</button>

                <?php
                if (!empty($_SESSION['message']['text'])) {
                ?>
                    <div class="alert <?= $_SESSION['message']['type'] ?>">
                        <?= $_SESSION['message']['text'] ?>
                    </div>
                <?php
                }
                ?>
            </form>

        </div>
        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Nom</th>
                    <!-- <th>Prénom</th> -->
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Pièce ID</th>
                    <th>Action</th>
                </tr>
                <?php
                $clients = getClient();

                if (!empty($clients) && is_array($clients)) {
                    foreach ($clients as $key => $value) {
                ?>
                        <tr>
                            <td> <p style="font-weight: bold;"><?= $value['nom'] ?></p>  <?= $value['prenom'] ?> </td>
                            <!-- <td><?= $value['prenom'] ?></td> -->
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['telephone'] ?></td>
                            <td><?= $value['adresse'] ?></td>
                            <td><img width="100" height="100" src="<?= $value['images'] ?>" alt="<?= $value['email'] ?>"></td>
                            <td><a href="?id=<?= $value['id'] ?>"><i class='bx bx-edit-alt'></i></a></td>
                        </tr>
                <?php

                    }
                }
                ?>
            </table>
        </div>
    </div>

</div>
</section>

<?php
include 'pied.php';
?>