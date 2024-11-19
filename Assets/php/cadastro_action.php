<HTML>
<HEAD>
<title>LosPollosHermanos -  Usuário</title>
</HEAD>
<BODY>
<?php
session_start();

$pnome = $_POST['nome'];
$pemail = $_POST['email'];
$psenha = $_POST    ['senha'];


if (empty($pnome) || empty($pemail) || empty($psenha)) {
    echo "<script language='javascript' type='text/javascript'>alert('Todos os campos são obrigatórios.');window.location.href='#'</script>";
} else {

        require_once('../conexao/conexao.php');
        $mysql = new BancodeDados();
        $mysql->conecta();
        $sqlstring = "INSERT INTO tbusuario(nome, email, senha) VALUES ('$pnome', '$pemail','$psenha')";
        $query = @mysqli_query($mysql->con, $sqlstring);

        if ($query) {
            echo "<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso.');window.location.href='login.php'</script>";
        } else {
            echo "<script language='javascript' type='text/javascript'>alert('Ops, não foi possível cadastrar. Tente novamente.');window.location.href='login.php'</script>";
        }
    }

?>

</BODY>
</HTML>
