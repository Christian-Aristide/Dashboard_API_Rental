<?php
include 'entete.php';

if (!empty($_GET['id'])) {
    $categorie = getCategorie($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id']) ?  "../model/modifCategorie.php" : "../model/ajoutCategorie.php" ?>" method="post" enctype="multipart/form-data">
                <label for="libelle_categorie">Nom de la marque</label>
                <input value="<?= !empty($_GET['id']) ?  $categorie['libelle_categorie'] : "" ?>" type="text" name="libelle_categorie" id="libelle_categorie" placeholder="Veuillez saisir le libéllé">

                <label for="images">Logo de la marque</label>
                <input value="<?= !empty($_GET['id']) ?  $article['images'] : "" ?>" type="file" name="images" id="images">

                <input value="<?= !empty($_GET['id']) ?  $categorie['id'] : "" ?>" type="hidden" name="id" id="id">

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
                    <th>Logo</th>
                    <th>Nom de la marque</th>
                    <th>Modifier</th>
                </tr>
                <?php
                $categories = getCategorie();

                if (!empty($categories) && is_array($categories)) {
                    foreach ($categories as $key => $value) {
                ?>
                        <tr>
                            <td><img width="100" height="100" src="<?= $value['images'] ?>" alt="<?= $value['libelle_categorie'] ?>"></td>

                            <td><?= $value['libelle_categorie'] ?></td>
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