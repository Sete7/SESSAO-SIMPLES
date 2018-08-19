<?php

try{
    $pdo = new PDO("mysql:dbname=blog;host=localhost", "root","");
//    echo 'Conexao realizada com sucesso';
} catch (PDOException $e) {
    echo "Erro " .$e->getMessage();
}





//$conn = "mysql:dbname=blog;host=localhost";
//$user = "root";
//$pass = "";
//
//try {
//    $pdo = new PDO($conn, $user, $pass);
////    echo 'conexao efetuada';
//    $nome = "admin1";
//    $email = "admin1@gmail.com";
//    $senha = md5("12345");
//    $sql = "INSERT INTO usuario SET nome = '$nome', email = '$email', senha = '$senha'";
////    $sql = $pdo->query($sql);
//
//    echo "Cadastro realizado com sucesso" . $pdo->lastInsertId();
//} catch (PDOException $e) {
//    echo "Erro" . $e->getMessage();
//}
//
//try {
//
//    $pdo = new PDO($conn, $user, $pass);
//    $sql = "SELECT * FROM usuario";
//    $sql = $pdo->query($sql);
//
//    if ($sql->rowCount() > 0):
//        foreach ($sql->fetchAll() as $usuario):
//            echo "<br/>", "Nome: " . $usuario['nome'] . "Email: " . $usuario['email'] . "<br/>";
//            echo "======================================= <br/>";
//        endforeach;
//    endif;
//} catch (PDOException $e) {
//    echo "Erro" . $e->getMessage();
//    exit();
//}
//
//try {
//    $pdo = new PDO($conn, $user, $pass);
//    $id = 4;
//    $sql = "DELETE FROM usuario WHERE id = '$id'";
////    $sql = $pdo->query($sql);
//    echo "Usuario excluido com sucesso";
//} catch (PDOException $e) {
//    echo "Erro" . $e->getMessage();
//    exit();
//}
//
//try {
//    $pdo = new PDO($conn, $user, $pass);
//    $id = 3;
//    $nome = "Renata";
//    $email = "renata@gmail.com";
//    $sql = "UPDATE usuario SET nome='$nome',email='$email' WHERE id = '$id'";
//    $sql = $pdo->query($sql);    
//    echo "Usuario atualizado com sucesso";
//} catch (PDOException $e) {
//    echo "Erro " . $e->getMessage();
//}