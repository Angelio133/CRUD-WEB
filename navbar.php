<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .navbar {
    background: transparent !important; /* Supprime le fond */
    border: none; /* Supprime la bordure */
    box-shadow: none; /* Supprime l'ombre éventuelle */
    
}
.navbar {
    background: transparent !important; /* Rendre le fond transparent */
    border: 2px solid white; /* Ajouter une bordure blanche */
    border-radius: 10px; /* Arrondir les coins */
    padding: 10px 20px; /* Ajouter un peu d'espace à l'intérieur */
    margin: 10px auto; /* Centrer la navbar */
    width: 90%; /* Ajuster la largeur pour qu'elle ne prenne pas tout l'écran */
    box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2); /* Effet d'ombre pour du style */
    
}

/* Changer la couleur des liens */
.navbar-default .navbar-nav > li > a {
    color: white !important;
    font-weight: bold;
}

/* Ajouter une bordure autour des éléments du menu */
.navbar-nav {
    border-radius: 10px;
    background: rgba(0, 0, 0, 0.5); /* Fond semi-transparent pour le style */
    padding: 5px;
}
.navbar-navbar-default{

        margin-top: 50px;
}

/* Espacement entre les liens */
.navbar-nav > li {
    margin: 0 10px;
}
nav ul{
    background-color: red;
    margin-top: 15px;
}
nav ul li a {
   text-decoration: none; 
   color: rgba(32, 15, 218, 0.532);        
}
    </style>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <h1 class="navbar">R¤save</h1>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="home.php">Voir les personnelles</a></li>
            <li><a href="create.php">S'incrire</a></li>
        </ul>
    </div>
</nav>

</body>
</html>