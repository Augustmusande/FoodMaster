<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header_users </title>
    <style>
        .header {
            height: 100px;
            background-color: #0a2642;
            color: #fff;
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header ul {
            color: white;
            display: flex;
            margin-left: auto;
            list-style: none;
        }

        .link {
            list-style: none;
            margin-right: 15px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
        }

        .link:hover {
            color: #1d8cfc;
            background-color: #e7dddd;
            border-radius: 3px;
            transition: 1000ms;
            height: 20px;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>FoodMaster</h2>
        <ul>
            <li><a href="/projet_tutore/pages_php/Acceuil _users.php" class="link">Acceuil</a></li>
            <li><a href="hd/Deconnexion.php" class="link">Deconnexion</a></li>
        </ul>
    </div>
</body>
</html>
