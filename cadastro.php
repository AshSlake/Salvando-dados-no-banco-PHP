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
        .form-container {
            background-color: #2c3034;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        }

        .form-title {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 25px;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 2rem;
            transition: transform 0.3s;
        }

        .back-btn:hover {
            transform: scale(1.1);
        }

        .form-label {
            font-weight: 600;
        }

        .submit-btn {
            transition: all 0.3s;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body class="bg-dark text-light">
    <div class="container">
        <!-- Botão Voltar -->
        <a href="index.php" class="back-btn text-primary">
            <i class="bi bi-arrow-left-circle-fill"></i>
        </a>

        <!-- Formulário Centralizado -->
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="form-container">
                    <h1 class="text-center bg-primary text-white form-title">Cadastro de Produtos</h1>

                    <form action="cadastroAction.php" method="post">
                        <!-- Campo Código (desabilitado) -->
                        <div class="mb-3">
                            <label for="txtID" class="form-label text-primary">Código</label>
                            <input type="text" id="txtID" name="txtID" class="form-control bg-secondary text-light" disabled>
                        </div>

                        <!-- Campo Nome -->
                        <div class="mb-3">
                            <label for="txtNome" class="form-label text-primary">Nome</label>
                            <input type="text" id="txtNome" name="txtNome" class="form-control bg-light">
                        </div>

                        <!-- Campo Preço -->
                        <div class="mb-3">
                            <label for="txtPreco" class="form-label text-primary">Preço</label>
                            <input type="number" step="0.01" id="txtPreco" name="txtPreco" class="form-control bg-light">
                        </div>

                        <!-- Campo Quantidade -->
                        <div class="mb-3">
                            <label for="txtQtd" class="form-label text-primary">Quantidade</label>
                            <input type="number" id="txtQtd" name="txtQtd" class="form-control bg-light">
                        </div>

                        <!-- Botão de Envio -->
                        <div class="d-grid">
                            <button type="submit" name="btnAdd" class="btn btn-primary submit-btn py-3">
                                <i class="bi bi-plus-square-fill fs-3"></i> Adicionar
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