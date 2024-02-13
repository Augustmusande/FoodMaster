<?php
include('connexion_bd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/liste_des_abonnes.css">
    <title>Liste des Abonnes</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
    
    ?>
    <div class="containeur_presence">
    <div class="header_presence"> 
        <H2>ETUDIANT DEJA INSCRIT </H2>  
    <a href="/projet_tutore/pages_php/inscription etudiant.php" class="bouton_enregistrer">Inscription</a>
    </div>
    <?php 
          $requete=$bdd->query("SELECT  id,Matricule,Nom,postNom  FROM etudiant order by id desc");
          echo "<table>";
          echo"<tr><th>Numero</th> <th>Matricule</th> <th>Nom</th> <th>Post-Nom</th></tr>";
        while($reponse=$requete->fetch()){
           echo"<tr>";
           echo "<td>".$reponse['id']."</td>";
           echo "<td>".$reponse['Matricule']."</td>";
           echo "<td>".$reponse['Nom']."</tdtd>";
           echo "<td>".$reponse['postNom']."</td>";
           echo"</tr>";
        }
        echo "</table>";

                    
                    ?>
   
    
   </div>
</body>
</html>