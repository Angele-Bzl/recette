<?php
$getData = $_GET;

if (!isset($getData['user_id']) || !is_numeric($getData['user_id'])) {
    echo('Il faut un identifiant pour supprimer le compte.');
    return;
}

?>