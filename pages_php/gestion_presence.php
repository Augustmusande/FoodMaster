<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/projet_tutore/style css/gestion_presence.css">
    <title>gestion_presence</title>
</head>
<body>
<?php
    include("entete.php");    
    ?>
    <header class="">
        
        <h1>Gestion des Presences</h1>
    </header>
    <div class="containeur_presence">
        <form action="">
            <div class="group_select">
                <label for="matin">Matin:</label>
                <select name="matin" id="matin">
                    <option value="absent">Selectionner un Etudiant</option>
                    <option value="etudiant1">gentine</option>
                    <option value="etudiant2">FABA</option>
                    <option value="etudiant1">gentine</option>
                    <option value="etudiant2">FABA</option>
                    <option value="etudiant1">gentine</option>
                    <option value="etudiant2">FABA</option>
                    <option value="etudiant1">gentine</option>
                    <option value="etudiant2">FABA</option>
                    <option value="etudiant1">gentine</option>
                    <option value="etudiant2">FABA</option>
                </select>

            </div>
            <div class="group_select">
                <label for="midi">Midi:</label>
                <select name="midi" id="midi">
                    <option value="absent">Selectionner un Etudiant</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                </select>
            </div>

            <div class="group_select">
                <label for="soir">Soir:</label>
                <select name="midi" id="Soir">
                    <option value="absent">Selectionner un Etudiant</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                    <option value="etudiant1">muhindo</option>
                    <option value="etudiant2">kasero</option>
                </select>
            </div>
            <button type="submit" class="bouton_submit">Soumettre</button>
        </form>
    </div>
</body>
</html>