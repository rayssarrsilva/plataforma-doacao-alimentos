<link rel="stylesheet" href="../style.css">
<?php include("../db.php"); ?>
<?php
session_start();

$painel_url = "";

if (isset($_SESSION["doador_id"])) {
    $painel_url = "painel_doador.php";
} elseif (isset($_SESSION["instituicao_id"])) {
    $painel_url = "painel_instituicao.php";
}
?>

<h2>Registrar Doação</h2>
<form method="post">
    Doador:
    <select name="doador_id" required>
        <?php
        $result = $conn->query("SELECT id, nome FROM doadores");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
        }
        ?>
    </select><br>

    Descrição(produtos a serem doados): <br>
    <textarea name="descricao" required></textarea><br>
    Data da Doação: <input type="date" name="data_doacao" required><br>
    <button type="submit">Registrar Doação</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doador_id = $_POST["doador_id"];
    $descricao = $_POST["descricao"];
    $data = $_POST["data_doacao"];

    $sql = "INSERT INTO doacoes (doador_id, instituicao_id, descricao, data_doacao)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiss", $doador_id, $instituicao_id, $descricao, $data);

    if ($stmt->execute()) {
        echo "Doação registrada!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
