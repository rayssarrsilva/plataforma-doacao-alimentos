<?php include("../db.php"); ?>

<h2>Lista de Doadores</h2>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Email</th>
    </tr>
    <?php
    $result = $conn->query("SELECT nome, email FROM doadores");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nome']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }
    ?>
</table>
