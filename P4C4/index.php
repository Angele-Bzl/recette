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
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">
        <!-- inclusion de l'entête du site -->
        <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Site de recettes</h1>

        <!-- Formulaire de connexion -->
        <?php require_once(__DIR__ . '/login.php'); ?>

        <?php foreach (getRecipes($recipes) as $recipe) : ?>
            <?php if (isset($_SESSION['LOGGED_USER'])) : // if connexion, alors recettes?>
                <article>
                    <h3><?php echo($recipe['title']); ?></h3>
                    <div><?php echo $recipe['recipe']; ?></div>
                    <?php //if img, alors faire apparaitre img
                        $fileName='uploads/'. $recipe["recipe_id"] . '.jpg';
                        if(file_exists($fileName)){ 
                            echo'<img src="uploads/'; echo $recipe ["recipe_id"]; echo '.jpg" height="100px">';
                        };
                    ?>
                    <i><?php echo displayAuthor($recipe['author'], $users); ?></i>
                    <?php if (isset($_SESSION['LOGGED_USER']) && $recipe['author'] === $_SESSION['LOGGED_USER']['email']) : //if logged, alors bouton modifier supprimer?>
                        <ul class="list-group list-group-horizontal">
                            <li class="list-group-item"><a class="link-warning" href="recipes_update.php?id=<?php echo($recipe['recipe_id']); ?>">Editer l'article</a></li>
                            <li class="list-group-item"><a class="link-danger" href="recipes_delete.php?id=<?php echo($recipe['recipe_id']); ?>">Supprimer l'article</a></li>
                        </ul>
                    <?php endif; // endif bouton modifier supprimer?>
                </article>
            <?php endif; // endif recettes ?>
        <?php endforeach; ?>
    </div>

    <!-- inclusion du bas de page du site -->
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>
