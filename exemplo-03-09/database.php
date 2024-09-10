<?php
// Conexão com o banco de dados
$stringConnection = 'sqlite:' . __DIR__ . '/database.sqlite';

try {
    $pdo = new PDO($stringConnection);


    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Busca o registro no banco de dados com o id fornecido
        $sql = "SELECT * FROM teste WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($item) {
            // Define o nome para exibir no input
            $name = $item['name'];
        } else {
            echo "Registro não encontrado.";
            exit;
        }
    } else {
        echo "ID não fornecido.";
        exit;
    }
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
    exit;
}
?>