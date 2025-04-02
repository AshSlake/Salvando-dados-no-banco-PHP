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
    <title>Lista de Produtos - PDO</title>
    <style>
        .table-container {
            background-color: #2c3034;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            margin-top: 2rem;
        }

        .action-form {
            display: inline-block;
        }

        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .back-btn {
            background-color: #ff5722;
            color: #fff;
            border: none;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }
    </style>
</head>

<body class="bg-dark text-light">
    <!-- Botão Voltar -->
    <a href="index.php" class="btn btn-primary back-btn floating-btn rounded-circle">
        <i class="bi bi-arrow-left fs-4"></i>
    </a>

    <div class="container">
        <?php
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "pwii";

        try {
            $conecta = new PDO("mysql:dbname=$bd;host=$host;port=3306;charset=utf8mb4", $usuario, $senha);
            $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo '
            <div class="table-container">
                <h1 class="text-center text-white table-title">Lista de Produtos</h1>
                <div class="table-responsive">
                    <table class="table table-dark table-striped table-hover align-middle">
                        <thead>
                            <tr class="text-center">
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>';

            $sql = "SELECT * FROM produto ORDER BY nome ASC";
            $stmt = $conecta->prepare($sql);
            $stmt->execute();
            $produtos = $stmt->fetchAll();

            if (count($produtos) > 0) {
                foreach ($produtos as $produto) {
                    echo '<tr class="text-center">';
                    echo '<td>' . htmlspecialchars($produto['id_produto']) . '</td>';
                    echo '<td>' . htmlspecialchars($produto['nome']) . '</td>';
                    echo '<td>R$ ' . number_format($produto['preco'], 2, ',', '.') . '</td>';
                    echo '<td>' . htmlspecialchars($produto['quantidade']) . '</td>';
                    echo '<td>
                            <div class="d-flex justify-content-center gap-3">
                                <!-- Formulário para Exclusão via POST -->
                                <form method="post" action="deletar.php" class="action-form">
                                    <input type="hidden" name="id" value="' . htmlspecialchars($produto['id_produto']) . '">
                                    <input type="hidden" name="nome" value="' . htmlspecialchars($produto['nome']) . '">
                                    <input type="hidden" name="preco" value="' . htmlspecialchars($produto['preco']) . '">
                                    <input type="hidden" name="quantidade" value="' . htmlspecialchars($produto['quantidade']) . '">
                                    <button type="submit" class="btn btn-link text-danger p-0" title="Excluir">
                                        <i class="bi bi-trash-fill action-icon"></i>
                                    </button>
                                </form>
                                
                    
                                <form method="post" action="atualizar.php" class="action-form">
                                    <input type="hidden" name="id" value="' . htmlspecialchars($produto['id_produto']) . '">
                                    <input type="hidden" name="nome" value="' . htmlspecialchars($produto['nome']) . '">
                                    <input type="hidden" name="preco" value="' . htmlspecialchars($produto['preco']) . '">
                                    <input type="hidden" name="quantidade" value="' . htmlspecialchars($produto['quantidade']) . '">
                                    <button type="submit" class="btn btn-link text-purple p-0" title="Excluir">
                                          <i class="bi bi-pencil-fill action-icon"></i>
                                    </button>
                                </form>
                            </div>
                          </td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5" class="text-center">Nenhum produto cadastrado</td></tr>';
            }

            echo '
                        </tbody>
                    </table>
                </div>
            </div>';
        } catch (PDOException $e) {
            echo '
            <div class="alert alert-danger mt-5 text-center">
                <i class="bi bi-exclamation-triangle-fill fs-3"></i>
                <h3>Falha ao conectar ao banco de dados</h3>
                <p>' . htmlspecialchars($e->getMessage()) . '</p>
            </div>';
        }
        ?>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>