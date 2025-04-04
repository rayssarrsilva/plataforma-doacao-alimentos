<?php include("../db.php"); ?>

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

    Instituição:
    <select name="instituicao_id" required>
        <?php
        $result = $conn->query("SELECT id, nome FROM instituicoes");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
        }
        ?>
    </select><br>

    Descrição: <br>
    <textarea name="descricao" required></textarea><br>
    Data da Doação: <input type="date" name="data_doacao" required><br>
    <button type="submit">Registrar Doação</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doador_id = $_POST["doador_id"];
    $instituicao_id = $_POST["instituicao_id"];
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
