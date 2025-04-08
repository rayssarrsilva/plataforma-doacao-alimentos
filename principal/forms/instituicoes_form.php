<?php include("../db.php"); ?>
<link rel="stylesheet" href="../style.css">
<?php
session_start();

$painel_url = "";

if (isset($_SESSION["doador_id"])) {
    $painel_url = "painel_doador.php";
} elseif (isset($_SESSION["instituicao_id"])) {
    $painel_url = "painel_instituicao.php";
}
?>
<?php if ($painel_url): ?>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="<?php echo $painel_url; ?>" class="link-btn">Ir para o Painel</a>
    </div>
<?php endif; ?>

<h2>Cadastrar Instituição</h2>
<form method="post">
    Nome: <input type="text" name="nome" required><br>
    Endereço: <input type="text" name="endereco" required><br>
    <button type="submit">Cadastrar</button>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];

    $sql = "INSERT INTO instituicoes (nome, endereco) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nome, $endereco);

    if ($stmt->execute()) {
        echo "Instituição cadastrada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}