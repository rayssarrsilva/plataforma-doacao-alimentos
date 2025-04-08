<?php

include("../db.php");
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $stmt = $conn->prepare("SELECT id, nome, senha FROM doadores WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($doador = $result->fetch_assoc()) {
        if (password_verify($senha, $doador["senha"])) {
            $_SESSION["doador_id"] = $doador["id"];
            $_SESSION["doador_nome"] = $doador["nome"];
            header("Location: painel_doador.php");
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Email não encontrado.";
    }
}
?>
<link rel="stylesheet" href="../style.css">

<h2>Login do Doador</h2>
<form method="post">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>
