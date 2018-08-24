<?php
require './config.php';

$id = 0;
if (!empty($_GET['id'])):
    $id = $_GET['id'];
endif;

if (!empty($_POST['nome'])):
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE usuario SET nome='$nome', email='$email' WHERE id = '$id'";
    $sql = $pdo->query($sql);
    header('Location: index.php');
endif;

$sql = "SELECT * FROM usuario WHERE id = '$id'";
$sql = $pdo->query($sql);
if ($sql->rowCount() > 0):
    $dados = $sql->fetch();
else:
    echo 'erro';
endif;
?>

<h1>Atualize os dados do Usuário</h1>

<form method="POST">
    Nome:
    <input type="text" name="nome" value="<?php echo $dados['nome'] ?>" /><br/><br/>
    Email:
    <input type="email" name="email" value="<?php echo $dados['email'] ?>"/><br/><br/>

    <input type="submit" value="Atualizar dados"/>
</form>
