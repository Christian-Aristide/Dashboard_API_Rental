<?php
include 'entete.php';

if (!empty($_GET['id'])) {
    $fournisseur = getFournisseur($_GET['id']);
}

?>
<div class="home-content">
    <div class="overview-boxes">
        <div class="box">
            <form action=" <?= !empty($_GET['id']) ?  "../model/modifFournisseur.php" : "../model/ajoutFournisseur.php" ?>" method="post">
                <label for="nom">Nom de l'entreprise</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['nom'] : "" ?>" type="text" name="nom" id="nom" placeholder="saisir le nom">
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['id'] : "" ?>" type="hidden" name="id" id="id" >
                
                <label for="prenom">Slogan</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['prenom'] : "" ?>" type="text" name="prenom" id="prenom" placeholder="saisir le slogan">
               
                <label for="prenom">Type de véhicules</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['prenom'] : "" ?>" type="text" name="prenom" id="prenom" placeholder="véhicules proposés">
               
                <label for="email">Email</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['email'] : "" ?>" type="text" name="email" id="email" placeholder="email de l'entreprise">

                <label for="telephone">N° de téléphone</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['telephone'] : "" ?>" type="text" name="telephone" id="telephone" placeholder="Veuillez saisir le N° de téléphone">
                
                <label for="adresse">Localisation</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['adresse'] : "" ?>" type="text" name="adresse" id="adresse" placeholder="saisir l'adresse">

                <label for="adresse">Tarification journalier</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['adresse'] : "" ?>" type="text" name="adresse" id="adresse" placeholder="exp: 50000-200000">

                <label for="adresse">Conditions de location</label>
                <input value="<?= !empty($_GET['id']) ?  $fournisseur['adresse'] : "" ?>" type="text" name="adresse" id="adresse" placeholder="condition">

                <button type="submit">Configurer</button>

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
                    <th>Nom de l'entreprise</th>
                    <th>Slogan</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Localisation</th>
                    <th>Tarification</th>
                    <th>Conditions de location</th>
                    <th>Action</th>
                </tr>
                <?php
                $fournisseurs = getFournisseur();

                if (!empty($fournisseurs) && is_array($fournisseurs)) {
                    foreach ($fournisseurs as $key => $value) {
                ?>
                        <tr>
                            <td><?= $value['nom'] ?></td>
                            <td><?= $value['prenom'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><?= $value['telephone'] ?></td>
                            <td><?= $value['adresse'] ?></td>
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