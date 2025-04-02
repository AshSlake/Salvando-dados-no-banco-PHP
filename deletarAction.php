<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <title>Resultado da Exclusão - PDO</title>
    <style>
        .result-container {
            background-color: #2c3034;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            margin-top: 2rem;
        }

        .result-message {
            transition: all 0.3s;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
        }

        .result-message:hover {
            transform: scale(1.02);
        }

        .btn-return {
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
        }

        .success-bg {
            background-color: #198754;
            color: white;
        }

        .error-bg {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="result-container text-center">
                    <?php
                    // Verifica se a requisição foi POST
                    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                        header("Location: listar.php");
                        exit();
                    }

                    $host = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $bd = "pwii";

                    try {
                        $conecta = new PDO("mysql:dbname=$bd;host=$host;port=3306;charset=utf8mb4", $usuario, $senha);
                        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $conecta->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                        // Prepara e executa a exclusão
                        $sql = $conecta->prepare("DELETE FROM produto WHERE id_produto = :id");
                        $sql->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
                        $sql->execute();

                        // Verifica se realmente excluiu
                        if ($sql->rowCount() > 0) {
                            echo '
                            <div class="result-message success-bg">
                                <i class="bi bi-check-circle-fill fs-1"></i>
                                <h2 class="mt-3">Produto Excluído com Sucesso!</h2>
                                <p class="mt-2">O registro foi permanentemente removido do sistema</p>
                                <a href="listar.php" class="btn btn-light btn-return">
                                    <i class="bi bi-list-ul me-2"></i>Voltar para a Listagem
                                </a>
                            </div>';
                        } else {
                            echo '
                            <div class="result-message error-bg">
                                <i class="bi bi-exclamation-triangle-fill fs-1"></i>
                                <h2 class="mt-3">Produto Não Encontrado</h2>
                                <p class="mt-2">O registro já pode ter sido removido anteriormente</p>
                                <a href="listar.php" class="btn btn-light btn-return">
                                    <i class="bi bi-list-ul me-2"></i>Voltar para a Listagem
                                </a>
                            </div>';
                        }
                    } catch (PDOException $e) {
                        error_log("Erro ao excluir produto: " . $e->getMessage());

                        echo '
                        <div class="result-message error-bg">
                            <i class="bi bi-exclamation-triangle-fill fs-1"></i>
                            <h2 class="mt-3">Erro ao Excluir Produto</h2>
                            <p class="mt-2">' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '</p>
                            <a href="listar.php" class="btn btn-light btn-return">
                                <i class="bi bi-list-ul me-2"></i>Voltar para a Listagem
                            </a>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>