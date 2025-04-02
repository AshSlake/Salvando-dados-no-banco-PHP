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
    <title>Cadastro - PDO</title>
    <style>
        .result-container {
            background-color: #2c3034;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .result-message {
            transition: all 0.3s;
        }

        .result-message:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="result-container text-center">
                    <?php
                    $host = "localhost";
                    $usuario = "root";
                    $senha = "";
                    $bd = "pwii";

                    try {
                        $conecta = new PDO("mysql:dbname=$bd;host=$host;port=3306;charset=utf8", $usuario, $senha);
                        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Prevenção contra SQL Injection usando prepared statements
                        $sql = "INSERT INTO produto (nome, preco, quantidade) VALUES (:nome, :preco, :quantidade)";
                        $stmt = $conecta->prepare($sql);

                        $stmt->bindParam(':nome', $_POST['txtNome']);
                        $stmt->bindParam(':preco', $_POST['txtPreco']);
                        $stmt->bindParam(':quantidade', $_POST['txtQtd']);

                        $resultado = $stmt->execute();

                        echo '
                        <a href="index.php" class="text-decoration-none">
                            <div class="result-message btn btn-success btn-lg p-4 w-100">
                                <i class="bi bi-check-circle-fill fs-1"></i>
                                <h2 class="mt-3">Produto Salvo com Sucesso!</h2>
                            </div>
                        </a>
                        ';
                    } catch (PDOException $e) {
                        echo '
                        <a href="index.php" class="text-decoration-none">
                            <div class="result-message btn btn-danger btn-lg p-4 w-100">
                                <i class="bi bi-exclamation-triangle-fill fs-1"></i>
                                <h2 class="mt-3">Erro ao Salvar Produto</h2>
                                <p class="mt-2">' . htmlspecialchars($e->getMessage(), ENT_QUOTES) . '</p>
                            </div>
                        </a>
                        ';
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