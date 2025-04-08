<link rel="stylesheet" href="../style.css">
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
<link rel="stylesheet" href="../style.css">

<?php if ($painel_url): ?>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="<?php echo $painel_url; ?>" class="link-btn">Ir para o Painel</a>
    </div>
<?php endif; ?>

<div class="card">
    <h2>Produtos Disponíveis para Doação</h2>

    <table>
        <tr>
            <th>Produto</th>
            <th>Doador</th>
        </tr>

        <?php
        $sql = "
        SELECT 
            p.nome_produto,
            d.nome AS nome_doador
        FROM produtos p
        JOIN doadores d ON p.doador_id = d.id
        WHERE p.id NOT IN (
            SELECT produto_id FROM doacoes WHERE status = 'aceito'
        )
        ORDER BY d.nome ASC, p.nome_produto ASC
    ";
    

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['nome_produto']}</td>
                        <td>{$row['nome_doador']}</td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhum produto cadastrado.</td></tr>";
        }
        ?>
    </table>
</div>
