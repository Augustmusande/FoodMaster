<?php

        $id=$_GET['id'];
        include('../connexion_bd.php');
        $requete=$bdd->query("SELECT  *  FROM etudiant");
        
        $sql = "SELECT  COUNT(*)  FROM presence where datejour_id='$id'";
        $stmt = $bdd->prepare($sql);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        if($count<=0){
            while($reponse=$requete->fetch()){
                $etudiant_id=$reponse['id']; 
                $requeteInsert=$bdd->prepare("insert into presence (matin,midi,soir,etudiant_id,datejour_id) values (:matin_val,:midi_val,:soir_val,:etudiant_id_val,:datejour_id_val)");
                $requeteInsert->execute(array('matin_val'=>0,'midi_val'=>0,'soir_val'=>0,'etudiant_id_val'=>$etudiant_id,'datejour_id_val'=>$id,));   
            }
        }
        
         
        header("location:../liste_presences.php?id=$id"); 