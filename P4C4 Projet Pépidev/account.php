<!-- PROCESSUS DE CREATION DE COMPTE, PUIS AFFICHAGE D'UN MESSAGE DE VALIDATION -->
<?php
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Mon compte</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?>
        <!-- INFO SUR MON COMPTE -->
        <h1>Mon compte</h1>
        <?php require_once(__DIR__ . '/login.php'); ?>
       
        <!-- MODIFIER DES INFOS -->
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Modifier mes informations</h5>
                <button class='btn btn-warning'>Changer de mot de passe</button>
                <button class='btn btn-warning'>Modifier l'âge</button>
            </div>
        </div>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Plus envie de partager de recettes ?</h5>
                <div class="mb-3 visually-hidden">
                    <label for="id" class="form-label">Identifiant du compte</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php //echo $getData['user_id']; ?>">
                </div>
                <button class='btn btn-danger'><a class='text-reset' href="recipes_delete.php?id=<?php //echo($user['recipe_id']); ?>">Supprimer mon compte</a></button>
                <div class="form-text">La suppression est définitive et supprimera aussi toutes vos recettes sur le site.</div>

            </div>
        </div>
    </div>
    <?php //var_dump($users) ?>
    <?php require_once(__DIR__ . '/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
