<?php
session_start();
require "config.php";

if (isset($_POST['email']) && empty($_POST['email']) == false) {
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    try {
        $sql = $pdo->query("SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'");

        if ($sql->rowCount() > 0) {
            $dado = $sql->fetch();
            $_SESSION['login'] = $dado['email'];

            header('Location: index.php');
        }
    } catch (PDOException $e) {
        echo "Error " . $e->getMessage();
    }
}
?>

<h1>Login</h1>


<form action="login.php" method="POST">
    Email:
    <input type="email" name="email"/><br><br>
    Senha:
    <input type="password" name="senha"/><br><br>

    <input type="submit" value="Entrar"/>
</form>