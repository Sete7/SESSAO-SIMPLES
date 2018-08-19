<?php
session_start();

if (isset($_SESSION['login']) && empty($_SESSION['login']) == false):
    echo "Login Efetuado com sucesso";
else:
    header('Location: login.php');
endif;
?>



<?php
try {

	if (!empty($_POST['nome'])) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = md5($_POST['senha']);

	$sql = $pdo->prepare("INSERT INTO usuario SET nome = '$nome', email = '$email', senha = '$senha'");
	$sql->bindValue(":nome", $nome);
	$sql->bindValue(":email", $email);
	$sql->bindValue(":senha", $senha);
	$sql->execute();

	echo "<h1>Cadastro realizado com sucesso!<h1>";
	}
} catch (PDOException $e) {
	echo "Erro" .$e->getMessage();
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
<a href="sair.php" >Sair</a>

