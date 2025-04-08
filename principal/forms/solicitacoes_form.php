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
<?php if ($painel_url): ?>
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="<?php echo $painel_url; ?>" class="link-btn">Ir para o Painel</a>
    </div>
<?php endif; ?>

<div class="card">
    <h2>Solicitações de Retirada</h2>

    <table>
        <tr>
            <th>Instituição</th>
            <th>Doador</th>
            <th>Produto</th>
            <th>Data da Doação</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>

        <?php
        $sql = "
            SELECT 
                doa.id,
                doa.doador_id,
                doa.status,
                d.nome AS nome_doador,
                i.nome AS nome_instituicao,
                p.nome_produto,
                doa.data_doacao
            FROM doacoes doa
            JOIN doadores d ON doa.doador_id = d.id
            JOIN instituicoes i ON doa.instituicao_id = i.id
            JOIN produtos p ON doa.produto_id = p.id
            ORDER BY doa.data_doacao DESC
        ";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $status_class = "status-" . strtolower($row['status']);
            echo "<tr>
                    <td>{$row['nome_instituicao']}</td>
                    <td>{$row['nome_doador']}</td>
                    <td>{$row['nome_produto']}</td>
                    <td>{$row['data_doacao']}</td>
                    <td class='$status_class'>{$row['status']}</td>
                    <td>";

            // Só exibe as ações se for o doador responsável e se estiver pendente
            if (
                isset($_SESSION["doador_id"]) &&
                $_SESSION["doador_id"] == $row["doador_id"] &&
                $row["status"] == "pendente"
            ) {
                echo "<a href='atualizar_status.php?id={$row['id']}&acao=aceitar'>Aceitar</a> |
                      <a href='atualizar_status.php?id={$row['id']}&acao=recusar'>Recusar</a>";
            } else {
                echo "-";
            }

            echo "</td></tr>";
        }
        ?>
    </table>
</div>
