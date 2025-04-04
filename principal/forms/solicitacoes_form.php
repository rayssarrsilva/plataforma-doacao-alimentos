<?php include("../db.php"); ?>

<h2>Solicitar Retirada</h2>
<form method="post">
    Instituição:
    <select name="instituicao_id" required>
        <?php
        $result = $conn->query("SELECT id, nome FROM instituicoes");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
        }
        ?>
    </select><br>

    Observações: <br>
    <textarea name="observacoes"></textarea><br>
    Data: <input type="date" name="data_solicitacao" required><br>
    <button type="submit">Solicitar</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instituicao_id = $_POST["instituicao_id"];
    $data = $_POST["data_solicitacao"];
    $obs = $_POST["observacoes"];

    $sql = "INSERT INTO solicitacoes (instituicao_id, data_solicitacao, observacoes) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $instituicao_id, $data, $obs);

    if ($stmt->execute()) {
        echo "Solicitação registrada com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
