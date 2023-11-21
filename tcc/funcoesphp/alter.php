<?php
include 'conexao.php'; // Inclua seu arquivo de conexão com o banco de dados

// Função para exibir mensagens de erro
function show_error($message) {
    echo '<p class="error-message">' . $message . '</p>';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['x'];
    $novaSenha = $_POST['w'];

    // Verifique se o e-mail existe na tabela
    $sql = "SELECT id, senha FROM logi WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Obtém o hash de senha atual do usuário
        $row = $result->fetch_assoc();
        $senha_atual_hash = $row['senha'];

        // Crie um novo hash da nova senha
        $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Atualize a senha com o novo hash
        $updateSql = "UPDATE logi SET senha = ? WHERE email = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ss", $novaSenhaHash, $email);

        if ($updateStmt->execute()) {
            echo "Senha atualizada com sucesso!";
            header("Location: http://localhost:8012/tcc/login.php");
        } else {
            show_error("Erro ao atualizar a senha: " . mysqli_error($conn));
        }

        $updateStmt->close();
    } else {
        show_error("E-mail não encontrado.");
    }

    $stmt->close();
    $conn->close();
}
?>
<!-- Seu formulário de alteração de senha aqui -->
