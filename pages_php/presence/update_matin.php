<?php

$id=$_GET['id'];
$datajour_id=$_GET['id_date'];
include('../connexion_bd.php');

$sql = "SELECT  *  FROM presence where id='$id'";
$stmt = $bdd->prepare($sql);
$stmt->execute();
while($reponse=$stmt->fetch()){
    if($reponse['matin']==0){
        $update=$bdd->prepare("UPDATE presence SET matin=:matin,midi=:midi,soir=:soir,etudiant_id=:etudiant_id,datejour_id=:datejour_id where id='$id'");
        $update->execute(array('matin'=>1,'midi'=>$reponse['midi'],'soir'=>$reponse['soir'],'etudiant_id'=>$reponse['etudiant_id'],'datejour_id'=>$reponse['datejour_id']));
    }else{
        $update=$bdd->prepare("UPDATE presence SET matin=:matin,midi=:midi,soir=:soir,etudiant_id=:etudiant_id,datejour_id=:datejour_id where id='$id'");
        $update->execute(array('matin'=>0,'midi'=>$reponse['midi'],'soir'=>$reponse['soir'],'etudiant_id'=>$reponse['etudiant_id'],'datejour_id'=>$reponse['datejour_id']));

    }

}
header("location:../liste_presences.php?id=$datajour_id");
