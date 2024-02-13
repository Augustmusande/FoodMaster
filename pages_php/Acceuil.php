<?php
include('connexion_bd.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/Acceuil.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <title>Acceuil</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
    
    ?>
    <!-- <button class="bouton_ajout">Ajouter Exercice +</button> -->
    <a href="/projet_tutore/pages_php/ajouter date.php" class="bouton_ajout">Ajouter Exercice +</a>
    <div class="containeur">
    
        <h2>Presences</h2>
        <div class="dates">
        <?php 
          $requete=$bdd->query("SELECT * FROM datejour ORDER BY dateJOUR desc");
        while($reponse=$requete->fetch()){
            ?>
             <div class='presence_container' style="display:flex;aligns_items:center;">
                <i class="fa fa-bars" aria-hidden="true"></i>
               <?php echo  $reponse["datejour"];  ?>
                <a href="liste_presences.php?id=<?php echo $reponse['id']; ?>" class="aff">Afficher</a>
                <a href="delete/supprimer_jour.php?id=<?php echo $reponse['id']; ?>" class="sup" >Supprimer</a>
            
            </div>
          
            <?php
        }
                    
            ?>
           
        </div>
    </div>
   
</body>

</html>