<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estlo-info-livro.css">
</head>
<body>
    
</body>
</html>

<?php
include './funcoesphp/conexao.php';

// Inicializar a sessão (se já não estiver inicializada)
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    // Se não estiver autenticado, redirecione para a página de login
    header("Location: http://localhost:8012/tcc/login.php");
    exit;
}

// Obtém o ID do livro da URL
if (isset($_GET['id'])) {
    $fileId = $_GET['id'];

    // Busca os detalhes do livro no banco de dados usando o ID
    $sql = "SELECT * FROM files WHERE id = $fileId";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fileTitle = $row["title"];
        $fileGenre = $row["genre"];
        $pdfFilename = $row["pdf_filename"];
        $imageFilename = $row["image_filename"];
        $sinopse = $row["sinopse"];
        $autor = $row["autor"];

        // Exibe os detalhes do livro de forma organizada
        echo "<h1>$fileTitle</h1>";
        echo "<img class='imagem-livro' src='./uploads/images/$imageFilename' alt='$fileTitle'><br>";
        echo "<p class='genero-livro'><strong>Gênero:</strong> $fileGenre</p>";
        echo "<p class='autor-livro'><strong>Autor:</strong>  $autor</p>";
        echo "<p class='sinopse-livro'><strong>Sinopse:</strong> $sinopse</p>";

        // Botão para ler online (abre o PDF em uma nova aba)
        echo "<button class='lendo-online'><a href='uploads/$pdfFilename' target='_blank'>Ler Online</a></button>";

        // Botão para baixar o livro (fornece o link para download)
        echo "<button class='baixando-livro'><a href='uploads/$pdfFilename' download>Baixar PDF</a></button>";
    } else {
        echo "Livro não encontrado.";
    }
} else {
    echo "ID do livro não fornecido na URL.";
}

mysqli_close($conn);
?>

