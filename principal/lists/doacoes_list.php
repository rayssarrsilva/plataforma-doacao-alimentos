<?php include("../db.php"); ?>

<h2>Lista de Doações</h2>
<table border="1">
    <tr>
        <th>Doador</th>
        <th>Instituição</th>
        <th>Descrição</th>
        <th>Data</th>
    </tr>
    <?php
    $sql = "SELECT d.nome AS doador, i.nome AS instituicao, 
                   do.descricao, do.data_doacao
            FROM doacoes do
            JOIN doadores d ON do.doador_id = d.id
            JOIN instituicoes i ON do.instituicao_id = i.id";

    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['doador']}</td>
                <td>{$row['instituicao']}</td>
                <td>{$row['descricao']}</td>
                <td>{$row['data_doacao']}</td>
              </tr>";
    }
    ?>
</table>
