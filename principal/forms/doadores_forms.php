<?php include("../db.php"); ?>

<h2>Cadastrar Doador</h2>
<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Email: <input type="email" name="email" required><br>
    <button type="submit">Cadastrar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    $sql = "INSERT INTO doadores (nome, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $email);

    if ($stmt->execute()) {
        echo "Doador cadastrado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
