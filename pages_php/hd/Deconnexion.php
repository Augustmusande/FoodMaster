<?php
    session_start();
    unset($_SESSION["util"]);      
    unset($_SESSION["etudiant"]);      
    session_destroy();
    header('location:/projet_tutore/pages_php/index.php');
    exit;
?>