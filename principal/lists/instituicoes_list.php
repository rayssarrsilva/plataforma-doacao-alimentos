<?php include("../db.php"); ?>

<h2>Lista de Instituições</h2>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Endereço</th>
    </tr>
    <?php
    $result = $conn->query("SELECT nome, endereco FROM instituicoes");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nome']}</td>
                <td>{$row['endereco']}</td>
              </tr>";
    }
    ?>
</table>
