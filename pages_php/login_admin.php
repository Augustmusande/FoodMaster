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
    <h2>Connexion FoodMaster</h2>
    <form action="login_admin.php" METHOD='get'>
    
    
    <div class="form_group">
        <label for="email" >Nom ou E-mail</label>
        <input type="email" id="e-mail" name="mail" placeholder="Admin@gmail" required>
    </div>
    <div class="form_group">
        <label for="motdepasse" >Mot de passe</label>
        <input type="text" class="motDePasse" placeholder="Mot de passe" required name="motdepasse">
        <p class="message"></p>

     </div>
    <input type="submit" class="bouton_login" name='login_btn'value='Se Connecter'>
    </form>
    <?php
        if (isset($_GET['login_btn'])){
            include("connexion_bd.php");
            
                if ( $_GET["mail"]!='' || $_GET["motdepasse"]!=''){
                    $Mail=$_GET["mail"];
                    $Pass=$_GET['motdepasse'];
                    $ReqLogin=$bdd->prepare("select * from administrateur where Email='$Mail' && Motdepasse='$Pass'");
                    $ReqLogin->execute();
                    while($AffLog=$ReqLogin->fetch()){
                    $ReqLogin=$bdd->prepare("select * from administrateur where Email='$Mail' && Motdepasse='$Pass'");
                        if($AffLog['Motdepasse'] && $AffLog['Email']){
                            $_SESSION["util"]=$AffLog['id'];
                            header('location:Acceuil.php');
                        } 
                        
                    }
                                   
            }   
        }
       
    ?>
<script>
    // Vérifie la longueur du mot de passe
function verifierMotDePasse(motDePasse) {
  if (motDePasse.length < 4) {
    // Affiche un message d'erreur
    document.querySelector(".message").innerHTML = "Mot de passe faible";
    document.querySelector(".message").style.color = "red";
    return false;
      } 
      else {
    // Affiche un message de succès
    document.querySelector(".message").innerHTML = "Mot de passe fort";
    document.querySelector(".message").style.color = "green";
    return true;
  }
}

// Surveille le champ du mot de passe
document.querySelector(".motDePasse").addEventListener("keyup", function() {
  verifierMotDePasse(this.value);
});

</script>
</body>

</html>