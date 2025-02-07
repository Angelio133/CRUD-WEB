<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créapreneur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .hero-section {
            color: white;
            text-align: center;
            padding: 100px 20px;
        }
        .cta-button {
            background-color: rgba(32, 15, 218, 0.532);
            color: white;
            margin-top: 50px;
            padding: 10px;
            font-size: 18px;
            border-radius: 20px;
            text-decoration: none;
            
        }
        h1{
            color: white;
        }
        ul li a {
            
        }
        .cta-button:hover {
            background-color: #e07b00;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<?php 
    include("navbar.php");
?>

<!-- Section principale -->
<div class="hero-section">
    <h1>Pour le developpement de la numerisations de nos employées !!!</h1>
    <a href="create.php" class="cta-button">Inscrire nouveau employee</a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
