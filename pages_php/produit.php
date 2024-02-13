<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/produit.css">
   
    <title>Produit</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
    
    ?>
        
    <div class="conteneur">
    <h2>Ajout Produit</h2>
        <form action="produit.php" method='POST'>
             
            <div class="group_form">
                <label for="desc">Nom du produit</label>
                <input type="text" name='desc' id="desc" class='input' required  >           
            </div>
            <div class="group_form">
                <label for="uniteMesure">Unite de mesure</label>
                <select name="unitemesure" id="" required class='input'>
                    <option value="kg">kilogramme</option>
                    <option value="g">Gramme</option>
                    <option value="l">Litre</option>
                    <option value="ml">Milli-litre</option>
                </select>
            </div>
            <div class="group_form">
                <label for="quantite">Quantite</label>
                <input type="number" name='quantite' min="0" class='input'>
            </div>

            <div class="group_form">
                <label for="prix">Prix_unitaire</label>
                <input type="text" name='prix' id="prix"  class='input'>
            </div>
            <input name='btn' type="submit" value='Ajouter' id="ad" >
         
        </form>
    </div>
    <?php
        if(isset($_POST['btn'])){
            if(isset($_POST['desc']) and isset($_POST['unitemesure']) and isset($_POST['quantite'])  and isset($_POST['prix'])){
                include('connexion_bd.php');
                $desc=$_POST['desc'];
                $requeteProduit=$bdd->query("SELECT * FROM produit where Descriptionproduit='$desc'");
                $nb_results = $requeteProduit->rowCount();
                if($nb_results>=1){
                    echo 'Ce produit existe deja';
                }else{
                    $requete=$bdd->prepare("insert into produit (Descriptionproduit,Quantite,Prix_unitaire,Unite_mesure) values (:Descriptionproduit,:Quantite,:Prix_unitaire,:Unite_mesure)");
                    $requete->execute(array('Descriptionproduit'=>$_POST["desc"],'Quantite'=>$_POST["quantite"],'Prix_unitaire'=>$_POST["prix"],'Unite_mesure'=>$_POST["unitemesure"]));
                    header('location:Gestion_stocks.php');

                }
            }else{
                echo '<p style="color:red;"> Pas de valeur dans les champs. </P>';
            }
             
        }
    ?>
    
</body>
</html>