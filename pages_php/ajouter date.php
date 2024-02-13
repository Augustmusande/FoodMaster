<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/ajouter_date.css">
    <title>ajouter date</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
    
    ?>
    <div class="containeur">
<div class="form_conteneur">
    <h2>Ajouter une Date</h2>
    <form action="ajouter date.php" METHOD='POST'>
        <label for="date">Date et Heure</label>
        <input type="datetime-local" id="" name="datejour" class="date_input" required>
        <button type="submit" class="bouton_submit" name="btn_creer">Creer</button>
    </form>
</div>
<?php
        if(isset($_POST['btn_creer'])){
            if(isset($_POST['datejour'])){
                include('connexion_bd.php');
                $requete=$bdd->prepare("insert into datejour (datejour) values (:datejour)");
                $requete->execute(array('datejour'=>$_POST["datejour"]));
                header('location:Acceuil.php');
            }else{
                echo '<p style="color:red;"> Pas de valeur dans les champs. </P>';
            }
             
        }
    ?>
    
</body>
</html>