<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/inscription etudiant.css">
    <title>Inscription Etudiant</title>
</head>
<body>
<?php
        include("hd/header_admin.php"); 
    
    ?>
<div class="form_conteneur">
        <h2>Inscription Etudiant</h2>
    <form action="inscription etudiant.php" METHOD='POST'>
        <div class="group_input">
            <label for="matricule">Matricule:</label>
            <input type="number" id="" name="matricule" required placeholder="Matricule">
        </div>
        <div class="group_input">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required placeholder="Nom de L'etudiant " >
        </div>
        <div class="group_input">
            <label for="post-nom">Post-Nom:</label>
            <input type="text" id="post-nom" name="post-nom" placeholder="Post-Nom de L'etudiant"required  >
        </div>
        <input type="submit" class="bouton_enregistrer" value='Inscrire' name="btn_inscription">
    </form>
</div>
<?php
    if(isset($_POST['btn_inscription'])){
        if(isset($_POST['matricule']) and isset($_POST['nom']) and isset($_POST['post-nom']) and $_POST['matricule'] != '' and $_POST['nom'] != ''){
            include('connexion_bd.php'); 
            $requete=$bdd->prepare("INSERT INTO etudiant (Matricule,Nom,PostNom,administrateur_id) VALUES (:Matricule,:Nom,:PostNom,:administrateur_id)");
            $requete->execute(array('Matricule'=>$_POST["matricule"],'Nom'=>$_POST["nom"],'PostNom'=>$_POST["post-nom"],'administrateur_id'=>$_SESSION["util"]));
            header('location:liste_des_abonnes.php');
        }else{
            echo '<p style="color:red;"> Pas de valeur dans les champs. </P>';
        }
         
    }
?>

</body>
</html>