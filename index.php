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
    <title>Projeto - PDO</title>
    <style>
        .btn-card {
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s;
        }

        .btn-card:hover {
            transform: scale(1.05);
        }

        .btn-card i {
            font-size: 5rem;
            margin-bottom: 1rem;
        }

        .btn-card p {
            font-size: 1.5rem;
            margin: 0;
        }

        .title-card {
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container">
        <h1 class="text-center text-white bg-purple title-card">Projeto Lista de Produtos</h1>

        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-3">
                <a href="cadastro.php" class="text-decoration-none">
                    <div class="btn-card btn btn-primary rounded-3 p-4 w-100">
                        <i class="bi bi-box-seam"></i>
                        <p>Adicionar</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="listar.php" class="text-decoration-none">
                    <div class="btn-card btn btn-danger rounded-3 p-4 w-100 text-white">
                        <i class="bi bi-trash"></i>
                        <p>Remover</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="listar.php" class="text-decoration-none">
                    <div class="btn-card btn btn-warning rounded-3 p-4 w-100">
                        <i class="bi bi-arrow-repeat"></i>
                        <p>Atualizar</p>
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-3">
                <a href="listar.php" class="text-decoration-none">
                    <div class="btn-card btn btn-info rounded-3 p-4 w-100">
                        <i class="bi bi-list-ul"></i>
                        <p>Listar</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>