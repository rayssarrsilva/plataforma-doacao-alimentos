<?php

include("../db.php");

$doador_id = $_GET["doador_id"];
$result = $conn->query("SELECT id, nome_produto FROM produtos WHERE doador_id = $doador_id");

$produtos = [];
while ($row = $result->fetch_assoc()) {
    $produtos[] = $row;
}

echo json_encode($produtos);
?>
