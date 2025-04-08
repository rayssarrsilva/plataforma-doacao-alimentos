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

Doador:
    <select name="doador_id" id="doador_id" required onchange="carregarProdutos()">
        <option value="">Selecione um doador</option>
        <?php
        $result = $conn->query("SELECT id, nome FROM doadores");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='{$row['id']}'>{$row['nome']}</option>";
        }
        ?>
    </select><br>

Produto:
    <select name="produto_id" id="produto_id" required>
        <option value="">Selecione um produto</option>
    </select><br>

Data da solicitação de retirada: <input type="date" name="data_doacao" required><br>
<button type="submit">Solicitar Retirada</button>

</form>

<script>
function carregarProdutos() {
    const doadorId = document.getElementById('doador_id').value;
    const selectProduto = document.getElementById('produto_id');

    // Limpa opções anteriores
    selectProduto.innerHTML = "<option value=''>Carregando...</option>";

    fetch("buscar_produtos.php?doador_id=" + doadorId)
        .then(response => response.json())
        .then(data => {
            selectProduto.innerHTML = "<option value=''>Selecione um produto</option>";
            data.forEach(produto => {
                const option = document.createElement("option");
                option.value = produto.id;
                option.textContent = produto.nome_produto;
                selectProduto.appendChild(option);
            });
        });
}
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doador_id = $_POST["doador_id"];
    $instituicao_id = $_POST["instituicao_id"];
    $produto_id = $_POST["produto_id"];
    $data = $_POST["data_doacao"];

    $sql = "INSERT INTO doacoes (doador_id, instituicao_id, produto_id, data_doacao)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiis", $doador_id, $instituicao_id, $produto_id, $data);

    if ($stmt->execute()) {
        echo "Solicitação Realizada!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>
