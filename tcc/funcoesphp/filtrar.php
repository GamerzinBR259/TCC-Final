<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arapey:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/filtro.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community book pleiades</title>
</head>
<body>
</body>
</html>

<?php
include 'conexao.php';

// Inicializar a sessão (se já não estiver inicializada)
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    // Se não estiver autenticado, redirecione para a página de login
    header("Location: http://localhost:8012/tcc/login.php");
    exit;
}

// Inicializa a variável de filtro de gênero
$selectedGenre = "";

// Verifica se um gênero foi selecionado a partir do menu dropdown
if (isset($_GET['genre'])) {
    $selectedGenre = $_GET['genre'];

    // Filtra os livros com base no gênero selecionado
    $sql = "SELECT * FROM files WHERE genre LIKE '%$selectedGenre%'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Exibe os livros filtrados
        echo "<h2>Livros do Gênero: $selectedGenre</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            $fileId = $row["id"];
            $fileTitle = $row["title"];
            $imageFilename = $row["image_filename"];
            $autor = $row["autor"];
    
            // Exibe a imagem como um link para a página de detalhes
            echo "<section class='produto'>";
            echo "<a href='det.php?id=$fileId'>";
            echo "<img src='uploads/images/$imageFilename' alt='$fileTitle' class='img-livro'>";
            echo "</a><br>";
            echo "<p> $fileTitle<br></p>";
            echo "<p>Autor: $autor</p>";
            echo "</section>";
    


        }
    } else {
        echo "Nenhum livro encontrado.";
    }
}

mysqli_close($conn);

?>