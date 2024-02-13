<?php
     
        $id=$_GET['id'];
        include('../connexion_bd.php');
        $Delete=$bdd->prepare("DELETE FROM datejour where id=:idjour");
        $Delete->execute(array('idjour'=>$id));
         
       header("location:../Acceuil.php");
    
?>