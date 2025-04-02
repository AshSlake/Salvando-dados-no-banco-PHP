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
    <title>Excluir - PDO</title>
    <style>
        .delete-container {
            background-color: #2c3034;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            margin-top: 2rem;
        }

        .delete-title {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 25px;
            background-color: #6610f2;
        }

        .cancel-btn {
            transition: all 0.3s;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .cancel-btn:hover {
            transform: scale(1.05);
            text-decoration: none;
        }

        .form-label {
            font-weight: 600;
        }

        .confirm-btn {
            transition: all 0.3s;
            padding: 12px 24px;
        }

        .confirm-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .disabled-input {
            background-color: #495057 !important;
            color: #adb5bd !important;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div class="container">
        <!-- Botão Cancelar -->
        <div class="text-center mt-4">
            <a href="listar.php" class="cancel-btn btn btn-danger d-inline-flex align-items-center">
                <i class="bi bi-x-circle-fill fs-1 me-2"></i>
                <span class="fs-4 fw-bold">CANCELAR EXCLUSÃO</span>
            </a>
        </div>

        <!-- Formulário de Confirmação -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="delete-container">
                    <h1 class="text-center text-white delete-title">
                        EXCLUIR PRODUTO
                    </h1>

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

                    <form action="deletarAction.php" method="post">
                        <!-- Campos ocultos com todos os dados -->
                        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                        <input type="hidden" name="nome" value="<?= htmlspecialchars($nome) ?>">
                        <input type="hidden" name="preco" value="<?= htmlspecialchars($preco) ?>">
                        <input type="hidden" name="quantidade" value="<?= htmlspecialchars($quantidade) ?>">

                        <!-- Exibição dos dados (somente leitura) -->
                        <div class="mb-3">
                            <label class="form-label text-indigo">ID</label>
                            <input class="form-control disabled-input" value="<?= htmlspecialchars($id) ?>" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-indigo">Nome</label>
                            <input class="form-control disabled-input" value="<?= htmlspecialchars($nome) ?>" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-indigo">Preço</label>
                            <input class="form-control disabled-input" value="R$ <?= number_format($preco, 2, ',', '.') ?>" disabled>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-indigo">Quantidade</label>
                            <input class="form-control disabled-input" value="<?= htmlspecialchars($quantidade) ?>" disabled>
                        </div>

                        <!-- Botão Confirmar -->
                        <div class="d-grid">
                            <button type="submit" name="btnExcluir" class="confirm-btn btn btn-danger">
                                <i class="bi bi-trash-fill fs-4 me-2"></i>
                                CONFIRMAR EXCLUSÃO DEFINITIVA
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