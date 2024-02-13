<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/historique.css">    
    
    <title>historique</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
        include("connexion_bd.php");
        ?>
        <div class="form_conteneur">
            <h2>Historique des operations</h2>
            <form action="afficher_historique.php" method="post" >
            <div  class="group_input">
                <label for="">Produit</label>
                <select name="prod" id="">
            </div>    
            
                    <?php 
                        $requete=$bdd->query("SELECT * FROM produit");
                        while($reponse=$requete->fetch()){
                            ?>
                            <option value="<?php echo  $reponse["id"];  ?>"><?php echo  $reponse["Descriptionproduit"];  ?></option>
                        
                            <?php
                        }
                                    
                    ?>
                   
                </select>
                <div class="group_input">
                <label for="">Type operation</label>
                <select name="operation" id="" >
                    <option value="entree">entree</option>
                    <option value="sortie">sortie</option>
                </select>
                </div>
                
                <input type="submit" value="Afficher" class="bouton_enregistrer">
            </form>
        </div>
</body>
</html>