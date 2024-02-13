<?php include('connexion_bd.php');?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/liste_presences.css">
    <title>liste des presences</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
    
    ?>
   
    <div class="containeur_presence">
    <div class="header_charger"> 
        <H2>PRESENCE DU </H2>
        <?php 
            $datajour_id= $_GET['id'];
            $requeteOne=$bdd->query("SELECT * from datejour where id='$datajour_id'");
           
             while($reponseDateJour=$requeteOne->fetch()){
                echo $reponseDateJour['datejour'];
             }
           
        ?>
    <a href="charger/charger.php?id=<?php echo $_GET['id']; ?>" class="bouton_charger">Charger</a>
    </div>
    <?php 
          $requete=$bdd->query("SELECT  *  FROM presence where datejour_id='$datajour_id'");
          echo "<table>";
          echo"<tr><th>Numero</th><th>Matricule</th> <th>Nom</th> <th>Post-Nom</th> <th>Matin</th> <th>Midi</th> <th>Soir</th></tr>";
        while($reponse=$requete->fetch()){
            $et_id=$reponse['etudiant_id'];
            $pres_id=$reponse['id'];
            $requeteEt=$bdd->query("SELECT  *  FROM etudiant where id='$et_id'");
            while($reponseEtu=$requeteEt->fetch()){
                echo"<tr>";
                echo "<td>".$reponse['etudiant_id']."</td>";
                echo "<td>".$reponseEtu['Matricule']."</td>";
               echo "<td>".$reponseEtu['Nom']."</td>";
               echo "<td>".$reponseEtu['PostNom']."</td>";
                echo  $reponse['matin']==1?"<td><a class='aff'  href='presence/update_matin.php?id=$pres_id&id_date=$datajour_id'>Present</a></td>": "<td><a class='sup'  href='presence/update_matin.php?id=$pres_id&id_date=$datajour_id'>Absent</a></td>";
                echo  $reponse['midi']==1?"<td><a class='aff' href='presence/update_midi.php?id=$pres_id&id_date=$datajour_id'>Present</a></td>": "<td><a class='sup'  href='presence/update_midi.php?id=$pres_id&id_date=$datajour_id'>Absent</a></td>";
                echo  $reponse['soir']==1?"<td><a class='aff'  href='presence/update_soir.php?id=$pres_id&id_date=$datajour_id'>Present</a></td>": "<td><a  class='sup' href='presence/update_soir.php?id=$pres_id&id_date=$datajour_id'>Absent</a></td>";
                 
                 
               echo"</tr>";

            }
        }
        echo "</table>";

                    
                    ?>
       
    </div>
</body>
</html>