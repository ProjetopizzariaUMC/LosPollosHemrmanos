<HTML>
<HEAD>
<title>LosPollosHermanos -  Usuário</title>
</HEAD>
<link rel="shortcut icon" type="/img/mini_logo.png" href="../img/logobranco.png">



<BODY>
<?php
require_once('../conexao/conexao.php');
$mysql = new BancodeDados();
$mysql->conecta();
$pemail = $_POST['email'];
$psenha = $_POST['senha'];
$sqlstring = "SELECT * FROM tbusuario WHERE email='$pemail' AND senha='$psenha'";
$result = @mysqli_query($mysql->con, $sqlstring);
$total = $result->num_rows;

if ($total == 1) {
    $dados = mysqli_fetch_array($result);
    session_start();

    $_SESSION['nome'] = $dados['nome'];
    $_SESSION['email'] = $dados['email'];
    $_SESSION['senha'] = $dados['senha'];
    $_SESSION['log'] = 'ativo';

    echo "<script language='javascript' type='text/javascript'>
          alert('Você está logado!');
          window.location.href='../../indexlog.html';
          </script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
            alert('Ops, senha ou nome de usuario inválidos');
            window.location.href='login.php';
            </script>";
}

$mysql->fechar();
?>

</BODY>
</HTML>