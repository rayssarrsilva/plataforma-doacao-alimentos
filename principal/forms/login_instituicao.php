<link rel="stylesheet" href="../style.css">

<?php
include("../db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $stmt = $conn->prepare("SELECT id, nome, senha FROM instituicoes WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($inst = $result->fetch_assoc()) {
        if (password_verify($senha, $inst["senha"])) {
            $_SESSION["instituicao_id"] = $inst["id"];
            $_SESSION["instituicao_nome"] = $inst["nome"];
            header("Location: painel_instituicao.php");
            exit;
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Email não encontrado.";
    }
}
?>

<h2>Login da Instituição</h2>
<form method="post">
    Email: <input type="email" name="email" required><br>
    Senha: <input type="password" name="senha" required><br>
    <button type="submit">Entrar</button>
</form>
