<!-- BLOQUE LE CONTENU SI LE USER EST DECONNECTE -->
<?php

if (!isset($_SESSION['LOGGED_USER'])) {
    echo('Il faut être authentifié pour cette action.');
    exit;
}
