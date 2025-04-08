<?php
include("../db.php");
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

<?php

$doador_id = $_SESSION["doador_id"];
?>
<link rel="stylesheet" href="../style.css">

<div class="card">
    <h2>Cadastrar Produtos para Doação</h2>

    <form method="post">
        <div id="produtos">
            Produto: <input type="text" name="produtos[]" required><br>
        </div>

        <button type="button" onclick="adicionarProduto()">Adicionar outro produto</button><br><br>
        <button type="submit">Cadastrar</button>
    </form>

    <script>
    function adicionarProduto() {
        const div = document.createElement('div');
        div.innerHTML = 'Produto: <input type="text" name="produtos[]" required><br>';
        document.getElementById('produtos').appendChild(div);
    }
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $produtos = $_POST["produtos"];
        $sql_prod = "INSERT INTO produtos (doador_id, nome_produto) VALUES (?, ?)";
        $stmt_prod = $conn->prepare($sql_prod);

        foreach ($produtos as $produto) {
            $stmt_prod->bind_param("is", $doador_id, $produto);
            $stmt_prod->execute();
        }

        echo "<p style='color: green;'>Produtos cadastrados com sucesso!</p>";
    }
    ?>
</div>
