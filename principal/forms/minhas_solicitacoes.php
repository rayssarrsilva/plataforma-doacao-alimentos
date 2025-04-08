<?php
include("../db.php");
session_start();

// Redireciona se não estiver logado como doador
if (!isset($_SESSION["doador_id"])) {
    header("Location: login_doador.php");
    exit;
}

$doador_id = $_SESSION["doador_id"];
$painel_url = isset($_SESSION["instituicao_id"]) ? "painel_instituicao.php" : "painel_doador.php";
?>
<link rel="stylesheet" href="../style.css">

<div class="card">
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="<?php echo $painel_url; ?>" class="link-btn">Ir para o Painel</a>
    </div>

    <h2>Solicitações para Seus Produtos</h2>
    <p>Olá, <?php echo $_SESSION["doador_nome"]; ?> | <a href="logout.php">Sair</a></p>

    <?php
    $sql = "
        SELECT doa.id, i.nome AS nome_instituicao, p.nome_produto, doa.data_doacao, doa.status
        FROM doacoes doa
        JOIN instituicoes i ON doa.instituicao_id = i.id
        JOIN produtos p ON doa.produto_id = p.id
        WHERE doa.doador_id = ?
        ORDER BY doa.data_doacao DESC
    ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $doador_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<table>
        <tr>
            <th>Instituição</th>
            <th>Produto</th>
            <th>Data</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        // Classe de status para cores
        $status_class = "status-" . strtolower($row['status']);
        echo "<tr>
                <td>{$row['nome_instituicao']}</td>
                <td>{$row['nome_produto']}</td>
                <td>{$row['data_doacao']}</td>
                <td class='$status_class'>{$row['status']}</td>
                <td>";

        if ($row['status'] == 'pendente') {
            echo "<a href='atualizar_status.php?id={$row['id']}&acao=aceitar'>Aceitar</a> |
                  <a href='atualizar_status.php?id={$row['id']}&acao=recusar'>Recusar</a>";
        } else {
            echo "-";
        }

        echo "</td></tr>";
    }

    echo "</table>";
    ?>
</div>
