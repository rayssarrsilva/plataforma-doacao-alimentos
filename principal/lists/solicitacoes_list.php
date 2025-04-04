<?php include("../db.php"); ?>

<h2>Solicitações de Retirada</h2>
<table border="1">
    <tr>
        <th>Instituição</th>
        <th>Data</th>
        <th>Observações</th>
    </tr>
    <?php
    $sql = "SELECT s.data_solicitacao, s.observacoes, i.nome 
            FROM solicitacoes s
            JOIN instituicoes i ON s.instituicao_id = i.id";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nome']}</td>
                <td>{$row['data_solicitacao']}</td>
                <td>{$row['observacoes']}</td>
              </tr>";
    }
    ?>
</table>
