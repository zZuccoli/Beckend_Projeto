<?php
// conexao.php
try {
    // Conexão com o banco SQLite
    $pdo = new PDO('sqlite:'. __DIR__ .'/database.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
