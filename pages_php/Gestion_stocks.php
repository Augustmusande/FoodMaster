<?php
include('connexion_bd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/Gestion_stocks.css">
    <title>Gestion_Stocks</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
    
    ?>
    <div class="containeur_presence">
    <div class="header_stocks"> 
        <H2>GESTION STOCKS </H2>  
       </div>
    <div class="containeur_stock">
        
        <div class="sidebar"> 
        <a href="/projet_tutore/pages_php/entree.php" class="bouton_enregistrer">Mouvement de stock</a>
        <!-- <button class="bouton_enregistrer">Sortie</button> -->
        <a href="/projet_tutore/pages_php/produit.php" class="bouton_enregistrer">Produit</a>
        <!-- <button class="bouton_enregistrer">Produit</button> -->
        <a href="/projet_tutore/pages_php/tab_entree.php" class="bouton_enregistrer">Entree</a>
        <a href="/projet_tutore/pages_php/tab_sortie.php" class="bouton_enregistrer">Sortie</a>
        <a href="/projet_tutore/pages_php/historique.php" class="bouton_enregistrer">Historique</a>
        </div>
        <div lass="containeur_table">
        <?php 
    $requete=$bdd->query("SELECT id,Descriptionproduit,Quantite,Prix_unitaire,Unite_mesure FROM produit");
    echo "<table>";
    echo"<tr><th>Numero</th> <th>Nom du Produit</th> <th>Unite de Mesure</th> <th>Quantite en Stock</th> <th>Prix unitaire</th></tr>";
while($reponse=$requete->fetch()){
    $prod=$reponse['id'];
   echo"<tr>";
   echo "<td>".$reponse['id']."</td>";
   echo "<td>".$reponse['Descriptionproduit']."</td>";
   echo "<td>".$reponse['Unite_mesure']."</td>";
   echo "<td>".$reponse['Quantite']."</td>";
   echo "<td>".$reponse['Prix_unitaire']."</td>"; 
   echo"</tr>";
}
    echo "</table>";
?>
           
        </div>
    </div>
</body>
</html>