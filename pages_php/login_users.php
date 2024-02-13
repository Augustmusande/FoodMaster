<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/connexion.css">
    <title>login page</title>
</head>
<body>
    
       
    </div>
   <div class="conteneur_log">
    <h2>Connexion  FoodMaster</h2>
    <form action="login_users.php" METHOD='get'>
    
    
    <div class="form_group">
        <label for="email" >Matricule</label>
        <input type="number" id="matr" name="Matricule" required>
    </div>
    <div class="form_group">
        <label for="motdepasse" >Nom</label>
        <input type="text" id="nom" name="Nom" required>
    </div>
    <input type="submit" class="bouton_login" name='login_btn'value='Se Connecter'>
    </form>
    <?php
        if (isset($_GET['login_btn'])){
            include("connexion_bd.php");
            
                if ( $_GET["Matricule"]!='' || $_GET["Nom"]!=''){
                    $Matricule=$_GET["Matricule"];
                    $Nom=$_GET['Nom'];
                    $ReqLogin=$bdd->prepare("select * from etudiant where Matricule=' $Matricule' && Nom='$Nom'");
                    $ReqLogin->execute();
                    while($AffLog=$ReqLogin->fetch()){                       
                         if($AffLog['Matricule'] && $AffLog['Nom']){
                            $_SESSION["etudiant"]=$AffLog['id'];
                            header('location:Acceuil _users.php');
                        } 
                    }                   
            }   
        }
       ?>




</body>

</html>