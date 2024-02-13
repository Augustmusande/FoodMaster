<?php
include("connexion_bd.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/entre.css">
    <title>Categories </title>
</head>
<body>

<?php
        include("hd/header_admin.php"); 
    
    ?>
    <div class="containeur_form">
    <h2>Mouvement Stocks</h2>
        <form action="entree.php"  METHOD='POST'>
            <div class="group_form">
                <label for="">Produit</label>
                <select name="prod" id="select_produit" required>
                    <?php 
          $requete=$bdd->query("SELECT * FROM produit");
        while($reponse=$requete->fetch()){
            ?>
             <option value="<?php echo  $reponse["id"];  ?>"><?php echo  $reponse["Descriptionproduit"];  ?></option>
          
            <?php
        }
                    
                    ?>
                   
                </select>
            </div>
            <div class="group_form">
                <label for="quantite">Quantite </label>
                <input type="number" id="quantite" name="quantite" required>
            </div>
            <div class="group_form">
                <label for="prix">Prix unitaire</label>
                <input type="number" id="prix" name="prix" >
            </div>
         
            <div class="group_form">
                <label for="date">Date</label>
                <input type="date" id="date" name='date_jour' required>
            </div>

            <div class="group_form">
                <label for="categorie_selection">categorie</label>
                <select name="categorie_selection" id="" class="categorie_selection"required>
                    <option value="entree">Entree</option>
                    <option value="sortie"  >Sortie</option>
                </select>
            </div>

             
            <input type="submit" class="bouton_submit" value='soumettre' name="btn_soumetre">

            <p class=message></p>
        </form>
    </div>
    <?php
 if (isset($_POST['btn_soumetre'])){   
  
      $prod_id=$_POST['prod'];
      $quantite=$_POST['quantite'];
      $prix=$_POST['prix'];
      $datejour=$_POST['date_jour'];
      $categorie=$_POST['categorie_selection'];
       
        if($categorie=="entree"){ 
        $requete=$bdd->prepare("insert into entre (datejour,quantite,prix,produit_id ) values (:datejour,:quantite,:prix,:produit_id)");
        $requete->execute(array(
            'datejour'=>$datejour,
            'quantite'=>$quantite,
            'prix'=>$prix,
            'produit_id'=>$prod_id
        )); 


        $sql = "SELECT * FROM produit WHERE id='$prod_id'";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        while($reponse=$stmt->fetch()){
            $nouvelleQte=$quantite+$reponse['Quantite'];
            $updateProd=$bdd->prepare("UPDATE produit SET Descriptionproduit=:Descriptionproduit,Quantite=:Quantite,Prix_unitaire=:Prix_unitaire,Unite_mesure=:Unite_mesure,Categorie=:Categorie where id='$prod_id'");
            $updateProd->execute(array('Descriptionproduit'=>$reponse['Descriptionproduit'],'Quantite'=>$nouvelleQte,'Prix_unitaire'=>$reponse['Prix_unitaire'],'Unite_mesure'=>$reponse['Unite_mesure'],'Categorie'=>$reponse['Categorie']));
        }
         
         

        
        echo '<div><p class="message " style="color:green;text-align:center;margin-top:-9px ">entree reussie avec succces</p></div>';
      } else {
        if($categorie=="sortie"){        
            $requete=$bdd->prepare("insert into sortie (datejour,quantite,produit_id) values (:datejour,:quantite,:produit_id)");
            $requete->execute(array(
                'datejour'=>$datejour,
                'quantite'=>$quantite,
                'produit_id'=>$prod_id
            )); 
    
    
            $sql = "SELECT * FROM produit WHERE id='$prod_id'";
            $stmt = $bdd->prepare($sql);
            $stmt->execute();
            while($reponse=$stmt->fetch()){
                if($reponse['Quantite']>=$quantite){
                    $nouvelleQte=$reponse['Quantite']-$quantite;
                    $updateProd=$bdd->prepare("UPDATE produit SET Descriptionproduit=:Descriptionproduit,Quantite=:Quantite,Prix_unitaire=:Prix_unitaire,Unite_mesure=:Unite_mesure,Categorie=:Categorie where id='$prod_id'");
                    $updateProd->execute(array('Descriptionproduit'=>$reponse['Descriptionproduit'],'Quantite'=>$nouvelleQte,'Prix_unitaire'=>$reponse['Prix_unitaire'],'Unite_mesure'=>$reponse['Unite_mesure'],'Categorie'=>$reponse['Categorie']));

                    echo '<div><p class="message " style="color: green;text-align:center;margin-top:-9px  ">Sortie reusssie avec succes</p></div>';
                }else{
                    echo '<div><p class="message " style="color: red;text-align:center;margin-top:-9px  ">quantite non suffisante</p></div>';
                }
            }
      
    }
      }
    }

?>


</body>
</html>