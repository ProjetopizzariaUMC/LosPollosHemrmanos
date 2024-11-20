<?php
session_start();
require_once('../conexao/conexao.php');

// Verifica se o formulário foi enviado corretamente
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Obtém os valores dos campos do formulário
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $confirmar_senha = trim($_POST['confirmar_senha']);

    // Verifica se os campos obrigatórios estão preenchidos
    if (empty($nome) || empty($email) || empty($senha) || empty($confirmar_senha)) {
        echo "<script>alert('Todos os campos são obrigatórios.'); window.location.href='C:\xampp\htdocs\LosPollosHermanos\indexlog.html';</script>";
        exit;
    }

    // Verifica se as senhas coincidem
    if ($senha !== $confirmar_senha) {
        echo "<script>alert('As senhas não coincidem.'); window.location.href='C:\xampp\htdocs\LosPollosHermanos\indexlog.html';</script>";
        exit;
    }

    // Cria uma nova instância da conexão
    $mysql = new BancodeDados();
    $mysql->conecta();

    // Verifica se o usuário existe antes de tentar excluí-lo
    $sql_verifica = "SELECT * FROM tbusuario WHERE nome=? AND email=? AND senha=?";
    $stmt_verifica = $mysql->con->prepare($sql_verifica);
    $stmt_verifica->bind_param("sss", $nome, $email, $senha);
    $stmt_verifica->execute();
    $result = $stmt_verifica->get_result();

    if ($result->num_rows === 1) {
        // O usuário existe, então prossegue com a exclusão
        $sql_delete = "DELETE FROM tbusuario WHERE nome=? AND email=? AND senha=?";
        $stmt_delete = $mysql->con->prepare($sql_delete);
        $stmt_delete->bind_param("sss", $nome, $email, $senha);

        if ($stmt_delete->execute()) {
            echo "<script>alert('Conta excluída com sucesso.'); window.location.href='C:\xampp\htdocs\LosPollosHermanos\indexlog.html';</script>";
        } else {
            echo "<script>alert('Erro ao excluir a conta.'); window.location.href='C:\xampp\htdocs\LosPollosHermanos\indexlog.html';</script>";
        }
        $stmt_delete->close();
    } else {
        echo "<script>alert('Dados incorretos ou conta não encontrada.'); window.location.href='C:\xampp\htdocs\LosPollosHermanos\indexlog.html';</script>";
    }

    // Fecha os prepared statements e a conexão
    $stmt_verifica->close();
    $mysql->fechar();
} else {
    echo "<script>alert('Ação inválida.'); window.location.href='C:\xampp\htdocs\LosPollosHermanos\indexlog.html';</script>";
}
?>
