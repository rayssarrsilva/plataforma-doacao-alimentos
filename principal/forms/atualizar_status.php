<?php
include("../db.php");
session_start();

if (!isset($_SESSION["doador_id"])) {
    header("Location: login_doador.php");
    exit;
}

if (isset($_GET["id"], $_GET["acao"])) {
    $id = intval($_GET["id"]);
    $acao = $_GET["acao"];
    $doador_id = $_SESSION["doador_id"];

    // Verifica se a doação pertence a este doador
    $check = $conn->prepare("SELECT id FROM doacoes WHERE id = ? AND doador_id = ?");
    $check->bind_param("ii", $id, $doador_id);
    $check->execute();
    $check->store_result();

    if ($check->num_rows === 0) {
        die("Acesso negado.");
    }

    if ($acao === "aceitar") {
        $status = "aceito";
    } elseif ($acao === "recusar") {
        $status = "recusado";
    } else {
        die("Ação inválida.");
    }

    $update = $conn->prepare("UPDATE doacoes SET status = ? WHERE id = ?");
    $update->bind_param("si", $status, $id);
    $update->execute();

    header("Location: minhas_solicitacoes.php");
    exit;
}
?>
