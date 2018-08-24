<?php
session_start();
require "./config.php";

if (isset($_SESSION['login']) && empty($_SESSION['login']) == false):
    echo "Login Efetuado com sucesso";
else:
    header('Location: login.php');
endif;
?>



<?php
try {

    if (!empty($_POST['nome'])):
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = md5($_POST['senha']);

        $sql = $pdo->prepare("INSERT INTO usuario SET nome='$nome',email='$email',senha='$senha'");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", $senha);
        $sql->execute();
        if ($nome == " "):
            echo "preencha o campo nome";
        elseif ($email == " "):
            echo "preencha o campo email";
        elseif ($senha == " "):
            echo "preencha o campo senha";
        else:
            echo "Cadastro realizado com sucesso";
        endif;
    endif;
} catch (PDOException $e) {
    echo "Erro " . $e->getMessage();
    exit;
}
?>
<h1>Cadastrar um novo Usuário</h1>

<form method="POST">
    Nome:
    <input type="text" name="nome" /><br/><br/>
    Email:
    <input type="email" name="email"/><br/><br/>
    Senha:
    <input type="password" name="senha"/><br/><br/>
    <input type="submit" value="Cadastrar"/>
</form>


<?php
echo '<br/><br/>';
echo '<h1>Lista de Usuários</h1>';
    $sql = $pdo->query("SELECT * FROM usuario ORDER BY id DESC");
    $sql->execute();
    if($sql->rowCount() > 0):
        foreach ($sql->fetchAll() as $usuario):
            echo '<tr>';
            echo '<td> Nome: ' . $usuario['nome'] . ' Email: ' . $usuario['email'] .'</tr>';
            echo '<td><a href="editar.php?id= '. $usuario['id'] .'" >Editar</a> | <a href="excluir.php?id='. $usuario['id'] .'" >Excluir</a></td></br>';
            echo '</tr>';
        endforeach;
    endif;
?>

<a href="sair.php" >Sair</a>