<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/estilo-log.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="projeto de login inicial de um site">
    <meta name="keywords" content="user, senha and log">
    <meta name="author" content="Felipe S. silva">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community book pleiades</title>
</head>
<body>
</body>
</html>

<?php

// Arquivo de conexão com o banco de dados
include 'conexao.php';

// Função para validar um endereço de e-mail
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para exibir mensagens de erro
function show_error($message) {
    echo '<p class="error-message">' . $message . '</p>';
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Filtrar e validar os dados de entrada
    $loginValue = trim($_POST["x"]); // Valor inserido pelo usuário (pode ser nome de usuário ou e-mail)
    $senha = $_POST["w"];

    // Verificar se o nome de usuário ou e-mail não estão em branco
    if (empty($loginValue) || empty($senha)) {
        show_error("Por favor, preencha todos os campos.");
    } else {
        // Usar declarações preparadas para evitar ataques de injeção SQL
        $stmt = $conn->prepare("SELECT id, usuario, email, senha FROM logi WHERE usuario = ? OR email = ?");
        $stmt->bind_param("ss", $loginValue, $loginValue);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows === 1) {
                $row = $result->fetch_assoc();
                $senha_hash = $row["senha"];

                if (password_verify($senha, $senha_hash)) {
                    // Define um tempo limite de sessão de 90 minutos (em segundos)
                    $session_timeout = 90 * 60; // 90 minutos
                
                    // Define os parâmetros do cookie da sessão
                    session_set_cookie_params($session_timeout);
                
                    // Inicia a sessão
                    session_start();
                
                    $_SESSION["authenticated"] = true;
                    $_SESSION["usuario_id"] = $row["id"];
                
                    // Autenticação bem-sucedida, redirecionar para a página correta após o login
                    header("Location: http://localhost:8012/tcc/menu.php");
                    exit;
                } else {
                    show_error("Senha incorreta.");
                }
            } else {
                show_error("Nome de usuário ou e-mail não encontrado.");
            }
        } else {
            show_error("Erro na consulta ao banco de dados.");
        }

        $stmt->close();
    }

    $conn->close();
}?>