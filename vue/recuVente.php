<?php
include 'entete.php';

if (!empty($_GET['id'])) {
    $vente = getVente($_GET['id']);
}

?>
<div class="home-content">


    <button class="hidden-print" id="btnPrint" style="position: relative; left: 45%;"> <i class='bx bx-printer'></i> Imprimer</button>


    <div class="page">

        <div class="cote-a-cote" style="width: 65%; display:flex; align-items:center">
            <!-- <h2>RENTAL</h2> -->
            <img src="../public/assets/logo.png" alt="logo" width="100" height="100">

            <p style="font-size: 30px; font-weight:400"><span style="color: #c67b17;font-weight:600 ">L</span>UXURY <span style="color: #c67b17;font-weight:600 ">R</span>ENTAL <span style="color: #c67b17;font-weight:600 ">C</span>AR </p>


        </div>
        <div class="cote-a-cote">


            <div class="cote-a-cote" style="width: 45%;">
                <p style="font-weight: bold;">Nom & Prénom :</p>
                <p><?= $vente['nom'] . " " . $vente['prenom'] ?></p>
            </div>
            <!-- <img src="../public/assets/logo.png" alt="logo" width="100" height="100" style="border: 1px solid red;"> -->
            <div style="width: 50%;">
                <p><span style="font-weight: bold;">Reçu:</span> N°#<?= $vente['id'] ?> </p>
                <p><span style="font-weight: bold;">Date de location: </span><?= date('d/m/Y H:i:s', strtotime($vente['date_vente'])) ?> </p>
                <p><span style="font-weight: bold;">Fin de location: </span><?= date('d/m/Y H:i:s', strtotime($vente['date_fin_location'])) ?> </p>
            </div>
        </div>


        <div class="cote-a-cote" style="width: 40%;">
            <p style="font-weight: bold;">Numéro :</p>
            <p><?= $vente['telephone'] ?></p>
        </div>
        <div class="cote-a-cote" style="width: 40%;">
            <p style="font-weight: bold;">Adresse :</p>
            <p><?= $vente['adresse'] ?></p>
        </div>

        <br>

        <table class="mtable">
            <tr>
                <th>Nom du véhicule</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Prix total</th>
            </tr>

            <tr>
                <td><?= $vente['nom_article'] ?></td>
                <td><?= $vente['quantite'] ?></td>
                <td><?= $vente['prix_unitaire'] ?></td>
                <td><?= $vente['prix'] ?> XOF</td>
            </tr>

        </table>

        <br> <br>
        <!-- SECTION POUR LES CARACTERISTIQUE  -->

        <table class="mtable">
            <tr>
                <th>Caractéristique</th>

            </tr>

            <tr>
                <td>
                    <div class="cote-a-cote" style="width: 35%;">
                        <p>Climatisation :</p>
                        <p><?= $vente['climatisation'] ?></p>
                    </div>
                    <div class="cote-a-cote" style="width: 35%;">
                        <p>Passagers :</p>
                        <p><?= $vente['passager'] ?></p>
                    </div>
                    <div class="cote-a-cote" style="width: 35%;">
                        <p>Boite :</p>
                        <p><?= $vente['boite'] ?></p>
                    </div>
                    <div class="cote-a-cote" style="width: 35%;">
                        <p>Portes :</p>
                        <p><?= $vente['porte'] ?></p>
                    </div>
                    <div class="cote-a-cote" style="width: 35%;">
                        <p>Rapidité :</p>
                        <p><?= $vente['rapidite'] ?> KM/H</p>
                    </div>
                    <div class="cote-a-cote" style="width: 35%;">
                        <p>Année :</p>
                        <p><?= $vente['annee'] ?></p>
                    </div>
                </td>

            </tr>

        </table>

        <br>
        <br>

        <!-- Image de la voiture qui a été RESERVER -->
        <!-- border:#c67b17 2px solid -->
        <div class="cote-a-cote" style="width: 100%; height:auto; display:flex; align-items:center; justify-content:center">

            <img style="object-fit:contain" width="500" height="400" src="<?= $vente['images'] ?>" alt="<?= $value['nom_article'] ?>">
        </div>


    </div>


</div>
</section>

<?php
include 'pied.php';
?>
<script>
    var btnPrint = document.querySelector('#btnPrint');
    btnPrint.addEventListener("click", () => {
        window.print();
    });

    function setPrix() {
        var article = document.querySelector('#id_article');
        var quantite = document.querySelector('#quantite');
        var prix = document.querySelector('#prix');

        var prixUnitaire = article.options[article.selectedIndex].getAttribute('data-prix');

        prix.value = Number(quantite.value) * Number(prixUnitaire);
    }
</script>