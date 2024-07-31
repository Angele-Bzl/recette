<!-- PAGE D'ACCUEIL ET DE CONNEXION -->
<!-- inclusion des variables et fonctions -->
<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de recettes - Page d'accueil</title>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
    >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
              <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column min-vh-100 mt-4 pt-4">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Site de recettes</h1>

        <!-- Formulaire de connexion -->
        <?php require_once(__DIR__ . '/login.php'); ?>

        <?php foreach (getRecipes($recipes) as $recipe) : ?>
            <?php if (isset($_SESSION['LOGGED_USER'])) : // if connexion, alors recettes?>
                <article class="row d-flex align-items-center">
                    <div class="col-12 gy-4 col-md-7 gy-md-0 mt-5">
                        <h3><?php echo($recipe['title']); ?></h3>
                        <div id="fullRecipe">
                            <div><?php echo $recipe['recipe']; ?></div>
                            <br>
                            <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                        </div>
                        <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']) : //if logged, alors bouton modifier supprimer?>
                        <ul class="list-group list-group-horizontal my-1">
                            <li class="list-group-item"><a class="link-warning" href="recipes_update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a></li>
                            <li class="list-group-item"><a class="link-danger" href="recipes_delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a></li>
                        </ul>
                    <?php endif; // endif bouton modifier supprimer?>
                    </div>
                    <div class="col offset-md-1 gy-4 pt-4">
                        <?php //if img, alors faire apparaitre img
                            $fileName='uploads/'. $recipe["recipe_id"] . '.jpg';
                            if(file_exists($fileName)){ 
                                echo'<img src="uploads/'; echo $recipe ["recipe_id"]; echo '.jpg" height="auto" width="100%" class="rounded">';
                            };
                        ?>
                    </div>
                    
                </article>
            <?php endif; // endif recettes ?>
        <?php endforeach; ?>
    </div>


    <!-- inclusion du bas de page du site -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
    <!-- STYLE -->
     <style>
        @media screen and (min-width: 80rem){
            #fullRecipe{
                overflow-y: auto;
                height: 15em;
            }
        }
     </style>
    <!-- SCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
