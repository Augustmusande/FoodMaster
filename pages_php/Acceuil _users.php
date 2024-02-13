<?php
session_start();
include('connexion_bd.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/acceuil_users.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="/projet_tutore/style css/liste_presences.css">
    <title>Acceuil</title>
</head>
<body>
<?php
        include("hd/header.php"); 
    
    ?>
    <!-- <button class="bouton_ajout">Ajouter Exercice +</button> -->
    <h2>Presences</h2>
    <div class="containeur">
        <div>
            <div>

                <?php 
                 $requetepresenceTot=$bdd->prepare("SELECT  *  FROM presence where matin=:matin AND etudiant_id=:etudiant_id ");
                 $requetepresenceTot->execute(array( 
                     "etudiant_id"=>$_SESSION["etudiant"],
                 "matin"=>1,
                ));
                $nb_results_matin = $requetepresenceTot->rowCount();
                ?>
            <div  class="tot">Total presence matin : <?php echo $nb_results_matin  ?></div>
            </div>
            
            <div>
            <?php 
                 $requetepresenceTotMidi=$bdd->prepare("SELECT  *  FROM presence where midi=:midi AND etudiant_id=:etudiant_id ");
                 $requetepresenceTotMidi->execute(array( 
                 "etudiant_id"=>$_SESSION["etudiant"],
                 "midi"=>1,
               ));
               $nb_results_midi = $requetepresenceTotMidi->rowCount();
            ?>
                <div  class="tot">Total presence midi : <?php echo $nb_results_midi  ?></div>
            </div>
            <div>
            <?php 
                 $requetepresenceTotsoir=$bdd->prepare("SELECT  *  FROM presence where soir=:soir AND etudiant_id=:etudiant_id ");
                 $requetepresenceTotsoir->execute(array( 
                 "etudiant_id"=>$_SESSION["etudiant"],
                 "soir"=>1,
               ));
               $nb_results_soir = $requetepresenceTotsoir->rowCount();
            ?>
                <div class="tot">Total presence soir : <?php echo $nb_results_soir  ?></div>
            </div>
            <div class="tot">Total par année : <?= $nb_results_soir+$nb_results_midi+$nb_results_matin ?></div>

        </div>
       
        <div class="dates">
        <?php 
          $requete=$bdd->query("SELECT * FROM datejour ORDER BY dateJOUR desc");
        while($reponse=$requete->fetch()){
            ?>
             <div class='presence_container' style="display:flex;aligns_items:center;">
                <i class="fa fa-bars" aria-hidden="true"></i>
               <?php echo  $reponse["datejour"];  ?>
                 
                <?php  $requetepresence=$bdd->prepare("SELECT  *  FROM presence where datejour_id=:datejour_id AND etudiant_id=:etudiant_id ");
         $requetepresence->execute(array(
         "datejour_id"=>$reponse["id"],
         "etudiant_id"=>$_SESSION["etudiant"]
       ));
        
        while($reponsepresence=$requetepresence->fetch()){
                echo  $reponsepresence['matin']==1?"<td><a class='aff' >Present</a></td>": "<td><a class='sup' >Absent</a></td>";
                echo  $reponsepresence['midi']==1?"<td><a class='aff'>Present</a></td>": "<td><a class='sup' >Absent</a></td>";
                echo  $reponsepresence['soir']==1?"<td><a class='aff'>Present</a></td>": "<td><a  class='sup'>Absent</a></td>";
            
            
        }
        

                    
                    ?>
                </div>
          
            <?php
        }
                    
            ?>
           
           
        </div>
    </div>
    
</body>

</html>