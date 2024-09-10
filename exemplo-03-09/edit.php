<?php
include 'conexao.php';

// Verifica se o id foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Busca o dado no banco de dados
    $stmt = $pdo->prepare("SELECT * FROM teste WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$data) {
        die("Registro não encontrado!");
    }
} else {
    die("ID não fornecido!");
}
?>

<!-- Formulário para editar os dados -->
<form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <label for="name">Nome:</label>
    <input type="text" name="name" value="<?php echo $data['nome']; ?>" required>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $data['email']; ?>" required>
    <button type="submit">Atualizar</button>
</form>
