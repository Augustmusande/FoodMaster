<?php include('connexion_bd.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/tab_sortie.css">
    <title>Sortie des Produits</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
    
    ?>
     <div class="containeur_presence">
        <div class="header_sortie"> 
        <H2>TABLEAU DE BORD DES SORTIES</H2>  
       </div>
     <?php 
          $requete=$bdd->query("SELECT  datejour,quantite,produit_id  FROM sortie order by id desc");
          echo "<table>";
          echo"<tr> <th>Date</th> <th>Quantite sortie</th> <th>Nom du Produit	</th></tr>";

        while($reponse=$requete->fetch()){
            $idproduit=$reponse['produit_id'];
           $requeteProd=$bdd->query("SELECT * FROM produit WHERE id='$idproduit' order by id desc");
           echo"<tr>";
          
           echo "<td>".$reponse['datejour']."</td>";
           echo "<td>".$reponse['quantite']."</td>";
           while($reponsePord=$requeteProd->fetch()){
               echo "<td>".$reponsePord['Descriptionproduit']."</td>";

           }
           echo"</tr>";
           
        }
        echo "</table>";

                    
                    ?>
  
</body>
</html>