<?php
session_start();
require_once('../conexao/conexao.php');

$nome_antigo = $_POST['nome_antigo'];
$nome_novo = $_POST['nome_novo'];
$email_antigo = $_POST['email_antigo'];
$email_novo = $_POST['email_novo'];
$senha_antiga = $_POST['senha_antiga'];
$senha_nova = $_POST['senha_nova'];
$confirmar_senha = $_POST['confirmar_senha'];

if (empty($nome_antigo) || empty($email_antigo) || empty($senha_antiga)) {
    echo "<script>alert('Todos os campos antigos são obrigatórios.'); window.location.href='atualizar_cadastro.php';</script>";
    exit;
}

if ($senha_nova !== $confirmar_senha) {
    echo "<script>alert('A nova senha e a confirmação não coincidem.'); window.location.href='atualizar_cadastro.php';</script>";
    exit;
}

$mysql = new BancodeDados();
$mysql->conecta();

$sql_verifica = "SELECT * FROM tbusuario WHERE nome='$nome_antigo' AND email='$email_antigo' AND senha='$senha_antiga'";
$result = mysqli_query($mysql->con, $sql_verifica);

if (mysqli_num_rows($result) == 1) {
    $sql_update = "UPDATE tbusuario SET 
                   nome = '$nome_novo', 
                   email = '$email_novo', 
                   senha = '$senha_nova' 
                   WHERE nome = '$nome_antigo' AND email = '$email_antigo'";

    if (mysqli_query($mysql->con, $sql_update)) {
        echo "<script>alert('Cadastro atualizado com sucesso!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar cadastro.'); window.location.href='atualizar_cadastro.php';</script>";
    }
} else {
    echo "<script>alert('Dados antigos incorretos.'); window.location.href='atualizar_cadastro.php';</script>";
}

$mysql->fechar();
?>
