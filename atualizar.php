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
    <title>Atualizar Produto - PDO</title>
    <style>
        .update-container {
            background-color: #2c3034;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            margin-top: 2rem;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2rem;
            transition: transform 0.3s;
            z-index: 1000;
        }

        .back-btn:hover {
            transform: scale(1.1);
        }

        .update-title {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 25px;
            background-color: #6f42c1;
        }

        .form-control {
            background-color: #f8f9fa;
        }

        .btn-update {
            transition: all 0.3s;
            padding: 12px 24px;
        }

        .btn-update:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="bg-dark text-light">
    <!-- Botão Voltar -->
    <a href="listar.php" class="back-btn text-purple">
        <i class="bi bi-arrow-left-circle-fill"></i>
    </a>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="update-container">
                    <?php
                    // Verifica se os dados foram enviados via POST
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Recupera os dados do formulário anterior
                        $id = $_POST['id'] ?? '';
                        $nome = $_POST['nome'] ?? '';
                        $preco = $_POST['preco'] ?? '';
                        $quantidade = $_POST['quantidade'] ?? '';
                    } else {
                        // Se acessado diretamente, redireciona
                        header("Location: listar.php");
                        exit();
                    }
                    ?>

                    <h1 class="text-center text-white update-title">
                        Atualizar Produto - ID: <?= htmlspecialchars($id) ?>
                    </h1>

                    <form action="atualizarAction.php" method="post">
                        <!-- Campo ID oculto -->
                        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">

                        <!-- Campo Nome -->
                        <div class="mb-3">
                            <label class="form-label text-purple fw-bold">Nome</label>
                            <input type="text" name="nome" class="form-control"
                                value="<?= htmlspecialchars($nome) ?>" required>
                        </div>

                        <!-- Campo Preço -->
                        <div class="mb-3">
                            <label class="form-label text-purple fw-bold">Preço</label>
                            <input type="number" step="0.01" name="preco" class="form-control"
                                value="<?= htmlspecialchars($preco) ?>" required>
                        </div>

                        <!-- Campo Quantidade -->
                        <div class="mb-4">
                            <label class="form-label text-purple fw-bold">Quantidade</label>
                            <input type="number" name="quantidade" class="form-control"
                                value="<?= htmlspecialchars($quantidade) ?>" required>
                        </div>

                        <!-- Botão Atualizar -->
                        <div class="d-grid">
                            <button type="submit" name="btnAtualizar" class="btn btn-purple btn-update">
                                <i class="bi bi-arrow-repeat fs-4 me-2"></i> Atualizar Produto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>