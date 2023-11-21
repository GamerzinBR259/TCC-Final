<?php
include 'conexao.php';

if (isset($_GET["file"])) {
    $fileName = basename($_GET["file"]);
    $filePath = "uploads/" . $fileName;

    if (file_exists($filePath)) {
        header("Content-Disposition: attachment; filename=\"" . $fileName . "\"");
        header("Content-Type: application/octet-stream");
        header("Content-Length: " . filesize($filePath));

        readfile($filePath);
        exit;
    } else {
        echo "O arquivo não existe.";
    }
}
// Não é mais necessário exibir a mensagem "Nome do arquivo não fornecido."
?>

