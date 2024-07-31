<!-- PAGE DE CREATION DE COMPTE QUAND ON CLIQUE SUR 'créer son compte'  -->
<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Créer son compte</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100 mt-5 pt-4">
    <div class="container">

        <?php require_once(__DIR__ . '/header.php'); ?>

        <h1>Créer son compte</h1>
        <form action="create_account_post.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="full_name" class="form-label">Prénom et nom</label>
                <input type="text" class="form-control" id="full_name" name="full_name" aria-describedby="title-help" placeholder='Ex : Jean Dupont'>
                <div class="form-text">Votre nom et prénom apparaitront sous vos recettes publiquement.</div>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Âge</label>
                <input type="number" class="form-control" id="age" name="age" aria-describedby="title-help">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="title-help">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password"></input>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

    <?php require_once(__DIR__ . '/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
