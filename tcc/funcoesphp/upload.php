<?php



include 'conexao.php';

$uploadOk = 1; // Inicializa a variável $uploadOk
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $autor = $_POST["autor"]; // Obtém o valor do campo "autor"
    $sinopse = $_POST["sinopse"];
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verifica se o arquivo é um PDF ou uma imagem
    if ($imageFileType !== "pdf" && !in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
        $message = "Desculpe, apenas arquivos PDF, JPG, JPEG, PNG e GIF são permitidos.";
        $uploadOk = 0;
    }

    // Restante do código de validação do arquivo (tamanho, existência, etc...)

    // Se tudo estiver ok, tenta fazer o upload do arquivo
    if ($uploadOk == 1) {
        // Upload do arquivo PDF
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Upload da imagem (caso seja enviado)
            if (isset($_FILES["imageFile"]) && $_FILES["imageFile"]["error"] === UPLOAD_ERR_OK) {
                $imageTargetDir = "uploads/images/";
                $imageTargetFile = $imageTargetDir . basename($_FILES["imageFile"]["name"]);
                $imageFileType = strtolower(pathinfo($imageTargetFile, PATHINFO_EXTENSION));

                // Verifica se é uma imagem válida
                if (in_array($imageFileType, array("jpg", "jpeg", "png", "gif"))) {
                    if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $imageTargetFile)) {
                        $title = $_POST["title"];
                        $pdfFilename = basename($_FILES["fileToUpload"]["name"]);
                        $imageFilename = basename($_FILES["imageFile"]["name"]);

                        // Processa os gêneros selecionados
                        $selectedGenres = isset($_POST["generos"]) ? $_POST["generos"] : array();
                        $genre = implode(", ", $selectedGenres);

                        // Insere os dados na tabela
                        $sql = "INSERT INTO files (title, genre, pdf_filename, image_filename, sinopse ,autor) VALUES ('$title', '$genre', '$pdfFilename', '$imageFilename', '$sinopse',  '$autor')";
                        if (mysqli_query($conn, $sql)) {
                            $message = "O arquivo PDF e a imagem foram enviados e registrados no banco de dados.";
                            header("refresh:5;url=http://localhost:8012/tcc/menu.php");
                        } else {
                            $message = "Ocorreu um erro ao registrar os arquivos no banco de dados: " . mysqli_error($conn);
                        }
                    } else {
                        $message = "Desculpe, ocorreu um erro ao enviar a imagem.";
                    }
                } else {
                    $message = "Desculpe, apenas arquivos de imagem (JPG, JPEG, PNG e GIF) são permitidos para a imagem.";
                }
            } else {
                // Se nenhum arquivo de imagem foi enviado, insere apenas os dados do arquivo PDF na tabela
                $title = $_POST["title"];
                $pdfFilename = basename($_FILES["fileToUpload"]["name"]);

                // Processa os gêneros selecionados
                $selectedGenres = isset($_POST["generos"]) ? $_POST["generos"] : array();
                $genre = implode(", ", $selectedGenres);

                $autor = $_POST["autor"]; // Obtém o valor do campo "autor"


                // Insere os dados na tabela
                $sql = "INSERT INTO files (title, genre, pdf_filename, image_filename, sinopse, autor) VALUES ('$title', '$genre', '$pdfFilename', '$imageFilename', '$sinopse', '$autor')";
                if (mysqli_query($conn, $sql)) {
                    $message = "O arquivo PDF foi enviado e registrado no banco de dados.";
                    header("refresh:5;url=http://localhost:8012/tcc/menu.php");
                } else {
                    $message = "Ocorreu um erro ao registrar o arquivo no banco de dados: " . mysqli_error($conn);
                }
            }
        } else {
            $message = "Desculpe, ocorreu um erro ao enviar o arquivo PDF.";
        }
    }
}
?>