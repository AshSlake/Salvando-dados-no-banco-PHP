<?php
// atualizarAction.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $bd = "pwii";

    try {
        $conecta = new PDO("mysql:dbname=$bd;host=$host;port=3306;charset=utf8mb4", $usuario, $senha);
        $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepara e executa a atualização
        $sql = "UPDATE produto SET 
                nome = :nome, 
                preco = :preco, 
                quantidade = :quantidade 
                WHERE id_produto = :id";

        $stmt = $conecta->prepare($sql);
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindParam(':nome', $_POST['nome']);
        $stmt->bindParam(':preco', $_POST['preco']);
        $stmt->bindParam(':quantidade', $_POST['quantidade']);
        $stmt->execute();

        // Redireciona com mensagem de sucesso
        header("Location: listar.php?sucesso=Produto atualizado com sucesso");
        exit();
    } catch (PDOException $e) {
        // Redireciona com mensagem de erro
        header("Location: listar.php?erro=" . urlencode("Erro ao atualizar: " . $e->getMessage()));
        exit();
    }
} else {
    // Se acessado diretamente sem POST, redireciona
    header("Location: listar.php");
    exit();
}
