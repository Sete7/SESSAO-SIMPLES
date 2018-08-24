<?php

require './config.php';

try {

    if (!empty($_GET['id'])):
        $id = addslashes($_GET['id']);
        $sql = $pdo->prepare("DELETE FROM usuario WHERE id='$id'");
        $sql->execute();
        header('Location: index.php');
        exit;
    endif;
} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
}

