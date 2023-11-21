<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arapey:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/menu-nav.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community book pleiades</title>
</head>
<body>
</body>
</html>

</head>
<body>

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

// Defina a quantidade de livros a serem exibidos por página
$livrosPorPagina = 7;

// Determine a página atual com base em um parâmetro na URL
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcule o deslocamento para a consulta SQL
$offset = ($pagina - 1) * $livrosPorPagina;

// Consulta para obter os livros com avaliações acima de 4
$sql = "SELECT * FROM files WHERE media_avaliacoes > 4 LIMIT $offset, $livrosPorPagina";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {


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
    echo "Nenhum livro encontrado com avaliação acima de 4.";
}

// Crie links para navegar entre as páginas
$totalLivros = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM files WHERE media_avaliacoes > 4")); // Total de livros com avaliação acima de 4
$totalPaginas = ceil($totalLivros / $livrosPorPagina); // Total de páginas

echo "<div class='pagination'>";
for ($i = 1; $i <= $totalPaginas; $i++) {
    echo "<a  href='?pagina=$i'>$i</a> ";
}
echo "</div>";

mysqli_close($conn);
?>

</body>
</html>
