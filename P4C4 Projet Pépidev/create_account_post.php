<!-- PROCESSUS DE CREATION DE COMPTE, PUIS AFFICHAGE D'UN MESSAGE DE VALIDATION -->
<?php
session_start();

require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

// Vérification du formulaire soumis
if (
    empty($postData['email'])
    || empty($postData['password'])
    || empty($postData['full_name'])
    || trim(strip_tags($postData['email'])) === ''
    || trim(strip_tags($postData['password'])) === ''
    || trim(strip_tags($postData['full_name'])) === ''
) {
    echo 'Il faut un prénom, un email et un mot de passe pour créer un compte.';
    return;
}

//récupération des données
$email = trim(strip_tags($postData['email']));
$password = trim(strip_tags($postData['password']));
$full_name = trim(strip_tags($postData['full_name']));
$age = trim(strip_tags($postData['age']));


// Faire l'insertion en base
$insertRecipe = $mysqlClient->prepare('INSERT INTO users(full_name, email, password, age) VALUES (:full_name, :email, :password, :age)');
$insertRecipe->execute([
    'full_name' => $full_name,
    'email' => $email,
    'password' => $password,
    'age' => $age,
]);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création du compte</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?>
        <!-- MESSAGE DE SUCCES -->
        <h1>Compte créé avec succès !</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Bienvenue <?php echo $full_name ; ?> !</h5>
                <p class="card-text"><b>Email de connexion</b> : <?php echo $email; ?></p>
                <p>Vous pouvez maintenant retourner sur la page d'accueil et vous connecter.</p>
            </div>
        </div>
    </div>
    <?php require_once(__DIR__ . '/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
