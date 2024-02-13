
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header_admin</title>
</head>
<body>
<div class="header">
        <h2>FoodMaster</h2>
        <ul>
        <a href="/projet_tutore/pages_php/Acceuil.php" class="link">Acceuil</a>
        <a href="/projet_tutore/pages_php/liste_des_abonnes.php"  class="link">Etudiant</a>
        <a href="/projet_tutore/pages_php/Gestion_stocks.php"  class="link">Stock</a>
        <a href="hd/Deconnexion.php"  class="link">Deconnexion</a>
        </ul>
    </div>
    <style>

    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
      
        border:1px solid red;
        background-color: #d1cece; 
    }
    .header{
        height: 100px;
        background-color: #0a2642;
        color:#fff;
        width: 100%;
        padding: 20px;
        display: flex;
        justify-content: space-between;
    }
    .header h2{
        color:white;
    }

    .header ul{
        color: white;
        display: flex;
    }
    .link{
        list-style: none;
        margin-right: 15px;
        
    }
    
    .link{
        text-decoration:none;
        color:#fff;
        gap:2px;
    }
    .link:hover{
        /* font-weight: 500; */
        color: #1d8cfc;
        background-color: #e7dddd;
        border-radius: 3px;
        transition: 1000ms;
        height:30px;
        padding:5px;
    }
    .container_form{
        background-color: #ffffff;
        height: 400px;
        width: 410px;
        border-radius: 10px;
        padding-left: 20px;
        
    }
    .container_form h2{
        width: 350px;
        margin-bottom:20px;
        margin-top: 1.5%;
        
    }
    .container_form a{
        height:40px;
        width: 350px;
        background: #000;
        border-radius: 10px; 
        padding: 5px;
        color:white;
        margin-bottom: 10px;
        font-size: 15px;
        border: none;
        cursor: pointer;
        transition: all 500ms ease-in;
    }
</style>
</body>
</html>
