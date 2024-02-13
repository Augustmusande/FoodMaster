<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="/projet_tutore/style css/aff_hist.css"> 
    <title>historique</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
        include("connexion_bd.php");
        if(isset($_POST['prod'])){
            $id= $_POST['prod'];
            $oper= $_POST['operation'];
            $requete=$bdd->query("SELECT * FROM produit where id=$id");
            while($reponse=$requete->fetch()){
                if($_POST['operation']=='entree'){ ?> <div class="tete"> <h1> historique des entrees du produit <?php echo $reponse['Descriptionproduit']; ?> </h1> </div> <?php } else {?> <div class="tete"> <h1> historique des  sorties du produit <?php echo $reponse['Descriptionproduit'];?> </h1> <?php }
                 ?>
                <div class='info'>
                  <div class='prix'>
                    <p>PUA</p>
                    <p class='info-data'><?= $reponse['Prix_unitaire'];?></p>
                  </div>
                  <div class='unite'>
                    <p>Unite de mesure</p>
                    <p class='info-data'><?= $reponse['Unite_mesure']; ?></p>
                    
                  </div>
                  </div>
                <?php
                if($_POST['operation']=='entree'){
                    $reqEntee=$bdd->query("SELECT  id,datejour,quantite,produit_id  FROM entre where produit_id=$id order by datejour desc");
                    echo "<table>";
                    echo"<tr>  <th>Quantite Entree</th><th>Date</th> </tr>";
          
                  while($reponseEntree=$reqEntee->fetch()){
                                           
                     echo"<tr>"; 
                     echo "<td class='entree'>".$reponseEntree['quantite']."</td>";
                     echo "<td >".$reponseEntree['datejour']."</td>";
                     
                      
                     echo"</tr>";
                     
                  }
                  echo "</table>";
                }else{
                    $reqSortie=$bdd->query("SELECT  id,datejour,quantite,produit_id  FROM sortie where produit_id=$id order by id desc");
                    echo "<table>";
                    echo"<tr>   <th>Quantite Sortie</th><th>Date</th> </tr>";
          
                  while($reponseSortie=$reqSortie->fetch()){
                      
                      
                     echo"<tr>"; 
                     echo "<td class='sortie'>".$reponseSortie['quantite']."</td>";
                     echo "<td>".$reponseSortie['datejour']."</td>";
                      
                     echo"</tr>";
                     
                  }
                  echo "</table>";
                }

            }

        }
        ?>
        <?php 
                                    
                    ?>
         
</body>
</html>