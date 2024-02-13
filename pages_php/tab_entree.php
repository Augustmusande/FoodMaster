<?php include('connexion_bd.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/tab_entree.css">
    <title>Entrée de Produits</title>
</head>
<body>
    <?php
        include("hd/header_admin.php"); 
    
    ?>
        <div class="containeur_presence">
        <div class="header_entre"> 
        <H2>TABLEAU DE BORD DES ENTREES</H2>  
       </div>
  <?php 
          $requete=$bdd->query("SELECT  * FROM entre order by id desc");
          echo "<table>";
          echo"<tr><th>Date</th> <th>Quantite Entree</th> <th>Nom du Produit	</th> <th>prix unitaire d'achat</th></tr>";

        while($reponse=$requete->fetch()){
            $idproduit=$reponse['produit_id'];
           $requeteProd=$bdd->query("SELECT * FROM produit WHERE id='$idproduit' order by id desc");
           echo"<tr>";
           
           echo "<td>".$reponse['datejour']."</td>";
           echo "<td>".$reponse['quantite']."</td>";
           
           while($reponsePord=$requeteProd->fetch()){
               echo "<td>".$reponsePord['Descriptionproduit']."</td>";

           }
           echo "<td>".$reponse['prix']."</td>";
           echo"</tr>";
           
        }
        
        echo "</table>";

                    
                    ?>
   
</body>
</html>